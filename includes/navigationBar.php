<div class="navbar">
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        echo '
        <a href="logout.php">Logout</a>
        <a href="profil.php">Profil</a>
        <a href="wunschliste.php">Wunschliste</a>
        ';
        if (isset($_SESSION['admin']) && $_SESSION['admin']) {
            echo '<a href="admin.php">Adminbereich</a>';
        }
    } else {
        echo '
        <a href="registrieren.php">Registrieren</a>
        <a href="login.php">Login</a>
        ';
    }
    ?>
</div>