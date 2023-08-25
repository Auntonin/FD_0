<?php require_once("Condb.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Bootstrap/cdn.jsdelivr.net_npm_bootstrap@4.0.0_dist_css_bootstrap.min.css">
    
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
               $sql = "SELECT r.*,c.cr_name FROM 
               restaurant r INNER JOIN cate_restaurant c
               ON r.r_cate = c.cr_id";
                  $result = $conn->query($sql);
                  while ($rs = $result->fetch_array()) {
                        $cn = $rs['r_name'];
                        $rid = $rs['r_id'];
                        ?>
                        <tr>
                            <td>
                                <?= $rs['r_id']; ?>
                              </td>
                              <td>
                                <img src="img/Profile/<?= $rs['r_image'] ?>" width="120" height="110">
                              </td>
                              <td>
                                <?= $rs['cr_name'] ?>
                              </td>
                              <td>
                                <?= $rs['r_name'] ?>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- <script src="Bootstrap/cdn.jsdelivr.net_npm_bootstrap@4.0.0_dist_js_bootstrap.min.js"></script>
<script src="Bootstarp/cdn.jsdelivr.net_npm_popper.js@1.12.9_dist_umd_popper.min.js"></script>
<script src="Bootstrap/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script src="cdn.datatables.net_1.13.6_js_jquery.dataTables.min.js"></script> -->
</body>
</html>