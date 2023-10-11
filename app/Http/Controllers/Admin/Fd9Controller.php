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
use File;
use Carbon\Carbon;
use Response;
use App\Models\Fd9ForwardingLetterEdit;
use App\Models\ForwardingLetter;
use App\Models\ForwardingLetterOnulipi;
use App\Models\SecruityCheck;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Http\Controllers\Admin\CommonController;
class Fd9Controller extends Controller
{




    public function statusUpdateForFd9(Request $request){


        \LogActivity::addToLog('update fdNine Status ');


        DB::table('fd9_forms')->where('id',$request->id)
        ->update([
            'status' => $request->status,
            'comment' => $request->comment,
        ]);



        if($request->status == 'Rejected' || $request->status == 'Correct'){

            Mail::send('emails.passwordResetEmailRenew', ['comment' => $request->comment,'id' => $request->status,'ngoId'=>$get_user_id], function($message) use($request){
                $message->to($request->email);
                $message->subject('NGOAB Registration Service || Ngo Renew Status');
            });

        }




        return redirect()->back()->with('success','Updated successfully!');



       }



    public function index(){

        \LogActivity::addToLog('view fdNine List ');

     $dataFromNVisaFd9Fd1 = DB::table('fd9_forms')
     ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd9_forms.fd_one_form_id')
     ->select('fd_one_forms.*','fd9_forms.*')
    ->orderBy('fd9_forms.id','desc')
    ->get();

    //dd($dataFromNVisaFd9Fd1);
        return view('admin.fd9form.index',compact('dataFromNVisaFd9Fd1'));

    }

    public function downloadForwardingLetter($id){

        \LogActivity::addToLog('download forwarding Letter');


        $dataFromNVisaFd9Fd1 = DB::table('fd9_one_forms')
        ->join('n_visas', 'n_visas.fd9_one_form_id', '=', 'fd9_one_forms.id')
        ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd9_one_forms.fd_one_form_id')
        ->select('fd_one_forms.*','fd9_one_forms.*','n_visas.*','n_visas.id as nVisaId')
        ->where('fd9_one_forms.id',$id)
        ->first();



        $forwardingLettreDate = ForwardingLetter::where('fd9_form_id',$id)
        ->orderBy('id','desc')->value('updated_at');


        $forwardId =  DB::table('forwarding_letters')->where('fd9_form_id',$id)
->orderBy('id','desc')->value('id');


               $forwardingLetterOnulipi = ForwardingLetterOnulipi::where('forwarding_letter_id',$forwardId)
                      ->get();

$editCheck = Fd9ForwardingLetterEdit::where('forwarding_letter_id',$forwardId)
->orderBy('id','desc')->value('pdf_part_one');


$editCheck1 = Fd9ForwardingLetterEdit::where('forwarding_letter_id',$forwardId)
->orderBy('id','desc')->value('pdf_part_two');

//dd($editCheck);


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



                      $file_Name_Custome ='WPN-'.date('d').date('F').date('Y').'-'.time().CommonController::generateRandomInteger();

                    $url = public_path('uploads/forwardingLetter');
                    //dd($url);


                        File::makeDirectory($url, 0777, true, true);



    //return $pdf->stream($file_Name_Custome.''.'.pdf');

   $previous =  DB::table('n_visas')
   ->where('id',$dataFromNVisaFd9Fd1->nVisaId)->value('forwarding_letter');

   //dd($previous);




    $pdf=PDF::loadView('admin.fd9form.downloadForwardingLetter',[
        'forwardingLettreDate'=>$forwardingLettreDate,
'editCheck'=>$editCheck,
'editCheck1'=>$editCheck1,
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

    ],[],['format' => 'A4'])->save($url. '/' .$file_Name_Custome.'.pdf');


    DB::table('n_visas')->where('id',$dataFromNVisaFd9Fd1->nVisaId)
          ->update(
            array('forwarding_letter' =>'uploads/forwardingLetter/'.$file_Name_Custome.'.pdf')
        );




    }


