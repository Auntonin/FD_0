<?php require_once("../Condb.php");
if(isset($_GET['vid'])&&$_GET['vid']!=""){
  $sql="UPDATE users SET raider=2 WHERE user_id='".$_GET['vid']."'";
  if($rs=$conn->query($sql)){
alert("อนุญาตแล้ว");
  }else{
    alert("ไม่สามารถอนุญาตได้");
  }
}elseif(isset($_GET['did'])&&$_GET['did']!=""){
  $sql="UPDATE users SET raider=0 WHERE user_id='".$_GET['did']."'";
  if($rs=$conn->query($sql)){
alert("ระงับบัชี raider แล้ว");
  }else{
    alert("ไม่สามารถระงับบัญชี raider ได้");
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
                    <th>อนุญาต</th>
                    <th>ระงับ</th>
                  </tr>
                  <?php
               $sql = "SELECT * FROM users WHERE raider>0 ";
                  $result = $conn->query($sql);
                  while ($rs = $result->fetch_array()) {
                        $rdid = $rs['user_id'];
                        $rdst = $rs['raider'];
                        ?>
                        <tr>
                            <td>
                                <?= $rs['user_id']; ?>
                              </td>
                              <td>
                                <?= $rs['user_name'] ?>
                              </td>
                              <td>
                                <?php if($rdst==1){?>
                                <a name="verifyid" href="verify_rd.php?vid=<?=$rdid?>" class='btn btn-outline-primary me-2'>verify</a>
                                <?php }elseif($rst=2){
                                  echo "verify";
                                }
                                ?>
                            </td>
                            <td>
                                <a name="delete" href="verify_rd.php?did=<?=$rdid?>" class='btn btn-outline-primary me-2'>delete</a>
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