<?php

include "../dbh.php";
session_start();

$folgt_ID=$_GET["ID"];   //wir übergeben ID mit get demjenigen dem gefolgt werden soll und tragen es in Datenbank ein
                          // und die ID aus der Session wird übergeben

$sql = "INSERT INTO folgen(user_ID, folgt_ID) VALUES (:user_ID, :folgt_ID)";

$stmt = $dbh->prepare($sql);

$stmt->bindParam(":user_ID", $_SESSION["ID"]);

$stmt->bindParam(":folgt_ID", $folgt_ID);

$stmt->execute();


header("location: ../Landingpage.php");