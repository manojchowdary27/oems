<?php
session_start();
header('Content-Type:application/text');

if(isset($_SESSION['normal_user'])) header("location: ../index.php");
require ("config.php");
@$postdata = file_get_contents("php://input");
@$request = json_decode($postdata);
@$user = $request->user;
@$pwd = $request->pwd;
@$type = $request->type;
@$user=mysql_real_escape_string(trim($user));
@$pwd=mysql_real_escape_string(trim($pwd));
$type = mysql_real_escape_string(trim($type));
$ip = $_SERVER['REMOTE_ADDR'];
if($type){
	
	$result=mysql_query("select count(*) as value from admin_users where username='".$user."' and passwd='".$pwd."' ") or die(mysql_error());
	$result = mysql_fetch_array($result);
	if($result['value']>=1)
	 {
		$_SESSION['admin_user']=$user; 
		$res= array('access'=>'allow');
		echo json_encode($res);
	}
	else
	{
		$res= array('access'=>'notallow');
		echo json_encode($res);
	}
	
	
	
	}
else{
	$result=mysql_query("select count(*) as value from users where username='".$user."' and passwd='".$pwd."' ") or die(mysql_error());
	$result = mysql_fetch_array($result);
	if($result['value']>=1)
	 {
		$_SESSION['normal_user']=$user; 
		$res= array('access'=>'allow');
		echo json_encode($res);
	}
	else
	{
		$res= array('access'=>'notallow');
		echo json_encode($res);
	}
}
?>
