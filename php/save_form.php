<?php 


include 'config.php';

$target_dir = "../upload/";
     @$username = htmlspecialchars(mysql_real_escape_string($_POST['username']));
     @$examname = htmlspecialchars(mysql_real_escape_string($_POST['examname']));
     @$examtime = htmlspecialchars(mysql_real_escape_string($_POST['examtime']));
     @$number = htmlspecialchars(mysql_real_escape_string($_POST['number']));
     $questions='';
     $answers='';
     @$marks = htmlspecialchars(mysql_real_escape_string($_POST['marks']));
     @$nmarks = htmlspecialchars(mysql_real_escape_string($_POST['nmarks']));
     @$stime = htmlspecialchars(mysql_real_escape_string($_POST['stime']));
     @$etime = htmlspecialchars(mysql_real_escape_string($_POST['etime']));
      
 
     @$ip=$_SERVER['REMOTE_ADDR'];
     @$uptime = date("Y-M-d");
     $ano=array();
     $qno=array();
     for($i=0;$i<$number;$i++){
		 
		 
		   @$manojfilename=basename($_FILES['qno'.$i]["name"]);
    
     $ext = pathinfo($manojfilename, PATHINFO_EXTENSION);
     $ext2 = strtoupper($ext);
     if($ext2=="JPG" || $ext2=="PNG" || $ext2=="PDF" ){} //do nothing continue for uploading
     else die("File Format Not Supported..! Please Upload JPG/PNG/PDF file");
     $manojfilename = "manojchowdary27".$manojfilename."pathipati";
     $manojfilename = md5($manojfilename);
     $manojfilename = md5($manojfilename).".".$ext;
     $target_file = $target_dir . $manojfilename;

		 
		 
		 
		 $questions = $questions.$manojfilename.'~';
		 move_uploaded_file($_FILES["qno".$i]["tmp_name"], $target_file);
		 $manoj='ano'.$i;
		 $ano[$i] = $_POST[$manoj];
		 $answers = $answers.$ano[$i].'~';
		 echo $ano[$i]."<br>".$manojfilename;
		 }
		 
		 
		 $qry = mysql_query("insert into exams (`sno`,`examname`,`examtime`,`number`,`questions`,`answers`,`marks`,`nmarks`,`start_time`,`end_time`,`ip`,`time`) 
		 values('','$examname','$examtime','$number','$questions','$answers','$marks','$nmarks','$stime','$etime','$ip','$uptime')") or die(mysql_error());
	if($qry)
	echo "<script>alert('Successfully Created the New Test...!Thank You');window.location.href='index.php'</script>";
	else
	echo "<script>alert('Something Went Wrong.Press Ctrl + R to try again')</script>";
?>
