<?php
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location:error.php");
    exit();
}
?>