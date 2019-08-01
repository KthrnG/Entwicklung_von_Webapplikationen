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
            <p> Hi! Schön, dass du dich für den Gartenanbau interessierst. Dann bist du hier genau richtig! Das Kräuterarchiv ist eine Onlineplattform die Informationen zum Anlegen eines eigenen Kräutergartens liefern soll. Unser Anliegen ist es, dass möglichst viele Menschen ihr Wissen über den Anbau von Kräutern miteinander teilen.
            </p>
        </div>
        <div class="box2">
            <p>Das Kräuterarchiv ist eine Bibliothek in der du die wichtigsten Informationen über das Kraut finden kannst, das dich interessiert. Du findest unter anderem Informationen über die richtige Pflege, die ideale Anbau- und Erntezeit und die Wirkungskraft des jeweiligen Krauts. Wir möchten damit den Anbau von Pflanzen auf lokaler Ebene und auf nachhaltige Weise fördern.
            </p>
        </div>
        <div class="box3">
            <p> Ebenso wichtig erscheint es uns, in ständigem Kontakt mit der Community zu stehen. Teilt euch mit! Gebt eine Bewertung ab, wenn euch etwas gefallen oder beim anlegen eines Kräutergartens geholfen hat und legt euch eure eigene Kräuterwunschliste an, auf die ihr später immer wieder zurückgreifen könnt. Wir hoffen, dass wir als Community genauso wachsen werden, wie unsere Kräutergärten. Viel Spaß beim Durchstöbern!
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
