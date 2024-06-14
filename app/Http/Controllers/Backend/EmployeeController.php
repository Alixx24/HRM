<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.employees.index');
    }
    public function add(Request $request)
    {
        return view('backend.employees.add');
    }

    public function add_post(Request $request)
    {
        dd($request->all());
    }
}
