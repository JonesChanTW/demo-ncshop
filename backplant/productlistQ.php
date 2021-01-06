<?php
include_once('../class/mydb.class.php');


$qry="SELECT * FROM product";
//$qry="SELECT * FROM product Limit 5";
//$qry="SELECT count(p_id) as total FROM product";

if( isset( $_POST['getCount'] ) ){
    $qry = "SELECT count(p_id) as total FROM product";
    $p_type = '';
    if( isset( $_POST['p_type'] ) ){
        $qry.=" WHERE p_type=".$_POST['p_type'];
    }
}else{
    $p_type = '';
    if( isset( $_POST['p_type'] ) ){
        $p_type = $_POST['p_type'];
    }
    if($p_type != ''){
        $qry.=" WHERE p_type=$p_type";
    }
    
    $start = '';
    if( isset( $_POST['start'] ) && $_POST['start'] != '' ){
        $qry .= " LIMIT ".$_POST['start'];
        if( isset( $_POST['maxRec'] ) && $_POST['maxRec'] != '' ){
            $qry .= ", ".$_POST['maxRec'];
        }
    }
}


$dbo=new dboQ();

$res=$dbo->qData($qry);
$list = [];
//$lastRow = '';
while($row=$res->fetch_array()){
    //$lastRow = $row;
    array_push($list, $row);
}

//echo var_dump($list);
echo json_encode($list);
//echo json_encode($lastRow);

?>