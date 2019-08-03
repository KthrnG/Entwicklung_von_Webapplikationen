<?php

//Ueberpruefung bzgl. Login-Status
include "includes/assertLogin.php"
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
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<body>

<h1>Schreibe unseren Kraeuterexperten!</h1>

<div class="form_container">
	<form method="post">

        <label>Betreff
            <input type="text" maxlength="255" name="subject"/>
        </label>

        <label>Nachricht
            <input type="text" maxlength="1000" name="message"/>
        </label>
		
		<label>Von:
            <input type="text" maxlength="255" name="von"/>
        </label>
		
        <label>Ad
            <input type="text" maxlength="255" name="au"/>
        </label>

        <label>open
            <input type="text" maxlength="1000" name="open"/>
        </label>
		
		<label>del
            <input type="text" maxlength="1000" name="rd"/>
        </label>
		
		<label>dele
            <input type="text" maxlength="1000" name="sd"/>
        </label>
				
        <button type="submit" name="send">Abschicken!</button>
	</form>
</div>


<?php

 

if (isset($_POST['send'])) {
    $sql = "INSERT INTO nachrichten(`to_id`,`from_id`,`admin_user`,`betreff`,`message`,`opened`,`rec_delete`, `send_delete`) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
	$stmt->bind_param("ssssssss", $toid, $_POST['von'], $_POST['au'], $_POST['subject'], $_POST['message'], $_POST['open'], $_POST['rd'], $_POST['sd']);
	
	$toid = 1;
    
	if (!$stmt->execute()) {
        die("Nachricht senden fehlgeschlagen: " . $conn->error);
    } else {
        session_start();
		
        $_SESSION['id'] = mysqli_insert_id($conn);
		$_SESSION['to_id'] = $toid;
		$_SESSION['from_id'] = $_POST['von'];
		$_SESSION['admin_user'] = $_POST['au'];
		$_SESSION['betreff'] = $_POST['subject'];
		$_SESSION['message'] = $_POST['message'];
		$_SESSION['opened'] = $_POST['open'];
		$_SESSION['rec_delete'] = $_POST['rd'];
		$_SESSION['send_delete'] = $_POST['sd'];
						
        header("Location:nachrichtGesendet.php");
 		exit();
    }
}
?>

<?php
include "includes/footerbox.php";
?>

</body>
</html>