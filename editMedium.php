<!--Seite für Admin, auf der ein ausgewähltes Medium editiert oder gelöscht werden kann-->
<?php
include "includes/assertLogin.php"//Einbindung Kontrolle Eingeloggt
?>
<!DOCTYPE html>
<html>
<head>
    <?php include "includes/head.php" ?>
</head>
<body>

<?php
$page = "admin";
//Einbinden von sämtlichen "Bausteinen" für den Basic Aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>
<?php
if (isset($_GET["id"])) {
  $mid = $_GET["id"];
//Datenbankabruf aller Informationen eines Mediums
  $sql = "SELECT * FROM medium WHERE id = $_GET[id]";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) != 1) {
      header("Location:notfound.php");
      exit();
  }
  $row = mysqli_fetch_assoc($result);

  mysqli_free_result($result);


  if (isset($_POST['delete'])) {
     
    //Medium aus der Datenbank löschen
      $sql = "DELETE FROM medium WHERE id = $mid";

      if ($conn->query($sql) === TRUE) {
          header("Location:adminMedium.php");//Weiterleitung bei erfolgreichen Löschen zur Medienübersicht
          exit();
      } else {
          echo "Error deleting record: " . $conn->error;
      }
  }
  if (isset($_POST['save'])) {
    //geänderte Werte in der Datenbank updaten
      $newname = $_POST['name'];
      $newLname = $_POST['latein_name'];
      $newstandort = $_POST['standort'];
      $newaussaat = $_POST['aussaat'];
      $newernte = $_POST['erntezeit'];
      $newbeschreibung = $_POST['beschreibung'];

      $upd = "UPDATE medium SET name = ?, latein_name = ?, standort = ?, aussaat = ?, erntezeit = ?, beschreibung = ? WHERE id = ?";
      $stmt = $conn->prepare($upd);
      $stmt->bind_param("ssssssi", $newname, $newLname, $newstandort, $newaussaat, $newernte, $newbeschreibung, $mid);

      if ($stmt->execute()) {

          header("Location:adminMedium.php");//Bei Erfolg weiterleitung auf die Medienübersicht
          exit();
      } else {
          echo "Error updating record: " . $conn->error;
      }
  }

}
?>

<h1> Medium ändern </h1>
<div class="form_container">
  <!--Form in der bisherige Daten angezeigt werden und dort umgeändert werden können-->
    <p> Bitte gib die neuen Daten ein </p>
    <form action="" method="post">
        <label>Name
            <input type="text" name="name" value="<?php echo $row["name"] ?>"/>
        </label>

        <label>Lateinischer Name
            <input type="text" name="latein_name" value="<?php echo $row["latein_name"] ?>"/>
        </label>

        <label>Standort
            <input type="text" name="standort" value="<?php echo $row["standort"] ?>"/>
        </label>
        <label>Aussaats Zeit
            <input type="text" name="aussaat" value="<?php echo $row["aussaat"] ?>"/>
        </label>

        <label>Erntezeit
            <input type="text" name="erntezeit" value="<?php echo $row["erntezeit"] ?>"/>
        </label>

        <label>Beschreibung
            <input type="text" name="beschreibung" value="<?php echo $row["beschreibung"] ?>"/>
        </label>



        <button type="submit" name="save">
            Änderungen speichern
            <!--Button zur Speicherung der Änderungen-->
        </button>

        <button type="submit" id="delete_button" name="delete">
            Medium löschen
            <!--Button zum Löschen des Mediums-->
        </button>
    </form>

</div>

<?php
include "includes/footerbox.php";//Einbinden Footer
?>

</body>
</html>
