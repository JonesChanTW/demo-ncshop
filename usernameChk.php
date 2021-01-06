<?php
include_once('comm/dbo.php');

$username=$_POST['username'];

//$qry="SELECT * FROM member WHERE m_username='$username'";

$qry="SELECT count(m_username) as count FROM member WHERE m_username='$username'";

$res=$dbo->query($qry);

//$userCount=$res->num_rows;
$row=$res->fetch_array();

echo $row['count'];
?>