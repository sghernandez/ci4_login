<?php

namespace App\Controllers;

use App\Test\Job;
use App\Test\JobsCollection as JC;
use App\Traits\Datatrait;
use App\DB\DB; 
use App\Test\Developers; # interface

class Home extends BaseController implements Developers
{
	use DataTrait;
	public $skill;

	public function __construct() {
	 	$this->db = new DB;
	}

	public function index()
	{
		// print Config('AppConfig')->db_host;
		// print getenv('database.default.hostname');		
 
		$incremento = 20000;
		$job_1 = new Job('Developer', 10000);
		$job_2 = new Job('Database Adminstrator', 15000);

		if($incremento){
			$job_2->set_salary($job_2->get_salary() + 20000);
		}

		$jobs = new JC();
		$jobs->add_job($job_1);
		$jobs->add_job($job_2);

		$this->set_skill('Developer'); // declared on the interface

		$data = [
			'traits' => $this->getData(), // This method is defined on the Trait
			'jobs' => $jobs->jobs,
			'skill' => $this->get_skill(),
			'row' =>  $this->db::getRow('usuarios', ['id' => 1]),
			'rows' => DB::getRows('usuarios'),
			'sp' => DB::sp()
		];
		// print DB::$static;

		return view('test/test', $data);
	}
    

	public function set_skill($skill)
	{
		$this->skill = $skill;
	}

	public function get_skill()
	{
	   return $this->skill;	
	}

    
}
