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
use App\Models\ForwardingLetter;
use App\Models\ForwardingLetterOnulipi;
use App\Models\Fd9ForwardingLetterEdit;
use App\Models\SecruityCheck;
class Fd9OneController extends Controller
{
    public function index(){

        $dataFromNVisaFd9Fd1 = DB::table('fd9_one_forms')
       ->join('fd_one_forms', 'fd9_one_forms.fd_one_form_id', '=', 'fd_one_forms.id')
       ->select('fd_one_forms.*','fd9_one_forms.*','fd9_one_forms.id as mainId')
       ->orderBy('fd9_one_forms.id','desc')
       ->get();

       //dd($dataFromNVisaFd9Fd1);
           return view('admin.fd9Oneform.index',compact('dataFromNVisaFd9Fd1'));

       }


       public function statusUpdateForFd9One(Request $request){


        DB::table('fd9_one_forms')->where('id',$request->id)
        ->update([
            'status' => $request->status
        ]);


        return redirect()->back()->with('success','Updated successfully!');



       }

       public function show($id){


        $dataFromNVisaFd9Fd1 = DB::table('fd9_one_forms')
        ->join('fd_one_forms', 'fd9_one_forms.fd_one_form_id', '=', 'fd_one_forms.id')
        ->select('fd_one_forms.*','fd9_one_forms.*','fd9_one_forms.id as mainId')
        ->orderBy('fd9_one_forms.id','desc')
        ->where('fd9_one_forms.id',$id)
        ->first();


        $forwardId =  DB::table('forwarding_letters')->where('fd9_form_id',$dataFromNVisaFd9Fd1->mainId)
     ->orderBy('id','desc')->value('id');

     $forwardingLetterOnulipi = ForwardingLetterOnulipi::where('forwarding_letter_id',$forwardId)
     ->get();
     $editCheck = Fd9ForwardingLetterEdit::where('forwarding_letter_id',$forwardId)
     ->orderBy('id','desc')->value('pdf_part_one');


     $editCheck1 = Fd9ForwardingLetterEdit::where('forwarding_letter_id',$forwardId)
     ->orderBy('id','desc')->value('pdf_part_two');


     $ngoTypeData = DB::table('ngo_type_and_languages')
     ->where('user_id',$dataFromNVisaFd9Fd1->user_id)->first();

     $ngoStatus = DB::table('ngo_statuses')
     ->where('fd_one_form_id',$dataFromNVisaFd9Fd1->fd_one_form_id)->first();

     //dd($dataFromNVisaFd9Fd1->id);



     $nVisabasicInfo = DB::table('n_visas')
     ->where('fd9_one_form_id',$dataFromNVisaFd9Fd1->mainId)->first();

     $statusData = SecruityCheck::where('n_visa_id',$nVisabasicInfo->id)->value('created_at');



$nVisaAuthPerson = DB::table('n_visa_authorized_personal_of_the_orgs')
                   ->where('n_visa_id',$nVisabasicInfo->id)->first();

$nVisaCompensationAndBenifits = DB::table('n_visa_compensation_and_benifits')
                   ->where('n_visa_id',$nVisabasicInfo->id)->get();

$nVisaEmploye = DB::table('n_visa_employment_information')
                   ->where('n_visa_id',$nVisabasicInfo->id)->first();

$nVisaManPower = DB::table('n_visa_manpower_of_the_offices')
                   ->where('n_visa_id',$nVisabasicInfo->id)->first();

$nVisaDocs = DB::table('n_visa_necessary_document_for_work_permits')
                   ->where('n_visa_id',$nVisabasicInfo->id)->first();

$nVisaForeignerInfo = DB::table('n_visa_particulars_of_foreign_incumbnets')
                   ->where('n_visa_id',$nVisabasicInfo->id)->first();

 $nVisaSponSor = DB::table('n_visa_particular_of_sponsor_or_employers')
                   ->where('n_visa_id',$nVisabasicInfo->id)->first();

$nVisaWorkPlace = DB::table('n_visa_work_place_addresses')
                   ->where('n_visa_id',$nVisabasicInfo->id)->first();

        //dd($dataFromNVisaFd9Fd1);
            return view('admin.fd9Oneform.show',
            compact(
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
        $data = DB::table('system_information')->first();


        if($cat == 'appoinmentLetter'){

            $get_file_data = DB::table('fd9_one_forms')->where('id',$id)->value('attestation_of_appointment_letter');
        }elseif($cat == 'fd9Copy'){

            $get_file_data = DB::table('fd9_one_forms')->where('id',$id)->value('copy_of_form_nine');

        }elseif($cat == 'visacopy'){

            $get_file_data = DB::table('fd9_one_forms')->where('id',$id)->value('copy_of_nvisa');

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
