<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Redirect;
use LogActivity;
class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;

    public function index(){

        if (Auth::guard('admin')->check()) {


            //\LogActivity::addToLog('Logged In.');

            return Redirect::to('/admin');
       } else {
        return view('admin.auth.login');
       }


    }




    public function store(Request $request){

  // Validate Login Data
  $request->validate([
    'email' => 'required|max:50',
    'password' => 'required',
]);

// Attempt to login
if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
    // Redirect to dashboard
    \LogActivity::addToLog('Logged In.');
    return redirect()->intended(route('admin.dashboard'))->with('success','Successully login');
} else {
    // Search using username
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        return back()->with('error','Access Denied,Call Administrator');
    }


    return back()->with('error','Invalid email and password :)');;
}

    }



    public function logout()
    {
        LogActivity::addToLog('Logged Out.');
        Auth::guard('admin')->logout();
        return redirect()->route('login.index')->with('success','Successully Logout');
    }
}
