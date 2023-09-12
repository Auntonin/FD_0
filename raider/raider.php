<?php require_once("../Condb.php");
checkrd();
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
                ชื่อ
            </th>
            <th>
                ราคา
            </th>
            <th>
                รับออร์เดอร์
            </th>
        </tr>
        <?php 
        $sql="SELECT o.*,u.* FROM orders o INNER JOIN users u ON o.user_id=u.user_id WHERE o.o_status=1";
        $result=$conn->query($sql);
        while($rs=$result->fetch_array()){
            ?>
            <tr>
                <td>
                    <?= $rs['o_id']?>
                </td>
                <td>
                    <?= $rs['user_name']?>
                </td>
                <td>
                    <?= $rs['sumprice']?>
                </td>
                <td>
                <a class="btn btn-outline-primary" href="order.php?pid=<?= $rs['o_id']?>">submit</a>
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