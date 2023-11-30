<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Image;
use Auth;
use Hash;
use Illuminate\Support\Str;
use Mail;
use DB;
use PDF;
use Carbon\Carbon;
use Response;
use App\Models\Branch;
use App\Models\ForwardingLetterOnulipi;
use App\Models\NothiPermission;
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
use App\Models\DocumentType;
use App\Models\NothiList;


use App\Models\ChildNoteForFcOne;
use App\Models\ChildNoteForFcTwo;
use App\Models\ChildNoteForFdNine;
use App\Models\ChildNoteForFdNineOne;
use App\Models\ChildNoteForFdSeven;
use App\Models\ChildNoteForFdSix;
use App\Models\ChildNoteForFdThree;
use App\Models\ChildNoteForNameChange;
use App\Models\ChildNoteForRegistration;
use App\Models\ChildNoteForRenew;

use App\Models\ParentNoteForFcOne;
use App\Models\ParentNoteForFcTwo;
use App\Models\ParentNoteForFdNine;
use App\Models\ParentNoteForFdNineOne;
use App\Models\ParentNoteForFdSeven;
use App\Models\ParentNoteForFdsix;
use App\Models\ParentNoteForFdThree;
use App\Models\ParentNoteForNameChange;
use App\Models\ParentNoteForRegistration;
use App\Models\ParentNoteForRenew;




class DocumentPresentController extends Controller
{


    public function create(){

        $documentTypeList = DocumentType::latest()->get();
         return view('admin.presentDocument.create',compact('documentTypeList'));

     }



    public function presentDocument($status, $id){

       $documentTypeList = DocumentType::latest()->get();
        return view('admin.presentDocument.index',compact('status','id','documentTypeList'));

    }


    public function sheetAndNotes($status,$nothiId,$id){


        if($status == 'registration'){


            $checkParent = ParentNoteForRegistration::where('registration_doc_id',$id)
                           ->get();



        }elseif($status == 'renew'){




            $checkParent = ParentNoteForRenew::where('renew_doc_present_id',$id)
            ->get();



        }elseif($status == 'nameChange'){






            $checkParent = ParentNoteForNameChange::where('name_chane_doc_present_id',$id)
            ->get();



        }elseif($status == 'fdNine'){






            $checkParent = ParentNoteForFdNine::where('fd_nine_doc_present_id',$id)
            ->get();

//dd($checkParent);


        }elseif($status == 'fdNineOne'){





            $checkParent = ParentNoteForFdNineOne::where('fd_nine_one_doc_present_id',$id)
            ->get();




        }elseif($status == 'fdSix'){




            $checkParent = ParentNoteForFdsix::where('fd_six_doc_present_id',$id)
            ->get();



        }elseif($status == 'fdSeven'){





            $checkParent = ParentNoteForFdSeven::where('fd_seven_doc_present_id',$id)
            ->get();



        }elseif($status == 'fcOne'){



            $checkParent = ParentNoteForFcOne::where('fc_one_doc_present_id',$id)
            ->get();




        }elseif($status == 'fcTwo'){




            $checkParent = ParentNoteForFcTwo::where('fc_two_doc_present_id',$id)
            ->get();





        }elseif($status == 'fdThree'){






            $checkParent = ParentNoteForFdThree::where('fd_three_doc_present_id',$id)
            ->get();


        }

        return view('admin.presentDocument.sheetAndNotes',compact('checkParent','nothiId','status','id'));
    }


    public function docTypeCode(Request $request){

        $documentTypeList = DocumentType::where('id',$request->docId)->value('code_type');

        return $documentTypeList;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nothiList = NothiList::latest()->get();
        return view('admin.presentDocument.index',compact('nothiList'));
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {




        $this->validate($request,[
            'document_branch' => 'required',
            'document_type_id' => 'required',
            'document_number' => 'required',
            'document_year' => 'required',
            'document_class' => 'required',
            'document_subject' => 'required'
        ]);


                $documentType = new NothiList();
                $documentType->document_branch =$request->document_branch;
                $documentType->document_type_id =$request->document_type_id;
                $documentType->document_number =$request->document_number;
                $documentType->document_year =$request->document_year;
                $documentType->document_class =$request->document_class;
                $documentType->document_subject =$request->document_subject;
                $documentType->save();


                $mainId = $documentType->id;


        if($request->buttonValue == 'নথি অনুমতি'){


            return redirect()->route('givePermissionToNothi',$mainId)->with('success','সফলভাবে সংরক্ষণ করা হয়েছে');

        }else{

        return redirect()->route('documentPresent.index')->with('success','সফলভাবে সংরক্ষণ করা হয়েছে');
    }
}



public function givePermissionToNothi($id){

    \LogActivity::addToLog('nothi permission.');

    $id = $id;

     $totalBranch = Branch::where('id','!=',1)->count();
     $totalDesignation = DesignationList::where('id','!=',1)->count();
     $totaluser = Admin::where('id','!=',1)->count();


      $totalDesignationWorking = AdminDesignationHistory::count();

     $totalDesignationId = AdminDesignationHistory::select('designation_list_id')->get();


     $convert_name_title = $totalDesignationId->implode("designation_list_id", " ");
     $separated_data_title = explode(" ", $convert_name_title);


   $totalEmptyDesignation = DesignationList::where('id','!=',1)->whereNotIn('id', $separated_data_title )->count();

     //dd($totalEmptyDesignation);

     $totalBranchList = Branch::where('id','!=',1)->get();

     return view('admin.presentDocument.givePermissionToNothi',compact('id','totalBranchList','totalEmptyDesignation','totalBranch','totalDesignation','totaluser','totalDesignationWorking'));

}



public function savePermissionNothi(Request $request){


    \LogActivity::addToLog('add dak detail.');

         $number=count($request->admin_id);



            if($number >0){
                for($i=0;$i<$number;$i++){




                 $regDakData = new NothiPermission();
                 $regDakData->adminId = $request->admin_id[$i];
                 $regDakData->nothId =$request->main_id;

                 $regDakData->save();

                }


            }
            return redirect()->route('documentPresent.index')->with('success','সফলভাবে সংরক্ষণ করা হয়েছে');

}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $documentTypeList = DocumentType::latest()->get();
        $nothiList = NothiList::find($id);
        return view('admin.presentDocument.edit',compact('nothiList','documentTypeList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                $documentType = NothiList::find($id);
                $documentType->document_branch =$request->document_branch;
                $documentType->document_type_id =$request->document_type_id;
                $documentType->document_number =$request->document_number;
                $documentType->document_year =$request->document_year;
                $documentType->document_class =$request->document_class;
                $documentType->document_subject =$request->document_subject;
                $documentType->save();


                return redirect()->route('documentPresent.index')->with('success','সফলভাবে সংশোধন করা হয়েছে');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admins = NothiList::where('id',$id)->delete();



        return back()->with('error','সফলভাবে মুছে ফেলা হয়েছে!');
    }
}
