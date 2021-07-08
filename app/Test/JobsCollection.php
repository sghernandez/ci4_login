<?php

namespace App\Test;

class JobsCollection {

    public $jobs = [];

    public function add_job(Job $job){
        $this->jobs[] = $job;
    }        

    public function get_Jobs()
    {
       foreach($this->jobs as $job) {
           print 'JOB: '. $job->job. '<br>'.
           'SALARY: '. $job->salary.'<br>';
       }
 
    }


}