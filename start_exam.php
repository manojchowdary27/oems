<?php 
session_start();
include "header.php";
include "php/config.php";
if(!isset($_SESSION['normal_user']) and !isset($_SESSION['admin_user'])) header("location:login.php");
$sno = mysql_real_escape_string(trim($_GET['sno']));
$examdetails = mysql_fetch_array(mysql_query("select * from exams where sno = '$sno' ")) or die(mysql_error());
$questions = $examdetails['questions'];
$questions = split('~',$questions);
$_SESSION['sno'] = $examdetails['sno'];
$uname = $_SESSION['normal_user'];
?>   
    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
    	<div class="row">
    	<div class="span12">
						
				<div class="widget widget-plain">
				</div> <!-- /widget -->
				
				
				
			</div> <!-- /span12 -->
         </div>	
    
	      <div class="row">
	      	
	      	<div class="span12">
	      		
	      		<div class="widget">		
					<form action="submit.php" onsubmit="return confirm('Are You sure ?')" method="post" >
					<?php 
					$i=0;
					for($i=0;$i<$examdetails['number'];$i++){
						 ?>
					
					
					<div class="widget-header">
						<i class="icon-pushpin"></i>
						<h3 style="color:blue;">Question <?php echo $i+1; ?></h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					<br/>	
						<ul class="faq-list">
							
									<img src="upload/<?php echo $questions[$i]; ?>" />
							<br><br>							<b style='color:blue;'>Ans:</b> &nbsp;<select name="ans<?php echo $i?>" id=ans >
								<option value='no' >Select</option>
								<option value=A >A</option>
								<option value=B >B</option>
								<option value=C >C</option>
								<option value=D >D</option>
								</select>
								
						</ul>
					</div> <!-- /widget-content -->
					<?php } ?>
				</div> <!-- /widget -->	
				<?php 
				$count = mysql_fetch_array(mysql_query("select count(*) as cou from logs where examsno='$sno' and username='$uname' ")) or die(mysql_error());
				if($count['cou']>=1) { 
					?>
				<div class="form-actions">
					<h3 class="btn btn-danger">You have already Written the Exam...! </h3> 
				</div> <!-- /form-actions -->
					
					<?php }
				else { 
				?>
				
				
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Submit</button> 
				</div> <!-- /form-actions -->
				<?php } ?>
				</form>
		    </div> <!-- /spa12 -->
		    
		    
		    
		    
	      	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
    
	</div> <!-- /main-inner -->
	    
</div> <!-- /main -->
    
<?php 

include "footer.php";
?>
