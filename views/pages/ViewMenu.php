	
	<!--
		This page contains the form which is displayed when the menu is being created
		or menu details are to be edited.
	-->
	<?php 
	$_SESSION['page'] = "menu_view";

	if(isset($_GET['msg']))
		echo "<div class='alert alert-warning'><b>".$_GET['msg']."</b></div>";
	if(isset($_GET['errmsg']))
		echo "<div class='alert alert-error'><b>".$_GET['errmsg']."</b></div>";
	
	echo "<div class='alert alert-success'><b>Total ".$count." menus are present in database</b></div>	";
	
	?>
	
	<div class="box box-warning">
                <br/><div class="box-body no-padding table-responsive">
                  <table class="table table-striped">
                    <tbody><tr>
                      <th>ID</th>
                      <th>Menu Name</th>
                      <th>Order</th>
                      <th>Parent ID</th>
                      <th><center><font color="orange"> Access Level</font></center></th>
					  <th><font color="red"> Delete </font></th>
					  <th><font color="green"> Edit </font></th>
					  <th><font color="blue"> View </font></th>
					</tr>
                    
					<?php 
					foreach($details as $menu_item)
					{
						foreach($menu_item as $menu_details)
						{
						?>
						
						<tr>
						  <td><?php echo $menu_details['id']; ?></td>
						  <td><?php echo $menu_details['title']; ?></td>
						  <td><?php echo $menu_details['display_order']; ?></td>
						  <td><?php echo $menu_details['parent_id']; ?></td>
						  <td><center><font color="darkorange">
						  <button type="button" class="btn btn-sm btn-link" data-toggle="modal" data-target="#Modal<?php echo $menu_details['id']; ?>"> <i class="fa fa-paper-plane-o"></i></button></font>
		
		<div id="Modal<?php echo $menu_details['id']; ?>" class="modal ">
        
		<div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Permissions for ' <?php echo $menu_details['title']; ?> '</b></h4>
                  </div>
                  <div class="modal-body table-responsive">
                    <p>
					<div class="box-body">
					<table class="table table-striped">
					<tbody><tr>
                      <th>User Group</th>
                      <th>Create</th>
                      <th>Read</th>
                      <th>Update</th>
                      <th>delete</th>
                    </tr>
					<?php
					$access = json_decode($menu_details['access_level']);
					$right = '<td><font color="green"><i class="fa fa-check"></i></font></td>';
					$wrong = '<td><font color="red"><i class="fa fa-close"></i></font></td>';

					foreach($dpt as $sub)
					{
						
						?>							
						<tr>
						  <td> <?php echo $sub['title'] ?> </td>
						  
						  <?php 
							for ($i = 0; $i <= 3 ; $i++)
							{
								if (in_array($sub['id'], $access[$i]))
									echo $right;
								else
									echo $wrong;
							}
						  ?>
						  
						</tr>
							
						<?php
						
					}
					
					?>
					   </tbody>
            </table>
			 
            </div><!-- /.box-body -->
            
					</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  </div>
                </div><!-- /.modal-content -->
              </div>
            </div>

						</center></td>
						<td>
						<button type="button" data-toggle="modal" data-target="#delModal<?php echo $menu_details['id']; ?>">
						<font color="red"><i class="fa fa-trash"></i></font></button>
						<div id="delModal<?php echo $menu_details['id']; ?>" class="modal fade modal-danger">
						<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title">Delete Menu	</h4>
						</div>
						<div class="modal-body">
						<p>You Are About to Delete Menu : <b><?php echo $menu_details['title']; ?></b> .Do You want to continue?? </p>
						</div>
						<div class="modal-footer">
						<form action="#" method="post" class="del_menu_form" >
						<input type="hidden" name="del_menu_id" class="del_menu_id" value="<?php echo $menu_details['id']; ?>"/>
						<input type="hidden" name="del_menu_name" class="del_menu_name" value="<?php echo $menu_details['title'];?>"/>
						<input type="submit" class="btn btn-outline pull-right" name="del_menu" value="Delete Menu"/>		
				  </form>
					
                 <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
					
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
			</div>
							</td>
							<td>
							<form action="#" method="post" class="edit_menu_form">
								<input type="hidden" name="edit_menu_id" value="<?php echo $menu_details['id']; ?>"/>
								<button type="submit" name="edit_menu" ><font color="green"><i class="fa fa-pencil-square-o"></i></font></button>
							</form>
							</td>
							<td>
							<form action="" method="post" class="form_menu_view">
							<input type="hidden" name="id_view" class="id_view" value="<?php echo $menu_details['id']; ?>">
							<button type="submit" name="view_menu_details" class="view_menu_details"><font color="blue"><i class="fa fa-external-link"></i></font>
							</form>
							</td>
						</tr>
					<?php 
						}
					}
					
					?>			
					</tbody></table>
					 
                </div><!-- /.box-body -->
              </div>
