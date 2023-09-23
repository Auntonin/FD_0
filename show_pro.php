<?php require_once("Condb.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <?php require_once("menu.php");
    if (isset($_GET['pid'])) {
        $pid = $_GET['pid'];
        $sql = "SELECT p.*,c.cate_name
              FROM product p INNER JOIN category c
              ON p.cate_id = c.cate_id
              WHERE pro_id='" . $pid . "'";
        $result = $conn->query($sql);
        $rs = $result->fetch_array();
        $pid = $rs['pro_id'];
        $pn = $rs['pro_name'];
        $pp = $rs['pro_price'];
        $pc = $rs['cate_name'];
        $pi = $rs['pro_image'];
        $rid = $rs['r_id'];
        if (isset($_GET['review']) && $_GET['review'] != "") {
            $prw = $_GET['review'];
            $sql = "INSERT INTO reviews(user_id,pro_id,rv_details) VALUE('$_SESSION[uid]','$pid','$prw')";
            if ($conn->query($sql)) {
                alert("รีวิวสำเร็จ");
            } else {
                alert("รีวิวไม่สำเร็จ");
            }
        }
    } else {
        go("shop.php");
    }
    ?>
    <div class="container">
        <div class="main m-6 row ">
            <div class="col-8"><img src="img/product/<?= $pi ?>" alt="Italian Trulli" class="mt-5" style="width:400px;height:400px;">
            </div>
            <div class="col-4">
                <h1 class="mt-3"><?= $pn ?></h1><br>
                <h2 class="mt-3">ราคา :<?= $pp ?></h2>
                <p>ส่วนลด <?= number_format($rs['pro_discount']); ?> %</p>
                <h2>ประเภท :<?= $pc ?></h2>
                <a name="product_order" href="order/order.php?p_id=<?= $pid ?>& r_id=<?= $rid ?>" class='btn btn-outline-primary me-2'>add to cart</a>

                <br>
                <!-- Button trigger modal -->
                <a class="btn btn-outline-dark my-2 " data-toggle="modal" data-target="#ReviewModal">
                    REVIEW
                </a>
                <!-- Modal -->
                <form method="GET">
                    <div class="modal fade" id="ReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Review</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <input type="text" name="review">
                                    <input type="hidden" name="pid" value="<?= $pid ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- ReviewBox -->
                <table class="table table-striped">
                    <tr>
                    <th>user</th>
                    <th>review</th>
                    </tr>
                    <?php
                    $sql = "SELECT r.*,u.user_name FROM reviews r INNER JOIN users u ON r.user_id=u.user_id WHERE pro_id='$pid'";
                    $result = $conn->query($sql);
                    while ($rs = $result->fetch_array()) { ?>
                    <tr>
                        <td><?= $rs['user_name'] ?></td>
                        <td><?= $rs['rv_details'] ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>

            <script src="Bootstrap/dist/js/code.jquery.com_jquery-3.7.1.min.js"></script>
            <script src="Bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>