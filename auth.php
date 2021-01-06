<?php
include_once('comm/dbo.php');

$f=sha1('m_username');
$username=$_GET[$f];

$qry="UPDATE member SET m_auth=1 WHERE m_username='$username'";

if($dbo->query($qry)){
    header('location:memberLogin.php?auth=1');
}else{
    header('location:memberLogin.php?authErr=1');
}

?>