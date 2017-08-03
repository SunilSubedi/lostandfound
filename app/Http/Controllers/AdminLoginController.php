<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('guest:admins')->except('logout');
    }
    public function index()
    {
        return view('admin.login');
    }



    public function login(Request $request)
    {
       

       $this->validate($request,[
             'email' => 'required|email',
             'password' => 'required'
            ]);

          if(Auth::guard('admins')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
          {
            //die('hello');
             return redirect()->route('admin.dashboard');
          }
          return redirect()->back()->withInput($request->only('email','remember'));
    }
    public function logout()
    {
        Auth::guard('admins')->logout();
        return redirect()->route('admin.login');

    }
}
