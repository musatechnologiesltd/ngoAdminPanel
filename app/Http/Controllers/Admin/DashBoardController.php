<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use DB;
use Carbon\Carbon;
use App\Models\SystemInformation;
class DashBoardController extends Controller
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

        if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            //abort(403, 'Sorry !! You are Unauthorized to View !');
            return redirect()->route('mainLogin');
               }








               $count_admin = Admin::where('id','!=',1)->count();

               $totalRegisteredNgo = DB::table('ngo_statuses')->where('status','Accepted')->count();
               $totalRejectedNgo = DB::table('ngo_statuses')->where('status','Rejected')->count();



               $totalRenewNgoRequest = DB::table('ngo_renews')->count();
               $totalRejectedRenewNgoRequest = DB::table('ngo_renews')->where('status','Rejected')->count();

               $totalNameChangeNgoRequest = DB::table('ngo_name_changes')->count();
               $totalRejectedNameChangeNgoRequest = DB::table('ngo_name_changes')->where('status','Rejected')->count();

       $all_data_for_new_list = DB::table('ngo_statuses')->where('status','Ongoing')->orWhere('status','Old Ngo Renew')->latest()->limit(5)->get();
       $all_data_for_new_list_name_change = DB::table('ngo_name_changes')->where('status','Ongoing')->latest()->limit(5)->get();
       $all_data_for_new_list_renew = DB::table('ngo_renews')->where('status','Ongoing')->latest()->limit(5)->get();
               return view('admin.dashboard.dashboard',compact(
       'totalRegisteredNgo','totalRejectedNgo','totalRenewNgoRequest','totalRejectedRenewNgoRequest','totalNameChangeNgoRequest','totalRejectedNameChangeNgoRequest','all_data_for_new_list',
                 'all_data_for_new_list_name_change',
                 'all_data_for_new_list_renew',
                   'count_admin'));
    }
}
