<?php
include_once("comm/dbc.php");
include_once('adminLoginChk.php');

$chkedNo=$_POST['chkedNo'];
$delCount=0;

foreach($chkedNo as $delNo){
    $query="DELETE FROM news WHERE n_id='$delNo'";
    if(mysqli_query($dbc, $query)){
        $delCount++;
    }
}

echo $delCount;

mysqli_close($dbc);
?>