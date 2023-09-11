<?php require_once("Condb.php");
checklogin(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="Bootstrap/dist/css/bootstrap.min.css">

</head>

<body>
  <?php require_once("menu.php"); ?>
  <div class="cotainer">
    <div class="main">

      <table class="table table-striped">
        <tr>
          <th>รูปร้านอาหาร</th>
          <th>ประเภทร้านอาหาร</th>
          <th>ชื่อร้านอาหาร</th>
          <th>ดูร้านอาหาร</th>
        </tr>
        <?php
        if (isset($_POST['keyword']) && $_POST['keyword'] != '') {
          $keyword = $_POST['keyword'];
          $sql = "SELECT u.*,c.cr_name FROM 
                    users u INNER JOIN cate_restaurant c
                    ON u.cr_id = c.cr_id 
                    WHERE u.restaurant=2 AND u.user_name LIKE  '%$keyword%'";
        } else {
          $sql = "SELECT u.*,c.cr_name FROM 
                    users u INNER JOIN cate_restaurant c
                    ON u.cr_id = c.cr_id 
                    WHERE u.restaurant=2";
        }
        $result = $conn->query($sql);
        while ($rs = $result->fetch_assoc()) {
          $rid = $rs['user_id'];
        ?>
          <tr>
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
              <a href="shop.php?r_id=<?= $rid ?>" class='btn btn-outline-primary me-2'>view</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </table>

    </div>
  </div>
  <script src="Bootstrap/dist/js/code.jquery.com_jquery-3.7.1.min.js"></script>
  <script src="Bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>