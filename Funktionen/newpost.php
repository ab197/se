<?php

include "../dbh.php";
session_start();


$user_ID=$_SESSION["ID"];
$text=$_POST["text"];    //text über die methode post übernommen


$uploaddir = '../Bilder/';    //uploadfunktion nach php.net
$uploadfile = basename($_FILES['bild']['name']);

$bild = $uploadfile;

$uploadfile = $uploaddir . $uploadfile;





if (strlen($text)>280) {              //hier wird getestet ob der eingegebene text zu lang ist
                                      // wenn ja, dann fehlermeldung.
    echo "Der eingebene Text ist zu lang!";
}

//es wird überprüft ob kein bild hochgeladen wurde, dann wird nur user_id, text und datum (zeitstempel) übergeben

elseif ($_FILES['bild']['name'] == NULL) {
    $sql = "INSERT INTO posts(user_ID, text, Datum) VALUES (:user_ID, :text,now())";

    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(":user_ID", $user_ID);

    $stmt->bindParam(":text", $text);

    $stmt->execute();

    header("location: ../Landingpage.php"); // zurückleitung landingpage
}

//ansonsten (bild da) wird zusätzlich der Dateipfad zum Bild gespeichert

else {
    $sql = "INSERT INTO posts(user_ID, text, bild, Datum) VALUES (:user_ID, :text, :bild,now())";

    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(":user_ID", $user_ID);

    $stmt->bindParam(":text", $text);

    $stmt->bindParam(":bild", $bild);

    $stmt->execute();

    if (move_uploaded_file($_FILES['bild']['tmp_name'], $uploadfile)) {  //siehe php.net
        //Upload erfolgreich
    } else {
        echo "Fehler beim Upload";
    }

    header("location: ../Landingpage.php");
}