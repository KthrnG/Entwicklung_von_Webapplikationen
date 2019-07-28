<?php
include "includes/assertLogin.php";
$vorname = $_SESSION['vorname'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$pwd = $_SESSION['pwd'];
$admin = $_SESSION['admin'];
?>
<!DOCTYPE html>
<html>
<head>
    <?php include "includes/head.php" ?>
</head>
<body>

<!--<style>-->
<!--    #bearbeiten {-->
<!--        /*float: right;*/-->
<!--        display: block;-->
<!--        background-color: #0a632d;-->
<!--        color: white;-->
<!--        font-size: 16px;-->
<!--        text-align: center;-->
<!--        border: none;-->
<!--        padding: 15px 25px;-->
<!--        margin: 30px 5px 0px 5px;-->
<!--        text-decoration: none;-->
<!--        width: 200px;-->
<!--        border: 3px solid #0a632d;-->
<!--    }-->
<!---->
<!--    #bearbeiten:hover {-->
<!--        background-color: white;-->
<!--        /*opacity: 0.6;*/-->
<!--        /*filter: alpha(opacity=60);*/-->
<!--        color: #0a632d;-->
<!--        border: 3px solid #0a632d;-->
<!--    }-->
<!---->
<!--    #admin {-->
<!--        float: right;-->
<!--        display: block;-->
<!--        background-color: white;-->
<!--        color: #F26547;-->
<!--        font-size: 16px;-->
<!--        text-align: center;-->
<!--        border: none;-->
<!--        padding: 15px 25px;-->
<!--        margin: 20px 25px 0px 5px;-->
<!--        text-decoration: none;-->
<!--        width: 200px;-->
<!--        border: 3px solid #F26547;-->
<!--    }-->
<!---->
<!--    #admin:hover {-->
<!--        background-color: #F26547;-->
<!--        color: white;-->
<!---->
<!--    }-->
<!---->
<!--    #datennutzer {-->
<!--        list-style-type: none;-->
<!--        text-align: left;-->
<!--        margin-left: 43%;-->
<!--    }-->
<!---->
<!--    #datennutzer li {-->
<!--        margin-left: 15px;-->
<!--    }-->
<!---->
<!--</style>-->

<?php
$page = "profil";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Profil </h1>
<div class="form_container">
    <p><b> Vorname: </b><?php echo $vorname ?></p>
    <p><b> Nachname: </b><?php echo $name ?></p>
    <p><b> E-Mail: </b><?php echo $email ?> </p>
    <p><b> Passwort: </b><?php echo $pwd ?> </p>

    <button type="button" value="Check" onclick="window.location = 'editprofil.php'">
        Daten bearbeiten
    </button>
</div>

<?php
include "includes/footerbox.php";
?>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
