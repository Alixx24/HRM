<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
interface JobRepoInterface {
    function getAll():LengthAwarePaginator;
    function addPost(array $data):void;
    function jobs_export();
}