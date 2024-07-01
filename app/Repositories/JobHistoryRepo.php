<?php

namespace App\Repositories;

use App\Models\JobHistoryModel;
use App\Models\JobModel;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class JobHistoryRepo implements JobHistoryRepoInterface
{
    protected JobHistoryModel $model;

    public function __construct(JobHistoryModel $model)
    {
        $this->model = $model;
    }

    public function add(): Collection
    {
        return $getJobs = JobModel::get();
        $getEmployee = User::where('is_role', 0)->get();
    }

}