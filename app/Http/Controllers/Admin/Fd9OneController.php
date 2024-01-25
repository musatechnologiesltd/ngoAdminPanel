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
use Mpdf\Mpdf;
use Carbon\Carbon;
use Response;
use App\Models\ForwardingLetter;
use App\Models\ForwardingLetterOnulipi;
use App\Models\Fd9ForwardingLetterEdit;
use App\Models\NgoFDNineDak;
use App\Models\NgoFDNineOneDak;
use App\Models\NgoNameChangeDak;
use App\Models\NgoRenewDak;
use App\Models\NgoFdSixDak;
use App\Models\NgoFdSevenDak;
use App\Models\NgoRegistrationDak;
use App\Models\SecruityCheck;
class Fd9OneController extends Controller
{

    public function verified_fd_nine_one_download($id){

        \LogActivity::addToLog('verified_fd_nine_one_download');
        $id = $id;
        $fd9OneList = DB::table('fd9_one_forms')->where('id',$id)->first();
        $ngoListAll = DB::table('fd_one_forms')->where('id',$fd9OneList->fd_one_form_id)->first();
        $fileNameCustome = "Fd9.1_Form";

        $data =view('admin.fd9Oneform.verified_fd_nine_one_download',[

            'ngoListAll'=>$ngoListAll,
            'fd9OneList'=>$fd9OneList

        ])->render();


        $pdfFilePath =$fileNameCustome.'.pdf';


        $mpdf = new Mpdf([
        'default_font_size' => 14,
        'default_font' => 'nikosh'
        ]);

        $mpdf->WriteHTML($data);
        $mpdf->Output($pdfFilePath, "I");
        die();

    }

    public function index(){

        \LogActivity::addToLog('view fdNineOne List ');

        if(Auth::guard('admin')->user()->designation_list_id == 2 || Auth::guard('admin')->user()->designation_list_id == 1){

            $dataFromNVisaFd9Fd1 = DB::table('fd9_one_forms')
            ->join('fd_one_forms', 'fd9_one_forms.fd_one_form_id', '=', 'fd_one_forms.id')
            ->select('fd_one_forms.*','fd9_one_forms.*','fd9_one_forms.id as mainId','fd9_one_forms.chief_name as chiefName','fd9_one_forms.chief_desi as chiefDesi','fd9_one_forms.digital_signature as chiefSign','fd9_one_forms.digital_seal as chiefSeal')
            ->orderBy('fd9_one_forms.id','desc')
            ->get();

        }else{

            $ngoStatusFDNineOneDak = NgoFDNineOneDak::where('status',1)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest()->get();
            $convertNameTitle = $ngoStatusFDNineOneDak->implode("f_d_nine_one_status_id", " ");
            $separatedDataTitle = explode(" ", $convertNameTitle);

            $dataFromNVisaFd9Fd1 = DB::table('fd9_one_forms')
            ->join('fd_one_forms', 'fd9_one_forms.fd_one_form_id', '=', 'fd_one_forms.id')
            ->select('fd_one_forms.*','fd9_one_forms.*','fd9_one_forms.id as mainId','fd9_one_forms.chief_name as chiefName','fd9_one_forms.chief_desi as chiefDesi','fd9_one_forms.digital_signature as chiefSign','fd9_one_forms.digital_seal as chiefSeal')
            ->whereIn('fd9_one_forms.id',$separatedDataTitle)
            ->orderBy('fd9_one_forms.id','desc')->get();
        }

        return view('admin.fd9Oneform.index',compact('dataFromNVisaFd9Fd1'));

    }


    public function statusUpdateForFd9One(Request $request){


        \LogActivity::addToLog('update fdNineOne status update ');


        DB::table('fd9_one_forms')->where('id',$request->id)
        ->update([
            'status' => $request->status,
            'comment' => $request->comment,
        ]);

        $getUserId  =  DB::table('fd9_one_forms')->where('id',$request->id)->value('fd_one_form_id');

        if($request->status == 'Rejected' || $request->status == 'Correct'){

            Mail::send('emails.passwordResetEmailRenew', ['comment' => $request->comment,'id' => $request->status,'ngoId'=>$getUserId], function($message) use($request){
                $message->to($request->email);
                $message->subject('NGOAB Registration Service || Ngo Renew Status');
            });

        }
        return redirect()->back()->with('success','Updated successfully!');



    }