    public function show($id){

        \LogActivity::addToLog('view fdNine detail ');

$mainIdFdNine = $id;


     $dataFromNVisaFd9Fd1 = DB::table('fd9_forms')
    ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd9_forms.fd_one_form_id')
    ->select('fd_one_forms.*','fd9_forms.*')
    ->where('fd9_forms.id',$id)
     ->first();


     $forwardId =  DB::table('forwarding_letters')->where('fd9_form_id',$id)
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

     $statusData = SecruityCheck::where('n_visa_id',$dataFromNVisaFd9Fd1->id)->value('created_at');

$nVisaAuthPerson = DB::table('n_visa_authorized_personal_of_the_orgs')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->first();

$nVisaCompensationAndBenifits = DB::table('n_visa_compensation_and_benifits')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->get();

$nVisaEmploye = DB::table('n_visa_employment_information')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->first();

$nVisaManPower = DB::table('n_visa_manpower_of_the_offices')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->first();

$nVisaDocs = DB::table('n_visa_necessary_document_for_work_permits')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->first();

$nVisaForeignerInfo = DB::table('n_visa_particulars_of_foreign_incumbnets')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->first();

 $nVisaSponSor = DB::table('n_visa_particular_of_sponsor_or_employers')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->first();

$nVisaWorkPlace = DB::table('n_visa_work_place_addresses')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->first();




         return view('admin.fd9form.show_new',compact('mainIdFdNine','ngoTypeData','forwardingLetterOnulipi','editCheck1','editCheck','statusData','ngoStatus','nVisaWorkPlace','nVisaSponSor','nVisaForeignerInfo','nVisaDocs','nVisaManPower','nVisaEmploye','nVisaCompensationAndBenifits','dataFromNVisaFd9Fd1','nVisaAuthPerson'));

    }

    public function postForwardingLetterForEdit(Request $request){

        \LogActivity::addToLog('store forwarding Letter ');

//dd($request->all());

$forwardId =  DB::table('forwarding_letters')->where('fd9_form_id',$request->fd9_id)
->orderBy('id','desc')->value('id');


$editCheck = Fd9ForwardingLetterEdit::where('forwarding_letter_id',$forwardId)
->orderBy('id','desc')->value('id');


$number=count($request->name);
ForwardingLetterOnulipi::where('forwarding_letter_id',$forwardId)->delete();
if($number >0){
    for($i=0;$i<$number;$i++){

        $forwardingLetterPostON = new ForwardingLetterOnulipi();
        $forwardingLetterPostON->forwarding_letter_id = $forwardId;
        $forwardingLetterPostON->onulipi_name  =$request->name[$i];
        $forwardingLetterPostON->save();

    }

}


if(empty($editCheck)){


        $saveData = new Fd9ForwardingLetterEdit();
        $saveData->forwarding_letter_id  = $forwardId;
        $saveData->pdf_part_one =$request->pdf_body_one;
        $saveData->pdf_part_two=$request->pdf_body_two;
        $saveData->save();

}else{

    Fd9ForwardingLetterEdit::where('forwarding_letter_id', $forwardId)
    ->update([
        'pdf_part_one' => $request->pdf_body_one,
        'pdf_part_two' => $request->pdf_body_two
     ]);

}

    $uploadForwardingLetter = $this->downloadForwardingLetter($request->fd9_id);
    return redirect()->back()->with('success','Updated successfully!');

    }


