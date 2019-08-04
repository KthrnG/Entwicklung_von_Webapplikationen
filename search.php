<!--Seite zur Suche von Medien-->
<!DOCTYPE html>
<html>
<head>
    <?php include "includes/head.php" ?>
</head>
<body>

<?php
$page = "search";
//Einbinden von sämtlichen "Bausteinen" für den Basic Aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/connect.php";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1>Suche</h1>
<div class="form_container">
  <!-- Maske in der ein Suchmuster eingegeben werden kann-->
    <form method="post" action="">
        <label>Suchbegriff
            <input type="text" name="suchbegriff">
        </label>
        <button type="submit" name="suche">Suchen</button>
    </form>
</div>
<br>

<?php
if (isset($_POST["suche"])) {
  //Datenbankabfrage aller Medien auf die das Suchmuster zutrifft, bei keiner Eingabe alle Medien
    $suche_sql = "SELECT DISTINCT * FROM medium
                  INNER JOIN datei ON medium.id = datei.medium_id
                  WHERE medium.name LIKE '%$_POST[suchbegriff]%'
                  OR medium.latein_name LIKE '%$_POST[suchbegriff]%'
                  OR medium.standort LIKE '%$_POST[suchbegriff]%'
                  OR medium.erntezeit LIKE '%$_POST[suchbegriff]%'
                  OR medium.aussaat LIKE '%$_POST[suchbegriff]%'";
    $suchergebnis = $conn->query($suche_sql);
    //Darstellung der Ergebnisse in Tabellenform
    if (mysqli_num_rows($suchergebnis) > 0) {
        echo "<div class='search-result'>";
        echo "<table>";
        echo "<tr>";
        echo "<th></th>";
        echo "<th>Name</th>";
        echo "<th>Standort</th>";
        echo "<th>Jahreszeit</th>";
        echo "</tr>";
        while ($medium = $suchergebnis->fetch_object()) {
            echo "<tr>";
            echo "<td> <img class='image' style='width:70px;' src='" . $medium->adr . "' /></td><td>
               <a href ='detail.php?id= " . $medium->id . "'>" . $medium->name . "</a>  </td>";
            echo "<td>" . $medium->standort . "</td>";
            echo "<td>" . $medium->erntezeit . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {//keine Medien
        echo "<div align='center'>Keine Ergebnisse gefunden</div>";//Meldung wenn keine Medien passend zum Suchmuster gefunden wurden
    }
}
?>

<?php
include "includes/footerbox.php";//Einbindung Footer
?>

</body>
</html>
