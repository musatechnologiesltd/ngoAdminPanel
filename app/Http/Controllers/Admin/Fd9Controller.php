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
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
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
                      ->where('id',$dataFromNVisaFd9Fd1->nVisaId)->first();

   $nVisaCompensationAndBenifits = DB::table('n_visa_compensation_and_benifits')
                      ->where('id',$dataFromNVisaFd9Fd1->nVisaId)->get();

   $nVisaEmploye = DB::table('n_visa_employment_information')
                      ->where('id',$dataFromNVisaFd9Fd1->nVisaId)->first();

   $nVisaManPower = DB::table('n_visa_manpower_of_the_offices')
                      ->where('id',$dataFromNVisaFd9Fd1->nVisaId)->first();

   $nVisaDocs = DB::table('n_visa_necessary_document_for_work_permits')
                      ->where('id',$dataFromNVisaFd9Fd1->nVisaId)->first();

   $nVisaForeignerInfo = DB::table('n_visa_particulars_of_foreign_incumbnets')
                      ->where('id',$dataFromNVisaFd9Fd1->nVisaId)->first();

    $nVisaSponSor = DB::table('n_visa_particular_of_sponsor_or_employers')
                      ->where('id',$dataFromNVisaFd9Fd1->nVisaId)->first();

   $nVisaWorkPlace = DB::table('n_visa_work_place_addresses')
                      ->where('id',$dataFromNVisaFd9Fd1->nVisaId)->first();



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
                   ->where('id',$dataFromNVisaFd9Fd1->nVisaId)->first();

$nVisaCompensationAndBenifits = DB::table('n_visa_compensation_and_benifits')
                   ->where('id',$dataFromNVisaFd9Fd1->nVisaId)->get();

$nVisaEmploye = DB::table('n_visa_employment_information')
                   ->where('id',$dataFromNVisaFd9Fd1->nVisaId)->first();

$nVisaManPower = DB::table('n_visa_manpower_of_the_offices')
                   ->where('id',$dataFromNVisaFd9Fd1->nVisaId)->first();

$nVisaDocs = DB::table('n_visa_necessary_document_for_work_permits')
                   ->where('id',$dataFromNVisaFd9Fd1->nVisaId)->first();

$nVisaForeignerInfo = DB::table('n_visa_particulars_of_foreign_incumbnets')
                   ->where('id',$dataFromNVisaFd9Fd1->nVisaId)->first();

 $nVisaSponSor = DB::table('n_visa_particular_of_sponsor_or_employers')
                   ->where('id',$dataFromNVisaFd9Fd1->nVisaId)->first();

