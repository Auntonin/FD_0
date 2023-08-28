<?php require_once("Condb.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Bootstrap/dist/css/bootstrap.min.css">    
</head>
<body>
    <?php require_once("menu.php");
    if(isset($_GET['pid'])){
        $pid=$_GET['pid'];
        // echo $pid;
        $sql = "SELECT p.*,c.cate_name
              FROM product p INNER JOIN category c
              ON p.cate_id = c.cate_id
              WHERE pro_id='".$pid."'";
        // $sql = "SELECT * FROM product WHERE pro_id='".$pid."'";
        $result=$conn->query($sql);
        $rs=$result->fetch_array();
        $p_id=$rs['pro_id'];
        $pn=$rs['pro_name'];
        $pp=$rs['pro_price'];
        $pc=$rs['cate_name'];
        $pi=$rs['pro_image'];
    }else{
        go("shop.php");
        // echo $_GET['pid'];
    }
    ?>
    <div class="container">
        <div class="main m-6 row ">
            <div class="col-8"><img src="img/product/<?=$pi ?>" alt="Italian Trulli" class="mt-5" style="width:400px;height:400px;">
      </div>
      <div class="col-4"> <h1 class="mt-3"><?=$pn?></h1><br>
        <h2 class="mt-3">ราคา :<?=$pp?></h2>
        <h2 >ประเภท :<?=$pc?></h2></div>
        </div>
    </div>

    <script src="Bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>