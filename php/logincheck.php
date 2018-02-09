<?php 
if(!isset($_SESSION['normal_user']) && !isset($_SESSION['admin_user']) ) header("location:login.php");


?>
