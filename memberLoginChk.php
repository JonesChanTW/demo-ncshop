<?php
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['nc_id'])){
    header('location:memberLogin.php');
}
?>