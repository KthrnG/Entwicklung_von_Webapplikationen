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
$page = "messagesToAdmin";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<?php
/*
if (isset($_POST["delete"])) {
    $del = "DELETE FROM wunschliste WHERE user_id=$_POST[delete]";
    $stmt = $conn->prepare($del);
    if (!$stmt->execute()) {
        $like_error = "Fehler beim Löschen der Wunschliste";
    }
}*/
?>

<h1>Nachrichten an die Administratoren</h1>

<div class="search-result" >
<?php
$sql = "SELECT id,to_id, from_id, betreff FROM nachrichten ORDER BY from_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "<table style='min-width: 200px; text-align:center;'>";
  echo "<tr>";
  echo "<th>Absender</th>";
  echo "<th>Betreff</th>";
  echo "</tr>";
	if($to_id = 1) {
  		while ($row = mysqli_fetch_assoc($result)) {
    		echo "<tr>";
    		echo "<td><a class='searchlink' href ='detailMessage.php?id= " . $row["id"] . "'>" . $row["from_id"] . "</a> </td>";
    		echo "<td><a class='searchlink' href ='detailMessage.php?id= " . $row["id"] . "'>" . $row["betreff"] . "</a> </td>";
			echo "</tr>"; }

	}

  echo "</table>";
  mysqli_free_result($result);
} else {//keine Nachricht
  echo "Keine Nachrichten erhalten.";
}
  ?>
</div>

<?php
include "includes/footerbox.php";
?>

</body>

</html>
