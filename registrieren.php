
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8" content="width=device-width">
         <title>Kräutergarten</title>
         <link rel="stylesheet" href="main_stylesheet.css">
     </head>
     <body>
     <?php
       include ("connect.php");
       $name= 'Gast';
       if(isset($_POST['save']))
       {
           $passwort = $_POST['passwort'];
           //$passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
           $tname = 'users';
           $ins = "INSERT INTO $tname( `uname`,`email`, `passwort`) VALUES (?,?,?)";
           $stmt = $conn -> prepare($ins);
           $stmt->bind_param("sss", $_POST['uname'], $_POST['email'], $passwort );

         if (!$stmt -> execute()) {
             die("Tabelle-Hinzufügen fehlgeschlagen: " . $conn -> error);
         }else{
           session_start();
           $_SESSION['name'] = $_POST['uname'];
           $name = $_SESSION['name'];
           $_SESSION['email'] = $_POST['email'];
           $_SESSION['pwd'] = $passwort;
           header("Location:welcome.php");
           exit();
         }
       }
      ?>
      <style>
      form {
        display:flex;
        flex-direction: column;
        width: 300px;
        margin: 30px;
        padding: 50px;
        border: 3px solid #0a632d;
      }
        textarea {
          float:left;
          margin-bottom: 30px;
          padding: 5px;
          /*float: right;*/
          }


          form .statement {
          display:block;
					text-align: left;
          font-size: 16px;
          font-weight: bold;
          padding: 30px 0 0 0;/*4.25%;*/
          margin-bottom:10px;
					/*margin-left: 25%;
          margin-right: 20px;*/
        }

        form button {
          margin-top: 30px;
        }
        #el {
          margin-left: 40px;
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
           <a href="about.html"><li>About</li></a>
           <a href="search.html"><li>Suche</li></a>
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
       <button type="button"  value="Check" onclick="window.location = 'profil.php'">Profil</button>
     </div>


     <h1> Registrieren </h1>
     <div align="center">
     <form method="post">
		    <div id="el">
        <label class="statement">Benutzername(max. 20 Zeichen)</label>
   			<textarea rows="1" cols="20" maxlength="20" name="uname"></textarea>
   			<br>
      </div>

      <div id="el">
        <label class="statement">E-Mail Adresse</label>
			  <textarea rows="1" cols="20" maxlength="40" name="email"></textarea>
			  <br>
        </div>

        <div id="el">
        <label class="statement">Passwort(max.20 Zeichen)</label>
  			<textarea rows="1" cols="20" maxlength="20" name="passwort"></textarea>
        </div>
  			<br>
      <button type="submit" name="save">Registrieren</button>

      </form>
    </div>
     <footer>
       <div class="footerbox">
         <a href="index.php"><li>Start</li></a>
         <a href="about.html"><li>About</li></a>
         <a href="search.html"><li>Suche</li></a>
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
