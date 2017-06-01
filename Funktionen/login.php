<?php
session_start();


//wir binden unser Datenbanklogin ein

include "../dbh.php";


$email=$_POST["Email"];
$password=$_POST["Passwort"];

$sql="SELECT * FROM user WHERE Email=:Email";


$stmt= $dbh->prepare($sql);

$stmt->bindParam(":Email", $email);

$stmt->execute();

$user=$stmt->fetch();

if ($user !=FALSE && password_verify($password, $user["Passwort"])) {

    $_SESSION["ID"]= $user["ID"];
    $_SESSION["Email"]= $user["Email"];
    $_SESSION["Benutzername"]= $user["Benutzername"];
    header("location: ../Landingpage.php");
}

else { echo "Dieser Benutzer wurde nicht gefunden! Oder das Passwort ist Falsch!";}