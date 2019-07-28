<?php
if (isset($_POST["like"])) {
    if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {
        $rating_error = "Bitte melde dich an, um eine Bewertung abzugeben.";
    } else {
        $ins = "INSERT INTO bewertung (`medium_id`, `user_id`, `wert`) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($ins);
        $stmt->bind_param("iii", $_GET['id'], $_SESSION['uid'], $_POST['like']);
        if (!$stmt->execute()) {
            $rating_error = "Fehler beim Speichern der Bewertung";
        }
    }
}

if (isset($_GET['id'])) {
    $avg_sql = "SELECT AVG(wert) average FROM bewertung WHERE medium_id = $_GET[id]";
    $avg_res = mysqli_query($conn, $avg_sql);
    if (mysqli_num_rows($avg_res) != 1) {
        $average_rating = 0;
    } else {
        $avg_row = mysqli_fetch_assoc($avg_res);
        $average_rating = number_format($avg_row['average'], 1, '.', '');
        mysqli_free_result($avg_res);
    }
}

$button_disabled = "";

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    $rating_sql = "SELECT wert FROM bewertung WHERE medium_id = $_GET[id] AND user_id = $_SESSION[uid]";
    $rating_res = mysqli_query($conn, $rating_sql);
    if (mysqli_num_rows($rating_res) > 0) {
        $button_disabled = "disabled";
        $wert = mysqli_fetch_assoc($rating_res)['wert'];
    }
}
?>
<?php if (isset($rating_error)) {
    echo '<div class="error_msg">' . $rating_error . '</div>';
}
?>
<div class="average">
    &Oslash; <?php echo $average_rating ?>
</div>
<div class="thumb">
    <form action="" method="post">
        <button type="submit" name="like" value="1" <?php echo $button_disabled ?>>
            <i class="far fa-thumbs-up"></i>
        </button>
        <button type="submit" name="like" value="2" <?php echo $button_disabled ?>>
            <i class="far fa-thumbs-up"></i>
        </button>
        <button type="submit" name="like" value="3" <?php echo $button_disabled ?>>
            <i class="far fa-thumbs-up"></i>
        </button>
        <button type="submit" name="like" value="4" <?php echo $button_disabled ?>>
            <i class="far fa-thumbs-up"></i>
        </button>
        <button type="submit" name="like" value="5" <?php echo $button_disabled ?>>
            <i class="far fa-thumbs-up"></i>
        </button>
    </form>
</div>


