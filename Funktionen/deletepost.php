<?php

session_start();include "../dbh.php";

if (!isset($_SESSION["ID"])) {

    header("location: Login.php");
}
$sql="DELETE FROM posts WHERE ID = :ID";
$stmt=$dbh->prepare ($sql);
$stmt->bindParam(":ID", $_GET["id"]);
$stmt->execute();

header("location: ../Landingpage.php");

?>

