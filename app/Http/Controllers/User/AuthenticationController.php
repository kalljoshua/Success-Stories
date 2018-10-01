<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthenticationController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/user';

    protected function guard()
    {
        return Auth::guard('user');
    }

    //login function
    Public function login(Request $request)
    {

        $email = $request->input('email');

        $password = $request->input('password');


        if ($this->guard()->attempt(['email' => $email, 'password' => $password]))
        {
            // Authentication passed...
            if(basename(Session::get('redirect_to_create_service')) == 'select-package'){
                return redirect()->intended(route('user.create.service'));
            }else {
                flash('User Login successfully')->success();
                return redirect()->intended(route('user.profile'));
            }

        }

        /*
         * //return redirect()->back();
        //return URL::full();
        //return basename(request()->path());
        */

        return $this->sendFailedLoginResponse($request);

    }

}
