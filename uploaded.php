<!--Seite nachdem neues Medium erfolgreich hinzugefügt wurde, Möglichkeit Bild für das Medium hochzuladen-->
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
$page = "mediumAdded";
//Einbinden von sämtlichen "Bausteinen" für den Basic Aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>


<h1> Das Bild wurde hinzugefuegt! </h1>

<?php
include "includes/footerbox.php";//Einbindung Footer
?>

</body>
</html>
