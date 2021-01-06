<?php
include_once('comm/dbo.php');
if(!isset($_SESSION)){
    session_start();
}


$username=$_POST['username'];
$pw=$_POST['pw'];

$qry="SELECT * FROM adminlist WHERE a_username='$username' AND a_pw=SHA('$pw')";

$res=$dbo->query($qry);

$count=$res->num_rows;

if($count){
    $row=$res->fetch_array();
    $_SESSION['nc_aID']=$row['a_id'];
    $_SESSION['nc_admin']=$row['a_username'];
    
    $cookieName=sha1('mync');
    $cookie=base64_encode("$username:".sha1($pw));
    
    setcookie($cookieName, $cookie, time()+30);
    
    header('location:adminIndex.php');
}else{
    //header('location:adminLogin.php?loginErr=1');
    echo $qry.'<p>';
    echo $count.'<p>';
}
?>