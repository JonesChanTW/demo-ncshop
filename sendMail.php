<?php


$to="joneschean@gmail.com";
$subject="信件測試";
$content="單純的測試PHP送信而已";
$header='Content-type:text/html; charset=utf-8;'."\r\n".
    'From:joneschean@gmail.com';

mail($to, $subject, $content, $header);
//mail()

?>