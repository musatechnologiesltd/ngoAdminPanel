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
use App\Models\FdThreeDak;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Http\Controllers\Admin\CommonController;
class FD3Controller extends Controller
{
    public function index(){

        \LogActivity::addToLog('view fdThree List ');


        if(Auth::guard('admin')->user()->designation_list_id == 2 || Auth::guard('admin')->user()->designation_list_id == 1){

           $dataFromFd3Form = DB::table('fd3_forms')
           ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd3_forms.fd_one_form_id')
           ->select('fd_one_forms.*','fd3_forms.*','fd3_forms.id as mainId')
           ->orderBy('fd3_forms.id','desc')
           ->get();

        }else{

            $ngoStatusFdSevenDak = FdThreeDak::where('status',1)
            ->where('receiver_admin_id',Auth::guard('admin')->user()->id)
            ->latest()->get();

            $convertNameTitle = $ngoStatusFdSevenDak->implode("fd_three_status_id", " ");
            $separatedDataTitle = explode(" ", $convertNameTitle);

            $dataFromFd3Form = DB::table('fd3_forms')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd3_forms.fd_one_form_id')
            ->select('fd_one_forms.*','fd3_forms.*','fd3_forms.id as mainId')
            ->whereIn('fd3_forms.id',$separatedDataTitle)
            ->orderBy('fd3_forms.id','desc')
            ->get();

        }

        return view('admin.fd3form.index',compact('dataFromFd3Form'));

    }


    public function show($id){

        \LogActivity::addToLog('view fdThree List Detail');

        $dataFromFd3Form = DB::table('fd3_forms')
        ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd3_forms.fd_one_form_id')
        ->select('fd_one_forms.*','fd3_forms.*','fd3_forms.id as mainId')
        ->where('fd3_forms.id',$id)
        ->orderBy('fd3_forms.id','desc')
        ->first();

        $getEmailFromUser = DB::table('users')->where('id',$dataFromFd3Form->user_id)->value('email');
        $fd2FormList = DB::table('fd2_form_for_fd3_forms')->where('fd_one_form_id',$dataFromFd3Form->fd_one_form_id)
             ->where('fd3_form_id',$dataFromFd3Form->mainId)->latest()->first();
        $fd2OtherInfo = DB::table('fd2_fd3_other_infos')->where('fd2_form_for_fd3_form_id',$fd2FormList->id)->latest()->get();

        return view('admin.fd3form.show',compact('getEmailFromUser','dataFromFd3Form','fd2FormList','fd2OtherInfo'));

    }

    public function verified_fd_three_form($id){

        \LogActivity::addToLog('verified_fd_three_form pdf');

        $formOneData = DB::table('fd3_forms')->where('id',$id)->value('verified_fd_three_form');

        return view('admin.fd3form.verified_fd_three_form',compact('formOneData'));

    }


    public function fd3fd2PdfDownload($id){

        \LogActivity::addToLog('fd2 pdf download.');

        $formOneData = DB::table('fd2_form_for_fd3_forms')->where('id',$id)->value('fd_2_form_pdf');

        return view('admin.fd6form.fd2PdfDownload',compact('formOneData'));
    }


    public function fd3fd2OtherPdfDownload($id){

        \LogActivity::addToLog('fd2 other pdf download.');

        $formOneData = DB::table('fd2_fd3_other_infos')->where('id',$id)->value('file');

        return view('admin.fd6form.fd2PdfDownload',compact('formOneData'));

    }

    public function statusUpdateForFd3(Request $request){

        \LogActivity::addToLog('update fdSeven Status ');

        DB::table('fd3_forms')->where('id',$request->id)
                ->update([
                    'status' => $request->status,
                    'comment' => $request->comment,
                ]);

        $get_user_id = DB::table('fd3_forms')->where('id',$request->id)->value('fd_one_form_id');

        Mail::send('emails.previousYearIncome', ['comment' => $request->comment,'id' => $request->status,'ngoId'=>$get_user_id], function($message) use($request){
                        $message->to($request->email);
                        $message->subject('Previous year income statement form');
                    });

        return redirect()->back()->with('success','Updated successfully!');

    }
}
