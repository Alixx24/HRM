<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\AuthRepoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Stringable;

class AuthController extends Controller
{
    private AuthRepoInterface $authRepo;

    public function __construct(AuthRepoInterface $authRepo)
    {
        $this->authRepo = $authRepo;
    }

    
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
        $user = request()->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);
        $user = $this->authRepo->register($request);
        return redirect('/')->with('success', 'register succesfully!');
    }

    public function CheckEmail(Request $request)
    {
        $isExists = $this->authRepo->checkEmail($request);
        if ($isExists) {
            return response()->json(array("exists" => true));
        } else {
            return response()->json(array("exists" => false));
        }
    }

    public function login_post(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (Auth::user()->is_role == '1') {
                return redirect()->intended('admin/dashboard');
            } else {
                return redirect('/')->with('error', 'No HR Avalables...');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter the correct credential');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}
