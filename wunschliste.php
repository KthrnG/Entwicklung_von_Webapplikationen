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
$name = $_SESSION['vorname'];
?>

<?php
$page = "wunschliste";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Wunschliste von <?php echo $name ?> </h1>

<div class="search-result">
    <?php

    $sql = "SELECT medium.name, datei.adr, medium.id, medium.beschreibung, medium.erntezeit, medium.standort
            FROM medium
            INNER JOIN datei ON medium.id = datei.medium_id
            JOIN wunschliste ON medium.id = wunschliste.medium_id WHERE wunschliste.user_id = $_SESSION[uid]
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
        echo "Keine Kräuter auf der Wunschliste";
    }

    ?>
</div>

<?php
include "includes/footerbox.php";
?>

</body>
</html>
