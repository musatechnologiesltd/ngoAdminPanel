<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
Use DB;
use Mail;
use Carbon\Carbon;

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
           // abort(403, 'Sorry !! You are Unauthorized to view !');
           return redirect()->route('mainLogin');
        }

        \LogActivity::addToLog('new name change list ');


        $all_data_for_new_list = DB::table('ngo_name_changes')->where('status','Ongoing')->latest()->get();


      return view('admin.name_change_list.new_name_change_list',compact('all_data_for_new_list'));
    }


    public function revisionNameChangeList(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('name_change_view')) {
            //abort(403, 'Sorry !! You are Unauthorized to view !');
            return redirect()->route('mainLogin');
        }

        \LogActivity::addToLog('revision name change list ');


        $all_data_for_new_list = DB::table('ngo_name_changes')->where('status','Rejected')->latest()->get();


      return view('admin.name_change_list.revision_name_change_list',compact('all_data_for_new_list'));
    }


    public function alreadNameChangeList(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('name_change_view')) {
            //abort(403, 'Sorry !! You are Unauthorized to view !');
            return redirect()->route('mainLogin');
        }

        \LogActivity::addToLog('already name changed list ');


        $all_data_for_new_list = DB::table('ngo_name_changes')->where('status','Accepted')->latest()->get();


      return view('admin.name_change_list.already_name_change_list',compact('all_data_for_new_list'));
    }


    public function nameChangeView($id){


        \LogActivity::addToLog('view name change detail ');


             try {

                $allNameChangeDoc = DB::table('name_change_docs')->where('ngo_name_change_id',$id)->get();

                $getformOneId = DB::table('ngo_name_changes')->where('id',$id)->first();

                $form_one_data = DB::table('fd_one_forms')->where('id',$getformOneId->fd_one_form_id)->first();



                $r_status = DB::table('ngo_statuses')->where('fd_one_form_id',$form_one_data->id)->value('status');
                $name_change_status = DB::table('ngo_name_changes')->where('id',$id)->value('status');
                $renew_status = DB::table('ngo_renews')->where('fd_one_form_id',$form_one_data->id)->value('status');


                $all_data_for_new_list_all = DB::table('ngo_statuses')->where('fd_one_form_id',$form_one_data->id)->first();

                $form_eight_data = DB::table('form_eights')->where('fd_one_form_id',$form_one_data->id)->get();
                $form_member_data = DB::table('ngo_member_lists')->where('fd_one_form_id',$form_one_data->id)->get();


                $form_member_data_doc_renew = DB::table('ngo_renew_infos')->where('fd_one_form_id',$form_one_data->id)->get();


     $duration_list_all1 = DB::table('ngo_durations')->where('fd_one_form_id',$form_one_data->id)->value('ngo_duration_end_date');
                $duration_list_all = DB::table('ngo_durations')->where('fd_one_form_id',$form_one_data->id)->value('ngo_duration_start_date');

                $form_member_data_doc = DB::table('ngo_member_nid_photos')->where('fd_one_form_id',$form_one_data->id)->get();
                $form_ngo_data_doc = DB::table('ngo_other_docs')->where('fd_one_form_id',$form_one_data->id)->get();

                $users_info = DB::table('users')->where('id',$form_one_data->user_id)->first();

                $all_source_of_fund = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$form_one_data->id)->get();

                $all_partiw = DB::table('fd_one_member_lists')->where('fd_one_form_id',$form_one_data->id)->get();


                $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$form_one_data->id)
                ->first();


                $get_all_data_other= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$form_one_data->id)
                ->get();

                $get_all_data_adviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$form_one_data->id)
        ->get();


            //dd($users_info);
        } catch (Exception $e) {



            return $e->getMessage();

        }



        return view('admin.name_change_list.name_change_view',compact('allNameChangeDoc','getformOneId','duration_list_all1','duration_list_all','renew_status','name_change_status','r_status','form_member_data_doc_renew','get_all_data_adviser','get_all_data_other','get_all_data_adviser_bank','all_partiw','all_source_of_fund','users_info','form_ngo_data_doc','form_member_data_doc','form_member_data','form_eight_data','all_data_for_new_list_all','form_one_data'));
    }


    public function updateStatusNameChangeForm(Request $request){

        \LogActivity::addToLog('update name change status');

        $data_save = DB::table('ngo_name_changes')->where('id',$request->id)
        ->update([
            'status' => $request->status,
         ]);


        $get_user_id = DB::table('ngo_name_changes')->where('id',$request->id)->value('fd_one_form_id');


        $present_name_eng = DB::table('ngo_name_changes')->where('id',$request->id)->value('present_name_eng');
        $present_name_ban = DB::table('ngo_name_changes')->where('id',$request->id)->value('present_name_ban');

        $form_one_data = DB::table('fd_one_forms')->where('id',$get_user_id)->first();


        if($request->status == 'Accepted'){

            DB::table('fd_one_forms')->where('id', $form_one_data->id)
            ->update([
                'organization_name' => $present_name_eng,
                'organization_name_ban' => $present_name_ban,
             ]);
        }
        Mail::send('emails.passwordResetEmailName', ['id' => $request->status,'ngoId'=>$form_one_data->id], function($message) use($request){
            $message->to($request->email);
            $message->subject('NGOAB Registration Service || Ngo Name Chnage Status');
        });

        return redirect()->back()->with('success','Updated Successfully');
    }


    public function nameChangeDoc($id){

        \LogActivity::addToLog('download name change pdf ');

            $form_one_data = DB::table('name_change_docs')->where('id',$id)->value('pdf_file_list');



        return view('admin.name_change_list.nameChangeDoc',compact('form_one_data'));

    }
}
