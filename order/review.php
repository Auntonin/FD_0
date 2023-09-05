<?php
require_once("../Condb.php");
// checklogin();


if(isset($_POST['username'])){
    $un = $_POST['username'];
    $ps = $_POST['password'];
    $ad = $_POST['address'];
    $sql = "SELECT * FROM users WHERE user_name='".$un."' ";
    $result=$conn->query($sql);
    if($result->num_rows==0){
    $sql = "INSERT INTO users(user_name,user_password,user_ad) VALUES ('$un','$ps','$ad')";
        if($result=$conn->query($sql)){
            go("login.php");
        }else{
            alert("ไม่สามารถสมัครได้") ;
        }
      
    }else{
        alert("ชื่อถูกใช่งานแล้ว") ;
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
      <h1 class="h3 mb-3 font-weight-normal">Please Review</h1>
      <input type="text"  class="form-control mb-2" placeholder="review" required name="review" >   
      <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">Submit</button>
      
    </form>
  

</body>
</html>