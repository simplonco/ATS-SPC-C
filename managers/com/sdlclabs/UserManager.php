<?php

require_once('/models/com/sdlclabs/UserModel.php');

/**
* This is the controller class for user related tasks
* The UserManager class fetches data from the model...and renders it to view
*
* 
*
*/

class UserManager
{
	private $model = NULL;
	private $session = NULL;
	private $employee = NULL;
	
	
	/**
	* 
	* This is the constructor which create objects of all model classes
	* on initinalization.
	*
	*/
	public function __CONSTRUCT()
	{
		$this->model = new UserModel();
		$this->session = new Session();
		$this->employee = new User();
	}
	
	/**
	* 
	* The function redirect takes a single parameter which is relative path a file 
	* and redirects to the file when called.
	* It do not return any value.
	*
	*/
	public function redirect($location) 
	{
        header('Location: '.$location);
    }
	
	/**
	* 
	* This is the function which is always called when any user related tasks is to be performed 
	* it checks for what to be done and call the specific function to perform the task.
	*
	* Before performing any task,it checks whether a user is logged in or not.
	* If yes,it performs the task otherwise redirects the user to login page.
	*
	*/
	public function handle()
	{
		$next = isset($_GET['page']) ? $_GET['page'] : NULL ;
		try
		{
			if($next == '' || $next == 'unauthorized')
			{
				$this -> index_page();
			}
			else if($next == 'page')
			{
				echo $_SESSION['page'];
			}
			else if($next == 'check')
			{
				$user_name = mysql_real_escape_string($_POST['username']); 
				$db = $this->model->db_open();
				$duplicate = $this->employee->is_available_user_name($db,$user_name);
				$db = $this->model->db_close($db);
				echo $duplicate;
				
			}else if($next == 'edit')
			{
				$id = $_POST['edit_id'];
				$this->update_contact($id);
			}
			else if($next == 'view_menu')
			{
				include ('/../../../views/pages/ViewMenu.php');
			}
			else if($next == 'create')
			{
				$x = 0;
				if(isset($_POST['edit_id']))
				{
					$go = "edit";
					$id = $_POST['edit_id'];
					$msg= "";
					$db = $this->model->db_open();
					$x=0;
					$user = null;
					$user = $this->employee->ViewUser($db,$id,$msg);
					
					$db = $this->model->db_close($db);
					
					//$edit = $manager->view_contact_by_id($id,$msg);
					$btn ="Save Changes";
				}
				else
				if(!empty($_SESSION['create_user_array']))
				{
					$x= 1;
					$user = $_SESSION['create_user_array'];
					$go ="save";
					$btn = "Create User";
					//print_r($user); die;
				}
				else
				{	$go ="save";
					$btn = "Create User";
					$user = array ();
				}
				$dept_obj = $this->getGroupTitle();
				
				include ('/../../../views/pages/form.php');
			}
			else if($next == 'create_menu')
			{
				$x = 0;
				if(isset($_POST['edit_id']))
				{
					$go = "edit";
					$id = $_POST['edit_id'];
					$msg= "";
					$db = $this->model->db_open();
					$x=0;
					$user = null;
					$user = $this->employee->ViewUser($db,$id,$msg);
					
					$db = $this->model->db_close($db);
					
					//$edit = $manager->view_contact_by_id($id,$msg);
					$btn ="Save Changes";
				}
				else
				if(!empty($_SESSION['create_user_array']))
				{
					$x= 1;
					$user = $_SESSION['create_user_array'];
					$go ="save";
					$btn = "Create User";
					//print_r($user); die;
				}
				else
				{	$go ="save";
					$btn = "Create User";
					$user = array ();
				}
				$dept_obj = $this->getGroupTitle();
				
				include ('/../../../views/pages/CreateMenu.php');
			}
			else if($next == 'delete')
			{
				
				if(isset($_POST['del_modal_id']))
				{
					$id = $_POST['del_modal_id'];
				}
				if(isset($_POST['del_modal_group']))
				{
					if($_POST['del_modal_group'] === "SuperUser")
						$msg = "You Cannot Delete SuperUser.First change the Department.";
					else
					{
						$msg = "You Have successfully deleted a user ";
						$del = $this->delete_contact($id);
					}	
				}
						
				/* echo "***";
				print_r($del);
				echo "***";
				die; */
				
				
				$this->redirect('user.php?page=view_all&msg='.$msg);
			}
			else if($next == 'save')
			{
				$msg = $this->create_contact(null);
				
				if(is_numeric($msg))
				{
					$id = $msg;
					$msg ="User Added Successfully !!!";
					$_SESSION['create_user_array'] = null;
					$this->view_contact_by_id($id,$msg);
				}	
				else
				{
					$this->redirect('user.php?page=create&msg='.$msg);
				}
			}	
			else if($next == 'view_all')
			{
				
				$this->view_contacts();
				
			}	
			else if($next == 'view')
			{
				if(isset($_POST['id']))
				{
					$id = $_POST['id'];
				}	
				else
					$id = $_SESSION['u'][0]['id'];
				$msg = "";
				$this->view_contact_by_id($id,$msg);
			}
			else
				$this->showError("Page <b>".$next."</b> was not Found !! ");
		}
		catch(Exception $e)
		{
            $this->showError("Application Error",$e->getMessage());
		}
		
	}
	
