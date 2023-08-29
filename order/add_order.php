<?php
require_once("../Condb.php");

if (isset($_GET['submit'])) {
    $dt = getdt(); // Make sure getdt() is defined somewhere

    // Sanitize user input to prevent SQL injection
    $uid = intval($_SESSION['uid']);

    $sql = "INSERT INTO orders(user_id, date_time) VALUES ($uid, '$dt')";
    if ($conn->query($sql)) {
        $i_id = $conn->insert_id;

        function insertod($is_id, $pro_id, $pro_qty, $pro_sumprice) {
            global $conn;
            $sql = "INSERT INTO order_details(o_id, pro_id, pro_qty, pro_sumprice) VALUES ($is_id, $pro_id, $pro_qty, $pro_sumprice)";
            if (!$conn->query($sql)) {
                alert("สร้างรายละเอียดผิดพลาด");
            }
        }

        $sumall = 0;
        for ($i = 0; $i < count($_SESSION["strProductID"]); $i++) {
            if ($_SESSION["strProductID"][$i] != "") {
                $sql1 = "SELECT * FROM product WHERE pro_id='" . $_SESSION["strProductID"][$i] . "' ";
                $result1 = $conn->query($sql1);
                $rs_pro = $result1->fetch_array();
                $_SESSION["price"][$i] = $rs_pro['pro_price'];
                $_SESSION["discount"][$i] = $rs_pro['pro_discount'];
                $Total = $_SESSION["strQty"][$i];
                $discount = $_SESSION["discount"][$i];
                $discountedPrice = $_SESSION["price"][$i] * (1 - ($discount / 100));
                $sump = $Total * $discountedPrice;
                $sumall += $sump;
                insertod($i_id, $_SESSION["strProductID"][$i], $_SESSION["strQty"][$i], $sump);
            }
        }

        $sql = "UPDATE orders SET sumprice='$sumall' WHERE o_id='$i_id'";
        if ($conn->query($sql)) {
            unset($_SESSION["strProductID"]);
            unset($_SESSION["price"]);
            unset($_SESSION["strQty"]);
            unset($_SESSION["discount"]);

            go("show_order_status.php"); // Make sure go() is defined somewhere
        } else {
            alert("ไม่สามารถอัปเดทราคารวมได้");
        }

    } else {
        alert("ไม่สามารถสั่งorderได้");
    }
} else {
    go("../cart.php"); // Make sure go() is defined somewhere
}
?>
