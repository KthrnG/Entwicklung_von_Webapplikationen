<!--Hamburger Menü zur Navigation-->
<nav role="navigation">
    <div id="menuToggle">
        <!--Checkbox, um Click aufzunehmen, nach Click Veränderung-->
        <input type="checkbox"/>

        <!--hamburger form-->
        <span></span>
        <span></span>
        <span></span>

        <!--Im ausgeklappten Menü vorhandenen Navigationspunkte. Wenn man sich auf der aktuellen Seite befindet, wird der Punkt als active gesetzt und damit das Aussehen verändert-->
        <ul id="menu">
            <a href="index.php">
                <li <?php if ($page == "index") echo "class='active'"; ?> >
                    Start
                </li>
            </a>
            <a href="about.php">
                <li <?php if ($page == "about") echo "class='active'"; ?> >
                    About
                </li>
            </a>
            <a href="search.php">
                <li <?php if ($page == "search") echo "class='active'"; ?> >
                    Suche
                </li>
            </a>
            <a href="abisz.php">
                <li <?php if ($page == "abisz") echo "class='active'"; ?> >
                    Kräuter A - Z
                </li>
            </a>
            <a href="impressum.php">
                <li <?php if ($page == "impressum") echo "class='active'"; ?> >
                    Impressum
                </li>
            </a>
        </ul>
    </div>
</nav>
