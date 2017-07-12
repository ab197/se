<?php

session_start();


//wir binden unser Datenbanklogin ein

include "../dbh.php";


//altes/neues Passwort aus post

$passwortalt= $_POST["passwortalt"];
$passwortneu= $_POST["passwortneu"]; $passwortneu= password_hash($passwortneu, PASSWORD_DEFAULT);
$email=$_SESSION["Email"];

//user mit email aus Session wird in datenbank gesucht und als variable gespeichert

$sql="SELECT * FROM user WHERE Email=:Email";


$stmt= $dbh->prepare($sql);

$stmt->bindParam(":Email", $email);

$stmt->execute();

$user=$stmt->fetch();

if (password_verify($passwortalt, $user["Passwort"])) {   //altes passwort wird überprüft, wenn richtig pw aktualisiert



    $sql="UPDATE user SET Passwort= :passwortneu WHERE ID = :ID";
    $stmt=$dbh->prepare ($sql);
    $stmt->bindParam(":passwortneu", $passwortneu);
    $stmt->bindParam(":ID", $user["ID"]);
    $stmt->execute();

    header("location: ../Profil.php");

}

else
{
    header("location: ../Profil.php?error=1");
}
