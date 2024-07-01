<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class JobHistoryModel extends Model
{
    use HasFactory;
    protected $fillable = 'jobs_history';

    // static public function getRecord($request)
    // {
    //     $return = self::select('job_history.*', 'users.name','jobs.job_title')
    //     ->join('users', 'users.id', '=', 'job)history.employee_id')
    //     ->join('jobs', 'jobs.id', '=', 'job_history.job_id')
    //     ->orderBy('job_history_id', 'desc');
    //     if(!empty(Request::get('id')))
    //     {
    //         $return = $return->where('job_history.id', '=', Request::get('id'));
    //     }
    //     $return = $return->paginate(20);
    //     return $return;

    // }
    public function get_user_name_single()
    {
        return $this->belongsTo("emloyee_id");
    }

    public function get_job_single()
    {
        return $this->belongsTo(JobModel::class, "job_id");
    }
}
