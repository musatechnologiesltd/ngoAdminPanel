<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NothiCopy;
use App\Models\NothiApprover;
use App\Models\Admin;
use DB;
class NothiApproverController extends Controller
{
    public function store(Request $request){
        try{
            DB::beginTransaction();

        $nothiApproverList = NothiApprover::orderBy('id','desc')->value('id');



        if(empty($nothiApproverList)){


        }else{
        $deleteData = NothiApprover::where('id','<=',$nothiApproverList)->delete();
        }

        $dataInsert = new NothiApprover();
        $dataInsert->nothiId = $request->fnothiId;
        $dataInsert->noteId = $request->fnoteId;
        $dataInsert->adminId = $request->fadmin;
        $dataInsert->bangla_date =bangla_date(time());
        $dataInsert->status = $request->fstatus;
        $dataInsert->save();


        return redirect()->back()->with('success','সফলভাবে সংরক্ষণ হয়েছে');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error','some thing went wrong ');
    }

    }
}
