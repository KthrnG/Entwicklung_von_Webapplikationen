<!--Seite auf der alle Details von einem Medium aus der Datenbank angezeigt werden-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" content="width=device-width">
    <title></title>
    <link rel="stylesheet" href="css/main_stylesheet.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
</head>

<body>
<?php
$page = "detail";
//Einbinden von sämtlichen "Bausteinen" für den Basic aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/connect.php";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<?php
if (isset($_GET["id"])) {
    //Datenbankabfrage aller Informationen von einem Medium
    $sql = "SELECT medium.name, datei.adr, medium.id, medium.beschreibung, medium.erntezeit, medium.standort, medium.latein_name, medium.aussaat FROM (medium INNER JOIN datei ON medium.id = datei.medium_id) WHERE medium.id = $_GET[id]";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 1) {
        header("Location:notfound.php");
        exit();
    }
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
}
?>

<div class="plantbox">
    <div class="relative">
        <img class="image" src="<?php echo $row["adr"] ?>" alt="<?php echo $row["name"] ?>"/>
        <?php
        //Einbinden zur Bewertung, durchschnittliche Bewertung und Wunschlistenbutton
        include "includes/bewertung.php";
        include "includes/like.php";
        include "includes/average.php";
        ?>
    </div>

    <div class="descrBox">
        <div class="steckbrief">
            <h2><?php echo $row["name"] ?></h2>
            <p><?php echo $row["latein_name"] ?></p>
            <table>
                <caption>Merkmale von <?php echo $row["name"] ?></caption>
                <tbody>
                <tr>
                    <td>Standort</td>
                    <td><?php echo $row["standort"] ?></td>
                </tr>
                <tr>
                    <td>Aussaat</td>
                    <td><?php echo $row["aussaat"] ?></td>
                </tr>
                <tr>
                    <td>Erntezeit</td>
                    <td><?php echo $row["erntezeit"] ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="beschreibung">
            <table>
                <caption>Beschreibung</caption>
                <tbody>
                <tr>
                    <td><?php echo $row["beschreibung"] ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include "includes/footerbox.php";//Einbinden Footer
?>

</body>
</html>
