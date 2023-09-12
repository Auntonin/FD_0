<?php require_once("../Condb.php");
if(isset($_POST['submit'])&&$_POST['submit']!=""){
    $oid=$_POST['submit'];
    $sql="UPDATE orders SET o_status=3 WHERE o_id='$oid'";
    if($conn->query($sql)){
        alert("ส่งสินค้าให้raiderสำเร็จ");
        go("rest.php");
    }else{
        alert("ส่งสินค้าให้raiderไม่สำเร็จ");
    }
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
    $sql = "SELECT * FROM orders WHERE r_id='".$_SESSION['uid']."' ";
    $result=$conn->query($sql);
    ?>
    <div class="container">
        <table class="table">
            <tr>
                <th>รหัสคำสั่ง</th>
                <th>สถาณะ</th>
                <th>ราคารวม</th>
                <th>สั่งเมื่อ</th>
                <th>ออร์เดอร์</th>
            </tr>
            <?php while($rs=$result->fetch_array()){
                $os=$rs['o_status'];
                if($os==0){
                    $osshow="ร้านค้ายังไม่ได้รับออร์เดอร์";
                }elseif($os==1){
                    $osshow="ร้านค้ารับออร์เดอร์แล้ว";
                }elseif($os==2){
                    $osshow="ไรเดอร์รับออร์เดอร์แล้ว";
                }elseif($os==3){
                    $osshow="ร้านค้าส่งอาหารให้ไรเดอร์แล้ว";
                }elseif($os==4){
                    $osshow="ออร์เดอร์ถูกส่งแล้ว";
                }
                ?>
            <tr>
                <th><?= $rs['o_id']?></th>
                <th><?=  $osshow?></th>
                <th><?= $rs['sumprice']?></th>
                <th><?= $rs['date_time']?></th>
                <?php if($os==0){ ?>
                <th><a class="btn btn-outline-primary" href="view.php?oid=<?= $rs['o_id']?>">view</a></th>
                <?php }elseif($os==2){ ?>
                    <form method="POST">
                <th><button type="submit" class="btn btn-outline-primary" name="submit" VALUE="<?= $rs['o_id']?>">submit</a></th>
                </form>
            </tr>
            <?php } }?>
        </table>

    </div>
    <script src="../Bootstrap/dist/js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="../Bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>