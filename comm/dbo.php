<?php
    $dbHost='192.168.100.12';
    $dbUser='admin';
    $dbPwd='1111';
    $db='ncdb';
    //$dbHost='localhost';
    //$dbUser='225129';
    //$dbPwd='a1254782';
    //$db='225129';
    $dbo=new mysqli($dbHost, $dbUser, $dbPwd, $db);
    
    ini_set('date.timezone','asia/taipei');

    if(!isset($_SESSION)){
        session_start();
    }
?>