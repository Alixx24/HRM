<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface JobRepoInterface {
    function getAll():LengthAwarePaginator;
    function addPost(array $data):void;
    function jobs_export();
    function fetchJobs():Collection ;
}