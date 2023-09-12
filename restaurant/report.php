<?php
require_once("../Condb.php");
$dnow = date('d');
$ynow = date('Y');
$mnow = date('m');

$s = 0;
if (isset($_GET['re'])&&$_GET['re']=="d") {
    $format = "'$ynow-$mnow-$dnow'"; //d
    $s = 1;//ไม่ใช้ BETWEEN 
} elseif (isset($_GET['re'])&&$_GET['re']=="m") {
    $format = "'$ynow-$mnow-01' AND '$ynow-$mnow-31'";//m
    $s = 2;//ใช้ BETWEEN 
} elseif (isset($_GET['re'])&&$_GET['re']=="y") {
    $format = "'$ynow-01-01' AND '$ynow-12-31'";//y
    $s = 2;
} else {
    $format = "'$ynow-$mnow-$dnow'";//d
    $s = 1; //กรณีไม่ได้เลือก
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
    <?php require_once("menu.php");
    if($s==1){
        $sql = "SELECT * FROM orders WHERE  DATE(date_time) = $format AND o_status=4 AND r_id='".$_SESSION['uid'] ."' ";
    }elseif($s==2){
        $sql = "SELECT * FROM orders WHERE  DATE(date_time) BETWEEN $format AND o_status=4 AND r_id='".$_SESSION['uid'] ."' ";
    }
    

    ?>
    <div class="container">
        <h3>รายงานสรุปการขาย</h3>
        <form method="get">
    <select name="re" class="custom-select coll-2 mb-2" require>
        <option value="d">วัน</option>
        <option value="m">เดือน</option>
        <option value="y">ปี</option>
    </select>
    <button type="submit" class="btn btn-outline-primary m-2">submit</button>
    </form>
        <table class="table">
            <tr>
                <th>รหัสคำสั่ง</th>
                <th>สถาณะ</th>
                <th>ราคารวม</th>
                <th>สั่งเมื่อ</th>
            </tr>
            <?php
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
                <tr>
                    <th>
                        <?= $rs['o_id'] ?>
                    </th>
                    <th>
                        <?= $osshow ?>
                    </th>
                    <th>
                        <?= $rs['sumprice'] ?>
                    </th>
                    <th>
                        <?= $rs['date_time'] ?>
                    </th>
            </tr>
            <?php } ?>
        </table>

    </div>
    <script src="../Bootstrap/dist/js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="../Bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>