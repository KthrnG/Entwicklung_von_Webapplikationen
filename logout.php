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
// Initialize the session
include("includes/connect.php");
session_destroy();
$name = "Gast";
$message = "Du bist jetzt ausgeloggt. Bis zum nächsten Mal.";
?>

<?php
$page = "logout";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Logout </h1>
<p style ="text-align:center"><?php echo $message; ?></p>

<?php
include "includes/footerbox.php";
?>

</body>
</html>
