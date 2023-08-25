<?php require_once("Condb.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Bootstrap/cdn.jsdelivr.net_npm_bootstrap@4.0.0_dist_css_bootstrap.min.css">
    
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


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- <script src="Bootstrap/cdn.jsdelivr.net_npm_bootstrap@4.0.0_dist_js_bootstrap.min.js"></script>
<script src="Bootstarp/cdn.jsdelivr.net_npm_popper.js@1.12.9_dist_umd_popper.min.js"></script>
<script src="Bootstrap/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script src="cdn.datatables.net_1.13.6_js_jquery.dataTables.min.js"></script> -->
</body>
</html>