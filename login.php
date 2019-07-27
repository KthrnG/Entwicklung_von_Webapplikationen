<?php
include("includes/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myemail = $_POST['email'];
    $mypassword = $_POST['password'];

    $sql = "SELECT uname, userrights FROM users WHERE email = '$myemail' and passwort = '$mypassword'";
    $result = mysqli_query($conn, $sql);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if (mysqli_num_rows($result) == 1) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['name'] = $row["uname"];
            $_SESSION['uright'] = $row["userrights"];
            $_SESSION['email'] = $myemail;
            $_SESSION['pwd'] = $mypassword;
            $_SESSION['loggedin'] = true;
            $name = $_SESSION['name'];
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

<style>
    form {
        display: flex;
        flex-direction: column;
        width: 300px;
        margin: 30px;
        padding: 50px;
        border: 3px solid #0a632d;
    }

    input {
        float: left;
        margin-bottom: 30px;
        padding: 5px;
        /*float: right;*/
    }

    form .statement {
        display: block;
        text-align: left;
        font-size: 16px;
        font-weight: bold;
        padding: 30px 0 0 0; /*4.25%;*/
        margin-bottom: 10px;
        /*margin-left: 25%;
margin-right: 20px;*/
    }

    form button {
        margin-top: 30px;
    }

</style>

<?php
$page = "login";
include "includes/headerbox.php";
include "includes/hamburgerMenu.php";
include "includes/navigationBar.php";
?>

<h1> Login </h1>
<div align="center">
    <form action="" method="post">
        <div id="el">
            <label class="statement">E-Mail
                <input type="text" name="email" size="40" class="box"/>
            </label>
        </div>
        <div id="el">
            <label class="statement">Passwort
                <input type="password" name="password" size="40" class="box"/>
            </label>
        </div>
        <button type="submit" value=" Submit "/>
        Login </button><br/>
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
