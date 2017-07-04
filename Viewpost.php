<?php

session_start();include "dbh.php";

if (!isset($_SESSION["ID"])) {

    header("location: Login.php");
}
$sql="SELECT * FROM posts WHERE ID = :ID";
$stmt=$dbh->prepare ($sql);
$stmt->bindParam(":ID", $_GET["id"]);
$stmt->execute();
$result=$stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The&nbsp;Society&nbsp;Explorer</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">

    <h1>Post anzeigen</h1>

    <?php
    if(isset($result) && $result !=false) {
        ?>
        <p>
            <strong>ID</strong>: <?= $result["ID"] ?>
        </p>

        <p>
            <strong>Autor</strong>: <?= $result["user_ID"] ?>
        </p>

        <p>
            <strong>Text</strong>: <?= $result["text"] ?>
        </p>

        <p>
            <strong>Datum</strong>: <?= $result["Datum"] ?>
        </p>

        <?php
    }else {
        echo "nichts gefunden";
    }
    ?>

</div>




</body>
</html>



