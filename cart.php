<?php
include_once('comm/cart_initial.php');
include_once('class/mydb.class.php');


$dbo=new dboQ();


if(!isset($_SESSION)){
    session_start();
}

$cart=&$_SESSION['wfcart'];

if(!is_object($cart)){
    $cart=new wfCart();
}


if(isset($_GET['add']) && isset($_GET['p_id'])){
    $p_id=$_GET['p_id'];
    $qry="SELECT * FROM product WHERE p_id='$p_id'";
    
    $row=$dbo->qData($qry)->fetch_array();
    
    $cart->add_item($row['p_id'], 1, $row['p_price'], $row['p_name']);
    
    header('location:cart.php');
}

if(isset($_GET['del']) && isset($_GET['p_id'])){
    $cart->del_item($_GET['p_id']);
    header('location:cart.php');
}

if(isset($_GET['empty'])){
    $cart->empty_cart();
    header('location:cart.php');
}

?>


<!DOCTYPE html>
<html lang="zh-TW">
<head>
<!--   ---------------   -->
    <?php include_once('comm/pageHead.php'); ?>
<!--   ---------------   -->
   <link rel="stylesheet" href="css/cart.css">
    <style>

    </style>
    <script>
        $(function() {
            $('.qty').on('mouseup keyup',function(){
                var thisQty=$(this);
                var qty=thisQty.val();
                var item_id=thisQty.closest('tr').find('.p_id').val();
                
                if(qty > 0 && Math.floor(qty) == qty){
                    $.ajax({
                        url:'cartQtyUpdate.php',
                        type:'post',
                        dataType:'json',
                        data:{qty:qty, item_id:item_id},
                        error:function(){
                            alert('err');
                        },
                        success:function(total){
                            thisQty.closest('tr').find('td').eq(3).html(total[0]);
                            thisQty.closest('table').find('.total').html('金額總計：'+total[1]+'元整');
                        }
                    })
                }else{
                    
                    $.ajax({
                        url:'cartQtyGet.php',
                        type:'post',
                        data:{item_id:item_id},
                        error:function(){
                            
                        },
                        success:function(qty){
                            thisQty.val(qty);
                        }
                    })
                    
                    alert('商品數量不正確');
                }
                
                
            })
        })
    </script>
</head>

<body>
<?php include_once('comm/pageHeader.php'); ?>
<main>
    <h1>購物車</h1>
    <?php
        if($cart->itemcount > 0) {
    ?>
    
    <p class="recFunc"><a id="emptyBtn" href="cart.php?empty=1">清空購物車</a></p>
    <table id="cartList" class="dataList">
        <tr>
            <th>商品名稱</th>
            <th>數量</th>
            <th>單價</th>
            <th>小計</th>
            <th>操作</th>
        </tr>
        <?php
            foreach($cart->get_contents() as $item){
                echo '<tr>';
                echo '<td>'.$item['info'].'</td>';
                echo '<td>';
                echo '<input type="number" class="qty" min="1" value="'.$item['qty'].'">';
                echo '<input type="hidden" class="p_id" value="'.$item['id'].'">';
                echo '</td>';
                echo '<td>'.$item['price'].'</td>';
                echo '<td>'.$item['subtotal'].'</td>';
                echo '<td>';
                echo '<a class="delBtn" href="cart.php?del=1&p_id='.$item['id'].'">刪除</a>';
                echo '</td>';
                echo '</tr>';
            }
        ?>
        <!--        
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        -->
        <tr>
            <td class="total" colspan="5">金額總計：<?php echo $cart->total;   ?>元整</td>
        </tr>
    </table>
    <p><a id="orderBtn" href="orderChk.php">結帳</a></p>
    <?php
        }else{
            echo '<p class="emptyCart">目前無選購商品!!!</p>';
        }
    ?>
</main>
<?php include_once('comm/pageFooter.php'); ?>
</body>
</html>
