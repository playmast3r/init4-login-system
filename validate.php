<?php
//include this file in all pages where you want to verify user logged in status
//example: require("validate.php");

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] =='customer') {
//do nothing
}
 else {
    //send user to login page
    header('Location: login.php');
}
?>
