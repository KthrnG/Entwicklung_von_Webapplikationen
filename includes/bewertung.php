<?php
if (isset($_POST["rating"])) {
    if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {
        $rating_error = "Bitte melde dich an, um eine Bewertung abzugeben.";
    } else {
        $ins = "INSERT INTO bewertung (`medium_id`, `user_id`, `wert`) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE `wert`=VALUES(wert)";
        $stmt = $conn->prepare($ins);
        $stmt->bind_param("iii", $_GET['id'], $_SESSION['uid'], $_POST['rating']);
        if (!$stmt->execute()) {
            $rating_error = "Fehler beim Speichern der Bewertung";
        }
    }
}

$wert=0;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    $rating_sql = "SELECT wert FROM bewertung WHERE medium_id = $_GET[id] AND user_id = $_SESSION[uid]";
    $rating_res = mysqli_query($conn, $rating_sql);
    if (mysqli_num_rows($rating_res) > 0) {
        $already_rated = true;
        $wert = mysqli_fetch_assoc($rating_res)['wert'];
    }
}
?>
<?php if (isset($rating_error)) {
    echo '<div class="error_msg">' . $rating_error . '</div>';
}
?>

<form action="" method="post">
    <button class="thumb <?php if($wert >= 1) echo 'rated' ?>" name="rating" value=1>&nbsp;</button>
    <button class="thumb <?php if($wert >= 2) echo 'rated' ?>" name="rating" value=2>&nbsp;</button>
    <button class="thumb <?php if($wert >= 3) echo 'rated' ?>" name="rating" value=3>&nbsp;</button>
    <button class="thumb <?php if($wert >= 4) echo 'rated' ?>" name="rating" value=4>&nbsp;</button>
    <button class="thumb <?php if($wert >= 5) echo 'rated' ?>" name="rating" value=5>&nbsp;</button>
</form>