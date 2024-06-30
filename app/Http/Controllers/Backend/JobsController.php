<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobsExport;
use App\Repositories\JobRepoInterface;

class JobsController extends Controller
{
    private JobRepoInterface $jobRepo;

    public function __construct(JobRepoInterface $jobRepo)
    {
        $this->jobRepo = $jobRepo;
    }
    public function index(Request $request)
    {
        $fetchJobs = $this->jobRepo->getAll();
        return view('backend.jobs.list', compact('fetchJobs'));
    }

    public function jobs_export(Request $request)
    {
        return $this->jobRepo->jobs_export();
    }

    public function add()
    {
        return view('backend.jobs.add');
    }

    public function addPost(Request $request)
    {
        $user = request()->validate([
            'job_title' => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required',

        ]);
        $this->jobRepo->addPost($user);
        return redirect('admin/jobs')->with('success', 'Job succefully created');
    }
}
