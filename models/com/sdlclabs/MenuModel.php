<?php

/**
* This model is for managing the user related tasks.
* The model contains 3 classes - which are UserModel,Session and User.
*
* UserModel class is responsible for establishing and ending the database 
* connections and also finding out the existing groups.
*
* Session class manages all the session related activitied like session variables,log in and log outs.
*
* User class contains all the functions related to users like adding,deleting,editing and fetching details about them.
*
* @author     Shivanshi Srivastava
* @version    1.0
* @project	  EMS
* 
*/

class MenuModel
{
	
	/**
	* The function 'db_open' sets a PDO connenction to the Database 'ems'.
	* It returns a PDO object with establishing the connection.
	* 
	*/
	public function db_open()
	{
		try 
		{
			$db = new PDO('mysql:host=localhost;dbname=ems','root','');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $db;
		}
		catch(PDOException $e)	{ throw new PDOException($e->getMessage());	}
	
	}
	
	/**
	* The function 'db_close' ends the PDO connenction.
	* It takes the DB connection object and returns the same after ending the connection 
	* and setting the value of connection object to NULL.
	*/
	public function db_close($db)
	{
		$db = NULL;
		return $db;
	}
	/**
	* The function 'getAllUserGroupsTitle' returns associated array containing 'title' and 'id' of all existing departments.
	* It takes the DB Connection object as its parameter.
	* 
	*/
	public function getAllUserGroupsTitle($db)
	{
		$emp = $db->prepare('select * from tbl_users_groups');
		$emp->execute();
		$result = $emp->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	/**
	*
	* The function 'countMenus' takes PDO DB Connection object as input
	* It counts the totak number of menus in the database
	* and returns the menu count.
	*
	*/
	public function countMenus($db)
	{
		$count = $db->prepare('select count(*) from tbl_menus');
		$count->execute();
		$result = $count->fetchAll(PDO::FETCH_ASSOC);
		return $result[0]['count(*)'];
	}
	public function allMenus($db)
	{
		$menu = $db->prepare('select id from tbl_menus ORDER BY display_order');
		$menu->execute();
		$result = $menu->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	public function validateMenu($menu,$order)
	{
		if(empty($menu) || empty($order))	
			return false;
		else
			return true;
	}
	public function haveSubmenus($db,$id)
	{
		$submenu = $db->prepare('select count(*) from tbl_menus where parent_id ='.$id);
		$submenu->execute();
		$sub = $submenu->fetchAll(PDO::FETCH_ASSOC);
		if($sub[0]['count(*)'] > 0 )
			return true;
		else
			return false;
	}
	public function deleteMenu($db,$id)
	{
		$del_menu = $db->prepare("DELETE FROM tbl_menus where id=".$id);
		$del_menu->execute();
		if($del_menu->rowCount())
			$msg = "You Have successfully deleted a menu";
		else 
			$msg = "Something Went Wromg.Menu was not deleted.";
		return $msg;
	}
	public function manageOrder($db,$order)
	{
		$double = $db->prepare('select count(*) from tbl_menus where display_order ="'.$order.'"');
		$double->execute();
		$result = $double->fetchAll(PDO::FETCH_ASSOC);
		$double = $db->prepare('select max(display_order) from tbl_menus');
		$double->execute();
		$count = $double->fetchAll(PDO::FETCH_ASSOC);
		$count = $count[0]['max(display_order)'];
		
		if($result[0]['count(*)'] == 1)
		{
			
			for($i = $count ; $i >= $order ; $i --)
			{
				
				$edit = $db->prepare("UPDATE tbl_menus SET display_order=:order where display_order=:i");
				$j = $i +1;
		 		$edit->bindParam(':order', $j);
		 		$edit->bindParam(':i', $i);
				$edit->execute();
				$edit = NULL;
			}
			
		}
	}
	public function createMenu($db,$menu,$order,$parent,$all)
	{
		$this->manageOrder($db,$order);
		$add_tbl_menu = $db->prepare("INSERT INTO tbl_menus (title,display_order,parent_id,access_level) VALUES (:title, :display_order, :parent_id, :access_level)");
		 
		$add_tbl_menu->bindParam(':title', $menu);
		$add_tbl_menu->bindParam(':display_order', $order);
		$add_tbl_menu->bindParam(':parent_id', $parent);
		$add_tbl_menu->bindParam(':access_level', $all);
		
		$add_tbl_menu->execute();
		$menu_id = $db->lastInsertId();
		
		return $menu_id;
	}
	public function editMenu($db,$id,$menu,$order,$parent,$all)
	{
		$this->manageOrder($db,$order);
		$edit_tbl_menu = $db->prepare("UPDATE tbl_menus SET title=:title ,display_order=:display_order, parent_id=:parent_id, access_level=:access_level WHERE id=:id");;
		 
		$edit_tbl_menu->bindParam(':title', $menu);
		$edit_tbl_menu->bindParam(':display_order', $order);
		$edit_tbl_menu->bindParam(':parent_id', $parent);
		$edit_tbl_menu->bindParam(':access_level', $all);
		$edit_tbl_menu->bindParam(':id', $id);
		
		$edit_tbl_menu->execute();
		$menu_id = $edit_tbl_menu->rowCount();
		
		return $menu_id;
	}
	public function viewMenus($db,$id)
	{
		$menu = $db->prepare('select * from tbl_menus where id=:id');
		$menu->bindParam(':id', $id);
		$menu->execute();
		$result = $menu->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	public function jsonPermission($request,$dept)
	{
		$c = array();
		$r = array();
		$u = array();
		$d = array();
		foreach ($dept as $permissions)
		{
			$permission = "chkbox".$permissions['id'];
			
			if($permissions['title'] == "SuperUser")
			{
				array_push($c,$permissions['id']);
				array_push($r,$permissions['id']);
				array_push($u,$permissions['id']);
				array_push($d,$permissions['id']);
			}
			else
			{
				if(!empty($request[$permission]))
				{
					$access = $request[$permission];
					foreach($access as $chk)
					{
						if($chk == "c")
							array_push($c,$permissions['id']);
						if($chk == "r")
							array_push($r,$permissions['id']);
						if($chk == "u")
							array_push($u,$permissions['id']);
						if($chk == "d")
							array_push($d,$permissions['id']);
					}
				}	
				
			}
			
		}
		$all = array();
		array_push($all,$c);
		array_push($all,$r);
		array_push($all,$u);
		array_push($all,$d);
		
		$all = json_encode($all);
		return $all;
	}
}	
class Session
{
	/**
	* The function session_validate is for checking whether a user is logged in or not.
	* This function returns Boolean value.True when user is logged in and
	* false when user is not logged in.
	*/
	public function session_validate()
	{
		if(empty($_SESSION['user']))
		return false;
		else return true;
	}
	
	/**
	* The function session_set is called when a login attempt is successful.
	* It takes the 'id' of the user logging in and stores in a session variable 'user'. 
	* It some sets some other required values in session.
	*/
	public function session_set($id)
	{
		$_SESSION['user'] = $id;
		$_SESSION['array_user'] = null;
		//echo "Session Set";
		/* $_SESSION['user'] = $name;
		$_SESSION['mail'] = $mail;
		$_SESSION['role'] = $role;
		$_SESSION['pic'] = $pic;
		date_default_timezone_set("Asia/Calcutta");
		$_SESSION['date'] = date("Y-m-d");
		$_SESSION['time'] = date("H:i:s");
		
		$_SESSION['page'] = $_SESSION['role']."home"; */
	}
	
	/**
	* The function session_get is for getting the value of any session variable when it is required.
	* 
	* 
	*/
	public function session_get()
	{
		
	}
	
	/**
	* 
	* log_out function simply logs out a user from the application.
	* 
	*/
	public function log_out()
	{
		session_destroy();
		header('Location: index.php');
	}
	
}
?>