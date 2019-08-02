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
//Kopf der Seite
$page = "adminNewMedium";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<?php

if (isset($_POST['save'])) {
    $sql = "INSERT INTO medium( `name`,`latein_name`, `standort`, `aussaat`, `erntezeit`, `beschreibung`) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $_POST['name'], $_POST['latein_name'], $_POST['standort'], $_POST['aussaat'], $_POST['erntezeit'], $_POST['beschreibung']);
	
    if (!$stmt->execute()) {
        die("Medium-Hinzufuegen fehlgeschlagen: " . $conn->error);
    } else {
        session_start();
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['latein_name'] = $_POST['latein_name'];
        $_SESSION['standort'] = $_POST['standort'];
        $_SESSION['aussaat'] = $_POST['aussaat'];
        $_SESSION['erntezeit'] = $_POST['erntezeit'];
		$_SESSION['beschreibung'] = $_POST['beschreibung'];
        $_SESSION['id'] = mysqli_insert_id($conn);
				
        header("Location:mediumAdded.php");
 		exit();
    }
}
?>

<h1>Ein neues Kraut anpflanzen</h1> 

<div class="form_container">
	<form method="post" enctype="multipart/form-data">
        <label>Name
            <input type="text" maxlength="255" name="name"/>
        </label>
		
        <label>Lateinische Bezeichnung
            <input type="text" maxlength="255" name="latein_name"/>
        </label>

        <label>Standort
            <input type="standort" maxlength="255" name="standort"/>
        </label>

        <label>Aussaat
            <input type="aussaat" maxlength="255" name="aussaat"/>
        </label>
		
		<label>Erntezeit
			<input type="erntezeit" maxlength="255" name="erntezeit"/>
		</label>
		
		<label>Beschreibung
			<input type="beschreibung" maxlength="1000" name="beschreibung"/>
		</label>

        <button type="submit" name="save">Anpflanzen</button>
	</form>
</div>
	



<?php
include "includes/footerbox.php";
?>

</body>
</html>