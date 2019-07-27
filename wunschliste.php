<!DOCTYPE html>
<html>
<head>
    <?php include "includes/head.php" ?>
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
