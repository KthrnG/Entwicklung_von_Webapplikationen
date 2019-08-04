<!--Seite zur Information, dass Nachricht erfolgreich gesendet wurde-->
<?php
include "includes/assertLogin.php"//Einbindung Kontrolle Eingeloggt
?>
<!DOCTYPE html>
<html>

<head>
    <?php include "includes/head.php" ?>
</head>

<body>

<?php
$page = "nachrichtGesendet";
//Einbinden von sämtlichen "Bausteinen" für den Basic Aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Die Nachricht wurde versendet! </h1>


<?php
include "includes/footerbox.php";//Einbindung Footer
?>

</body>
</html>
