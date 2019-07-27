
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" content="width=device-width">
        <title>Kräutergarten</title>
        <link rel="stylesheet" href="css/main_stylesheet.css">
    </head>
    <body>
      <style>
      table {
        text-align: left;
        border-collapse: collapse;
        border: 1px solid #0a632d;
        background: #fff;
        min-width: 700px;
        }

      table th,
      table tr:nth-child(2n+2) {
        background: rgba(10,99,45, 0.3);
        }

      table th,
      table td {
        padding: 12px 20px;
        }

      table th {
        border-bottom: 1px solid #0a632d;
        background-color: #0a632d;
        color: white;
        }
        a {
          text-decoration: none;
          color: #0a632d;
        }
        </style>

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
          <a href="search.php"><li class="active">Suche</li></a>
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
      <button type="button"  value="Check" onclick="window.location = 'registrieren.php'">Registrieren</button>
      <button type="button"  value="Check" onclick="window.location = 'login.php'">Login</button>
      <button type="button"  value="Check" onclick="window.location = 'profil.php'">Profil</button>

    </div>
    <h1> Alle Kräuter
    </h1>
    <div align="center">

      <?php
      include("includes/connect.php");

      if (isset($_POST['select'])) {

          $sql ="SELECT medium.mname, medium.link, datei.adr, place.descrp,place2.descrp2, months.month, months2.month2 FROM ((medium INNER JOIN datei ON medium.mname = datei.mname) INNER JOIN ((((placetimes INNER JOIN place ON placetimes.place = place.idp) INNER JOIN place2 ON placetimes.place2 = place2.idp )
           INNER JOIN months ON placetimes.month = months.idm)INNER JOIN months2 ON placetimes.month2 = months2.idm) ON medium.mname = placetimes.mname)";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th></th>";
            echo "<th>Name</th>";
            echo "<th>Standort</th>";
            echo "<th>Jahreszeit</th>";
            echo "</tr>";
            while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
               echo "<td> <img class='image' style='width:70px;' src='" .$row["adr"]. "' /></td><td>
               <a href ='" .$row["link"]. "'>". $row["mname"]."</a>  </td>";
               echo "<td>" .$row["descrp"].$row["descrp2"] . "</td>";
               echo "<td>" . $row["month"] ." ". $row["month2"] . "</td>";
               echo "</tr>";
              /*echo "<li>
              <img class='image' style='width:70px;' src='".$row["adr"]."' />
              <a href ='".$row["link"]."'>"
              . $row["mname"].
              "</a> Standort: ".$row["descrp"].$row["descrp2"]." Jahreszeit: ". $row["month"] ." ". $row["month2"].
               "</li> <br> <br>";*/
            }
            echo "</table>";
            mysqli_free_result($result);
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

  </div>



    <footer>
      <div class="footerbox">
        <a href="index.php"><li>Start</li></a>
        <a href="about.php"><li>About</li></a>
        <a href="search.php"><li class="active">Suche</li></a>
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
