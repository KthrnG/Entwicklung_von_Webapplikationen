<!--Seite für alle Adminfunktionen-->
<?php
include "includes/assertLogin.php"
?>
<!DOCTYPE html>
<html>
<head>
    <?php include "includes/head.php" ?>
</head>
<body>

<?php
$page = "admin";
//Einbinden von sämtlichen "Bausteinen" für den Basic Aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Adminbereich </h1>
<br><br><br>
<div align="center">
  <!--Button zur Weiterleitung zur Wunschlistenverwaltung-->
<button type="button" id="basicButton" value="Check" onclick="window.location = 'admin_wl.php'">
    Wunschlistenverwaltung
</button>
<br>
<!--Button zur Weiterleitung zur Medienverwaltung-->
<button type="button" id="basicButton" value="Check" onclick="window.location = 'adminMedium.php'">
    Medienverwaltung
</button>
<br>
<!--Button zur Weiterleitung zur Nutzerverwaltung-->
<button type="button" id="basicButton" value="Check" onclick="window.location = 'admin_users.php'">
    Nutzerverwaltung
</button>
</div>

<?php
include "includes/footerbox.php";//Einbindung Footer
?>

</body>
</html>
