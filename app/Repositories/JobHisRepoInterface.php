<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface JobHisRepoInterface {
    function add();
    function addPost(array $data):void ;
}