$nVisaWorkPlace = DB::table('n_visa_work_place_addresses')
                   ->where('id',$dataFromNVisaFd9Fd1->nVisaId)->first();




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



 $data = [
   "project_code" => "ngo-oss",
   "request_id" => "3939172719",
   "depertment_name" => "Registration & Incentives-I (Commercial)",
   "wp_tracking_no" => "WPN-14March2023-00019",
   "basic_info" => [
         "period_validity" => "1 year ",
         "visa_ref_no" => "VR-05Nov2019-00002",
         "visa_category" => "PI Type Visa",
         "permit_efct_date" => "2022-05-15",
         "applicant_photo" => "https://uat-bida.oss.net.bd/uploads/2019/09/BIDA_VR_5d904c029f0981.69726395300x300_1.jpg",
         "forwarding_letter" => "http://cdn-pdf.eserve.org.bd:8055/PDF_TEST/2023/0225/407584_bida.wpnewc.u_20230407584877125.pdf"
      ],
   "a_particular_of_sponsor" => [
            "org_name" => "Organization",
            "org_house_no" => "169 Work street, Dhaka",
            "org_flat_no" => "1269",
            "org_fax_no" => "4512369",
            "org_district" => "Dhaka",
            "org_thana" => "Adabor",
            "org_road_no" => "11 number",
            "org_post_code" => "1200",
            "org_phone" => "01900000000",
            "org_email" => "jhon@mail.com",
            "nature_of_business" => "Rocking Organization",
            "authorized_capital" => 45000,
            "paid_up_capital" => 3000,
            "remittance_received" => "575",
            "org_type" => "Private Limited Company",
            "industry_type" => "Private"
         ],
   "b_particular_of_foreign_incumbent" => [
               "name_of_the_foreign_national" => "Aminul islam",
               "date_of_birth" => "1981-11-15",
               "marital_status" => "Unmarried",
               "date_of_arrival" => "2022-05-15",
               "country" => "001",
               "nationality" => "004",
               "passport_no" => "1234567890",
               "passport_issue_date" => "2019-09-29",
               "passport_issue_place" => "Designation",
               "passport_exiry_date" => "2020-01-14",
               "house_no" => "1269",
               "home_country" => "Bangladesh",
               "flat_no" => "2B",
               "road_no" => "11",
               "post_code" => "1230",
               "state" => "Dhaka",
               "phone" => "01777654987",
               "fax_no" => "4654654",
               "email" => "saminul@beza.com"
            ],
   "c_employment_information" => [
                  "employed_designation" => "Engineer",
                  "first_appointment_date" => "2022-05-15",
                  "desired_effective_date" => "2022-05-15",
                  "desired_end_date" => "2023-05-14",
                  "visa_type" => null,
                  "travel_visa_cate" => "2",
                  "visa_validity" => "1 year ",
                  "brief_job_description" => "Brief job description",
                  "employee_justification" => "Brief job description"
               ],
   "compensation_and_benefits" => [
                     "basic_salary" => [
                        "amount" => "9.00",
                        "payment_type" => "Monthly",
                        "currency" => "USD"
                     ],
                     "overseas_allowance" => [
                           "amount" => "50.00",
                           "payment_type" => "Monthly",
                           "currency" => "USD"
                        ],
                     "house_rent" => [
                              "amount" => "450.00",
                              "payment_type" => "Monthly",
                              "currency" => "SEK"
                           ],
                     "conveyance_allowance" => [
                                 "amount" => "650.00",
                                 "payment_type" => "Monthly",
                                 "currency" => "SEK"
                              ],
                     "medical_allowance" => [
                                    "amount" => "60.00",
                                    "payment_type" => "Monthly",
                                    "currency" => "SOS"
                                 ],
                     "entertainment_allowance" => [
                                       "amount" => "560.00",
                                       "payment_type" => "Monthly",
                                       "currency" => "USD"
                                    ],
                     "annual_bonus" => [
                                          "amount" => "340.00",
                                          "payment_type" => "Monthly",
                                          "currency" => "USD"
                                       ],
                     "other_benefit" => "Other fringe benefits (if any)",
                     "salary_remarks" => "Brief job description"
                  ],
   "manpower_of_the_office" => [
                                             "local_manpower" => [
                                                "executive" => 5,
                                                "supporting_staff" => 5,
                                                "total" => 10
                                             ],
                                             "foreign_manpower" => [
                                                   "executive" => 2,
                                                   "supporting_staff" => 6,
                                                   "total" => 8
                                                ],
                                             "grand_total" => 18,
                                             "locRatio" => "1.25",
                                             "forRatio" => "1.00"
                                          ],
   "d_workplace_address" => [
                                                      "wp_org_house_no" => "16/16, G, Babor road",
                                                      "wp_org_flat_no" => "Flast No FA",
                                                      "wp_org_road_no" => "Road No 7",
                                                      "wp_org_district" => "Dhaka",
                                                      "wp_org_thana" => "Adabor",
                                                      "wp_org_email" => "samiulossp@gmail.com",
                                                      "wp_org_type" => "BEZA ORGANIZA TYPE",
                                                      "wp_contact_person_mobile" => "+8801963255668"
                                                   ],
   "authorized_personnel_of_the_organization" => [
                                                         "org_name" => "Auth Person Organization",
                                                         "org_house_no" => "169 Work street, Dhaka",
                                                         "org_flat_no" => "GH",
                                                         "org_road_no" => "27",
                                                         "org_thana" => "Pabna",
                                                         "org_district" => "Dhaka",
                                                         "org_post_office" => "Uttora",
                                                         "org_mobile" => "+8801633613553",
                                                         "submission_date" => "",
                                                         "expatriate_name" => "Mahmudul Hasan Reza",
                                                         "expatriate_email" => "rezaocpl@gmail.com"
                                                      ],
   "document_list" => [
                                                            [
                                                               "doc_name" => "Government work permit new atachment new",
                                                               "file_public_path" => "https://uat-bida.oss.net.bd/uploads/2023/02/BIDA_WPN_63f9d6a4507158.37404150.pdf"
                                                            ],
                                                            [
                                                                  "doc_name" => "Pasport / NID Number VRN-P1-Industrial",
                                                                  "file_public_path" => "https://uat-bida.oss.net.bd/uploads/2023/02/BIDA_WPN_63f9d6a8794cb1.81199984.pdf"
                                                               ],
                                                            [
                                                                     "doc_name" => "Certificate of Incorporation",
                                                                     "file_public_path" => "https://uat-bida.oss.net.bd/uploads/2023/02/BIDA_WPN_63f9d6ace55cc7.62034572.pdf"
                                                                  ]
                                                         ]
];


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

    dd($response);




// dd($jsonData['access_token']);

}
}
