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
$name = $_SESSION['name'];
$message = "<b>$name</b> wurde angepflanzt!";

//medien_id = $_SESSION['id'];
?>

<?php
$page = "mediumAdded";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<?php

if (isset($_POST['save'])) {

	//Zielordner für das Bild
	$target = "img/" .basename($_FILES['image']['name']);
	$image = $_FILES['image']['name'];
    $sql = "INSERT INTO datei(`adr`) VALUES ('$image')";
    $stmt = $conn->prepare($sql);

	//$stmt->bind_param("s",$_POST['adr']);
	
    if (!$stmt->execute()) {
        die("Medium-Hinzufuegen fehlgeschlagen: " . $conn->error);
    } else {
        session_start();
		//$_SESSION['adr'] = $_POST['image'];
		$_SESSION['id'] = mysqli_insert_id($conn);
		$_SESSION['medium_id'] = mysqli_insert_id($conn);
				
        //header("Location:mediumAdded.php");
 		//exit();
    
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
		
		<button type="submit" name="save">Hochladen</button>
	</form>
</div>

<?php
include "includes/footerbox.php";
?>

</body>
</html>