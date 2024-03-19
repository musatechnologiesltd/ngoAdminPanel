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
            $allFdOneData = DB::table('fd_one_forms')->get();
            $allDistrictList = DB::table('districts')->get();

            return view('admin.report.districtWiseList',compact('allDistrictList','allFdOneData'));

        }catch (\Exception $e) {
            return redirect()->back()->with('error','some thing went wrong ');
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


    public function localNgoListSearch(Request $request){


        if($request->district_id == 'all'){

            $localNgoListReport = DB::table('fd_one_forms')

            ->join('ngo_type_and_languages','ngo_type_and_languages.user_id','=','fd_one_forms.user_id')

            ->select('ngo_type_and_languages.id as lanId','ngo_type_and_languages.*','fd_one_forms.*')

            ->where('ngo_type_and_languages.ngo_type','দেশিও')
            ->orderBy('fd_one_forms.id','desc')
            ->get();


        }else{

            $localNgoListReport =DB::table('fd_one_forms')

            ->join('ngo_type_and_languages','ngo_type_and_languages.user_id','=','fd_one_forms.user_id')

            ->select('ngo_type_and_languages.id as lanId','ngo_type_and_languages.*','fd_one_forms.*')

            ->where('ngo_type_and_languages.ngo_type','দেশিও')
            ->where('fd_one_forms.district_id',$request->district_id)

            ->orderBy('fd_one_forms.id','desc')
            ->get();
        }


        return view('admin.report.localNgoListSearch',compact('localNgoListReport'));

    }


    public function localNgoListReport(){


        if (is_null($this->user) || !$this->user->can('reportView')) {
            //abort(403, 'Sorry !! You are Unauthorized to view !');
            return redirect()->route('mainLogin');
        }

        try{
            \LogActivity::addToLog('View localNgoListReport.');

            $allDistrictList = DB::table('districts')->get();


            $localNgoListReport = DB::table('fd_one_forms')

            ->join('ngo_type_and_languages','ngo_type_and_languages.user_id','=','fd_one_forms.user_id')

            ->select('ngo_type_and_languages.id as lanId','ngo_type_and_languages.*','fd_one_forms.*')

            ->where('ngo_type_and_languages.ngo_type','দেশিও')
            ->orderBy('fd_one_forms.id','desc')
            ->get();




            return view('admin.report.localNgoListReport',compact('localNgoListReport','allDistrictList'));

        }catch (\Exception $e) {
            return redirect()->back()->with('error','some thing went wrong ');
        }


    }



    public function foreignNgoListReport(){


        if (is_null($this->user) || !$this->user->can('reportView')) {
            //abort(403, 'Sorry !! You are Unauthorized to view !');
            return redirect()->route('mainLogin');
        }

        try{
            \LogActivity::addToLog('View foreignNgoListReport.');

            $allDistrictList = DB::table('districts')->get();


            $foreignNgoListReport = DB::table('fd_one_forms')

            ->join('ngo_type_and_languages','ngo_type_and_languages.user_id','=','fd_one_forms.user_id')

            ->select('ngo_type_and_languages.id as lanId','ngo_type_and_languages.*','fd_one_forms.*')

            ->where('ngo_type_and_languages.ngo_type','Foreign')
            ->orderBy('fd_one_forms.id','desc')
            ->get();

            return view('admin.report.foreignNgoListReport',compact('allDistrictList','foreignNgoListReport'));

        }catch (\Exception $e) {
            return redirect()->back()->with('error','some thing went wrong ');
        }


    }

    public function foreignNgoListSearch(Request $request){


        if($request->district_id == 'all'){

            $foreignNgoListReport = DB::table('fd_one_forms')

            ->join('ngo_type_and_languages','ngo_type_and_languages.user_id','=','fd_one_forms.user_id')

            ->select('ngo_type_and_languages.id as lanId','ngo_type_and_languages.*','fd_one_forms.*')

            ->where('ngo_type_and_languages.ngo_type','Foreign')
            ->orderBy('fd_one_forms.id','desc')
            ->get();


        }else{

            $foreignNgoListReport =DB::table('fd_one_forms')

            ->join('ngo_type_and_languages','ngo_type_and_languages.user_id','=','fd_one_forms.user_id')

            ->select('ngo_type_and_languages.id as lanId','ngo_type_and_languages.*','fd_one_forms.*')

            ->where('ngo_type_and_languages.ngo_type','Foreign')
            ->where('fd_one_forms.district_id',$request->district_id)

            ->orderBy('fd_one_forms.id','desc')
            ->get();
        }


        return view('admin.report.foreignNgoListSearch',compact('localNgoListReport'));

    }
}
