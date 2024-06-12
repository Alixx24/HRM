<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Stringable;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('login');
    }
    public function forgetPassword(Request $request)
    {
        return view('forget-password');
    }
    public function register(Request $request)
    {
        return view('register');
    }
    public function register_post(Request $request)
    {
        // dd($request->all());
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);
        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = str()->random(50);
        $user->save();
        return redirect('/')->with('success', 'register succesfully!');

    }

    public function CheckEmail(Request $request)
    {
        $email = $request->input('email');
        $isExists = User::where('email', $email)->first();
        if($isExists)
        {
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
        }
    }
}
