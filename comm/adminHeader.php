<header>
    <div id="headerContent">
        <h1>Nature Care</h1>
        <h3>後台管理</h3>
        <nav id="memNav">
            <ul>
               <?php
                echo 'hi!'.$_SESSION['nc_admin'];
                ?>
                <li><a href="adminLogout.php">登出</a></li>
                <li><a href="#">個人資料</a></li>
            </ul>
        </nav>
        <nav id="mainNav">
            <ul>
                <li><a href="newsAdmin.php">最新消息管理</a></li>
                <li><a href="productAdmin.php">商品管理</a></li>
                <li><a href="orderAdmin.php">訂單管理</a></li>
                <!--<li><a href="memberAdmin.html">會員管理</a></li>
                <li><a href="userAdmin.html">使用者管理</a></li>-->
                <li><a href="#">會員管理</a></li>
                <li><a href="#">使用者管理</a></li>
            </ul>
        </nav>
    </div>
</header>