<?php



   include ("connect.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myemail = $_POST['email'];
      $mypassword = $_POST['password'];

      $sql = "SELECT uname FROM users WHERE email = '$myemail' and passwort = '$mypassword'";
      $result = mysqli_query($conn,$sql);


      // If result matched $myusername and $mypassword, table row must be 1 row
      if (mysqli_num_rows($result) == 1) {
          // output data of each row
          session_start();
          while($row = mysqli_fetch_assoc($result)) {

              $_SESSION['name'] = $row["uname"];
              $_SESSION['email'] = $myemail;
              $_SESSION['pwd'] = $mypassword;
              $name = $_SESSION['name'];
              //$error = "Willkommen " . $name ."<br>";
              header("Location:welcome.php");
			        exit();

      }
   }else {
       $error="No user found";
   }
 }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" content="width=device-width">
    <title>Das Kräuterarchiv</title>
    <link rel="stylesheet" href="main_stylesheet.css">
</head>

<body>

      <style>
      form {
        display:flex;
        flex-direction: column;
        width: 300px;
        margin: 30px;
        padding: 50px;
        border: 3px solid #0a632d;
      }
        input {
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

<h1> Login </h1>
<div align = "center">
   <!--<div style = "width:300px; border: solid 1px #333333; " align = "left">
      <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

      <div style = "margin:30px">-->

         <form action = "" method = "post">
           <div id="el">
           <label class="statement">E-Mail</label>
            <input type = "text" name = "email" size= "40" class = "box"/><br /><br />
          </div>
          <div id="el">
          <label class="statement">Passwort</label>
          <input type = "password" name = "password" size= "40" class = "box" /><br/><br />
        </div>
            <button type = "submit" value = " Submit "/>Login </button><br />
         </form>

         <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

      <!--</div>

   </div>

</div>-->

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
