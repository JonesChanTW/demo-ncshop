<?php
include_once('adminLoginChk.php');
include_once('class/mydb.class.php');

$dbo=new dboQ();

$p_id=$_GET['p_id'];

$qry="SELECT * FROM product WHERE p_id=$p_id";

//$res=$dbo->qData($qry);
//$row=$res->fetch_array();


$row=$dbo->qData($qry)->fetch_array();





?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
   
    <?php require_once('comm/adminHead.php'); ?>
    <style>
        #pvImg{
            width:200px;
        }
    </style>
    <script>
        $(function() {
            $('#p_new').change(function(){
                var src=URL.createObjectURL($(this).prop('files')[0]);
                $('#pvImg').attr('src',src)
                
            })
            
            $('#pEditForm').submit(function(){
                var pd=new FormData();
                
                pd.append('p_id', $('#p_id').val());
                pd.append('p_type', $('#p_type').val());
                pd.append('p_name', $('#p_name').val());
                pd.append('p_price', $('#p_price').val());
                pd.append('p_desc', $('#p_desc').val());
                pd.append('p_spec', $('#p_spec').val());
                pd.append('p_status', $('#p_status').val());
                pd.append('p_new', $('#p_new').prop('files')[0]);
                
                $.ajax({
                    url:'productEditQ.php',
                    type:'post',
                    data:pd,
                    processData:false,
                    contentType:false,
                    error:function(){
                        alert('err');
                    },
                    success(info){
                        alert(info);
                    }
                })
                
                return false;
            })
            
            
        })
    </script>
</head>

<body>
<?php require_once('comm/adminHeader.php'); ?>
<main>
<h1>商品編輯頁面</h1>
<form name="pEditForm" id="pEditForm" class="dataForm">
        <p>
        <label for="p_type">商品類別：</label>
        <select name="p_type" id="p_type">
        <?php
            $type=['手工皂','草本精油'];
            for($i=0;$i<count($type);$i++){
                /*
                if($row['p_type']==($i+1)){
                    echo '<option value="'.($i+1).'" selected>'.$type[$i].'</option>';
                }else{
                    echo '<option value="'.($i+1).'">'.$type[$i].'</option>';
                }
                */
                $sel=$row['p_type']==($i+1)?' selected':'';
                echo '<option value="'.($i+1).'" '.$sel.'>'.$type[$i].'</option>';
            }
        ?>
        </select>    
        </p>
        <p>
          <label for="p_name">商品名稱：</label>
          <input type="text" id="p_name" name="p_name" value="<?php echo $row['p_name'] ?>">
        </p>
        <p>
          <label for="p_price">單價：</label>
          <input type="number" id="p_price" name="p_price" value="<?php echo $row['p_price'] ?>">
        </p>
        <p>
          <label for="">商品圖片：</label>
          <img id="pvImg" src="productImg/thum/<?php echo $row['p_photo'] ?>">
          <input type="file" name="p_new" id="p_new" accept="image/jpeg">
        </p>
        <p>
          <label for="p_desc">商品介紹：</label>
          <textarea name="p_desc" id="p_desc"><?php echo $row['p_desc'] ?></textarea>
        </p>
        <p>
          <label for="p_spec">商品規格：</label>
          <textarea name="p_spec" id="p_spec"><?php echo $row['p_spec'] ?></textarea>
        </p>
        <p>
          <label for="">商品狀態：</label>
          <select name="p_status" id="p_status">
            <?php
                $status=['缺貨中','供貨中'];
                for($i=0;$i<count($status);$i++){
                    $sel=$row['p_status']==($i)?' selected':'';
                    echo '<option value="'.($i).'" '.$sel.'>'.$status[$i].'</option>';
                }
            ?>
          </select>
          
        </p>
        <p class="formBtn">
          <input type="submit" id="submit" value="更新">
          <input type="reset" id="reset">
        </p>
        <p><input type="hidden" name="p_id" id="p_id" value="<?php echo $row['p_id']; ?>"></p>
</form>
</main>
</body>
</html>
