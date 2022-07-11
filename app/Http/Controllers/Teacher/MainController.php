<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\So;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use PDF;

class MainController extends Controller
{
   
    public function firstChangePassword(Request $request)
    {


        if ($request->isMethod('get')) {
            return view('so.firstChangePassword');
        } else {

            $request->validate(
                ['password' => 'confirmed|min:5|max:23']
            );


            $password = Hash::make($request->password);
            So::where(['id' => Auth::id()])->update(['first_password_status' => 1, 'password' => $password]);
            session()->flash('message_p', 'Successfully Password Updated.');
            return redirect()->route('so.bankDetails');
        }

    }
}
