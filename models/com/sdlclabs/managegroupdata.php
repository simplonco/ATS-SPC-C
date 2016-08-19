<?php

class GroupData{
	
	public $db1;
	
	
	function getGroups(){
		
		$this->db1=$this->opendb();
		$result=$this->get($this->db1);
		$this->closedb($this->db1);
		return($result);
	}
	function getGroupDetails($chk){
		
		$this->db1=$this->opendb();
		$result=$this->getGrpDet($this->db1,$chk);
		$this->closedb($this->db1);
		return($result);
	}
	function getGroupName($checkbox){
		
		$this->db1=$this->opendb();
		$result=$this->getName($this->db1,$checkbox);
		$this->closedb($this->db1);
		
		return($result);
	}
	function deleteGroup($checkbox1){
		
		$this->db1=$this->opendb();
		$this->deleteG($this->db1,$checkbox1);
		$this->closedb($this->db1);
		
	}
	function createGroup($newgrp){
		
		$this->db1=$this->opendb();
		$response=$this->createG($this->db1,$newgrp);
		$this->closedb($this->db1);
		return $response;
		
	}
	function editGroup($title1,$id1){
		
		$this->db1=$this->opendb();
		$this->editG($this->db1,$title1,$id1);
		$this->closedb($this->db1);
		
	}
	function opendb(){
		$db=mysqli_connect("localhost","root","","ems");
		if (!$db)
		  {
		  die("Connection error: " . mysqli_connect_error());
		  }
		  return $db;
	}
	function get($db2){
		
		$result=mysqli_query($db2,"SELECT * FROM tbl_users_groups ");
		if(!($result))echo "fail";
	
	return($result);
	}
	function getGrpDet($db2,$c){
		
		$result=mysqli_query($db2,"SELECT count(*) FROM tbl_users_usergroups_rel where user_group_id='$c' ");
		if(!($result))echo "fail";
		while($row=mysqli_fetch_assoc($result)){
			//print_r($row);
			//echo $row['count(*)']; die(); 
			//Array ( [count(*)] => 0 )
			return($row['count(*)']);
		}
	
	
	}
	function getName($db2,$c){
		
		$result=mysqli_query($db2,"SELECT title FROM tbl_users_groups where id='$c' ");
		if(!($result))echo "fail";
		while($row=mysqli_fetch_assoc($result)){
			
			return($row['title']);
		}
	
	
	}
	function deleteG($db2,$chk){
		
		$result=mysqli_query($db2,"DELETE FROM tbl_users_groups WHERE id='$chk'");
		if(!($result))echo "fail";
		
	
	
	}
	function createG($db2,$ng){
		
		$result=mysqli_query($db2,"INSERT INTO tbl_users_groups(`title`) VALUES ('$ng')");
		if(mysqli_affected_rows($db2)>0)
		{
		  return mysqli_insert_id($db2);	
		}
		else
		{
			return 0;
		}
		
	
	
	}
	function editG($db2,$title,$id){
		
		$result=mysqli_query($db2,"UPDATE tbl_users_groups SET title='$title' WHERE id='$id'");
		
		if(!($result))echo "fail";

		 
	}
	
	
	function closedb($db3){
		mysqli_close($db3);
	}

}

?>