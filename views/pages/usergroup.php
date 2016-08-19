<!DOCTYPE html>


<html>

 

<body>
<p align="right">
		
			
		<button type="button"  id="createid" class="btn btn-info" data-toggle="modal" data-target="#myModal">Create</button>

		  
		  </p>
	 <form method="post" action="#" id="frmid">
		   
<?php

					  $_SESSION['page'] = "user-grp-id";
					if(!empty($errormsg))
						echo '<div class="timer alert alert-dismissable alert-warning" > <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>'.$errormsg.'</b></div>'; 

					if(!empty($successmsg))
							echo '<div class="timer alert alert-dismissable alert-success" > <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>'.$successmsg.'</b></div>';
						
					if(!empty($errormsg1))
						{
							$errormsg1 = substr($errormsg1,0,strlen($errormsg1)-2);
							echo '<div class="timer alert alert-dismissable alert-warning" > <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>'.$errormsg1.' cant be deleted as it contains some users</b></div>'; 

						}
					
					if(!empty($deletemsg))
					{
						
					  $deletemsg =trim(trim($deletemsg),",");

					}	
					if(!empty($deletemsg))
					{   $deletemsg = substr($deletemsg,0,strlen($deletemsg)-2);
						echo '<div class="timer alert alert-dismissable alert-success" > <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>'.$deletemsg.' deleted successfully!!</b></div>'; 
						}
					
?>
		  
		  <div class="box">
		  
			<div class="box-body no-padding">
				
				 <table class="table table-striped" id="manage_group_table">
                    <tbody><tr>
					
                      <th style="width: 10px"><input type="checkbox" id="select_all"/></th>
                      <th>User Groups</th>
					  <th></th>
                      <th style="width: 40px"></th>
                     
                    </tr>
                    
					
					<?php
					
					$res=$response;
				
					
					$num=0;
					while($row=mysqli_fetch_assoc($res)){
						?>
						
						<tr id="<?php echo 'row_'.$row['id']; ?>">
						<td>
						<input type="checkbox" class="checkbox12" id="<?php echo $row['id'];?>" name="chkbox[]" value="<?php echo $row['id'];?>">
						</td>
						
						<td>
						<!--<input type="text" id="txt_id_no_<?php echo $num; ?>"  name="txt" class="input_cls" value="<?php echo $row['title'];?>" disabled="disabled"></br> 
						-->
						<?php echo $row['title'];?>
						
						</td>
					
						
						<td>					
						<!--<a id="p" href="index.php?type=show" ><span style="color:red;">edit</span></a>-->
						
						<!--<a href="javascript:void(0);" onclick='editjs("<?php echo $row['id'];?>","<?php echo $row['title'];?>");'><i class="fa fa-edit"></i></a>-->
						
						<a href="javascript:void(0);" class="edit-me" data="<?php echo $row['id'].'|||'.$row['title'];?>"><i class="fa fa-edit"></i></a>
						
						<!--<button type="button" id="edit_btn_no_<?php echo $num; ?>" onclick="calljs('<?php echo $num; ?>','<?php echo $row['id'];?>');"  class="btn btn-default" name="edit">Edit</button> -->
						</td>
						
						<td>
	

						<a href="javascript:void(0);" onclick="deletejs('<?php echo $row['id'];?>');"><i class="fa fa-trash"></i></a>
						</td>
						
						</tr>
						
						
						<?php
						$num++;
					}
				
					?>
				  
                  </tbody></table>
                </div>
				
				</div>
				<p align="left">
					<button type="button" id="delbtn" style="display:none;"  class="btn btn-danger"  onclick="delchkbox();" name="delete">Delete</button>
				</p>
		  
		  </form>
		  
		  
		 
		 <div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
	  <div class="form-group">
	  <form action="#" id="modalform" method="POST">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add New Group</h4>
         </div>
         <div class="modal-body">
            
               <label for="inputEmail3" class="col-sm-2 control-label">Name :</label>
               <input type="text" class="form-control" name="cntxt"  id="inputtext" placeholder="Enter Group Name" >
            <div id="create-status"></div>
			
         </div>
         <div class="modal-footer">
            <button type="button" id="dismissbtn" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button id="sve" type="submit" onclick="createjs();"  class="btn btn-primary">Save </button>
         </div>
		 </form>
      </div>
   </div></div>
</div>  
		  
		  
		  
		  <div id="register-modal" class="modal fade" >
			
				<div class="modal-dialog">
					<div class="modal-content">
						  <form action="#" id="modalform2" method="POST">
						<div class="form-group">

						<div class="modal-header">
							<button type="button" id="closeid" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title">Enter new name</h4>
						</div>
						<div class="modal-body">
							<input type="text" class="form-control" name="edittxt" id="edittext"  >
							<div id="edit-status"></div>
							</div>
						
						<div class="modal-footer">
							
							<button type="submit" id="editmodal" onclick="editdata();"  class="btn btn-primary">Save changes</button>
							
						</div>
						</div>
						</form>
					</div>
				</div>
            </div> 
			
		

		
</body>
</html>