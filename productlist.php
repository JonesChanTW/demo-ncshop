<?php
include_once('class/mydb.class.php');
include_once('comm/func.php');
include_once('class/pageNavNoDB.php');


$pageNav=new pageNavNoDB();

$url = 'http://localhost/ncshop1018/backplant/productlistQ.php';
$method="POST";

$productType=null;


if(isset($_GET['pd_type'])){
    $_SESSION['pd_type']=$_GET['pd_type'];
}else if(!isset($_GET['pageNum'])){
    $_SESSION['pd_type']='';
}else{
    if(!isset($_SESSION['pd_type'])){
        $_SESSION['pd_type']='';
    }
}

$productType=$_SESSION['pd_type'];

$data = [];
$data['p_type'] = $productType;


$res = $pageNav->qPageData($url, $method, $data, 8);


?>


<!DOCTYPE html>
<html lang="zh-TW">
<head>
<!--   ---------------   -->
    <?php include_once('comm/pageHead.php'); ?>
<link rel="stylesheet" href="css/productList.css">
<!--   ---------------   -->
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
    
foreach( $res as $row){
    echo '<a href=productDetail.php?p_id='.$row['p_id'].'>';
    echo '<div class="pItem">';
    echo '    <div class="imgWrap">';
    echo '    <img src="productImg/thum/'.$row['p_photo'].'">';
    echo '    </div>';
    echo '    <h2>'.$row['p_name'].'</h2>';
    echo '    <p>'.$row['p_desc'].'</p>';
    echo '    <p>'.$row['p_price'].'</p>';
    echo '</div></a>';
}//*/
    $pageNav->setRecNav();
?>
<!--
    <div class="pItem">
        <div class="imgWrap">
            商品圖片
        </div>
        <h2>品名</h2>
        <p>說明</p>
        <p>金額及加入購物車</p>
    </div>
-->
</main>
<?php include_once('comm/pageFooter.php'); ?>
</body>
</html>
