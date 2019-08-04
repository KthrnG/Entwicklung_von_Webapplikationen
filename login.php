<!--Seite zum Einloggen-->
<?php
include("includes/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Email und Passwort werden von der Form genommen und geschaut ob es auf einen Nutzer zutrifft

    $myemail = $_POST['email'];
    $mypassword = $_POST['password'];
    $sql = "SELECT id, vorname, name, admin, passwort FROM users WHERE email = '$myemail' AND passwort = '$mypassword'";
    $result = mysqli_query($conn, $sql);

// Eindeutiges Ergebniss muss vorhanden sein
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['uid'] = $row["id"];
        $_SESSION['vorname'] = $row["vorname"];
        $_SESSION['name'] = $row["name"];
        $_SESSION['admin'] = $row["admin"];
        $_SESSION['email'] = $myemail;
        $_SESSION['pwd'] = $mypassword;
        $_SESSION['loggedin'] = true;
        $name = $_SESSION['vorname'];
        //$error = "Willkommen " . $name ."<br>";
        header("Location:welcome.php");//Bei Erfolgreichen Einloggen Weiterleitung auf Willkommensseite
        exit();
    } else {
        $error = "Login fehlgeschlagen";//Fehlermeldung
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <?php include "includes/head.php" ?>
</head>

<body>

<?php
$page = "login";
//Einbinden von sämtlichen "Bausteinen" für den Basic Aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1>Login</h1>
<div class="form_container">
  <!--Eingabemaske Email und Passwort-->
    <form action="" method="post">
        <label>E-Mail
            <input type="email" name="email" size="40"/>
        </label>
        <label>Passwort
            <input type="password" name="password" size="40"/>
        </label>
        <button type="submit" value="submit">
            Login
            <!--Button zum Einloggen-->
        </button>
    </form>

    <?php if (isset($error)) {
        echo '<div style="font-size:11px; color:#cc0000; margin-top:10px">' . $error . '</div>';//Darstellung Fehlermeldung
    }
    ?>
</div>

<?php
include "includes/footerbox.php";//Einbindung Footer
?>

</body>
</html>
