    <?php 
    require_once("../Condb.php");
    if(isset($_GET['oid1'])&&$_GET['oid1']!=""){//ไรเดอร์รับออร์เดอร์
        $oid=$_GET['oid1'];
        $sql="UPDATE orders SET o_status=2,rd_id='".$_SESSION['uid']."' WHERE o_id='$oid'";
        if($conn->query($sql)){
            alert("รับออร์เดอร์สำเร็จ");
            go("raider.php");
        }else{
            alert("รับออร์เดอร์ไม่สำเร็จ");
            go("raider.php");
        }

    }elseif(isset($_GET['oid2'])&&$_GET['oid2']!=""){//ไรเดอร์ส่งออร์เดอร์
        $oid=$_GET['oid2'];
        $sql="UPDATE orders SET o_status=4,rd_id='".$_SESSION['uid']."' WHERE o_id='$oid'";
        if($conn->query($sql)){
            alert("ส่งออร์เดอร์สำเร็จ");
            go("raider.php");
        }else{
            alert("ส่งออร์เดอร์ไม่สำเร็จ");
            go("raider.php");
        }
        
    }
    else{
        alert("ไม่มีidออร์เดอร์ส่งมา");
        go("raider.php");
    }
    ?>