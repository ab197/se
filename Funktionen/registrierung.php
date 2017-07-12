<?php

//standart registrierung, schreiben der Daten in die Datenbank


include "../dbh.php"; //wir binden unser Datenbanklogin ein

$error=false;
//die Daten werden mithilfe der Post-methode gelesen und in variablen gespeichert
$username=$_POST["Username"];
$email=$_POST["Email"];
$password=$_POST["Passwort"];
$password2=$_POST["Passwort2"];

if ($password===$password2) {   //überprüfung ob das passwort gleich ist

    $password= password_hash($password, PASSWORD_DEFAULT);  //passwort wird verschlüsselt
}

else {

    echo ("Diese Passwörter sind nicht identisch!");
    $error=true;
    exit();

}

if ($error===false) {

// sql query : Befehl um etwas Datenbanken einzutragen oder abzufragen, löschen etc.

    $sql = "INSERT INTO user(Benutzername, Email, Passwort) VALUES (:Benutzername, :Email, :Passwort)";

    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(":Benutzername", $username);   //variablen werden Parametern zugewiesen

    $stmt->bindParam(":Email", $email);             // ... ist sicherer stichwort sql injection

    $stmt->bindParam(":Passwort", $password);

    $stmt->execute();    // Anfrage an Datenbank wird ausgeführt

    //Standard Profilbild einfügen für jeden neuen Nutzer
    $sql = "SELECT ID FROM user WHERE Email = :Email";

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":Email", $email);
    $stmt->execute();

    $user = $stmt->fetch();

    $profilbild = "../Bilder/Profilbild/defualt_user.png"; //Pfad zum Standardprofilbild

    copy($profilbild, "../Bilder/Profilbild/".$user['ID'].".png");



    //sich selber folgen

    $sql = "INSERT INTO folgen(user_ID, folgt_ID) VALUES (:user_ID, :folgt_ID)";

    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(":user_ID", $user['ID']);

    $stmt->bindParam(":folgt_ID", $user['ID']);

    $stmt->execute();
    header("location: ../Login.php");
}