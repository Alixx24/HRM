<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthRepo implements AuthRepoInterface
{
    public function register(Request $request)
    {
        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = str()->random(50);
        $user->save();
    }

    public function checkEmail(Request $request, )
    {
        $email = $request->input('email');
        User::where('email', $email)->first();
    }
}