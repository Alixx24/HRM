<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface AuthRepoInterface {
    function register(Request $request);
    function checkEmail(Request $request);
}