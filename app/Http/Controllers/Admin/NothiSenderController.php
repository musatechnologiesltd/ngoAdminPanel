<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NothiSender;
use App\Models\Admin;
use DB;
class NothiSenderController extends Controller
{
    public function store(Request $request){

        $nothiApproverList = NothiSender::orderBy('id','desc')->value('id');

        if(empty($nothiApproverList)){

        }else{

          $deleteData = NothiSender::where('id','<=',$nothiApproverList)->delete();

        }
        
        $dataInsert = new NothiSender();
        $dataInsert->nothiId = $request->fnothiId;
        $dataInsert->noteId = $request->fnoteId;
        $dataInsert->adminId = $request->fadmin;
        $dataInsert->status = $request->fstatus;
        $dataInsert->save();


        return redirect()->back()->with('success','সফলভাবে সংরক্ষণ হয়েছে');


    }
}
