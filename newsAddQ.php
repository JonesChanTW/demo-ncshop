<?php
include_once('adminLoginChk.php');
include_once("comm/dbc.php");

$n_title=$_POST['n_title'];
$n_content=$_POST['n_content'];
ini_set('date.timezone', 'asia/taipei');
$now=date('Y-m-d H:i:s');
    
$query="INSERT INTO news(n_title, n_content, n_date) VALUES('$n_title', '$n_content', '$now')";

if(mysqli_query($dbc, $query)){
    header('location:newsAdd.php?add=1');
}else{
    header('location:newsAdd.php?addErr=1');
}

mysqli_close($dbc);
?>