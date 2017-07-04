<?php

session_start();include "dbh.php";

if (!isset($_SESSION["ID"])) {

    header("location: Login.php");
}
$sql="SELECT * FROM posts WHERE ID = :ID";
$stmt=$dbh->prepare ($sql);
$stmt->bindParam(":ID", $_GET["id"]);
$stmt->execute();
$result=$stmt->fetch()
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

    <h1>Post editieren</h1>

    <form action="Funktionen/editieren.php?id=<?= $_GET["id"] ?>" method="post">
        <div class="form-group">
            <label for="text">post</label>
            <textarea class="form-control" rows="2" id="text" name="text" placeholder="<?= $result['text'] ?>"></textarea>
        </div>

        <button type="submit" class="btn btn-default">Post!</button>
    </form>

</div>




</body>
</html>
