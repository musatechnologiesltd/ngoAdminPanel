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

         //dd($dataFromNVisaFd9Fd1);
             return view('admin.fd6form.show',compact('dataFromFd6Form'));

         }
}
