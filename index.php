<!DOCTYPE html>
<html>

<head>
    <?php include "includes/head.php" ?>
</head>

<body>

<?php
$page = "index";
include "includes/connect.php";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<!--.................
.................
.................
Textboxes Area
.................
.................
.................
-->
<h1> Wie es funktioniert </h1>
<!-- Invisible container box-->
<div class="textboxes">
    <!--visible Boxes with text-->
    <div class="box1">
        <p> Das Kräuterarchiv ist eine Onlineplattform auf der Informationen zum Anlegen eines eigenen Kräutergartens
            liefern soll.
            In order to promote and facilitate the cultivation of plants in a local and sustainable way.

            In the same way it seems important to us to be in constant contact with the user allowing him to be an
            active part of the community and to rank the information that is presented in the platform.

        </p>
    </div>
    <div class="box2">
        <p> Noosphere ist eine Online-Plattform, die auf einer digitalen Bibliothek basiert,
            die allgemeine Informationen über die Pflege, die ideale Vegetationszeit und die
            Behandlung jeder Pflanze liefert. Um den Anbau von Pflanzen auf lokale und nachhaltige
            Weise zu fördern und zu erleichtern.

            Ebenso wichtig erscheint es uns, in ständigem Kontakt mit dem Nutzer zu stehen,
            damit dieser ein aktiver Teil der Community sein und die auf der Plattform präsentierten
            Informationen bewerten kann.
        </p>
    </div>
    <div class="box3">
        <p> the concept of the ‘noösphere’ is define as “the world of thought, to mark the growing role played by
            mankind’s [sic] brainpower and technological talents in shaping its own future and environment” (2000, 17),
            a concept from P. Teilhard de Chardin and E. Le Roy (2000, 17)
        </p>
    </div>
</div>

<!--
.................
.................
.................
 second Headerbox
.................
.................
.................
-->
<!--image-->
<div class="herbheader">
    <div class="transbox">
        <h1 class="ontop"> Kräuter </h1>
    </div>
</div>


<div class="imgboxes">
    <?php
    $sql = "SELECT medium.name, datei.adr, medium.id FROM (medium INNER JOIN datei ON medium.id = datei.medium_id)";
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
