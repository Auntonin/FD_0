<?php require_once("../Condb.php");
if(isset($_GET['uid'])&&$_GET['uid']!=""){
  $sql="UPDATE users SET user_status=1 WHERE user_id='".$_GET['uid']."'";
  if($rs=$conn->query($sql)){
alert("อนุญาตแล้ว");
  }else{
    alert("ไม่สามารถอนุญาตได้");
  }
}elseif(isset($_GET['did'])&&$_GET['did']!=""){
  $sql="UPDATE users SET user_status=0 WHERE user_id='".$_GET['did']."'";
  if($rs=$conn->query($sql)){
alert("ระงับบัชี user แล้ว");
  }else{
    alert("ไม่สามารถระงับบัญชี user ได้");
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
    <?php require_once("menu.php")?>

     <div class="main">
    <table class="table table-striped">
                  <tr>
                        
                        <th>รหัส</th>
                        <th>ชื่อ</th>
                        <th>ยกเลิกการระงับ</th>
                        <th>ระงับ</th>
                  </tr>
                  <?php
               $sql = "SELECT * FROM users";
                  $result = $conn->query($sql);
                  while ($rs = $result->fetch_array()) {
                        $un = $rs['user_name'];
                        $uid = $rs['user_id'];
                        $ust = $rs['user_status'];
                        ?>
                        <tr>
                            <td>
                                <?= $uid ?>
                              </td>
                              <td>
                                <?= $un ?>
                              </td>
                        
                              <td>
                                <?php if($ust==0){?>
                                <a href="view_u.php?uid=<?=$uid?>" class='btn btn-outline-primary me-2'>unban</a>
                                <?php }elseif($ust=1){
                                  echo "active";
                                }
                                ?>
                            </td>
                            <td>
                                <a name="BAN"  href="view_u.php?did=<?=$uid?>" class='btn btn-outline-primary me-2'>ban</a>
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