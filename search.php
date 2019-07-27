<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" content="width=device-width">
        <title>Kräutergarten</title>
        <link rel="stylesheet" href="css/main_stylesheet.css">
    </head>
    <body>

    <?php
$page = "search";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

    <h1> Suche
      <div class= "search">
        <input>
      </div>
    </h1>
    <div align="center">
    <form method="post" action="showall.php">
        <button type="submit" class="button" name="select" >Alle anzeigen </button>
    </form>
  </div>



    <footer>
      <div class="footerbox">
        <a href="index.php"><li>Start</li></a>
        <a href="about.php"><li>About</li></a>
        <a href="search.php"><li class="active">Suche</li></a>
        <a href="abisz.php"><li>Kräuter A - Z</li></a>
        <a href="impressum.html"><li>Impressum</li></a>
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
