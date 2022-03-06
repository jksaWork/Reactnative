<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CustomerLoginController extends Controller
{
    public function Login(Request $request){
        // Auth::attempt(['email' => $email, 'password' => $password])
        $IsLoginDone = Auth::guard('customers')->attempt(['email' => $request->email, 'password' => $request->password]);
            if(!$IsLoginDone){
                notify()->error('error', 'Invalid Credinatial');
                return redirect()->back();
            }
        return redirect()->route('home');

    }
}
