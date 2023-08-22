<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Illuminate\Support\Str;
use Mail;
use DB;
use PDF;
use Carbon\Carbon;
use Response;
use App\Models\Branch;
use App\Models\ForwardingLetterOnulipi;
use App\Models\Admin;
use App\Models\DesignationList;
use App\Models\DesignationStep;
class PostController extends Controller
{
    public function index(){

        if(Auth::guard('admin')->user()->designation_list_id == 2 || Auth::guard('admin')->user()->designation_list_id == 1){

            $all_data_for_new_list = DB::table('ngo_statuses')->where('status','Ongoing')->latest()->get();

        }else{

        $all_data_for_new_list = DB::table('ngo_statuses')->where('status','Ongoing')->latest()->get();
        }

        return view('admin.post.index',compact('all_data_for_new_list'));


    }

    public function show($id){

        return view('admin.post.show');
    }

    public function createSeal(){
         $totalBranch = Branch::where('id','!=',1)->count();
         $totalDesignation = DesignationList::where('id','!=',1)->count();
         $totaluser = Admin::where('id','!=',1)->count();


         $totalDesignationId = Admin::where('id','!=',1)->select('designation_list_id')->get();


         



        return view('admin.post.createSeal',compact('totalBranch','totalDesignation','totaluser'));

    }


}
