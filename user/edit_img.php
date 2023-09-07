<?php
require_once("../Condb.php");

if (isset($_POST["submit"])) {
    $targetDirectory = "../img/Profile/user/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $filename = $_FILES["image"]["name"];
            $sql = "UPDATE users SET user_image='".$filename."' WHERE user_id='".$_SESSION['uid']."'";
            if ($conn->query($sql) === TRUE) {
                alert("แก้ไขรูปภาพสำเร็จ");
                go("edit_user.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            alert("Sorry, there was an error uploading your file.");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Bootstrap/dist/css/bootstrap.min.css">    
    <link href="../login_menu.css" rel="stylesheet">
</head>
<body class="text-center">
    <form class="form-signin" method="POST" enctype="multipart/form-data">
        <h1 class="h3 mb-3 font-weight-normal">Please Select an Image</h1>
        <input type="file" class="form-control m-2" required name="image">

        <button name="submit" class="btn btn-lg btn-primary btn-block mt-5" type="submit">Submit</button>
    </form>
</body>
</html>
