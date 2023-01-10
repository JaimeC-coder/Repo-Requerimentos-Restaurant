<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;


class LoginController extends Controller
{
    //
    public function login(Request $request)
    {


        if (User::VerifyLogin($request->email, $request->password)!=null) {

            return view('dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
