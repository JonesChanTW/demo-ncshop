<?php 
include_once('comm/cart_initial.php');

if($cart->itemcount <= 0){
    exit();
}
include_once('class/mydb.class.php');

$dbo=new dboQ();

$o_name=$_POST['o_name'];
$o_phone=$_POST['o_phone'];
$o_mobile=$_POST['o_mobile'];
$o_addr=$_POST['o_addr'];

$o_date=date('Y-m-d H:i:s');

$u_id=$_SESSION['nc_id'];


$qry="INSERT INTO orders (o_uid, o_name, o_phone, o_mobile, o_addr, o_date) VALUES ('$u_id',  '$o_name', '$o_phone', '$o_mobile', '$o_addr', '$o_date')";

if($dbo->qData($qry)){
    
    $detailErr=false;
    
    $o_id=$dbo->qID();

    foreach($cart->get_contents() as $item){
        $item_id=$item['id'];
        $item_qty=$item['qty'];
        $item_price=$item['price'];
        $qry="INSERT INTO orderdetail (o_id, d_pid, d_qty, d_price) VALUES ('$o_id', '$item_id', '$item_qty', '$item_price')";
        
        if(!$dbo->qData($qry)){
            $detailErr=true;
        }
    }
    
    if(!$detailErr){
        $cart->empty_cart();
        echo 'orderOK';
    }else{
        $qry="DELETE FROM orders WHERE o_id='$o_id'";
        $dbo->qData($qry);
        $qry="DELETE FROM orderdetail WHERE o_id='$o_id'";
        $dbo->qData($qry);
        echo 'detailErr';
    }

    

    
}else{
    echo 'orderErr';
}
?>