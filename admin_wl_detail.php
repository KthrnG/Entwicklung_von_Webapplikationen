<!--Seite auf der der Admin die Wunschliste eines Nutzers sehen kann-->
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
$page = "wunschlisteAdmin";
//Einbinden von sämtlichen "Bausteinen" für den Basic aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Wunschliste </h1>
<div class="search-result">
    <?php
    if (isset($_GET["id"])) {
      //Abruf mit dem alle Medien, die sich auf der Wunschliste des abgefragten Nutzers befinden, Darstellung in Tabellenform
        $sql = "SELECT medium.name, datei.adr, medium.id, medium.beschreibung, medium.erntezeit, medium.standort
            FROM medium
            INNER JOIN datei ON medium.id = datei.medium_id
            JOIN wunschliste ON medium.id = wunschliste.medium_id WHERE wunschliste.user_id = $_GET[id]
            ORDER BY medium.name";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            echo "<table>";
            echo "<tr>";
            echo "<th></th>";
            echo "<th>Name</th>";
            echo "<th>Standort</th>";
            echo "<th>Jahreszeit</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td> <img class='image' style='width:70px;' src='" . $row["adr"] . "' /></td><td>
               <a href ='detail.php?id= " . $row["id"] . "'>" . $row["name"] . "</a>  </td>";
                echo "<td>" . $row["standort"] . "</td>";
                echo "<td>" . $row["erntezeit"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else {//keine Medien
            echo "Nutzer hat keine Pflanzen auf der Wunschliste";
        }
    }

    ?>
</div>

<?php
include "includes/footerbox.php";//Einbinden Footer
?>

</body>
</html>
