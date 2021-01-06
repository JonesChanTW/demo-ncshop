<?php
include_once('comm/dbo.php');

$cookieName=sha1('mync');
if(isset($_COOKIE[$cookieName])){
    $cookieValue=$_COOKIE[$cookieName];
    $content=base64_decode($cookieValue);
    list($username,$hashed_pw)=explode(':',$content);
    
    $qry="SELECT * FROM adminlist WHERE a_username='$username' AND a_pw='$hashed_pw'";
    
    //echo 'debug info = '.$qry.'<br>';
    //echo 'debug info dbo= '.$dbo.'<br>';
    
    $res=$dbo->query($qry);
    $row=$res->fetch_array();
    $count=$res->num_rows;
    
    if($count){
        $_SESSION['nc_aID']=$row['a_id'];
        $_SESSION['nc_admin']=$row['a_username'];
    }
}

if(!isset($_SESSION['nc_aID'])){
    header('location:adminLogin.php');
}
?>