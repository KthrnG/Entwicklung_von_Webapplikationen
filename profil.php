<!--Seite auf der Informationen des Nutzers angezeigt werden-->
<?php
include "includes/assertLogin.php";//Einbindung Kontrolle Eingeloggt
$vorname = $_SESSION['vorname'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$pwd = $_SESSION['pwd'];
$admin = $_SESSION['admin'];
?>
<!DOCTYPE html>
<html>
<head>
    <?php include "includes/head.php" ?>
</head>
<body>

<?php
$page = "profil";
//Einbinden von sämtlichen "Bausteinen" für den Basic Aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Profil </h1>
<div class="form_containerSmall">
  <!--Nutzerinformationen werden angezeigt-->
    <p><b> Vorname: </b><?php echo $vorname ?></p>
    <p><b> Nachname: </b><?php echo $name ?></p>
    <p><b> E-Mail: </b><?php echo $email ?> </p>
    <p><b> Passwort: &bull;&bull;&bull;&bull;&bull;</p>

    <button type="button" value="Check" onclick="window.location = 'editprofil.php'">
        Daten bearbeiten
        <!--Button zur Weiterleitung zur Seite Profil editieren-->
    </button>
</div>

<?php
include "includes/footerbox.php";//Einbindung Footer
?>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
