<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class ProfileController extends Controller
{

    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function index(){

        if (is_null($this->user) || !$this->user->can('profile.view')) {
               return redirect()->route('mainLogin');
               }

               \LogActivity::addToLog('view profile.');

        return view('admin.profile.profile');
    }
}
