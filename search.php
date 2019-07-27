<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" content="width=device-width">
    <title>Kräutergarten</title>
    <link rel="stylesheet" href="css/main_stylesheet.css">
</head>
<body>

<?php
$page = "search";
include "includes/connect.php";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Suche
    <div class="search">
        <input>
    </div>
</h1>
<div align="center">
    <form method="post" action="showall.php">
        <button type="submit" class="button" name="select">Alle anzeigen</button>
    </form>
</div>

<?php
include "includes/footerbox.php";
?>

</body>
</html>
