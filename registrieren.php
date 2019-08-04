<!--Seite auf der ein Nutzer sich neu registrieren kann-->
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
  //Einfügen der eingegebnen Daten in die Datenbank um einen neuen Nutzer anzulegen
    $ins = "INSERT INTO users( `vorname`,`name`, `email`, `passwort`) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($ins);
    $stmt->bind_param("ssss", $_POST['vorname'], $_POST['name'], $_POST['email'], $_POST['passwort']);

    if (!$stmt->execute()) {
        die("Tabelle-Hinzufügen fehlgeschlagen: " . $conn->error);
    } else {
        session_start();
        //nach Erfolg wird der neue Nutzer direkt eingeloggt und auf die Willkommensseite weitergeleitet
        $_SESSION['vorname'] = $_POST['vorname'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['pwd'] = $_POST['passwort'];
        $_SESSION['loggedin'] = true;
        $_SESSION['uid'] = mysqli_insert_id($conn);
        header("Location:welcome.php");
        exit();
    }
}
?>

<?php
$page = "registrieren";
//Einbinden von sämtlichen "Bausteinen" für den Basic Aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Registrieren </h1>
<div class="form_container">
    <form method="post">
      <!--Form zur Eingabe der Registrationsdaten-->
        <label>Vorname
            <input type="text" maxlength="255" name="vorname"/>
        </label>

        <label>Nachname
            <input type="text" maxlength="255" name="name"/>
        </label>

        <label>E-Mail Adresse
            <input type="email" maxlength="255" name="email"/>
        </label>

        <label>Passwort (max.20 Zeichen)
            <input type="password" maxlength="20" name="passwort"/>
        </label>

        <button type="submit" name="save">Registrieren</button>
        <!--Button zum Speichern der Eingaben-->
    </form>
</div>

<?php
include "includes/footerbox.php";//Einbindung Footer
?>

</body>
</html>
