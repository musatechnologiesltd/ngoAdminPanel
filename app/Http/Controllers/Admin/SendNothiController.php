<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NothiDetail;
use Auth;
class SendNothiController extends Controller
{
    public function index(){



        $senderNothiList = NothiDetail::where('sender',Auth::guard('admin')->user()->id)
                                      ->get();


            return view('admin.sendNothi.index',compact('senderNothiList'));



    }
}