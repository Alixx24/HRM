<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobHistoryModel;
use App\Models\JobModel;
use App\Models\User;
use App\Repositories\EmployeeRepo;
use App\Repositories\EmployeeRepoInterface;
use App\Repositories\JobHisRepoInterface;
use App\Repositories\JobRepoInterface;

use Illuminate\Http\Request;

class JobHistoryController extends Controller
{
    
    private JobRepoInterface $jobRepo;
    private EmployeeRepoInterface $employeeRepo;
    private JobHisRepoInterface $jobHistoryRepo;

    public function __construct(JobRepoInterface $jobRepo, EmployeeRepoInterface $employeeRepo, JobHisRepoInterface $jobHistoryRepo)
    {
        $this->jobRepo = $jobRepo;
        $this->employeeRepo = $employeeRepo;
        $this->jobHistoryRepo = $jobHistoryRepo;
    }
    public function index(Request $request)
    {
        // $fetchData = User::getRecord();
        return view('backend.job_history.list');
    }
    public function add(Request $request)
    {
        $getJobs = $this->jobRepo->fetchJobs();
        $getEmployee = $this->employeeRepo->getByRole();
        return view('backend.job_history.add', compact('getJobs', 'getEmployee'));
    }

    public function addHistory(Request $request)
    {
        // dd($request->all());
        
        // $fetchData = User::getRecord();
     

        $jobHistoryy = request()->validate([
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'job_id' => 'required',
            'department_id' => 'required'
        ]);
   
        $jobHistoryy = $this->jobHistoryRepo->addPost($jobHistoryy);
      

     

        return redirect('admin/job_history')->with('success', 'job history success added');
    }
}
