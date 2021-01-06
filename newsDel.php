<?php
include_once("comm/dbc.php");
include_once('adminLoginChk.php');

$n_id=$_GET['n_id'];

    
$query="DELETE FROM news WHERE n_id='$n_id'";

if(mysqli_query($dbc, $query)){
    header('location:newsAdmin.php?del=1');
}else{
    header('location:newsAdmin.php?delErr=1');
}

mysqli_close($dbc);
?>