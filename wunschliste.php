<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" content="width=device-width">
        <title>Kräutergarten</title>
        <link rel="stylesheet" href="css/main_stylesheet.css">
    </head>
    <body>
    <?php
      include ("connect.php");
      session_start();
      $name = $_SESSION['name'];


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
          <a href="about.php"><li>About</li></a>
          <a href="search.php"><li>Suche</li></a>
          <a href="abisz.php"><li>Kräuter A - Z</li></a>
          <a href="impressum.php"><li>Impressum</li></a>


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
      <button type="button"  value="Check" onclick="window.location = 'logout.php'">Logout</button>
      <button type="button"  value="Check" onclick="window.location = 'profil.php'">Profil</button>

    </div>
    <h1> Wunschliste von <?php echo $name?> </h1>


    <footer>
      <div class="footerbox">
        <a href="index.php"><li>Start</li></a>
        <a href="about.php"><li>About</li></a>
        <a href="search.php"><li>Suche</li></a>
        <a href="abisz.php"><li>Kräuter A - Z</li></a>
        <a href="impressum.php"><li>Impressum</li></a>

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
