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
class DocumentPresentController extends Controller
{



    public function presentDocument($status, $id){

       $documentTypeList = DocumentType::latest()->get();
        return view('admin.presentDocument.index',compact('status','id','documentTypeList'));

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


         dd($request->all());


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
                $documentType->save();


            }






        }

        return 0;
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
