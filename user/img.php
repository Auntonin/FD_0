<?php 
require_once('../condb.php');
if(isset($_GET['subnit'])){
    $fd="img/profile/";
    $tf=$fd . basename($_FILES['image']['name']);
    $ip=1
    if($up=1){
        if(move_uploaded_file($_FILES['image']['tmp_name'] , $tf)){
            $filename=$_FILES['image']['name'];
            $sql="UPDATE users SET user_image ='$filename' WHERE user_id='$_SESSION'";
            if($conn->query($sql)==TRUE){
                ok
            }else{
                not ok
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>img</title>
</head>
<body>
    <div class="container">
        <div class="main">
            <form action="" method="post" enctype="multipart/form-date">
    <input type="file" name="image" >
    <button type="submit">submit</button>
            </form>
        </div>
    </div>
</body>
</html>