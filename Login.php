<?php

session_start();

if (isset($_SESSION["ID"])) {

    header("location: Landingpage.php");
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

<div class="container">

    <h1>Login</h1>

    <form action="Funktionen/login.php" method="post">

        <div class="form-group">
            <label for="email">Email Adresse</label>
            <input name="Email" type="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Passwort</label>
            <input name="Passwort" type="password" class="form-control" id="password" placeholder="Passwort">
        </div>

        <button type="submit" class="btn btn-default">Lift Off!</button>
    </form>

</div>




</body>
</html>

