<div class="navbar">
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        echo '<a href="logout.php"'; if ($page == "logout") echo ' class="active"'; echo '>Logout</a>';
        echo '<a href="profil.php"'; if ($page == "profil") echo ' class="active"'; echo '>Profil</a>';
        echo '<a href="wunschliste.php"'; if ($page == "wunschliste") echo ' class="active"'; echo '>Wunschliste</a>';
        if (isset($_SESSION['admin']) && $_SESSION['admin']) {
            echo '<a href="admin.php" id="admin"'; if ($page == "admin") echo ' class="active"'; echo '>Adminbereich</a>';
            //echo '<a href="admin_wl.php"'; if ($page == "admin_wl") echo ' class="active"'; echo '>Wunschlistenadministration</a>';
			//echo '<a href="adminNewMedium.php"'; if($page == "adminNewMedium") echo ' class="active"'; echo '>Neues Kraut anpflanzen</a>';
        }
    } else {
        echo '<a href="registrieren.php"'; if ($page == "registrieren") echo ' class="active"'; echo '>Registrieren</a>';
        echo '<a href="login.php"'; if ($page == "login") echo ' class="active"'; echo '>Login</a>';
    }
    ?>
</div>
