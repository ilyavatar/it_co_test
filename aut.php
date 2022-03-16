<?php
session_start();

require "config.php";

if (!isset($_SESSION['id'])) {
    if (isset($_POST['sub'])) {
        $login = $_POST['login'];
        $password = $_POST['pass'];
        $key = md5($password);
        $query = $db->query("SELECT * FROM Users WHERE login = '$login' AND password = '$key'");

        if ($query) {
            if (mysqli_num_rows($query) > 0) {
                $ctg = mysqli_fetch_assoc($query);
                $id = $ctg["id"];
                // $log = $ctg["login"];
                // $pass = $ctg["password"];
                // $name = $ctg["name"];

                $_SESSION['id'] = $id;
                header("Location:index.php");
            } else {
                print "User was not found";
?>
                <a href="index.php">Main page</a>
<?php
            }
        } else {
            print "Problems in line 1";
        }
    }
} else {
    header("Location:index.php");
}
