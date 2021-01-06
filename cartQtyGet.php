<?php
include_once('comm/cart_initial.php');

foreach($cart->get_contents() as $item){
    if($item['id'] == $_POST['item_id']){
        echo $item['qty'];
    }
}

?>