<?php


//wir binden unser Datenbanklogin ein

include "../dbh.php";


$error=false;
$username=$_POST["Username"];
$email=$_POST["Email"];
$password=$_POST["Passwort"];
$password2=$_POST["Passwort2"];

if ($password===$password2) {

    $password= password_hash($password, PASSWORD_DEFAULT);
}

else {

    echo ("Diese Passwörter sind nicht identisch!");
    $error=true;
    exit();

}

if ($error===false) {


    $sql = "INSERT INTO user(Benutzername, Email, Passwort) VALUES (:Benutzername, :Email, :Passwort)";

    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(":Benutzername", $username);

    $stmt->bindParam(":Email", $email);

    $stmt->bindParam(":Passwort", $password);

    $stmt->execute();

    //Standard Profilbild einfügen für jeden neuen Nutzer
    $sql = "SELECT ID FROM user WHERE Email = :Email";

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":Email", $email);
    $stmt->execute();

    $user = $stmt->fetch();

    $profilbild = "../Bilder/Profilbild/defualt_user.png"; //Pfad zum Standardprofilbild

    copy($profilbild, "../Bilder/Profilbild/".$user['ID'].".png");

    header("location: ../Login.php");

}