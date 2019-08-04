<!--Willkommensseite nach dem Login-->
<?php
include "includes/assertLogin.php"//Einbindung Kontrolle Login
?>
<!DOCTYPE html>
<html>

<head>
    <?php include "includes/head.php" ?>
</head>

<body>
<?php
$name = $_SESSION['vorname'];
$message = "Willkommen, <b>$name</b>!";//Nachricht mit Namen des Nutzers
?>

<?php
$page = "welcome";
//Einbinden von sämtlichen "Bausteinen" für den Basic Aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Login erfolgreich </h1>
<p style="text-align:center"><?php echo $message; ?></p>

<?php
include "includes/footerbox.php";//Footer
?>

</body>
</html>
