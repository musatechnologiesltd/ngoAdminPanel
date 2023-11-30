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
use App\Models\FcOneDak;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Http\Controllers\Admin\CommonController;
class Fc1Controller extends Controller
{
    public function index(){

        \LogActivity::addToLog('view fcOne List ');


        if(Auth::guard('admin')->user()->designation_list_id == 2 || Auth::guard('admin')->user()->designation_list_id == 1){

          $dataFromFc1Form = DB::table('fc1_forms')
          ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fc1_forms.fd_one_form_id')
          ->select('fd_one_forms.*','fc1_forms.*','fc1_forms.id as mainId')
         ->orderBy('fc1_forms.id','desc')
         ->get();
        }else{

            $ngoStatusFdSevenDak = FcOneDak::where('status',1)
            ->where('receiver_admin_id',Auth::guard('admin')->user()->id)
            ->latest()->get();

            $convert_name_title = $ngoStatusFdSevenDak->implode("fd_seven_status_id", " ");
             $separated_data_title = explode(" ", $convert_name_title);



            $dataFromFc1Form = DB::table('fc1_forms')
              ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fc1_forms.fd_one_form_id')
              ->select('fd_one_forms.*','fc1_forms.*','fc1_forms.id as mainId')
              ->whereIn('fc1_forms.id',$separated_data_title)
             ->orderBy('fc1_forms.id','desc')
             ->get();




        }



         //dd($dataFromNVisaFd9Fd1);
             return view('admin.fc1form.index',compact('dataFromFc1Form'));

         }


         public function show($id){

            \LogActivity::addToLog('view fdSeven List Detail');

              $dataFromFc1Form = DB::table('fc1_forms')
              ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fc1_forms.fd_one_form_id')
              ->select('fd_one_forms.*','fc1_forms.*','fc1_forms.id as mainId')
              ->where('fc1_forms.id',$id)
             ->orderBy('fc1_forms.id','desc')
             ->first();
             $get_email_from_user = DB::table('users')->where('id',$dataFromFc1Form->user_id)->value('email');

             $fd2FormList = DB::table('fd2_form_for_fc1_forms')->where('fd_one_form_id',$dataFromFc1Form->fd_one_form_id)
             ->where('fc1_form_id',$dataFromFc1Form->mainId)->latest()->first();

             $fd2OtherInfo = DB::table('fd2_fc1_other_infos')->where('fd2_form_for_fc1_form_id',$fd2FormList->id)->latest()->get();




             //dd($dataFromNVisaFd9Fd1);
                 return view('admin.fc1form.show',compact('get_email_from_user','dataFromFc1Form','fd2FormList','fd2OtherInfo'));

             }


             public function fc1PdfDownload($id){

                \LogActivity::addToLog('organization name of the job amount of money and duration pdf');

                $form_one_data = DB::table('fc1_forms')->where('id',$id)->value('organization_name_of_the_job_amount_of_money_and_duration_pdf');

                 return view('admin.fc1form.fc1PdfDownload',compact('form_one_data'));

             }

             public function fc1fd2PdfDownload($id){

                \LogActivity::addToLog('fd2 pdf download.');

                $form_one_data = DB::table('fd2_form_for_fc1_forms')->where('id',$id)->value('fd_2_form_pdf');

                 return view('admin.fc1form.fc1fd2PdfDownload',compact('form_one_data'));
             }


             public function fc1fd2OtherPdfDownload($id){


                \LogActivity::addToLog('fd2 other pdf download.');

                $form_one_data = DB::table('fd2_fc1_other_infos')->where('id',$id)->value('file');

                 return view('admin.fc1form.fc1fd2OtherPdfDownload',compact('form_one_data'));


             }


             public function statusUpdateForFc1(Request $request){

            //dd($request->all());


                \LogActivity::addToLog('update fcOne Status ');


                DB::table('fc1_forms')->where('id',$request->id)
                ->update([
                    'status' => $request->status,
                    'comment' => $request->comment,
                ]);


                $get_user_id = DB::table('fc1_forms')->where('id',$request->id)->value('fd_one_form_id');


                    Mail::send('emails.grantApplication', ['comment' => $request->comment,'id' => $request->status,'ngoId'=>$get_user_id], function($message) use($request){
                        $message->to($request->email);
                        $message->subject('One time grant application form');
                    });






                return redirect()->back()->with('success','Updated successfully!');
             }
}