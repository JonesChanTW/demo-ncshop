<?php
include_once('class/mydb.class.php');

$dbo=new dboQ();

$m_username=$_POST['username'];

$qry="SELECT * FROM member WHERE m_username='$m_username'";

$res=$dbo->qData($qry);

$count=$res->num_rows;

if($count){
    $row=$res->fetch_array();
    
    $email=$row['m_email'];
    $m_name=$row['m_name'];
    
    $f=sha1('m_username');
    $URL='http://localhost/ncshop1018/auth.php?'.$f.'='.$m_username;
    $to=$email;
    $subject="NatureCare 電子郵件認證";
    $content=$m_name.'你好~歡迎註冊會員 請按<a href="'.$URL.'">連結</a>已完成認證';
    $header='Content-type:text/html; charset=utf-8;'."\r\n".
    'From:joneschean@gmail.com';
    if(mail($to, $subject, $content, $header)){
        //echo '已重寄郵件';
        header('location:reSendMail.php?reSend=1');
    }
}else{
    header('location:reSendMail.php?reSendErr=1');
}




?>