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
use App\Models\FcTwoDak;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Http\Controllers\Admin\CommonController;
class Fc2Controller extends Controller
{
    public function index(){

        \LogActivity::addToLog('view fcOne List ');


        if(Auth::guard('admin')->user()->designation_list_id == 2 || Auth::guard('admin')->user()->designation_list_id == 1){

           $dataFromFc2Form = DB::table('fc2_forms')
           ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fc2_forms.fd_one_form_id')
           ->select('fd_one_forms.*','fc2_forms.*','fc2_forms.id as mainId')
           ->orderBy('fc2_forms.id','desc')
           ->get();

        }else{

            $ngoStatusFdSevenDak = FcTwoDak::where('status',1)
            ->where('receiver_admin_id',Auth::guard('admin')->user()->id)
            ->latest()->get();

            $convertNameTitle = $ngoStatusFdSevenDak->implode("fc_two_status_id", " ");
            $separatedDataTitle = explode(" ", $convertNameTitle);

            $dataFromFc2Form = DB::table('fc2_forms')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fc2_forms.fd_one_form_id')
            ->select('fd_one_forms.*','fc2_forms.*','fc2_forms.id as mainId')
            ->whereIn('fc2_forms.id',$separatedDataTitle)
            ->orderBy('fc2_forms.id','desc')
            ->get();

        }

        return view('admin.fc2form.index',compact('dataFromFc2Form'));

    }


    public function show($id){

        \LogActivity::addToLog('view fdSeven List Detail');

        $dataFromFc2Form = DB::table('fc2_forms')
        ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fc2_forms.fd_one_form_id')
        ->select('fd_one_forms.*','fc2_forms.*','fc2_forms.id as mainId')
        ->where('fc2_forms.id',$id)
        ->orderBy('fc2_forms.id','desc')
        ->first();

        $getEmailFromUser = DB::table('users')->where('id',$dataFromFc2Form->user_id)->value('email');
        $fd2FormList = DB::table('fd2_form_for_fc2_forms')->where('fd_one_form_id',$dataFromFc2Form->fd_one_form_id)
             ->where('fc2_form_id',$dataFromFc2Form->mainId)->latest()->first();
        $fd2OtherInfo = DB::table('fd2_fc2_other_infos')->where('fd2_form_for_fc2_form_id',$fd2FormList->id)->latest()->get();

        return view('admin.fc2form.show',compact('getEmailFromUser','dataFromFc2Form','fd2FormList','fd2OtherInfo'));

    }


    public function fc2PdfDownload($id){

        \LogActivity::addToLog('organization name of the job amount of money and duration pdf');

        $formOneData = DB::table('fc2_forms')->where('id',$id)->value('organization_name_of_the_job_amount_of_money_and_duration_pdf');

        return view('admin.fc2form.fc2PdfDownload',compact('formOneData'));

    }


    public function verified_fc_two_form($id){

        \LogActivity::addToLog('verified_fc_two_form pdf');

        $formOneData = DB::table('fc2_forms')->where('id',$id)->value('verified_fc_two_form');

        return view('admin.fc2form.fc2PdfDownload',compact('formOneData'));
    }

    public function fc2fd2PdfDownload($id){

        \LogActivity::addToLog('fd2 pdf download.');

        $formOneData = DB::table('fd2_form_for_fc2_forms')->where('id',$id)->value('fd_2_form_pdf');

        return view('admin.fc2form.fc2fd2PdfDownload',compact('formOneData'));

    }


    public function fc2fd2OtherPdfDownload($id){

        \LogActivity::addToLog('fd2 other pdf download.');

        $formOneData = DB::table('fd2_fc2_other_infos')->where('id',$id)->value('file');

        return view('admin.fc2form.fc2fd2OtherPdfDownload',compact('formOneData'));

    }

    public function statusUpdateForFc2(Request $request){

        \LogActivity::addToLog('update fcTwo Status ');

        DB::table('fc2_forms')->where('id',$request->id)
                ->update([
                    'status' => $request->status,
                    'comment' => $request->comment,
                ]);

        $get_user_id = DB::table('fc2_forms')->where('id',$request->id)->value('fd_one_form_id');

        Mail::send('emails.grantApplicationTwo', ['comment' => $request->comment,'id' => $request->status,'ngoId'=>$get_user_id], function($message) use($request){
            $message->to($request->email);
            $message->subject('One time grant application form');
        });

        return redirect()->back()->with('success','Updated successfully!');

    }
}
