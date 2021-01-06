<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <?php require_once('comm/pageHead.php'); ?>
<style>
#loginForm {
    width: 300px;
    padding: 20px;
    margin: 50px auto;
    background-color: rgba(255, 255, 255, 0.5);
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}
#loginForm h3 {
    text-align: center;
}
#loginForm label {
    font-size: 0.9em;
}
#loginForm p {
    line-height: 1.8em;
}
#username,#pw,#submit {
    width: 95%;
}
#submit {
    margin-top: 20px;
}
.otherLink{
    text-align: center;
}
.otherLink a{
    margin: 0 12px;
    color: darkgreen;
    background-color: darkgray;
    padding: 2px 10px;
    text-decoration: none;
}
</style>
<script src="js/jquery-3.3.1.min.js"></script>
<script>
$(function() {
    $('#msg').hide();
   $('#loginForm').submit(function(){
       $.ajax({
           url:'memberLoginQ.php',
           type:'post',
           data:$(this).serialize(),
           error:function(){
                alert('err');
           },
           success:function(count){
               if(count=='1'){
                   location.href='index.php';
               }else if(count=='authErr'){
                   $('#msg').html('請完成電子郵件認證').show();
               }else{
                   $('#msg').html('帳密錯誤').show();
                   
               }
           }
       })
       return false;
   })
    
})
</script>
</head>

<body>
<?php require_once('comm/pageHeader.php'); ?>
<main>
   <?php
    if(isset($_GET['sign'])){
        echo '<p class="msg info">註冊成功,請驗證電子郵件</p>';
    }
    if(isset($_GET['auth'])){
        echo '<p class="msg info">已完成認證</p>';
    }
    ?>
    <form id="loginForm" name="loginForm" action="" method="POST">
        <h3>會員登入</h3>
        <p>
            <label for="username">名稱</label><br>
            <input type="text" name="username" id="username" required>
        </p>
        <p>
            <label for="pw">密碼</label><br>
            <input type="password" name="pw" id="pw" required>
        </p>
        <p id="msg" class="msg"></p>
        <p>
            <input type="submit" name="submit" id="submit" value="登入">
        </p>
        <p class="otherLink">
            <a href="sendPW.php">忘記密碼?</a>
            <a href="reSendMail.php">重寄認證信</a>
        </p>
    </form>
</main>
<?php require_once('comm/pageFooter.php'); ?>
</body>
</html>
