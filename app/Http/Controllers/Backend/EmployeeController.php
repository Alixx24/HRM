<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobModel;
use App\Models\User;
use App\Repositories\IEmployeeRepo;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private IEmployeeRepo $employeeRepo;

    public function __construct(IEmployeeRepo $employeeRepo)
    {
        $this->employeeRepo = $employeeRepo;
    }

    public function index(Request $request)
    {
        $fetchData = $this->employeeRepo->getAll($request);
        return view('backend.employees.list', compact('fetchData'));
    }
    public function add()
    {
        $fetchJobs = $this->employeeRepo->add();
        return view('backend.employees.add', compact('fetchJobs'));
    }

    public function addPost(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'last_name' => 'string',
            'email' => 'required|unique:users',
            'hire_date' => 'required',
            'job_id' => 'required',
            'salary' => 'required',
            'commision_pct' => 'required',
            'manager_id' => 'required',
            'department_id' => 'required',
            'phone_number' => 'numeric'
        ]);

        $this->employeeRepo->addPost($validatedData);

        return redirect('admin/employees')->with('success', 'Employee successfully registered');
    }

    public function view($id)
    {
        $fetchData = $this->employeeRepo->findById($id);
        return view('backend.employees.view', compact('fetchData'));
    }

    public function edit($id)
    {
        $fetchData = $this->employeeRepo->findById($id);
        return view('backend.employees.edit', compact('fetchData'));
    }

    public function update($id, Request $request)
    {        
        $user = request()->validate([
            'phone_number' => 'numeric'
        ]);
        $user = $this->employeeRepo->update($id, $request);
        return redirect('admin/employees')->with('success', 'empoyees successfully Update.');
    }
}
