<?php
require_once("../Condb.php");

if (isset($_POST['pro_name']) && $_POST['pro_name'] != '') {
    $pid = $_POST['pid'];
    $cid = $_POST['cate_id'];
    $pn = $_POST['pro_name'];
    $pp = $_POST['pro_price'];
    $pdc = $_POST['pro_dc'];

    $sql = "SELECT * FROM products WHERE pro_name='$pn'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        $targetDirectory = "../img/product/";
        $targetFile = $targetDirectory . basename($_FILES["pro_img"]["name"]);

        if (move_uploaded_file($_FILES["pro_img"]["tmp_name"], $targetFile)) {
            $filename = $_FILES["pro_img"]["name"];
        }

        $sql = "UPDATE products SET cate_id='$cid', pro_name='$pn', pro_price='$pp', pro_discount='$pdc', pro_image='$filename'  WHERE pro_id='$pid'";
        if ($conn->query($sql)) {
            alert("แก้ไขสินค้าสำเร็จ");
            go("rest.php");
        } else {
            alert("แก้ไขสินค้าไม่สำเร็จ");
        }
    } else {
        alert("ชื่อสินค้านี้มีอยู่แล้ว");
    }
}
    $pid = $_GET['pid'];
    $sql="SELECT * FROM product WHERE pro_id='$pid'";
    $resultp=$conn->query($sql);
    $rsp=$resultp->fetch_assoc();

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
    <?php require_once("menu.php") ?>
    <div class="container">
        <form class="form" method="post" enctype="multipart/form-data">
            <h1 class="h3 mb-3 font-weight-normal">แก้ไขรายการอาหาร</h1>
            <p>เลือกประเภทอาหาร</p>
            <select name="cate_id" require>
                <option value="">เลือก</option>
                <?php
                $result = $conn->query("SELECT * FROM category");
                while ($rs = $result->fetch_array()) {
                ?>
                    <option value="<?= $rs['cate_id'] ?>"><?= $rs['cate_name'] ?></option>
                <?php
                }
                ?>
            </select>
            <input type="hidden" name="pid" value="<?=$pid?>">
            <input type="text" placeholder="ชื่ออาหาร" required name="pro_name" value="<?= $rsp['pro_name']?>">
            <input type="number" placeholder="ราคาอาหาร" required name="pro_price" value="<?= $rsp['pro_price']?>">
            <input type="number" placeholder="ส่วนลด" required name="pro_dc" max="100" min="0" value="<?= $rsp['pro_discount']?>">
            <input type="file" required name="pro_img">
            <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">แก้ไข</button>
        </form>
    </div>
</body>

</html>
