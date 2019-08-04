<?php
//Funktionen für das Hinzufügen der Medien auf die Wunschliste
if (isset($_POST["like"])) {
    if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]) {
        $like_error = "Bitte melde dich an, um etwas auf deine Wunschliste zu legen.";
        //nur eingeloggte Nutzer können Medien auf eine Wunschliste hinzufügen
    } else {
        $ins = "INSERT INTO wunschliste (`medium_id`, `user_id`) VALUES (?, ?)";
        $stmt = $conn->prepare($ins);
        $stmt->bind_param("ii", $_GET['id'], $_SESSION['uid']);
        //Medium erfolgreich auf die Wunschliste hinzugefügt
        if (!$stmt->execute()) {
            $like_error = "Fehler beim Speichern der Wunschliste";
            //Fehlermeldung: Hinzufügen fehlgeschlagen
        }
    }
}

if (isset($_POST["unlike"])) {
  //Löscht Medium von der Wunschliste des Nutzers
    $del = "DELETE FROM wunschliste WHERE medium_id = $_GET[id] AND user_id = $_SESSION[uid]";
    $stmt = $conn->prepare($del);
    if (!$stmt->execute()) {
        $like_error = "Fehler beim Löschen von der Wunschliste";
    }
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
  //Kontrolliert ob Medium schon auf der Wunschliste eines eingeloggten Nutzers ist.
    $like_sql = "SELECT user_id FROM wunschliste WHERE medium_id = $_GET[id] AND user_id = $_SESSION[uid]";
    $like_res = mysqli_query($conn, $like_sql);
    if (mysqli_num_rows($like_res) > 0) {//wenn es ein Ergebnis gibt von der Abfrage
        $liked = true;//Medium ist auf der Wunschliste
    }
}
?>
<?php if (isset($like_error)) {
    echo '<div class="error_msg">' . $like_error . '</div>';//Fehlermeldungen werden hier angezeigt
}
?>
<div class="heart">
    <form action="" method="post">
      <!--Button mit Herz zum Hinzufügen/Entfernen eines Mediums auf der Wunschliste, wenn es auf der Wunschliste ist, erscheint das Herz rosa, sonst grau-->
        <button type="submit" <?php if (isset($liked) && $liked) echo 'class="active" name="unlike"'; else echo 'name="like"'; ?>>
            <i class="fas fa-heart"></i>
        </button>
    </form>
</div>
