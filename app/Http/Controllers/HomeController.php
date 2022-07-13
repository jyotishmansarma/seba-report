<?php

namespace App\Http\Controllers;

use App\Models\Admin\So;
use App\Models\Centerlist;
use App\Models\ExamRoutine;
use App\Models\ExpelledStudentList;
use App\Models\School;
use App\Models\SoReport;
use App\Models\TimeTable;
use App\Models\User;
use Hamcrest\Core\IsNot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        return view('index',);
    }


    public function home()
    {

        if (Auth::guest()) {

            return redirect()->route('so.login');
        } else {


            return redirect()->route('so.home');
        }
    }

    public function adminHome()
    {

//        $x=Auth::user();
//        $x->password=bcrypt("AHSECfinal23");$x->save();
        if (Auth::guest()) {

            return redirect()->route('admin.login');

        } else {

            return redirect()->route('home');
        }
    }

    
}
