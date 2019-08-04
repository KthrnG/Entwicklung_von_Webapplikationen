<!--Seite für den Admin auf der alle Medien angezeigt werden mit den Möglichkeiten, neue Medien anzulegen und vorhandene Medien zu editieren-->
<?php
include "includes/assertLogin.php"//Einbinden Kontrolle ob eingeloggt
?>
<!DOCTYPE html>
<html>
<head>
    <?php include "includes/head.php" ?>
</head>
<body>

<?php
$page = "admin";
//Einbinden von sämtlichen "Bausteinen" für den Basic aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Adminbereich Medien</h1>
<div align="center">
<button type="button" id="basicButton" value="Check" onclick="window.location = 'adminNewMedium.php'">
  <!--weiterleitender Button zur Seite, auf der ein neues Medium angelegt werden kann-->
    Neues Kraut anpflanzen
</button>
<br>
</div>
<div class="search-result">
<?php
//Alle Medien werden aus der Datenbank abgerufen, Darstellung in Tabellenform mit Button bei jeden Medium, welcher auf eine Seite weiterleitet, auf der das Medium editiert werden kann
$sql = "SELECT medium.name, datei.adr, medium.id, medium.beschreibung, medium.erntezeit, medium.standort FROM (medium INNER JOIN datei ON medium.id = datei.medium_id) ORDER BY medium.name";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th></th>";
    echo "<th>Name</th>";
    echo "<th>Standort</th>";
    echo "<th>Jahreszeit</th>";
    echo "<th></th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td> <img class='image' style='width:70px;' src='" . $row["adr"] . "' /></td><td>
       <a class='searchlink' href ='detail.php?id= " . $row["id"] . "'>" . $row["name"] . "</a>  </td>";
        echo "<td>" . $row["standort"] . "</td>";
        echo "<td>" . $row["erntezeit"] . "</td>";
        echo "<td> <a class='button' href ='editMedium.php?id= " . $row["id"] . "'>Bearbeiten</a>  </td>";
        echo "</tr>";

    }
    echo "</table>";
    mysqli_free_result($result);
}
else {//keine Medien
    echo "Keine Medien gefunden";
}

?>
</div>
<?php
include "includes/footerbox.php";//Einbinden Footer
?>

</body>
</html>
