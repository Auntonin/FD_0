<?php
require_once("../Condb.php");
// checklogin();
if(isset($_POST['userpass1'])){
       
    $uop=$_POST['opass'];
    $up1=$_POST['userpass1'];
    $up2=$_POST['userpass2'];
    $sql = "SELECT * FROM users WHERE user_id='".$_SESSION['uid']."'";
    $result=$conn->query($sql);
    $rs=$result->fetch_array();
    if($rs['user_password']==$uop){
        if($up1==$up2){
            $sql="UPDATE users SET user_password='".$up1."' WHERE user_id='".$_SESSION['uid']."' ";
            if( $result=$conn->query($sql)){
                go("../index.php");
            }else{
                echo "ไม่สามารถอัปเดทได้";
            }
        }else{
            echo "กรุณาใส่รหัสผ่านให้เหมือนกัน";
        }
    }else{
        echo "รหัสผ่านเก่าไม่ถูกต้อง";
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
      <h1 class="h3 mb-3 font-weight-normal">Please Enter Password</h1>
      <input type="password"  class="form-control m-2" placeholder="Old password" required name="opass" >
      <input type="password"  class="form-control m-2" placeholder="New password" required name="userpass1" >
      <input type="password"  class="form-control m-2" placeholder="Confirm password" required name="userpass2" >
      <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">Submit</button>
      
    </form>
</body>
</html>