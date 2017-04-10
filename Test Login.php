<!DOCTYPE html>
<html>
<head>
    <title>The&nbsp;Society&nbsp;Explorer</title>

    <link rel="stylesheet" href="Test%20Background.css">

</head>
<body>

<center>

    <p align="center"><font face="futura" color="#FFFFFF"><h1>Society Explorer</h1></font></p>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</center>

<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

if(isset($_GET['register'])) {
    $error = false;
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }
    if(strlen($passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if($passwort != $passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }

    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        if($user !== false) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }
    }

    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO users (email, passwort) VALUES (:email, :passwort)");
        $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash));

        if($result) {
            echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    }
}

if($showFormular) {
    ?>

  <center>
<br>
      <br>
      <br>
      <br>
    <form action="?register=1" method="post">

        <p align="center"><font face="futura" color="#FFFFFF">Username</font></p>

        <input type="email" size="40" maxlength="250" name="email">


        <p align="center"><font face="futura" color="#FFFFFF">Password</font></p>

        <input type="password" size="40"   maxlength="250" name="passwort"><br>

        <br>

        <input type="submit" value="Lift Off!">

        <input type="button" value="Create Account!" onClick="location.href='Zweiter%20Registertest.php'">

        <input type="button" value="Society Explorer?" onClick="location.href='Whoweare.html'">


    </form>

  </center>
    <?php
} //Ende von if($showFormular)
?>

</body>
</html>