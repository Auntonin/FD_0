<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fd_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection Fail = " . $conn->connect_error);
}
function go($txt)
{
  header("location:$txt");
}

// ban

function check()
{
  global $conn;
if(isset($_SESSION['uid'])&&$_SESSION['uid']!=""){
  $r = $conn->query("SELECT * FROM users WHERE user_id='".$_SESSION['uid']."' ");
  $rs = $r->fetch_array();
$us= $rs['user_status'];
  $_SESSION['uid'] = $rs['user_id'];
  $_SESSION['un'] = $rs['user_name'];
  // $_SESSION['us'] = $rs['user_satus'];
  $_SESSION['ulevel'] = $rs['user_level'];
  $_SESSION['pro_im'] = $rs['user_image'];
  $_SESSION['rr'] = $rs['restaurant'];
  $_SESSION['rd'] = $rs['raider'];
// echo $us;
  if ($us != "") {
    if($us==0){
      alert("โดนban");
      go("show_ban.php");
    }
  }else{
    alert("ไม่เจอuser_status");
  }
}
  
}
check();



function checklogin($txt)
{
  if (!isset($_SESSION['uname'])) {
  } else {
    go("index.php");
  }
}
function checkad()
{
  if (isset($_SESSION['ulevel']) && $_SESSION['ulevel'] == 'admin') {
  } else {
    go("../index.php");
  }
}
function checkr()
{
  if (isset($_SESSION['rr']) && $_SESSION['rr'] == '2') {
  } else {
    go("../index.php");
  }
}

function alert($txt)
{
  echo  "<script> alert('$txt')</script>";
}
