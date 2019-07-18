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
  session_start();
  $name = $_SESSION['name'];
  $email = $_SESSION['email'];
  $pwd = $_SESSION['pwd'];

 ?>
 <style>
#bearbeiten {
     /*float: right;*/
     display: block;
     background-color: #0a632d;
     color: white;
     font-size: 16px;
     text-align: center;
     border: none;
     padding: 15px 25px;
     margin: 30px 5px 0px 5px;
     text-decoration: none;
     width: 200px;
     border: 3px solid #0a632d;
 }

 #bearbeiten:hover {
   background-color: white;
   /*opacity: 0.6;*/
   /*filter: alpha(opacity=60);*/
   color: #0a632d;
   border: 3px solid #0a632d;
 }
 #datennutzer{
   list-style-type: none;
   text-align: left;
   margin-left: 43%;
 }
 #datennutzer li{
   margin-left: 15px;
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
     <button type="button" id="logoutt" value="Check" onclick="window.location = 'logout.php'">Logout</button>

     <button type="button" id="profil" value="Check" onclick="window.location = 'profil.php'">Profil</button>
   </div>

   <h1> Profil </h1>
   <div align="center">
    <br>
    <ul id="datennutzer">
      <li><p><b> Benutzername: </b><?php echo $name ?></p></li>
      <li><p><b> E-Mail: </b><?php echo $email ?> </p></li>
      <li><p><b> Passwort: </b><?php echo $pwd ?> </p></li>

    <button type="button" id="bearbeiten" value="Check" onclick="window.location = 'editprofil.php'">Daten bearbeiten</button>
    </ul>
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
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="main.js"></script>

 </body>
 </html>
