<?php

include "dbh.php";
session_start();

if (!isset($_SESSION["ID"])) {

    header("location: Login.php");
}


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


<div class="container">



<h1>alle posts</h1>

<?php

$sql="SELECT * FROM posts";
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
            <h2 class="panel-title"><?= $user['Benutzername'] ?></h2>
            <span style="color: #AAA;"><?= $row['Datum'] ?></span>
        </div>
        <div class="panel-body">
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
        <div class="panel-footer">
            

            
            
            <a href='Viewpost.php?id=<?=$row['ID']?>'>anzeigen</a>
            <a href='Funktionen/deletepost.php?id=<?=$row['ID']?>'>löschen</a>
            <a href='Editieren.php?id=<?=$row['ID']?>'>editieren</a>
        </div>
    </div>




<?php
}
?>

</div>
</body>