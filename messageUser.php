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
$page = "messageUser";
//Einbinden von sämtlichen "Bausteinen" für den Basic Aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<?php

if (isset($_GET["id"])) {
  //Datenbankabfrage der Nachricht
    $sql = "SELECT id, from_id , betreff, message FROM nachrichten WHERE nachrichten.id = $_GET[id]";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 1) {
        header("Location:notfound.php");
        exit();
    }
    $row = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
}

?>




<body>



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
	$toid = 0;
	$admin_user = 1;
	
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
