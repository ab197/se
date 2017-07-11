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

$sql = "SELECT Benutzername FROM user WHERE ID = :user_ID";
$stmt= $dbh->prepare($sql);

$stmt->bindParam(":user_ID", $result['user_ID']);

$stmt->execute();

$user=$stmt->fetch();
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
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Landingpage.php">SE</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li><a href="Newpost.php">Neuer Post</a></li>
                <li><a href="Profil.php">Mein Profil</a></li>
                <li><a href="Suche.php">User suchen</a></li>
                <li><a href="Funktionen/logout.php">Logout</a></li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">

    <h1>Post anzeigen</h1>

    <?php
    if(isset($result) && $result !=false && $result['user_ID']) {
        ?>



        <div class="panel panel-default">
            <div class="panel-heading">

                <h2 class="panel-title"><?= $user['Benutzername'] ?></h2>
                <span style="color: #AAA;"><?= $result['Datum'] ?></span>


            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-1">
                        <img src="Bilder/Profilbild/<?= $result['user_ID'] ?>" class="img-responsive">
                    </div>
                    <div class="col-xs-11">

                        <?php
                        if ($result['bild'] != NULL)
                        {
                            ?>
                            <img src="Bilder/<?= $result['bild'] ?>" class="img-responsive" style="margin-bottom: 50px;">
                            <?php
                        }
                        ?>
                        <p class="lead">
                            <?= $result['text'] ?>
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <?php
    }else {
        echo "nichts gefunden";
    }
    ?>

</div>




</body>

</html>



