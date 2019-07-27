<?php
//Diese Seite in jedem php Dokument referenzieren mit include ("includes/connect.php");
session_start();
$servername = "localhost";
$username = "root";//hier benutzernamen eintragen
$password = "";//hier passwort eintragen
$dbname = "webseitewapp";//hier Datenbanknamen eintragen

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
