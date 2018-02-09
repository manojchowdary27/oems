<?php 
session_start();
include "php/config.php";
if(!isset($_SESSION['admin_user'])) header("location:index.php");
$sno = mysql_real_escape_string(trim($_GET['sno']));
$delete = mysql_query("update exams set status = -1 where sno = '$sno' ") or die(mysql_error());
if($delete) echo "<script>alert('Success');window.location.href='index.php'</script>";
else echo "<script>alert('Error Occured Try Again...!');window.location.href='index.php'</script>";
?>   
