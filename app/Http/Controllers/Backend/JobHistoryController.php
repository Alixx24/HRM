<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobHistoryModel;
use App\Models\JobModel;
use App\Models\User;
use App\Repositories\EmployeeRepo;
use App\Repositories\EmployeeRepoInterface;
use App\Repositories\JobHistoryRepoInterface;
use App\Repositories\JobRepoInterface;
use Illuminate\Http\Request;

class JobHistoryController extends Controller
{
    
    private JobRepoInterface $jobRepo;
    private EmployeeRepoInterface $employeeRepo;
    public function __construct(JobRepoInterface $jobRepo, EmployeeRepoInterface $employeeRepo)
    {
        $this->jobRepo = $jobRepo;
        $this->employeeRepo = $employeeRepo;
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

    public function addHistory(Request $request, JobHistoryModel $model)
    {
        // dd($request->all());
        dd('ds');
        // $fetchData = User::getRecord();
        dd($request->all());

        $jobHistoryy = request()->validate([
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'job_id' => 'required',
            'department_id' => 'required'
        ]);
        dd($request->all());
        $jobHistoryy = new JobHistoryModel;

        $jobHistoryy->employee_id = trim($request->employee_id);
        $jobHistoryy->start_date = trim($request->start_date);
        $jobHistoryy->end_date = trim($request->end_date);
        $jobHistoryy->job_id = trim($request->job_id);
        $jobHistoryy->department_id = trim($request->department_id);
        $jobHistoryy->save();

        return redirect('admin/job_history')->with('success', 'job history success added');
    }
}
