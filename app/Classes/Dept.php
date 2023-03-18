<?php
class Dept{
	private $deptno;
	private $dname="";
	private $loc="";

	public function setDeptno($deptno){
		$this->deptno=$deptno;
	}

	public function getDeptno(){
		return $this->deptno;
	}

	public function setDname($dname){
		$this->dname=$dname;
	}

	public function getDname(){
		return $this->dname;
	}

	public function setLoc($loc){
		$this->loc=$loc;
	}

	public function getLoc(){
		return $this->loc;
	}

}