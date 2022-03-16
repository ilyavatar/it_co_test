<?php
session_start();

require "config.php";

if (!isset($_SESSION['id'])) {
    if (isset($_POST['sub'])) {
        if (!empty($_POST['login']) & !empty($_POST['pass']) & !empty($_POST['repass']) & !empty($_POST['email'])) {
            $login = $_POST['login'];
            $password = $_POST['pass'];
            $repassword = $_POST['repass'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $homepage = $_POST['homepage'];

            print $login . " " . $password . " " . $name . " " . $email . " " . $homepage;
            if ($password == $repassword) {
                $key = md5($password);

                $query4 = $db->query("INSERT INTO Users (`login`, `password`, `name`, `email`, `homepage`) VALUES ('$login','$key','$name','$email','$homepage')");
                if ($query4) {
                    header("Location:index.php");
                }
            } else {
?>
                <html>

                <head>
                    <title>
                        Registration
                    </title>
                </head>

                <body>
                    <h1>Password are different</h1>
                    <a href="registration.php">Repeat</a>
                    <a href="index.php">Main page</a>
                    </form>
                </body>

                </html>
            <?php
            }
        } else {
            ?>
            <html>

            <head>
                <title>
                    Registration
                </title>
            </head>

            <body>
                <h1>Some string is empty</h1>
                <a href="registration.php">Repeat</a>
                <a href="index.php">Main page</a>
                </form>
            </body>

            </html>
<?php
        }
    }
} else {
    header("Location:index.php");
}
