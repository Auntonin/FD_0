<?php require_once("../Condb.php");
if(isset($_GET['vid'])&&$_GET['vid']!=""){
  $sql="UPDATE users SET restaurant=2 WHERE user_id='".$_GET['vid']."'";
  if($rs=$conn->query($sql)){
alert("อนุญาตแล้ว");
  }else{
    alert("ไม่สามารถอนุญาตได้");
  }
}elseif(isset($_GET['did'])&&$_GET['did']!=""){
  $sql="UPDATE users SET restaurant=0,cr_id=0 WHERE user_id='".$_GET['did']."'";
  if($rs=$conn->query($sql)){
alert("ระงับบัชี restaurant แล้ว");
  }else{
    alert("ไม่สามารถระงับบัญชี reataurant ได้");
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
                        <th>ประเภท</th>
                        <th>อนุญาต</th>
                        <th>ระงับ</th>
                  </tr>
                  <?php
               $sql = "SELECT u.*,c.cr_name FROM users u INNER JOIN cate_restaurant c ON u.cr_id =c.cr_id ";
                  $result = $conn->query($sql);
                  while ($rs = $result->fetch_array()) {
                        $cn = $rs['user_name'];
                        $rid = $rs['user_id'];
                        $rst = $rs['restaurant'];
                        ?>
                        <tr>
                            <td>
                                <?= $rid ?>
                              </td>
                              <td>
                                <?= $cn ?>
                              </td>
                              <td>
                                <?= $rs['cr_name'] ?>
                              </td>
                              <td>
                                <?php if($rst==1){?>
                                <a name="verifyid" href="verify_r.php?vid=<?=$rid?>" class='btn btn-outline-primary me-2'>verify</a>
                                <?php }elseif($rst=2){
                                  echo "Verified";
                                }
                                ?>
                            </td>
                            <td>
                                <a name="delete" href="verify_r.php?did=<?=$rid?>" class='btn btn-outline-primary me-2'>delete</a>
                            </td>
                        </tr>
                        <?php
                  }
                  ?>
            </table>

    </div>
    <script src="../Bootstrap/dist/js/code.jquery.com_jquery-3.7.1.min.js"></script>
   <script src="../Bootstrap/dist/js/bootstrap.min.js"></script></body>
</html>