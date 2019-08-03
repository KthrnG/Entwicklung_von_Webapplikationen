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
$page = "admin";
include("includes/connect.php");
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Adminbereich Nutzer </h1>
<div class="search-result" >
<?php
$sql = "SELECT id,name, vorname FROM users ORDER BY name";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "<table style='min-width: 200px; text-align:center;'>";
  echo "<tr>";
  echo "<th>Name</th>";
  echo "</tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td><a class='searchlink' href ='detailUser.php?id= " . $row["id"] . "'>" . $row["vorname"] . " ". $row["name"] . "</a> </td>";
    echo "</tr>";
  }
  echo "</table>";
  mysqli_free_result($result);
} else {//keine Nutzer
  echo "Keine Nutzer gefunden";
}
  ?>
</div>
<?php
include "includes/footerbox.php";
?>

</body>
</html>
