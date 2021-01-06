<?php
include_once('class/mydb.class.php');

$dbo=new dboQ();

$p_id=$_POST['p_id'];


$qry="DELETE FROM product WHERE p_id=$p_id";

//echo $qry;

if($dbo->qData($qry)){
    
    $imgURL='productImg/'.$p_id.'.jpg';
    $thumURL='productImg/thum/'.$p_id.'.jpg';
    
    is_file($imgURL)?unlink($imgURL):'';
    is_file($thumURL)?unlink($thumURL):'';
    
    echo $p_id;
}




?>