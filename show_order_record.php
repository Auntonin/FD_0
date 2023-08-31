<?php require_once("Condb.php");
function checkuo(){
    global $conn ;
    $result=$conn->query("SELECT o.*,u.user_id FROM 
    orders o INNER JOIN users u ON o.user_id=u.user_id ");
    $rs=$result->fetch_array();
    $uo = array_search($_SESSION['uid'],$rs['user_id']);
    if((string)$uo == ""){
        alert("กรุณาสั่งอาหารก่อน");
        go("index.php");	
    }
}
checkuo();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <?php require_once("menu.php");
    $result=$conn->query("SELECT o.*,u.user_name FROM 
    orders o INNER JOIN users u ON o.user_id=u.user_id 
    WHERE u.user_id='".$_SESSION['uid']."'");
    ?>
    <div class="container">
        <table class="table">
            <tr>
                <th>รหัสคำสั่ง</th>
                <th>ร้าน</th>
                <th>สถาณะ</th>
                <th>ราคารวม</th>
                <th>สั่งเมื่อ</th>
                <th>รีวิว</th>
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
                <th><?= $rs['user_name']?></th>
                <th><?=  $osshow?></th>
                <th><?= $rs['sumprice']?></th>
                <th><?= $rs['date_time']?></th>
                <th><a class="btn btn-outline-primary" href="order/review.php">review</a></th>
            </tr>
            <?php }?>
        </table>

    </div>
    <script src="Bootstrap/dist/js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="Bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>