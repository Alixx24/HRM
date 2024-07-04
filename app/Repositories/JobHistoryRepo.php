<?php

namespace App\Repositories;

use App\Models\JobHistoryModel;
use App\Models\JobModel;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class JobHistoryRepo implements JobHisRepoInterface
{

    public function add()
    {
        return $getJobs = JobModel::get();
        $getEmployee = User::where('is_role', 0)->get();
    }

    public function addPost(array $data): void
    {
        
        $jobHistoryy = new JobHistoryModel();
    
        $jobHistoryy->employee_id = trim($data['employee_id']);
        $jobHistoryy->start_date = trim($data['start_date']);
        $jobHistoryy->end_date = trim($data['end_date']);
        $jobHistoryy->job_id = trim($data['job_id']);
        $jobHistoryy->department_id = trim($data['department_id']);
        $jobHistoryy->create();
    }

}