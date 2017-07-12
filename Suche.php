<?php

include "dbh.php";
session_start();

if (!isset($_SESSION["ID"])) {

    header("location: Login.php");
}
$ID = $_SESSION["ID"];

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

        <link href="hintergrund.css" rel="stylesheet" />

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
    <form action="" method="post">



        <input name="suche" type="text" class="form-control" id="suche" placeholder="Suche User">

        <button type="submit" class="btn btn-default btn-md">Suchen!</button>




    </form>

    <div class="container" style="margin-top: 60px;">
        <?php
        if (isset($_POST['suche'])) {    //wenn was eingegeben wurde mit post übertragen
            $suche="%".$_POST["suche"]."%";  //sucheingabe mit Platzhalter davor und danach
            $sql="SELECT * FROM user WHERE Benutzername LIKE :name";


            $stmt= $dbh->prepare($sql);

            $stmt->bindParam(":name", $suche);

            $stmt->execute();

            $users=$stmt->fetchAll();

            if ($users != false) {
            foreach ($users as $user) {  //für jedes gefundene ergebnis wird benutzername,link,bild angezeigt
?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-1">
                                <img src="Bilder/Profilbild/<?= $user['ID'] ?>" class="img-responsive">
                            </div>
                            <div class="col-xs-11">
                                <span><a href="User.php?ID=<?= $user['ID'] ?>"><span class="lead"><?= $user['Benutzername'] ?></span></a> </span>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "es wurde kein User gefunden.";  //wenn nicht wird das angezeigt
        }}
        ?>
    </div>
</div>
</body>
</html>
