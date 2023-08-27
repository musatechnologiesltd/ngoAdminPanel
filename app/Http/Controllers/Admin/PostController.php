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
use App\Models\Branch;
use App\Models\ForwardingLetterOnulipi;
use App\Models\Admin;
use App\Models\DakDetail;
use App\Models\NgoFDNineDak;
use App\Models\NgoFDNineOneDak;
use App\Models\NgoNameChangeDak;
use App\Models\NgoRenewDak;
use App\Models\NgoRegistrationDak;
use App\Models\DesignationList;
use App\Models\DesignationStep;
use App\Models\AdminDesignationHistory;
class PostController extends Controller
{
    public function index(){

        if(Auth::guard('admin')->user()->designation_list_id == 2 || Auth::guard('admin')->user()->designation_list_id == 1){

            $all_data_for_new_list = DB::table('ngo_statuses')->where('status','Ongoing')->latest()->get();
            $all_data_for_renew_list = DB::table('ngo_renews')->where('status','Ongoing')->latest()->get();
            $all_data_for_name_changes_list = DB::table('ngo_name_changes')->where('status','Ongoing')->latest()->get();

            $dataFdNine = DB::table('fd9_forms')->join('n_visas', 'n_visas.id', '=', 'fd9_forms.n_visa_id')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'n_visas.fd_one_form_id')
            ->select('fd_one_forms.*','fd9_forms.*','fd9_forms.status as mainStatus','n_visas.*','n_visas.id as nVisaId')
            ->whereNull('fd9_forms.status')->orderBy('fd9_forms.id','desc')->get();

            $dataFdNineOne = DB::table('fd9_one_forms')->whereNull('status')->latest()->get();

            return view('admin.post.index',compact('dataFdNineOne','dataFdNine','all_data_for_name_changes_list','all_data_for_renew_list','all_data_for_new_list'));
        }else{

            $ngoStatusRenew = NgoRenewDak::where('status',1)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest()->get();
            $ngoStatusNameChange = NgoNameChangeDak::where('status',1)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest()->get();


            $ngoStatusFDNineDak = NgoFDNineDak::where('status',1)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest()->get();
            $ngoStatusFDNineOneDak = NgoFDNineOneDak::where('status',1)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest()->get();


        $ngoStatusReg = NgoRegistrationDak::where('status',1)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest()->get();
        $all_data_for_new_list = DB::table('ngo_statuses')->where('status','Ongoing')->latest()->get();

        return view('admin.post.otherMemberIndex',compact('ngoStatusFDNineOneDak','ngoStatusFDNineDak','ngoStatusNameChange','ngoStatusRenew','ngoStatusReg'));


        }




    }


    public function dakListSecondStep(Request $request){


        //dd($request->all());


             $dakDetail = new DakDetail();
             $dakDetail->sender_id =Auth::guard('admin')->user()->id;
             $dakDetail->decision_list = $request->decision_list;
             $dakDetail->decision_list_detail =$request->decision_list_detail;
             $dakDetail->priority_list =$request->priority_list;
             $dakDetail->secret_list =$request->secret_list;
             $dakDetail->status =$request->mainstatus;
             $dakDetail->save();


             $dakDetailId = $dakDetail->id;

        $inputAllData=$request->all();

        $receiverId = $inputAllData['receiverId'];

        //dd($inputAllData);

        if($request->mainstatus == 'registration'){

            ////

            if(count($receiverId) >0){

                foreach($receiverId as $key => $allReceiverId){

                    if (array_key_exists('karjo_onulipi'.$key, $inputAllData)){


                        $karjoOnulipi = $inputAllData['karjo_onulipi'.$key][$key];
                    }else{

                        $karjoOnulipi = '';
                    }


                    if (array_key_exists('main_prapok'.$key, $inputAllData)){


                        $mainPrapok = $inputAllData['main_prapok'.$key][$key];
                    }else{

                        $mainPrapok = '';
                    }


                    if (array_key_exists('info_onulipi'.$key, $inputAllData)){


                        $infoOnulipi = $inputAllData['info_onulipi'.$key][$key];
                    }else{

                        $infoOnulipi = '';
                    }


                    if (array_key_exists('eye_onulipi'.$key, $inputAllData)){


                        $eyeOnulipi = $inputAllData['eye_onulipi'.$key][$key];
                    }else{

                        $eyeOnulipi = '';
                    }


                    $regDakData = NgoRegistrationDak::find($inputAllData['receiverId'][$key]);
                    $regDakData->original_recipient =$mainPrapok;
                    $regDakData->copy_of_work =$karjoOnulipi;
                    $regDakData->informational_purposes =$infoOnulipi;
                    $regDakData->attraction_attention =$eyeOnulipi;
                    $regDakData->dak_detail_id = $dakDetailId;
                    $regDakData->status = 1;
                    $regDakData->save();



                    //dd($main_prapok);
                }






            }
            ////

        }elseif($request->mainstatus == 'renew'){

            ////


            if(count($receiverId) >0){

                foreach($receiverId as $key => $allReceiverId){

                    if (array_key_exists('karjo_onulipi'.$key, $inputAllData)){


                        $karjoOnulipi = $inputAllData['karjo_onulipi'.$key][$key];
                    }else{

                        $karjoOnulipi = '';
                    }


                    if (array_key_exists('main_prapok'.$key, $inputAllData)){


                        $mainPrapok = $inputAllData['main_prapok'.$key][$key];
                    }else{

                        $mainPrapok = '';
                    }


                    if (array_key_exists('info_onulipi'.$key, $inputAllData)){


                        $infoOnulipi = $inputAllData['info_onulipi'.$key][$key];
                    }else{

                        $infoOnulipi = '';
                    }


                    if (array_key_exists('eye_onulipi'.$key, $inputAllData)){


                        $eyeOnulipi = $inputAllData['eye_onulipi'.$key][$key];
                    }else{

                        $eyeOnulipi = '';
                    }


                    $regDakData = NgoRenewDak::find($inputAllData['receiverId'][$key]);
                    $regDakData->original_recipient =$mainPrapok;
                    $regDakData->copy_of_work =$karjoOnulipi;
                    $regDakData->informational_purposes =$infoOnulipi;
                    $regDakData->attraction_attention =$eyeOnulipi;
                    $regDakData->dak_detail_id = $dakDetailId;
                    $regDakData->status = 1;
                    $regDakData->save();



                    //dd($main_prapok);
                }






            }


            ///

        }elseif($request->mainstatus == 'nameChange'){

            /////

            if(count($receiverId) >0){

                foreach($receiverId as $key => $allReceiverId){

                    if (array_key_exists('karjo_onulipi'.$key, $inputAllData)){


                        $karjoOnulipi = $inputAllData['karjo_onulipi'.$key][$key];
                    }else{

                        $karjoOnulipi = '';
                    }


                    if (array_key_exists('main_prapok'.$key, $inputAllData)){


                        $mainPrapok = $inputAllData['main_prapok'.$key][$key];
                    }else{

                        $mainPrapok = '';
                    }


                    if (array_key_exists('info_onulipi'.$key, $inputAllData)){


                        $infoOnulipi = $inputAllData['info_onulipi'.$key][$key];
                    }else{

                        $infoOnulipi = '';
                    }


                    if (array_key_exists('eye_onulipi'.$key, $inputAllData)){


                        $eyeOnulipi = $inputAllData['eye_onulipi'.$key][$key];
                    }else{

                        $eyeOnulipi = '';
                    }


                    $regDakData = NgoNameChangeDak::find($inputAllData['receiverId'][$key]);
                    $regDakData->original_recipient =$mainPrapok;
                    $regDakData->copy_of_work =$karjoOnulipi;
                    $regDakData->informational_purposes =$infoOnulipi;
                    $regDakData->attraction_attention =$eyeOnulipi;
                    $regDakData->dak_detail_id = $dakDetailId;
                    $regDakData->status = 1;
                    $regDakData->save();



                    //dd($main_prapok);
                }






            }
            ////

        }elseif($request->mainstatus == 'fdNine'){
            /////
            if(count($receiverId) >0){

                foreach($receiverId as $key => $allReceiverId){

                    if (array_key_exists('karjo_onulipi'.$key, $inputAllData)){


                        $karjoOnulipi = $inputAllData['karjo_onulipi'.$key][$key];
                    }else{

                        $karjoOnulipi = '';
                    }


                    if (array_key_exists('main_prapok'.$key, $inputAllData)){


                        $mainPrapok = $inputAllData['main_prapok'.$key][$key];
                    }else{

                        $mainPrapok = '';
                    }


                    if (array_key_exists('info_onulipi'.$key, $inputAllData)){


                        $infoOnulipi = $inputAllData['info_onulipi'.$key][$key];
                    }else{

                        $infoOnulipi = '';
                    }


                    if (array_key_exists('eye_onulipi'.$key, $inputAllData)){


                        $eyeOnulipi = $inputAllData['eye_onulipi'.$key][$key];
                    }else{

                        $eyeOnulipi = '';
                    }


                    $regDakData = NgoFDNineDak::find($inputAllData['receiverId'][$key]);
                    $regDakData->original_recipient =$mainPrapok;
                    $regDakData->copy_of_work =$karjoOnulipi;
                    $regDakData->informational_purposes =$infoOnulipi;
                    $regDakData->attraction_attention =$eyeOnulipi;
                    $regDakData->dak_detail_id = $dakDetailId;
                    $regDakData->status = 1;
                    $regDakData->save();



                    //dd($main_prapok);
                }






            }

            ////

        }elseif($request->mainstatus == 'fdNineOne'){

            /////

            if(count($receiverId) >0){

                foreach($receiverId as $key => $allReceiverId){

                    if (array_key_exists('karjo_onulipi'.$key, $inputAllData)){


                        $karjoOnulipi = $inputAllData['karjo_onulipi'.$key][$key];
                    }else{

                        $karjoOnulipi = '';
                    }


                    if (array_key_exists('main_prapok'.$key, $inputAllData)){


                        $mainPrapok = $inputAllData['main_prapok'.$key][$key];
                    }else{

                        $mainPrapok = '';
                    }


                    if (array_key_exists('info_onulipi'.$key, $inputAllData)){


                        $infoOnulipi = $inputAllData['info_onulipi'.$key][$key];
                    }else{

                        $infoOnulipi = '';
                    }


                    if (array_key_exists('eye_onulipi'.$key, $inputAllData)){


                        $eyeOnulipi = $inputAllData['eye_onulipi'.$key][$key];
                    }else{

                        $eyeOnulipi = '';
                    }


                    $regDakData = NgoFDNineOneDak::find($inputAllData['receiverId'][$key]);
                    $regDakData->original_recipient =$mainPrapok;
                    $regDakData->copy_of_work =$karjoOnulipi;
                    $regDakData->informational_purposes =$infoOnulipi;
                    $regDakData->attraction_attention =$eyeOnulipi;
                    $regDakData->dak_detail_id = $dakDetailId;
                    $regDakData->status = 1;
                    $regDakData->save();



                    //dd($main_prapok);
                }






            }
            //////
        }



        return redirect()->route('dakBranchList.index')->with('success','Send Successfully!');
    }

    public function dakListFirstStep(Request $request){

        //dd($request->all());


         $number=count($request->admin_id);

         if($request->mainStatusNew == 'registration'){

            if($number >0){
                for($i=0;$i<$number;$i++){




                 $regDakData = new NgoRegistrationDak();
                 $regDakData->sender_admin_id =Auth::guard('admin')->user()->id;
                 $regDakData->receiver_admin_id = $request->admin_id[$i];
                 $regDakData->registration_status_id =$request->main_id;
                 $regDakData->status = 0;
                 $regDakData->save();

                }


            }

         }elseif($request->mainStatusNew == 'renew'){

            if($number >0){
                for($i=0;$i<$number;$i++){




                 $regDakData = new NgoRenewDak();
                 $regDakData->sender_admin_id =Auth::guard('admin')->user()->id;
                 $regDakData->receiver_admin_id = $request->admin_id[$i];
                 $regDakData->renew_status_id =$request->main_id;
                 $regDakData->status = 0;
                 $regDakData->save();

                }


            }

         }elseif($request->mainStatusNew == 'nameChange'){

            if($number >0){
                for($i=0;$i<$number;$i++){




                 $regDakData = new NgoNameChangeDak();
                 $regDakData->sender_admin_id =Auth::guard('admin')->user()->id;
                 $regDakData->receiver_admin_id = $request->admin_id[$i];
                 $regDakData->name_change_status_id =$request->main_id;
                 $regDakData->status = 0;
                 $regDakData->save();

                }


            }

         }elseif($request->mainStatusNew == 'fdNine'){

            if($number >0){
                for($i=0;$i<$number;$i++){




                 $regDakData = new NgoFDNineDak();
                 $regDakData->sender_admin_id =Auth::guard('admin')->user()->id;
                 $regDakData->receiver_admin_id = $request->admin_id[$i];
                 $regDakData->f_d_nine_status_id =$request->main_id;
                 $regDakData->status = 0;
                 $regDakData->save();

                }


            }

         }elseif($request->mainStatusNew == 'fdNineOne'){


            if($number >0){
                for($i=0;$i<$number;$i++){




                 $regDakData = new NgoFDNineOneDak();
                 $regDakData->sender_admin_id =Auth::guard('admin')->user()->id;
                 $regDakData->receiver_admin_id = $request->admin_id[$i];
                 $regDakData->f_d_nine_one_status_id =$request->main_id;
                 $regDakData->status = 0;
                 $regDakData->save();

                }


            }
             // return redirect('admin/showDataAll/'.$request->mainstatus.'/'.$request->main_id);
         }



         return redirect('admin/showDataAll/'.$request->mainStatusNew.'/'.$request->main_id);



    }

    public function showDataAll($status,$id){
        $mainstatus = $status;
        $id = $id;


        if($mainstatus == 'registration'){


            $allRegistrationDak = NgoRegistrationDak::where('status',0)
            ->where('sender_admin_id',Auth::guard('admin')->user()->id)
            ->where('registration_status_id',$id)->get();
//dd($allRegistrationDak);
        }elseif($mainstatus == 'renew'){

            $allRegistrationDak = NgoRenewDak::where('status',0)
            ->where('sender_admin_id',Auth::guard('admin')->user()->id)
            ->where('renew_status_id',$id)->get();


        }elseif($mainstatus == 'nameChange'){

            $allRegistrationDak = NgoNameChangeDak::where('status',0)
            ->where('sender_admin_id',Auth::guard('admin')->user()->id)
            ->where('name_change_status_id',$id)->get();


        }elseif($mainstatus == 'fdNine'){

            $allRegistrationDak = NgoFDNineDak::where('status',0)
            ->where('sender_admin_id',Auth::guard('admin')->user()->id)
            ->where('f_d_nine_status_id',$id)->get();


        }elseif($mainstatus == 'fdNineOne'){

            $allRegistrationDak = NgoFDNineOneDak::where('status',0)
            ->where('sender_admin_id',Auth::guard('admin')->user()->id)
            ->where('f_d_nine_one_status_id',$id)->get();


        }


        return view('admin.post.show',compact('mainstatus','id','allRegistrationDak'));

    }

    public function createSeal($status , $id){

        $id = $id;
        $mainstatus = $status;

         $totalBranch = Branch::where('id','!=',1)->count();
         $totalDesignation = DesignationList::where('id','!=',1)->count();
         $totaluser = Admin::where('id','!=',1)->count();


          $totalDesignationWorking = AdminDesignationHistory::count();

         $totalDesignationId = AdminDesignationHistory::select('designation_list_id')->get();


         $convert_name_title = $totalDesignationId->implode("designation_list_id", " ");
         $separated_data_title = explode(" ", $convert_name_title);


       $totalEmptyDesignation = DesignationList::where('id','!=',1)->whereNotIn('id', $separated_data_title )->count();

         //dd($totalEmptyDesignation);

         $totalBranchList = Branch::where('id','!=',1)->get();

        return view('admin.post.createSeal',compact('mainstatus','id','totalBranchList','totalEmptyDesignation','totalBranch','totalDesignation','totaluser','totalDesignationWorking'));

    }


    public function showDataDesignationWise(Request $request){

        $mainstatus = $request->mainstatus;
        $totalBranch = $request->totalBranch;
        $totalDesi= $request->totalDesi;
$mainStatusNew = $request->mainStatusNew;
      $id = $request->mainId;
        //dd($totalDesi);

    //     if(!empty($totalBranch) && !empty($totalDesi)){

    //      dd($totalBranch);

    //     }elseif(!empty($totalBranch)){

    // dd(2);

    //     }elseif(!empty($totalDesi)){

    //     dd(3);

    //     }

    if(empty($totalDesi)){

        $data = view('admin.post.showDataDesignationWiseEmpty')->render();
        return response()->json($data);
    }else{


    $totalBranchId = DesignationList::whereIn('id',$totalDesi)->select('branch_id')->get();

    $convert_name_title = $totalBranchId->implode("branch_id", " ");
    $separated_data_title = explode(" ", $convert_name_title);


    $totalBranchList = Branch::whereIn('id',$separated_data_title)->get();

    $adminDesignationHistory = AdminDesignationHistory::whereIn('designation_list_id',$totalDesi)->get();

        $data = view('admin.post.showDataDesignationWise',compact('mainStatusNew','id','totalDesi','adminDesignationHistory','totalBranchList'))->render();
        return response()->json($data);
    }
    }


    public function deleteMemberList($id){

        NgoRegistrationDak::where('id',$id)->delete();

        return redirect()->back();
    }


}
