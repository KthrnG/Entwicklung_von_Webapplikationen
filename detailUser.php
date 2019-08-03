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
$page = "detailUser";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<?php
if (isset($_GET["id"])) {
    $sql = "SELECT id, name , vorname, email FROM users WHERE users.id = $_GET[id]";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 1) {
        header("Location:notfound.php");
        exit();
    }
    $row = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
}

?>
<h1> Informationen zu  <?php echo $row["vorname"] ?> </h1>
<div class="form_containerSmall" >
    <p><b> Vorname: </b><?php echo $row["vorname"] ?></p>
    <p><b> Nachname: </b><?php echo $row["name"] ?></p>
    <p><b> E-Mail: </b><?php echo $row["email"] ?> </p><br><br>
    <a href ='admin_wl_detail.php?id= <?php echo $row["id"]?> 'style="color: #0a632d; "> Wunschliste </a>
</div>

<?php
include "includes/footerbox.php";
?>

</body>
</html>
