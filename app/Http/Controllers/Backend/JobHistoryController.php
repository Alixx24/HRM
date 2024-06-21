<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobModel;
use App\Models\User;
use Illuminate\Http\Request;

class JobHistoryController extends Controller
{
    public function index(Request $request)
    {
        // $fetchData = User::getRecord();
        return view('backend.job_history.list');
    }
    public function add(Request $request)
    {
        // $fetchData = User::getRecord();
        $getJobs = JobModel::get();
        $getEmployee = User::where('is_role', 0)->get();
        return view('backend.job_history.add',compact('getJobs', 'getEmployee'));
    }
}
