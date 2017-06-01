<?php

include "../dbh.php";
session_start();


$user_ID=$_SESSION["ID"];
$text=$_POST["text"];


$uploaddir = '../Bilder/';
$uploadfile = basename($_FILES['bild']['name']);

$bild = $uploadfile;

$uploadfile = $uploaddir . $uploadfile;





if (strlen($text)>280) {
    echo "Der eingebene Text ist zu lang!";
}

elseif ($_FILES['bild']['name'] == NULL) {
    $sql = "INSERT INTO posts(user_ID, text) VALUES (:user_ID, :text)";

    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(":user_ID", $user_ID);

    $stmt->bindParam(":text", $text);

    $stmt->execute();

    header("location: ../Landingpage.php");
}

else {
    $sql = "INSERT INTO posts(user_ID, text, bild) VALUES (:user_ID, :text, :bild)";

    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(":user_ID", $user_ID);

    $stmt->bindParam(":text", $text);

    $stmt->bindParam(":bild", $bild);

    $stmt->execute();

    if (move_uploaded_file($_FILES['bild']['tmp_name'], $uploadfile)) {
        //Upload erfolgreich
    } else {
        echo "Fehler beim Upload";
    }

    header("location: ../Landingpage.php");
}