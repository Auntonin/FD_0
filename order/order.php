<?php
require_once('../Condb.php');

function updateQuantity($productID, $newQuantity) {
    $key = array_search($productID, $_SESSION["strProductID"]);
    if ((string)$key !== "") {
        $_SESSION["strQty"][$key] = $newQuantity;
    }
}	

// print_r($_GET); 
if(isset($_GET["r_id"])&&isset($_SESSION['uid'])&&$_GET["r_id"]==$_SESSION['uid']){
	alert("กรุณาอย่าสั่งอาหารจากร้านท่านเอง");
	go("../show_shop.php");
}elseif(isset($_GET['p_id'])){
	if(!isset($_SESSION["intLine"]))  
	{
		 $_SESSION['rest_id'] = $_GET["r_id"]; 
		 $_SESSION["intLine"] = 0;
		 $_SESSION["strProductID"][0] = $_GET["p_id"]; 
		 $_SESSION["strQty"][0] = 1;                
		 go("../cart.php");
	}
	elseif(isset($_SESSION['rest_id'])&&isset($_GET["r_id"])&&$_SESSION['rest_id'] != $_GET["r_id"]){
		alert("กรุณาสั่งสินค้าจากร้านเดียวกัน");
		go("../shop.php?r_id<?=$_SESSION[rest_id]?>");
	}
	else
	{
		$key = array_search($_GET["p_id"],$_SESSION["strProductID"]); 
		if((string)$key != "")
		{
			 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
		}
		else
		{
			updateQuantity($_GET["p_id"], $_POST["quantity"]);
			 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
			 $intNewLine = $_SESSION["intLine"];
			 $_SESSION["strProductID"][$intNewLine] = $_GET["p_id"];
			 $_SESSION["strQty"][$intNewLine] = 1;
			 
		}
	go("../cart.php");
	}
}else{
	alert("กรุณาเลือกรายการอาหารก่อน");
	go("../index.php");
}
?>