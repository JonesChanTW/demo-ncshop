<?php
include_once('adminLoginChk.php');
include_once('class/mydb.class.php');

$dbo=new dboQ();

$p_id=$_POST['p_id'];
$p_type=$_POST['p_type'];
$p_name=$_POST['p_name'];
$p_price=$_POST['p_price'];
$p_desc=$_POST['p_desc'];
$p_spec=$_POST['p_spec'];
$p_status=$_POST['p_status'];


$qry="UPDATE product SET p_type='$p_type', p_name='$p_name', p_price='$p_price', p_desc='$p_desc', p_spec='$p_spec', p_status='$p_status' ";

$qry.=" WHERE p_id='$p_id'";

if($dbo->qData($qry)){
    
    if(isset($_FILES['p_new'])){
        $maxSize=1000;
        $thumSize=200;
        
        $imgName=$p_id.'.jpg';
        $file=$_FILES['p_new']['tmp_name'];


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
    }
    echo 'update ok';
}else{
    echo 'update err';
}




?>