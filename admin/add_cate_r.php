<?php
   require_once("../Condb.php");

    if (isset($_POST['cate_r']) && trim($_POST['cate_r']) != "") {
        $crn=$_POST['cate_r'];
        $sql = "SELECT cr_name FROM cate_restaurant WHERE cr_name = '" . trim($crn) . "'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $sql = "INSERT INTO cate_restaurant(cr_name) VALUES('$crn')";
            $result = $conn->query($sql);
          go("admin.php");
        } else {
           echo "มีประเภทร้านค้านี้แล้ว";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/dist/css/bootstrap.min.css">  
      <title>Document</title>
</head>

<body class="text-center">
    <?php require_once("menu.php");?>
    <div class="container">
<div class="main m-5">
        <form class="form" action="" method="post">
            <div class="form-inline">
                <label class="m-5" for="cate_name">ประเภทร้านค้า</label>
                <input type="text" class="form-control" name="cate_r" id="cate_name"
                    placeholder="ประเภทร้านค้า">
            </div>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit" value="ok">Add</button>

            <br><br>
            <a type='button' class='btn btn-outline-primary me-2' href="admin.php">Close</a>
        </form>

        </div>
    </div>
    <script src="../Bootstrap/dist/js/code.jquery.com_jquery-3.7.1.min.js"></script>
   <script src="../Bootstrap/dist/js/bootstrap.min.js"></script></body>

</html>
