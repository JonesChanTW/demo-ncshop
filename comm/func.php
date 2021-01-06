<?php
function setRecNav($pageNum, $totalPages){
    $curURL=$_SERVER['PHP_SELF'];
    
    
    echo '<div class=recPageNav><p>';
    if($pageNum>=1){
        echo '<a href="'.$curURL.'?pageNum='.($pageNum-1).'">上一頁</a>';    
    }else{
        echo '<a class="notWork" href="javascript:;">上一頁</a>';    
    }
    
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
    
    if($pageNum<$totalPages-1){
        echo '<a href="'.$curURL.'?pageNum='.($pageNum+1).'">下一頁</a>';    
    }else{
        echo '<a class="notWork" href="javascript:;">下一頁</a>';    
    }
    
    echo '<p></div>';
}

function getRemoteData($url, $method, $requestData, &$errno = null, &$errStr = null){
    
    preg_match('/^(.+:\/\/)([^:\/]+):?(\d*)(\/.+)/', $url, $matches);
    $protocol = $matches[1];
    $host = $matches[2];
    $port = $matches[3];
    $uri = $matches[4];
    $data= $requestData;
    
    $responseData='';
    
    //$textData=json_encode($data);
    $textData=http_build_query($data);
    
    if($port==''){
        if(stristr($protocol, "https")){
            $port=443;
        }else if(stristr($protocol, "http")){
            $port=80;
        }else{
            return;
        }
    }

    $fp=pfsockopen($host, $port, $errno, $errStr);
    if($fp){
        
        /*關於 HTTP/1.0 這部分 本來是可以寫 HTTP/1.1 
        但是如果資料量過大(應該是4096 BYTE為界線)會變成回傳的標頭中沒有Content-Length,
        而是改用 "Transfer-Encoding: chunked" 回應,
        當收到這種回應的時候本文格式應該是變成 長度 本文 0 由於不確定這部分的格式,因此暫時限定用1.0,
        讓處理請求的遠端伺服器不使用 Transfer-Encoding: chunked 的格式回應
        */
        fwrite($fp, $method." ".$uri." HTTP/1.0\r\n");          
        fwrite($fp, "Host: $host\r\n");
        fwrite($fp, "Content-Type: application/x-www-form-urlencoded\r\n");
        //fwrite($fp, "Content-Type: application/json; charset=utf-8\r\n");
        //fwrite($fp, "Content-Type: application/octet-stream;\r\n");
        fwrite($fp, "Content-Length: ".strlen($textData)."\r\n");
        fwrite($fp, "Connection: close\r\n");
        fwrite($fp, "\r\n");
        fwrite($fp, $textData);
        

        //header('Content-type: application/json');
        header('text/html; charset=UTF-8');
        //header('Content-type: text/plain');
        //header('Content-type: application/octet-stream');

        $tmpData='';
        $isContent = false;
        $allData = '';
        $bufferSize=1024;
        while( !feof($fp) ){
            $tmp = '';
            $tmp = fgets($fp, $bufferSize);
            $allData .= $tmp;
            if(!$isContent){
                while(trim($tmp)!=""){
                    $tmp = fgets($fp, $bufferSize);
                    $allData .= $tmp;
                }
                $isContent = true;
                continue;
            }
            $tmpData .= $tmp;
        }
        fclose($fp);
        
        $responseData = $tmpData;
        /*
        echo "func Dump \r\n";
        echo "allData = \r\n".$allData."\r\n=============== All Data Finish==============\r\n";
        echo $responseData."\r\n";
        echo "============= Dump Finish ==============\r\n";
        */
        return json_decode($responseData, true);
    }
}

?>