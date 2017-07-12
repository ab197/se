<?php

include "../dbh.php";
session_start();

//hochladen nach php.net


$user_ID=$_SESSION["ID"];



$uploaddir = '../Bilder/Profilbild/';
$uploadfile = basename($_FILES['bild']['name']);

$bild = $uploadfile;

$uploadfile = $uploaddir . $uploadfile;




if (move_uploaded_file($_FILES['bild']['tmp_name'], $uploadfile)) {

    unlink($uploaddir.$_SESSION["ID"].".jpeg");  //alte bilder werden gelöscht
    unlink($uploaddir.$_SESSION["ID"].".jpg");
    unlink($uploaddir.$_SESSION["ID"].".gif");
    unlink($uploaddir.$_SESSION["ID"].".png");

    //Upload erfolgreich
    $fileinfo = pathinfo($uploadfile);
    rename($uploadfile,$uploaddir. $_SESSION["ID"].".".$fileinfo["extension"] );   //unbenennen in sessionID.dateiendung
                                                                                    //dateiendung (jpg,gif etc.)
    header("location: ../Landingpage.php");
} else {
    echo "Fehler beim Upload.<a href='../Profil.php'>zurück</a>";

    }


