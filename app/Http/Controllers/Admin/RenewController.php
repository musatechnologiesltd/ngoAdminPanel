<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
Use DB;
use Mail;
use App\Models\Ngostatus;
use App\Models\Namechange;
use App\Models\Renew;
use App\Models\Duration;
use Carbon\Carbon;
class RenewController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }







    public function newRenewList(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('register_new_list')) {
            abort(403, 'Sorry !! You are Unauthorized to view !');
        }


        $all_data_for_new_list = DB::table('renews')->where('status','Ongoing')->latest()->get();


      return view('admin.renew_list.new_renew_list',compact('all_data_for_new_list'));
    }


    public function revisionRenewList(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('register_new_list')) {
            abort(403, 'Sorry !! You are Unauthorized to view !');
        }


        $all_data_for_new_list = DB::table('renews')->where('status','Rejected')->latest()->get();


      return view('admin.renew_list.revision_renew_list',compact('all_data_for_new_list'));
    }


    public function alreadyRenewList(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('register_new_list')) {
            abort(403, 'Sorry !! You are Unauthorized to view !');
        }


        $all_data_for_new_list = DB::table('renews')->where('status','Accepted')->latest()->get();


      return view('admin.renew_list.already_renew_list',compact('all_data_for_new_list'));
    }


    public function renewView($id){





             try {

                $r_status = DB::table('ngo_statuses')->where('user_id',$id)->value('status');
            $name_change_status = DB::table('name_changes')->where('user_id',$id)->value('status');
            $renew_status = DB::table('renews')->where('user_id',$id)->value('status');


            $all_data_for_new_list_all = DB::table('ngo_statuses')->where('user_id',$id)->first();
            $form_one_data = DB::table('fd_one_forms')->where('user_id',$all_data_for_new_list_all->user_id)->first();
            $form_eight_data = DB::table('form_eights')->where('user_id',$all_data_for_new_list_all->user_id)->get();
            $form_member_data = DB::table('ngo_member_lists')->where('user_id',$all_data_for_new_list_all->user_id)->get();


            $form_member_data_doc_renew = DB::table('ngo_renew_infos')->where('user_id',$all_data_for_new_list_all->user_id)->get();


 $duration_list_all1 = DB::table('durations')->where('user_id',$all_data_for_new_list_all->user_id)->value('end_date');
            $duration_list_all = DB::table('durations')->where('user_id',$all_data_for_new_list_all->user_id)->value('start_date');

            $form_member_data_doc = DB::table('ngo_member_nid_photos')->where('user_id',$all_data_for_new_list_all->user_id)->get();
            $form_ngo_data_doc = DB::table('ngo_other_docs')->where('user_id',$all_data_for_new_list_all->user_id)->get();

            $users_info = DB::table('users')->where('id',$all_data_for_new_list_all->user_id)->first();

            $all_source_of_fund = DB::table('form_one_source_of_funds')->where('fd_one_form_id',$form_one_data->id)->get();

            $all_partiw = DB::table('form_one_member_lists')->where('fd_one_form_id',$form_one_data->id)->get();


            $get_all_data_adviser_bank = DB::table('form_one_bank_accounts')->where('fd_one_form_id',$form_one_data->id)
            ->first();


            $get_all_data_other= DB::table('form_one_other_pdf_lists')->where('fd_one_form_id',$form_one_data->id)
            ->get();

            $get_all_data_adviser = DB::table('form_one_adviser_lists')->where('fd_one_form_id',$form_one_data->id)
    ->get();


            //dd($users_info);
        } catch (Exception $e) {



            return $e->getMessage();

        }



        return view('admin.registration_list.registration_view',compact('duration_list_all1','duration_list_all','renew_status','name_change_status','r_status','form_member_data_doc_renew','get_all_data_adviser','get_all_data_other','get_all_data_adviser_bank','all_partiw','all_source_of_fund','users_info','form_ngo_data_doc','form_member_data_doc','form_member_data','form_eight_data','all_data_for_new_list_all','form_one_data'));
    }


    public function updateStatusRenewForm(Request $request){

        // $data_save = Renew::find($request->id);
        // $data_save->status = $request->status;
        // $data_save->save();

        DB::table('renews')->where('id',$request->id)
        ->update([
            'status' => $request->status
        ]);

$get_user_id = DB::table('renews')->where('id',$request->id)->value('user_id');


        if($request->status == 'Accepted'){

            $date = date('Y-m-d');
    $newDate = date('Y-m-d', strtotime($date. ' + 10 years'));

    DB::table('durations')->insert(
        [
        'user_id' =>$get_user_id,
        'status' =>$request->status,
        'end_date' =>$newDate,
        'start_date' =>date('Y-m-d'),
        'created_at' =>Carbon::now(),
        'updated_at' =>Carbon::now(),
    ]);

        // $data_save = new Duration();
        // $data_save->user_id = $get_user_id;
        // $data_save->status = $request->status;
        // $data_save->end_date = $newDate;
        // $data_save->start_date =date('Y-m-d');
        // $data_save->save();




        }

        Mail::send('emails.passwordResetEmail', ['id' => $request->status], function($message) use($request){
            $message->to($request->email);
            $message->subject('NGO AB');
        });

        return redirect()->back()->with('success','Updated Successfully');
    }
}
