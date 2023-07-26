<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Illuminate\Support\Str;
use Mail;
use DB;
use Session;
use PDF;
use Carbon\Carbon;
use Response;
use App\Models\ForwardingLetter;
use App\Models\ForwardingLetterOnulipi;
use App\Models\SecruityCheck;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Http\Controllers\Admin\CommonController;
class Fd9Controller extends Controller
{
    public function index(){

     $dataFromNVisaFd9Fd1 = DB::table('fd9_forms')
    ->join('n_visas', 'n_visas.id', '=', 'fd9_forms.n_visa_id')
    ->join('fd_one_forms', 'fd_one_forms.id', '=', 'n_visas.fd_one_form_id')
    ->orderBy('fd9_forms.id','desc')
    ->get();

    //dd($dataFromNVisaFd9Fd1);
        return view('admin.fd9form.index',compact('dataFromNVisaFd9Fd1'));

    }

    public function downloadForwardingLetter($id){


        $dataFromNVisaFd9Fd1 = DB::table('fd9_forms')
        ->join('n_visas', 'n_visas.id', '=', 'fd9_forms.n_visa_id')
        ->join('fd_one_forms', 'fd_one_forms.id', '=', 'n_visas.fd_one_form_id')
        ->select('fd_one_forms.*','fd9_forms.*','n_visas.*','n_visas.id as nVisaId')
        ->where('fd9_forms.id',$id)
        ->first();


        $ngoStatus = DB::table('ngo_statuses')
        ->where('fd_one_form_id',$dataFromNVisaFd9Fd1->fd_one_form_id)->first();

        //dd($dataFromNVisaFd9Fd1->nVisaId);

   $nVisaAuthPerson = DB::table('n_visa_authorized_personal_of_the_orgs')
                      ->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->first();

   $nVisaCompensationAndBenifits = DB::table('n_visa_compensation_and_benifits')
                      ->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->get();

   $nVisaEmploye = DB::table('n_visa_employment_information')
                      ->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->first();

   $nVisaManPower = DB::table('n_visa_manpower_of_the_offices')
                      ->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->first();

   $nVisaDocs = DB::table('n_visa_necessary_document_for_work_permits')
                      ->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->first();

   $nVisaForeignerInfo = DB::table('n_visa_particulars_of_foreign_incumbnets')
                      ->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->first();

    $nVisaSponSor = DB::table('n_visa_particular_of_sponsor_or_employers')
                      ->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->first();

   $nVisaWorkPlace = DB::table('n_visa_work_place_addresses')
                      ->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->first();



                      $file_Name_Custome = "ForwardingLetter";
        $pdf=PDF::loadView('admin.fd9form.downloadForwardingLetter',[

            'ngoStatus'=>$ngoStatus,
            'nVisaWorkPlace'=>$nVisaWorkPlace,
            'nVisaSponSor'=>$nVisaSponSor,
            'nVisaForeignerInfo'=>$nVisaForeignerInfo,
            'nVisaDocs'=>$nVisaDocs,


            'nVisaManPower'=>$nVisaManPower,
            'nVisaEmploye'=>$nVisaEmploye,
            'nVisaCompensationAndBenifits'=>$nVisaCompensationAndBenifits,
            'dataFromNVisaFd9Fd1'=>$dataFromNVisaFd9Fd1,
            'nVisaAuthPerson'=>$nVisaAuthPerson,

        ],[],['format' => 'A4']);
    return $pdf->stream($file_Name_Custome.''.'.pdf');


    }


