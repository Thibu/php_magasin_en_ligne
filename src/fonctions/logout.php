<?php 

session_start();

$_SESSION["connecte"] = false;
header("location: ../../index.php");
exit();