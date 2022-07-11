<?php

namespace App\Http\Controllers;

use App\Models\Admin\So;
use App\Models\Centerlist;
use App\Models\ExamRoutine;
use App\Models\ExpelledStudentList;
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $time_table = ExamRoutine::get();

        $date = [];
        $user = [];
        $total_student = [];
        $expelled=null;
        foreach ($time_table->unique('date') as $time_tables) {
            $date[] = $time_tables->date;
            $total_reports = SoReport::select(\DB::raw('count(DISTINCT so_id) as total_report'))->where('time_table_id',$time_tables->tt_id)->first();
            $user[] =  $total_reports->total_report;
            $total_student[] = SoReport::where('time_table_id', $time_tables->tt_id)->sum(\DB::raw('total_male_present + total_female_present'));

            $expelled = ExpelledStudentList::count();
        }

        return view('admin.home', compact(['time_table', 'date', 'user', 'total_student','expelled']));
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
