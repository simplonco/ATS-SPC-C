	
	<!--
		This page contains the form which is displayed when the menu is being created
		or menu details are to be edited.
	-->
	
	<?php 
	$_SESSION['page'] = "menu_create";
	?>
	<form action="#" method="post" id="menu_form">
	
		<div class="box-body">
			
			 <div class="form-group has-feedback">
			 <input class="form-control input-md" type="text" id="menu" name="menu" <?php if($pg == "edit") echo 'value='.$mnu_title; else echo 'placeholder="Enter Title Here"';  ?> >
			</div>
			<div class="form-group has-feedback">
			<select name="order" id="order" class="form-control input-md" type="text">
			<option value="">Select Order for the menu</option>

			<?php 
			for( $i = 1; $i <= $count; $i++)
			{
				echo '<option value="'.$i.'"';
				if($pg == "edit" && $i == $mnu_order) echo "selected";
				echo '>'.$i.'</option>';
			}
			?>
						
			</select>
			</div>
			<div class="form-group has-feedback">
		    <select id="parent" name="parent" class="form-control input-md" type="text">
			<option value="">Select Parent ID</option>
		  
			<?php 
			foreach($parent as $i)
			{
				echo '<option value="'.$i['id'].'" ';
				if($pg == "edit" && $i['id'] == $mnu_parent_id) echo "selected";
				echo '>'.$i['id'].'</option>';
			}
			?>
			
			</select>
			<font color="orange"><b>Suggestion : Select a parent if the new menu is a submenu (Optional)</b></font> 
			</div>
		  
		  <div class="box">
                <div class="box-header">
                  
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-striped">
                    <tbody><tr>
                      <th>User Group</th>
                      <th>All</th>
                      <th>Create</th>
                      <th>Read</th>
                      <th>Update</th>
                      <th>delete</th>
                    </tr>
					<?php 
					foreach($dept as $sub)
					{
						if($sub['title'] != "SuperUser")
						{
						?>
							
						<tr>
						  <td> <?php echo $sub['title'] ?> </td>
						  <td><input type="checkbox" class="checkbox" name="chkbox<?php echo $sub['id']; ?>[]" value="a"> </td>
						  <td><input type="checkbox" class="checkbox" name="chkbox<?php echo $sub['id']; ?>[]" value="c" 
						  <?php 
						  if ($pg == "edit" && in_array($sub['id'], $mnu_access_level[0]))
									echo "checked";
						  ?>
						  > </td>
						  <td><input type="checkbox" class="checkbox" name="chkbox<?php echo $sub['id']; ?>[]" value="r"
						  <?php 
						  if ($pg == "edit" && in_array($sub['id'], $mnu_access_level[1]))
									echo "checked";
						  ?>
						  > </td>
						  <td><input type="checkbox" class="checkbox" name="chkbox<?php echo $sub['id']; ?>[]" value="u"
						  <?php 
						  if ($pg == "edit" && in_array($sub['id'], $mnu_access_level[2]))
									echo "checked";
						  ?>
						  > </td>
						  <td><input type="checkbox" class="checkbox" name="chkbox<?php echo $sub['id']; ?>[]" value="d"
						  <?php 
						  if ($pg == "edit" && in_array($sub['id'], $mnu_access_level[3]))
									echo "checked";
						  ?>
						  > </td>
						</tr>
							
						<?php
						}
					}
					?>
                   
                    </tbody></table>
                </div><!-- /.box-body -->
         </div><!-- /.box-body -->
		 <div id="chk"></div>
		 <center>
		<?php
		if($pg == "edit")
		{
			echo '<input type="hidden" value="'.$mnu_id.'" name="edt_mnu_id"> <button class="btn btn-success margin" id="menu_edit_submit" name="menu_edit_submit"> <i class="fa fa-send"></i> Save Changes </button><button type="Reset" class="btn btn-success margin"> <i class="fa fa-recycle"></i> Rollback to Original </button>';
		}
		else
		{
			echo '<button class="btn btn-info margin" id="menu_submit" name="menu_submit"> <i class="fa fa-send"></i> Save Menu </button><button type="Reset" class="btn btn-info margin"> <i class="fa fa-recycle"></i> Reset All Fields </button>';
		}
		?>
		  
		  </center>
		  </div>
	</form>