	/**
	* 
	* any input causing a exception which create an error to occur
	* This function shows the error occured.
	*
	*/
	public function showError($msg)
	{
		echo $msg;
	}
	
	/**
	* 
	* the view_contact_by_id function is for viewing details of a particular  user
	* It requires 2 parameters for functioning which are user_id and message
	*
	* where message is NULL in case of directly viewing the user details
	* but it you are redirected to view page after creation or updation of user,
	* it displays the regarding text.
	*
	*/
	public function view_contact_by_id($id,$msg)
	{
		$db = $this->model->db_open();
		$array_user = $this->employee->ViewUser($db,$id,$msg);
		$db = $this->model->db_close($db);
		if(!empty($msg))
		{
			?>
			<div class="alert alert-warning	 alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<b><?php echo $msg; ?></b>
			</div>
			<?php
		}
		include('/../../../views/pages/view.php');
	}
	
	/**
	* 
	* the view_contacts function is for viewing a complete list of users
	* It do not require any parameter for functioning
	*
	* It is also for showing the search results on employee e.g. all employees from a specific department
	*
	*/
	
	public function view_contacts()
	{

		$dept_obj = $this->getGroupTitle();
		if(isset($_POST['group']))
		{
			$group = $_POST['group'];
			$db = $this->model->db_open();
			if(!empty($group))
				$id_array = $this->employee->get_emp_id_by_group($db,$group);
			else
			{
				$id_array = $this->employee->get_emp_id($db);		
			}
			$db = $this->model->db_close($db);
		}
		else if(isset($_POST['id']))
		{
			$id = $_POST['id'];
			$db = $this->model->db_open();
			if(!empty($id))
				$id_array = $this->employee->get_emp_id_by_id($db,$id);
			else
				$id_array = $this->employee->get_emp_id($db);
			$db = $this->model->db_close($db);
		}
		else if(isset($_POST['name']))
		{
			$name = $_POST['name'];
			$db = $this->model->db_open();
			if(!empty($name))
				$id_array = $this->employee->get_emp_id_by_name($db,$name);
			else
				$id_array = $this->employee->get_emp_id($db);
			$db = $this->model->db_close($db);
		}
		else
		{
			$db = $this->model->db_open();
			$id_array = $this->employee->get_emp_id($db);
			$db = $this->model->db_close($db);
		}
		$user_values = array();
		if(!empty($id_array))
		{
			foreach($id_array as $id)
			{
				$db = $this->model->db_open();
				if(!empty($id['user_id']))
				$i = $id['user_id'];
				else
				$i = $id['id'];	
				array_push($user_values,$this->employee->ViewUser($db,$i,""));
				
				$db = $this->model->db_close($db);
			}
		}
		include('/../../../views/pages/viewall.php');
	}
	
	/**
	*
	* delete_contact function takes a single parameter which is user_id 
	* Its function is to delete user details from the database.
	* It returns the number of affected rows.
	*
	*/
	public function delete_contact($id)
	{
		$db = $this->model->db_open();
		$result = $this->employee->deleteUser($db,$id);
		$db = $this->model->db_close($db);
		return $result;
	}

	/**
	*
	* This function updates the details of existing users.
	* It requires an argument which is user_id.
	* 
	*/
	public function update_contact($id)
	{
		
		$msg = $this->create_contact($id);
		if(is_numeric($msg))
		{
			$id = $msg;
			$msg = "Successfully updated values";
			$user = $this->view_contact_by_id($id,$msg);
		}	
		else
		{
			$this->redirect('user.php?page=view&msg='.$msg);
		}
	}
	
