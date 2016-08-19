	<!--
		This page is the view responsible for showing the details of a particular user.
		The user details, update and delete buttons are renered from this page.
	-->
	

	<?php
		
		$_SESSION['page'] = "view_menu_details";
		$_SESSION['menu'] = $menu_data;
		if(empty($menu_data))
		{
			$menu_data = $_SESSION['menu'];
		}
	?>
	
	<table width="100%">
	<tr width="100%">	
	<td width="20%"></td>
	<td width="20%">

	<form action="#" method="post" class="edit_menu_form">
	<input type="hidden" name="edit_menu_id" value="<?php echo $menu_data[0]['id']; ?>"/>
	<input type="submit" class="btn btn-block btn-info btn-sm" name="edit_menu" value="Edit Details">	
	</form></td>
	<td width="20%"></td>
	<td width="20%"><button type="button" class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#Modal">Delete Menu</button>
	<div id="Modal" class="modal fade modal-danger">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Delete Menu	</h4>
                  </div>
                  <div class="modal-body">
                    <p>You Are About to Delete Menu : <b><?php echo $menu_data[0]['title']; ?></b> .Do You want to continue?? </p>
                  </div>
                  <div class="modal-footer">
                  <form action="#" method="post" class="del_menu_form" >
					<input type="hidden" name="del_menu_id" class="del_menu_id" value="<?php echo $menu_data[0]['id']; ?>"/>
					<input type="hidden" name="del_menu_name" class="del_menu_name" value="<?php echo $menu_data[0]['title'];?>"/>
					<input type="submit" class="btn btn-outline pull-right" name="del_menu" value="Delete Menu"/>				
				  </form>
					
                 <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
					
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
	</div>
		</td>
	<td width="20%"></td>
	</tr></table><br/>
	    <div class="box">
		<div class="box-header with-border">
              <h3 class="box-title">Menu Details</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
            <?php
				//print_r($menu_data);
			?>
                  <table class="table table-striped">
                    <tr>
                      <td>Menu ID</td>
                      <td>
                       <?php echo $menu_data[0]['id']; ?>
                      </td>
                    </tr>
                    <tr>
                    <td>Menu Title</td>
                      <td>
                        <?php echo $menu_data[0]['title']; ?>
                      </td>
                    </tr>
                    <tr>
                     
                      <td>Display Order</td>
                      <td>
                        <?php echo $menu_data[0]['display_order']; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Parent ID</td>
                      <td>
                        <?php echo $menu_data[0]['parent_id']; ?>
                      </td>
                    </tr>
                    
                  </table>
                
            </div><!-- /.box-body -->
            
          </div>
		  <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Group Permissions For the menu</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
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
					$access = json_decode($menu_data[0]['access_level']);
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
            
          </div>