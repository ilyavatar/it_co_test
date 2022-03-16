<?php
session_start();

require "config.php";

if (isset($_SESSION['id'])) {
    if (isset($_POST['sub']) & !empty($_POST['text'])) {
        $message = $_POST['text'];
        $userid = $_SESSION['id'];

        $query1 = $db->query("INSERT INTO Messages (`userid`, `message`) VALUES ('$userid','$message')");
        if ($query1) {
            header("Location:index.php");
        } else {
            print "Some problems";
?>
            <a href="index.php">Main page</a>
<?php
        }
    } else {
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}
