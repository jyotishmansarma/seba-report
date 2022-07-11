<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
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
}
