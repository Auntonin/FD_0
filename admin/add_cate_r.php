<?php
   require_once('../condb.php');
   checkad();
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
    <link rel="stylesheet" href="../Bootstrap/cdn.jsdelivr.net_npm_bootstrap@4.0.0_dist_css_bootstrap.min.css">
    <title>Document</title>
</head>

<body class="text-center">
    <?php require_once("menu.php");?>
    <div class="container">
<div class="main m-5">
        <form class="form-signin" action="" method="post">
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
