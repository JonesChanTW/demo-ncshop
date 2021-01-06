<?php 
//include_once('class/mydb.class.php');

//$dbo=new dboQ();
try{
$dsn='mysql:host=localhost;dbname=225129;charset=utf8;';
//$dsn='mysql:host=192.168.100.12;dbname=225129;charset=utf8;';
$db=new PDO($dsn, '225129', 'a1254782');    
}catch(PDOException $e){
    echo 'Err='.$e->getMessage();
    die();
}


ini_set('date.timezone','asia/taipei');

if(!isset($_SESSION)){
    session_start();
}

$userID=$_SESSION['nc_id'];

$qry="SELECT * FROM orders WHERE o_uid=:userID ORDER BY o_date DESC";

$stmt=$db->prepare($qry);
$stmt->bindParam('userID', $userID);
$stmt->execute();

//以此方法取得最後新增資料的ID 則用
//$db->lastInsertId();
//但這行必須跟在insert指令執行完的當下就得做
//如要取得 此次撈取的資料筆數總數 則可用
//$stmt->rowCount();

?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
<?php require_once('comm/pageHead.php'); ?>
   <link rel="stylesheet" href="css/orderHistory.css">
    <style>

    </style>
    <script>
        $(function() {
            $('.oDetail div').hide();
            $('.detailBtn').click(function(){
                $(this).closest('table').find('.oDetail div').slideToggle();
                
                return false;
            })  //$('.detailBtn').click(function(){
            
        })
    </script>
</head>

<body>
<?php require_once('comm/pageHeader.php'); ?>
<main>
<h1>訂單紀錄</h1>
<?php
    while($row=$stmt->fetch()){
        echo '<div class="order">';
        echo '<p class="orderDate">'.$row['o_date'].'</p>';
        echo '<table class="orderRec">';
        echo '<tr>';
        echo '<th class="oId">訂單編號</th>';
        echo '<th class="oTo">收貨人</th>';
        echo '<th class="oAddr">地址</th>';
        echo '<th class="oTotal">總金額</th>';
        echo '<th></th>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>'.$row['o_id'].'</td>';
        echo '<td>'.$row['o_name'].'</td>';
        echo '<td>'.$row['o_addr'].'</td>';
        
        $total=0;
        $qryD="SELECT * FROM orderdetail WHERE o_id=:o_id";
        $stmtD=$db->prepare($qryD);
        $stmtD->bindParam('o_id', $row['o_id']);
        $stmtD->execute();
        
        while($rowD=$stmtD->fetch()){
            $total += $rowD['d_price']*$rowD['d_qty'];
        }
        
        echo '<td>'.$total.'</td>';
        echo '<td><a class="detailBtn" href="#">詳細資料</a></td>';
        echo '</tr>';
        
        echo '<tr><td class="oDetail" colspan="5"><div><table>';
        echo '<tr>';
        echo '<th>商品編號</th>';
        echo '<th>圖片</th>';
        echo '<th>商品名稱</th>';
        echo '<th>數量</th>';
        echo '<th>單價</th>';
        echo '</tr>';
        
        $qryD="SELECT od.*, pd.p_name, pd.p_photo FROM orderdetail AS od JOIN product AS pd ON od.d_pid=pd.p_id WHERE o_id=:o_id";
        
        $stmtD=$db->prepare($qryD);
        $stmtD->bindParam('o_id', $row['o_id']);
        $stmtD->execute();
        
        while($rowD=$stmtD->fetch()){
            echo '<tr>';
            echo '<td>'.$rowD['d_pid'].'</td>';
            echo '<td><img src="productImg/thum/'.$rowD['p_photo'].'"></td>';
            echo '<td>'.$rowD['p_name'].'</td>';
            echo '<td>'.$rowD['d_qty'].'</td>';
            echo '<td>'.$rowD['d_price'].'</td>';
            echo '</tr>';
        }
        
        //$resD=$dbo->qData($qryD);
        //while( $rowD=$resD->fetch_array() ){
        //    echo '<tr>';
        //    echo '<td>'.$rowD['d_pid'].'</td>';
        //    echo '<td><img src="productImg/thum/'.$rowD['p_photo'].'"></td>';
        //    echo '<td>'.$rowD['p_name'].'</td>';
        //    echo '<td>'.$rowD['d_qty'].'</td>';
        //    echo '<td>'.$rowD['d_price'].'</td>';
        //    echo '</tr>';
        //}
        
        
        echo '</table></div></td></tr>';
        
        echo '</table>';
        echo '</div>';
    }
    
?>
<!--<div class="order">
    <p class="orderDate">訂單日期：</p>
    <table class="orderRec">
        <tr>
            <th class="oId">訂單編號</th>
            <th class="oTo">收貨人</th>
            <th class="oAddr">地址</th>
            <th class="oTotal">總金額</th>
            <th></th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a class="detailBtn" href="#">詳細內容</a></td>
        </tr>
        <tr>
            <td class="oDetail" colspan="5">
                <div>
                    <table>
                        <tr>
                            <th>商品編號</th>
                            <th>圖片</th>
                            <th>商品名稱</th>
                            <th>數量</th>
                            <th>單價</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td><img src=""></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><img src=""></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</div>
-->


</main>
<?php require_once('comm/pageFooter.php'); ?>
</body>
</html>
