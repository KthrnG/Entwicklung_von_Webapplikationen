<!--Seite auf der Nachrichten an Admin verfasst werden können-->
<?php

//Ueberpruefung bzgl. Login-Status. $email speichert die Mail-Adresse des eingeloggten Nutzers
include "includes/assertLogin.php";
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html>

<head>
    <?php include "includes/head.php" ?>
</head>

<body>


<?php
//Kopf der Seite
$page = "nachrichten";
//Einbinden von sämtlichen "Bausteinen" für den Basic Aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<body>

<h1>Schreibe unseren Kraeuterexperten!</h1>

<div class="form_container">
	<form method="post">
      <!--Eingabemaske der Nachricht-->
        <label>Betreff
            <input type="text" maxlength="255" name="subject"/>
        </label>

        <label>Nachricht
            <input type="text" maxlength="1000" name="message"/>
        </label>

        <button type="submit" name="send">Abschicken!</button>
	</form>
</div>


<?php

if (isset($_POST['send'])) {
    //Einfügen der Nachricht in die Datenbank
    $sql = "INSERT INTO nachrichten(`to_id`,`from_id`,`admin_user`,`betreff`,`message`,`opened`) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
	$stmt->bind_param("ssssss", $toid, $email, $admin_user, $_POST['subject'], $_POST['message'], $status);
	
    //ID 1 steht für Admins, 0 für Nutzer
	$toid = 1;
	$admin_user = 0;
	
	//Status markiert, ob die Nachricht bereits vom Admin geöffnet wurde. 0 = Nein
	$status = 0;

	if (!$stmt->execute()) {
        die("Nachricht senden fehlgeschlagen: " . $conn->error);
    } else {
        session_start();

        $_SESSION['id'] = mysqli_insert_id($conn);
		$_SESSION['to_id'] = $toid;		
		$_SESSION['from_id'] = $email;		
		$_SESSION['admin_user'] = $admin_user;		
		$_SESSION['betreff'] = $_POST['subject'];
		$_SESSION['message'] = $_POST['message'];	
		$_SESSION['opened'] = $status;

        header("Location:nachrichtGesendet.php");//Bei Erfolg Weiterleitung
 		exit();
    }
}
?>

<?php
include "includes/footerbox.php";//Einbindung Footer
?>

</body>
</html>
