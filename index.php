
<?php 
session_start();
include "php/logincheck.php";
include "header.php"; 
include "php/config.php";
if(isset($_SESSION['normal_user']))
$uname = $_SESSION['normal_user'];
else
$uname = $_SESSION['admin_user'];

?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span8">
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
                    <th>Sno</th>
                    <th>Exam Id</th>
                    <th>Duration</th>
                    <th>StartTime</th>
                    <th>EndTime</th>
                    <th class="td-actions">Start Exam</th>
                    <?php if(isset($_SESSION['admin_user'])) { ?><th>Marks</th><th>Action </th><?PHP } ?>
                    <th>Topper</th>
                  </tr>
                </thead>
                <tbody>
                 <?php 
                 $fetch = mysql_query('select * from exams   where status =1  order by sno desc') or die(mysql_error());
                 while($fetchrow = mysql_fetch_array($fetch)){
                 
                 ?>
                 
                 
                  <tr>
                    <td><?php echo $fetchrow['sno']; 	$sno = $fetchrow['sno'];?></td>
                    <td><?php echo $fetchrow['examname'];?></td>
                    <td><?php echo $fetchrow['examtime'];?></td>
                    <td><?php echo $fetchrow['start_time'];?></td>
                    <td><?php echo $fetchrow['end_time'];?></td>
                    <td class="td-actions">
					
						<?php $q = mysql_fetch_array(mysql_query("select count(*) as cou from logs where examsno='$sno' and username='$uname' ")) or die(mysql_error());
					if($q['cou']>=1) {	?>				<a href="start_exam.php?sno=<?php echo $fetchrow['sno'];?>" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"> </i>Taken</a></td> <?php } else { ?>	
						
						<a href="start_exam.php?sno=<?php echo $fetchrow['sno'];?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i>Start</a></td>
					<?php } ?>
					<?php if(isset($_SESSION['admin_user'])) { ?><td class="td-actions"><a href="view_stats.php?sno=<?php echo $fetchrow['sno'];?>" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"> </i>View</a></td>
					
					<td class="td-actions"><a href="delete.php?sno=<?php echo $fetchrow['sno'];?>" class="btn btn-small btn-danger"><i class="btn-icon-only icon-ok"> </i>Delte</a></td>
					<?PHP } ?>
                  
                  
                  <?php $high = mysql_fetch_array(mysql_query("select max(marks) as m,username from logs where examsno ='$sno' "))or die(mysql_error());
                  $highest = $high['m'];
                  $highid = mysql_query("select username from logs where examsno ='$sno' and marks='$highest' ")or die(mysql_error());
                  
                  ?>
					  
                  <td style="color:blue">  
                  Marks: <?php echo $high['m'];
                  while($id= mysql_fetch_array($highid))
                   echo "<br>ID : ".$id['username'];?>
                 
                  </td>
                  
                  </tr>

                  <?php }?>
                  
                </tbody>
              </table>
              
            </div>
            
            <!-- /widget-content --> 
          </div>
          
          
          </div>
          
          <!-- /widget --> 
        </div>
        <!-- /span6 -->
        <div class="span4">
          <div class="widget widget-nopad">
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Your Performance</h3>
            </div>
            <!-- /widget-header -->
            
            
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Sno</th>
                    <th>Exam Name</th>
                    <th>Marks</th>
                  </tr>
                </thead>
                <tbody>
                 <?php 
                 $fetch = mysql_query("select * from logs where username='$uname' ") or die(mysql_error());
                 while($fetchrow = mysql_fetch_array($fetch)){
                 
                 ?>
                 
                 
                  <tr>
                    <td><?php echo $fetchrow['sno'];?></td>
                    <td><?php echo $fetchrow['examsno'];?></td>
                    <td><?php echo $fetchrow['marks'];?></td>
                    </tr>

                  <?php }?>
                </tbody>
              </table>
              
            </div>
            
            <!-- /widget-content --> 
          </div>
          
          
          </div>
          
          <!-- /widget --> 
        </div>
        <!-- /span6 -->
        
        
         
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
  <br><br><br><br><br><br><br>
</div>
<!-- /main -->
<?php include "footer.php";?> 
