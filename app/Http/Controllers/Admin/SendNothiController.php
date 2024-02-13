<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NothiDetail;
use Auth;
class SendNothiController extends Controller
{
    public function index(){

//dd()

        $senderNothiList = NothiDetail::where('sender',Auth::guard('admin')->user()->id)
        ->whereNull('back_nothi')
        ->where('dakType','renew')
        ->latest()->get();


        $senderNothiListRegistration = NothiDetail::where('sender',Auth::guard('admin')->user()->id)
        ->whereNull('back_nothi')
        ->where('dakType','registration')
        ->latest()->get();


            return view('admin.sendNothi.index',compact('senderNothiList','senderNothiListRegistration'));



    }
}
