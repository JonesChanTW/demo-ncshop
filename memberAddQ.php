<?php
include_once('comm/dbo.php');

$m_username=$dbo->real_escape_string($_POST['m_username']);
$m_pw=$_POST['m_pw'];
$m_name=$_POST['m_name'];
$m_sex=$_POST['m_sex'];
$m_tel=$_POST['m_tel'];
$m_mobile=$_POST['m_mobile'];
$m_addr=$_POST['m_addr'];
$m_email=$_POST['m_email'];





$qry="INSERT INTO member(m_username, m_pw, m_name, m_sex, m_tel, m_mobile, m_addr, m_email, m_auth) VALUE('$m_username', SHA('$m_pw'), '$m_name', $m_sex, '$m_tel', '$m_mobile', '$m_addr', '$m_email', 0)";

if($dbo->query($qry)){
    $f=sha1('m_username');
    $URL='http://ncshop1018-jones.eu5.org/auth.php?'.$f.'='.$m_username;
    $to=$m_email;
    $subject="NatureCare 電子郵件認證";
    $content='你好~歡迎註冊會員 請按<a href="'.$URL.'">連結</a>已完成認證';
    $header='Content-type:text/html; charset=utf-8;'."\r\n".
    'From:joneschean@gmail.com';
    mail($to, $subject, $content, $header);
    header('location:memberLogin.php?sign=1');
}else{
    echo $qry;
    //header('location:memberAdd.php?signErr=1');
}

$dbo->close();

?>