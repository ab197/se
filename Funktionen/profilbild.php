<?php

include "../dbh.php";
session_start();


$user_ID=$_SESSION["ID"];



$uploaddir = '../Bilder/Profilbild/';
$uploadfile = basename($_FILES['bild']['name']);

$bild = $uploadfile;

$uploadfile = $uploaddir . $uploadfile;




if (move_uploaded_file($_FILES['bild']['tmp_name'], $uploadfile)) {


    unlink($uploaddir.$_SESSION["ID"].".jpeg");
    unlink($uploaddir.$_SESSION["ID"].".jpg");
    unlink($uploaddir.$_SESSION["ID"].".gif");
    unlink($uploaddir.$_SESSION["ID"].".png");

    //Upload erfolgreich
    $fileinfo = pathinfo($uploadfile);
    rename($uploadfile,$uploaddir. $_SESSION["ID"].".".$fileinfo["extension"] );
    header("location: ../Landingpage.php");
} else {
    echo "Nicht korrekt Geladen";

    }


