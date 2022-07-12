<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\So;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use PDF;

class MainController extends Controller
{
   
    public function teacher_details(Request $request)
    {


        if ($request->isMethod('get')) {
            return view('teacher.teacher');
        } else {
            $request->validate([

                'code' => ['required'],
                'name' => ['required'],
                'mobile' => ['required', 'digits:10'],
                'email' => ['required'],
                'subject'=>['required']
            ]);

        //   dd(Auth::guard('school')->user()->id);
           $teacher=Teacher::where(['school_code'=> $request->code, 'mobile'=> $request->mobile])->first();
           if($teacher)
           {
                return redirect()->back()->withInput()->withErrors('Teacher details already exsists ');
           }

           $data=
           [
                'school_code'=>$request->code,
                'name'=>$request->name,
                'mobile'=>$request->mobile,
                'email'=>$request->email,
                'subject'=>$request->subject
           ];

            Teacher::create($data);
            session()->flash('success', 'Successfully Insert data.');
            return redirect()->route('teacher.teacher_details');
        }

    }
    public function firstChangePassword(Request $request)
    {


        if ($request->isMethod('get')) {
            return view('school.firstChangePassword');
        } else {

            $request->validate(
                ['password' => 'confirmed|min:5|max:23']
            );


            $password = Hash::make($request->password);
            School::where(['id' => Auth::id()])->update(['first_password_status' => 1, 'password' => $password]);
            session()->flash('message_p', 'Successfully Password Updated.');
            return redirect()->route('school.pin');
        }
    }
     
    public function pin()
    {
       $login_pin= Auth::guard('school')->user()->login_pin;
        return view('school.pin',compact('login_pin'));
    }
}
