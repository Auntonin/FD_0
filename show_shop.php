<?php require_once("Condb.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Bootstrap/dist/css/bootstrap.min.css">
    
</head>
<body>
    <?php require_once("menu.php")?>

     <div class="main">
    <table class="table table-striped">
                  <tr>
                        
                        <th>รหัสร้านอาหาร</th>
                        <th>รูปร้านอาหาร</th>
                        <th>ประเภทร้านอาหาร</th>
                        <th>ชื่อร้านอาหาร</th>
                        <th>ดูร้านอาหาร</th>
                  </tr>
                  <?php
                  if(isset($_POST['keyword'])&&$_POST['keyword']!='')
               $sql = "SELECT r.*,c.cr_name FROM 
               users r INNER JOIN cate_restaurant c
               ON r.cr_id = c.cr_id 
               WHERE r.restaurant=2";
                  $result = $conn->query($sql);
                  while ($rs = $result->fetch_array()) {
                        ?>
                        <tr>
                            <td>
                                <?= $rs['user_id']; ?>
                              </td>
                              <td>
                                <img src="img/Profile/user/<?= $rs['user_image'] ?>" width="120" height="110">
                              </td>
                              <td>
                                <?= $rs['cr_name'] ?>
                              </td>
                              <td>
                                <?= $rs['user_name'] ?>
                              </td>
                              <td>
                                <a name="product_order" href="show_pro.php?rid=<?= $rid ?>"
                                          class='btn btn-outline-primary me-2'>view</a>
                            </td>
                        </tr>
                        <?php
                  }
                  ?>
            </table>

    </div>
    <script src="Bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>