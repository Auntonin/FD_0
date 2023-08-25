<?php
require_once("../Condb.php");
// checklogin();
if(isset($_POST['ud'])){
    echo $_POST['ud'];
    $uad = $_POST['ud'];
        $sql="UPDATE users SET user_ad='".$uad."' WHERE user_id='".$_SESSION['uid']."' ";
        if( $result=$conn->query($sql)){
            go("../index.php");
        }else{
            echo "ไม่สามารถอัปเดทได้";
        }

}else
// echo $_POST['useraddress'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Bootstrap/cdn.jsdelivr.net_npm_bootstrap@4.0.0_dist_css_bootstrap.min.css">
    <link href="../login_menu.css" rel="stylesheet"></head>
<body>
<body class="text-center">
    <form class="form-signin" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Please Enter Address</h1>
      <label for="inputEmail" class="sr-only ">User Address</label>
      <input type="text"  class="form-control mb-2" placeholder="address" required name="ud" >
      <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">Submit</button>
      
    </form>
</body>
</html>