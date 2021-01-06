<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<header>
    <div id="headerContent">
        <h1><a href="index.php">Nature Care</a></h1>
        <nav id="memNav">
            <ul>
                <?php
                    if(isset($_SESSION['nc_name'])){
                        echo '<li>'.$_SESSION['nc_name'].'</li>';
                        echo '<li><a href="cart.php">購物車</a></li>';
                        echo '<li><a href="orderHistory.php">購物紀錄</a></li>';
                        echo '<li><a href="memberEdit.php">個人資料</a></li>';
                        echo '<li><a href="memberLogout.php">登出</a></li>';
                    }else{
                        echo '<li><a href="memberLogin.php">登入</a></li>';
                        echo '<li><a href="memberAdd.php">加入會員</a></li>';
                    }
                ?>
                
                
            </ul>
        </nav>
        <nav id="mainNav">
            <ul>
                <li><a href="news.php">最新消息</a></li>
                <li><a href="productlist.php?pd_type=1">手工皂</a></li>
                <li><a href="productlist.php?pd_type=2">草本精油</a></li>
                <?php
                    if(isset($_SESSION['nc_name'])){
                        echo '<li><a href="#">教學分享</a></li>';
                    }
                ?>
                <li><a href="#">服務項目</a></li>
                <li><a href="#">常見問題</a></li>
            </ul>
        </nav>
    </div>
</header>