<?php

include "../dbh.php";
session_start();

$folgt_ID=$_GET["ID"];

$sql="DELETE FROM folgen WHERE user_ID = :user_ID AND folgt_ID = :folgt_ID";

$stmt = $dbh->prepare($sql);

$stmt->bindParam(":user_ID", $_SESSION["ID"]);

$stmt->bindParam(":folgt_ID", $folgt_ID);

$stmt->execute();

header("location: ../Landingpage.php");