<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" content="width=device-width">
    <title>Das Kräuterarchiv</title>
    <link rel="stylesheet" href="main_stylesheet.css">
</head>

<body>

<?php
// Initialize the session
include ("connect.php");
session_start();
session_destroy();
$name = "Gast";

$message = "Du bist jetzt ausgeloggt. Bis zum nächsten Mal.";


?>
<!--
.................
.................
.................
Headerbox
.................
.................
.................
-->
<!--image-->
<div class="background">
  <!--title here so it isn't transparent-->
  <h1 class="ontop"> Webseitenname </h1>
  <a href="index.php">
    <!-- transparent box-->
    <div class="transbox"></div>
  </a>
</div>

<!--
.................
.................
.................
Hamburger Menu
.................
.................
.................
-->
<nav role="navigation">
  <div id="menuToggle">
    <!--click reciever-->
    <input type="checkbox" />

    <!--hamburger form-->
    <span></span>
    <span></span>
    <span></span>

    <!--menu points inside the foldout menu-->
  <ul id="menu">
    <a href="index.php"><li>Start</li></a>
    <a href="about.html"><li>About</li></a>
    <a href="search.html"><li>Suche</li></a>
    <a href="abisz.html"><li>Kräuter A - Z</li></a>
    <a href="impressum.html"><li >Impressum</li></a>


  </ul>
</div>
</nav>

<!--
.................
.................
.................
Navigation Bar
.................
.................
.................
-->
<div class="navbar">

<!-- Buttons inside the navigation bar-->
<button type="button"  value="Check" onclick="window.location = 'registrieren.php'">Registrieren</button>
<button type="button"  value="Check" onclick="window.location = 'login.php'">Login</button>



</div>
<h1> Logout </h1>
<p style ="text-align:center"><?php echo $message; ?></p>

<footer>
<div class="footerbox">
  <a href="index.php"><li>Start</li></a>
  <a href="about.html"><li>About</li></a>
  <a href="search.html"><li>Suche</li></a>
  <a href="abisz.html"><li>Kräuter A - Z</li></a>
  <a href="impressum.html"><li >Impressum</li></a>

</div>
<div class="footerbox">
</div>
<div class="footerbox">
</div>
<div class="footerbox">
</div>
<div class="copyright">
  <p>© 2019 Universität Bremen</p>
</div>

</footer>


</body>
</html>
