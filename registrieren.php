<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" content="width=device-width">
    <title>Kräutergarten</title>
    <link rel="stylesheet" href="css/main_stylesheet.css">
</head>
<body>
<?php
include("includes/connect.php");
$name = 'Gast';
if (isset($_POST['save'])) {
    $passwort = $_POST['passwort'];
    //$passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
    $tname = 'users';
    $ins = "INSERT INTO $tname( `uname`,`email`, `passwort`) VALUES (?,?,?)";
    $stmt = $conn->prepare($ins);
    $stmt->bind_param("sss", $_POST['uname'], $_POST['email'], $passwort);

    if (!$stmt->execute()) {
        die("Tabelle-Hinzufügen fehlgeschlagen: " . $conn->error);
    } else {
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
        display: flex;
        flex-direction: column;
        width: 300px;
        margin: 30px;
        padding: 50px;
        border: 3px solid #0a632d;
    }

    textarea {
        float: left;
        margin-bottom: 30px;
        padding: 5px;
        /*float: right;*/
    }


    form .statement {
        display: block;
        text-align: left;
        font-size: 16px;
        font-weight: bold;
        padding: 30px 0 0 0; /*4.25%;*/
        margin-bottom: 10px;
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

<?php
$page = "registrieren";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Registrieren </h1>
<div align="center">
    <form method="post">
        <div id="el">
            <label class="statement">Benutzername(max. 20 Zeichen)</label>
            <input type="text" maxlength="20" name="uname"></input>
            <br>
        </div>

        <div id="el">
            <label class="statement">E-Mail Adresse</label>
            <input type="email" maxlength="40" name="email"></input>
            <br>
        </div>

        <div id="el">
            <label class="statement">Passwort(max.20 Zeichen)</label>
            <input type="password" maxlength="20" name="passwort"></input>
        </div>
        <br>
        <button type="submit" name="save">Registrieren</button>

    </form>
</div>

<?php
include "includes/footerbox.php";
?>

</body>
</html>
