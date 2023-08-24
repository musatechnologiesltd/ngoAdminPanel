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
use App\Models\NgoRegistrationDak;
use App\Models\DesignationList;
use App\Models\DesignationStep;
use App\Models\AdminDesignationHistory;
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

    public function dakListFirstStep(Request $request){

        // dd($request->all());


         $number=count($request->admin_id);

    if($number >0){
        for($i=0;$i<$number;$i++){




         $regDakData = new NgoRegistrationDak();
         $regDakData->sender_admin_id =Auth::guard('admin')->user()->id;
         $regDakData->receiver_admin_id = $request->admin_id[$i];
         $regDakData->registration_status_id =$request->main_id;
         $regDakData->status = 0;
         $regDakData->save();

        }


    }


    return redirect('admin/showDataAll/registration/'.$request->main_id);


    }

    public function showDataAll($status,$id){
        $mainstatus = $status;
        $id = $id;


        if($mainstatus == 'registration'){


            $allRegistrationDak = NgoRegistrationDak::where('status',0)
            ->where('sender_admin_id',Auth::guard('admin')->user()->id)
            ->where('registration_status_id',$id)->latest()->get();

        }elseif($mainstatus == 'renew'){


        }


        return view('admin.post.show',compact('mainstatus','id','allRegistrationDak'));

    }

    public function createSeal($id){

        $id = $id;


         $totalBranch = Branch::where('id','!=',1)->count();
         $totalDesignation = DesignationList::where('id','!=',1)->count();
         $totaluser = Admin::where('id','!=',1)->count();


          $totalDesignationWorking = AdminDesignationHistory::count();

         $totalDesignationId = AdminDesignationHistory::select('designation_list_id')->get();


         $convert_name_title = $totalDesignationId->implode("designation_list_id", " ");
         $separated_data_title = explode(" ", $convert_name_title);


       $totalEmptyDesignation = DesignationList::where('id','!=',1)->whereNotIn('id', $separated_data_title )->count();

         //dd($totalEmptyDesignation);

         $totalBranchList = Branch::where('id','!=',1)->get();

        return view('admin.post.createSeal',compact('id','totalBranchList','totalEmptyDesignation','totalBranch','totalDesignation','totaluser','totalDesignationWorking'));

    }


    public function showDataDesignationWise(Request $request){

        $mainstatus = $request->mainstatus;
        $totalBranch = $request->totalBranch;
        $totalDesi= $request->totalDesi;

      $id = $request->mainId;
        //dd($totalDesi);

    //     if(!empty($totalBranch) && !empty($totalDesi)){

    //      dd($totalBranch);

    //     }elseif(!empty($totalBranch)){

    // dd(2);

    //     }elseif(!empty($totalDesi)){

    //     dd(3);

    //     }

    if(empty($totalDesi)){

        $data = view('admin.post.showDataDesignationWiseEmpty')->render();
        return response()->json($data);
    }else{


    $totalBranchId = DesignationList::whereIn('id',$totalDesi)->select('branch_id')->get();

    $convert_name_title = $totalBranchId->implode("branch_id", " ");
    $separated_data_title = explode(" ", $convert_name_title);


    $totalBranchList = Branch::whereIn('id',$separated_data_title)->get();

    $adminDesignationHistory = AdminDesignationHistory::whereIn('designation_list_id',$totalDesi)->get();

        $data = view('admin.post.showDataDesignationWise',compact('id','totalDesi','adminDesignationHistory','totalBranchList'))->render();
        return response()->json($data);
    }
    }


}
