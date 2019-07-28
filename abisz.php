<!DOCTYPE html>
<html>
<head>
    <?php include "includes/head.php" ?>
</head>
<body>

<?php
$page = "abisz";
include "includes/connect.php";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Kräuter A-Z</h1>

<div class="imgboxes">
    <?php
    $sql = "SELECT medium.name, datei.adr, medium.id FROM (medium INNER JOIN datei ON medium.id = datei.medium_id) ORDER BY medium.name";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) < 0) {
        header("Location:error.php");
        exit();
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <div class="overlay-image">
            <a href="' . "detail.php?id=" . $row["id"] . '">
                <img class="image" src="' . $row["adr"] . '"/>
                <div class="hover">
                    <div class="text">' . $row["name"] . '</div>
                </div>
            </a>
        </div>
        ';
    }
    mysqli_free_result($result);
    ?>
</div>

<?php
include "includes/footerbox.php";
?>

</body>
</html>
