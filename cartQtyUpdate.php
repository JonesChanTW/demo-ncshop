<?php
include_once('comm/cart_initial.php');


$cart->edit_item($_POST['item_id'], $_POST['qty']);

foreach($cart->get_contents() as $item){
    if($item['id'] == $_POST['item_id']){
        $total=array($item['subtotal'], $cart->total);
        echo json_encode($total);
    }
}

?>