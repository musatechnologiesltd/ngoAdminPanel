<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
Use DB;
use Mail;
use Carbon\Carbon;
use App\Models\NgoFDNineDak;
use App\Models\NgoFDNineOneDak;
use App\Models\NgoNameChangeDak;
use App\Models\NgoRenewDak;
use App\Models\NgoFdSixDak;
use App\Models\NgoFdSevenDak;
use App\Models\NgoRegistrationDak;
class NameCangeController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }



    public function newNameChangeList(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('name_change_view')) {
          return redirect()->route('mainLogin');
        }

        \LogActivity::addToLog('new name change list ');


        if(Auth::guard('admin')->user()->designation_list_id == 2 || Auth::guard('admin')->user()->designation_list_id == 1){


            $allDataForNewList = DB::table('ngo_name_changes')->where('status','Ongoing')->latest()->get();

        }else{


            $ngoStatusNameChange = NgoNameChangeDak::where('status',1)
            ->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest()->get();

            $convertNameTitle = $ngoStatusNameChange->implode("name_change_status_id", " ");
            $separatedDataTitle = explode(" ", $convertNameTitle);

            $allDataForNewList = DB::table('ngo_name_changes')
            ->whereIn('id',$separatedDataTitle)
            ->where('status','Ongoing')->latest()->get();

        }

        return view('admin.name_change_list.new_name_change_list',compact('allDataForNewList'));
    }


    public function revisionNameChangeList(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('name_change_view')) {
            return redirect()->route('mainLogin');
        }

        \LogActivity::addToLog('revision name change list ');


        if(Auth::guard('admin')->user()->designation_list_id == 2 || Auth::guard('admin')->user()->designation_list_id == 1){


                $allDataForNewList = DB::table('ngo_name_changes')->whereIn('status',['Rejected','Correct'])->latest()->get();

        }else{


                $ngoStatusNameChange = NgoNameChangeDak::where('status',1)
                ->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest()->get();

                $convertNameTitle = $ngoStatusRenew->implode("name_change_status_id", " ");
                $separatedDataTitle = explode(" ", $convertNameTitle);

                $allDataForNewList = DB::table('ngo_name_changes')
                ->whereIn('id',$separatedDataTitle)
                ->whereIn('status',['Rejected','Correct'])->latest()->get();

        }

        return view('admin.name_change_list.revision_name_change_list',compact('allDataForNewList'));
    }


    public function alreadNameChangeList(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('name_change_view')) {
            return redirect()->route('mainLogin');
        }

        \LogActivity::addToLog('already name changed list ');


        if(Auth::guard('admin')->user()->designation_list_id == 2 || Auth::guard('admin')->user()->designation_list_id == 1){


                $allDataForNewList = DB::table('ngo_name_changes')->where('status','Accepted')->latest()->get();

        }else{


                $ngoStatusNameChange = NgoNameChangeDak::where('status',1)
                ->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest()->get();

                $convertNameTitle = $ngoStatusRenew->implode("name_change_status_id", " ");
                $separatedDataTitle = explode(" ", $convertNameTitle);

                $allDataForNewList = DB::table('ngo_name_changes')
                ->whereIn('id',$separatedDataTitle)
                ->where('status','Accepted')->latest()->get();

       }

        return view('admin.name_change_list.already_name_change_list',compact('allDataForNewList'));
    }


    public function nameChangeView($id){


        \LogActivity::addToLog('view name change detail ');

        $allNameChangeDoc = DB::table('name_change_docs')->where('ngo_name_change_id',$id)->get();
        $getformOneId = DB::table('ngo_name_changes')->where('id',$id)->first();
        $formOneData = DB::table('fd_one_forms')->where('id',$getformOneId->fd_one_form_id)->first();
        $rStatus = DB::table('ngo_statuses')->where('fd_one_form_id',$formOneData->id)->value('status');
        $nameChangeStatus = DB::table('ngo_name_changes')->where('id',$id)->value('status');
        $renewStatus = DB::table('ngo_renews')->where('fd_one_form_id',$formOneData->id)->value('status');

        $checkOldorNew = DB::table('ngo_type_and_languages')->where('user_id',$formOneData->user_id)->value('ngo_type_new_old');

        if($checkOldorNew == 'Old'){

            $allDataForNewListAll = DB::table('ngo_renews')->where('fd_one_form_id',$formOneData->id)->first();
        }else{

            $allDataForNewListAll = DB::table('ngo_statuses')->where('fd_one_form_id',$formOneData->id)->first();
        }

        $formEightData = DB::table('form_eights')->where('fd_one_form_id',$formOneData->id)->get();
        $form_member_data = DB::table('ngo_member_lists')->where('fd_one_form_id',$formOneData->id)->get();
        $formMemberDataDocRenew = DB::table('ngo_renew_infos')->where('fd_one_form_id',$formOneData->id)->get();
        $durationListAll1 = DB::table('ngo_durations')->where('fd_one_form_id',$formOneData->id)->value('ngo_duration_end_date');
        $durationListAll = DB::table('ngo_durations')->where('fd_one_form_id',$formOneData->id)->value('ngo_duration_start_date');
        $formMemberDataDoc = DB::table('ngo_member_nid_photos')->where('fd_one_form_id',$formOneData->id)->get();
        $formNgoDataDoc = DB::table('ngo_other_docs')->where('fd_one_form_id',$formOneData->id)->get();
        $usersInfo = DB::table('users')->where('id',$formOneData->user_id)->first();
        $allSourceOfFund = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$formOneData->id)->get();
        $allPartiw = DB::table('fd_one_member_lists')->where('fd_one_form_id',$formOneData->id)->get();
        $getAllDataAdviserBank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$formOneData->id)->first();
        $getAllDataOther= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$formOneData->id)->get();
        $getAllDataAdviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$formOneData->id)->get();

        return view('admin.name_change_list.name_change_view',compact('allNameChangeDoc','getformOneId','durationListAll1','durationListAll','renewStatus','nameChangeStatus','rStatus','formMemberDataDocRenew','getAllDataAdviser','getAllDataOther','getAllDataAdviserBank','allPartiw','allSourceOfFund','usersInfo','formNgoDataDoc','formMemberDataDoc','formMemberData','formEightData','allDataForNewListAll','formOneData'));
    }


    public function updateStatusNameChangeForm(Request $request){

        \LogActivity::addToLog('update name change status');

        $data_save = DB::table('ngo_name_changes')->where('id',$request->id)
        ->update([
            'status' => $request->status,
            'comment' => $request->comment,
        ]);


        $getUserId = DB::table('ngo_name_changes')->where('id',$request->id)->value('fd_one_form_id');
        $presentNameEng = DB::table('ngo_name_changes')->where('id',$request->id)->value('present_name_eng');
        $presentNameBan = DB::table('ngo_name_changes')->where('id',$request->id)->value('present_name_ban');
        $formOneData = DB::table('fd_one_forms')->where('id',$getUserId)->first();


        if($request->status == 'Accepted'){

            DB::table('fd_one_forms')->where('id', $formOneData->id)
            ->update([
                'organization_name' => $presentNameEng,
                'organization_name_ban' => $presentNameBan,
             ]);
        }
        Mail::send('emails.passwordResetEmailName', ['comment'=>$request->comment,'id' => $request->status,'ngoId'=>$formOneData->id], function($message) use($request){
            $message->to($request->email);
            $message->subject('NGOAB Registration Service || Ngo Name Chnage Status');
        });

        return redirect()->back()->with('success','Updated Successfully');
    }


    public function nameChangeDoc($id){

        \LogActivity::addToLog('download name change pdf ');

        $formOneData = DB::table('name_change_docs')->where('id',$id)->value('pdf_file_list');

        return view('admin.name_change_list.nameChangeDoc',compact('formOneData'));

    }
}
