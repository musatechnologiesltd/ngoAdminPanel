<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NothiDetail;
use Auth;
class ReceiveNothiController extends Controller
{
    public function index(){



        $senderNothiList = NothiDetail::where('receiver',Auth::guard('admin')->user()->id)->whereNull('sent_status')
        ->where('dakType','renew')->latest()->get();


        $senderNothiListRegistration = NothiDetail::where('receiver',Auth::guard('admin')->user()->id)->whereNull('sent_status')
        ->where('dakType','registration')->latest()->get();


            return view('admin.receiveNothi.index',compact('senderNothiList','senderNothiListRegistration'));



    }
}
