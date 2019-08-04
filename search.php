<!DOCTYPE html>
<html>
<head>
    <?php include "includes/head.php" ?>
</head>
<body>

<?php
$page = "search";
include "includes/connect.php";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1>Suche</h1>
<div class="form_container">
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
    $suche_sql = "SELECT DISTINCT * FROM medium
                  INNER JOIN datei ON medium.id = datei.medium_id
                  WHERE medium.name LIKE '%$_POST[suchbegriff]%'
                  OR medium.latein_name LIKE '%$_POST[suchbegriff]%'
                  OR medium.standort LIKE '%$_POST[suchbegriff]%'
                  OR medium.erntezeit LIKE '%$_POST[suchbegriff]%'
                  OR medium.aussaat LIKE '%$_POST[suchbegriff]%'";
    $suchergebnis = $conn->query($suche_sql);
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
        echo "<div align='center'>Keine Ergebnisse gefunden</div>";
    }
}
?>

<?php
include "includes/footerbox.php";
?>

</body>
</html>
