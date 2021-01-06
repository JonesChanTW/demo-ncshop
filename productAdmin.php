<?php
include_once('adminLoginChk.php');
include_once('class/mydb.class.php');
include_once('class/pageNav.class.php');

//$dbo=new dboQ();
$pageNav= new pageNav();

$pageRecMax=8;

//isset($_POST['sID'])?$sID=$_POST['sID']:'';
//isset($_POST['sName'])?$sName=$_POST['sName']:'';

if(isset($_POST['search'])){
    $_SESSION['sID']=$_POST['sID'];
    $_SESSION['sName']=$_POST['sName'];
}else if(!isset($_GET['pageNum'])){
    $_SESSION['sID']='';
    $_SESSION['sName']='';
}else{
    isset($_SESSION['sID'])?'':$_SESSION['sID']='';
    isset($_SESSION['sName'])?'':$_SESSION['sName']='';
}

$sID=$_SESSION['sID'];
$sName=$_SESSION['sName'];

$condition=array();

if(!empty($sID)){
    //echo 'sID='.$sID;
    array_push($condition, ' p_id='.$sID);
}

if(!empty($sName)){
    array_push($condition, " p_name LIKE '%$sName%'");
    array_push($condition, " p_desc LIKE '%$sName%'");
    array_push($condition, " p_spec LIKE '%$sName%'");
}

$qry="SELECT * FROM product";

if(count($condition)){
    $qry.=' WHERE '.$condition[0];
    for($i=1; $i<count($condition); $i++){
        $qry.=' OR '.$condition[$i];
    }///for
}//if

$qry.= ' ORDER BY p_id DESC';

//echo $qry;

//$qry="SELECT * FROM product ORDER BY p_id DESC";

$res=$pageNav->qPageData($qry, $pageRecMax);

?>


<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <?php require_once('comm/adminHead.php'); ?>
    <link rel="stylesheet" href="css/productAdmin.css">
    <style>
        
    </style>
    <script>
        $(function() {
            $('.delBtn').click(function(){
                var chkedNo=[$(this).attr('data-pid')];
                
                $.ajax({
                    url:'productDels.php',
                    type:'post',
                    data:{'chkedNo':chkedNo},
                    error:function(){
                        alert('err');
                    },
                    success:function(info){
                        alert(info);
                        location.reload();
                    }
                    
                })
            })
            
            $('#delBtn').click(function(){
                
                var checkedItem=$('.selNo:checked');
                var chkedNo=new Array();
                checkedItem.each(function(){
                    chkedNo.push($(this).val());
                })
                
                
                if(confirm('是否刪除'+chkedNo.toString()+',共'+chkedNo.length+'筆資料?')){
                    $.ajax({
                        url:'productDels.php',
                        type:'post',
                        data:{chkedNo:chkedNo},
                        error:function(){
                            alert('err');
                        },
                        success:function(info){
                            alert('已刪除'+info+'筆資料');
                            location.reload();
                        }
                    })
                }
                
                return false;
            })
            
            
        })
    </script>
</head>

<body>
<?php 
    require_once('comm/adminHeader.php');
?>
<main>
<h1>商品管理主頁</h1>
<form id="search" action="productAdmin.php" method="post">
    <p>
        <label>商品搜尋：</label>
        <input type="text" id="sID" name="sID" placeholder="商品編號"
        <?php
            if(isset($_SESSION['sID'])){
                echo ' value='.$_SESSION['sID'];
            }
        ?> >
        or
        <input type="text" id="sName" name="sName" placeholder="關鍵字" 
        <?php
            if(isset($_SESSION['sName'])){
                echo ' value='.$_SESSION['sName'];
            }
        ?> >
        <input type="submit" name="search" value="查詢">
    </p>
</form>
<p class="recFunc"><a id="addBtn" href="productAdd.php">新增商品</a></p>
<div id="productList">
<?php
    while($row=$res->fetch_array()){
        echo '<div class="pItem">';
        echo '<p class="pNo"><input type="checkbox" class="selNo" value="'.$row['p_id'].'">'.$row['p_id'].'</p>';
        echo '<p class="pType">'.$row['p_type'].'</p>';
        echo '<img src="productImg/thum/'.$row['p_photo'].'">';
        echo '<p class="pName">'.$row['p_name'].'</p>';
        echo '<p><a class="editBtn" href="productEdit.php?p_id='.$row['p_id'].'">編輯</a>';
        echo '<a class="delBtn" data-pid="'.$row['p_id'].'" href="#">刪除</a></p>';
        echo '</div>';
    }
?>
<!--
   <div class="pItem">
        <p class="pNo">編號</p>
        <p class="pType">商品分類</p>
        <img>
        <p class="pName">商品名</p>
        <p><a class="editBtn" href="#">編輯</a> <a class="delBtn" href="#">刪除</a></p>
   </div>
-->
</div>
<?php
    $pageNav->setRecNav();
?>
</main>

</body>
</html>
