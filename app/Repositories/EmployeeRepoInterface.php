<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface EmployeeRepoInterface {
    function getAll(Request $request): LengthAwarePaginator;
    function add(): Collection;
    function addPost(array $data): void;
    function findById($id);
    function update($id, Request $request);
}