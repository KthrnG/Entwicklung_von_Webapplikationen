<!--Seite auf der alle Nachrichten an Admin angezeigt werden-->
<?php
include "includes/assertLogin.php"//Einbindung Kontrolle eingeloggt
?>
<!DOCTYPE html>
<html>

<head>
    <?php include "includes/head.php" ?>
</head>

<body>

<?php
$page = "messagesToAdmin";
//Einbinden von sämtlichen "Bausteinen" für den Basic Aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<?php

if (isset($_POST["delete"])) {
    $del = "DELETE FROM nachrichten WHERE id =$_POST[delete]";
    $stmt = $conn->prepare($del);
    if (!$stmt->execute()) {
		echo "Nachricht geloescht";
	} else {
        $like_error = "Fehler beim Loeschen der Nachricht";
    }
}
?>

<h1>Nachrichten an die Administratoren</h1>

<div class="search-result" >
<?php
//Datenbankabfrage aller Nachrichten
$sql = "SELECT id,to_id, from_id, betreff FROM nachrichten ORDER BY from_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "<table style='min-width: 200px; text-align:center;'>";
  echo "<tr>";
  echo "<th>Absender</th>";
  echo "<th>Betreff</th>";
  echo "<th>ID</th>";
  echo "<th>Loeschen</th>";
  echo "</tr>";
	if($to_id = 1) {
  		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
    		echo "<td><a class='searchlink' href ='detailMessage.php?id= " . $row["id"] . "'>" . $row["from_id"] . "</a> </td>";
    		echo "<td><a class='searchlink' href ='detailMessage.php?id= " . $row["id"] . "'>" . $row["betreff"] . "</a> </td>";
			echo "<td><a class='searchlink' href ='detailMessage.php?id= " . $row["id"] . "'>" . $row["id"] . "</a> </td>";
			echo "<td> <button name='delete' type='submit'  value='" . $messages->id . "'>X</button> </td>";
            echo "</tr>"; }
	}

  echo "</table>";
  mysqli_free_result($result);
} else {//keine Nachricht
  echo "Keine Nachrichten erhalten.";
}
  ?>
</div>

<?php
include "includes/footerbox.php";//Einbindung Footer
?>

</body>

</html>
