<?php
/*
class 名稱{
    類型 屬性=值
    類型 function 方法名稱(){
        ....
    }
}

類型:             外部存取    衍生類別存取  自己存取
public      公開      O               O       O
private     私有      X               X       O
protected   保護      X               O       O
*/

class say{
    public $str="Good";
    function sayHI(){
        $str="hello";
        
        
        echo 'hi';
        echo $str;
        echo $this->str();
    }
    function saySomething(){
        echo '<br>----------</br>';
        echo $this->str;
    }
}

class talk extends say{
    function talkMore(){
        echo '<br>++++++++++++++++++++</br>';
        $str='more....';
        echo $str;
    }
}

$say=new say();

$say->sayHI();
?>