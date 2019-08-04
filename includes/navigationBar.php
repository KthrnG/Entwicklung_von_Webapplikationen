<!--Leiste unter dem Bildbanner mit Buttons zu weiterführenden Seiten-->
<div class="navbar">
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
      //Buttons, die nur angezeigt werden, wenn der Nutzer eingeloggt ist: Logout, Profil, Wunschliste
        echo '<a href="logout.php"'; if ($page == "logout") echo ' class="active"'; echo '>Logout</a>';
        echo '<a href="profil.php"'; if ($page == "profil") echo ' class="active"'; echo '>Profil</a>';
        echo '<a href="wunschliste.php"'; if ($page == "wunschliste") echo ' class="active"'; echo '>Wunschliste</a>';
        if (isset($_SESSION['admin']) && $_SESSION['admin']) {
          //Buttons, die nur angezeigt werden, wenn der eingeloggte Nutzer Admin-Rechte hat: Adminbereich, Nachrichten
            echo '<a href="admin.php" id="admin"'; if ($page == "admin") echo ' class="active"'; echo '>Adminbereich</a>';
            echo '<a href="messagesToAdmin.php"'; if($page == "messagesToAdmin") echo 'class ="active"'; echo '>Nachrichten</a>';
		} else{
      //Button zur Nachrichten Funktion für angemeldete Nutzer
			echo '<a href="nachrichten.php"'; if ($page == "nachrichten") echo ' class="active"'; echo '>Kontakt</a>';
		}
    } else {
      //Buttons, die für nicht eingeloggt Nutzer(Gäste) angezeigt werden: Registrieren, Einloggen
        echo '<a href="registrieren.php"'; if ($page == "registrieren") echo ' class="active"'; echo '>Registrieren</a>';
        echo '<a href="login.php"'; if ($page == "login") echo ' class="active"'; echo '>Login</a>';
    }
    ?>
</div>
