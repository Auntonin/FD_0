<?php require_once("../Condb.php");
$un = $_SESSION['un'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Bootstrap/dist/css/bootstrap.min.css">    
    
</head>
<body><div class="container">
    <h1 >EDIT USER</h1>
<img src="../img/Profile/user/<?= $_SESSION['pro_im']?>" alt="Italian Trulli" class="mt-5" style="width:200px;height:200px;">

<div class="main m-5">
    <a class="btn btn-outline-primary me-2" href="edit_img.php?PROFILE" >EDIT PROFILE</a>
    <a class="btn btn-outline-primary me-2" href="edit_name.php">EDIT USERNAME</a>
    <a class="btn btn-outline-primary me-2" href="edit_pass.php?PASSWORD">EDIT PASSWORD</a>
    <a class="btn btn-outline-primary me-2" href="edit_ad.php?ADDRESS">EDIT ADDRESS</a>
    <a class="btn btn-primary me-2" href="../index.php"> BACK TO INDEX</a>
</div>

</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>