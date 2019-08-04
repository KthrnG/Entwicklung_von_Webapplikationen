<?php
//Berechnet die Durchschnittliche Bewertung von einem ausgewählten Medium
if (isset($_GET['id'])) {
    $avg_sql = "SELECT AVG(wert) average FROM bewertung WHERE medium_id = $_GET[id]";
    $avg_res = mysqli_query($conn, $avg_sql);
    if (mysqli_num_rows($avg_res) != 1) {
        $average_rating = 0;//bei nicht vorhandenen Bewertungen ist der Durchschnitt 0
    } else {
        $avg_row = mysqli_fetch_assoc($avg_res);
        $average_rating = number_format($avg_row['average'], 1, '.', '');
        mysqli_free_result($avg_res);
    }
}
?>

<div class="average">
    &Oslash; <?php echo $average_rating ?>
</div>
