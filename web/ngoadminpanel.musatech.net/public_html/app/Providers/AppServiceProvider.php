<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
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
