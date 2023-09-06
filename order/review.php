<?php
require_once("../Condb.php");
// checklogin();
?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Bootstrap/dist/css/bootstrap.min.css">    
<body>
<div class="text-center">
    <!-- <form class="form-signin" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Please Review</h1>
      <input type="text"  class="form-control mb-2" placeholder="review" required name="review" >   
      <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">Submit</button>
    </form> -->
<table class="table">
    <tr>
        <th>รหัสสินค้า</th>
        <th>รีวิว</th>
    </tr>
    <?php $sql="SELECT o.*,od.* FROM order_details od INNER JOIN  orders o ON o.o_id=od.o_id WHERE o.user_id='$_SESSION[uid]'" ;
    $result=$conn->query($sql);
    while($rs=$result->fetch_array()){
    ?>
    <tr>
<th><?= $rs['pro_id']?></th>
<th><a class="btn btn-outline-primary" href="reviwed.php?pid=<?= $rs['pro_id'] ?>">reciwe</a></th>
    </tr>
<?php } ?>
    </table>
  

</div>
</html>