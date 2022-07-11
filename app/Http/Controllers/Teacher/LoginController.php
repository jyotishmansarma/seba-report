<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator, Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {


       // dd('hi');
        $request->validate([

            'code' => ['required', 'digits:6'],
            'login_pin' => ['required', 'digits:6'],
        ]);
        $teacher = School::where(['code' => $request->code, 'login_pin' => $request->login_pin])->first();

        if ($teacher) {

            Auth::guard('school')->login($teacher, 1);
            return redirect()->route('so.firstChangePassword');
        } else {

            return redirect()->back()->withInput()->withErrors('Invalid details provided. If forgot details then use forgot login details option below');
        }

    }

    public function logout()
    {

        Session::flush();
        Auth::guard('school')->logout();
        return redirect()->route('so.login');
    }
}
