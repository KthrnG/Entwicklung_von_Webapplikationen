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

<?php
if (isset($_POST["delete"])) {
    $del = "DELETE FROM wunschliste WHERE user_id=$_POST[delete]";
    $stmt = $conn->prepare($del);
    if (!$stmt->execute()) {
        $like_error = "Fehler beim Löschen der Wunschliste";
    }
}
?>

<h1>Adminbereich Wunschliste</h1>

<div class="search-result">
    <form action="" method="post">
        <?php

        $sql_users = "SELECT DISTINCT u.id, u.vorname, u.name FROM users u JOIN wunschliste w on u.id = w.user_id";
        $users = $conn->query($sql_users);

        if (mysqli_num_rows($users) > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Wunschliste</th>";
            echo "<th>Löschen</th>";
            echo "</tr>";
            while ($user = $users->fetch_object()) {
                $sql_wl = "SELECT m.id, m.name FROM medium m JOIN wunschliste w on m.id = w.medium_id WHERE w.user_id = $user->id";
                $medien = $conn->query($sql_wl);

                echo "<tr>";
                echo "<td><a class='searchlink' href='admin_wl_detail.php?id=" . $user->id . "'>" . $user->vorname . " " . $user->name . "</a></td>";
                echo "<td>";
                while ($medium = $medien->fetch_object()) {
                    echo "<a class='searchlink' href ='detail.php?id=" . $medium->id . "'>" . $medium->name . "</a> ";
                }
                echo "</td>";
                echo "<td> <button name='delete' type='submit' value='" . $user->id . "'>X</button> </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {//keine Medien
            echo "0 results";
        }
        ?>
    </form>
</div>

<?php
include "includes/footerbox.php";
?>

</body>

</html>
