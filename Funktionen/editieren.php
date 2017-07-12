<?php

//post wird in der Datenbank akualisiert, (über get)

session_start();include "../dbh.php";

$text=$_POST["text"];

$sql="UPDATE posts SET text= :text WHERE ID = :ID";
$stmt=$dbh->prepare ($sql);
$stmt->bindParam(":text", $text);
$stmt->bindParam(":ID", $_GET["id"]);
$stmt->execute();
header("location: ../Landingpage.php");