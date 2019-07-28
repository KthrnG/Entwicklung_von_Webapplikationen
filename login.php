<?php
include("includes/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myemail = $_POST['email'];
    $mypassword = $_POST['password'];

    $sql = "SELECT id, vorname, name, admin FROM users WHERE email = '$myemail' and passwort = '$mypassword'";
    $result = mysqli_query($conn, $sql);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if (mysqli_num_rows($result) == 1) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['uid'] = $row["id"];
            $_SESSION['vorname'] = $row["vorname"];
            $_SESSION['name'] = $row["name"];
            $_SESSION['admin'] = $row["admin"];
            $_SESSION['email'] = $myemail;
            $_SESSION['pwd'] = $mypassword;
            $_SESSION['loggedin'] = true;
            $name = $_SESSION['vorname'];
            //$error = "Willkommen " . $name ."<br>";
            header("Location:welcome.php");
            exit();
        }
    } else {
        $error = "Login fehlgeschlagen";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <?php include "includes/head.php" ?>
</head>

<body>

<?php
$page = "login";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1>Login</h1>
<div class="form_container">
    <form action="" method="post">
        <label>E-Mail
            <input type="text" name="email" size="40"/>
        </label>
        <label>Passwort
            <input type="password" name="password" size="40"/>
        </label>
        <button type="submit" value=" Submit ">
            Login
        </button>
    </form>

    <?php if (isset($error)) {
        echo '<div style="font-size:11px; color:#cc0000; margin-top:10px">' . $error . '</div>';
    }
    ?>
</div>

<?php
include "includes/footerbox.php";
?>

</body>
</html>
