<?php

namespace App\Test;

class Job {

	public $job;
	public $salary;

    public function __construct($job, $salary){
       $this->job = $job;
       $this->salary = $salary;
    }

	public function set_job($job){
		$this->job = $job;
	}

	public function get_job(){
		return $this->job;
	}    

	public function set_salary($salary){
		$this->salary = $salary;
	}

	public function get_salary(){
		return $this->salary;
	}       
	
}