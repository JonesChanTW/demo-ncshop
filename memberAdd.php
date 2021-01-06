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
            $('#m_username').keyup(function(){
                var cur=$(this);
                cur.parent().find('span.msg').remove();
                $.ajax({
                    url:'usernameChk.php',
                    type:'post',
                    data:{'username':$(this).val()},
                    error:function(){
                        alert('err');
                    },
                    success:function(userCount){
                        if(userCount==0){
                            //alert('此帳號已有人使用');
                            cur.parent().append('<span class="msg info">此帳號可使用</span>');
                        }else{
                            cur.parent().append('<span class="msg err">此帳號已有人使用</span>');
                        }
                    }
                })
            })
            
            $('#m_pw,#m_pw2').keyup(function(){
                $('#m_pw2').parent().find('span.msg').remove();
                var pw=$('#m_pw').val();
                var pw2=$('#m_pw2').val();
                
                if(pw!=pw2 && pw2.length>0){
                    $('#m_pw2').parent().append('<span class="msg err">密碼不符</span>')
                }
            })
            
            $('#memberAdd').submit(function(){
                if($('.err').length>0){
                    return false;
                }
            })
            
            
        })
    </script>
</head>

<body>
<?php include_once('comm/pageHeader.php'); ?>
<main>
    <h1>加入會員</h1>
    <?php
    if(isset($_GET['signErr'])){
        echo '<p class="msg err">資料異常</p>';
    }
    ?>
    <form id="memberAdd" class="dataForm" action="memberAddQ.php" method="post">
        <p>
            <label for="m_username">會員帳號：</label>
            <input type="text" id="m_username" name="m_username" required maxlength="30">
        </p>
        <p>
            <label for="m_pw">密碼：</label>
            <input type="password" id="m_pw" name="m_pw" required>
        </p>
        <p>
            <label for="m_pw2">確認密碼：</label>
            <input type="password" id="m_pw2" name="m_pw2" required>
        </p>
        <p>
            <label for="m_name">姓名：</label>
            <input type="text" id="m_name" name="m_name" required>
        </p>
        <p>
            <label for="">性別：</label>
            <input type="radio" id="male" name="m_sex" value="1" required>
            <label for="male">男</label>
            <input type="radio" id="female" name="m_sex" value="0">
            <label for="female">女</label>
        </p>
        <p>
            <label for="m_tel">電話：</label>
            <input type="tel" id="m_tel" name="m_tel" required>
        </p>
        <p>
            <label for="m_mobile">行動電話：</label>
            <input type="tel" id="m_mobile" name="m_mobile" required>
        </p>
        <p>
            <label for="m_email">電子郵件：</label>
            <input type="email" id="m_email" name="m_email" required>
        </p>
        <p>
            <label for="m_addr">地址：</label>
            <input type="text" id="m_addr" name="m_addr" required>
        </p>
        <p>
            <label for=""></label>
            <input type="checkbox" id="m_agree">
            <label for="m_agree">加入會員即表示同意並遵守會員條款。</label>
        </p>
        <p class="formBtn">
            <input type="submit" id="submit" name="memberAdd" value="送出">
            <input type="reset" id="reset">
        </p>
    </form>
</main>
<?php include_once('comm/pageFooter.php'); ?>
</body>
</html>
