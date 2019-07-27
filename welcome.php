<!DOCTYPE html>
<html>

<head>
    <?php include "includes/head.php" ?>
</head>

<body>
<?php
include("includes/connect.php");
$name = $_SESSION['name'];
$message = "Willkommen, <b>$name</b>!";
?>

<?php
$page = "welcome";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Login erfolgreich </h1>
<p style ="text-align:center"><?php echo $message; ?></p>

<?php
include "includes/footerbox.php";
?>

</body>
</html>
