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
    <link rel="stylesheet" href="../Bootstrap/cdn.jsdelivr.net_npm_bootstrap@4.0.0_dist_css_bootstrap.min.css">
    
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- <script src="Bootstrap/cdn.jsdelivr.net_npm_bootstrap@4.0.0_dist_js_bootstrap.min.js"></script>
<script src="Bootstarp/cdn.jsdelivr.net_npm_popper.js@1.12.9_dist_umd_popper.min.js"></script>
<script src="Bootstrap/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script src="cdn.datatables.net_1.13.6_js_jquery.dataTables.min.js"></script> -->
</body>
</html>