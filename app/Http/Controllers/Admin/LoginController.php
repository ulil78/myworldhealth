<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function getForm(){
        # return view('backend.auth.login');
    }

    public function postValidate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|exists:admins',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            # Authentication passed...
            return redirect()->intended('/dashboard');
        } else {
            return redirect('/login')->withMessage('Email / password salah, coba lagi..');
            #return 'wrong username / password';
        }
    }

    public function postLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('/login');
    }
}
