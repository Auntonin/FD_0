<?php
require_once("../Condb.php");
// checklogin();
if(isset($_POST['username'])){
    // echo $_POST['username'];
    $un = $_POST['username'];
    $sql = "SELECT * FROM users WHERE user_name='".$un."'";
    $result=$conn->query($sql);
    if($result->num_rows==0){
        $sql="UPDATE users SET user_name='".$un."' WHERE user_id='".$_SESSION['uid']."' ";
        if( $result=$conn->query($sql)){
            $_SESSION['un'] = $un;
            go("../index.php");
        }else{
            echo "ไม่สามารถ อัปเดทได้";
        }
    }else{
        echo "ไม่เจอ user";
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
    <link href="../login_menu.css" rel="stylesheet"></head>
<body>
<body class="text-center">
    <form class="form-signin" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Please Enter Usernaem</h1>
      <label for="inputEmail" class="sr-only ">User Name</label>
      <input type="text"  class="form-control mb-2" placeholder="UserName" required name="username" >
      <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">Submit</button>
      
    </form>
</body>
</html>