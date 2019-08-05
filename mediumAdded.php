<!--Seite nachdem neues Medium erfolgreich hinzugefügt wurde, Möglichkeit Bild für das Medium hochzuladen-->
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
$name = $_SESSION['name'];
$message = "<b>$name</b> wurde angepflanzt!";
$medium_id = $_SESSION['id'];
?>

<?php
$page = "mediumAdded";
//Einbinden von sämtlichen "Bausteinen" für den Basic Aufbau der Webseite:Bildbanner, HamburgerMenü und Navigationsleiste
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<?php

if (isset($_POST['upload'])) {

	//Zielordner für das Bild
	$image = $_FILES['image']['name'];
	$target = "img/" .basename($image);
	$type = $_FILES['image']['type'];
	$data = file_get_contents($_FILES['image']['tmp_name']);
	
    $sql = "INSERT INTO datei(`medium_id`,`type`,`adr`,`file`) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
	$stmt->bind_param("ssss", $medium_id, $type, $target, $image);

    if (!$stmt->execute()) {
        die("Medium-Hinzufuegen fehlgeschlagen: " . $conn->error);
    } else {
        //session_start();
		
		$_SESSION['id'] = mysqli_insert_id($conn);
		$_SESSION['medium_id'] = $medium_id;
		$_SESSION['type'] = $type;
		$_SESSION['adr'] = $target;
		$_SESSION['file'] = $data;
		
        header("Location:mediumUploaded.php");
 		exit();

}
}
?>


<h1> Eintrag hinzugefuegt! </h1>
<p style="text-align:center"><?php echo $message; ?></p>
<p style="text-align:center">Moechtest du auch ein Bild hinzufuegen?</p>

<div class="form_container">
	<form method="post" enctype="multipart/form-data">
        <label>Bild
            <input type="file" name="image"/>
        </label>

		<button type="submit" name="upload">Hochladen</button>
	</form>
</div>

<?php
include "includes/footerbox.php";//Einbindung Footer
?>

</body>
</html>
