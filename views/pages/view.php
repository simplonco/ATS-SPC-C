	<!--
		This page is the view responsible for showing the details of a particular user.
		The user details, update and delete buttons are renered from this page.
	-->

	<?php
		
		$_SESSION['page'] = "view_form";
		$_SESSION['u'] = $array_user;
		if(empty($array_user))
		{
			$array_user = $_SESSION['u'];
		}
	?>
	
	<table width="100%">
	<tr width="100%">	
	<td width="20%"></td>
	<td width="20%">

	<form action="#" method="post" class="edit_form">
	<input type="hidden" name="edit_id" value="<?php echo $array_user[0]['id']; ?>"/>
	<input type="submit" class="btn btn-block btn-info btn-sm" name="edit" value="Edit Details">	
	</form></td>
	<td width="20%"></td>
	<td width="20%"><button type="button" class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#Modal">Delete User</button>
	<div id="Modal" class="modal fade modal-danger">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Delete User</h4>
                  </div>
                  <div class="modal-body">
                    <p>You Are About to Delete USER : <b><?php echo $array_user[0]['user_name']; ?></b> .Do You want to continue?? </p>
                  </div>
                  <div class="modal-footer">
                  <form action="#" method="post" class="del_form" id="frm">
					<input type="hidden" name="del_modal_id" id="edit_id" value="<?php echo $array_user[0]['id']; ?>"/>
					<input type="hidden" name="del_modal_group" id="edit_group" value="<?php echo $array_user[2]['title'];?>"/>
					<input type="submit" class="btn btn-outline pull-right" name="del" value="Delete User"/>				
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
              <h3 class="box-title">General Details</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
            <?php
				//print_r($array_user);
			?>
                  <table class="table table-striped">
                    <tr>
                      <td>Employee ID</td>
                      <td>
                       <?php echo $array_user[0]['id']; ?>
                      </td>
                    </tr>
                    <tr>
                    <td>Full Name</td>
                      <td>
                        <?php echo $array_user[0]['name']; ?>
                      </td>
                    </tr>
                    <tr>
                     
                      <td>User Name</td>
                      <td>
                        <?php echo $array_user[0]['user_name']; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Email ID</td>
                      <td>
                        <?php echo $array_user[0]['email']; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>USer Group</td>
                      <td>
                        <?php echo $array_user[2]['title']; ?>
                      </td>
                    </tr>
                  </table>
                
            </div><!-- /.box-body -->
            
          </div>
		  <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Social Profile Details</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
             <table class="table table-striped">
                <?php
				if(!empty($array_user[1]))
				foreach ($array_user[1] as $social)
				{	if(!empty($social['value']))
					{
				?>
                <tr>
				<td><i class="fa btn btn-<?php echo $social['profile_key']; ?>  fa-<?php echo $social['profile_key']; ?>"></i> 
                  </td><th><?php echo($social['profile_key']); ?></th>
                <td><?php echo($social['value']); ?></td>
                </tr>
                <?php 
					}}
				?>
            </table>
			 
            </div><!-- /.box-body -->
            
          </div>