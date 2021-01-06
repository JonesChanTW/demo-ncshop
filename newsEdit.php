<?php
include_once("comm/dbc.php");
include_once('adminLoginChk.php');

$n_id=$_GET['n_id'];
$query="SELECT * FROM news WHERE n_id='$n_id'";

//echo 'Query = '.$query;
$result=mysqli_query($dbc, $query);

$row=mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <?php require_once('comm/adminHead.php'); ?>
    <style>

    </style>
    <script>
        $(function() {

        })
    </script>
</head>

<body>
<?php require_once('comm/adminHeader.php'); ?>
<main>
<h1>編輯最新消息</h1>
<?php
    if(isset($_GET['edit'])){
        echo '<p class="msg info">已更新最新消息!!!</p>';
    }
    if(isset($_GET['editErr'])){
        echo '<p class="msg err">更新錯誤!!!</p>';
    }
?>
<form class='dataForm' action="newsEditQ.php" method="post">
    <input type="hidden" name="n_id" id="n_id" value="<?php echo $row['n_id'] ?>">
    <p>
        <label for="n_title">標題:</label>
        <input type="text" name="n_title" id="n_title" value="<?php echo $row['n_title']; ?>">
    </p>
    <p>
        <label for="n_content">內容:</label>
        <textarea name="n_content" id="n_content"><?php echo $row['n_content']; ?></textarea>
    </p>
    <p class="formBtn">
        <input type="submit" name="submit" id="submit" value="確定">
    </p>
</form>
</main>
</body>
</html>
