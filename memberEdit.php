<?php
include_once('memberLoginChk.php');
include_once('comm/dbo.php');

$qry="SELECT * FROM member WHERE m_id=".$_SESSION['nc_id'];

$row=$dbo->query($qry)->fetch_array();

?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <?php require_once('comm/pageHead.php'); ?>
<style>
</style>
<script>
    $(function(){
        //$('# Err').remove();
        $('#memberEdit').submit(function(){
            
            $.ajax({
                url:'memberEditQ.php',
                type:'post',
                data:$(this).serialize(),
                error:function(){
                },
                success:function(info){
                    //alert(info);.
                    
                    switch(info){
                        case 'update':
                            alert('資料已更新');
                            break;
                        case 'updateErr':
                            alert('更新異常!!');
                            break;
                        case 'notMatch':
                            $('#m_pw2').parent().append('<span class="msg Err">密碼及確認密碼不符</span>');
                            break;
                    }
                }
            })
            
            return false;
        })
        
    })
</script>
</head>
<body>
<?php include_once('comm/pageHeader.php'); ?>
<main>
    <h1>個人資料</h1>
    <form id="memberEdit" class="dataForm" action="" method="post">
        <p>
            <label for="m_username">會員帳號：</label>
            <input type="text" id="m_username" name="m_username" value="<?php echo htmlspecialchars($row['m_username']); ?>" disabled>
        </p>
        <p>
            <label for="m_pw">變更密碼：</label>
            <input type="password" id="m_pw" name="m_pw" maxlength="16"  pattern="\w{1,16}" placeholder="不變更密碼,請保持空白">
        </p>
        <p>
            <label for="m_pw2">確認密碼：</label>
            <input type="password" id="m_pw2" name="m_pw2" maxlength="16"  pattern="\w{1,16}" placeholder="不變更密碼,請保持空白">
        </p>
        <p>
            <label for="m_name">姓名：</label>
            <input type="text" id="m_name" name="m_name" maxlength="20" value="<?php echo htmlspecialchars($row['m_name']); ?>">
        </p>
        <p>
            <label for="">性別：</label>
            <input type="radio" id="male" name="m_sex" value="1"
                <?php 
                    if($row['m_sex']=='1') {
                        echo ' checked ';
                    } 
                ?>
            >
            <label for="male">男</label>
            <input type="radio" id="female" name="m_sex" value="0"
                <?php 
                    if($row['m_sex']=='0') {
                        echo ' checked ';
                    } 
                ?>
            >
            <label for="female">女</label>
        </p>
        <p>
            <label for="m_tel">電話：</label>
            <input type="tel" id="m_tel" name="m_tel" maxlength="20" value="<?php echo htmlspecialchars($row['m_tel']); ?>">
        </p>
        <p>
            <label for="m_mobile">行動電話：</label>
            <input type="tel" id="m_mobile" name="m_mobile" maxlength="20" value="<?php echo htmlspecialchars($row['m_mobile']); ?>">
        </p>
        <p>
            <label for="m_email">電子郵件：</label>
            <input type="email" id="m_email" name="m_email" maxlength="60" value="<?php echo htmlspecialchars($row['m_email']); ?>">
        </p>
        <p>
            <label for="m_addr">地址：</label>
            <input type="text" id="m_addr" name="m_addr" maxlength="60" value="<?php echo htmlspecialchars($row['m_addr']); ?>">
        </p>
        <p class="formBtn">
            <input type="submit" id="submit" name="memberAdd" value="送出">
            <input type="reset" id="reset">
        </p>
    </form>
</main>
</body>
