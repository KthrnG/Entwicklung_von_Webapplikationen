<!--Seite, auf der ein eingeloggter Nutzer seine Informationen bearbeiten kann-->
<?php
include "includes/assertLogin.php"//Einbindung Kontrolle Eingeloggt
?>
<!DOCTYPE html>
<html>
<head>
    <?php include "includes/head.php" ?>
</head>
<body>
<?php
$uid = $_SESSION['uid'];
$vorname = $_SESSION['vorname'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$pwd = $_SESSION['pwd'];

if (isset($_POST['delete'])) {
  //Löschen des Nutzers aus der Datenbank
    $sql = "DELETE FROM users WHERE id = $uid";

    if ($conn->query($sql) === TRUE) {
        header("Location:logout.php");//Nach Erfolg Weiterleitung auf Seite Ausgeloggt
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

if (isset($_POST['save'])) {
  //Geänderte Daten in der Datenbank speichern
    $newemail = $_POST['email'];
    $newpasswort = $_POST['passwort'];
    $newvorname = $_POST['vorname'];
    $newname = $_POST['name'];

    $upd = "UPDATE users SET vorname = ?, name = ?, email = ?, passwort = ? WHERE id = ?";
    $stmt = $conn->prepare($upd);
    $stmt->bind_param("ssssi", $newvorname, $newname, $newemail, $newpasswort, $uid);

    if ($stmt->execute()) {
        $_SESSION['email'] = $newemail;
        $_SESSION['pwd'] = $newpasswort;
        $_SESSION['vorname'] = $newvorname;
        $_SESSION['name'] = $newname;
        header("Location:profil.php");//Bei Erfolg Weiterleitung zum Profil
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<?php
$page = "editprofil";
//Einbinden von sämtlichen "Bausteinen" für den Basic Aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Profil ändern </h1>
<div class="form_container">
  <!--Form auf der bisherigen Daten angezeigt werden und geändert werden können-->
    <p> Bitte gib deine neuen Daten ein </p>
    <form action="" method="post">
        <label>Vorname
            <input type="text" name="vorname" value="<?php echo $vorname ?>"/>
        </label>

        <label>Nachname
            <input type="text" name="name" value="<?php echo $name ?>"/>
        </label>

        <label>E-Mail
            <input type="email" name="email" value="<?php echo $email ?>"/>
        </label>

        <label>Passwort (max. 20 Zeichen)
            <input type="password" name="passwort" value="<?php echo $pwd ?>"/>
        </label>

        <button type="submit" name="save">
            Änderungen speichern
            <!--Button zum Speichern der Änderungen-->
        </button>

        <button type="submit" id="delete_button" name="delete">
            Konto löschen
            <!--Button zur Löschung des Nutzers-->
        </button>
    </form>
    <p> Nach dem Löschen wirst du automatisch ausgeloggt.</p>
</div>
<?php
include "includes/footerbox.php";//Einbinden Footer
?>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
