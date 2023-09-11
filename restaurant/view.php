<?php require_once("../Condb.php");
if(isset($_POST['submit'])){
    $oid =$_POST['oid'];
    $result=$conn->query("UPDATE orders SET o_status=1 WHERE o_id='$oid'");
    if($result==TRUE){
        alert("รับรายการสำเร็จ");
        go("order.php");
    }else{
        alert("รับรายการไม่สำเร็จ");
    }
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <?php require_once("menu.php");
    $oid=$_GET['oid'];
    $sql = "SELECT od.*,p.* FROM order_details od INNER JOIN product p  ON od.pro_id = p.pro_id WHERE od.o_id='$oid'";
    $result = $conn->query($sql);
    ?>
    <div class="container">
        <table class="table">
            <tr>
                <th>รหัสคำสั่ง</th>
                <th>รหัสสินค้า</th>
                <th>จำนวน</th>
                <th>ราคา</th>
            </tr>
            <?php
            if(isset($result)) {
                while($rs = $result->fetch_array()) {
            ?>
                <tr>
                    <td><?= $rs['o_id'] ?></td>
                    <td><?= $rs['pro_id'] ?></td>
                    <td><?= $rs['pro_qty'] ?></td>
                    <td><?= $rs['pro_sumprice'] ?></td>
                </tr>
            <?php
                }
            }
            ?>
        </table>
        <form method="POST">
            <input type="hidden" name="oid" value="<?=$oid?>">
        <button name="submit" class="btn btn-outline-primary" >submit order</button>
        </form>
    </div>
    <script src="../Bootstrap/dist/js/jquery-3.7.1.min.js"></script>
    <script src="../Bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
