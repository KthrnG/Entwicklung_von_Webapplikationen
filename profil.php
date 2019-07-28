<?php
include("includes/connect.php");
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$pwd = $_SESSION['pwd'];
$uright = $_SESSION['uright'];
include "includes/assertLogin.php"
?>
<!DOCTYPE html>
<html>
<head>
    <?php include "includes/head.php" ?>
</head>
<body>

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

    #admin {
        float: right;
        display: block;
        background-color: white;
        color: #F26547;
        font-size: 16px;
        text-align: center;
        border: none;
        padding: 15px 25px;
        margin: 20px 25px 0px 5px;
        text-decoration: none;
        width: 200px;
        border: 3px solid #F26547;
    }

    #admin:hover {
        background-color: #F26547;
        color: white;

    }

    #datennutzer {
        list-style-type: none;
        text-align: left;
        margin-left: 43%;
    }

    #datennutzer li {
        margin-left: 15px;
    }

</style>

<?php
$page = "profil";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<?php
if ($uright == 1) {
    echo "<button type='button' id='admin' value='Check' onclick='window.location = admin.php>Adminbereich</button>";
}
?>
<br>
<h1> Profil </h1>
<div align="center">
    <br>
    <ul id="datennutzer">
        <li><p><b> Benutzername: </b><?php echo $name ?></p></li>
        <li><p><b> E-Mail: </b><?php echo $email ?> </p></li>
        <li><p><b> Passwort: </b><?php echo $pwd ?> </p></li>

        <button type="button" id="bearbeiten" value="Check" onclick="window.location = 'editprofil.php'">Daten
            bearbeiten
        </button>
        <br>


    </ul>
</div>

<?php
include "includes/footerbox.php";
?>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
