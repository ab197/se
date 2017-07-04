<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The&nbsp;Society&nbsp;Explorer</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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

    <h1>Registrierung</h1>

    <form action="Funktionen/registrierung.php" method="post">
        <div class="form-group">
            <label for="username">Benutzername</label>
            <input name="Username" type="text" class="form-control" id="username" placeholder="Benutzername">
        </div>
        <div class="form-group">
            <label for="email">Email Adresse</label>
            <input name="Email" type="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Passwort</label>
            <input name="Passwort" type="password" class="form-control" id="password" placeholder="Passwort">
        </div>

        <div class="form-group">
            <label for="password2">Passwort Wiederholen</label>
            <input name="Passwort2" type="password" class="form-control" id="password2" placeholder="Passwort">
        </div>

        <button type="submit" class="btn btn-default">Lift Off!</button>
    </form>

                </div>
            </div>
            </div>
</div>




</body>
</html>