	/**
	*
	* create_contact fuction takes single argument.
	* Function - It either creates or deletes a user.
	* the argument is passed as NULL when new user is to be added
	* the user id is passed if user details are to be edited.
	*
	* All the server side validations are implemented for adding or editing user details here.
	*
	*/
	public function create_contact($id)
	{
	$name = $_POST['name'];
	$mail = $_POST['mail'];
	if(!empty($_POST['user']))
		$user_name = $_POST['user'];
	else
		$user_name = "s";
	$group = $_POST['group'];
	$social =  array( "facebook/".$_POST['fb'],"github/".$_POST['git'],"google/".$_POST['google'],"twitter/".$_POST['twitter'],"linkedin/" .$_POST['linkedin'],
	);
	$social_edited = array();
	$x = 0;
	foreach($social as $social_sites)
	{
		$social_sites = explode("/", $social_sites);
		$social_edited[$x] = array ('profile_key'=>$social_sites[0],'value'=>$social_sites[1]);
		$x++;
	}
	$_SESSION['create_user_array'] = array(array('user_name'=>$user_name,'email'=>$mail,'name'=>$name),$social_edited,array('title'=>$group));
	
	if($id == null)
	{
		$pass1 = $_POST['pwd1'];
		$pass2 = $_POST['pwd2'];
		if(empty($pass1) || empty($pass2))
		{
			$msg = "Please Fill All Fields !!!" ;
			return $msg;
		}
	}
	//include('views/home.php');	
	
	if(empty($name) || empty($mail) || empty($user_name) || empty($group) )
	{
		$msg = "Please Fill All Fields !!!" ;
		return $msg;
	}
	else if(!preg_match("/^[a-zA-Z ]*$/",$name))
	{
		$msg = "Please Enter A Valid Name Containing characters and spaces only!!!";
		return $msg; 
	} 
	else if(!preg_match("/^[a-zA-Z0-9.]*$/",$user_name))
	{
		$msg = "Please Enter a Valid User Name.Use Digits,Dot(.) and characters only..(No Spaces) !!!";
		return $msg; 
	}
	else 
	if($id == null)
	{
		if(strlen($pass1)<6)
		{
			$msg = "Please Enter a Strong Password with minimum length of 6";
			return $msg; 
		}
		else if($pass1 != $pass2)
		{
			$msg = "Both Passwords Don't Match !!!" ;
			return $msg;
		}
	}
	$db = $this->model->db_open();
	$duplicate = $this->employee->is_available_user_name($db,$user_name);
	$db = $this->model->db_close($db);
	if($duplicate && $id==null)
	{
		$msg = "User Name taken ... Please try with different user name !!!" ;
		return $msg;
	}
	
		$db = $this->model->db_open();
		if ($id == "")
		{
			$new_user = $this->employee->addUser($db,$name,$mail,$user_name,$group,$pass1,$social);
		}
		else
		{
		/*print_r($social);
		die;*/
		$new_user = $this->employee->editUser($db,$id,$name,$mail,$group,$social);
		}
		$db = $this->model->db_close($db);
		
		return $new_user;
	
	}
	
	/**
	* 
	* the function getGroupTitle fetches all existing group's details from model
	* It returns the assciative array of department details.
	*
	*/

	public function getGroupTitle()
	{
		$db = $this->model->db_open();
		$departments = $this->model->getAllUserGroupsTitle($db);
		$db = $this->model->db_close($db);
		return $departments;
	}
	
	/**
	* 
	* function test simply takes a variable and return its value.It only tests what a variable contains 
	*
	*/

	public function test($msg)
	{
		return $msg;
	}
	
	/**
	* 
	* The function index_page is called when user tries to login
	* It checks for all the login validations and then authenticate user.
	* If user is authorized then it allows it to continue to site otherwise 
	* displays error.
	*
	*/
	public function index_page()
	{
		
		if(isset($_POST['submit']))
		{
			$user = $_POST['user'];
			$password = $_POST['pwd'];
			if(empty($user) || empty($password))
			{
				$this->redirect('index.php?color=red&msg=Please Fill Both Fields To Continue');
			}
			else
			{
				$db = $this->model->db_open();
				
				$user = $this->employee->is_employee($db,$user,$password);
				
				if(empty($user))
				{
					$this->redirect('index.php?color=brown&msg=Wrong Credentials');
				}
				else
				{
					$id = $user['id'];
					$this->session->session_set($id);
				}
				
				$db = $this->model->db_close($db);
			}
		}

		/*
		if($this->session->session_validate() == false)
			include('views/login.php');
		else
		{	
			//echo $_SESSION['user'];
			include('views/home.php');
		}
		*/
	}
}
?>