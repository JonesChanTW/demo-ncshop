<?php
include_once('comm/dbo.php');

$m_username=$_POST['username'];
$m_pw=$_POST['pw'];

/*
$qry="SELECT * FROM member WHERE m_username='$m_username' AND m_pw=SHA('$m_pw')";

$res=$dbo->query($qry);
*/

$qry="SELECT * FROM member WHERE m_username=? AND m_pw=SHA(?)";

$stmt=$dbo->prepare($qry);
$stmt->bind_param('ss', $m_username, $m_pw);
$stmt->execute();

$res=$stmt->get_result();

$count=$res->num_rows;

if($count==1){
    $row=$res->fetch_array();
    if($row['m_auth']==1){
        $_SESSION['nc_id']=$row['m_id'];
        $_SESSION['nc_username']=$row['m_username'];
        $_SESSION['nc_name']=$row['m_name'];
    }else{
        $count='authErr';
    }
}

$dbo->close();
echo $count;



?>