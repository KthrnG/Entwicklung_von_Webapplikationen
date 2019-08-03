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
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Adminbereich </h1>
<br><br><br>
<div align="center">
<button type="button" id="basicButton" value="Check" onclick="window.location = 'admin_wl.php'">
    Wunschlistenverwaltung
</button>
<br>
<button type="button" id="basicButton" value="Check" onclick="window.location = 'adminMedium.php'">
    Medienverwaltung
</button>
<br>
<button type="button" id="basicButton" value="Check" onclick="window.location = 'admin_users.php'">
    Nutzerverwaltung
</button>
</div>

<?php
include "includes/footerbox.php";
?>

</body>
</html>
