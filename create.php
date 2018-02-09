
<?php 
session_start();
include "php/admincheck.php";
include "header.php"; 	
?>
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>Your Account</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						
						
						<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li>
						    <a href="#formcontrols" data-toggle="tab">Click to start</a>
						  </li>
						</ul>
						
						<br>
						
							<div class="tab-content">
								<div class="tab-pane" id="formcontrols">
								<form id="edit-profile" class="form-horizontal" action='php/save_form.php' method='post' enctype="multipart/form-data">
									<fieldset>
										
										<div class="control-group">											
											<label class="control-label" for="username" >Exam Created By</label>
											<div class="controls">
												<input type="text" class="span2 disabled" id="username" name="username" value="<?php echo $_SESSION['admin_user'];?>" disabled>
												<p class="help-block">Your username is for logging in and cannot be changed.</p>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="firstname">Exam Name</label>
											<div class="controls">
												<input type="text" class="span2" id="examname" name="examname">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="lastname">Exam Time(minuts)</label>
											<div class="controls">
												<input type="number" class="span2" id="examtime" name="examtime">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="email">Positive Marks For Correct Answer</label>
											<div class="controls">
												<input type="number" class="span2" id="marks" name="marks" >
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label" for="email">Negative Marks For Wrong Answer</label>
											<div class="controls">
												<input type="number" class="span2" id="nmarks" name="nmarks" >
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="password1">Start Time</label>
											<div class="controls">
												<input type="text" class="span2" id="stime" name="stime" >
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="password2">End Time</label>
											<div class="controls">
												<input type="text" class="span4" id="etime" name="etime">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="email">Number of Questions</label>
											<div class="controls">
												<input type="number" onkeyup="loadquestions()" class="span2" id="number" name="number" >
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<div id='questions' style="width:1000px;">
										questions will be displayed here</div>
										<script>
										function loadquestions(){
											var num = document.getElementById('number').value; 
											var all='';
											for( var i=0;i<num;i++){
												
												var all = all +'<div class="control-group"><label class="control-label" for="username" >Question No'+i+': </label><div class="controls"><input type="file" class="span2 disabled" id="qno'+i+' "name="qno'+i+'"></div></div>'
												var all = all+'<div class="control-group"><label class="control-label" for="username" >Answer No '+i+': </label><div class="controls"><input type="text" class="span2 disabled" id="ano'+i+' "name="ano'+i+'"></div></div>'
												document.getElementById('questions').innerHTML = all;
												}
											
											}
										
										</script>
										
                                        	
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Save</button> 
											<button class="btn">Cancel</button>
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
								</div>
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
		    </div> <!-- /span8 -->
	      	
	      	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->

<?php include "footer.php";?>
