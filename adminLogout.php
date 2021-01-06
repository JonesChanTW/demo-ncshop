<?php
if(isset($_SESSION)){
    session_start();
}

unset($_SESSION['nc_aID']);
unset($_SESSION['nc_admin']);

$cookieName=sha1('mync');
setcookie($cookieName, '', time()-1);

header('location:adminLogin.php');
?>