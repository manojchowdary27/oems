<?php 
session_start();
include "header.php";
include "php/config.php";
if(!isset($_SESSION['admin_user'])) header("location:index.php");
$sno = mysql_real_escape_string(trim($_GET['sno']));
$examdetails = mysql_fetch_array(mysql_query("select * from exams where sno = '$sno' ")) or die(mysql_error());
$questions = $examdetails['questions'];
$questions = split('~',$questions);
$_SESSION['sno'] = $examdetails['sno'];
$uname = $_SESSION['admin_user'];
?>   
    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
    	<div class="row">
    	<div class="span12">
						
				<div class="widget widget-plain">
				</div> <!-- /widget -->
				<div class="widget widget-nopad">
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Available Exams</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
					  
                    <th>Rank</th>
                    <th>Idnumber</th>
                    <th>Marks</th>
                    <th>Time</th>
                    <th>IP</th>
                    
                  </tr>
                </thead>
                <tbody>
                 <?php 
                 $i=0;
                 $fetch = mysql_query("select * from logs where examsno='$sno' order by marks desc " ) or die(mysql_error());
                 while($fetchrow = mysql_fetch_array($fetch)){
                 $i++;
                 ?>
                 
                 
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $fetchrow['username'];?></td>
                    <td><?php echo $fetchrow['marks'];?></td>
                    <td><?php echo $fetchrow['time'];?></td>
                    <td><?php echo $fetchrow['ip'];?></td>
                    </tr>

                  <?php }?>
                </tbody>
              </table>
              
            </div>
            
            <!-- /widget-content --> 
          </div>
          
          
          </div>
          
          <!-- /widget -->
				
				
			</div> <!-- /span12 -->
         </div>	
    
	      <div class="row">
	      	
	      	<div class="span12">
	      		
	      		<div class="widget">		
					
		    </div> <!-- /spa12 -->
		    
		    
		    
		    
	      	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
    
	</div> <!-- /main-inner -->
	    
</div> <!-- /main -->
    
<?php 

include "footer.php";
?>
