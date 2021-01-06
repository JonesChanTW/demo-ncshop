<?php 
include_once('comm/dbo.php');

$m_pw=$dbo->real_escaoe_string($_POST['m_pw']);
$m_pw2=$dbo->real_escaoe_string($_POST['m_pw2']);
$m_name=$dbo->real_escaoe_string($_POST['m_name']);
$m_sex=$_POST['m_sex'];
$m_tel=$dbo->real_escaoe_string($_POST['m_tel']);
$m_mobile=$dbo->real_escaoe_string($_POST['m_mobile']);
$m_email=$dbo->real_escaoe_string($_POST['m_email']);
$m_addr=$dbo->real_escaoe_string($_POST['m_addr']);

if($m_pw!=$m_pw2){
    echo 'notMatch';
    $dbo->close();
    exit();
}

$qry="UPDATE member SET m_name='$m_name', m_sex=$m_sex, m_tel='$m_tel', m_mobile='$m_mobile', m_email='$m_email', m_addr='$m_addr'";

if(!empty($m_pw)){
    $qry.=", m_pw=SHA('$m_pw') ";
}

$qry.=" WHERE m_id=".$_SESSION['nc_id'];
//foreach($_POST as $key => $value){
//    echo $key.'['.$value.'] </br>';
//}
if($dbo->query($qry)){
    echo 'update';
}else{
    echo 'updateErr';
}
$dbo->close();
?>