<?php require_once("Condb.php"); 
checklogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Bootstrap/dist/css/bootstrap.min.css"></head>
<body>
    <?php require_once("menu.php"); ?>
    <div class="main">
        <h3>ประเภทอาหาร</h3>
    <form action="" method="GET ">
    <select class="custom-select my-3 mx-2" name="cate">
  <option value="">เลือก</option>
  <?php
  $re=$conn->query("SELECT * FROM category");
  while($res=$re->fetch_array()){
?>
<option value="<?=$res['cate_id']?>"><?=$res['cate_name']?></option>
<?php
  }
 
  ?>
  
</select>
<button type="submit">submit</button>
</form>
        <table class="table table-striped">
            <tr>
                <th>รูปอาหาร</th>
                <th class="w-25">ชื่อสินค้า</th>
                <th>ประเภทอาหาร</th>
                <th>ราคาสินค้า</th>
                <th>ดูสินค้า</th>
            </tr>
            <?php
            //  if (isset($_POST['keyword']) && $_POST['keyword'] !== "") {
            //     $keyword = $_POST['keyword'];
            //     $sql = "SELECT p.*, u.user_name
            //             FROM product p INNER JOIN users u
            //             ON p.r_id = u.user_id
            //             WHERE pro_name LIKE '%$keyword%' OR user_name LIKE '%$keyword%'";
            // }
            if(isset($_GET['cate']) && $_GET['cate'] !== ""){
                $cate=$_GET['cate'];
                $sql="SELECT p.*, c.cate_name FROM product p INNER JOIN category c ON p.cate_id = c.cate_id WHERE p.cate_id='$cate'";
            }
            
            else{
                $sql = "SELECT p.*, c.cate_name
                        FROM product p INNER JOIN category c
                        ON p.cate_id = c.cate_id";
            }
            $result = $conn->query($sql);
            while ($rs = $result->fetch_array()) {
                // $d=$rs['pro_dicount'];
                $pid=$rs['pro_id'];
                ?>
                <tr>
                    <td>
                        <img src="img/product/<?= $rs['pro_image'] ?>" width="120" height="110" alt="<?= $rs['pro_name']; ?>">
                    </td>
                    <td>
                        <?= $rs['pro_name']; ?>
                    </td>
                    <td>
                        <?= $rs['cate_name']; ?>
                    </td>
                    <td>
                        <?= number_format($rs['pro_price']); ?>
                        <p>ส่วนลด  <?= number_format($rs['pro_discount']); ?> %</p>
                       
                    </td>
                    <td>
                        <a href="show_pro.php?pid=<?= $pid ?>" class='btn btn-outline-primary me-2'>View</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <script src="Bootstrap/dist/js/code.jquery.com_jquery-3.7.1.min.js"></script>
   <script src="Bootstrap/dist/js/bootstrap.min.js"></script></body>
</html>
