<!--Anzeige aller Informationen eines Nutzers für den Admin-->
<?php
include "includes/assertLogin.php"//Einbinden Kontrolle Eingeloggt
?>
<!DOCTYPE html>
<html>
<head>
    <?php include "includes/head.php" ?>
</head>
<body>

<?php
$page = "detailUser";
//Einbinden von sämtlichen "Bausteinen" für den Basic aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<?php
if (isset($_GET["id"])) {
  //Datenbankabruf mit allen Informationen eines Nutzers
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
  <!--Darstellung aller Informationen eines Nutzers und Link zu dessen Wunschliste-->
    <p><b> Vorname: </b><?php echo $row["vorname"] ?></p>
    <p><b> Nachname: </b><?php echo $row["name"] ?></p>
    <p><b> E-Mail: </b><?php echo $row["email"] ?> </p><br><br>
    <a href ='admin_wl_detail.php?id= <?php echo $row["id"]?> 'style="color: #0a632d; "> Wunschliste </a>
</div>

<?php
include "includes/footerbox.php";//Einbindung Footer
?>

</body>
</html>
