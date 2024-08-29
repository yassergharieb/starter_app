<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    public   function   showLoginPage()
    {
        return view("admin.auth.login");
    }

    public function submitLoginForm(Request $request)
    {
       $check =    auth("admin")
                  ->attempt(["email" =>  $request->email,
                           "password" =>$request->password
                  ]);
       if($check) {
           redirect()->route("admin.dashboard");
       } else  {
           abort(404);
       }

    }

    public function dashboard()
    {
        return view("admin.admin");
    }

    public function logout()
    {
        Session::flush();
        auth("admin")->logout();
        redirect()->route("admin.login");

    }
}
