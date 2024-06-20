<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobsExport;

class JobsController extends Controller
{
    public function index(Request $request)
    {
         $fetchJobs = JobModel::getRecord($request);
        return view('backend.jobs.list', compact('fetchJobs'));
    }

    public function jobs_export(Request $request)
    {
        return Excel::download(new JobsExport, 'jobs.xlsx');
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

        $user = new JobModel();
        $user->job_title = trim($request->job_title);
        $user->min_salary = trim($request->min_salary);
        $user->max_salary = trim($request->max_salary);
        $user->save();

        return redirect('admin/jobs')->with('success', 'Job succefully created');

    }
}
