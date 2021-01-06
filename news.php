<?php 
    include_once('comm/dbo.php');
    include_once('comm/func.php');
    
/*
    if($dbo->connect_error){
        die('dbErr');
    }
*/
    $qry="SELECT * FROM news";
    
    $res=$dbo->query($qry);
    $totalRec=$res->num_rows;

    $pageRecMax=5;
    $totalPages=ceil($totalRec/$pageRecMax);

    if(isset($_GET['pageNum'])){
        $pageNum=$_GET['pageNum'];
    }else{
        $pageNum=0;
    }
    
    $startRec=$pageNum*$pageRecMax;
    $qry.=' LIMIT '.$startRec.', '.$pageRecMax;
    $res=$dbo->query($qry);
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
<!--   ---------------   -->
    <?php include_once('comm/pageHead.php'); ?>
<!--   ---------------   -->
    <link rel="stylesheet" href="css/news.css">
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
<div>
<?php
    while($row=$res->fetch_array()){
        echo '<div class="newsItem">';
        echo '<h1>'.$row['n_title'].'</h1>';
        echo '<p>'.$row['n_date'].'</p>';
        echo '<p>'.$row['n_content'].'</p>';
        echo '</div>';    
    }
    
?>
</div>
<?php 
    setRecNav($pageNum, $totalPages);
?>
</main>
<?php include_once('comm/pageFooter.php'); ?>
</body>
</html>
<?php
    $dbo->close();
?>