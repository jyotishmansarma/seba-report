<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function schoolNameAjax(Request $request)
    {
        
        $m = School::where(['code' => $request->code])->first();
        if ($m) {
            return response()->json(['status' => 'success', 'message' => $m->school_name], 200);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'Invalid Institute Code Provided'], 200);
        }
    }
}
