<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" content="width=device-width">
    <title>Kräutergarten</title>
    <link rel="stylesheet" href="css/main_stylesheet.css">
</head>
<body>
<?php
include("includes/connect.php");
$name = $_SESSION['name'];
?>

<?php
$page = "wunschliste";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Wunschliste von <?php echo $name ?> </h1>

<?php
include "includes/footerbox.php";
?>

</body>
</html>
