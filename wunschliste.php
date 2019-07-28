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
$name = $_SESSION['vorname'];
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
