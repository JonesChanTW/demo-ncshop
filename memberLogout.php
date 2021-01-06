<?php
if(!isset($_SESSION)){
    session_start();
}

unset($_SESSION['nc_id']);
unset($_SESSION['nc_username']);
unset($_SESSION['nc_name']);

header('location:memberLogin.php');

?>