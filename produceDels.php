<?php
include_once('class/mydb.class.php');
$dbo=new dboQ();

$chkedNo=$_POST['chkedNo'];
$delCount=0;

foreach($chkedNo as $delNo){
    $qry="DELETE FROM product WHERE p_id='$delNo'";
    
    if($dbo->qData($qry)){
        $delCount++;
        $imgURL='productImg/'.$delNo.'.jpg';
        is_file($imgURL)?unlink($imgURL):'';
        $thumURL='productImg/thum/'.$delNo.'.jpg';
        is_file($thumURL)?unlink($thumURL):'';
    }
}
echo $delCount;

?>