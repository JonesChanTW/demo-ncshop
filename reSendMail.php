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

        })
    </script>
</head>

<body>
<?php include_once('comm/pageHeader.php'); ?>
<main>
    <?php
        if(isset($_GET['reSend'])){
            echo '<p class="msg info">已重寄認證信</p>';
        }
    ?>
    <h1>重寄註冊認證電子郵件</h1>
    <form action="reSendMailQ.php" method="post">
       <label for="">請輸入您註冊的帳號</label>
        <input type="text" name="username" id="username">
        <input type="submit" value="送出">
    </form>
</main>
<?php include_once('comm/pageFooter.php'); ?>
</body>
</html>
