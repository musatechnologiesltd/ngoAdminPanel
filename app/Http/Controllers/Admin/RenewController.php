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
use Response;
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
        if (is_null($this->user) || !$this->user->can('renew_view')) {
            //abort(403, 'Sorry !! You are Unauthorized to view !');
            return redirect()->route('mainLogin');
        }


        \LogActivity::addToLog('View New Renew List.');


        $all_data_for_new_list = DB::table('ngo_renews')->where('status','Ongoing')->latest()->get();


      return view('admin.renew_list.new_renew_list',compact('all_data_for_new_list'));
    }


    public function revisionRenewList(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('renew_view')) {
            //abort(403, 'Sorry !! You are Unauthorized to view !');
            return redirect()->route('mainLogin');
        }


        \LogActivity::addToLog('View Revision Renew List.');


        $all_data_for_new_list = DB::table('ngo_renews')->whereIn('status',['Rejected','Correct'])->latest()->get();


      return view('admin.renew_list.revision_renew_list',compact('all_data_for_new_list'));
    }


    public function alreadyRenewList(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('renew_view')) {
            //abort(403, 'Sorry !! You are Unauthorized to view !');
            return redirect()->route('mainLogin');
        }

        \LogActivity::addToLog('View Already Renew List.');

        $all_data_for_new_list = DB::table('ngo_renews')->where('status','Accepted')->latest()->get();


      return view('admin.renew_list.already_renew_list',compact('all_data_for_new_list'));
    }


    public function renewView($id){

        \LogActivity::addToLog('View Renew Info .');



             try {

                $mainIdR = DB::table('ngo_renews')->where('id',$id)->first();

                $fdOneFormId = DB::table('ngo_renews')->where('id',$id)->first();

                $form_one_data = DB::table('fd_one_forms')->where('id',$fdOneFormId->fd_one_form_id)->first();

                $r_status = DB::table('ngo_statuses')->where('fd_one_form_id',$form_one_data->id)->value('status');
            $name_change_status = DB::table('ngo_name_changes')->where('fd_one_form_id',$form_one_data->id)->value('status');
            $renew_status = DB::table('ngo_renews')->where('id',$id)->value('status');


            $all_data_for_new_list_all = DB::table('ngo_statuses')->where('fd_one_form_id',$form_one_data->id)->first();

            $form_eight_data = DB::table('form_eights')->where('fd_one_form_id',$form_one_data->id)->get();
            $form_member_data = DB::table('ngo_member_lists')->where('fd_one_form_id',$form_one_data->id)->get();



            $renewInfoData = DB::table('ngo_renew_infos')->where('fd_one_form_id',$all_data_for_new_list_all->fd_one_form_id)->first();

            //dd($renewInfoData);



            $form_member_data_doc_renew = DB::table('ngo_renew_infos')->where('fd_one_form_id',$all_data_for_new_list_all->fd_one_form_id)->get();


 $duration_list_all1 = DB::table('ngo_durations')->where('fd_one_form_id',$all_data_for_new_list_all->fd_one_form_id)->value('ngo_duration_end_date');
            $duration_list_all = DB::table('ngo_durations')->where('fd_one_form_id',$all_data_for_new_list_all->fd_one_form_id)->value('ngo_duration_start_date');

            $form_member_data_doc = DB::table('ngo_member_nid_photos')->where('fd_one_form_id',$all_data_for_new_list_all->fd_one_form_id)->get();
            $form_ngo_data_doc = DB::table('ngo_other_docs')->where('fd_one_form_id',$all_data_for_new_list_all->fd_one_form_id)->get();

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



        return view('admin.renew_list.view',compact('renewInfoData','mainIdR','duration_list_all1','duration_list_all','renew_status','name_change_status','r_status','form_member_data_doc_renew','get_all_data_adviser','get_all_data_other','get_all_data_adviser_bank','all_partiw','all_source_of_fund','users_info','form_ngo_data_doc','form_member_data_doc','form_member_data','form_eight_data','all_data_for_new_list_all','form_one_data'));
    }


    public function updateStatusRenewForm(Request $request){

        \LogActivity::addToLog('Update Renew Status.');

        // $data_save = Renew::find($request->id);
        // $data_save->status = $request->status;
        // $data_save->save();

        DB::table('ngo_renews')->where('id',$request->id)
        ->update([
            'status' => $request->status,
            'comment' => $request->comment
        ]);

$get_user_id = DB::table('ngo_renews')->where('id',$request->id)->value('fd_one_form_id');


        if($request->status == 'Accepted'){

            $date = date('Y-m-d');
    $newDate = date('Y-m-d', strtotime($date. ' + 10 years'));

    DB::table('ngo_durations')->insert(
        [
        'fd_one_form_id' =>$get_user_id,
        'ngo_status' =>$request->status,
        'ngo_duration_end_date' =>$newDate,
        'ngo_duration_start_date' =>date('Y-m-d'),
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

        Mail::send('emails.passwordResetEmailRenew', ['id' => $request->status,'ngoId'=>$get_user_id], function($message) use($request){
            $message->to($request->email);
            $message->subject('NGOAB Registration Service || Ngo Renew Status');
        });

        return redirect()->back()->with('success','Updated Successfully');
    }


    public function foreginPdfDownload($id){

        \LogActivity::addToLog('renew pdf download.');

        $data = DB::table('system_information')->first();

        $get_file_data = DB::table('ngo_renew_infos')->where('id',base64_decode($id))->value('foregin_pdf');

        $file_path = $data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        // return Response::download($file,$filename.'.pdf', $headers);

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
    }


    public function foreginPdfDownloadOld($id){

        \LogActivity::addToLog('download renew pdf.');

        //dd(base64_decode($id));

        $data = DB::table('system_information')->first();

        $get_file_data = DB::table('fd_one_forms')->where('id',base64_decode($id))->value('foregin_pdf');


       // dd($get_file_data);
        $file_path = $data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        // return Response::download($file,$filename.'.pdf', $headers);

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
    }



    public function yearlyBudgetPdfDownload($id){

        \LogActivity::addToLog('download renew pdf.');

        $data = DB::table('system_information')->first();

        $get_file_data = DB::table('ngo_renew_infos')->where('id',base64_decode($id))->value('yearly_budget');

        $file_path = $data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        // return Response::download($file,$filename.'.pdf', $headers);

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
    }



    public function yearlyBudgetPdfDownloadOld($id){

        \LogActivity::addToLog('download renew pdf.');

        $data = DB::table('system_information')->first();

        $get_file_data = DB::table('fd_one_forms')->where('id',base64_decode($id))->value('annual_budget_file');

        $file_path = $data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        // return Response::download($file,$filename.'.pdf', $headers);

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
    }



    public function copyOfChalanPdfDownload($id){

        \LogActivity::addToLog('download renew pdf.');

        $data = DB::table('system_information')->first();


        $get_file_data = DB::table('ngo_renew_infos')->where('id',base64_decode($id))->value('copy_of_chalan');

        $file_path = $data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        // return Response::download($file,$filename.'.pdf', $headers);

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);

    }


    public function copyOfChalanPdfDownloadOld($id){

        \LogActivity::addToLog('download renew pdf.');

        $data = DB::table('system_information')->first();


        $get_file_data = DB::table('fd_one_forms')->where('id',base64_decode($id))->value('copy_of_chalan');

        $file_path = $data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        // return Response::download($file,$filename.'.pdf', $headers);

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);

    }

    public function dueVatPdfDownload($id){

        \LogActivity::addToLog('download renew pdf.');

        $data = DB::table('system_information')->first();


        $get_file_data = DB::table('ngo_renew_infos')->where('id',base64_decode($id))->value('due_vat_pdf');

        $file_path = $data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        // return Response::download($file,$filename.'.pdf', $headers);

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
    }


    public function dueVatPdfDownloadOld($id){


        \LogActivity::addToLog('download renew pdf.');
        $data = DB::table('system_information')->first();


        $get_file_data = DB::table('fd_one_forms')->where('id',base64_decode($id))->value('due_vat_pdf');

        $file_path = $data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        // return Response::download($file,$filename.'.pdf', $headers);

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
    }


        public function changeAcNumberDownload($id){

            \LogActivity::addToLog('download renew pdf.');

            $data = DB::table('system_information')->first();

            $get_file_data = DB::table('ngo_renew_infos')->where('id',base64_decode($id))->value('change_ac_number');

            $file_path = $data->system_url.'public/'.$get_file_data;
            $filename  = pathinfo($file_path, PATHINFO_FILENAME);

    $file=$data->system_url.'public/'.$get_file_data;

            $headers = array(
                      'Content-Type: application/pdf',
                    );

            // return Response::download($file,$filename.'.pdf', $headers);

            return Response::make(file_get_contents($file), 200, [
                'content-type'=>'application/pdf',
            ]);

        }


        public function changeAcNumberDownloadOld($id){

            \LogActivity::addToLog('download renew pdf.');

            $data = DB::table('system_information')->first();

            $get_file_data = DB::table('fd_one_forms')->where('id',base64_decode($id))->value('change_ac_number');

            $file_path = $data->system_url.'public/'.$get_file_data;
            $filename  = pathinfo($file_path, PATHINFO_FILENAME);

    $file=$data->system_url.'public/'.$get_file_data;

            $headers = array(
                      'Content-Type: application/pdf',
                    );

            // return Response::download($file,$filename.'.pdf', $headers);

            return Response::make(file_get_contents($file), 200, [
                'content-type'=>'application/pdf',
            ]);

        }


        public function verifiedFdEightDownload($id){

            //dd(11);

            \LogActivity::addToLog('download renew pdf.');

            $data = DB::table('system_information')->first();


            $get_file_data = DB::table('ngo_renew_infos')->where('id',base64_decode($id))->value('verified_form');




            $file_path = $data->system_url.'public/'.$get_file_data;
            $filename  = pathinfo($file_path, PATHINFO_FILENAME);

    $file=$data->system_url.'public/'.$get_file_data;



            $headers = array(
                      'Content-Type: application/pdf',
                    );

            // return Response::download($file,$filename.'.pdf', $headers);

            return Response::make(file_get_contents($file), 200, [
                'content-type'=>'application/pdf',
            ]);

        }



        public function verifiedFdEightDownloadOld($id){

            //dd(11);

            \LogActivity::addToLog('download renew pdf.');

            $data = DB::table('system_information')->first();


            $get_file_data = DB::table('fd_one_forms')->where('id',base64_decode($id))->value('verified_form');




            $file_path = $data->system_url.'public/'.$get_file_data;
            $filename  = pathinfo($file_path, PATHINFO_FILENAME);

    $file=$data->system_url.'public/'.$get_file_data;



            $headers = array(
                      'Content-Type: application/pdf',
                    );

            // return Response::download($file,$filename.'.pdf', $headers);

            return Response::make(file_get_contents($file), 200, [
                'content-type'=>'application/pdf',
            ]);

        }



        public function renewalFileDownload($title, $id){
            \LogActivity::addToLog('download renew pdf.');

            $data = DB::table('system_information')->first();
            if($title == 'trustees'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('list_of_board_of_directors_or_board_of_trustees');
            }elseif($title == 'laws_or_constitution'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('organization_by_laws_or_constitution');
            }elseif($title == 'work_procedure'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('work_procedure_of_organization');
            }elseif($title == 'last_ten_years'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('last_ten_years_audit_report_and_annual_report_of_the_company');
            }elseif($title == 'registration_or_renewal_certificate'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('attested_copy_of_latest_registration_or_renewal_certificate');
            }elseif($title == 'registration_certificate'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('registration_certificate');
            }elseif($title == 'right_to_information_act'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('right_to_information_act');
            }elseif($title == 'fee_if_changed'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('the_constitution_of_the_company_along_with_fee_if_changed');
            }elseif($title == 'primary_registering_authority'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('constitution_approved_by_primary_registering_authority');
            }elseif($title == 'clean_copy_of_the_constitution'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('clean_copy_of_the_constitution');
            }elseif($title == 'payment_of_change_fee'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('payment_of_change_fee');
            }elseif($title == 'section_sub_section_of_the_constitution'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('section_sub_section_of_the_constitution');
            }elseif($title == 'previous_constitution'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('previous_constitution_and_current_constitution_compare');
            }elseif($title == 'organization_if_unchanged'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('constitution_of_the_organization_if_unchanged');
            }elseif($title == 'nid_and_image_of_executive_committee_members'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('nid_and_image_of_executive_committee_members');
            }elseif($title == 'approval_of_executive_committee'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('approval_of_executive_committee');
            }elseif($title == 'committee_members_list'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('committee_members_list');
            }elseif($title == 'registration_renewal_fee'){
                $get_file_data = DB::table('renewal_files')->where('id',$id)->value('registration_renewal_fee');
            }

            $file_path = $data->system_url.'public/'.$get_file_data;
            $filename  = pathinfo($file_path, PATHINFO_FILENAME);

    $file=$data->system_url.'public/'.$get_file_data;



            $headers = array(
                      'Content-Type: application/pdf',
                    );

    // return Response::download($file,$filename.'.pdf', $headers);

    return Response::make(file_get_contents($file), 200, [
    'content-type'=>'application/pdf',
    ]);


        }
}
