<?php
include_once('class/mydb.class.php');

$dboQ=new dboQ();

$noProduct=true;
if(isset($_GET['p_id'])){
    $p_id=$_GET['p_id'];
    $noProduct=false;
}else{
    $p_id=0;
}


$qry="SELECT * FROM product WHERE p_id='$p_id'";

$res=$dboQ->qData($qry);
$row=$res->fetch_array();



?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
<!--   ---------------   -->
    <?php include_once('comm/pageHead.php'); ?>
<!--   ---------------   -->
   <link rel="stylesheet" href="css/productDetail.css">
    <style>

    </style>
    <script>
        $(function() {
            
        })
    </script>
</head>

<body>
<?php include_once('comm/pageHeader.php'); ?>
<main>

<?php
    if($noProduct){
        echo '請選擇商品';
    }else{
        echo '<div id="product">';
        echo '<img src="productImg/'.$row['p_photo'].'">';
        echo '<div id="p_desc">';
        echo '<h2>'.$row['p_name'].'</h2>';
        echo '<p><span>特色/描述</span>'.$row['p_desc'].'</p>';
        echo '<p><span>成份/規格</span>'.$row['p_spec'].'</p>';
        echo '<p><span>商品金額</span>'.$row['p_price'].'</p>';
        echo '<p><a class="addCartBtn" href="cart.php?add=1&p_id='.$row['p_id'].'">加入購物車</a></p>';
        //echo '<form id="addCart" name="addCart" action="cart.php" method="POST">';
        //echo '<p><input type="hidden" name="p_id" id="p_id" value="'.$row['p_id'].'"></p>';
        //echo '<input type="submit" id="submit" value="加入購物車">';
        //echo '</form>';
        //echo '<p class="formBtn"><input type="submit" id="submit" value="加入購物車"></p>';
        echo '</div>';
        echo '</div>';
    }
    
?>
<!--
   <div id="product">
       圖片
       <div id="p_desc">
           <h2>品名</h2>
           <p>特色/描述</p>
           <p>成份/規格</p>
           <p>商品金額</p>
           <p><a class="addCartBtn" href="#">加入購物車</a></p>
       </div>
   </div>
-->
</main>
<?php include_once('comm/pageFooter.php'); ?>
</body>
</html>
