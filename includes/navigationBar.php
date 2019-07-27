<div class="navbar">
    <?php
    include("includes/connect.php");

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        echo '
        <a href="logout.php">Logout</a>
        <a href="profil.php">Profil</a>
        <a href="wunschliste.php">Wunschliste</a>
        ';
    } else {
        echo '
        <a href="registrieren.php">Registrieren</a>
        <a href="login.php">Login</a>
        ';
    }
    ?>
</div>