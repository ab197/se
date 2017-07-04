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
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <style>


        html {

        }

        body {
            padding-top: 60px;
            font-size: 16px;
            font-family: "Futura";
            backgroud: transparent;

            background: url(http://www.lightsniper.de/wordpress/wp-content/gallery/hasenberg/DSC_3309-Panorama.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        h1 {
            font-family: "Futura";
            font-weight: 400;
            font-size: 32px;
        }

        .panel {
            background-color: rgba(255, 255, 255, 0.7532);
        }

        .margin-base-vertical {
            margin: 40px 0;
        }
    </style>
</head>
<body>
<div class="container">
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

                    <button type="submit" class="btn btn-default btn-md">Lift Off!</button> <button type="link" class="btn btn-default btn-md" onclick="location='https://mars.iuk.hdm-stuttgart.de/~ab197/Registrierung.php'">Register</button> <button type="link" class="btn btn-default btn-md" onclick="location='Wersindwir.html'">Who we are!</button>



                    </span>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>