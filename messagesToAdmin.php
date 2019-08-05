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

<h1>Nachrichten an die Administratoren</h1>

<div class="search-result" >
<?php
//Datenbankabfrage aller Nachrichten
$sql = "SELECT id,to_id, from_id, betreff FROM nachrichten ORDER BY from_id";
$result = mysqli_query($conn, $sql);
//Wenn es Nachrichten gibt, also die Anzahl der Zeilen (1 Nachricht = 1 Zeile) wird eine Tabelle erstellt
if (mysqli_num_rows($result) > 0) {
  echo "<table style='min-width: 200px; text-align:center;'>";
  echo "<tr>";
  echo "<th>Absender</th>";
  echo "<th>Betreff</th>";
  echo "</tr>";
    //Macht vielleicht mehr Sinn, diese Abfrage mit in die erste zu packen
	if($to_id = 1) {
  		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
    		echo "<td><a class='searchlink' href ='detailUser.php?id= " . $row["id"] . "'>" . $row["from_id"] . "</a> </td>";
    		echo "<td><a class='searchlink' href ='detailMessage.php?id= " . $row["id"] . "'>" . $row["betreff"] . "</a> </td>";
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
