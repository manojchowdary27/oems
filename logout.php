<?php

session_start();
if(isset($_SESSION['normal_user']) || isset($_SESSION['admin_user'])){
	
	session_destroy();
		header("location:login.php");
}
 
?>
