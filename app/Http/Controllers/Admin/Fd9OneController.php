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
use Response;
use App\Models\ForwardingLetter;
use App\Models\ForwardingLetterOnulipi;
class Fd9OneController extends Controller
{
    public function index(){

        $dataFromNVisaFd9Fd1 = DB::table('fd9_one_forms')
       ->join('fd_one_forms', 'fd9_one_forms.fd_one_form_id', '=', 'fd_one_forms.id')
       ->select('fd_one_forms.*','fd9_one_forms.*','fd9_one_forms.id as mainId')
       ->orderBy('fd9_one_forms.id','desc')
       ->get();

       //dd($dataFromNVisaFd9Fd1);
           return view('admin.fd9Oneform.index',compact('dataFromNVisaFd9Fd1'));

       }


       public function statusUpdateForFd9One(Request $request){


        DB::table('fd9_one_forms')->where('id',$request->id)
        ->update([
            'status' => $request->status
        ]);


        return redirect()->back()->with('success','Updated successfully!');



       }

       public function show($id){


        $dataFromNVisaFd9Fd1 = DB::table('fd9_one_forms')
        ->join('fd_one_forms', 'fd9_one_forms.fd_one_form_id', '=', 'fd_one_forms.id')
        ->select('fd_one_forms.*','fd9_one_forms.*','fd9_one_forms.id as mainId')
        ->orderBy('fd9_one_forms.id','desc')
        ->where('fd9_one_forms.id',$id)
        ->first();

        //dd($dataFromNVisaFd9Fd1);
            return view('admin.fd9Oneform.show',compact('dataFromNVisaFd9Fd1'));


       }

       public function fd9OneDownload($cat,$id){
        $data = DB::table('system_information')->first();


        if($cat == 'appoinmentLetter'){

            $get_file_data = DB::table('fd9_one_forms')->where('id',$id)->value('attestation_of_appointment_letter');
        }elseif($cat == 'fd9Copy'){

            $get_file_data = DB::table('fd9_one_forms')->where('id',$id)->value('copy_of_form_nine');

        }elseif($cat == 'visacopy'){

            $get_file_data = DB::table('fd9_one_forms')->where('id',$id)->value('copy_of_nvisa');

        }




        $file_path = $data->system_url.'public/'.$get_file_data;
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

$file=$data->system_url.'public/'.$get_file_data;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        // return Response::download($file,$filename.'.pdf', $headers);

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);

       }
}
