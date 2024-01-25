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
use App\Models\NgoFdSevenDak;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Http\Controllers\Admin\CommonController;
class FD7Controller extends Controller
{
    public function index(){

        \LogActivity::addToLog('view fdSeven List ');


        if(Auth::guard('admin')->user()->designation_list_id == 2 || Auth::guard('admin')->user()->designation_list_id == 1){

          $dataFromFd7Form = DB::table('fd7_forms')
          ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd7_forms.fd_one_form_id')
          ->select('fd_one_forms.*','fd7_forms.*','fd7_forms.id as mainId')
         ->orderBy('fd7_forms.id','desc')
         ->get();
        }else{

            $ngoStatusFdSevenDak = NgoFdSevenDak::where('status',1)
            ->where('receiver_admin_id',Auth::guard('admin')->user()->id)
            ->latest()->get();

            $convertNameTitle = $ngoStatusFdSevenDak->implode("fd_seven_status_id", " ");
            $separatedDataTitle = explode(" ", $convertNameTitle);

            $dataFromFd7Form = DB::table('fd7_forms')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd7_forms.fd_one_form_id')
            ->select('fd_one_forms.*','fd7_forms.*','fd7_forms.id as mainId')
            ->whereIn('fd7_forms.id',$separatedDataTitle)
            ->orderBy('fd7_forms.id','desc')
            ->get();

        }

        return view('admin.fd7form.index',compact('dataFromFd7Form'));

    }


    public function show($id){

        \LogActivity::addToLog('view fdSeven List Detail');

        $dataFromFd7Form = DB::table('fd7_forms')
        ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd7_forms.fd_one_form_id')
        ->select('fd_one_forms.*','fd7_forms.*','fd7_forms.id as mainId')
        ->where('fd7_forms.id',$id)
        ->orderBy('fd7_forms.id','desc')
        ->first();

        $getEmailFromUser = DB::table('users')->where('id',$dataFromFd7Form->user_id)->value('email');

        $fd2FormList = DB::table('fd2_form_for_fd7_forms')->where('fd_one_form_id',$dataFromFd7Form->fd_one_form_id)
             ->where('fd7_form_id',$dataFromFd7Form->mainId)->latest()->first();
        $fd2OtherInfo = DB::table('fd2_fd7_other_infos')->where('fd2_form_for_fd7_form_id',$fd2FormList->id)->latest()->get();
        $prokolpoAreaList = DB::table('fd7_form_prokolpo_areas')->where('fd7_form_id',$dataFromFd7Form->mainId)->latest()->get();

        return view('admin.fd7form.show',compact('getEmailFromUser','dataFromFd7Form','fd2FormList','fd2OtherInfo','prokolpoAreaList'));

    }


    public function authorizationLetter($id){

        \LogActivity::addToLog('authorizationLetter pdf download.');

        $formOneData = DB::table('fd7_forms')->where('id',$id)->value('bureau_approval_pdf');

        return view('admin.fd7form.authorizationLetter',compact('formOneData'));

    }

    public function reliefAssistanceProjectProposalPdf($id){

        LogActivity::addToLog('reliefAssistanceProjectProposalPdf download.');

        $formOneData = DB::table('fd7_forms')->where('id',$id)->value('relief_assistance_project_proposal_pdf');

        return view('admin.fd7form.reliefAssistanceProjectProposalPdf',compact('formOneData'));

    }

    public function letterFromDonorAgency($id){

        \LogActivity::addToLog('letterFromDonorAgency pdf download.');

        $formOneData = DB::table('fd7_forms')->where('id',$id)->value('letter_from_donor_agency_pdf');

        return view('admin.fd7form.letterFromDonorAgency',compact('formOneData'));

    }


    public function fd7fd2PdfDownload($id){

        \LogActivity::addToLog('fd2 pdf download.');

        $formOneData = DB::table('fd2_form_for_fd7_forms')->where('id',$id)->value('fd_2_form_pdf');

        return view('admin.fd6form.fd2PdfDownload',compact('formOneData'));

    }


    public function fd7fd2OtherPdfDownload($id){

        \LogActivity::addToLog('fd2 other pdf download.');

        $formOneData = DB::table('fd2_fd7_other_infos')->where('id',$id)->value('file');

        return view('admin.fd6form.fd2PdfDownload',compact('formOneData'));

    }


    public function statusUpdateForFd7(Request $request){

        \LogActivity::addToLog('update fdSeven Status ');

        DB::table('fd7_forms')->where('id',$request->id)
                ->update([
                    'status' => $request->status,
                    'comment' => $request->comment,
                ]);

        $get_user_id = DB::table('fd7_forms')->where('id',$request->id)->value('fd_one_form_id');

        Mail::send('emails.projectProposal', ['comment' => $request->comment,'id' => $request->status,'ngoId'=>$get_user_id], function($message) use($request){
                        $message->to($request->email);
                        $message->subject('Project proposal Service');
                    });

        return redirect()->back()->with('success','Updated successfully!');

    }
}
