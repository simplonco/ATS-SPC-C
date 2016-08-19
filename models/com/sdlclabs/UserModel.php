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

class UserModel
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
class User 
{
	/**
	* The function is_employee takes three parameters which are - PDO connection object,username and password
	* which is entered by the user in the login form.
	* Then it checks whether the user is authorized or not.
	* If authorized then the user details are returned otherwise the function returns Bollean FALSE. 
	*
	*/
	public function is_employee($db,$user,$pwd)
	{
		$emp = $db->prepare('select * from tbl_users where email=:mail and password=:pwd');
		$emp->bindParam(':mail',$user);
		$emp->bindParam(':pwd',$pwd);
		$emp->execute();
		$result = $emp->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	
	/**
	*
	* The function get_emp_id takes single parameter which is PDO Connection object.
	* It returns associated array of all user id's sorted in ascending order.
	* 
	*/
	public function get_emp_id($db)
	{
		$emp = $db->prepare('select id from tbl_users ORDER BY id ASC');
		$emp->execute();
		$result = $emp->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	/**
	* The function is_available_user_name takes two parameters - PDO DBConnection Object and the name entered as 'user_name'
	* It returns a boolean value.
	* True - if Already exists = TRUE else FALSE
 	* 
	*/
	public function is_available_user_name($db,$user_name)
	{
		$emp = $db->prepare('select user_name from tbl_users where user_name=:user');
		$emp->bindParam(':user',$user_name);

		$emp->execute();
		$result = $emp->fetch(PDO::FETCH_ASSOC);
		if(empty($result))
		{
			return 0;
		}	
		else
		return 1;
	}
	
	/**
	* The function get_emp_id_by_group takes two parameters - PDO DBConnection Object and the group ID 
	* It returns a associated array containing IDs of all users which are in the queried group.
 	* 
	*/
	public function get_emp_id_by_group($db,$group)
	{
		$emp = $db->prepare('select user_id from tbl_users_usergroups_rel where user_group_id=:group');
		$emp->bindParam(':group',$group);
		$emp->execute();
		$result = $emp->fetchAll(PDO::FETCH_ASSOC);
		
		return $result;
	}
	
	/**
	* 
	* The function get_emp_id_by_name takes two parameters - PDO DBConnection Object and the pattern of the name of user.
	* It returns a associated array containing IDs of all user ids whose user name contains the string searched.
	* 
	*/
	public function get_emp_id_by_name($db,$name)
	{
		$emp = $db->prepare('select id from tbl_users where name LIKE "%'.$name.'%" ORDER BY name ASC');
		//$emp->bindParam(':name',$name);
		$emp->execute();
		$result = $emp->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	/**
	* 
	* The function get_emp_id_by_id takes two parameters - PDO DBConnection Object and the pattern of the id of user.
	* It returns a associated array containing IDs of all user ids whose user id contains the string searched.
	* 
	*/
	public function get_emp_id_by_id($db,$id)
	{
		$emp = $db->prepare('select id from tbl_users where id LIKE "%'.$id.'%" ORDER BY id ASC');
		//$emp->bindParam(':id',$id);
		$emp->execute();
		$result = $emp->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	/**
	* 
	* The function addUser takes 7 parameters Listed below in serial manner - 
	* 1.) PDO DBConnection object.
	* 2.) Name of user to be added - it should consist of characters and spaces only.Min_Length - 3
	* 3.) Valid Mail address of new user.
	* 4.) UserName of new user - Unique,consisting of characters,digits,nderscore and dots only with a minimum length of 3.
	* 5.) The group selected for the new user,to which it belongs
	* 6.) password,min_Length - 6 
	* 7.) Associative array(key=>value) where keys are social sites - facebook,github,google,twitter and linkedin and values are filled in the form,provided by user
	* 
	* It returns the user ID of Newly inserted USER if successful.
	*
	*/
	public function addUser($db,$name,$mail,$user_name,$group,$pass1,$social)
	{
		
		$add_tbl_users = $db->prepare("INSERT INTO tbl_users (name, email,user_name, password) VALUES (:name, :email, :user_name, :password)");
		 
		$add_tbl_users->bindParam(':name', $name);
		$add_tbl_users->bindParam(':email', $mail);
		$add_tbl_users->bindParam(':user_name', $user_name);
		$add_tbl_users->bindParam(':password', $pass1);
		
		$add_tbl_users->execute();
		$user_id = $db->lastInsertId();
		
		$add_tbl_users_groups_rel = $db->prepare("INSERT INTO tbl_users_usergroups_rel (user_id,user_group_id) VALUES (:user_id,:group)");
		$add_tbl_users_groups_rel->bindParam(':user_id', $user_id);
		$add_tbl_users_groups_rel->bindParam(':group', $group);
		$add_tbl_users_groups_rel->execute();
		
		foreach($social as $social_details)
		{
			$add_tbl_user_profile = $db->prepare("INSERT INTO tbl_user_profile (user_id,profile_key,value) VALUES (:user_id, :key, :value)");
			$add_tbl_user_profile->bindParam(':user_id', $user_id);
			$social_details_array = explode("/", $social_details);
			$add_tbl_user_profile->bindParam(':key', $social_details_array[0]);
			$add_tbl_user_profile->bindParam(':value', $social_details_array[1]);
			$add_tbl_user_profile->execute();
			$social_details_array = null;
			$add_tbl_user_profile = null;
			
		}
		return $user_id;
	}
	
	/**
	* 
	* The function editUser takes 6 parameters Listed below in serial manner - 
	* 1.) PDO DBConnection object.
	* 2.) ID of user whose details are to be edited
	* 3.) Name of user - it should consist of characters and spaces only.Min_Length - 3
	* 4.) Valid Mail address of user.
	* 5.) The group of the user,to which it belongs
	* 6.) Associative array(key=>value) where keys are social sites - facebook,github,google,twitter and linkedin and values are filled in the form,provided by user
	*
	* It returns the user ID of edited USER if successful.
	*
	*/
	public function editUser($db,$id,$name,$mail,$group,$social)
	{
		$edit_tbl_users = $db->prepare("UPDATE tbl_users SET name=:name,email=:email where id =:id");
		 
		$edit_tbl_users->bindParam(':name', $name);
		$edit_tbl_users->bindParam(':email', $mail);
		$edit_tbl_users->bindParam(':id', $id);
		
		$edit_tbl_users->execute();
		//$user_id = $db->lastInsertId();
		
		$edit_tbl_users_groups_rel = $db->prepare("UPDATE tbl_users_usergroups_rel SET user_group_id=:group WHERE user_id=:user_id");
		$edit_tbl_users_groups_rel->bindParam(':group', $group);
		$edit_tbl_users_groups_rel->bindParam(':user_id', $id);
		$edit_tbl_users_groups_rel->execute();
				
		foreach($social as $edit_social_details)
		{
			$edit_tbl_user_profile = $db->prepare("UPDATE tbl_user_profile SET profile_key=:key,value=:value WHERE (user_id=:user_id and profile_key=:key)");
			$edit_tbl_user_profile->bindParam(':user_id', $id);
			$edit_social_details_array = explode("/", $edit_social_details);
			$edit_tbl_user_profile->bindParam(':key', $edit_social_details_array[0]);
			$edit_tbl_user_profile->bindParam(':value', $edit_social_details_array[1]);
			$edit_tbl_user_profile->execute();
			$edit_social_details_array = null;
			$edit_tbl_user_profile = null;
		}
		return $id;
	}
	
	/**
	* The function ViewUser takes 3 parameters - PDO DBConnection object,the id of user whose details
	* are to be viewed and the msg variable.
	* 
	* the variable 'msg' takes a string as message - msg is NULL if we are normally viewing a user but
	* contains a string when the view page is appeared on adding new user successfully or editing a users details.
	*
	* It returns a multidimensional array - containing 3 array in it.These array are - 
	*
	* 1.) This array contains id,user_name,email and name of the user respectively.
	* 2.) Associative array(key=>value) where keys are social sites - facebook,github,google,twitter and linkedin and values * are filled in the form,provided by user
	* 3.) Array with title where title is the name of UserGroup to which the user belongs
	*
	*/
	public function ViewUser($db,$id,$msg)
	{
		$user = $db->prepare("SELECT id,user_name,email,name FROM tbl_users where id=".$id);
		$user->execute();
		$user_public = $user->fetch(PDO::FETCH_ASSOC);
		$user = $db->prepare("SELECT profile_key,value FROM tbl_user_profile where user_id=".$id);
		$user->execute();
		$user_social = $user->fetchAll(PDO::FETCH_ASSOC);
		$user = $db->prepare("SELECT title FROM tbl_users_groups where id=(SELECT user_group_id FROM tbl_users_usergroups_rel WHERE user_id=".$id.")");
		$user->execute();
		$user_group = $user->fetch(PDO::FETCH_ASSOC);
		$user_details = array ($user_public,$user_social,$user_group); 
		return $user_details;
		
	}
	
	/**
	* The deleteUser function takes two parameters - PDO DBConnection object and the ID of user to be deleted
	* It deletes the user details from all tables.
	* It returns the number of affected rows when Successful.
	* 
	*/
	public function deleteUser($db,$id)
	{
		$del_user = $db->prepare("DELETE FROM tbl_users where id=".$id);
		$del_user->execute();
		$del_user = $db->prepare("DELETE FROM tbl_user_profile where user_id=".$id);
		$del_user->execute();
		$del_user = $db->prepare("DELETE FROM tbl_users_usergroups_rel where user_id=".$id);
		$del_user->execute();
		$_SESSION['array_user'] = null;
		return $del_user->rowCount();
	}
	
	/**
	* The function end_session updates the Database with the details like log out time,
	* duration of hours user was logged in for and the date.These all details are passed 
	* in the function as parameters.
	*/
	public function end_session($db,$emp_id,$hour,$leave)
	{
		$end = $db->prepare("UPDATE attendance SET time_out=:out ,leave_id=:leave,hours=:hour WHERE emp_id=:emp_id AND date=:date AND time_in=:time");
		$end->bindParam(':out',date("H:i:s"));
		$end->bindParam(':leave',$leave);
		$end->bindParam(':hour',$hour);
		$end->bindParam(':emp_id',$emp_id);
		$end->bindParam(':date',$_SESSION['date']);
		$end->bindParam(':time',$_SESSION['time']);
		$end->execute();			
		
		return $end;			
	}
}
?>