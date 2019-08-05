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
  $test = $_GET["id"];
 
//Datenbankabruf aller Informationen eines Mediums
  $sql = "SELECT * FROM nachrichten WHERE id = $_GET[id]";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) != 1) {
      header("Location:notfound.php");
      exit();
  }
  $row = mysqli_fetch_assoc($result);

 // mysqli_free_result($result);
	

if (isset($_POST['delete'])) {
    //Nachrichten aus der Datenbank löschen
      $sql ="DELETE FROM nachrichten WHERE id = $test";

      if ($conn->query($sql) === TRUE) {
          header("Location:messagesToAdmin.php");//Weiterleitung bei erfolgreichen Löschen 
          exit();
      } else {
          echo "Error deleting record: " . $conn->error;
      }
  }
}

?>


<!--Anzeige der Nachricht-->
<h1>Nachricht von  <?php echo $row["from_id"] ?> </h1>
<div class="form_container" >
	<form action="" method="post">
    <label>Betreff: </label><?php echo $row["betreff"] ?><br><br>
    <label>Nachricht:</label><?php echo $row["message"] ?><br><br>
	<button type='submit' id='delete_button' name='delete'>Nachricht löschen</button>
	</form>
</div>



<?php
include "includes/footerbox.php";//Einbindne Footer
?>

</body>
</html>
