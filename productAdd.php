<?php
include_once('adminLoginChk.php');
?>


<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <?php require_once('comm/adminHead.php'); ?>
    <style>
        .pvImg{
            width:200px;
        }
    </style>
    <script>
        $(function() {
            $('#pAddForm').submit(function(){
                var pd=new FormData();
                pd.append('p_type', $('#p_type').val());
                pd.append('p_name', $('#p_name').val());
                pd.append('p_price', $('#p_price').val());
                pd.append('p_desc', $('#p_desc').val());
                pd.append('p_spec', $('#p_spec').val());
                pd.append('p_status', $('#p_status').val());
                
                pd.append('p_photo', $('#p_photo').prop('files')[0]);
                
                $.ajax({
                    url:'productAddQ.php',
                    type:'post',
                    data:pd,
                    contentType:false,
                    processData:false,
                    error:function(){
                        alert('err');
                    },
                    success:function(info){
                        if(info=='added'){
                            $('#msg').html('商品已新增');
                            $('[type="text"],[type="number"],textarea').val('');
                            $('.pvImg').attr('src', '');
                        }
                    }
                })
                
                
                
                
                return false;
            })
            
            $('#p_photo').change(function(){
                var src=URL.createObjectURL($(this).prop('files')[0]);
                $('.pvImg').attr('src', src);
            })
            
        })  //$(function() {}
    </script>
</head>

<body>
<?php require_once('comm/adminHeader.php'); ?>
<main>
<h1>商品新增頁面</h1>
<form id="pAddForm" class="dataForm">
        <p>
          <label for="p_type">商品類別：</label>
          <select name="p_type" id="p_type">
              <option value="1">手工皂</option>
              <option value="2">草本精油</option>
          </select>
        </p>
        <p>
          <label for="p_name">商品名稱：</label>
          <input type="text" id="p_name" name="p_name">
        </p>
        <p>
          <label for="p_price">單價：</label>
          <input type="number" id="p_price" name="p_price">
        </p>
        <p>
          <label for="p_photo">商品圖片：</label>
          <img class="pvImg">
          <input type="file" name="p_photo" id="p_photo" accept="image/jpeg">
        </p>
        <p>
          <label for="p_desc">商品介紹：</label>
          <textarea name="p_desc" id="p_desc"></textarea>
        </p>
        <p>
          <label for="p_spec">商品規格：</label>
          <textarea name="p_spec" id="p_spec"></textarea>
        </p>
        <p>
          <label for="p_status">商品狀態：</label>
          <select name="p_status" id="p_status">
              <option value="1">供貨中</option>
              <option value="0">缺貨中</option>
          </select>
        </p>
        <p class="formBtn">
          <input type="submit" id="submit" value="新增">
          <input type="reset" id="reset">
        </p>
</form>

</main>


</body>
</html>
