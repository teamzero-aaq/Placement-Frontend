<?php 
session_start();
include('db.php');

if (!$_SESSION['username']) {
	header("Location: http://localhost:8888/placement/login.php");
}



 ?>