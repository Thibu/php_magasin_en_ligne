<?php 

session_start();

$_SESSION["connecte"] = false;
session_destroy();
header("location: ../../index.php");
exit();