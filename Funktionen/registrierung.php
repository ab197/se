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
    header("location: ../Registrierung.php");

}

if ($error===false) {


    $sql = "INSERT INTO user(Benutzername, Email, Passwort) VALUES (:Benutzername, :Email, :Passwort)";

    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(":Benutzername", $username);

    $stmt->bindParam(":Email", $email);

    $stmt->bindParam(":Passwort", $password);

    $stmt->execute();

    header("location: ../Login.php");

}