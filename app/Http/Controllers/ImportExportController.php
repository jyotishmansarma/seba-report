<?php

namespace App\Http\Controllers;

use App\Imports\SchoolImport;
use App\Models\School;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function importExportView()
    {
        return view('import.import');
    }

    public function import(Request $request)
    {
        set_time_limit(-1);
        //ini_set('memory_limit', '1024M');

        $file = $request->file;//dd(memory_get_usage($file));
        try {

            Excel::import(new SchoolImport, request()->file('file'));
        } catch (Exception $e) {
            dd($e);

            return redirect()->back()->withInput()->withErrors(['Something went wrong']);
        }


        return back();
    }
    
}
