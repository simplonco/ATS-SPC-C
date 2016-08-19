<?php

require_once('/models/com/sdlclabs/MenuModel.php');

/**
* This is the controller class for user related tasks
* The UserManager class fetches data from the model...and renders it to view
*
* 
*
*/

class MenuManager
{
	private $model = NULL;
	private $session = NULL;
		
	/**
	* 
	* This is the constructor which create objects of all model classes
	* on initinalization.
	*
	*/
	public function __CONSTRUCT()
	{
		$this->model = new MenuModel();
		$this->session = new Session();
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
	public function handle_menu()
	{
		$next = isset($_GET['page']) ? $_GET['page'] : NULL ;
		try
		{
			if($next == '' || $next == 'unauthorized')
			{
				$this -> index_page();
			}
			
		else if($next == 'create_menu' || $next == 'edit_menu_form')
			{
				if($next == 'edit_menu_form')
				{
					$pg = "edit";
					$id= $_REQUEST['edit_menu_id'];
					$db = $this->model->db_open();
					$menu_data = $this->model->viewMenus($db,$id);
					$db = $this->model->db_close($db);
					$mnu_id = $menu_data[0]['id'];
					$mnu_title = $menu_data[0]['title'];
					$mnu_order = $menu_data[0]['display_order'];
					$mnu_parent_id = $menu_data[0]['parent_id'];
					$mnu_access_level = json_decode($menu_data[0]['access_level']);
				}
				else $pg = "create";
				$x = 0;
				
				$db = $this->model->db_open();
				$parent = $this->model->allMenus($db);
				$double = $db->prepare('select max(display_order) from tbl_menus');
				$double->execute();
				$count = $double->fetchAll(PDO::FETCH_ASSOC);
				$count = $count[0]['max(display_order)'];
				$db = $this->model->db_close($db);
				$dept = $this->getGroupTitle();
				if(isset($_POST['menu']) || isset($_POST['menu_edit_submit']))
				{
					$menu = $_POST['menu'];
					$order = $_POST['order'];
					$parent_id = $_POST['parent'];
					
					$all = $this->model->jsonPermission($_REQUEST,$dept);
					
					$check = $this->model->validateMenu($menu,$order);		
					if($check)
					{
						$db = $this->model->db_open();
						if(!isset($_POST['edt_mnu_id']))
						{
							$menu = $this->model->createMenu($db,$menu,$order,$parent_id,$all);
							$msg = "Menu ".$menu." added successfully !!";
						}
						else
						{
							$mn_id = $_POST['edt_mnu_id'];
							$menu = $this->model->editMenu($db,$mn_id,$menu,$order,$parent_id,$all);
							$msg = "Menu ".$menu." Edited successfully !!";
							echo $menu;
						}
						if($menu)
						{
							$this->redirect('menu.php?page=view_menu&msg='.$msg);
							
						}
						$db = $this->model->db_close($db);
					}
					else
					{
						echo "<div class='alert alert-error'><b>Don't Leave Blanks. This menu is not saved.</b></div>	";
						include ('/../../../views/pages/CreateMenu.php');

					}
				}
				else
				include ('/../../../views/pages/CreateMenu.php');
			}
			else if($next == 'view_menu')
			{
				$count = $this->totalMenus();
				$db = $this->model->db_open();
				$menu = $this->model->allMenus($db);
				$db = $this->model->db_close($db);
				$details = array();
				foreach($menu as $id)
				{
					$db = $this->model->db_open();
					$menu_data = $this->model->viewMenus($db,$id['id']);
					$db = $this->model->db_close($db);
					array_push($details,$menu_data);
				}
				$db = $this->model->db_open();
				$dpt = $this->getGroupTitle();
				$db = $this->model->db_close($db);
				$arr = array();
				foreach($dpt as $d)
				{
					$arr[$d['id']] = $d['title'];
				}
				
				include ('/../../../views/pages/ViewMenu.php');
			}
			else
			if($next == 'form_menu_view')
			{
				if(isset($_REQUEST['id_view']))
					$id = $_REQUEST['id_view'];
				else 
					$id = NULL;
				if(empty($id))
				{
					$menu_data = NULL;
					if(!empty($_SESSION['menu']))
						$menu_data = $_SESSION['menu'];
				}
				else
				{
					$db = $this->model->db_open();
					$menu_data = $this->model->viewMenus($db,$id);
					$db = $this->model->db_close($db);
				}
				if($menu_data)
				{
					$db = $this->model->db_open();
					$dpt = $this->getGroupTitle();
					$db = $this->model->db_close($db);
					$arr = array();
					foreach($dpt as $d)
					{
						$arr[$d['id']] = $d['title'];
					}
					include ('/../../../views/pages/ViewMenuDetails.php');
				}
				else
				$this->showError(" No Such User Exists !! Something Went Wrong.");
			}
			else if($next == 'del_menu_form')
			{
				if(isset($_REQUEST['del_menu_id']))
				{
					$id = $_REQUEST['del_menu_id'];
					$db = $this->model->db_open();
					$isParent = $this->model->haveSubmenus($db,$id);
					$db = $this->model->db_close($db);
					
					if($isParent)	
					{
						$msg = "This menu contains submenus.Please Delete submenus first.";
						$this->redirect('menu.php?page=view_menu&errmsg='.$msg);
					}	
					else
					{
						$db = $this->model->db_open();
						$msg = $this->model->deleteMenu($db,$id);
						$db = $this->model->db_close($db);
						$this->redirect('menu.php?page=view_menu&msg='.$msg);
					}	
				}
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
	
	/**
	* 
	* the Function totalMenus returns the total number of menus which are present in the
	* database in this time
	* 
	*/
	public function totalMenus()
	{
		$db = $this->model->db_open();
		$total = $this->model->countMenus($db);
		$db = $this->model->db_close($db);
		return $total;
	}
}
?>