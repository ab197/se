<?php

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


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">

    <h1>Neuer Post</h1>

    <form action="Funktionen/newpost.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="text">post</label>
            <textarea class="form-control" rows="2" id="text" name="text"></textarea>
        </div>
        <div class="form-group">
            <label for="bild">Bild hochladen</label>
            <input type="file" name="bild">
        </div>

        <button type="submit" name="submit" class="btn btn-default">Post!</button>
    </form>

</div>




</body>
</html>

