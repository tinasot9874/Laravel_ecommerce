<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;


    // Where to redirect admins after login
    protected $redirectTo = 'admin';


    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');

    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function logout()
    {
        $this->guard()->logout();
        return redirect(route('admin.login'));
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }


}
