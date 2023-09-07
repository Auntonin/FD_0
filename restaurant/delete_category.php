<?php 
require_once("../Condb.php");

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
    <table class="table table-hover table-dark">
  <tr>
    <th>ประเภทอาหาร</th>
   
  </tr>
  <?php
  $sql="SELECT * FROM category ORDER BY cate_id";
  $result=$conn->query($sql);
  while ($rs=$result->fetch_array()){
    $cid = $rs['cate_id'];
    $cn = $rs['cate_name'];
  
  ?>

  <tr>
    <td><?php
    echo $cn;
    ?></td>
    <td></td>
    <td><?php
    echo"<a type=button class=btn btn-outline-primary href=edit_category.php?cate_id=$cid>EDIT</a>";
    ?></td>
    <td></td>
  </tr>
  <?php
  }
  ?>
  <td>
  <a type=button class=btn btn-outline-primary      href='add_category.php?cate_id=$cid'>add</a>
</td>
<td></td>
<td></td>
<td></td>
</table>


    </div>
</body>
</html>