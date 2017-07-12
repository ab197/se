<?php

include "dbh.php";   //datenbank wird eingebunden
session_start();

if (!isset($_SESSION["ID"])) { //wenn man nicht angemeldet ist wird man zurückgeleitet auf login.php

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
    <div class="row">
        <div class="col-md-3">

            <div class="gemini">

                <!-- Profilbild wird angezeigt-->

            <img src="Bilder/Profilbild/<?= $_SESSION['ID'] ?>" class="img-responsive">

               <!--Profilname wird angezeigt-->

            <h2><?= $_SESSION["Benutzername"] ?></h2>




            <h2>du folgst: </h2>

                </div>

            <div class="container-fluid">


                <?php

                /*
                 * wir wählen aus der Datenbank alle Verbindungen raus zwischen angemeldetem Benutzer
                 * und den Benutzern denen er folgt (nur ID)
                 */

                $sql="SELECT folgt_ID FROM folgen WHERE user_ID = ($ID)";
                $stmt=$dbh->prepare($sql);
                $stmt->execute();
                $ergebnis=$stmt->fetchAll();    //ergebnis der Abfrage :arrayliste mit entsprechenden Verbindungen
                foreach ($ergebnis as $value ){   //für jedes element der arrayliste wird ausgeführt,jede verbindung
                                                  //... wird einzeln betrachtet


                    $sql="SELECT * FROM user WHERE ID = :ID"; //wir suchen in der anderen Datenbank den nutzernamen
                                                              //der Person der gefolgt wird
                    $stmt=$dbh->prepare($sql);
                    $stmt->bindParam(":ID", $value["folgt_ID"]);

                    $stmt->execute();
                    $User=$stmt->fetch();

                    $User=$User["Benutzername"];   //der Username wird in einer variable gespeichert
                    ?>


                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-xs-3">

                            <!-- Profilbild wird angezeigt, Name wird angezeigt von person der man folgt inklusive link-->

                            <a href="User.php?ID=<?= $value['folgt_ID'] ?>">
                                <img src="Bilder/Profilbild/<?= $value['folgt_ID'] ?>" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-xs-9">
                            <a href="User.php?ID=<?= $value['folgt_ID'] ?>">
                                <span class="lead gemini"><?= $User ?></span>
                            </a>
                        </div></div>
                    <?php
                }
                ?>
            </div>
    </div>
    <div class="col-md-9">

<h1>Alle Posts</h1>

<?php        //wie oben verbindungen zu folgebeziehungen
$ID=$_SESSION["ID"];
$sql = "SELECT * FROM folgen WHERE user_ID= :user_ID";
$stmt=$dbh->prepare ($sql);
$stmt->bindParam(":user_ID", $ID);
$stmt->execute();
$folgen=$stmt->fetchAll();
$folgt = array(); //wir erstellen ein leeres array wo die zu folgenden user_id s eingetragen werden

foreach ($folgen as $value){    //jedes element wird einzeln betrachtet
    $folgt[] = $value["folgt_ID"];
}

$folgt=implode(",",$folgt);  //array wird in string umgewandelt





$sql="SELECT * FROM posts WHERE user_ID IN ($folgt) ORDER BY Datum DESC";  //Posts in datenbank suchen
$stmt=$dbh->prepare ($sql);
$stmt->execute();
$result=$stmt->fetchAll();


foreach ($result as $row) {  //für jeden post wird der benutzername in einer variablen gespeichert
    $sql = "SELECT Benutzername FROM user WHERE ID = :user_ID";
    $stmt= $dbh->prepare($sql);

    $stmt->bindParam(":user_ID", $row['user_ID']);

    $stmt->execute();

    $user=$stmt->fetch();

?>



    <div class="panel panel-default">
        <div class="panel-heading">

            <!--Benutzername und Datum wird angezeigt, Benutzername ist ein link zur profilseite-->
                <a href="User.php?ID=<?= $row['user_ID']?>">
                <h2 class="panel-title"><?= $user['Benutzername'] ?></h2> </a>
                <span style="color: #AAA;"><?= $row['Datum'] ?></span>


        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-1">

                    <!--profilbild -->
                    <img src="Bilder/Profilbild/<?= $row['user_ID'] ?>" class="img-responsive">
                    </div>
                <div class="col-xs-11">

            <?php
            if ($row['bild'] != NULL)   //wenn ein bild hochgeladen wurde (in db gespeichert)wird es angezeigt
            {
                ?>
                <img src="Bilder/<?= $row['bild'] ?>" class="img-responsive" style="margin-bottom: 50px;">
                <?php
            }
            ?>
                   <!-- der text des post der angezeigt werden soll-->


            <p class="lead">
                <?= $row['text'] ?>
            </p>
            </div>
        </div>
        </div>
        <div class="panel-footer">



        <!--link anzeigen geht zu view post(id wird mit get übergeben)-->

            <a href='Viewpost.php?id=<?=$row['ID']?>'>anzeigen</a>
            <?php


            //wenn angemeldeter Nutzer dem Urheber des Posts enspricht, dann auch gelöscht und editiert werden
            if ($_SESSION["ID"] == $row["user_ID"]) {
            ?>
            <a href='Funktionen/deletepost.php?id=<?=$row['ID']?>'>löschen</a>
            <a href='Editieren.php?id=<?=$row['ID']?>'>editieren</a>
            <?php } ?>



        </div>
    </div>




<?php
}
?>
    </div>
</div></div>

</body>