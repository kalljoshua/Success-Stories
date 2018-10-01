<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laracasts\Flash;

class AuthenticationController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard';
    protected function guard()
    {
        return Auth::guard('admin');
    }
    //
    public function loginForm(){
        return view('admin.admin-login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');

        $password = $request->input('password');
        //return $request;

        if ($this->guard()->attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended(route('admin.dashboard'));
        }

        //return redirect()->back();

        return $this->sendFailedLoginResponse($request);

        //return redirect(route('admin.dashboard'));
    }
}
