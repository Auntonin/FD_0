<?php 
require_once("../Condb.php");


if($_SESSION['ulevel']==2){

if(isset($_POST['cname'])&&  $_POST['cname']!=''){
 $cn= $_POST['cname'];
$sql= "SELECT *  FROM category WHERE cate_name='$cn' ";
$result=$conn->query($sql);
if($result->num_rows==0){
$sql= ("INSERT INTO category VALUE (0,'$cn') ");
$result=$conn->query($sql);
go ("../restaurant/index.php");
}else{
    go("add_category.php");
    echo("ADD FILE");
}
}else{
    // go("../index.php");
}
}else{
    go("../index.php");
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Bootstrap/cdn.jsdelivr.net_npm_bootstrap@4.0.0_dist_css_bootstrap.min.css">
</head>
<body>
    <div class="container">
<form class="form-signin" method="post">
      <h1 class="h3 mb-3 font-weight-normal">ประเภทอาหาร </h1>
      <label for="inputEmail" class="sr-only "></label>
      <input type="text"  class="form-control mb-2" placeholder="ประเภทอาหาร " required name="cname" >
      <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">เพิ่ม</button>
      
    </form>
    </div>
</body>
</html>