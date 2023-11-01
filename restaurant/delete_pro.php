<?php
require_once("../Condb.php");
if (isset($_GET['pid']) && $_GET['pid'] != '') {
    $pid = $_GET['pid'];
   
    $sql = "SELECT * FROM products WHERE pro_id='$pid'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $sql = "DELETE FROM products WHERE pro_id='$pid'";
        if ($conn->query($sql)) {
            alert("ลบสินค้าสำเร็จ");
            go("rest.php");
        } else {
            alert("ลบสินค้าไม่สำเร็จ");
            go("rest.php");
        }
    } else {
        alert("ไม่พบสินค้า");
    }
}else{
    alert("ไม่มีidสินค้าที่จะdeleteส่งมา");
    go("rest.php");
}
?>

