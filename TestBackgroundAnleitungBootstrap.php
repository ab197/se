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
            padding-top: 20px;
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
                    Someone Told Me Long Ago
                 </p>
                 <p>
                    Ich will den Regen sehen?
                </p>
                <p>
                    Judith willst Du auch den Regen sehen?
                </p>
                <form action="/mailing-list" method="post" class="margin-base-vertical">
                <p class="input-group">

                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input type="text" class="form-control input-large" name="Username" placeholder="Neil Armstrong" />
                </p>
                    <p class="input-group">

                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="text" class="form-control input-large" name="email" placeholder="info@belphitheband.com" />
                    </p>

                <p class="help-block text-center"><small>Become a part of the family</small></p>
                <p class="text-center">
                <button type="submit" class="btn btn-success btn-large"><span class="glyphicon glyphicon-plane"></span> Lift Off!</button>
                </p>
                </span>
                </form>
                    </div>
            </div>
        </div>
     </div>

</body>
</html>