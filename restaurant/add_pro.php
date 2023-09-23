<?php
require_once("../Condb.php");

if (isset($_POST['pro_name']) && $_POST['pro_name'] !== '') {
    $cid = $_POST['cate_id'];
    $pn = $_POST['pro_name'];
    $pp = $_POST['pro_price'];
    $pdc = $_POST['pro_dc'];

    $sql = "SELECT * FROM product WHERE pro_name='$pn'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        $targetDirectory = "../img/product/";
        $targetFile = $targetDirectory . basename($_FILES["pro_img"]["name"]);

        if (move_uploaded_file($_FILES["pro_img"]["tmp_name"], $targetFile)) {
            $filename = $_FILES["pro_img"]["name"];
        }

        $sql = "INSERT INTO product (cate_id, pro_name, pro_price, pro_discount, r_id,pro_image) VALUES ('$cid', '$pn', '$pp', '$pdc', '" . $_SESSION['uid'] . "','$filename')";

        if ($conn->query($sql)) {
            alert("เพิ่มสินค้าสำเร็จ");
            go("rest.php");
        } else {
            alert("เพิ่มสินค้าไม่สำเร็จ");
        }
    } else {
        alert("ชื่อสินค้านี้มีอยู่แล้ว");    }
} else {
    //ไม่มีชื่อสินค้าส่งมา
}
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
            <h1 class="h3 mb-3 font-weight-normal">เพิ่มรายการอาหาร</h1>
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
            <input type="text" placeholder="ชื่ออาหาร" required name="pro_name">
            <input type="number" placeholder="ราคาอาหาร" required name="pro_price">
            <input type="number" placeholder="ส่วนลด" required name="pro_dc" max="100" min="0">
            <input type="file" required name="pro_img">
            <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">เพิ่ม</button>
        </form>
    </div>
</body>

</html>
