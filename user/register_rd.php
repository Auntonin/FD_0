<?php
require_once("../Condb.php");
// checklogin();


if(isset($_POST['request'])){
    $sql="UPDATE users SET raider_status=1 WHERE user_id='".$_SESSION['uid']."'";
    if($result=$conn->query($sql)){
        alert("ขอเป็นผู้ส่งอาหารสำเร็จ");
        go("../index.php");
    }else{
        alert("ไม่สามารถขอเป็นผู้ส่งอาหารได้");
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
  <button class="btn btn-lg btn-primary btn-block mt-5" type="submit" name="request">Request</button>
    </form>
  

</body>
</html>