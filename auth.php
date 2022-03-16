<?php
session_start();

if (!isset($_SESSION['id'])) {
?>
    <html>

    <head>
        <title>
            Authorization
        </title>
    </head>

    <body>
        <h1>Enter site please!</h1>
        <form method="POST" action="aut.php">
            <input type="text" name="login" placeholder="Login" /><br />
            <input type="password" name="pass" placeholder="Password" /><br />
            <input type="submit" name="sub" value="Enter" />
            <br />
            <a href="registration.php">Registration</a>
        </form>
    </body>

    </html>
<?php
} else {
    header("Location:index.php");
}

?>