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

            $convertNameTitle = $ngoStatusFdSevenDak->implode("fc_one_status_id", " ");
            $separatedDataTitle = explode(" ", $convertNameTitle);

            $dataFromFc1Form = DB::table('fc1_forms')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fc1_forms.fd_one_form_id')
            ->select('fd_one_forms.*','fc1_forms.*','fc1_forms.id as mainId')
            ->whereIn('fc1_forms.id',$separatedDataTitle)
            ->orderBy('fc1_forms.id','desc')
            ->get();

        }

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

            $getEmailFromUser = DB::table('users')->where('id',$dataFromFc1Form->user_id)->value('email');
            $fd2FormList = DB::table('fd2_form_for_fc1_forms')->where('fd_one_form_id',$dataFromFc1Form->fd_one_form_id)
             ->where('fc1_form_id',$dataFromFc1Form->mainId)->latest()->first();
            $fd2OtherInfo = DB::table('fd2_fc1_other_infos')->where('fd2_form_for_fc1_form_id',$fd2FormList->id)->latest()->get();

            return view('admin.fc1form.show',compact('getEmailFromUser','dataFromFc1Form','fd2FormList','fd2OtherInfo'));

    }

    public function fc1PdfDownload($id){

        \LogActivity::addToLog('organization name of the job amount of money and duration pdf');

        $formOneData = DB::table('fc1_forms')->where('id',$id)->value('organization_name_of_the_job_amount_of_money_and_duration_pdf');

        return view('admin.fc1form.fc1PdfDownload',compact('formOneData'));

    }

    public function verified_fc_one_form($id){

        \LogActivity::addToLog('verified_fc_one_form pdf');

        $formOneData = DB::table('fc1_forms')->where('id',$id)->value('verified_fc_one_form');

        return view('admin.fc1form.fc1PdfDownload',compact('formOneData'));

    }

    public function fc1fd2PdfDownload($id){

        \LogActivity::addToLog('fd2 pdf download.');

        $formOneData = DB::table('fd2_form_for_fc1_forms')->where('id',$id)->value('fd_2_form_pdf');

        return view('admin.fc1form.fc1fd2PdfDownload',compact('formOneData'));

    }

    public function fc1fd2OtherPdfDownload($id){

        \LogActivity::addToLog('fd2 other pdf download.');

        $formOneData = DB::table('fd2_fc1_other_infos')->where('id',$id)->value('file');

        return view('admin.fc1form.fc1fd2OtherPdfDownload',compact('formOneData'));

    }

    public function statusUpdateForFc1(Request $request){

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
