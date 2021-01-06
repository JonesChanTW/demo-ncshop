<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>Nature care</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/operation.css">
    <style>
        #loginForm {
            width: 300px;
            padding: 20px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        #loginForm h3 {
            text-align: center;
        }
        #loginForm label {
            font-size: 0.9em;
        }
        #loginForm p {
            line-height: 1.8em;
        }
        #username,#pw,#submit {
            width: 95%;
        }
        #submit {
            margin-top: 20px;
        }
    </style>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        $(function() {

        })
    </script>
</head>

<body>
<header>
    <div id="headerContent">
        <h1>Nature Care</h1>
        <h3>後台管理</h3>
    </div>
</header>

<main>
    <form id="loginForm" name="loginForm" action="adminLoginQ.php" method="POST">
        <h3>系統登入</h3>
        <p>
            <label for="username">名稱</label><br>
            <input type="text" name="username" id="username">
        </p>
        <p>
            <label for="pw">密碼</label><br>
            <input type="password" name="pw" id="pw">
        </p>
        <p>
            <input type="submit" name="submit" id="submit" value="登入">
        </p>
        <?php
            if(isset($_GET['loginErr'])){
                echo '<p class="msg err">帳密錯誤</p>';
            }
        ?>
    </form>
</main>
</body>
</html>

