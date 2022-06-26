<?php
namespace DB;
class DB{
	private $host;
	private $username;
	private $password;
	private $db_name;
	function __construct($host,$username,$password,$db_name){
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->db_name = $db_name;	
	}
	function connect(){
		$conn = mysqli_connect($this->host,$this->username,$this->password,$this->db_name);
		if (!$conn){
			die('connect error').mysqli_connect_error();
		}
		return $conn;
	}
	function close($conn,$result){
		mysqli_free($result);
		mysqli_close($conn);
	}
	function gest_list($tab_name,$conn){
		$sql = "SELECT id,name,age,gender,math,physic,chemistry FROM '$tab_name'";
		$result = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
		if (!$result){
			die('gest list was failed');
		}
		return $result;
	}
	function insert($tab_name,$conn,$oder_field,$value){
		$sql = "INSERT INTO $tab_name($oder_field) VALUES ($value)";
		$query = mysqli_query($conn,$sql);
		if (!$query) {
			die('insert was failed');
		}
		return $query;
	}
	function update($tab_name,$conn,$statement,$condition){
		$sql = "UPDATE $tab_name SET $statement WHERE $conditon";
		$query = mysqli_query($conn,$sql);
		if (!$query) {
			die('update was failed');
		}
		return $query;
	}
	function delete($tab_name,$conn,$condition){
		$sql = "DELETE FROM $tab_name WHERE $condition";
		$query = mysqli_query($conn,$sql);
		if (!$query) {
			die('deleted was failed');
		return $query;
		}
	}
}