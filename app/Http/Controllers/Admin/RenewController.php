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
use Mpdf\Mpdf;
use Response;
use App\Models\NgoFDNineDak;
use App\Models\NgoFDNineOneDak;
use App\Models\NgoNameChangeDak;
use App\Models\NgoRenewDak;
use App\Models\NgoFdSixDak;
use App\Models\NgoFdSevenDak;
use App\Models\NgoRegistrationDak;
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


    public function viewFormEightPdf($id){


        $getAllDataNew = DB::table('ngo_renew_infos')->where('id',$id)->first();
        $allPartiw1 = DB::table('fd_one_forms')->where('id',$getAllDataNew->fd_one_form_id)->first();
        $allPartiw = DB::table('fd_one_member_lists')->where('fd_one_form_id',$getAllDataNew->fd_one_form_id)->get();
        $getAllDataAdviserBank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$getAllDataNew->fd_one_form_id)->first();

        $fileNameCustome = 'fd_eight_form';

        $data =view('admin.renewList.downloadRenewPdf',[

                'getAllDataNew'=>$getAllDataNew,
                'allPartiw1'=>$allPartiw1,
                'allPartiw'=>$allPartiw,
                'getAllDataAdviserBank'=>$getAllDataAdviserBank

            ])->render();


        $pdfFilePath =$fileNameCustome.'.pdf';

        $mpdf = new Mpdf([
        'default_font' => 'nikosh'
                        ]);

        $mpdf->WriteHTML($data);
        $mpdf->Output($pdfFilePath, "I");
        die();


    }

    public function newRenewList(Request $request){

        if (is_null($this->user) || !$this->user->can('renew_view')) {
           return redirect()->route('mainLogin');
        }


        \LogActivity::addToLog('View New Renew List.');

        if(Auth::guard('admin')->user()->designation_list_id == 2 || Auth::guard('admin')->user()->designation_list_id == 1){


          $allDataForNewList = DB::table('ngo_renews')->where('status','Ongoing')->latest()->get();

        }else{

            $ngoStatusRenew = NgoRenewDak::where('status',1)
            ->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest()->get();

            $convertNameTitle = $ngoStatusRenew->implode("renew_status_id", " ");
            $separatedDataTitle = explode(" ", $convertNameTitle);


            $allDataForNewList = DB::table('ngo_renews')
            ->whereIn('id',$separatedDataTitle)
            ->where('status','Ongoing')->latest()->get();


        }


      return view('admin.renewList.newRenewList',compact('allDataForNewList'));
    }


    public function revisionRenewList(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('renew_view')) {

           return redirect()->route('mainLogin');
        }


        \LogActivity::addToLog('View Revision Renew List.');



        if(Auth::guard('admin')->user()->designation_list_id == 2 || Auth::guard('admin')->user()->designation_list_id == 1){


            $allDataForNewList = DB::table('ngo_renews')
           ->whereIn('status',['Rejected','Correct'])->latest()->get();

        }else{

            $ngoStatusRenew = NgoRenewDak::where('status',1)
            ->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest()->get();

            $convertNameTitle = $ngoStatusRenew->implode("renew_status_id", " ");
            $separatedDataTitle = explode(" ", $convertNameTitle);


            $allDataForNewList = DB::table('ngo_renews')
            ->whereIn('id',$separatedDataTitle)
            ->whereIn('status',['Rejected','Correct'])->latest()->get();


            }


        $allDataForNewList = DB::table('ngo_renews')->whereIn('status',['Rejected','Correct'])->latest()->get();


      return view('admin.renewList.revisionRenewList',compact('allDataForNewList'));
    }


    public function alreadyRenewList(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('renew_view')) {
            return redirect()->route('mainLogin');
        }

          \LogActivity::addToLog('View Already Renew List.');


        if(Auth::guard('admin')->user()->designation_list_id == 2 || Auth::guard('admin')->user()->designation_list_id == 1){

            $allDataForNewList = DB::table('ngo_renews')->where('status','Accepted')->latest()->get();

        }else{

                $ngoStatusRenew = NgoRenewDak::where('status',1)
                ->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest()->get();

                $convertNameTitle = $ngoStatusRenew->implode("renew_status_id", " ");
                $separatedDataTitle = explode(" ", $convertNameTitle);


                $allDataForNewList = DB::table('ngo_renews')
                ->whereIn('id',$separatedDataTitle)
                ->where('status','Accepted')->latest()->get();


        }


        return view('admin.renewList.alreadyRenewList',compact('allDataForNewList'));
    }


    public function renewView($id){

        \LogActivity::addToLog('View Renew Info .');

        $mainIdR = DB::table('ngo_renews')->where('id',$id)->first();
        $fdOneFormId = DB::table('ngo_renews')->where('id',$id)->first();
        $formOneData = DB::table('fd_one_forms')->where('id',$fdOneFormId->fd_one_form_id)->first();
        $rStatus = DB::table('ngo_renews')->where('fd_one_form_id',$formOneData->id)->value('status');
        $nameChangeStatus = DB::table('ngo_name_changes')->where('fd_one_form_id',$formOneData->id)->value('status');
        $renewStatus = DB::table('ngo_renews')->where('id',$id)->value('status');
        $allDataForNewListAll = DB::table('ngo_renews')->where('fd_one_form_id',$formOneData->id)->first();
        $formEightData = DB::table('form_eights')->where('fd_one_form_id',$formOneData->id)->get();
        $formMemberData = DB::table('ngo_member_lists')->where('fd_one_form_id',$formOneData->id)->get();
        $renewInfoData = DB::table('ngo_renew_infos')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->first();
        $formMemberDataDocRenew = DB::table('ngo_renew_infos')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->get();
        $durationListAll1 = DB::table('ngo_durations')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->value('ngo_duration_end_date');
        $durationListAll = DB::table('ngo_durations')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->value('ngo_duration_start_date');
        $formMemberDataDoc = DB::table('ngo_member_nid_photos')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->get();
        $formNgoDataDoc = DB::table('ngo_other_docs')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->get();
        $usersInfo = DB::table('users')->where('id',$formOneData->user_id)->first();
        $allSourceOfFund = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$formOneData->id)->get();
        $allPartiw = DB::table('fd_one_member_lists')->where('fd_one_form_id',$formOneData->id)->get();
        $getAllDataAdviserBank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$formOneData->id)->first();
        $getAllDataOther= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$formOneData->id)->get();
        $getAllDataAdviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$formOneData->id)->get();

        return view('admin.renewList.view',compact('renewInfoData','mainIdR','durationListAll1','durationListAll','renewStatus','nameChangeStatus','rStatus','formMemberDataDocRenew','getAllDataAdviser','getAllDataOther','getAllDataAdviserBank','allPartiw','allSourceOfFund','usersInfo','formNgoDataDoc','formMemberDataDoc','formMemberData','formEightData','allDataForNewListAll','formOneData'));
    }


    public function updateStatusRenewForm(Request $request){

        \LogActivity::addToLog('Update Renew Status.');

        DB::table('ngo_renews')->where('id',$request->id)
        ->update([
            'status' => $request->status,
            'comment' => $request->comment
        ]);

        $getUserId = DB::table('ngo_renews')->where('id',$request->id)->value('fd_one_form_id');


        if($request->status == 'Accepted'){

            $date = date('Y-m-d');
            $newDate = date('Y-m-d', strtotime($date. ' + 10 years'));

            DB::table('ngo_durations')->insert(
                [
                'fd_one_form_id' =>$getUserId,
                'ngo_status' =>$request->status,
                'ngo_duration_end_date' =>$newDate,
                'ngo_duration_start_date' =>date('Y-m-d'),
                'created_at' =>Carbon::now(),
                'updated_at' =>Carbon::now(),
            ]);

        }

        Mail::send('emails.passwordResetEmailRenew', ['id' => $request->status,'ngoId'=>$getUserId], function($message) use($request){
            $message->to($request->email);
            $message->subject('NGOAB Registration Service || Ngo Renew Status');
        });

        return redirect()->back()->with('success','Updated Successfully');
    }


    public function foreginPdfDownload($id){

        \LogActivity::addToLog('renew pdf download.');

        $data = DB::table('system_information')->first();
        $getFileData = DB::table('ngo_renew_infos')->where('id',base64_decode($id))->value('foregin_pdf');

        $filePath = $data->system_url.'public/'.$getFileData;
        $fileName  = pathinfo($filePath, PATHINFO_FILENAME);
        $file=$data->system_url.'public/'.$getFileData;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
    }


    public function foreginPdfDownloadOld($id){

        \LogActivity::addToLog('download renew pdf.');

        $data = DB::table('system_information')->first();

        $getFileData = DB::table('fd_one_forms')->where('id',base64_decode($id))->value('foregin_pdf');
        $filePath = $data->system_url.'public/'.$getFileData;
        $fileName  = pathinfo($filePath, PATHINFO_FILENAME);
        $file=$data->system_url.'public/'.$getFileData;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
    }



    public function yearlyBudgetPdfDownload($id){

        \LogActivity::addToLog('download renew pdf.');

        $data = DB::table('system_information')->first();
        $getFileData = DB::table('ngo_renew_infos')->where('id',base64_decode($id))->value('yearly_budget_file');
        $filePath = $data->system_url.'public/'.$getFileData;
        $fileName  = pathinfo($filePath, PATHINFO_FILENAME);
        $file=$data->system_url.'public/'.$getFileData;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
    }



    public function yearlyBudgetPdfDownloadOld($id){

        \LogActivity::addToLog('download renew pdf.');

        $data = DB::table('system_information')->first();
        $getFileData = DB::table('fd_one_forms')->where('id',base64_decode($id))->value('annual_budget_file');
        $filePath = $data->system_url.'public/'.$getFileData;
        $fileName  = pathinfo($filePath, PATHINFO_FILENAME);
        $file=$data->system_url.'public/'.$getFileData;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
    }



    public function copyOfChalanPdfDownload($id){

        \LogActivity::addToLog('download renew pdf.');

        $data = DB::table('system_information')->first();
        $getFileData = DB::table('ngo_renew_infos')->where('id',base64_decode($id))->value('copy_of_chalan');
        $filePath = $data->system_url.'public/'.$getFileData;
        $fileName  = pathinfo($filePath, PATHINFO_FILENAME);
        $file=$data->system_url.'public/'.$getFileData;

        $headers = array(
                  'Content-Type: application/pdf',
                );


        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);

    }


    public function copyOfChalanPdfDownloadOld($id){

        \LogActivity::addToLog('download renew pdf.');

        $data = DB::table('system_information')->first();
        $getFileData = DB::table('fd_one_forms')->where('id',base64_decode($id))->value('copy_of_chalan');
        $filePath = $data->system_url.'public/'.$getFileData;
        $fileName  = pathinfo($filePath, PATHINFO_FILENAME);
        $file=$data->system_url.'public/'.$getFileData;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);

    }

    public function dueVatPdfDownload($id){

        \LogActivity::addToLog('download renew pdf.');

        $data = DB::table('system_information')->first();
        $getFileData = DB::table('ngo_renew_infos')->where('id',base64_decode($id))->value('due_vat_pdf');
        $filePath = $data->system_url.'public/'.$getFileData;
        $fileName  = pathinfo($filePath, PATHINFO_FILENAME);

        $file=$data->system_url.'public/'.$getFileData;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
    }


    public function dueVatPdfDownloadOld($id){


        \LogActivity::addToLog('download renew pdf.');

        $data = DB::table('system_information')->first();
        $getFileData = DB::table('fd_one_forms')->where('id',base64_decode($id))->value('due_vat_pdf');
        $filePath = $data->system_url.'public/'.$getFileData;
        $fileName  = pathinfo($filePath, PATHINFO_FILENAME);
        $file=$data->system_url.'public/'.$getFileData;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
    }


    public function changeAcNumberDownload($id){

            \LogActivity::addToLog('download renew pdf.');

            $data = DB::table('system_information')->first();
            $getFileData = DB::table('ngo_renew_infos')->where('id',base64_decode($id))->value('change_ac_number');
            $filePath = $data->system_url.'public/'.$getFileData;
            $fileName  = pathinfo($filePath, PATHINFO_FILENAME);
            $file=$data->system_url.'public/'.$getFileData;
            $headers = array(
                      'Content-Type: application/pdf',
                    );

            return Response::make(file_get_contents($file), 200, [
                'content-type'=>'application/pdf',
            ]);

    }


    public function changeAcNumberDownloadOld($id){

            \LogActivity::addToLog('download renew pdf.');

            $data = DB::table('system_information')->first();
            $getFileData = DB::table('fd_one_forms')->where('id',base64_decode($id))->value('change_ac_number');
            $filePath = $data->system_url.'public/'.$getFileData;
            $fileName  = pathinfo($filePath, PATHINFO_FILENAME);
            $file=$data->system_url.'public/'.$getFileData;

            $headers = array(
                      'Content-Type: application/pdf',
                    );

            return Response::make(file_get_contents($file), 200, [
                'content-type'=>'application/pdf',
            ]);

    }


    public function verifiedFdEightDownload($id){

        \LogActivity::addToLog('download renew pdf.');

        $data = DB::table('system_information')->first();
        $getFileData = DB::table('ngo_renew_infos')->where('id',base64_decode($id))->value('verified_form');
        $filePath = $data->system_url.'public/'.$getFileData;
        $fileName  = pathinfo($filePath, PATHINFO_FILENAME);
        $file=$data->system_url.'public/'.$getFileData;

        $headers = array(
                      'Content-Type: application/pdf',
                    );

        return Response::make(file_get_contents($file), 200, [
                'content-type'=>'application/pdf',
            ]);

    }



    public function verifiedFdEightDownloadOld($id){

        \LogActivity::addToLog('download renew pdf.');

        $data = DB::table('system_information')->first();
        $getFileData = DB::table('fd_one_forms')->where('id',base64_decode($id))->value('verified_form');
        $filePath = $data->system_url.'public/'.$getFileData;
        $fileName  = pathinfo($filePath, PATHINFO_FILENAME);
        $file=$data->system_url.'public/'.$getFileData;

        $headers = array(
                      'Content-Type: application/pdf',
                    );

        return Response::make(file_get_contents($file), 200, [
                'content-type'=>'application/pdf',
            ]);

    }



    public function renewalFileDownload($title, $id){

        \LogActivity::addToLog('download renew pdf.');

        $data = DB::table('system_information')->first();

            if($title == 'trustees'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('list_of_board_of_directors_or_board_of_trustees');
            }elseif($title == 'laws_or_constitution'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('organization_by_laws_or_constitution');
            }elseif($title == 'final_fd_eight_form'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('final_fd_eight_form');
            }elseif($title == 'work_procedure'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('work_procedure_of_organization');
            }elseif($title == 'last_ten_years'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('last_ten_years_audit_report_and_annual_report_of_the_company');
            }elseif($title == 'registration_or_renewal_certificate'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('attested_copy_of_latest_registration_or_renewal_certificate');
            }elseif($title == 'registration_certificate'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('registration_certificate');
            }elseif($title == 'right_to_information_act'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('right_to_information_act');
            }elseif($title == 'fee_if_changed'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('the_constitution_of_the_company_along_with_fee_if_changed');
            }elseif($title == 'primary_registering_authority'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('constitution_approved_by_primary_registering_authority');
            }elseif($title == 'clean_copy_of_the_constitution'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('clean_copy_of_the_constitution');
            }elseif($title == 'payment_of_change_fee'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('payment_of_change_fee');
            }elseif($title == 'section_sub_section_of_the_constitution'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('section_sub_section_of_the_constitution');
            }elseif($title == 'previous_constitution'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('previous_constitution_and_current_constitution_compare');
            }elseif($title == 'organization_if_unchanged'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('constitution_of_the_organization_if_unchanged');
            }elseif($title == 'nid_and_image_of_executive_committee_members'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('nid_and_image_of_executive_committee_members');
            }elseif($title == 'approval_of_executive_committee'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('approval_of_executive_committee');
            }elseif($title == 'committee_members_list'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('committee_members_list');
            }elseif($title == 'registration_renewal_fee'){
                $getFileData = DB::table('renewal_files')->where('id',$id)->value('registration_renewal_fee');
            }

            $filePath = $data->system_url.'public/'.$getFileData;
            $fileName  = pathinfo($filePath, PATHINFO_FILENAME);
            $file=$data->system_url.'public/'.$getFileData;
            $headers = array(
                      'Content-Type: application/pdf',
                    );
            return Response::make(file_get_contents($file), 200, [
             'content-type'=>'application/pdf',
           ]);


    }
}
