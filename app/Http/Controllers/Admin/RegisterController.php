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
            //abort(403, 'Sorry !! You are Unauthorized to view !');
            return redirect()->route('mainLogin');
        }


        $all_data_for_new_list = DB::table('ngo_statuses')
        ->where('status','Ongoing')->orWhere('status','Old Ngo Renew')->latest()->get();


      return view('admin.registration_list.new_registration_list',compact('all_data_for_new_list'));
    }


    public function revisionRegistrationList(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('register_list_view')) {
            //abort(403, 'Sorry !! You are Unauthorized to view !');
            return redirect()->route('mainLogin');
        }


        $all_data_for_new_list = DB::table('ngo_statuses')->where('status','Rejected')->latest()->get();


      return view('admin.registration_list.revision_registration_list',compact('all_data_for_new_list'));
    }


    public function alreadyRegistrationList(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('register_list_view')) {
            //abort(403, 'Sorry !! You are Unauthorized to view !');
            return redirect()->route('mainLogin');
        }


        $all_data_for_new_list = DB::table('ngo_statuses')->where('status','Accepted')->latest()->get();


      return view('admin.registration_list.already_registration_list',compact('all_data_for_new_list'));
    }


    public function registrationView($id){





        try {

            $r_status = DB::table('ngo_statuses')->where('fd_one_form_id',$id)->value('status');
            $name_change_status = DB::table('ngo_name_changes')->where('fd_one_form_id',$id)->value('status');
            $renew_status = DB::table('ngo_renews')->where('fd_one_form_id',$id)->value('status');


            $all_data_for_new_list_all = DB::table('ngo_statuses')->where('fd_one_form_id',$id)->first();
            $form_one_data = DB::table('fd_one_forms')->where('id',$id)->first();


            $ngoTypeData = DB::table('ngo_type_and_languages')
            ->where('user_id',$form_one_data->user_id)->first();


            $signDataNew = DB::table('form_eights')->where('fd_one_form_id',$id)->first();


            $form_eight_data = DB::table('form_eights')->where('fd_one_form_id',$id)->get();
            $form_member_data = DB::table('ngo_member_lists')->where('fd_one_form_id',$id)->get();


            $form_member_data_doc_renew = DB::table('ngo_renew_infos')->where('fd_one_form_id',$id)->get();


 $duration_list_all1 = DB::table('ngo_durations')->where('fd_one_form_id',$id)->value('ngo_duration_end_date');
            $duration_list_all = DB::table('ngo_durations')->where('fd_one_form_id',$id)->value('ngo_duration_start_date');

            $form_member_data_doc = DB::table('ngo_member_nid_photos')->where('fd_one_form_id',$id)->get();
            $form_ngo_data_doc = DB::table('ngo_other_docs')->where('fd_one_form_id',$id)->get();

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


        if($ngoTypeData->ngo_type == 'দেশিও'){
 return view('admin.registration_list.registration_view',compact('signDataNew','ngoTypeData','duration_list_all1','duration_list_all','renew_status','name_change_status','r_status','form_member_data_doc_renew','get_all_data_adviser','get_all_data_other','get_all_data_adviser_bank','all_partiw','all_source_of_fund','users_info','form_ngo_data_doc','form_member_data_doc','form_member_data','form_eight_data','all_data_for_new_list_all','form_one_data'));
    }else{
        return view('admin.registration_list.foreign.registration_view',compact('signDataNew','ngoTypeData','duration_list_all1','duration_list_all','renew_status','name_change_status','r_status','form_member_data_doc_renew','get_all_data_adviser','get_all_data_other','get_all_data_adviser_bank','all_partiw','all_source_of_fund','users_info','form_ngo_data_doc','form_member_data_doc','form_member_data','form_eight_data','all_data_for_new_list_all','form_one_data'));
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

        //dd(11);

           $user_id = $request->user_id;

           $form_one_data = DB::table('fd_one_forms')->where('user_id',$user_id)->first();
           $ngoTypeData = DB::table('ngo_type_and_languages')
           ->where('user_id',$form_one_data->user_id)->first();
           $duration_list_all = DB::table('ngo_durations')->where('fd_one_form_id',$form_one_data->id)->latest()->first();

           //dd($user_id);

           $newyear = date('y', strtotime($request->main_date));

           $newmonth = date('F', strtotime($request->main_date));


           $newdate = date('d', strtotime($request->main_date));

           $word = $this->numberToWord($newyear);
           $word1 = $this->numberToWord($newdate);
           //dd($word1);

           //dd($newdate);
$mainDate = $request->main_date;
           $file_Name_Custome = 'certificate';
           $pdf=PDF::loadView('admin.registration_list.print_certificate_view',['newyear'=>$newyear,'ngoTypeData'=>$ngoTypeData,
'newmonth'=>$newmonth,'newdate'=>$newdate,'word'=>$word,'word1'=>$word1,'mainDate'=>$mainDate,
'form_one_data'=>$form_one_data,'duration_list_all'=>$duration_list_all],[],['orientation' => 'L'],['format' => [279.4,215.9]]);
return $pdf->stream($file_Name_Custome.''.'.pdf');
    }


    public function printCertificateViewDemo(Request $request){
//dd(11);




        $user_id = $request->user_id;

        $form_one_data = DB::table('fd_one_forms')->where('user_id',$user_id)->first();
        $ngoTypeData = DB::table('ngo_type_and_languages')
        ->where('user_id',$form_one_data->user_id)->first();
        $duration_list_all = DB::table('ngo_durations')->where('fd_one_form_id',$form_one_data->id)->latest()->first();

        //dd($user_id);

        $newyear = date('y', strtotime($request->main_date));

        $newmonth = date('F', strtotime($request->main_date));


        $newdate = date('d', strtotime($request->main_date));

        $word = $this->numberToWord($newyear);
        $word1 = $this->numberToWord($newdate);
        //dd($word1);

        //dd($newdate);
$mainDate = $request->main_date;
        $file_Name_Custome = 'certificate';
        $pdf=PDF::loadView('admin.registration_list.printCertificateViewDemo',['newyear'=>$newyear,'ngoTypeData'=>$ngoTypeData,
'newmonth'=>$newmonth,'newdate'=>$newdate,'word'=>$word,'word1'=>$word1,'mainDate'=>$mainDate,
'form_one_data'=>$form_one_data,'duration_list_all'=>$duration_list_all],[],['orientation' => 'L'],['format' => [279.4,215.9]]);
return $pdf->stream($file_Name_Custome.''.'.pdf');
 }


    public function updateStatusRegForm(Request $request){

      //dd($request->all());

        DB::table('ngo_statuses')->where('id',$request->id)
->update([
    'status' => $request->status
]);

$get_user_id = DB::table('ngo_statuses')->where('id',$request->id)->value('fd_one_form_id');





//DB::table('DB::table('fd_one_forms')->')->where('user_id',$get_user_id)->first();


if($request->ngotype == 'old'){

    Mail::send('emails.oldRenew', ['id' => $request->status,'ngoId'=>$get_user_id], function($message) use($request){
        $message->to($request->email);
        $message->subject('NGOAB Registration Service || Old Ngo Approved Status');
    });


}else{




        if($request->status == 'Accepted'){

            $date = date('Y-m-d');
    $newDate = date('Y-m-d', strtotime($date. ' + 10 years'));

    DB::table('fd_one_forms')->where('id',$get_user_id)
    ->update([
        'registration_number' => $request->reg_no_get_from_admin
    ]);


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



        Mail::send('emails.passwordResetEmail', ['id' => $request->status,'ngoId'=>$get_user_id], function($message) use($request){
            $message->to($request->email);
            $message->subject('NGOAB Registration Service || Ngo Approved Status');
        });


    }




        return redirect()->back()->with('success','Updated Successfully');
    }


    public function formOnePdf($main_id,$id){


        if($id == 'plan'){

            $form_one_data = DB::table('fd_one_forms')->where('id',$main_id)->value('plan_of_operation');

        }elseif($id == 'invoice'){

          //dd($id);

            $form_one_data1 = DB::table('fd_one_forms')->where('id',$main_id)->first();

        $form_one_data = $form_one_data1->attach_the__supporting_paper;

        }elseif($id == 'treasury_bill'){

            $form_one_data = DB::table('fd_one_forms')->where('id',$main_id)->value('board_of_revenue_on_fees');

        }elseif($id == 'final_pdf'){
            $form_one_data = DB::table('fd_one_forms')->where('id',$main_id)->value('verified_fd_one_form');
        }elseif($id == 'final_pdf_eight'){
            $form_one_data = DB::table('fd_one_forms')->where('id',$main_id)->value('verified_fd_eight_form_old');
        }

        return view('admin.registration_list.form_one_pdf',compact('form_one_data'));
    }


    public function formEightPdf($main_id){

        $form_one_data = DB::table('form_eights')->where('fd_one_form_id',$main_id)->value('verified_form_eight');

        return view('admin.registration_list.form_eight_pdf',compact('form_one_data'));
    }

    public function sourceOfFund($id){

        $form_one_data = DB::table('fd_one_source_of_funds')->where('id',$id)->value('letter_file');
         return view('admin.registration_list.source_of_fund',compact('form_one_data'));
    }

    public function otherPdfView($id){

        $form_one_data = DB::table('fd_one_other_pdf_lists')->where('id',$id)->value('information_pdf');
         return view('admin.registration_list.other_pdf_view',compact('form_one_data'));
    }


    public function ngoMemberDocPdfView($id){

        $form_one_data = DB::table('ngo_member_nid_photos')->where('id',$id)->value('member_nid_copy');

         return view('admin.registration_list.ngo_member_doc__pdf_view',compact('form_one_data'));
    }


    public function ngoDocPdfView($id){

        $form_one_data = DB::table('ngo_other_docs')->where('id',$id)->value('pdf_file_list');
         return view('admin.registration_list.ngo_doc__pdf_view',compact('form_one_data'));
    }


    public function renewPdfList($main_id,$id){

        if($id = 'f'){

            $form_one_data = DB::table('ngo_renew_infos')->where('user_id',$main_id)->value('foregin_pdf');

        }elseif($id = 'y'){

            $form_one_data = DB::table('ngo_renew_infos')->where('user_id',$main_id)->value('yearly_budget');

        }elseif($id = 'c'){

            $form_one_data = DB::table('ngo_renew_infos')->where('user_id',$main_id)->value('copy_of_chalan');

        }elseif($id = 'd'){

            $form_one_data = DB::table('ngo_renew_infos')->where('user_id',$main_id)->value('due_vat_pdf');

        }elseif($id = 'ch'){
            $form_one_data = DB::table('ngo_renew_infos')->where('user_id',$main_id)->value('change_ac_number');
        }

        return view('admin.registration_list.renew_pdf_list',compact('form_one_data'));
    }
}
