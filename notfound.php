<!DOCTYPE html>
<html>
<head>
    <?php include "includes/head.php" ?>
</head>
<body>

<?php
$page = "error";
include "includes/connect.php";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Fehler </h1>
<div align="center">
    <p>Ups, hier ist etwas schief gegangen.</p>
    <p>Die gesuchte Seite wurde nicht gefunden!</p>
</div>

<?php
include "includes/footerbox.php";
?>

</body>
</html>
