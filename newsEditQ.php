<?php
include_once("comm/dbc.php");
include_once('adminLoginChk.php');

$n_id=$_POST['n_id'];
$n_title=$_POST['n_title'];
$n_content=$_POST['n_content'];

    
$query="UPDATE news SET n_title='$n_title', n_content='$n_content' WHERE n_id='$n_id'";

if(mysqli_query($dbc, $query)){
    header('location:newsEdit.php?edit=1&n_id='.$n_id);
}else{
    header('location:newsEdit.php?editErr=1&n_id='.$n_id);
}

mysqli_close($dbc);
?>