<?php
include_once('adminLoginChk.php');
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <?php require_once('comm/adminHead.php'); ?>
    <link href="css/news.css" rel="stylesheet">
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
    <h1>新增最新消息</h1>
    <?php
        if(isset($_GET['add'])){
            echo '<p class="msg info">已新增最新消息!!!</p>';
        }
        if(isset($_GET['addErr'])){
            echo '<p class="msg err">新增錯誤!!!</p>';
        }
    ?>
    <form id="newsAdd" class="dataForm" action="newsAddQ.php" method="post">
        <p>
            <label for="n_title">標題:</label>
            <input type="text" name="n_title" id="n_title">
        </p>
        <p>
            <label for="n_content">內容:</label>
            <textarea name="n_content" id="n_content"></textarea>
        </p>
        <p class="formBtn">
            <input type="submit" name="submit" id="submit" value="新增">
            <input type="reset" name="reset" id="reset">
        </p>
    </form>
</main>
</body>
</html>
