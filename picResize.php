<?php

$pic='productImg/soap10.jpg';

echo '<img src="'.$pic.'">';


$src=imagecreatefromjpeg($pic);

$size=GetimageSize($pic);

list($imgW, $imgH)=$size;

echo '<br>';
echo $imgW.'X'.$imgH;

$dst=imagecreatetruecolor(120,80);

imagecopyresampled($dst,$src,0,0,0,0,120,80,$imgW,$imgH);

imageJPEG($dst,'images/'.'001.jpg');

echo '<br><img src="images/001.jpg">';
?>