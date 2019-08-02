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
<div class="average">
    &Oslash; <?php echo $average_rating ?>
</div>

<div class="thumbs" value="<?php echo $wert ?>">
    <span class="thumb">&nbsp;</span>
    <span class="thumb">&nbsp;</span>
    <span class="thumb">&nbsp;</span>
    <span class="thumb">&nbsp;</span>
    <span class="thumb">&nbsp;</span>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        addListeners();
        setRating(); //based on value inside the div
    });

    function addListeners() {
        var thumbs = document.querySelectorAll('.thumb');
        [].forEach.call(thumbs, function(thumb, index) {
            thumb.addEventListener('click', (function(idx) {
                console.log('adding rating on', index);
                document.querySelector('.thumbs').setAttribute('value', idx + 1);
                console.log('Rating is now', idx + 1);
                setRating();
            }).bind(window, index));
        });

    }

    function setRating() {
        var thumbs = document.querySelectorAll('.thumb');
        var rating = parseInt(document.querySelector('.thumbs').getAttribute('value'));
        [].forEach.call(thumbs, function(thumb, index) {
            if (rating > index) {
                thumb.classList.add('rated');
                console.log('added rated on', index);
            } else {
                thumb.classList.remove('rated');
                console.log('removed rated on', index);
            }
        });
    }

</script>
