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
    
    $length=8;
    $possible='23456789abcdedghjkmnpqrstuvwxyzABCDEFGHJKMNPRSTUVWXYZ';
    $pw='';
    
    for($i=0;$i<$length;$i++){
        $char=substr( $possible, mt_rand( 0, strlen( $possible ) - 1 ), 1 );
        $pw.=$char;
    }
    echo $pw;
    
    $qry="UPDATE member SET m_pw=sha('$pw') WHERE m_username='$m_username'";
    $dbo->qData($qry);
    
    $to=$email;
    $subject="NatureCare 重設會員密碼";
    $content=$m_name.'你好~您的密碼已重設為'.$pw;
    $header='Content-type:text/html; charset=utf-8;'."\r\n".
    'From:joneschean@gmail.com';
    if(mail($to, $subject, $content, $header)){
        //echo '已重寄郵件';
        header('location:sendPW.php?resetPW=1');
    }
}else{
    header('location:sendPW.php?resetPWErr=1');
}




?>