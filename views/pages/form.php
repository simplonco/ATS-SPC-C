	
	<!--
		This page contains the form which is displayed when the user is being created
		or user details are to be edited.
	-->
	
	<?php
		$_SESSION['page'] = "create";
	?>
	<html><head><title>Create</title></head>
<?php if(isset($_GET['msg']))
	{
	
	?>

		<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<b><i class="icon fa fa-ban"></i> Error : Entry Not Saved... <?php echo $_GET['msg']; ?></b>
		</div>
	<?php
	} ?>
	<form action="#" id="form" method="post">
        <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Full Name" name="name" id="sign_up_name" value="<?php if($go =="edit" || ($x == 1)) echo $user[0]['name']; ?>">
        <span class="fa fa-smile-o form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
		<input type="email" class="form-control" placeholder="Email" name="mail" id="sign_up_mail" value="<?php if($go =="edit" || ($x == 1))  echo  $user[0]['email']; ?>">
		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		</div>
		<div id="aaa" class="form-group has-feedback">
		<input type="text" class="form-control" placeholder="User Name" name="user" <?php if($go =="edit" ) echo "disabled"; ?> id="sign_up_user" value="<?php if($go =="edit" || ($x == 1)) echo $user[0]['user_name']; ?>">
		<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
		<select class="form-control" placeholder="Department" name="group"  id="sign_up_group">
		<option value = ""> Select Department </option>
		<?php 
		
		
		/* echo "ssssaa";
		print_r($dept_obj) ;
		echo "ssss";
		die; */ 
			
		foreach($dept_obj as $dept_name)
		{
			
			echo "<option value='".$dept_name['id']."' ";
			if($go =="edit" || ($x == 1)) 
			{
				if($dept_name['title'] == $user[2]['title'])
				echo "selected";
			}
			echo " >".$dept_name['title']."</option>";
		}
		?>
		</select>
		</div>
		<div class="input-group">
        <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
		<input type="text" class="form-control" placeholder="Facebook" name="fb" id="sign_up_fb" value="<?php if($go =="edit"  || ($x == 1))  echo $user[1][0]['value'];?>"></span>
        </div><br/>
		<div class="input-group">
        <span class="input-group-addon"><i class="fa fa-github"></i></span>
		<input type="text" class="form-control" placeholder="GitHub" name="git" id="sign_up_git" value="<?php if($go =="edit" || ($x == 1))  echo $user[1][1]['value'];?>"></span>
        </div><br/>
		<div class="input-group">
        <span class="input-group-addon"><i class="fa fa-google"></i></span>
		<input type="text" class="form-control" placeholder="Google+" name="google" id="sign_up_google" value="<?php if($go =="edit" || ($x == 1))  echo $user[1][2]['value'];?>"></span>
        </div><br/>
		<div class="input-group">
        <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
		<input type="text" class="form-control" placeholder="Twitter" name="twitter" id="sign_up_twitter" value="<?php if($go =="edit" || ($x == 1))  echo $user[1][3]['value'];?>"></span>
        </div><br/>
		<div class="input-group">
        <span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
		<input type="text" class="form-control" placeholder="Linked In" name="linkedin" id="sign_up_linked_in" value="<?php if($go =="edit" || ($x == 1))  echo $user[1][4]['value'];?>"></span>
        </div><br/>
		<?php if ($btn == "Create User")
		{ ?>
		<div class="form-group has-feedback">
		<input type="password" class="form-control" placeholder="Password" name="pwd1" id="sign_up_pwd1" >
		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
		<input type="password" class="form-control" placeholder="Re-enter Password" name="pwd2" id="sign_up_pwd2">
		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div><?php } ?>
		<?php if($go =="edit") {
			echo '<input type="hidden" name="edit_id" value="'.$user[0]['id'].'">';
		} ?>
		<div class="row">
		<div class="col-xs-8">
		<div class="checkbox icheck">
		
		</div>
		</div><!-- /.col -->
		<div class="col-xs-12">
		<center><button type="submit" class="btn btn-flat btn-success btn-md" name="submit"  id="sign_up_btn"> 
		<i class="fa fa-edit"></i> <?php echo $btn; ?>  </button></center>
		</div><!-- /.col -->
		</div>
		</form></html>