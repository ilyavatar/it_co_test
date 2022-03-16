<?php
session_start();

if(isset($_SESSION['id']))
{
    header("Location:guest.php");
}
else
{
    header("Location:auth.php");
}

?>