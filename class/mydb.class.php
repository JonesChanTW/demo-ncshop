<?php


class dbo{
    //private $dbHost='192.168.100.12';
    private $dbHost='localhost';
    private $dbUser='225129';
    private $dbPwd='a1254782';
    private $db='225129';
    
    protected $dbo;
    
    function __construct(){ //建構子
        $this->sql_connect();
        $this->setTimeZone();
        
        if(!isset($_SESSION)){
            session_start();
        }
        //echo '__constructor()';
    }
    
    function sql_connect(){
        $this->dbo = new mysqli($this->dbHost, $this->dbUser, $this->dbPwd, $this->db);
    }
    
    function setTimeZone(){
        ini_set('date.timezone','asia/taipei');
    }
    
    
}


class dboQ extends dbo{
    
    function __destruct(){
        $this->dbo->close();
//        echo 'Close DB';
    }
    
    function qData($sql){
        $result=$this->dbo->query($sql);
        return $result;
    }
    
    function qID(){
        return $this->dbo->insert_id;
    }
}








?>