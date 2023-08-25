<?php
require_once("../Condb.php");
session_start();
session_destroy();
go("../index.php");
?>