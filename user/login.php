<?php
require_once("../Condb.php");
// checklogin();


if (isset($_POST['username'])) {
    $un = $_POST['username'];
    $ps = $_POST['password'];
    $sql = "SELECT * FROM users WHERE user_name='" . $un . "' AND user_password='" . $ps . "'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $rs = $result->fetch_array();
        $_SESSION['uid'] = $rs['user_id'];
        $_SESSION['un'] = $rs['user_name'];
        // $_SESSION['us'] = $rs['user_satus'];
        $_SESSION['ulevel'] = $rs['user_level'];
        $_SESSION['pro_im'] = $rs['user_image'];
        $_SESSION['rr'] = $rs['restaurant'];
        $_SESSION['rd'] = $rs['raider'];
        go("../index.php");
    } else {
        alert("ไม่เจอ user");
    }
} else
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Bootstrap/dist/css/bootstrap.min.css">
    <link href="../Bootstrap/dist/css//login_menu.css" rel="stylesheet">
</head>

<body>

    <body>
        <form class="form form-signin" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <input type="text" class="form-control mb-2" placeholder="UserName" required name="username">
            <input type="password" class="form-control" placeholder="Password" required name="password">
            <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">Sign in</button>
        </form>
    </body>

</html>