    public function postForwardingLetter(Request $request){

        \LogActivity::addToLog('store forwarding letter');

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

        \LogActivity::addToLog('download fdNine pdf ');


        $data = DB::table('system_information')->first();



        $dataFromNVisaFd9Fd1 = DB::table('fd9_forms')
    ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd9_forms.fd_one_form_id')
    ->select('fd_one_forms.*','fd9_forms.*')
    ->where('fd9_forms.id',$id)
     ->first();


     //dd( $dataFromNVisaFd9Fd1);


     $forwardId =  DB::table('forwarding_letters')->where('fd9_form_id',$id)
     ->orderBy('id','desc')->value('id');

     $forwardingLetterOnulipi = ForwardingLetterOnulipi::where('forwarding_letter_id',$forwardId)
     ->get();
     $editCheck = Fd9ForwardingLetterEdit::where('forwarding_letter_id',$forwardId)
     ->orderBy('id','desc')->value('pdf_part_one');


     $editCheck1 = Fd9ForwardingLetterEdit::where('forwarding_letter_id',$forwardId)
     ->orderBy('id','desc')->value('pdf_part_two');


     $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')
     ->where('user_id',$dataFromNVisaFd9Fd1->user_id)->first();

     $ngoStatus = DB::table('ngo_statuses')
     ->where('fd_one_form_id',$dataFromNVisaFd9Fd1->fd_one_form_id)->first();

     //dd($dataFromNVisaFd9Fd1->id);

     $statusData = SecruityCheck::where('n_visa_id',$dataFromNVisaFd9Fd1->id)->value('created_at');

$nVisaAuthPerson = DB::table('n_visa_authorized_personal_of_the_orgs')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->first();

$nVisaCompensationAndBenifits = DB::table('n_visa_compensation_and_benifits')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->get();

$nVisaEmploye = DB::table('n_visa_employment_information')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->first();

$nVisaManPower = DB::table('n_visa_manpower_of_the_offices')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->first();

$nVisaDocs = DB::table('n_visa_necessary_document_for_work_permits')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->first();

$nVisaForeignerInfo = DB::table('n_visa_particulars_of_foreign_incumbnets')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->first();

 $nVisaSponSor = DB::table('n_visa_particular_of_sponsor_or_employers')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->first();

$nVisaWorkPlace = DB::table('n_visa_work_place_addresses')
                   ->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->first();








         $file_Name_Custome = 'fd9form';
         $pdf=PDF::loadView('admin.fd9form.pdf',['ngoStatus'=>$ngoStatus,'checkNgoTypeForForeginNgo'=>$checkNgoTypeForForeginNgo,'dataFromNVisaFd9Fd1'=>$dataFromNVisaFd9Fd1]);
 return $pdf->stream($file_Name_Custome.''.'.pdf');






        // $get_file_data = DB::table('fd9_forms')->where('id',$id)
        // ->value('verified_fd_nine_form');

        // $file_path = $data->system_url.'public/'.$get_file_data;
        //         $filename  = pathinfo($file_path, PATHINFO_FILENAME);

        // $file=$data->system_url.'public/'.$get_file_data;

        // //dd($file);

        // $headers = array(
        //           'Content-Type: application/pdf',
        //         );

        // // return Response::download($file,$filename.'.pdf', $headers);

        // return Response::make(file_get_contents($file), 200, [
        //     'content-type'=>'application/pdf',
        // ]);
    }

    public function nVisaDocumentDownload($cat,$id){

        \LogActivity::addToLog('nVisa Document Download');


        $data = DB::table('system_information')->first();

        if($cat == 'nomination'){

            $get_file_data = DB::table('n_visa_necessary_document_for_work_permits')->where('id',$id)->value('nomination_letter_of_buyer');

             $file_path =$data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        }elseif($cat == 'investment'){

            $get_file_data = DB::table('n_visa_necessary_document_for_work_permits')->where('id',$id)->value('registration_letter_of_board_of_investment');
             $file_path =$data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        }elseif($cat == 'contract'){

            $get_file_data = DB::table('n_visa_necessary_document_for_work_permits')->where('id',$id)->value('employee_contract_copy');
             $file_path =$data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        }elseif($cat == 'directors'){

            $get_file_data =DB::table('n_visa_necessary_document_for_work_permits')->where('id',$id)->value('board_of_the_directors_sign_letter');
             $file_path =$data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        }elseif($cat == 'shareHolder'){

            $get_file_data = DB::table('n_visa_necessary_document_for_work_permits')->where('id',$id)->value('share_holder_copy');
             $file_path =$data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        }elseif($cat == 'passportCopy'){

            $get_file_data = DB::table('n_visa_necessary_document_for_work_permits')->where('id',$id)->value('passport_photocopy');
             $file_path =$data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        }elseif($cat == 'academicQualification'){

            $get_file_data = DB::table('fd9_forms')
            ->where('id',$id)->value('fd9_academic_qualification');

           $file_path =$data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        }elseif($cat == 'techQualification'){

            $get_file_data = DB::table('fd9_forms')
            ->where('id',$id)->value('fd9_technical_and_other_qualifications_if_any');

             $file_path =$data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        }elseif($cat == 'pastExperience'){

            $get_file_data = DB::table('fd9_forms')
            ->where('id',$id)->value('fd9_past_experience');

             $file_path =$data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        }elseif($cat == 'offeredPost'){

            $get_file_data = DB::table('fd9_forms')
            ->where('id',$id)->value('fd9_offered_post');

             $file_path =$data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        }elseif($cat == 'proposedProject'){

            $get_file_data = DB::table('fd9_forms')
            ->where('id',$id)->value('fd9_name_of_proposed_project');


       $file_path =$data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        }elseif($cat == 'copyOfPassport'){

            $get_file_data = DB::table('fd9_forms')
            ->where('id',$id)->value('fd9_copy_of_passport');

             $file_path =$data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        }
        elseif($cat == 'forwarding_letter'){

            $get_file_data = DB::table('n_visas')->where('id', $id)
            ->value('forwarding_letter');


       $file_path =url('public/'.$get_file_data);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=url('public/'.$get_file_data);

        }





        $headers = array(
                  'Content-Type: application/pdf',
                );

        // return Response::download($file,$filename.'.pdf', $headers);

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);


            }



