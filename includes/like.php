<?php
if (isset($_POST["like"])) {
    if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {
        $like_error = "Bitte melde dich an, um etwas auf deine Wunschliste zu legen.";
    } else {
        $ins = "INSERT INTO wunschliste (`medium_id`, `user_id`) VALUES (?, ?)";
        $stmt = $conn->prepare($ins);
        $stmt->bind_param("ii", $_GET['id'], $_SESSION['uid']);
        if (!$stmt->execute()) {
            $like_error = "Fehler beim Speichern der Wunschliste";
        }
    }
}

if (isset($_POST["unlike"])) {
    $del = "DELETE FROM wunschliste WHERE medium_id = $_GET[id] AND user_id = $_SESSION[uid]";
    $stmt = $conn->prepare($del);
    if (!$stmt->execute()) {
        $like_error = "Fehler beim Löschen von der Wunschliste";
    }
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    $like_sql = "SELECT user_id FROM wunschliste WHERE medium_id = $_GET[id] AND user_id = $_SESSION[uid]";
    $like_res = mysqli_query($conn, $like_sql);
    if (mysqli_num_rows($like_res) > 0) {
        $liked = true;
    }
}
?>
<?php if (isset($like_error)) {
    echo '<div class="error_msg">' . $like_error . '</div>';
}
?>
<div class="heart">
    <form action="" method="post">
        <button type="submit"
            <?php if (isset($liked) && $liked) echo 'class="active" name="unlike"'; else echo 'name="like"'; ?>>
            <i class="fas fa-heart"></i></i>
        </button>
    </form>
</div>
