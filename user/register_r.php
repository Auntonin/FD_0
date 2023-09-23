<?php
require_once("../Condb.php");
// checklogin();


if(isset($_POST['request'])){
    $crid=$_POST['cate_r'];
    if($crid!=""){
        $sql="UPDATE users SET restaurant=1,cr_id='".$crid."' WHERE user_id='".$_SESSION['uid']."'";
        if($result=$conn->query($sql)){
            alert("ขอเป็นร้านอาหารสำเร็จ");
            go("../index.php");
        }else{
            alert("ไม่สามารถขอเป็นร้านอาหารได้");
        }
  
    }else{
        alert("กรุณาเลือกประเภทร้านอาหาร");
    }
}else
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Bootstrap/dist/css/bootstrap.min.css">    
    <link href="../Bootstrap/dist/css/login_menu.css" rel="stylesheet"></head>
<body>
<body class="text-center">
    <form class="form-signin" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Please Category Restaurant</h1>
    <select class="custom-select mt-2" name="cate_r" >
        <option value="">เลือก</option>
        <?php $sql="SELECT * FROM cate_restaurant";
      $result=$conn->query($sql);
      while($rs=$result->fetch_array()){?>
        <option  value="<?=$rs['cr_id']?>"><?=$rs['cr_name']?></option>
        <?php }?>
      </select>
         <button class="btn btn-lg btn-primary btn-block mt-5" type="submit" name="request">Request</button>
      
    </form>
  

</body>
</html>