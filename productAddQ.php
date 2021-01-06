<?php
include_once('class/mydb.class.php');

$dboQ=new dboQ();

/*
echo 'Start process';
foreach($_POST as $key => $value){
    echo '$_POST['.$key.'] = '.$_POST[$key];
    echo '<br>';
}
*/
$maxSize=1000;
$thumSize=200;

$p_type=$_POST['p_type'];
$p_name=$_POST['p_name'];
$p_price=$_POST['p_price'];
$p_desc=$_POST['p_desc'];
$p_spec=$_POST['p_spec'];
$p_status=$_POST['p_status'];

$qry="INSERT INTO product(p_type, p_name, p_price, p_desc, p_spec, p_status, p_photo) VALUES('$p_type', '$p_name', '$p_price', '$p_desc', '$p_spec', '$p_status', '')";

if($dboQ->qData($qry)){
    $p_id=$dboQ->qID();
    $imgName=$p_id.'.jpg';
    $file=$_FILES['p_photo']['tmp_name'];
    
    
    $src=imagecreatefromjpeg($file);
    list($imgW,$imgH)=GetimageSize($file);
    
    $imgWH=$imgW/$imgH;
    
    if($imgWH >= 1){
        $thumW=$thumSize;
        $thumH=floor($thumSize/$imgWH);
    }else{
        $thumW=$thumSize;
        $thumH=floor($thumSize*$imgWH);
    }
    $thum=imagecreatetruecolor($thumW,$thumH);
    
    imagecopyresampled($thum,$src,0,0,0,0,$thumW,$thumH,$imgW,$imgH);
    imageJPEG($thum,'productImg/thum/'.$imgName);
    
    
    if($imgW > $maxSize || $imgH > $maxSize){
        if($imgWH >= 1){
            $newW=$maxSize;
            $newH=floor($maxSize/$imgWH);
        }else{
            $newW=$maxSize;
            $newH=floor($maxSize*$imgWH);
        }
        $dst=imagecreatetruecolor($newW,$newH);

        imagecopyresampled($dst,$src,0,0,0,0,$newW,$newH,$imgW,$imgH);
        imageJPEG($dst,'productImg/'.$imgName);
    }else{
        move_uploaded_file($file, 'productImg/'.$imgName);
    }
    
    
    $qry="UPDATE product SET p_photo='$imgName' WHERE p_id=$p_id";
    $dboQ->qData($qry);
    echo 'added';
}else{
    echo 'false';
}


?>