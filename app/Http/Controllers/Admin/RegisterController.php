<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Illuminate\Support\Str;
use Mpdf\Mpdf;
use Mail;
use DB;
use PDF;
use Carbon\Carbon;
use App\Models\NgoFDNineDak;
use App\Models\NgoFDNineOneDak;
use App\Models\NgoNameChangeDak;
use App\Models\NgoRenewDak;
use App\Models\NgoFdSixDak;
use App\Models\NgoFdSevenDak;
use App\Models\NgoRegistrationDak;
class RegisterController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function newRegistrationList(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('register_list_view')) {
              return redirect()->route('mainLogin');
        }

        \LogActivity::addToLog('view new ngo registration list.');


        if(Auth::guard('admin')->user()->designation_list_id == 2 || Auth::guard('admin')->user()->designation_list_id == 1){


            $allDataForNewList = DB::table('ngo_statuses') ->where('status','Ongoing')->orWhere('status','Old Ngo Renew')->latest()->get();

        }else{

            $ngoStatusReg = NgoRegistrationDak::where('status',1)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest()->get();

            $convertNameTitle = $ngoStatusReg->implode("registration_status_id", " ");
            $separatedDataTitle = explode(" ", $convertNameTitle);

            $allDataForNewList = DB::table('ngo_statuses')->whereIn('id',$separatedDataTitle)->where('status','Ongoing')->orWhere('status','Old Ngo Renew')->latest()->get();

        }

        return view('admin.registrationList.newRegistrationList',compact('allDataForNewList'));
    }


    public function revisionRegistrationList(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('register_list_view')) {
                  return redirect()->route('mainLogin');
        }

        \LogActivity::addToLog('view revision ngo registration list.');


        if(Auth::guard('admin')->user()->designation_list_id == 2 || Auth::guard('admin')->user()->designation_list_id == 1){


                $allDataForNewList = DB::table('ngo_statuses')->whereIn('status',['Rejected','Correct'])->latest()->get();

        }else{

                $ngoStatusReg = NgoRegistrationDak::where('status',1)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest()->get();


                $convertNameTitle = $ngoStatusReg->implode("registration_status_id", " ");
                $separatedDataTitle = explode(" ", $convertNameTitle);

                $allDataForNewList = DB::table('ngo_statuses')->whereIn('id',$separatedDataTitle)->whereIn('status',['Rejected','Correct'])->latest()->get();

        }

        return view('admin.registrationList.revisionRegistrationList',compact('allDataForNewList'));
    }


    public function alreadyRegistrationList(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('register_list_view')) {
            return redirect()->route('mainLogin');
        }

        \LogActivity::addToLog('view already ngo registration list.');


        if(Auth::guard('admin')->user()->designation_list_id == 2 || Auth::guard('admin')->user()->designation_list_id == 1){


            $allDataForNewList = DB::table('ngo_statuses')->where('status','Accepted')->latest()->get();

        }else{

            $ngoStatusReg = NgoRegistrationDak::where('status',1)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest()->get();

            $convertNameTitle = $ngoStatusReg->implode("registration_status_id", " ");
            $separatedDataTitle = explode(" ", $convertNameTitle);

            $allDataForNewList = DB::table('ngo_statuses')->whereIn('id',$separatedDataTitle)
                ->where('status','Accepted')->latest()->get();


        }

        return view('admin.registrationList.alreadyRegistrationList',compact('allDataForNewList'));
    }


    public function registrationView($id){


        \LogActivity::addToLog('view  ngo registration detail.');

        $rStatus = DB::table('ngo_statuses')->where('fd_one_form_id',$id)->value('status');
        $nameChangeStatus = DB::table('ngo_name_changes')->where('fd_one_form_id',$id)->value('status');
        $renewStatus = DB::table('ngo_renews')->where('fd_one_form_id',$id)->value('status');
        $allDataForNewListAll = DB::table('ngo_statuses')->where('fd_one_form_id',$id)->first();
        $formOneData = DB::table('fd_one_forms')->where('id',$id)->first();
        $ngoTypeData = DB::table('ngo_type_and_languages')->where('user_id',$formOneData->user_id)->first();
        $signDataNew = DB::table('form_eights')->where('fd_one_form_id',$id)->first();
        $formEightData = DB::table('form_eights')->where('fd_one_form_id',$id)->get();
        $formMemberData = DB::table('ngo_member_lists')->where('fd_one_form_id',$id)->get();
        $formMemberDataDocRenew = DB::table('ngo_renew_infos')->where('fd_one_form_id',$id)->get();
        $durationListAll1 = DB::table('ngo_durations')->where('fd_one_form_id',$id)->value('ngo_duration_end_date');
        $durationListAll = DB::table('ngo_durations')->where('fd_one_form_id',$id)->value('ngo_duration_start_date');
        $formMemberDataDoc = DB::table('ngo_member_nid_photos')->where('fd_one_form_id',$id)->get();
        $formNgoDataDoc = DB::table('ngo_other_docs')->where('fd_one_form_id',$id)->get();
        $usersInfo = DB::table('users')->where('id',$formOneData->user_id)->first();
        $allSourceOfFund = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$formOneData->id)->get();
        $allPartiw = DB::table('fd_one_member_lists')->where('fd_one_form_id',$formOneData->id)->get();
        $getAllDataAdviserBank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$formOneData->id)->first();
        $getAllDataOther= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$formOneData->id)->get();
        $getAllDataAdviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$formOneData->id)->get();

        if($ngoTypeData->ngo_type == 'দেশিও'){
                return view('admin.registrationList.registrationView',compact('signDataNew','ngoTypeData','durationListAll1','durationListAll','renewStatus','nameChangeStatus','rStatus','formMemberDataDocRenew','getAllDataAdviser','getAllDataOther','getAllDataAdviserBank','allPartiw','allSourceOfFund','usersInfo','formNgoDataDoc','formMemberDataDoc','formMemberData','formEightData','allDataForNewListAll','formOneData'));
        }else{
                return view('admin.registrationList.foreign.registrationView',compact('signDataNew','ngoTypeData','durationListAll1','durationListAll','renewStatus','nameChangeStatus','rStatus','formMemberDataDocRenew','getAllDataAdviser','getAllDataOther','getAllDataAdviserBank','allPartiw','allSourceOfFund','usersInfo','formNgoDataDoc','formMemberDataDoc','formMemberData','formEightData','allDataForNewListAll','formOneData'));
        }
    }


    public function numberToWord($num = '')
    {
        $num    = ( string ) ( ( int ) $num );

        if( ( int ) ( $num ) && ctype_digit( $num ) )
        {
            $words  = array( );

            $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );

            $list1  = array('','one','two','three','four','five','six','seven',
                'eight','nine','ten','eleven','twelve','thirteen','fourteen',
                'fifteen','sixteen','seventeen','eighteen','nineteen');

            $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
                'seventy','eighty','ninety','hundred');

            $list3  = array('','thousand','million','billion','trillion',
                'quadrillion','quintillion','sextillion','septillion',
                'octillion','nonillion','decillion','undecillion',
                'duodecillion','tredecillion','quattuordecillion',
                'quindecillion','sexdecillion','septendecillion',
                'octodecillion','novemdecillion','vigintillion');

            $num_length = strlen( $num );
            $levels = ( int ) ( ( $num_length + 2 ) / 3 );
            $max_length = $levels * 3;
            $num    = substr( '00'.$num , -$max_length );
            $num_levels = str_split( $num , 3 );

            foreach( $num_levels as $num_part )
            {
                $levels--;
                $hundreds   = ( int ) ( $num_part / 100 );
                $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
                $tens       = ( int ) ( $num_part % 100 );
                $singles    = '';

                if( $tens < 20 ) { $tens = ( $tens ? ' ' . $list1[$tens] . ' ' : '' ); } else { $tens = ( int ) ( $tens / 10 ); $tens = ' ' . $list2[$tens] . ' '; $singles = ( int ) ( $num_part % 10 ); $singles = ' ' . $list1[$singles] . ' '; } $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' ); } $commas = count( $words ); if( $commas > 1 )
            {
                $commas = $commas - 1;
            }

            $words  = implode( ', ' , $words );

            $words  = trim( str_replace( ' ,' , ',' , ucwords( $words ) )  , ', ' );
            if( $commas )
            {
                $words  = str_replace( ',' , ' and' , $words );
            }

            return $words;
        }
        else if( ! ( ( int ) $num ) )
        {
            return 'Zero';
        }
        return '';
    }





    public function printCertificateView(Request $request){


        \LogActivity::addToLog('print ngo certificate.');

        $user_id = $request->user_id;
        $formOneData = DB::table('fd_one_forms')->where('user_id',$user_id)->first();
        $ngoTypeData = DB::table('ngo_type_and_languages')->where('user_id',$formOneData->user_id)->first();
        $durationListAll = DB::table('ngo_durations')->where('fd_one_form_id',$formOneData->id)->latest()->first();

        $newyear = date('y', strtotime($request->main_date));
        $newmonth = date('F', strtotime($request->main_date));
        $newdate = date('d', strtotime($request->main_date));

        $word = $this->numberToWord($newyear);
        $word1 = $this->numberToWord($newdate);

        $mainDate = $request->main_date;
        $fileNameCustome = 'certificate';
        $pdf=PDF::loadView('admin.registrationList.printCertificateView',
        ['newyear'=>$newyear,
        'ngoTypeData'=>$ngoTypeData,
        'newmonth'=>$newmonth,
        'newdate'=>$newdate,
        'word'=>$word,
        'word1'=>$word1,
        'mainDate'=>$mainDate,
        'formOneData'=>$formOneData,
        'durationListAll'=>$durationListAll
    ],[],['orientation' => 'L'],['format' => [279.4,215.9]]);
return $pdf->stream($fileNameCustome.''.'.pdf');
    }


    public function printCertificateViewDemo(Request $request){

        \LogActivity::addToLog('view certificate demo.');
        $user_id = $request->user_id;
        $formOneData = DB::table('fd_one_forms')->where('user_id',$user_id)->first();
        $ngoTypeData = DB::table('ngo_type_and_languages')->where('user_id',$formOneData->user_id)->first();
        $durationListAll = DB::table('ngo_durations')->where('fd_one_form_id',$formOneData->id)->latest()->first();

        $newyear = date('y', strtotime($request->main_date));
        $newmonth = date('F', strtotime($request->main_date));
        $newdate = date('d', strtotime($request->main_date));

        $word = $this->numberToWord($newyear);
        $word1 = $this->numberToWord($newdate);

        $mainDate = $request->main_date;
        $fileNameCustome = 'certificate';
        $pdf=PDF::loadView('admin.registrationList.printCertificateViewDemo',['newyear'=>$newyear,'ngoTypeData'=>$ngoTypeData,
'newmonth'=>$newmonth,'newdate'=>$newdate,'word'=>$word,'word1'=>$word1,'mainDate'=>$mainDate,
'formOneData'=>$formOneData,'durationListAll'=>$durationListAll],[],['orientation' => 'L'],['format' => [279.4,215.9]]);
return $pdf->stream($fileNameCustome.''.'.pdf');
 }


    public function updateStatusRegForm(Request $request){

        \LogActivity::addToLog('update registration status.');

        if(empty($request->comment)){

                $comment ='0';

        }else{
                $comment =  $request->comment;

        }

        DB::table('ngo_statuses')->where('id',$request->id)->update([
        'status' => $request->status,
        'comment' => $comment ,
        ]);

        $getUserId = DB::table('ngo_statuses')->where('id',$request->id)->value('fd_one_form_id');

        if($request->ngotype == 'old'){

          Mail::send('emails.oldRenew', ['comment' =>$comment,'id' => $request->status,'ngoId'=>$getUserId], function($message) use($request){
          $message->to($request->email);
          $message->subject('NGOAB Registration Service || Old Ngo Approved Status');
        });


        }else{

          if($request->status == 'Accepted'){

            $date = date('Y-m-d');
            $newDate = date('Y-m-d', strtotime($date. ' + 10 years'));

            DB::table('fd_one_forms')->where('id',$getUserId)->update([
            'registration_number' => $request->reg_no_get_from_admin]);


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



            Mail::send('emails.passwordResetEmail', ['comment' => $comment ,'id' => $request->status,'ngoId'=>$getUserId], function($message) use($request){
                $message->to($request->email);
                $message->subject('NGOAB Registration Service || Ngo Approved Status');
            });

        }

        return redirect()->back()->with('success','Updated Successfully');
    }


    public function formOnePdfMainForeign($id){


        $allformOneData = DB::table('fd_one_forms')->where('id',$id)->first();
        $getNgoTypeForPdf = DB::table('ngo_type_and_languages')->where('user_id',$allformOneData->user_id)->value('ngo_type');
        $getAllDataAdviserBank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$allformOneData->id)->first();
        $getAllDataOther= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $getAllDataAdviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $formOneMemberList = DB::table('fd_one_member_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $getAllSourceOfFundData = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$allformOneData->id)->get();

        $fileNameCustome = '(এফডি-১ ফরম)';

        $data =view('admin.registrationList.foreign.fdFormOneInfoPdf',[
        'getNgoTypeForPdf'=>$getNgoTypeForPdf,

        'getAllSourceOfFundData'=>$getAllSourceOfFundData,
        'formOneMemberList'=>$formOneMemberList,
        'getAllDataAdviser'=>$getAllDataAdviser,
        'getAllDataOther'=>$getAllDataOther,
        'getAllDataAdviserBank'=>$getAllDataAdviserBank,
        'allformOneData'=>$allformOneData

        ])->render();

        $pdfFilePath =$fileNameCustome.'.pdf';

        $mpdf = new Mpdf([
         'default_font' => 'nikosh'
        ]);

        $mpdf->WriteHTML($data);
        $mpdf->Output($pdfFilePath, "I");
        die();

    }


    public function formOnePdfMain($id){

        $allformOneData = DB::table('fd_one_forms')->where('id',$id)->first();
        $getNgoTypeForPdf = DB::table('ngo_type_and_languages')->where('user_id',$allformOneData->user_id)->value('ngo_type');
        $getAllDataAdviserBank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$allformOneData->id)->first();
        $getAllDataOther= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $getAllDataAdviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $formOneMemberList = DB::table('fd_one_member_lists')->where('fd_one_form_id',$allformOneData->id)->get();
        $getAllSourceOfFundData = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$allformOneData->id)->get();

        $fileNameCustome = '(এফডি-১ ফরম)';

        $data =view('admin.registrationList.fdFormOneInfoPdf',[
        'getNgoTypeForPdf'=>$getNgoTypeForPdf,

        'getAllSourceOfFundData'=>$getAllSourceOfFundData,
        'formOneMemberList'=>$formOneMemberList,
        'getAllDataAdviser'=>$getAllDataAdviser,
        'getAllDataOther'=>$getAllDataOther,
        'getAllDataAdviserBank'=>$getAllDataAdviserBank,
        'allformOneData'=>$allformOneData

       ])->render();


        $pdfFilePath =$fileNameCustome.'.pdf';

        $mpdf = new Mpdf([
        'default_font' => 'nikosh'
         ]);

        $mpdf->WriteHTML($data);
        $mpdf->Output($pdfFilePath, "I");
        die();

    }


    public function formOnePdf($main_id,$id){


        \LogActivity::addToLog('registration pdf download.');


        if($id == 'plan'){

            $formOneData = DB::table('fd_one_forms')->where('id',$main_id)->value('plan_of_operation');

        }elseif($id == 'invoice'){

            $formOneData1 = DB::table('fd_one_forms')->where('id',$main_id)->first();
            $formOneData = $formOneData1->attach_the__supporting_paper;

        }elseif($id == 'treasury_bill'){

            $formOneData = DB::table('fd_one_forms')->where('id',$main_id)->value('board_of_revenue_on_fees');

        }elseif($id == 'final_pdf'){

            $formOneData = DB::table('fd_one_forms')->where('id',$main_id)->value('verified_fd_one_form');

        }elseif($id == 'final_pdf_eight'){

            $formOneData = DB::table('fd_one_forms')->where('id',$main_id)->value('verified_fd_eight_form_old');

        }

        return view('admin.registrationList.formOnePdf',compact('formOneData'));
    }


    public function formEightPdf($main_id){

        \LogActivity::addToLog('registration pdf download.');

          $formOneData = DB::table('form_eights')->where('fd_one_form_id',$main_id)->value('verified_form_eight');

        return view('admin.registrationList.formEightPdf',compact('formOneData'));
    }

    public function sourceOfFund($id){

        \LogActivity::addToLog('registration pdf download.');

         $formOneData = DB::table('fd_one_source_of_funds')->where('id',$id)->value('letter_file');

         return view('admin.registrationList.sourceOfFund',compact('formOneData'));
    }

    public function otherPdfView($id){

        \LogActivity::addToLog('registration pdf download.');

         $formOneData = DB::table('fd_one_other_pdf_lists')->where('id',$id)->value('information_pdf');

        return view('admin.registrationList.otherPdfView',compact('formOneData'));
    }


    public function ngoMemberDocPdfView($id){

        \LogActivity::addToLog('registration pdf download.');

         $formOneData = DB::table('ngo_member_nid_photos')->where('id',$id)->value('member_nid_copy');

        return view('admin.registrationList.ngoMemberDocPdfView',compact('formOneData'));
    }


    public function ngoDocPdfView($id){

        \LogActivity::addToLog('registration pdf download.');

         $formOneData = DB::table('ngo_other_docs')->where('id',$id)->value('pdf_file_list');
        return view('admin.registrationList.ngoDocPdfView',compact('formOneData'));
    }


    public function renewPdfList($main_id,$id){

        \LogActivity::addToLog('registration pdf download.');

        if($id = 'f'){

            $formOneData = DB::table('ngo_renew_infos')->where('user_id',$main_id)->value('foregin_pdf');

        }elseif($id = 'y'){

            $formOneData = DB::table('ngo_renew_infos')->where('user_id',$main_id)->value('yearly_budget');

        }elseif($id = 'c'){

            $formOneData = DB::table('ngo_renew_infos')->where('user_id',$main_id)->value('copy_of_chalan');

        }elseif($id = 'd'){

            $formOneData = DB::table('ngo_renew_infos')->where('user_id',$main_id)->value('due_vat_pdf');

        }elseif($id = 'ch'){
            $formOneData = DB::table('ngo_renew_infos')->where('user_id',$main_id)->value('change_ac_number');
        }

        return view('admin.registrationList.renewPdfList',compact('formOneData'));
    }
}
