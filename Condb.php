<?php
session_start();
$servername = "localhost";
$username = "food";
$password = "bnccFoodService";
$dbname = "food";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection Fail = " . $conn->connect_error);
}
// function gon($txt)
// {
//   header("location:$txt");
// }

function go($txt)
{
  echo  "<script >window.location.replace('".$txt."');</script>";
}

function alert($txt)
{
  echo  "<script> alert('$txt')</script>";
}
 

  // function jconfirm() {
  //   <script>
  //   let text;
  //   if (confirm("Press a button!")) {
  //     text = "You pressed OK!";
  //   } else {
  //     text = "You canceled!";
  //   }
  //   </script>
  // }

  

// ban & update_session

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



function checklogin()
{
  if (isset($_SESSION['un'])) {
  } else {
    go("user/login.php");
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

function getdt(){
  date_default_timezone_set('asia/bangkok'); // Set the timezone to New York
  $currentDateTime = date('d-m-Y H:i:s'); // Format: Year-Month-Day Hour:Minute:Second
  return $currentDateTime;
}


