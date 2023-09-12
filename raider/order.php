<?php 
require_once("../Conn.php");
if(isset($_GET['submit'])&&$_GET['submit']!=""){
    $oid=$_GET['submit'];
    $sql="UPDATE orders SET o_status=2 WHERE o_id='$oid'";
    if($conn->query($sql)){
        alert("รับออร์เดอร์สำเร็จ");
        go("raider.php");
    }else{
        alert("รับออร์เดอร์ไม่สำเร็จ");
        go("raider.php");
    }
}else{
    alert("ไม่มีidออร์เดอร์ส่งมา");
}
?>