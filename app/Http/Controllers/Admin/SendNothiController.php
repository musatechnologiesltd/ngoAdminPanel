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
try{
        $senderNothiList = NothiDetail::where('sender',Auth::guard('admin')->user()->id)
        ->whereNull('back_nothi')
        ->where('dakType','renew')
        ->latest()->get();


        $senderNothiListRegistration = NothiDetail::where('sender',Auth::guard('admin')->user()->id)
        ->whereNull('back_nothi')
        ->where('dakType','registration')
        ->latest()->get();


            return view('admin.sendNothi.index',compact('senderNothiList','senderNothiListRegistration'));

        } catch (\Exception $e) {
            return redirect('/admin')->with('error','some thing went wrong ,this is why you redirect to dashboard');
        }

    }
}
