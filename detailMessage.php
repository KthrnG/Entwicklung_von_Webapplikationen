<!--Seite auf der eine Nachricht für den Admin angezeigt wird-->
<?php
include "includes/assertLogin.php"//Einbinden Kontrolle Einloggen
?>
<!DOCTYPE html>
<html>
<head>
    <?php include "includes/head.php" ?>
</head>
<body>

<?php
$page = "detailMessage";
//Einbinden von sämtlichen "Bausteinen" für den Basic aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<?php
if (isset($_GET["id"])) {
  //Datenbankabfrage der Nachricht
    $sql = "SELECT id, from_id , betreff, message FROM nachrichten WHERE nachrichten.id = $_GET[id]";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 1) {
        header("Location:notfound.php");
        exit();
    }
    $row = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
}

?>
<!--Anzeige der Nachricht-->
<h1>Nachricht von  <?php echo $row["from_id"] ?> </h1>
<div class="form_containerSmall" >
    <p><b> Betreff: </b><?php echo $row["betreff"] ?></p>
    <p><b> Nachricht: </b><?php echo $row["message"] ?></p><br><br>
</div>

<?php
include "includes/footerbox.php";//Einbindne Footer
?>

</body>
</html>
