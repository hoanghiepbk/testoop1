<?php
class DB_student {
	var $name;
	var $age;
	var $sex;
	var $birthday;
	
	function set_name($p_name) {
		$this->name=$p_name;
	}
	function get_name() {
		return $this->name;
	}
	function set_age($p_age) {
		$this->age=$p_age;
	}
	function get_age() { 	
		return $this->age;
	}
	function set_birthday($p_birthday) {
		$this->birthday=$p_birthday;
	}
	function get_birthday() {
		return $this->birthday;
	}
	private $hostname = "127.0.0.1";
	private $usename = "root";
	private $pass = "";
	private $dbname = "qlsv_db";
	private $conn = NULL;
	private $result = NULL;
	 
	public function __construct() {
		$this->conn=mysqli_connect($this->hostname,$this->usename,$this->pass,$this->dbname);
	}
	public function disconnectdb() {
		if($this->conn) {
			mysql_close($this->conn);
		}
	}
	public function query($sql) {
		$this->result=mysqli_query($this->conn,$sql);
	}
	public function get_students() {

	if($this->result) {
			$data=mysqli_fetch_assoc($this->result);
		}
		else {
			$data=0;
		}
		return $data;	
	}

}	
?>
