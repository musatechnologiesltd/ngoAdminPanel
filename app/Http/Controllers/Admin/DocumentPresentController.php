<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Image;
use Auth;
use Hash;
use App\Models\DocumentType;
use App\Models\RegistrationDocPresent;
use App\Models\RenewDocPresent;
use App\Models\FdNineDocPresent;
use App\Models\NameChaneDocPresent;
use App\Models\FdNineOneDocPresent;
use App\Models\FdSixDocPresent;
use App\Models\FdSevenDocPresent;
use App\Models\FdThreeDocPresent;
use App\Models\FcOneDocPresent;
use App\Models\FcTwoDocPresent;


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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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


        if($request->buttonValue == 'নথি অনুমতি'){



        }else{


            if($request->status == 'registration'){


                $documentType = new RegistrationDocPresent();
                $documentType->ngo_registration_dak_id =$request->id;
                $documentType->document_branch =$request->document_branch;
                $documentType->document_type_id =$request->document_type_id;
                $documentType->document_number =$request->document_number;
                $documentType->document_year =$request->document_year;
                $documentType->document_class =$request->document_class;
                $documentType->document_subject =$request->document_subject;
                $documentType->sender =0;
                $documentType->receiver =0;
                $documentType->save();


            }elseif($request->status == 'renew'){


                $documentType = new RenewDocPresent();
                $documentType->ngo_renew_dak_id =$request->id;
                $documentType->document_branch =$request->document_branch;
                $documentType->document_type_id =$request->document_type_id;
                $documentType->document_number =$request->document_number;
                $documentType->document_year =$request->document_year;
                $documentType->document_class =$request->document_class;
                $documentType->document_subject =$request->document_subject;
                $documentType->sender =0;
                $documentType->receiver =0;
                $documentType->save();


            }elseif($request->status == 'nameChange'){



                $documentType = new NameChaneDocPresent();
                $documentType->ngo_name_change_dak_id  =$request->id;
                $documentType->document_branch =$request->document_branch;
                $documentType->document_type_id =$request->document_type_id;
                $documentType->document_number =$request->document_number;
                $documentType->document_year =$request->document_year;
                $documentType->document_class =$request->document_class;
                $documentType->document_subject =$request->document_subject;
                $documentType->sender =0;
                $documentType->receiver =0;
                $documentType->save();


            }elseif($request->status == 'fdNine'){




                $documentType = new FdNineDocPresent();
                $documentType->ngo_f_d_nine_dak_id  =$request->id;
                $documentType->document_branch =$request->document_branch;
                $documentType->document_type_id =$request->document_type_id;
                $documentType->document_number =$request->document_number;
                $documentType->document_year =$request->document_year;
                $documentType->document_class =$request->document_class;
                $documentType->document_subject =$request->document_subject;
                $documentType->sender =0;
                $documentType->receiver =0;
                $documentType->save();


            }elseif($request->status == 'fdNineOne'){



                $documentType = new FdNineOneDocPresent();
                $documentType->ngo_f_d_nine_one_dak_id  =$request->id;
                $documentType->document_branch =$request->document_branch;
                $documentType->document_type_id =$request->document_type_id;
                $documentType->document_number =$request->document_number;
                $documentType->document_year =$request->document_year;
                $documentType->document_class =$request->document_class;
                $documentType->document_subject =$request->document_subject;
                $documentType->sender =0;
                $documentType->receiver =0;
                $documentType->save();


            }elseif($request->status == 'fdSix'){


                $documentType = new FdSixDocPresent();
                $documentType->ngo_fd_six_dak_id  =$request->id;
                $documentType->document_branch =$request->document_branch;
                $documentType->document_type_id =$request->document_type_id;
                $documentType->document_number =$request->document_number;
                $documentType->document_year =$request->document_year;
                $documentType->document_class =$request->document_class;
                $documentType->document_subject =$request->document_subject;
                $documentType->sender =0;
                $documentType->receiver =0;
                $documentType->save();


            }elseif($request->status == 'fdSeven'){


                $documentType = new FdSevenDocPresent();
                $documentType->ngo_fd_seven_dak_id  =$request->id;
                $documentType->document_branch =$request->document_branch;
                $documentType->document_type_id =$request->document_type_id;
                $documentType->document_number =$request->document_number;
                $documentType->document_year =$request->document_year;
                $documentType->document_class =$request->document_class;
                $documentType->document_subject =$request->document_subject;
                $documentType->sender =0;
                $documentType->receiver =0;
                $documentType->save();


            }elseif($request->status == 'fcOne'){



                $documentType = new FcOneDocPresent();
                $documentType->fc_one_dak_id  =$request->id;
                $documentType->document_branch =$request->document_branch;
                $documentType->document_type_id =$request->document_type_id;
                $documentType->document_number =$request->document_number;
                $documentType->document_year =$request->document_year;
                $documentType->document_class =$request->document_class;
                $documentType->document_subject =$request->document_subject;
                $documentType->sender =0;
                $documentType->receiver =0;
                $documentType->save();


            }elseif($request->status == 'fcTwo'){



                $documentType = new FcTwoDocPresent();
                $documentType->fc_two_dak_id  =$request->id;
                $documentType->document_branch =$request->document_branch;
                $documentType->document_type_id =$request->document_type_id;
                $documentType->document_number =$request->document_number;
                $documentType->document_year =$request->document_year;
                $documentType->document_class =$request->document_class;
                $documentType->document_subject =$request->document_subject;
                $documentType->sender =0;
                $documentType->receiver =0;
                $documentType->save();


            }elseif($request->status == 'fdThree'){



                $documentType = new FdThreeDocPresent();
                $documentType->fd_three_dak_id  =$request->id;
                $documentType->document_branch =$request->document_branch;
                $documentType->document_type_id =$request->document_type_id;
                $documentType->document_number =$request->document_number;
                $documentType->document_year =$request->document_year;
                $documentType->document_class =$request->document_class;
                $documentType->document_subject =$request->document_subject;
                $documentType->sender =0;
                $documentType->receiver =0;
                $documentType->save();


            }






        }

        return redirect()->route('sheetAndNotes', ['status' => $request->status,'nothiId'=>$request->id, 'id' =>$documentType->id]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
