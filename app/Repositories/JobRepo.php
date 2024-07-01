<?php

namespace App\Repositories;

use App\Exports\JobsExport;
use App\Models\JobModel;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;

class JobRepo implements JobRepoInterface
{

    protected JobModel $jmodel;

    public function __construct(JobModel $jmodel)
    {
        $this->jmodel = $jmodel;
    }

    public function getAll():LengthAwarePaginator
    {
        $query = $this->jmodel->select('jobs.*');
        return $query->paginate(2);
    }

    public function jobs_export()
    {
       return Excel::download(new JobsExport, 'jobs.xlsx');
    }
    
    public function addPost(array $data):void
    {
        $user = new JobModel();
        $user->job_title = trim($data['job_title']);
        $user->min_salary = trim($data['min_salary']);
        $user->max_salary = trim($data['max_salary']);
        $user->save();
    }

    public function fetchJobs(): Collection
    {
        return JobModel::all();
         
    }
}
