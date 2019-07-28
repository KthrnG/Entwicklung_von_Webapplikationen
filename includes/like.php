<?php
if (isset($_POST["like"])) {
    if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {
        $error = "Bitte melde dich an, um etwas auf deine Wunschliste zu legen.";
    } else {
        $ins = "INSERT INTO wunschliste (`medium_id`, `user_id`) VALUES (?, ?)";
        $stmt = $conn->prepare($ins);
        $stmt->bind_param("ii", $_GET['id'], $_SESSION['uid']);
        if (!$stmt->execute()) {
            $error = "Fehler beim Speichern der Bewertung";
        }
    }
}

$like_button_disabled = "";

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    $like_sql = "SELECT user_id FROM wunschliste WHERE medium_id = $_GET[id] AND user_id = $_SESSION[uid]";
    $rating_res = mysqli_query($conn, $like_sql);
    if (mysqli_num_rows($rating_res) > 0) {
        $like_button_disabled = "disabled";
    }
}
?>
<?php if (isset($error)) {
    echo '<div class="error_msg">' . $error . '</div>';
}
?>
<div class="heart">
    <form action="" method="post">
        <button type="submit" name="like" <?php echo $button_disabled ?>><i class="fas fa-heart"></i></i></button>
    </form>
</div>
