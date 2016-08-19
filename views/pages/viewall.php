
	<!--
		This is the view of list of all existing users.
		The  earch results are also displayed through this page.
	-->

	<?php
		$_SESSION['page'] = "viewall";
	?>

<div class="col col-md-4">

<form action="#" method="post" id="form_1">
<div class="input-group" style="width: 200px;">
<select class="form-control input-sm" placeholder="Department" name="group">
	<option value = ""> Select Department </option>
	<?php 

	/* echo "ssssaa";
	print_r($dept_obj) ;
	echo "ssss";
	die; */
	
	foreach($dept_obj as $dept_name)
	echo "<option value='".$dept_name['id']."'>".$dept_name['title']."</option>";
	?>
</select><div class="input-group-btn"><button type="submit" name="group_search" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button></div></div></form></div>
<div class="col col-md-4">
<form action="#" method="post" id="form_2">
<div class="input-group" style="width: 200px;">
<input type="text" name="id" class="form-control input-sm" placeholder="Search By Employee ID"><div class="input-group-btn"><button type="submit" name="id_search" class="btn btn-sm btn-default" name = ""><i class="fa fa-search"></i></button>
</div></div></form></div>
<div class="col col-md-4">
<form action="#" method="post" id="form_3">
<div class="input-group" style="width: 200px;">
<input type="text" name="name" id="name" class="form-control input-sm" placeholder="Search By Employee Name"><div class="input-group-btn"><button type="submit" name="name_search" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
</div></div></form><?php
				
				/*
				$db = $model->db_open();
				if(!empty($group))
					$id_array = $employee->get_emp_id_by_group($db,$group);
				else
				{
					$id_array = $employee->get_emp_id($db);				}
				$num = ceil(count($id_array)/10);
				echo "<center class='pull-right'>";
				for($q = 1 ; $q <= $num; $q++)
				{
					echo "<a href='' class='btn btn-flat btn-default' href='#'>$q</a>";
				}
				echo "</center>"; */
				
				?>
					</div>
<br/>

<br/><br/>
<div><?php
	if(!empty($msg))
	{
	?>
		<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<b><i class="icon fa fa-trash"></i> <?php echo $msg; ?> !!! </b>
		</div>
	<?php
	} else
	if(isset($_GET['msg']))
	{
	
	?>
		<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<b><i class="icon fa fa-ban"></i> <?php echo $_GET['msg']; ?></b>
		</div>
	<?php
	} ?>
		<div class="box">
		<div class="box-header">
		<div class="box-tools">
			
		</div>
		</div><!-- /.box-header -->
		<?php
			if(!empty($user_values))
			{
			
		?>
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tbody>
			<tr>
			  <th>ID</th>
			  <th>User Name</th>
			  <th>Full Name</th>
			  <th>Full Name</th>
			  <th>E-mail Address</th>
			  <th>User Group</th>
			  <th></th>
			</tr>
			<tr>
			<?php foreach($user_values as $user)
			{	 ?>
			
				<td><?php echo $user[0]['id']; ?></td>
				<td>
				<form action="#" method="post" class="view_form">
				<input type="hidden" name="id" value="<?php echo $user[0]['id']; ?>">
				<input type="submit" name="btn" class="btn btn-sm btn-link" value="<?php echo $user[0]['user_name']; ?>"></button>
				</form>			
				</td>
				<td><?php echo $user[0]['name']; ?></td>
				<td><?php echo $user[0]['email']; ?></td>
				<td><?php echo $user[2]['title']; ?></td>
				<td><table><tr><td><form action="#" method="post" class="edit_form">
				<input type="hidden" name="edit_id" value="<?php echo  $user[0]['id']; ?>"/>
				<button type="submit" class="btn btn-sm btn-link" name="edit" ><i class="fa fa-edit"></i></button></form></td><td width="10%"> </td>
				<td><form action="post">
				<input type="hidden" name="del_id" id="del_id" value="<?php echo $user[0]['id']; ?>"/>
				<input type="hidden" name="del_group" id="del_group" value="<?php echo $user[2]['title']; ?>"/>
				<input type="hidden" name="del_name" id="del_name" value="<?php echo $user[0]['user_name']; ?>"/>
				<button type="button" class="btn btn-link btn-sm" name="del" id="del" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i></button></form></td></tr></table>
				</td>
			</tr>
				<?php 
				
		}
			?>	
		  </tbody></table>
		
		<?php
	}
	else
	{
		echo "<font color='red'><center><b>Entry Not Found !!!</b></center></font>";
	} 	
	
		?>
		<div class="box-footer">
			
		  </div></div><!-- /.box-body -->
	  </div>
	
	
<div id="myModal" class="modal fade modal-danger">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Delete User</h4>
                  </div>
                  <div class="modal-body">
                    <p>You Are About to Delete USER : <B><span id="usr"></span></B> . Do You want to continue?? </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <form action="#" method="post" class="del_form">
					<input type="hidden" name="del_modal_id" id="edit_id" value=""/>
					<input type="hidden" name="del_modal_group" id="edit_group" value=""/>
					<input type="submit" class="btn btn-outline pull-right" name="del" value="Delete User">	
					</form>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
</div>