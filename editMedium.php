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
$page = "admin";
include("includes/connect.php");
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>
<?php
if (isset($_GET["id"])) {
  $mid = $_GET["id"];

  $sql = "SELECT * FROM medium WHERE id = $_GET[id]";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) != 1) {
      header("Location:notfound.php");
      exit();
  }
  $row = mysqli_fetch_assoc($result);

  mysqli_free_result($result);


  if (isset($_POST['delete'])) {
      $sql =
      "DELETE FROM medium WHERE id = $mid;
       /*DELETE FROM wunschliste WHERE medium_id = ;
       DELETE FROM bewertung WHERE medium_id = ;
       DELETE FROM datei WHERE medium_id = */;";

      if ($conn->query($sql) === TRUE) {
          header("Location:adminMedium.php");
          exit();
      } else {
          echo "Error deleting record: " . $conn->error;
      }
  }
  if (isset($_POST['save'])) {
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

          header("Location:adminMedium.php");
          exit();
      } else {
          echo "Error updating record: " . $conn->error;
      }
  }

}
?>
<h1> Medium ändern </h1>
<div class="form_container">
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
        </button>

        <button type="submit" id="delete_button" name="delete">
            Medium löschen
        </button>
    </form>

</div>

<?php
include "includes/footerbox.php";
?>

</body>
</html>