    public function show($id){


     $dataFromNVisaFd9Fd1 = DB::table('fd9_forms')
     ->join('n_visas', 'n_visas.id', '=', 'fd9_forms.n_visa_id')
     ->join('fd_one_forms', 'fd_one_forms.id', '=', 'n_visas.fd_one_form_id')
     ->select('fd_one_forms.*','fd9_forms.*','n_visas.*','n_visas.id as nVisaId')
     ->where('fd9_forms.id',$id)
     ->first();


     $ngoStatus = DB::table('ngo_statuses')
     ->where('fd_one_form_id',$dataFromNVisaFd9Fd1->fd_one_form_id)->first();

     //dd($dataFromNVisaFd9Fd1->nVisaId);

$nVisaAuthPerson = DB::table('n_visa_authorized_personal_of_the_orgs')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->first();

$nVisaCompensationAndBenifits = DB::table('n_visa_compensation_and_benifits')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->get();

$nVisaEmploye = DB::table('n_visa_employment_information')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->first();

$nVisaManPower = DB::table('n_visa_manpower_of_the_offices')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->first();

$nVisaDocs = DB::table('n_visa_necessary_document_for_work_permits')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->first();

$nVisaForeignerInfo = DB::table('n_visa_particulars_of_foreign_incumbnets')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->first();

 $nVisaSponSor = DB::table('n_visa_particular_of_sponsor_or_employers')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->first();

$nVisaWorkPlace = DB::table('n_visa_work_place_addresses')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->first();




         return view('admin.fd9form.show',compact('ngoStatus','nVisaWorkPlace','nVisaSponSor','nVisaForeignerInfo','nVisaDocs','nVisaManPower','nVisaEmploye','nVisaCompensationAndBenifits','dataFromNVisaFd9Fd1','nVisaAuthPerson'));

    }


    public function postForwardingLetter(Request $request){

        //dd($request->all());

        if ($request->hasfile('forwardingLetter')) {
            $filePath="forwardingLetter";
            $file = $request->file('forwardingLetter');

            $forwardingLetter=CommonController::pdfUpload($request,$file,$filePath);

        }else{
            $forwardingLetter = '';
        }


        DB::table('n_visas')->where('id', $request->id)
          ->update(
            array('forwarding_letter' => $forwardingLetter)
        );




        return redirect()->back()->with('success','Update Successfully');

    }


