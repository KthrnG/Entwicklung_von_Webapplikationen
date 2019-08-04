<!--Ansicht für den Admin aller Wunschlisten aller Nutzer mit Möglichkeit Wunschlkisten zu löschen-->
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
$page = "admin_wl";
//Einbinden von sämtlichen "Bausteinen" für den Basic Aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<?php
//Löschen der Wunschliste von einem Nutzer aus der Datenbank
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
        //Alle Wunschlisten werden aus der Datenbank abgerufen mit Nutzer
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
              //Medien der Wunschliste werden namentlich angezeigt
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
        } else {//keine WUnschlisten
            echo "0 results";
        }
        ?>
    </form>
</div>

<?php
include "includes/footerbox.php";//Einbinden Footer
?>

</body>

</html>