public function forwardingLetterPost(Request $request){

    \LogActivity::addToLog('forwardingLetterPost');

//dd(234);
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
    $uploadForwardingLetter = $this->downloadForwardingLetter($request->fd9_id);
    return redirect()->back()->with('success','Created successfully!');

}



public function submitForCheck(Request $request){

    \LogActivity::addToLog('nvisaCheck');


     $fd9FormId = $request->id;


    $data = CommonController::apiData($fd9FormId);

    $dataFromNew =DB::table('fd9_one_forms')
    ->join('n_visas', 'n_visas.fd9_one_form_id', '=', 'fd9_one_forms.id')
    ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd9_one_forms.fd_one_form_id')
    ->select('fd_one_forms.*','fd9_one_forms.*','n_visas.*','n_visas.id as nVisaId')
    ->where('fd9_one_forms.id',$fd9FormId)
    ->first();

    //dd($data['wp_tracking_no']);

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
    $newCode->tracking_no =$data['wp_tracking_no'];
    $newCode->statusName = $statusName ;
    $newCode->statusId = $statusId ;
    $newCode->save();


    DB::table('fd9_one_forms')->where('id', $fd9FormId)
       ->update([
           'status' => $statusName
        ]);



return redirect()->route('fd9OneForm.show',$fd9FormId)->with('success','Send Successfully');

}


public function statusCheck(Request $request){

    \LogActivity::addToLog('nvisa status check');

    $mainNVisaId = $request->mainId;

    $form9Id = DB::table('fd9_forms')
            ->where('n_visa_id',$mainNVisaId)->value('id');

    $secruityList = DB::table('secruity_checks')
    ->where('n_visa_id',$mainNVisaId)->first();

//dd($secruityList);

   $data = [
    "project_code" => "ngo-oss",
    "request_id" =>CommonController::generateRandomInteger(),
    "tracking_no" => $secruityList->tracking_no,

 ];





    $response12 = Http::post('https://mohaapi-uat.oss.net.bd/v1/oauth/token', [
        'client_id' => 5,
        'client_secret' => 'MS1LDLK3DPj0NGFBju55GG6KMPCtTuGOamDoZtKw',
        'grant_type'=>'client_credentials'

    ]);



$jsonData = $response12->json();

$mainToken = $jsonData['access_token'];


$client = new Client();
$url = "https://mohaapi-uat.oss.net.bd/v1/api/check-application-status";
$response = $client->post($url,[
    'headers' => ['Content-type' => 'application/json', 'Authorization' => 'Bearer ' . $mainToken],

    'body' => json_encode($data),
]);

$response = $response->getBody()->getContents();

$covertArray = json_decode($response,true);


    $trackingNumber =$covertArray['data']['app_tracking_no'];
    $mohaTrackingNumber =$covertArray['data']['moha_tracking_no'];
    $statusId = $covertArray['data']['status_id'];
    $statusName = $covertArray['data']['status_name'];


    DB::table('fd9_forms')->where('id', $form9Id)
    ->update([
        'status' => $statusName
     ]);


     DB::table('secruity_checks')->where('n_visa_id',$mainNVisaId)
     ->update([
         'statusName' => $statusName,
         'statusId' => $statusId
      ]);


      $data = view('admin.fd9form.statusCheck',compact('mainNVisaId'))->render();
      return response()->json($data);
}
}
