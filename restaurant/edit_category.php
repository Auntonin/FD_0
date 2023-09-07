<?php 
require_once("../Condb.php");



if(isset($_POST['cname'])&&  $_POST['cname']!=''){
 $cn= $_POST['cname'];
 $cid=$_POST['cate_id'];
//  echo"$cid";
//  echo "$cn";
$sql= "SELECT  *  FROM category WHERE cate_name='".$cn."' ";
$result=$conn->query($sql);
if($result->num_rows==0){
$sql= ("UPDATE category SET  cate_name='".$cn."' WHERE cate_id='".$cid."' ");
$result=$conn->query($sql);
go ("delete_catagory.php");
}else{
    // go("add_category.php");
    echo("ADD file");

}

}else{
    // go("../index.php");
}

$cid=$_GET['cate_id'];
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Bootstrap/dist/css/bootstrap.min.css">  
</head>
<body>
    <div class="container">
<form class="form-signin" method="post">
      <h1 class="h3 mb-3 font-weight-normal">แก้ประเภทอาหาร </h1>
      <label for="inputEmail" class="sr-only "></label>
      <input type="text"  class="form-control mb-2" placeholder="ประเภทอาหาร "  name="cname" >
      <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">แก้ไข</button>
      <input type="hidden"   name="cate_id" value="<?=$cid ?>">
      
    </form>
    </div>
</body>
</html>