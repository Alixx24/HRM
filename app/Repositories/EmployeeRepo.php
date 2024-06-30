<?php

namespace App\Repositories;

use App\Models\JobModel;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class EmployeeRepo implements EmployeeRepoInterface
{
    protected User $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll(Request $request): LengthAwarePaginator
    {
        $query = $this->model->select('users.*');

        // Search box start
        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->filled('last_name')) {
            $query->where('last_name', 'like', '%' . $request->last_name . '%');
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        // Search box end

        return $query->orderBy('id', 'desc')->paginate(2);
    }

    public function add(): Collection
    {
        return JobModel::all();
    }

    public function addPost(array $data): void
    {
        $user = new User();
        $user->name = trim($data['name']);
        $user->last_name = trim($data['last_name']);
        $user->email = trim($data['email']);
        $user->phone_number = trim($data['phone_number']);
        $user->hire_date = trim($data['hire_date']);
        $user->job_id = trim($data['job_id']);
        $user->salary = trim($data['salary']);
        $user->commision_pct = trim($data['commision_pct']);
        $user->manager_id = trim($data['manager_id']);
        $user->department_id = trim($data['department_id']);
        $user->is_role = 0; // employees
        $user->save();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function update($id, Request $request)
    {
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
        $user->is_role = 0;
        //employees
        // dd($user);
        $user->save();
    }
}
