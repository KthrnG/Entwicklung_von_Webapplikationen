<nav role="navigation">
    <div id="menuToggle">
        <!--click reciever-->
        <input type="checkbox"/>

        <!--hamburger form-->
        <span></span>
        <span></span>
        <span></span>

        <!--menu points inside the foldout menu-->
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
            <a href="search.html">
                <li <?php if ($page == "search") echo "class='active'"; ?> >
                    Suche
                </li>
            </a>
            <a href="abisz.html">
                <li <?php if ($page == "abisz") echo "class='active'"; ?> >
                    Kräuter A - Z
                </li>
            </a>
            <a href="impressum.html">
                <li <?php if ($page == "impressum") echo "class='active'"; ?> >
                    Impressum
                </li>
            </a>
        </ul>
    </div>
</nav>