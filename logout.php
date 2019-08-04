<!--Nutzer wird ausgeloggt-->
<?php
include "includes/assertLogin.php"//Einbindung Kontrolle ob Nutzer eingeloggt ist
?>
<!DOCTYPE html>
<html>

<head>
    <?php include "includes/head.php" ?>
</head>

<body>

<?php
// Session wird zerstört
session_destroy();
$_SESSION['loggedin'] = false;
$message = "Du bist jetzt ausgeloggt. Bis zum nächsten Mal.";//Nachricht wenn erfolgreich ausgeloggt
?>

<?php
$page = "logout";
//Einbinden von sämtlichen "Bausteinen" für den Basic Aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Logout </h1>
<p style ="text-align:center"><?php echo $message; ?></p><!--Darstellung Nachricht-->

<?php
include "includes/footerbox.php";//Einbindung Footer
?>

</body>
</html>
