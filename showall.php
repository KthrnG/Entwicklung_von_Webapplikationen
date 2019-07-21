
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" content="width=device-width">
        <title>Kräutergarten</title>
        <link rel="stylesheet" href="main_stylesheet.css">
    </head>
    <body>

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
          <a href="search.html"><li class="active">Suche</li></a>
          <a href="abisz.html"><li>Kräuter A - Z</li></a>
          <a href="impressum.html"><li>Impressum</li></a>

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
    <h1> Alle Kräuter
    </h1>
    <div align="center">
      <ul style="list-style-type: none; text-align:left; margin-left: 43%;">
      <?php
      include ("connect.php");

      if (isset($_POST['select'])) {

          $sql ="SELECT medium.mname, medium.link, datei.adr, place.descrp,place2.descrp2, months.month, months2.month2 FROM ((medium INNER JOIN datei ON medium.mname = datei.mname) INNER JOIN ((((placetimes INNER JOIN place ON placetimes.place = place.idp) INNER JOIN place2 ON placetimes.place2 = place2.idp )
           INNER JOIN months ON placetimes.month = months.idm)INNER JOIN months2 ON placetimes.month2 = months2.idm) ON medium.mname = placetimes.mname)";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              echo "<li>
              <img class='image' style='width:70px;' src='".$row["adr"]."' />
              <a href ='".$row["link"]."'>"
              . $row["mname"].
              "</a> Standort: ".$row["descrp"].$row["descrp2"]." Jahreszeit: ". $row["month"] ." ". $row["month2"].
               "</li> <br> <br>";
            }
          }

            /*

                      //Durchschnittliche Bewertung anzeigen
                      $sqlavg = "SELECT ROUND(AVG(wert),2) FROM bewertung WHERE mname = '$mname'";
                      $resultavg = mysqli_query($conn, $sqlavg);
                      if (mysqli_num_rows($resultavg) > 0) {
                        while($rowavg= mysqli_fetch_assoc($resultavg)) {
                          $avgwert = "Durchschnittliche Bewertung: ". $rowavg["ROUND(AVG(wert),2)"];
                        }
                        $end = $avgwert;
                    } else{
                        //T: Berwertung nicht anzeigen

                    }

                    */
             else {//keine Medien
                echo "0 results";
            }
              //echo "The select function is called.";
              //exit;
          }




      ?>
    </ul>
  </div>



    <footer>
      <div class="footerbox">
        <a href="index.php"><li>Start</li></a>
        <a href="about.html"><li>About</li></a>
        <a href="search.html"><li class="active">Suche</li></a>
        <a href="abisz.html"><li>Kräuter A - Z</li></a>
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
