<!DOCTYPE html>
<html>
<head>
    <?php include "includes/head.php" ?>
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
        $_SESSION['vorname'] = $_POST['uname'];
        $name = $_SESSION['vorname'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['pwd'] = $passwort;
        header("Location:welcome.php");
        exit();
    }
}
?>

<?php
$page = "registrieren";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Registrieren </h1>
<div class="form_container">
    <form method="post">
        <label>Benutzername (max. 20 Zeichen)
            <input type="text" maxlength="20" name="uname"/>
        </label>

        <label>E-Mail Adresse
            <input type="email" maxlength="40" name="email"/>
        </label>

        <label>Passwort (max.20 Zeichen)
            <input type="password" maxlength="20" name="passwort"/>
        </label>

        <button type="submit" name="save">Registrieren</button>
    </form>
</div>

<?php
include "includes/footerbox.php";
?>

</body>
</html>
