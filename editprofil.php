<?php
include "includes/assertLogin.php"
?>
<!DOCTYPE html>
<html>
<head>
    <?php include "includes/head.php" ?>
</head>
<body>
<?php
include("includes/connect.php");
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$pwd = $_SESSION['pwd'];

if (isset($_POST['delete'])) {
    $sql = "DELETE FROM users WHERE uname = '$name'";

    if ($conn->query($sql) === TRUE) {
        header("Location:logout.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

if (isset($_POST['save'])) {
    //$newname= $_POST['uname'];
    $newmail = $_POST['email'];
    $newpasswort = $_POST['password'];
    $sql = "UPDATE users SET email ='$newmail' AND passwort = '$newpasswort' WHERE uname = '$name'";

    if ($conn->query($sql) === TRUE) {
        //$_SESSION['name']=$newname;
        $_SESSION['email'] = $newmail;
        $_SESSION['pwd'] = $newpasswort;
        header("Location:profil.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
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

    #datennutzer {
        list-style-type: none;
        text-align: left;
        margin-left: 43%;
    }

    #datennutzer li {
        margin-left: 5px;
    }

    #delete {
        background-color: white;

        color: #F26547;
        border: 3px solid #F26547;

    }

    #delete:hover {
        background-color: #F26547;
        border: 3px solid #F26547;
        color: white;
    }


</style>

<?php
$page = "editprofil";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Profil ändern </h1>
<div align="center">
    <br>

    <form action="" method="post">
        <ul id="datennutzer">
            <li><p> Bitte gib deine neuen Daten ein </p></li>
            <br>
            <li><p><b> Alter Benutzername: </b><?php echo $name ?></p></li>
            <li><p><b> Benutzername ändern nicht möglich! </b></p></li>
            <br>
            <li><p><b> Alte E-Mail: </b><?php echo $email ?> </p></li>
            <li><label class="statement">Neue E-Mail</label></li>
            <li><input type="text" name="email" size="40" class="box"/></li>
            <br>
            <li><p><b> Altes Passwort: </b><?php echo $pwd ?> </p></li>
            <li><label class="statement">Neues Passwort (max. 20 Zeichen)</label></li>
            <li><input type="password" name="password" size="40" class="box"/></li>
            <br>
            <button type="submit" name="save"/>
            Änderungen speichern </button><br/>
            <button type="submit" id="delete" name="delete"/>
            Konto löschen </button><br/>
            <p> Nach dem Löschen wirst du automatisch ausgeloggt.</p>

        </ul>
    </form>
</div>

<?php
include "includes/footerbox.php";
?>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
