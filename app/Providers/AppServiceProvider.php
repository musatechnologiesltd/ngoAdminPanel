<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\Models\Admin;
use DB;
use Carbon\Carbon;
use App\Models\SystemInformation;
use Hash;
use Illuminate\Support\Str;
use Mail;
use PDF;
use Response;
use App\Models\Branch;
use App\Models\ForwardingLetterOnulipi;
use App\Models\DakDetail;
use App\Models\NgoFDNineDak;
use App\Models\NgoFDNineOneDak;
use App\Models\NgoNameChangeDak;
use App\Models\NgoRenewDak;
use App\Models\NgoFdSixDak;
use App\Models\NgoFdSevenDak;
use App\Models\FcOneDak;
use App\Models\FcTwoDak;
use App\Models\NgoRegistrationDak;
use App\Models\DesignationList;
use App\Models\DesignationStep;
use App\Models\AdminDesignationHistory;
use App\Models\FdThreeDak;
use App\Models\NothiList;
use Mpdf\Mpdf;
use App\Models\NothiDetail;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(\Illuminate\Support\Facades\Schema::hasTable('system_information')){



            //data code new
            view()->composer('*', function ($view)
            {
            if (Auth::guard('admin')->check()) {


                $totalReceiveNothi = NothiDetail::where('receiver',Auth::guard('admin')->user()->id)
                ->latest()->count();


                if(Auth::guard('admin')->user()->designation_list_id == 2 || Auth::guard('admin')->user()->designation_list_id == 1){

                    $all_data_for_new_list = DB::table('ngo_statuses')->whereIn('status',['Ongoing','Old Ngo Renew'])->latest() ->count();
                    $all_data_for_renew_list = DB::table('ngo_renews')->where('status','Ongoing')->latest() ->count();
                    $all_data_for_name_changes_list = DB::table('ngo_name_changes')->where('status','Ongoing')->latest() ->count();


                    $dataFdNineOne = DB::table('fd9_one_forms')
                    ->join('n_visas', 'n_visas.fd9_one_form_id', '=', 'fd9_one_forms.id')
                    ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd9_one_forms.fd_one_form_id')
                    ->select('fd_one_forms.*','fd9_one_forms.*','n_visas.*','n_visas.id as nVisaId')
                    ->whereNull('fd9_one_forms.status')
                    ->orderBY('fd9_one_forms.id','desc')
                    ->count();


                    //dd($dataFdNineOne);

                    $dataFdNine = DB::table('fd9_forms')->where('status','Ongoing')->latest()->count();

                    $dataFromFd6Form = DB::table('fd6_forms')
                    ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd6_forms.fd_one_form_id')
                    ->select('fd_one_forms.*','fd6_forms.*','fd6_forms.id as mainId')
                   ->orderBy('fd6_forms.id','desc')
                   ->count();


                   $dataFromFd7Form = DB::table('fd7_forms')
                   ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd7_forms.fd_one_form_id')
                   ->select('fd_one_forms.*','fd7_forms.*','fd7_forms.id as mainId')
                   ->orderBy('fd7_forms.id','desc')
                   ->count();


                   $dataFromFc1Form = DB::table('fc1_forms')
                   ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fc1_forms.fd_one_form_id')
                   ->select('fd_one_forms.*','fc1_forms.*','fc1_forms.id as mainId')
                   ->orderBy('fc1_forms.id','desc')
                   ->count();


                   $dataFromFc2Form = DB::table('fc2_forms')
                   ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fc2_forms.fd_one_form_id')
                   ->select('fd_one_forms.*','fc2_forms.*','fc2_forms.id as mainId')
                   ->orderBy('fc2_forms.id','desc')
                   ->count();


                   $dataFromFd3Form = DB::table('fd3_forms')
                   ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd3_forms.fd_one_form_id')
                   ->select('fd_one_forms.*','fd3_forms.*','fd3_forms.id as mainId')
                   ->orderBy('fd3_forms.id','desc')
                   ->count();


                    $ngoStatusRenew1 = NgoRenewDak::where('status',1)->where('nothi_jat_status',0)->where('nothi_jat_status','!=',1)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusNameChange1 = NgoNameChangeDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFDNineDak1 = NgoFDNineDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFdSixDak1 = NgoFdSixDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFdSevenDak1 = NgoFdSevenDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFcOneDak1 = FcOneDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFcTwoDak1 = FcTwoDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFdThreeDak1 = FdThreeDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFDNineOneDak1 = NgoFDNineOneDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusReg1 = NgoRegistrationDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();


                    $mainCodeCountHeader1 =$ngoStatusReg1+$ngoStatusFDNineOneDak1+$ngoStatusFdThreeDak1+$ngoStatusFcTwoDak1+$ngoStatusFcOneDak1+$ngoStatusFdSevenDak1+$ngoStatusFdSixDak1+$ngoStatusFDNineDak1+$ngoStatusNameChange1+$ngoStatusRenew1;


                   $mainCodeCountHeader2 =  $all_data_for_name_changes_list + $all_data_for_renew_list + $all_data_for_new_list+ $dataFdNineOne + $dataFdNine + $dataFromFd6Form + $dataFromFd7Form+$dataFromFc1Form+$dataFromFc2Form+$dataFromFd3Form ;

                   $mainCodeCountHeader = $mainCodeCountHeader2 - $mainCodeCountHeader1;

                }else{



                    $ngoStatusRenew = NgoRenewDak::where('status',1)->where('nothi_jat_status',0)->where('nothi_jat_status','!=',1)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusNameChange = NgoNameChangeDak::where('status',1)->where('nothi_jat_status',0)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFDNineDak = NgoFDNineDak::where('status',1)->where('nothi_jat_status',0)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFdSixDak = NgoFdSixDak::where('status',1)->where('nothi_jat_status',0)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFdSevenDak = NgoFdSevenDak::where('status',1)->where('nothi_jat_status',0)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFcOneDak = FcOneDak::where('status',1)->where('nothi_jat_status',0)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFcTwoDak = FcTwoDak::where('status',1)->where('nothi_jat_status',0)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFdThreeDak = FdThreeDak::where('status',1)->where('nothi_jat_status',0)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFDNineOneDak = NgoFDNineOneDak::where('status',1)->where('nothi_jat_status',0)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusReg = NgoRegistrationDak::where('status',1)->where('nothi_jat_status',0)->where('receiver_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();

                    $mainCodeCountHeader2 =$ngoStatusReg+$ngoStatusFDNineOneDak+$ngoStatusFdThreeDak+$ngoStatusFcTwoDak+$ngoStatusFcOneDak+$ngoStatusFdSevenDak+$ngoStatusFdSixDak+$ngoStatusFDNineDak+$ngoStatusNameChange+$ngoStatusRenew;



                    $ngoStatusRenew1 = NgoRenewDak::where('status',1)->where('nothi_jat_status',0)->where('nothi_jat_status','!=',1)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusNameChange1 = NgoNameChangeDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFDNineDak1 = NgoFDNineDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFdSixDak1 = NgoFdSixDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFdSevenDak1 = NgoFdSevenDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFcOneDak1 = FcOneDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFcTwoDak1 = FcTwoDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFdThreeDak1 = FdThreeDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusFDNineOneDak1 = NgoFDNineOneDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();
                    $ngoStatusReg1 = NgoRegistrationDak::where('status',1)->where('nothi_jat_status',0)->where('sender_admin_id',Auth::guard('admin')->user()->id)->latest() ->count();


                    $mainCodeCountHeader1 =$ngoStatusReg1+$ngoStatusFDNineOneDak1+$ngoStatusFdThreeDak1+$ngoStatusFcTwoDak1+$ngoStatusFcOneDak1+$ngoStatusFdSevenDak1+$ngoStatusFdSixDak1+$ngoStatusFDNineDak1+$ngoStatusNameChange1+$ngoStatusRenew1;


                   //$mainCodeCountHeader2 =  $all_data_for_name_changes_list + $all_data_for_renew_list + $all_data_for_new_list+ $dataFdNineOne + $dataFdNine + $dataFromFd6Form + $dataFromFd7Form+$dataFromFc1Form+$dataFromFc2Form+$dataFromFd3Form ;

                   $mainCodeCountHeader = $mainCodeCountHeader2 - $mainCodeCountHeader1;

                }


            }else{


                $mainCodeCountHeader = 0;
                $totalReceiveNothi = 0;

            }


            //enddata code new
            view()->share('mainCodeCountHeader', $mainCodeCountHeader);
            view()->share('totalReceiveNothi', $totalReceiveNothi);
        });



            $data = DB::table('system_information')->first();

            if (!$data) {
                $icon_name = '';
                $logo_name ='';
                $ins_name = '';
                $ins_add = '';
                $ins_url = '';
                $ins_email = '';

                $ins_phone = '';

                view()->share('ins_name', $ins_name);
                view()->share('logo',  $logo_name);
                view()->share('icon', $icon_name);
                view()->share('ins_add', $ins_add);
                view()->share('ins_phone', $ins_phone);
                view()->share('ins_email', $ins_email);
                view()->share('ins_url', $ins_url);

            }else{
                view()->share('ins_name', $data->system_name);
                view()->share('logo',  $data->system_logo);
                view()->share('icon', $data->system_icon);
                view()->share('ins_add', $data->system_address);
                view()->share('ins_phone', $data->system_phone);
                view()->share('ins_email', $data->system_email);

                view()->share('ins_url', $data->system_url);

            }

        }else{
            $mainCodeCountHeader = 0;
            $icon_name = '';
            $logo_name ='';
            $ins_name = '';
            $ins_add = '';
            $ins_url = '';
            $ins_email = '';

            $ins_phone = '';
            view()->share('mainCodeCountHeader', $mainCodeCountHeader);
            view()->share('ins_name', $ins_name);
            view()->share('logo',  $logo_name);
            view()->share('icon', $icon_name);
            view()->share('ins_add', $ins_add);
            view()->share('ins_phone', $ins_phone);
            view()->share('ins_email', $ins_email);
            view()->share('ins_url', $ins_url);
        }

        if(\Illuminate\Support\Facades\Schema::hasTable('ngo_statuses')){

            $ongoingNgoStatus = DB::table('ngo_statuses')->where('status','Ongoing')->latest()->get();

            view()->share('ongoingNgoStatus', $ongoingNgoStatus);


        }else{

        }


        if(\Illuminate\Support\Facades\Schema::hasTable('ngo_renews')){

            $ongoingNgoRenewStatus = DB::table('ngo_renews')->where('status','Ongoing')->latest()->get();
            view()->share('ongoingNgoRenewStatus', $ongoingNgoRenewStatus);


        }else{

        }

        if(\Illuminate\Support\Facades\Schema::hasTable('ngo_name_changes')){

            $ongoingNgoNameChangeStatus = DB::table('ngo_name_changes')->where('status','Ongoing')->latest()->get();
            view()->share('ongoingNgoNameChangeStatus', $ongoingNgoNameChangeStatus);


        }else{

        }
    }
}
