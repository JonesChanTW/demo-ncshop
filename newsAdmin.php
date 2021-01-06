<?php
    include_once('comm/dbc.php');
    include_once('adminLoginChk.php');
    include_once('comm/func.php');

    $query="SELECT * FROM news ORDER BY n_id DESC";
    $result=mysqli_query($dbc, $query);
    $totalRec=mysqli_num_rows($result);
    
    $pageRecMax=5;
    $totalPages=ceil($totalRec/$pageRecMax);

    if(isset($_GET['pageNum'])){
        $pageNum=$_GET['pageNum'];
    }else{
        $pageNum=0;
    }
    
    $startRec=$pageNum*$pageRecMax;
    
    $query=$query.' LIMIT '.$startRec.', '.$pageRecMax;
    $result=mysqli_query($dbc, $query);

    
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <?php require_once('comm/adminHead.php'); ?>
    <style>

    </style>
    <script>
        $(function() {
            $('.delBtn').click(function(){
                if(confirm('是否確定刪除?!')){
                    location.href=$(this).attr('href');
                }
                
                return false;
            })
            $('#delSel').click(function(){
                var chkedItem=$('.selNo:checked');
                if(chkedItem.length>0){
                    var chkedNo=new Array();


                    chkedItem.each(function(){
                        chkedNo.push($(this).val());
                    })

                    if( confirm('是否刪除'+chkedNo.toString()+', 共'+chkedNo.length+'筆資料' ) ){
                            $.ajax({
                            url:'newsDelSel.php',
                            type:'post',
                            data:{'chkedNo':chkedNo},
                            error:function(){
                                alert('批次刪除錯誤');
                            },
                            success:function(info){
                                alert('已刪除'+info+'筆資料');
                                location.replace('newsAdmin.php');
                            },
                        })
                    }
                }else{
                    alert('請勾選項目...');
                }
            })
        })
    </script>
</head>

<body>
<?php require_once('comm/adminHeader.php'); ?>
<main>
<h1>最新消息管理頁</h1>
<?php
    if(isset($_GET['del'])){
        echo '<p class="msg info">已刪除最新消息!!!</p>';
    }
    if(isset($_GET['delErr'])){
        echo '<p class="msg err">刪除錯誤!!!</p>';
    }

?>
<p class="recFunc"><a href="newsAdd.php">新增</a></p>
<table class='dataList'>
    <tr>
        <th><a id="delSel" href="#">刪除所選</a></th>
        <th>編號</th>
        <th>標題</th>
        <th>日期</th>
        <th>操作</th>
    </tr>
    <?php
        while($row=mysqli_fetch_array($result)){
            echo '<tr>';
                echo '<td><input type="checkbox" class="selNo" value="'.$row['n_id'].'"></td>';
                echo '<td>'.$row['n_id'].'</td>';
                echo '<td>'.$row['n_title'].'</td>';
                echo '<td>'.$row['n_date'].'</td>';
                echo '<td>';
                echo '<a class="editBtn" href="newsEdit.php?n_id='.$row['n_id'].'">編輯</a>  ';
                echo '<a class="delBtn" href="newsDel.php?n_id='.$row['n_id'].'">刪除</a>';
                echo '</td>';
            echo '</tr>';
        }
    ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

<?php 
    setRecNav($pageNum, $totalPages);
?>

</main>
</body>
</html>
<?php mysqli_close($dbc); ?>