<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NothiPrapok;
use App\Models\Admin;
use DB;
class NothiPrapokController extends Controller
{
    public function selfOfficerAdd(Request $request){


         $selfOfficerList = $request->selfOfficerList;
         $snothiId = $request->snothiId;
         $sstatus = $request->sstatus;


         $adminIdList = Admin::where('id',$selfOfficerList)->first();


         if(!$adminIdList){

              return $data =  0;

         }else{


            $designationName = DB::table('designation_lists')
                 ->where('id',$adminIdList->designation_list_id)
                 ->value('designation_name');

                 $branchName = DB::table('branches')
                 ->where('id',$adminIdList->branch_id)
                 ->value('branch_name');


                 $table->string('nothiId');
                 $table->string('nijOfficeId')->nullable();
                 $table->string('otherOfficerName')->nullable();
                 $table->string('otherOfficerDesignation')->nullable();
                 $table->string('otherOfficerBranch')->nullable();
                 $table->string('otherOfficerEmail')->nullable();
                 $table->string('otherOfficerPhone')->nullable();


                $nothiPrapok = new NothiPrapok();
                $nothiPrapok->nothiId = $snothiId;
                $nothiPrapok->nijOfficeId =  $sstatus;
                $nothiPrapok->otherOfficerName = $adminIdList->admin_name_ban;
                $nothiPrapok->otherOfficerDesignation = $designationName;
                $nothiPrapok->otherOfficerBranch =  $branchName;
                $nothiPrapok->otherOfficerEmail = $adminIdList->email;
                $nothiPrapok->otherOfficerPhone = $adminIdList->admin_mobile;
                $nothiPrapok->save();



                $nothiPrapokList = NothiPrapok::all();


                $data = view('admin.presentDocument.selfOfficerAdd',compact('nothiPrapokList'))->render();
                return response()->json($data);


         }

    }
}
