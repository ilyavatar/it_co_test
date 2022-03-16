<?php
session_start();

if (!isset($_SESSION['id'])) {
?>
    <html>

    <head>
        <title>
            Registration
        </title>
    </head>

    <body>
        <h1>Enter your data</h1>
        <form method="POST" action="reg.php">
            <input type="text" name="login" placeholder="Login" /><br />
            <input type="password" name="pass" placeholder="Password" /><br />
            <input type="password" name="repass" placeholder="Repassword" /><br />
            <input type="text" name="name" placeholder="Name" /><br />
            <input type="text" name="email" placeholder="@mail" /><br />
            <input type="text" name="homepage" placeholder="Homepage" /><br />
            <input type="submit" name="sub" value="Enter" />
            <br />
            <a href="index.php">Main page</a>
        </form>
    </body>

    </html>
<?php
} else {
    header("Location:index.php");
}
?>