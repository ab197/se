<?php

session_start();

if (isset($_SESSION["ID"])) {

    header("location: Landingpage.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>The Society Explorer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="hintergrund.css" rel="stylesheet" />

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />



</head>
<body>
<div class="container apollo">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
            <div class="panel" style="padding: 20px">
                <h1 class="margin-base-vertical">The Society Explorer</h1>
                <p>
                    We are the World's
                </p>
                <p>
                    most advanced and latest
                </p>
                <p>
                    Social Media Platform!
                </p>
                <br>

                <form action="Funktionen/login.php" method="post">

                  

                        <input name="Email" type="email" class="form-control" id="email" placeholder="Email">

                    <br>
                    <div class="form-group">

                        <input name="Passwort" type="password" class="form-control" id="password" placeholder="Passwort">
                    </div>

                    <button type="submit" class="btn btn-default btn-md">Lift Off!</button>




                    </span>
                </form>

                <button type="link" class="btn btn-default btn-md text-right" onclick="location='Registrierung.php'">Register</button>
                <button type="link" class="btn btn-default btn-md text-right" onclick="location='Wersindwir.php'">Who we are!</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>