﻿<!DOCTYPE html>
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
    <!--title-->
    <h1 class="ontop"> Kräuter </h1>
    <!-- transparent box-->
    <div class="transbox"></div>
</div>


<!--
.................
.................
.................
Herb Images with Links
.................
.................
.................
-->
<!--first row-->
<div class="imgboxes">

    <div class="overlay-image"><a href="basilikum.html">
            <img class="image" src="img/basil.jpg"/>
            <div class="hover">
                <div class="text">Basilikum</div>
            </div>
        </a></div>

    <div class="overlay-image"><a href="schnittlauch.html">
            <img class="image" src="img/chive.jpg"/>
            <div class="hover">
                <div class="text">Schnittlauch</div>
            </div>
        </a></div>

    <div class="overlay-image"><a href="koriander.html">
            <img class="image" src="img/cilantro.jpg"/>
            <div class="hover">
                <div class="text">Koriander</div>
            </div>
        </a></div>

    <div class="overlay-image"><a href="dill.html">
            <img class="image" src="img/dill.jpg"/>
            <div class="hover">
                <div class="text">Dill</div>
            </div>
        </a></div>

    <div class="overlay-image"><a href="kresse.html">
            <img class="image" src="img/kresse.jpg"/>
            <div class="hover">
                <div class="text">Kresse</div>
            </div>
        </a></div>

</div>

<!--second row-->
<div class="imgboxes">

    <div class="overlay-image"><a href="minze.html">
            <img class="image" src="img/mint.png"/>
            <div class="hover">
                <div class="text">Minze</div>
            </div>
        </a></div>

    <div class="overlay-image"><a href="petersilie.html">
            <img class="image" src="img/parsley.jpg"/>
            <div class="hover">
                <div class="text">Petersilie</div>
            </div>
        </a></div>

    <div class="overlay-image"><a href="rosmarin.html">
            <img class="image" src="img/rosmary.jpg"/>
            <div class="hover">
                <div class="text">Rosmarin</div>
            </div>
        </a></div>

    <div class="overlay-image"><a href="salbei.html">
            <img class="image" src="img/sage.jpg"/>
            <div class="hover">
                <div class="text">Salbei</div>
            </div>
        </a></div>

    <div class="overlay-image"><a href="thymian.html">
            <img class="image" src="img/thyme.jpg"/>
            <div class="hover">
                <div class="text">Thymian</div>
            </div>
        </a></div>

</div>

<?php
include "includes/footerbox.php";
?>

</body>

</html>