    public function fdNinePdfDownload($id){
        $data = DB::table('system_information')->first();
        $get_file_data = DB::table('fd9_forms')->where('id',$id)
        ->value('verified_fd_nine_form');

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

    public function nVisaDocumentDownload($cat,$id){
        $data = DB::table('system_information')->first();

        if($cat == 'nomination'){

            $get_file_data = DB::table('n_visa_necessary_document_for_work_permits')->where('id',$id)->value('nomination_letter_of_buyer');
        }elseif($cat == 'investment'){

            $get_file_data = DB::table('n_visa_necessary_document_for_work_permits')->where('id',$id)->value('registration_letter_of_board_of_investment');

        }elseif($cat == 'contract'){

            $get_file_data = DB::table('n_visa_necessary_document_for_work_permits')->where('id',$id)->value('employee_contract_copy');

        }elseif($cat == 'directors'){

            $get_file_data =DB::table('n_visa_necessary_document_for_work_permits')->where('id',$id)->value('board_of_the_directors_sign_letter');

        }elseif($cat == 'shareHolder'){

            $get_file_data = DB::table('n_visa_necessary_document_for_work_permits')->where('id',$id)->value('share_holder_copy');

        }elseif($cat == 'passportCopy'){

            $get_file_data = DB::table('n_visa_necessary_document_for_work_permits')->where('id',$id)->value('passport_photocopy');

        }elseif($cat == 'academicQualification'){

            $get_file_data = DB::table('fd9_forms')
            ->where('id',$id)->value('fd9_academic_qualification');

        }elseif($cat == 'techQualification'){

            $get_file_data = DB::table('fd9_forms')
            ->where('id',$id)->value('fd9_technical_and_other_qualifications_if_any');

        }elseif($cat == 'pastExperience'){

            $get_file_data = DB::table('fd9_forms')
            ->where('id',$id)->value('fd9_past_experience');

        }elseif($cat == 'offeredPost'){

            $get_file_data = DB::table('fd9_forms')
            ->where('id',$id)->value('fd9_offered_post');

        }elseif($cat == 'proposedProject'){

            $get_file_data = DB::table('fd9_forms')
            ->where('id',$id)->value('fd9_name_of_proposed_project');

        }elseif($cat == 'copyOfPassport'){

            $get_file_data = DB::table('fd9_forms')
            ->where('id',$id)->value('fd9_copy_of_passport');

        }
        elseif($cat == 'forwarding_letter'){

            $get_file_data = DB::table('n_visas')->where('id', $id)
            ->value('forwarding_letter');

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



public function forwardingLetterPost(Request $request){


    $request->validate([
        'sarok_number' => 'required|string|max:150'
    ]);


    $forwardingLetterPost = new ForwardingLetter();
    $forwardingLetterPost->fd9_form_id = $request->fd9_id;
    $forwardingLetterPost->admin_id  = $request->admin_id;
    $forwardingLetterPost->apply_date = date('d');
    $forwardingLetterPost->apply_month_name	 = date('F');
    $forwardingLetterPost->apply_year_name	 = date('Y');
    $forwardingLetterPost->sarok_number = $request->sarok_number;
    $forwardingLetterPost->save();

    $forwardingLetterPostId = $forwardingLetterPost->id;

    $number=count($request->name);

    if($number >0){
        for($i=0;$i<$number;$i++){

            $forwardingLetterPostON = new ForwardingLetterOnulipi();
            $forwardingLetterPostON->forwarding_letter_id = $forwardingLetterPostId;
            $forwardingLetterPostON->onulipi_name  =$request->name[$i];
            $forwardingLetterPostON->save();

        }




    }

    return redirect()->back()->with('success','Created successfully!');

}



public function submitForCheck(Request $request){


     $fd9FormId = $request->id;


    $data = CommonController::apiData($fd9FormId);

    $dataFromNew = DB::table('fd9_forms')
    ->join('n_visas', 'n_visas.id', '=', 'fd9_forms.n_visa_id')
    ->join('fd_one_forms', 'fd_one_forms.id', '=', 'n_visas.fd_one_form_id')
    ->select('fd_one_forms.*','fd9_forms.*','n_visas.*','n_visas.id as nVisaId')
    ->where('fd9_forms.id',$fd9FormId)
    ->first();

    //dd($dataFromNew->nVisaId);

    //dd($jayParsedAry['data']);
    //dd($jayParsedAry['data']['tracking-no']);
    //dd($jayParsedAry['data']['status_id']);
    //dd($jayParsedAry['data']['status_name']);

    $response12 = Http::post('https://mohaapi-uat.oss.net.bd/v1/oauth/token', [
        'client_id' => 5,
        'client_secret' => 'MS1LDLK3DPj0NGFBju55GG6KMPCtTuGOamDoZtKw',
        'grant_type'=>'client_credentials'

    ]);



$jsonData = $response12->json();

$mainToken = $jsonData['access_token'];



//dd($data);


    $client = new Client();
    $url = "https://mohaapi-uat.oss.net.bd/v1/api/application-submission";
    $response = $client->post($url,[
        'headers' => ['Content-type' => 'application/json', 'Authorization' => 'Bearer ' . $mainToken],

        'body' => json_encode($data),
    ]);

    $response = $response->getBody()->getContents();

    $covertArray = json_decode($response,true);

    //dd($covertArray);


    //dd($covertArray->data->tracking-no);
    $trackingNumber =$covertArray['data']['tracking-no'];
    $statusId = $covertArray['data']['status_id'];
    $statusName = $covertArray['data']['status_name'];


    $newCode = new SecruityCheck();
    $newCode->n_visa_id = $dataFromNew->nVisaId;
    $newCode->request_id =  Session::get('request_id'); ;
    $newCode->tracking_no = $trackingNumber;
    $newCode->statusName = $statusName ;
    $newCode->statusId = $statusId ;
    $newCode->save();



return redirect()->route('fd9Form.show',$fd9FormId)->with('success','Send Successfully');

}
}
