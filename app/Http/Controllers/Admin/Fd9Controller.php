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
}
