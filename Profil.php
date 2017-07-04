<?php

include "dbh.php";
session_start();

/*if (!isset($_SESSION["ID"])) {

    header("location: Login.php");
}
*/


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The&nbsp;Society&nbsp;Explorer</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


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
                <li><a href="#">Mein Profil</a></li>
                <li><a href="Funktionen/logout.php">Logout</a></li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class = "container">
    <h1>Mein Profil</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Profilbild </h2>

        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-1">
                    <img src="Bilder/Profilbild/<?= $_SESSION['ID'] ?>" class="img-responsive">
                </div>
                <div class="col-xs-11">





            <form action="Funktionen/profilbild.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="bild">Bild hochladen</label>
                    <input type="file" name="bild">
                </div>

                <button type="submit" name="submit" class="btn btn-default">hochladen</button>
            </form>
                </div></div>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Passwort ändern </h2>

        </div>
        <div class="panel-body">

            <form action="Funktionen/passwort.php" method="post">

                <div class="form-group">
                    <label for="passwortalt">altes Passwort</label>
                    <input type="password" name="passwortalt" id="passwortalt">
                </div>

                <div class="form-group">
                    <label for="passwortneu">neues Passwort</label>
                    <input type="password" name="passwortneu" id="passwortneu">
                    </div>

                <button type="submit" name="submit" class="btn btn-default">ändern</button>
            </form>

        </div>
    </div>


</div>





</body>

</html>


