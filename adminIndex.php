<?php
include_once('adminLoginChk.php');
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
<nav id="blockNav">
    <ul>
        <li><a href="newsAdmin.php">最新消息管理</a></li>
        <li><a href="productAdmin.php">商品管理</a></li>
        <li><a href="orderAdmin.php">訂單管理</a></li>
        <li><a href="memberAdmin.html">會員管理</a></li>
        <li><a href="userAdmin.html">使用者管理</a></li>
    </ul>
</nav>
</main>
</body>
</html>
