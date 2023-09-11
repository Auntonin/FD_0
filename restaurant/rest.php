<?php require_once("../Condb.php");
checkr();
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
    <?php require_once("menu.php")?>
    <div class="container text-center">
    <table class="table">
        <tr>
            <th>
                รหัส
            </th>
            <th>
                รูป
            </th>
            <th>
                ชื่อ
            </th>
            <th>
                ประเภท
            </th>
            <th>
                ราคา
            </th>
            <th>
                ส่วนลด
            </th>
            <th>
                แก้ไข/ลบ
            </th>
        </tr>
        <?php 
        $sql="SELECT p.*,c.cate_name FROM product p INNER JOIN category c ON p.cate_id=c.cate_id WHERE p.r_id='".$_SESSION['uid']."'";
        $result=$conn->query($sql);
        while($rs=$result->fetch_array()){
            ?>
            <tr>
                <td>
                    <?= $rs['pro_id']?>
                </td>
                <td>
                    <img src="../img/product/<?= $rs['pro_image']?>" alt="img" width="100" height="100">
                </td>
                <td>
                    <?= $rs['pro_name']?>
                </td>
                <td>
                    <?= $rs['cate_name']?>
                </td>
                <td>
                    <?= $rs['pro_price']?>
                </td>
                <td>
                    <?= $rs['pro_discount']?>%
                </td>
                <td>
                <a class="btn btn-outline-primary" href="edit_pro.php?pid=<?= $rs['pro_id']?>">EDIT</a>
                <a class="btn btn-outline-danger" href="delete_pro.php?pid=<?= $rs['pro_id']?>">DELETE</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    </div>
    <script src="Bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>