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
class FD6Controller extends Controller
{
    public function index(){

   \LogActivity::addToLog('view fdSix List ');

     $dataFromFd6Form = DB::table('fd6_forms')
     ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd6_forms.fd_one_form_id')
     ->select('fd_one_forms.*','fd6_forms.*','fd6_forms.id as mainId')
    ->orderBy('fd6_forms.id','desc')
    ->get();

    //dd($dataFromNVisaFd9Fd1);
        return view('admin.fd6form.index',compact('dataFromFd6Form'));

    }



    public function show($id){

        \LogActivity::addToLog('view fdSix List Detail');

          $dataFromFd6Form = DB::table('fd6_forms')
          ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd6_forms.fd_one_form_id')
          ->select('fd_one_forms.*','fd6_forms.*','fd6_forms.id as mainId')
          ->where('fd6_forms.id',$id)
         ->orderBy('fd6_forms.id','desc')
         ->first();


         $fd2FormList = DB::table('fd2_forms')->where('fd_one_form_id',$dataFromFd6Form->fd_one_form_id)
         ->where('fd_six_form_id',base64_encode($dataFromFd6Form->mainId))->latest()->first();

         $fd2OtherInfo = DB::table('fd2_form_other_infos')->where('fd2_form_id',$fd2FormList->id)->latest()->get();


         $prokolpoAreaList = DB::table('fd6_form_prokolpo_areas')->where('fd6_form_id',$dataFromFd6Form->mainId)->latest()->get();

         //dd($dataFromNVisaFd9Fd1);
             return view('admin.fd6form.show',compact('dataFromFd6Form','fd2FormList','fd2OtherInfo','prokolpoAreaList'));

         }


         public function fd6PdfDownload($id){

            \LogActivity::addToLog('fd6 pdf download.');

            $form_one_data = DB::table('fd6_forms')->where('id',$id)->value('project_proposal_form');

             return view('admin.fd6form.fd6PdfDownload',compact('form_one_data'));

         }


         public function fd2PdfDownload($id){

            \LogActivity::addToLog('fd2 pdf download.');

            $form_one_data = DB::table('fd2_forms')->where('id',$id)->value('fd_2_form_pdf');

             return view('admin.fd6form.fd2PdfDownload',compact('form_one_data'));
         }


         public function fd2OtherPdfDownload($id){


            \LogActivity::addToLog('fd2 other pdf download.');

            $form_one_data = DB::table('fd2_form_other_infos')->where('id',$id)->value('file');

             return view('admin.fd6form.fd2PdfDownload',compact('form_one_data'));


         }


         public function statusUpdateForFd6(Request $request){

            dd($request->all());
         }
}