    public function show($id){

        \LogActivity::addToLog('view fdNineOne detail ');
        $mainIdFdNineOne = $id;
        $dataFromNVisaFd9Fd1 = DB::table('fd9_one_forms')
        ->join('fd_one_forms', 'fd9_one_forms.fd_one_form_id', '=', 'fd_one_forms.id')
        ->select('fd_one_forms.*','fd9_one_forms.*','fd9_one_forms.id as mainId','fd9_one_forms.chief_name as chiefName','fd9_one_forms.chief_desi as chiefDesi','fd9_one_forms.digital_signature as chiefSign','fd9_one_forms.digital_seal as chiefSeal','fd9_one_forms.created_at as chiefDate')
        ->orderBy('fd9_one_forms.id','desc')
        ->where('fd9_one_forms.id',$id)
        ->first();

        $get_email_from_user = DB::table('users')->where('id',$dataFromNVisaFd9Fd1->user_id)->value('email');
        $forwardId =  DB::table('forwarding_letters')->where('fd9_form_id',$dataFromNVisaFd9Fd1->mainId)->orderBy('id','desc')->value('id');
        $forwardingLetterOnulipi = ForwardingLetterOnulipi::where('forwarding_letter_id',$forwardId)->get();
        $editCheck = Fd9ForwardingLetterEdit::where('forwarding_letter_id',$forwardId)->orderBy('id','desc')->value('pdf_part_one');
        $editCheck1 = Fd9ForwardingLetterEdit::where('forwarding_letter_id',$forwardId)->orderBy('id','desc')->value('pdf_part_two');
        $ngoTypeData = DB::table('ngo_type_and_languages')->where('user_id',$dataFromNVisaFd9Fd1->user_id)->first();

        if($ngoTypeData->ngo_type_new_old == 'Old'){

            $ngoStatus = DB::table('ngo_renews')->where('fd_one_form_id',$dataFromNVisaFd9Fd1->fd_one_form_id)->first();

        }else{

            $ngoStatus = DB::table('ngo_statuses')->where('fd_one_form_id',$dataFromNVisaFd9Fd1->fd_one_form_id)->first();
        }

        $nVisabasicInfo = DB::table('n_visas')->where('fd9_one_form_id',$dataFromNVisaFd9Fd1->mainId)->first();
        $statusData = SecruityCheck::where('n_visa_id',$nVisabasicInfo->id)->value('created_at');
        $nVisaAuthPerson = DB::table('n_visa_authorized_personal_of_the_orgs')->where('n_visa_id',$nVisabasicInfo->id)->first();
        $nVisaCompensationAndBenifits = DB::table('n_visa_compensation_and_benifits')->where('n_visa_id',$nVisabasicInfo->id)->get();
        $nVisaEmploye = DB::table('n_visa_employment_information')->where('n_visa_id',$nVisabasicInfo->id)->first();
        $nVisaManPower = DB::table('n_visa_manpower_of_the_offices')->where('n_visa_id',$nVisabasicInfo->id)->first();
        $nVisaDocs = DB::table('n_visa_necessary_document_for_work_permits')->where('n_visa_id',$nVisabasicInfo->id)->first();
        $nVisaForeignerInfo = DB::table('n_visa_particulars_of_foreign_incumbnets')->where('n_visa_id',$nVisabasicInfo->id)->first();
        $nVisaSponSor = DB::table('n_visa_particular_of_sponsor_or_employers')->where('n_visa_id',$nVisabasicInfo->id)->first();
        $nVisaWorkPlace = DB::table('n_visa_work_place_addresses')->where('n_visa_id',$nVisabasicInfo->id)->first();

        return view('admin.fd9Oneform.show',
            compact(
                'get_email_from_user',
                'mainIdFdNineOne',
                'nVisabasicInfo',
                'dataFromNVisaFd9Fd1',
                'ngoTypeData',
                'forwardingLetterOnulipi',
                'editCheck1','editCheck','statusData',
                'ngoStatus',
                'nVisaWorkPlace',
                'nVisaSponSor',
                'nVisaForeignerInfo',
                'nVisaDocs','nVisaManPower',
                'nVisaEmploye',
                'nVisaCompensationAndBenifits',
                'nVisaAuthPerson'
            ));
    }

    public function fd9OneDownload($cat,$id){


        \LogActivity::addToLog('download fdNineOne pdf ');
        $data = DB::table('system_information')->first();

        if($cat == 'appoinmentLetter'){

            $getFileData = DB::table('fd9_one_forms')->where('id',$id)->value('attestation_of_appointment_letter');
        }elseif($cat == 'fd9Copy'){

            $getFileData = DB::table('fd9_one_forms')->where('id',$id)->value('copy_of_form_nine');

        }elseif($cat == 'visacopy'){

            $getFileData = DB::table('fd9_one_forms')->where('id',$id)->value('copy_of_nvisa');

        }

        $filePath = $data->system_url.'public/'.$getFileData;
        $filename  = pathinfo($filePath, PATHINFO_FILENAME);
        $file=$data->system_url.'public/'.$getFileData;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);

    }


    public function forwardingLetterForNothi($id){


        \LogActivity::addToLog('download forwardingLetterForNothi');

        $data = DB::table('system_information')->first();
        $getFileData = DB::table('n_visas')->where('id',$id)->value('forwarding_letter');

        $filePath = $data->system_admin_url.'public/'.$getFileData;
        $filename  = pathinfo($filePath, PATHINFO_FILENAME);
        $file=$data->system_admin_url.'public/'.$getFileData;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);


    }
}
