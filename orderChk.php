<?php
include_once('comm/cart_initial.php');

if($cart->itemcount <= 0){
    header('location:cart.php');
    exit();
}

include_once('class/mydb.class.php');

$dbo=new dboQ();

$qUser="SELECT * FROM member WHERE m_id=".$_SESSION['nc_id'];

$user=$dbo->qData($qUser)->fetch_array();

?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
<!--   ---------------   -->
    <?php include_once('comm/pageHead.php'); ?>
<!--   ---------------   -->
    <style>

    </style>
    <script>
        $(function() {
            $('#order').submit(function(){
                
                $.ajax({
                    url:'orderAddQ.php',
                    type:'post',
                    data:$(this).serialize(),
                    error:function(){
                        alert('err');
                    },
                    success:function(info){
                        if(info=='orderOK'){
                            $('h2').eq(0).html('已收到訂單，感謝訂購').addClass('msg info');
                            $('h2').eq(1).html('');
                            $('input').attr('disabled', true).css({'background-color':'gray'});
                            $('#submit, #reset').remove();
                        }else{
                            alert('訂購異常');
                        }
                    }
                })/// $.ajax({
                
                return false;
            })/// $('#order').submit(function(){
            
        })
    </script>
</head>

<body>
<?php include_once('comm/pageHeader.php'); ?>
<main>
    <h2>以下為結帳商品內容</h2>
    <table id="orderList" class="dataList">
        <tr>
            <th>商品名稱</th>
            <th>數量</th>
            <th>單價</th>
            <th>小計</th>
        </tr>
        <?php
            foreach($cart->get_contents() as $item){
                
                $qry="SELECT * FROM product WHERE p_id=".$item['id'];
                $row=$dbo->qData($qry)->fetch_array();
                
                echo '<tr>';
                echo '<td>'.$item['info'].'<img src="productImg/thum/'.$row['p_photo'].'"></td>';
                echo '<td>'.$item['qty'].'</td>';
                echo '<td>'.$item['price'].'</td>';
                echo '<td>'.$item['subtotal'].'</td>';
                echo '</tr>';
            }
        ?>
        <tr>
            <td class="total" colspan="4">結帳金額共計：<?php echo $cart->total; ?>元整</td>
        </tr>
    </table>
    <h2>請填寫訂貨人及送貨資料</h2>
    <form id="order" class="dataForm" name="order" method="post" action="">
        <p>
            <label for="o_name">收件人姓名：</label>
            <input name="o_name" type="text" id="o_name" value="<?php echo $_SESSION['nc_name']; ?>">
        </p>
        <p>
            <label for="o_phone">聯絡電話：</label>
            <input name="o_phone" type="text" id="o_phone" value="<?php echo $user['m_tel']; ?>">
        </p>
        <p>
            <label for="o_mobile">行動電話：</label>
            <input name="o_mobile" type="text" id="o_mobile" value="<?php echo $user['m_mobile'] ?>">
        </p>
        <p>
            <label for="o_addr">收件人地址：</label>
            <input name="o_addr" type="text" id="o_addr" value="<?php echo $user['m_addr'] ?>">
        </p>
        <p class="formBtn">
            <input type="submit" name="submit" id="submit" value="訂購">
            <input type="reset" id="reset" name="reset">
        </p>
    </form>
</main>
<?php include_once('comm/pageFooter.php'); ?>
</body>
</html>
