<?php 
session_start();
include "php/config.php";
if(!isset($_SESSION['normal_user'])) header("location:login.php");
if(!isset($_SESSION['sno'])) header("location:index.php");
@$uname = $_SESSION['normal_user'];
@$sno = $_SESSION['sno'];
$i='';

$allanswers = array();
@$fet = mysql_fetch_array(mysql_query("select * from exams where sno='$sno' ")) or die(mysql_error());
@$number = $fet['number'];
@$org = $fet['answers'];
@$org = split('~',$org);
$marks= 0;
$pos = $fet['marks'];
$neg = $fet['nmarks'];
$ansstring='';
$q = mysql_fetch_array(mysql_query("select count(*) as cou from logs where examsno='$sno' and username='$uname' ")) or die(mysql_error());
if($q['cou']>=1) {echo "<script>alert('Already Taken The Exam');window.location.href='index.php';</script>";
die("already Taken");}
for($i=0;$i<$number;$i++){
	
	$allanswers[$i] = mysql_real_escape_string(trim($_POST['ans'.$i]));
	$ansstring = $ansstring.$allanswers[$i].'~';
	if($allanswers[$i]!='no'&&$allanswers[$i]==$org[$i]) $marks=$marks+$pos;
	else if($allanswers[$i]!='no'&&$allanswers[$i]!=$org[$i]) $marks=$marks-$neg;
	else $marks=$marks;
	}
	
	@$ip=$_SERVER['REMOTE_ADDR'];
     @$uptime = date('Y-M-D-d h:i:s am',time());
	$ok=mysql_query("Insert Into logs (`sno`,`username`,`examsno`,`marks`,`completed`,`useranswers`,`ip`,`time`) values ('','$uname','$sno','$marks','1','$ansstring','$ip','$uptime')") or die(mysql_error());

if($ok) echo "<script>alert('Successfuly Submitted Thank you...!');window.location.href='index.php'</script>";
else echo "<script>alert('Sorry Something Went Wrong Please Press Ctrl+R to try again..!')</script>"






?>
