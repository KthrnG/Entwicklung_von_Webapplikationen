<?php
//Checkt ob Nutzer eingeloggt ist, für Seiten, bei denen man eingeloggt sein muss
include "includes/connect.php";
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location:error.php");
    exit();
}
?>
