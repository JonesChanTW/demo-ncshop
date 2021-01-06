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
        if(isset($_GET['resetPW'])){
            echo '<p class="msg info">已重設密碼,新密碼已寄到您的信箱</p>';
        }
    ?>
    <h1>重設密碼</h1>
    <form action="sendPWQ.php" method="post">
       <label for="">請輸入您註冊的帳號</label>
        <input type="text" name="username" id="username">
        <input type="submit" value="送出">
    </form>
</main>
<?php include_once('comm/pageFooter.php'); ?>
</body>
</html>
