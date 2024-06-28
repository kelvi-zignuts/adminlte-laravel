<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Kreait\Laravel\Firebase\Facades\Firebase;

class LoginController extends Controller
{
    // private $firebaseAuth;

    // public function __construct(){
    //     $this->firebaseAuth = Firebase::auth();
    // }
    
    // public function index()
    // {
    //     return view('admin.auth.login');
    // }
    // public function login(Request $request)
    // {
    //     // dd($request->all());
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);
    //     // if(Auth::attempt($request->only('email','password')))
    //     // {
    //     //     return redirect()->route('admin.dashboard');
    //     // }
    //     if (Auth::attempt($request->only('email', 'password'))) {
    //         $user = Auth::user();

    //         if ($user->user_type === 'admin') {
    //             return redirect()->route('admin.dashboard');
    //         }
    //         return redirect()->route('user.dashboard');
    //     }

    //     return redirect()->route('user.dashboard');

    //     // return back()->withErrors([
    //     //     'email' => 'the provided credentials do not match our records'
    //     // ]);
    // }

    public function otpSend()
    {
        return view('admin.auth.login');
    }
    public function verifyOtp()
    {
        return view('admin.auth.verifyOtp');
    }
    // public function verifyOtp()
    // {
    //     return view('admin.auth.verifyOtp');
    // }
}
