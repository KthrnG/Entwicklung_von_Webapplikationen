<!DOCTYPE html>
<html>
<head>
    <?php include "includes/head.php" ?>
</head>
<body>

<?php
$page = "showall";
include("includes/connect.php");
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Alle Kräuter</h1>
<div class="search-result">
    <?php

    if (isset($_POST['select'])) {

        $sql = "SELECT medium.name, datei.adr, medium.id, medium.beschreibung, medium.erntezeit, medium.standort FROM (medium INNER JOIN datei ON medium.id = datei.medium_id) ORDER BY medium.name";
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
               <a class='searchlink' href ='detail.php?id= " . $row["id"] . "'>" . $row["name"] . "</a>  </td>";
                echo "<td>" . $row["standort"] . "</td>";
                echo "<td>" . $row["erntezeit"] . "</td>";
                echo "</tr>";
                /*echo "<li>
                <img class='image' style='width:70px;' src='".$row["adr"]."' />
                <a href ='".$row["link"]."'>"
                . $row["mname"].
                "</a> Standort: ".$row["descrp"].$row["descrp2"]." Jahreszeit: ". $row["month"] ." ". $row["month2"].
                 "</li> <br> <br>";*/
            }
            echo "</table>";
            mysqli_free_result($result);
        } /*

                      //Durchschnittliche Bewertung anzeigen
                      $sqlavg = "SELECT ROUND(AVG(wert),2) FROM bewertung WHERE mname = '$mname'";
                      $resultavg = mysqli_query($conn, $sqlavg);
                      if (mysqli_num_rows($resultavg) > 0) {
                        while($rowavg= mysqli_fetch_assoc($resultavg)) {
                          $avgwert = "Durchschnittliche Bewertung: ". $rowavg["ROUND(AVG(wert),2)"];
                        }
                        $end = $avgwert;
                    } else{
                        //T: Berwertung nicht anzeigen

                    }

                    */
        else {//keine Medien
            echo "Keine Kräuter gefunden";
        }
        //echo "The select function is called.";
        //exit;
    }


    ?>
</div>

<?php
include "includes/footerbox.php";
?>

</body>
</html>
