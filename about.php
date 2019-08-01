<!DOCTYPE html>
<html>

<head>
    <?php include "includes/head.php" ?>
</head>

<body>

<?php
$page = "about";
include "includes/connect.php";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Über</h1>

<div class="about">
    <table>
        <tbody>
        <tr>
            <td>
                Das Kräuterarchiv ist eine Online-Plattform, die auf einer digitalen Bibliothek basiert,
                die allgemeine Informationen über die Pflege, die ideale Vegetationszeit und die
                Behandlung jeder Pflanze liefert. Um den Anbau von Pflanzen auf lokale und nachhaltige
                Weise zu fördern und zu erleichtern. <br> Ebenso wichtig erscheint es uns, in ständigem Kontakt mit dem
                Nutzer zu stehen,
                damit dieser ein aktiver Teil der Community sein und die auf der Plattform präsentierten
                Informationen bewerten kann.
            </td>
        </tr>
        </tbody>
    </table>
</div>

<?php
include "includes/footerbox.php";
?>

</body>
</html>
