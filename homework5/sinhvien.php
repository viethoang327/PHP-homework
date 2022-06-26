<?php
namespace Sinhvien;
class Sinhvien {
	private $name;
	private $age;
	private $gender;
	private $math;
	private $physic;
	private $chemistry;
	function __construct($name,$age,$gender,$math,$physic,$chemistry){
		$this->name = $name;
		$this->age = $age;
		$this->gender = $gender;
		$this->math = $math;
		$this->physic = $physic;
		$this->chemistry = $chemistry;
	}

	function info(){
		return "Name: $name <br/>Age: $age <br/> Gender: $gender <br/> ";
	}
	function total_score(){
		return $this->$math + $this->physic + $this->chemistry;
	}

}