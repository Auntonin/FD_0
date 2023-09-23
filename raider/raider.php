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
    <?php require_once("menu.php") ?>
    <div class="container ">
        <h3>เลือกร้าน</h3>
        <form>
    <select name="rid" class="custom-select" require>
                <option value="">เลือก</option>
                <?php
                $result = $conn->query("SELECT * FROM users WHERE restaurant=2 ");
                while ($rs = $result->fetch_array()) {
                ?>
                    <option value="<?= $rs['user_id'] ?>"><?= $rs['user_name'] ?></option>
                <?php
                }
                ?>
            </select>
            <button type="submit" class="btn btn-outline-primary m-2">submit</button>
            </form>
        <table class="table">
            <tr>
                <th>รหัส</th>
                <th>ชื่อ</th>
                <th>ราคา</th>
                <th>สถาณะ</th>
                <th>ที่อยู่ผู้รับ</th>
                <th>รับออร์เดอร์</th>
            </tr>
            <?php 
            if(isset($_GET['rid'])&&($_GET['rid']!="")){
                $rid=$_GET['rid'];
                $sql = "SELECT o.*,u.* FROM orders o INNER JOIN users u ON o.user_id=u.user_id WHERE o.o_status=1 AND o.r_id='$rid'";
            }else{
                $sql = "SELECT o.*,u.* FROM orders o INNER JOIN users u ON o.user_id=u.user_id WHERE o.o_status=1 OR o.rd_id='" . $_SESSION['uid'] . "'";
            }
            $result = $conn->query($sql);
            while ($rs = $result->fetch_array()) {
                $os = $rs['o_status'];
                if ($os == 0) {
                    $osshow = "ร้านค้ายังไม่ได้รับออร์เดอร์";
                } elseif ($os == 1) {
                    $osshow = "ร้านค้ารับออร์เดอร์แล้ว";
                } elseif ($os == 2) {
                    $osshow = "ไรเดอร์รับออร์เดอร์แล้ว";
                } elseif ($os == 3) {
                    $osshow = "ร้านค้าส่งอาหารให้ไรเดอร์แล้ว";
                } elseif ($os == 4) {
                    $osshow = "ออร์เดอร์ถูกส่งแล้ว";
                }
            ?>
                <td><?= $rs['o_id'] ?></td>
                <td><?= $rs['user_name'] ?></td>
                <td><?= $rs['sumprice'] ?></td>
                <td><?= $osshow ?></td>
                <td><?= $rs['user_ad'] ?></td>
                <td><?php if ($os == 1) { ?>
                    <a class="btn btn-outline-primary" href="order.php?oid1=<?= $rs['o_id'] ?>">submit</a>
                <?php } elseif ($os == 3) { ?>
                    <a class="btn btn-primary" href="order.php?oid2=<?= $rs['o_id'] ?>">submit</a>
                <?php } ?>
                </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <script src="../Bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>