<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator, Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {


        $request->validate([

            'code' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::guard('school')->attempt(['code' => $request->code, 'password' => $request->password], 1)) {
            if (Auth::guard('school')->user()->first_password_status == null) {
                // dd('hi');
                return redirect()->route('school.firstChangePassword');
            } else {
                return redirect()->route('school.pin');
            }
        } else {

            return redirect()->back()->withInput()->withErrors('Invalid details provided.');
        }

    }

    public function logout()
    {

        Session::flush();
        Auth::guard('school')->logout();
        return redirect()->route('teacher.login');
    }
}
