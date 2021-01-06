<?php
    include_once("comm/dbc.php");
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
<!--   ---------------   -->
    <?php include_once('comm/pageHead.php'); ?>
<!--   ---------------   -->
    <link rel="stylesheet" href="css/index.css">
    <style>
        #newsList{
            color: white;
        }
    </style>
    <script>
        $(function() {

        })
    </script>
</head>

<body>
<?php include_once('comm/pageHeader.php'); ?>
<main>
    <div id="banner">
        <img src="images/banner.jpg">
    </div>
    <dl id="news">
       <?php
        $query="SELECT * FROM news ORDER BY n_date DESC LIMIT 0, 3";
        $result=mysqli_query($dbc, $query);
        
        while($row=mysqli_fetch_array($result)){
        echo '<dt>'.$row['n_date'].'</dt>';
        echo '<dd>'.$row['n_title'].'</dd>';
        }
        
        
        ?>

    </dl>
    <ul id="category">
        <?php
            $query="SELECT * FROM category";
            $result=mysqli_query($dbc, $query);
            
            while($row=mysqli_fetch_array($result)){
                echo '<li>';
                echo '<h3>'.$row['Title']."</h3>";
                echo '<img src="'.$row['imgPath'].'" width="'.$row['imgWidth'].'" height="'.$row['imgHeight'].'" alt=""/>';
                echo '<p>'.$row['Descript'].'</p>';
                echo '</li>';
            }
        ?>
    </ul>
    <?php
    mysqli_close($dbc);
    ?>
</main>
<?php include_once('comm/pageFooter.php'); ?>
</body>
</html>
