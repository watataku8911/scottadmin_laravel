<?php

namespace App\Classes;

class Emp{
	private $empno;//従業員番号
	private $ename="";//従業員名
	private $job="";//役職
	private $mgr="";//上司番号
	private $hiredateYear="";//年
	private $hiredateMonth="";//月
	private $hiredateDay="";//日
	private $hiredate="";//雇用日
	private $sal="";//給与
	private $comm="";//歩合
	private $deptno="";//部門番号

	public function getHiredateStr(){
		$hiredatestr="";
		if(!empty($this->hiredate)){
			$hiredatestr=date("Y年m月d日",strtotime($this->hiredate));
		}
		return $hiredatestr;
	}
	
	public function setEmpno($empno){
		$this->empno=$empno;
	}
	public function getEmpno(){
		return $this->empno;
	}

	public function setEname($ename){
		$this->ename=$ename;
	}
	public function getEname(){
		return $this->ename;
	}

	public function setJob($job){
		$this->job=$job;
	}
	public function getJob(){
		return $this->job;
	}

	public function setMgr($mgr){
		$this->mgr=$mgr;
	}
	public function getMgr(){
		return $this->mgr;
	}
	//年
	public function setHiredateYear($hiredateYear){
		$this->hiredateYear=$hiredateYear;
	}
	public function getHiredateYear(){
		return $this->hiredateYear;
	}

	//月
	public function setHiredateMonth($hiredateMonth){
		$this->hiredateMonth=$hiredateMonth;
	}
	public function getHiredateMonth(){
		return $this->hiredateMonth;
	}
	//日
	public function setHiredateDay($hiredateDay){
		$this->hiredateDay=$hiredateDay;
	}
	public function getHiredateDay(){
		return $this->hiredateDay;
	}
	//雇用日
	public function setHiredate($hiredate){
		$this->hiredate=$hiredate;
	}
	public function getHiredate(){
		return $this->hiredate;
	}

	public function setSal($sal){
		$this->sal=$sal;
	}
	public function getSal(){
		return $this->sal;
	}

	public function setComm($comm){
		$this->comm=$comm;
	}
	public function getComm(){
		return $this->comm;
	}

	public function setDeptno($deptno){
		$this->deptno=$deptno;
	}

	public function getDeptno(){
		return $this->deptno;
	}
}