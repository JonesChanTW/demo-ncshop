<?php

//include_once('comm/func.php');

class pageNav extends dbo{
    
    private $pageNum;
    private $totalPages;
    
    function __destruct(){
        $this->dbo->close();
        //echo 'pageNav : Close DB';
    }
    
    function qPageData($sql, $pageRecMax){
        isset($_GET['pageNum'])?$pageNum=$_GET['pageNum']:$pageNum=0;
        $this->pageNum=$pageNum;
        $startRec=$pageRecMax*$pageNum;
        $totalRec=$this->dbo->query($sql)->num_rows;
        $this->totalPages=ceil($totalRec/$pageRecMax);
        $sql.=' LIMIT '.$startRec.', '.$pageRecMax;
        $res=$this->dbo->query($sql);
        return $res;
    }
    
    function setRecNav($navStyle=null){
        is_null($navStyle)?$navStyle='both':'';
        $pageNum=$this->pageNum;
        $totalPages=$this->totalPages;
        
        $curURL=$_SERVER['PHP_SELF'];


        echo '<div class=recPageNav><p>';
        if($navStyle=='btn' || $navStyle=='both'){
            if($pageNum>=1){
                echo '<a href="'.$curURL.'?pageNum='.($pageNum-1).'">上一頁</a>';    
            }else{
                echo '<a class="notWork" href="javascript:;">上一頁</a>';    
            }

        }

        if($navStyle=='pull' || $navStyle=='both'){
            echo '<select id="goPage" onchange=location.href=this.value>';
            for($i=0;$i<$totalPages;$i++){
                if($i==$pageNum){
                    $sel=' selected';
                }else{
                    $sel='';
                }
                echo '<option'.$sel.' value="'.$curURL.'?pageNum='.($i).'">第'.($i+1).'頁</option>';
            }
            echo '</select>';
        }

        if($navStyle=='btn' || $navStyle=='both'){
            if($pageNum<$totalPages-1){
                echo '<a href="'.$curURL.'?pageNum='.($pageNum+1).'">下一頁</a>';    
            }else{
                echo '<a class="notWork" href="javascript:;">下一頁</a>';    
            }
        }
        echo '<p></div>';
    }
    
}

?>