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

    <div class="overlay-image"><a href="dill.html">
            <img class="image" src="img/dill.jpg"/>
            <div class="hover">
                <div class="text">Dill</div>
            </div>
        </a></div>

    <div class="overlay-image"><a href="koriander.html">
            <img class="image" src="img/cilantro.jpg"/>
            <div class="hover">
                <div class="text">Koriander</div>
            </div>
        </a></div>


    <div class="overlay-image"><a href="kresse.html">
            <img class="image" src="img/kresse.jpg"/>
            <div class="hover">
                <div class="text">Kresse</div>
            </div>
        </a></div>


    <div class="overlay-image"><a href="minze.html">
            <img class="image" src="img/mint.png"/>
            <div class="hover">
                <div class="text">Minze</div>
            </div>
        </a></div>

</div>

<!--second row-->
<div class="imgboxes">

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

    <div class="overlay-image"><a href="schnittlauch.html">
            <img class="image" src="img/chive.jpg"/>
            <div class="hover">
                <div class="text">Schnittlauch</div>
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
