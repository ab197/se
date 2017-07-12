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
    <div class="row">
        <div class="col-md-3">

            <div class="gemini">

            <img src="Bilder/Profilbild/<?= $_SESSION['ID'] ?>" class="img-responsive">
            <h2><?= $_SESSION["Benutzername"] ?></h2>




            <h2>du folgst: </h2>

                </div>

            <div class="row">


            <?php
            $sql="SELECT folgt_ID FROM folgen WHERE user_ID = ($ID)";
            $stmt=$dbh->prepare($sql);
            $stmt->execute();
            $ergebnis=$stmt->fetchAll();
            foreach ($ergebnis as $value ){
                ?>

                <div class="col-xs-3">
                    <a href="User.php?ID=<?= $value['folgt_ID'] ?>">
                        <img src="Bilder/Profilbild/<?= $value['folgt_ID'] ?>" class="img-responsive">
                    </a>
                </div>


                <?php
            }
            ?>

            </div>
    </div>
    <div class="col-md-9">

<h1>Alle Posts</h1>

<?php
$ID=$_SESSION["ID"];
$sql = "SELECT * FROM folgen WHERE user_ID= :user_ID";
$stmt=$dbh->prepare ($sql);
$stmt->bindParam(":user_ID", $ID);
$stmt->execute();
$folgen=$stmt->fetchAll();
$folgt = array();

foreach ($folgen as $value){
    $folgt[] = $value["folgt_ID"];
}

$folgt=implode(",",$folgt);





$sql="SELECT * FROM posts WHERE user_ID IN ($folgt) ORDER BY Datum";
$stmt=$dbh->prepare ($sql);
$stmt->execute();
$result=$stmt->fetchAll();


foreach ($result as $row) {
    $sql = "SELECT Benutzername FROM user WHERE ID = :user_ID";
    $stmt= $dbh->prepare($sql);

    $stmt->bindParam(":user_ID", $row['user_ID']);

    $stmt->execute();

    $user=$stmt->fetch();

?>



    <div class="panel panel-default">
        <div class="panel-heading">
                <a href="User.php?ID=<?= $row['user_ID']?>">
                <h2 class="panel-title"><?= $user['Benutzername'] ?></h2> </a>
                <span style="color: #AAA;"><?= $row['Datum'] ?></span>


        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-1">
                    <img src="Bilder/Profilbild/<?= $row['user_ID'] ?>" class="img-responsive">
                    </div>
                <div class="col-xs-11">

            <?php
            if ($row['bild'] != NULL)
            {
                ?>
                <img src="Bilder/<?= $row['bild'] ?>" class="img-responsive" style="margin-bottom: 50px;">
                <?php
            }
            ?>
            <p class="lead">
                <?= $row['text'] ?>
            </p>
            </div>
        </div>
        </div>
        <div class="panel-footer">




            <a href='Viewpost.php?id=<?=$row['ID']?>'>anzeigen</a>
            <?php
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