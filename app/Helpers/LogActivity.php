<?php


namespace App\Helpers;
use Request;
use App\Models\LogActivity as LogActivityModel;
use Auth;

class LogActivity
{


    public static function addToLog($subject)
    {
    	$log = [];
    	$log['subject'] = $subject;
    	$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
    	$log['ip_or_mac'] = exec('getmac');
    	$log['agent'] = Request::header('user-agent');
    	$log['admin_id'] = Auth::guard('admin')->check() ? Auth::guard('admin')->user()->id : 1;
    	LogActivityModel::create($log);
    }


    public static function logActivityLists()
    {
    	return LogActivityModel::latest()->get();
    }
}
