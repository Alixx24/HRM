<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface AuthRepoInterface {
    function login(Request $request);
    function checkEmail(Request $request);
}