<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Kreait\Laravel\Firebase\Facades\Firebase;

class LoginController extends Controller
{
    // public function index()
    // {
    //     return view('admin.auth.login');
    // }
    public function otpSend()
    {
        return view('admin.auth.login');
    }

    // public function verifyOtp()
    // {
    //     return view('admin.auth.verifyOtp');
    // }
    // public function verifyOtp()
    // {
    //     return view('admin.auth.verifyOtp');
    // }
}
