<?php
include('_cart/wfcart.php');

if(!isset($_SESSION)){
    session_start();
}

$cart=&$_SESSION['wfcart'];

if(!is_object($cart)){
    $cart=new wfCart();
}
?>