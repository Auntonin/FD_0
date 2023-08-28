<?php
 require_once('Condb.php');
if (isset($_SESSION['un'])) {
  if (isset($_SESSION["intLine"]) != "") {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <!-- CSS only -->

      <link rel="stylesheet" href="Bootstrap/dist/css/bootstrap.min.css">    


    </head>

    <body>

      <div class="container">

        <!-- nav_bar -->
        <?php require_once('menu.php'); ?>
        <!-- end_nav_bar -->



        <form action="" method="POST">
          <div class="row">
            <div class="col-md -10">
              <table id="product_list" class="table table-hover">

                <tr>
                  <th>ลำดับที่</th>
                  <th>ชื่อสินค้า</th>
                  <th>ราคา</th>
                  <th>จำนวน</th>
                  <th>ราคารวม</th>
                  <th>ลบรายการ</th>
                </tr>

                <?php
                $Total = 0;
                $sumall = 0;
                $ord = 1;
                $sumall = 0;
                for ($i = 0; $i <= (int) $_SESSION["intLine"]; $i++) {
                  if (($_SESSION["strProductID"][$i]) != "") {
                    $sql1 = "SELECT * FROM product WHERE pro_id='" . $_SESSION["strProductID"][$i] . "' ";
                    $result1 = $conn->query($sql1);
                    $rs_pro = $result1->fetch_array();

                    $_SESSION["price"][$i] = $rs_pro['pro_price'];
                    $Total = $_SESSION["strQty"][$i];
                    $sump = $Total * $_SESSION['price'][$i];
                    $sumall = $sumall + $sump;
                    ?>
                    <tr>
                      <td>
                        <?= $ord ?>
                      </td>
                      <td>
                        <?= $rs_pro['pro_name'] ?>
                      </td>
                      <td>
                        <?= $rs_pro['pro_price'] ?>
                      </td>
                      <td><input style="text-align:center;" value="<?= $_SESSION["strQty"][$i] ?>" type="number" id="p_qty">
                      <!-- <input id="p_id" type="hidden" value='<?= $_SESSION["strProductID"][$i]?>'> -->
                      </td>
                      <td>
                        <?= $sump ?>
                      </td>
                      <td><a href="order/delete_order.php?Line=<?= $i ?>">Delete</a></td>
                    </tr>
                    <?php
                    $ord++;
                  }
                }
                ?>
                <tr>
                  <td>รวมเป็นเงิน</td>
                  <td></td>
                  <td></td>
                  <td></td>

                  <td>
                    <?= $sumall ?>
                  </td>
                  <td>บาท</td>

                </tr>
              </table>
            </div>
          </div>
        </form>
        <div style="text-align:right">
          <a href="index.php"><button type="button" class="btn btn-outline-primary me-2">เลือกสินค้า</button></a>
          <button type="button" class="btn btn-primary me-2">ยืนยันคำสั่งซื้อ</button>
        </div>
      </div>
      <script src="Bootstrap/dist/js/code.jquery.com_jquery-3.7.1.min.js"></script>
   <script src="Bootstrap/dist/js/bootstrap.min.js"></script>
    </body>

    </html>
    <?php
  } else {
    go("index.php");
  }
} else {
 go("user/login.php");
}
?>