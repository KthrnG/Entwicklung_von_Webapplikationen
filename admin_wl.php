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
$page = "admin_wl";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

    <h1>Adminbereich</h1>

    <div class="search-result">
        <?php

    $sql_users = "SELECT DISTINCT u.id, u.vorname, u.name FROM users u JOIN wunschliste w on u.id = w.user_id";
    $result = mysqli_query($conn, $sql_users);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Wunschliste</th>";
        echo "<th>Löschen</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($result)) {
//            $sql_wl = "SELECT m.name FROM medium m JOIN wunschliste w on m.id = w.medium_id WHERE w.user_id = $row[id]";
//            $result_wl = mysqli_query($conn, $sql_users);
//            $row_wl = mysqli_fetch_assoc($result_wl);
//            echo $row_wl["name"];
            echo "<tr>";
            echo "<td>" . $row["vorname"] . " " . $row["name"] . "</td>";
            echo "<td> <a href ='detail.php?id= " . $row["id"] . "'>" . $row["name"] . "</a>  </td>";
            echo "<td> <button name='delete' value='" . $row["id"] . "'>X</button> </td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else {//keine Medien
        echo "0 results";
    }

    ?>
    </div>

    <?php
include "includes/footerbox.php";
?>

</body>

</html>
