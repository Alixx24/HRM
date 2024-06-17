<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobModel;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index(Request $request)
    {
        // $fetchData = JobModel::getRecord();
        return view('backend.jobs.list');
    }
}
