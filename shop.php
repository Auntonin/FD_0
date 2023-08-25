<?php require_once("Condb.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php require_once("menu.php"); ?>
    <div class="main">
        <table class="table table-striped">
            <tr>
                <th>รูปอาหาร</th>
                <th class="w-25">ชื่อสินค้า</th>
                <th>ร้านอาหาร</th>
                <th>ราคาสินค้า</th>
                <th>ดูสินค้า</th>
            </tr>
            <?php
            if (isset($_POST['keyword']) && $_POST['keyword'] !== "") {
                $keyword = $_POST['keyword'];
                $sql = "SELECT p.*, u.user_name
                        FROM product p INNER JOIN users u
                        ON p.r_id = u.user_id
                        WHERE pro_name LIKE '%$keyword%' OR user_name LIKE '%$keyword%'";
            } else {
                $sql = "SELECT p.*, u.user_name
                        FROM product p INNER JOIN users u
                        ON p.r_id = u.user_id";
            }
            $result = $conn->query($sql);
            while ($rs = $result->fetch_assoc()) {
                $cn = $rs['user_name'];
                $pid = $rs['pro_id'];
                ?>
                <tr>
                    <td>
                        <img src="img/product/<?= $rs['pro_image'] ?>" width="120" height="110" alt="<?= $rs['pro_name']; ?>">
                    </td>
                    <td>
                        <?= $rs['pro_name']; ?>
                    </td>
                    <td>
                        <?= $rs['user_name']; ?>
                    </td>
                    <td>
                        <?= number_format($rs['pro_price']); ?>
                    </td>
                    <td>
                        <a href="show_pro.php?pid=<?= $pid ?>" class='btn btn-outline-primary me-2'>View</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
