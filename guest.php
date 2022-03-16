<?php
session_start();
require "config.php";

if (isset($_SESSION['id'])) {
?>
    <html>

    <head>
        <title>Guest book</title>
    </head>

    <body>
        <a href="exit.php">Exit</a><br />
        <form method="POST" action="add.php">
            <input type="text" name="text" placeholder="White your message" /><br />
            <input type="submit" name="sub" value="Send" />
        </form>

        <?php
        $query2 = $db->query("SELECT * FROM Messages ORDER BY id DESC");

        if ($query2) {
            if (mysqli_num_rows($query2) > 0) {
                while ($ctg = mysqli_fetch_assoc($query2)) {
                    $userid = $ctg["userid"];
                    $message = $ctg["message"];

                    $query3 = $db->query("SELECT * FROM Users WHERE id=$userid");
                    $userctg = mysqli_fetch_assoc($query3);
                    $name = $userctg["name"];

                    print $name . " <i>says:</i> " . $message . "<br/>";
                }
            } else {
                print "No messages";
            }
        } else {
            print "Some problems";
        }
        ?>

    </body>

    </html>
<?php
} else {
    header("Location:index.php");
}

?>