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
        $fetchData = User::find($id);
        return view('backend.employees.edit', compact('fetchData'));
    }

    public function update($id, Request $request)
    {

        $user = request()->validate([
            'email' => 'unique:users,email'
        ]);

        $user = new User();
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);

        $user->email = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->hire_date = trim($request->hire_date);
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commision_pct = trim($request->commision_pct);
        $user->manager_id = trim($request->manager_id);
        $user->department_id = trim($request->department_id);
        $user->is_role = 0; //employees

        $user->save();

        return redirect('admin/employees')->with('success', 'empoyees successfully Update.');
    }
}
