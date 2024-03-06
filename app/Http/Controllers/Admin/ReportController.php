<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
Use DB;
use Mail;
use Carbon\Carbon;
use Mpdf\Mpdf;
use Response;
class ReportController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function districtWiseList(){

        if (is_null($this->user) || !$this->user->can('reportView')) {
            //abort(403, 'Sorry !! You are Unauthorized to view !');
            return redirect()->route('mainLogin');
        }

        try{
            \LogActivity::addToLog('View districtWiseList.');

            $allDistrictList = DB::table('districts')->get();

            return view('admin.report.districtWiseList',compact('allDistrictList'));

        }catch (\Exception $e) {
            return redirect('/admin')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }
    }



    public function districtWiseListSearch(Request $request){


        if($request->district_id == 'all'){

            $allFdOneData = DB::table('fd_one_forms')->get();


        }else{

            $allFdOneData = DB::table('fd_one_forms')->where('district_id',$request->district_id)->get();
        }


        return view('admin.report.districtWiseListSearch',compact('allFdOneData'));

    }
}
