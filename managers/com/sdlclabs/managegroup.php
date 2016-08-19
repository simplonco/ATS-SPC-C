<?php

require_once('/models/com/sdlclabs/managegroupdata.php');


class Groups{
	public $errormsg;
	public $successmsg;
	public $mod;
	function __construct(){
		$this->mod=new GroupData();
	}
	
	
	

	function showGroups(){
		
		if(empty($_GET['page']))
		{
			include('/views/pages/usergroup.php');
			
		}
		else if($_GET['page']=="update")
		{
			$id=$_POST['id'];
			$data=$_POST['update_data'];
			$this->mod->editGroup($id,$data);
			
		}
		
		else if($_GET['page']=="create")
		{
			$ngrp=$_POST['newgrp'];
			
			if(preg_match("/^[a-zA-Z ]*$/",$ngrp))
			{
				if(strlen($ngrp)>=2)
				{
					$response=$this->mod->createGroup($ngrp);
					echo $response;
				}
			}
			

			
				
			//echo $response; */
			
			
		}
		else if($_GET['page']=="edit")
		{
			
			$title=$_POST['edit_value'];
			if(preg_match("/^[a-zA-Z ]*$/",$title))
			{
				if(strlen($title)>=2)
				{
	
			$this->mod->editGroup($title ,$_POST['edit_id']);
			echo "1";
				
				
			}

			}
			/* 
			$response=$this->mod->getGroups();
		include('/views/pages/usergroup.php'); */
		 }
		else if($_GET['page']=="delete")
		{
			$result=$this->mod->getGroupDetails($_POST['rowid']);
			$gname=$this->mod->getGroupName($_POST['rowid']);

			if($result==0)
			{
				$this->mod->deleteGroup($_POST['rowid']);
				$successmsg="successfully deleted ".$gname." !";
			}
			else
			{
				
				$errormsg="Can't delete ".$gname." as it contains some users !";
			}
	
			$response=$this->mod->getGroups();
			include('/views/pages/usergroup.php');
		}
		
		else if($_GET['page']=="page")
		{
			echo $_SESSION['page'];
		}
		else if($_GET['page']=="delchkbox")
		{      $errormsg1="";
				$deletemsg="";
			//print_r($_POST['favorite']);
			foreach($_POST['favorite'] as $check) 
						{
						$result=$this->mod->getGroupDetails($check);
						$gname=$this->mod->getGroupName($check);
						
						//die();
						if($result==0)
							{
							 $this->mod->deleteGroup($check);
						   $deletemsg= $deletemsg.$gname." , ";                                                                 
							
							}
						else 
							{
							
							$errormsg1= $errormsg1."".$gname." , ";
							
							}
						
												
						}
						
						$response=$this->mod->getGroups();
						include('/views/pages/usergroup.php');
		}
		else if($_GET['page']=="show")
		{
				

		$response=$this->mod->getGroups();
		include('/views/pages/usergroup.php');
			
			
	}
	
	
	
		
		
}

	
}
	
	



?>