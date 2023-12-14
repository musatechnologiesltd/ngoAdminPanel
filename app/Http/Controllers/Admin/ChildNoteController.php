<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Image;
use Auth;
use Hash;
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
use App\Models\NothiList;
use App\Models\NothiPrapok;
use App\Models\NothiCopy;
use DB;
use DateTime;
use DateTimezone;

use App\Models\RegistrationOfficeSarok;
use App\Models\RenewOfficeSarok;
use App\Models\NameChangeOfficeSarok;
use App\Models\FdNineOfficeSarok;
use App\Models\FdNineOneOfficeSarok;
use App\Models\FdSixOfficeSarok;
use App\Models\FdSevenOfficeSarok;
use App\Models\FcOneOfficeSarok;
use App\Models\FcTwoOfficeSarok;
use App\Models\FdThreeOfficeSarok;
use App\Models\NothiAttarct;
use App\Models\NothiPermission;
use App\Models\Branch;
use App\Models\NothiDetail;
use App\Models\ArticleSign;

class ChildNoteController extends Controller
{
    public function addChildNote($status,$parentId,$nothiId,$id,$activeCode){

//dd($status. $parentId. $id);

        if($status == 'registration'){



            $officeDetail = RegistrationOfficeSarok::where('parent_note_regid',$id)->get();
            $checkParent = ParentNoteForRegistration::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)
                           ->get();



        }elseif($status == 'renew'){



            $officeDetail = RenewOfficeSarok::where('parent_note_for_renew_id',$id)->get();
            $checkParent = ParentNoteForRenew::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)
            ->get();



        }elseif($status == 'nameChange'){



            $officeDetail = NameChangeOfficeSarok::where('parentnote_name_change_id',$id)->get();


            $checkParent = ParentNoteForNameChange::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)
            ->get();



        }elseif($status == 'fdNine'){




            $officeDetail = FdNineOfficeSarok::where('p_note_for_fd_nine_id',$id)->get();

            $checkParent = ParentNoteForFdNine::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)
            ->get();

//dd($checkParent);


        }elseif($status == 'fdNineOne'){


            $officeDetail = FdNineOneOfficeSarok::where('p_note_for_fd_nine_one_id',$id)->get();


            $checkParent = ParentNoteForFdNineOne::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)
            ->get();




        }elseif($status == 'fdSix'){


            $officeDetail = FdSixOfficeSarok::where('parent_note_for_fdsix_id',$id)->get();

            $checkParent = ParentNoteForFdsix::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)
            ->get();



        }elseif($status == 'fdSeven'){



            $officeDetail = FdSevenOfficeSarok::where('parent_note_for_fd_seven_id',$id)->get();

            $checkParent = ParentNoteForFdSeven::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)
            ->get();



        }elseif($status == 'fcOne'){


            $officeDetail = FcOneOfficeSarok::where('parent_note_for_fc_one_id',$id)->get();
            $checkParent = ParentNoteForFcOne::where('nothi_detail_id',$parentId)
            ->get();




        }elseif($status == 'fcTwo'){


            $officeDetail = FcTwoOfficeSarok::where('parent_note_for_fc_two_id',$id)->get();

            $checkParent = ParentNoteForFcTwo::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)
            ->get();





        }elseif($status == 'fdThree'){

            $officeDetail = FdThreeOfficeSarok::where('parent_note_for_fd_three_id',$id)->get();




            $checkParent = ParentNoteForFdThree::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)
            ->get();


        }


        $nothiNumber = NothiList::where('id',$nothiId)->value('document_number');

        $user = Admin::where('id','!=',1)->get();


        $nothiPropokListUpdate = NothiPrapok::
        where('nothiId',$nothiId)
        ->where('noteId',$id)->where('status',1)->get();
        $nothiAttractListUpdate = NothiAttarct::where('nothiId',$nothiId)
        ->where('noteId',$id)->where('status',1)->get();
        $nothiCopyListUpdate = NothiCopy::where('nothiId',$nothiId)
        ->where('noteId',$id)->where('status',1)->get();



        $permissionNothiList = NothiPermission::where('nothId',$nothiId)->get();


        $convert_name_title = $permissionNothiList->implode("branchId", " ");
        $separated_data_title = explode(" ", $convert_name_title);



        $branchListForSerial = Branch::whereIn('id',$separated_data_title)
        ->orderBy('branch_step','asc')->get();




        return view('admin.presentDocument.addChildNote',compact('branchListForSerial','permissionNothiList','nothiCopyListUpdate','nothiAttractListUpdate','nothiPropokListUpdate','user','nothiId','nothiNumber','officeDetail','checkParent','status','id','parentId','activeCode'));
    }


    public function viewChildNote($status,$parentId,$nothiId,$id,$activeCode){

        //dd($status. $parentId. $id);

                if($status == 'registration'){



                    $officeDetail = RegistrationOfficeSarok::where('parent_note_regid',$id)->get();
                    $checkParent = ParentNoteForRegistration::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)
                                   ->get();



                }elseif($status == 'renew'){



                    $officeDetail = RenewOfficeSarok::where('parent_note_for_renew_id',$id)->get();
                    $checkParent = ParentNoteForRenew::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)
                    ->get();



                }elseif($status == 'nameChange'){



                    $officeDetail = NameChangeOfficeSarok::where('parentnote_name_change_id',$id)->get();


                    $checkParent = ParentNoteForNameChange::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)
                    ->get();



                }elseif($status == 'fdNine'){




                    $officeDetail = FdNineOfficeSarok::where('p_note_for_fd_nine_id',$id)->get();

                    $checkParent = ParentNoteForFdNine::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)
                    ->get();

        //dd($checkParent);


                }elseif($status == 'fdNineOne'){


                    $officeDetail = FdNineOneOfficeSarok::where('p_note_for_fd_nine_one_id',$id)->get();


                    $checkParent = ParentNoteForFdNineOne::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)
                    ->get();




                }elseif($status == 'fdSix'){


                    $officeDetail = FdSixOfficeSarok::where('parent_note_for_fdsix_id',$id)->get();

                    $checkParent = ParentNoteForFdsix::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)
                    ->get();



                }elseif($status == 'fdSeven'){



                    $officeDetail = FdSevenOfficeSarok::where('parent_note_for_fd_seven_id',$id)->get();

                    $checkParent = ParentNoteForFdSeven::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)
                    ->get();



                }elseif($status == 'fcOne'){


                    $officeDetail = FcOneOfficeSarok::where('parent_note_for_fc_one_id',$id)->get();
                    $checkParent = ParentNoteForFcOne::where('nothi_detail_id',$parentId)
                    ->get();




                }elseif($status == 'fcTwo'){


                    $officeDetail = FcTwoOfficeSarok::where('parent_note_for_fc_two_id',$id)->get();

                    $checkParent = ParentNoteForFcTwo::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)
                    ->get();





                }elseif($status == 'fdThree'){

                    $officeDetail = FdThreeOfficeSarok::where('parent_note_for_fd_three_id',$id)->get();




                    $checkParent = ParentNoteForFdThree::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)
                    ->get();


                }


                $nothiNumber = NothiList::where('id',$nothiId)->value('document_number');

                $user = Admin::where('id','!=',1)->get();


                $nothiPropokListUpdate = NothiPrapok::
                where('nothiId',$nothiId)
                ->where('noteId',$id)->where('status',1)->get();
                $nothiAttractListUpdate = NothiAttarct::where('nothiId',$nothiId)
                ->where('noteId',$id)->where('status',1)->get();
                $nothiCopyListUpdate = NothiCopy::where('nothiId',$nothiId)
                ->where('noteId',$id)->where('status',1)->get();



                $permissionNothiList = NothiPermission::where('nothId',$nothiId)->get();


                $convert_name_title = $permissionNothiList->implode("branchId", " ");
                $separated_data_title = explode(" ", $convert_name_title);



                $branchListForSerial = Branch::whereIn('id',$separated_data_title)
                ->orderBy('branch_step','asc')->get();




                return view('admin.presentDocument.viewChildNote',compact('branchListForSerial','permissionNothiList','nothiCopyListUpdate','nothiAttractListUpdate','nothiPropokListUpdate','user','nothiId','nothiNumber','officeDetail','checkParent','status','id','parentId','activeCode'));
            }


    public function saveNothiPermission(Request $request){




        //dd($request->all());


        if($request->button_value == 'return'){


            $mainId = DB::table('nothi_details')
            ->where('noteId',$request->noteId)
            ->where('nothId',$request->nothiId)
            ->where('dakId',$request->dakId)
            ->where('dakType',$request->status)
            ->where('sender',Auth::guard('admin')->user()->id)
            ->value('id');


            $deleteData = NothiDetail::where('id',$mainId)->delete();


            $deleteDataOne = ArticleSign::where('dakDetailId',$mainId)
            ->where('childId',$request->child_note_id)->delete();

            return redirect()->back()->with('error','সফলভাবে ফেরত আনা হয়েছে');

        }else{



        //ArticleSign
        $mainSaveData = new NothiDetail();
        $mainSaveData ->noteId = $request->noteId;
        $mainSaveData ->nothId = $request->nothiId;
        $mainSaveData ->dakId = $request->dakId;
        $mainSaveData ->dakType = $request->status;
        $mainSaveData ->sender = Auth::guard('admin')->user()->id;
        $mainSaveData ->receiver = $request->nothiPermissionId;
        $mainSaveData->save();

        $mainId = $mainSaveData->id;

        $mainSaveData = new ArticleSign();
        $mainSaveData ->dakDetailId = $mainId;
        $mainSaveData ->childId = $request->child_note_id;
        $mainSaveData ->sender = Auth::guard('admin')->user()->id;
        $mainSaveData ->permissionId = $request->nothiPermissionId;
        $mainSaveData->save();

        return redirect()->back()->with('success','সফলভাবে পাঠানো হয়েছে');

    }

        return redirect()->back()->with('success','সফলভাবে পাঠানো হয়েছে');
    }


    public function saveNothiPermissionReturn(Request $request){



//dd(Auth::guard('admin')->user()->id);


                     $secondLastValue = ArticleSign::orderBy('id','desc')
                    ->value('back_status');

                    // dd($secondLastValue);


                     if(empty($secondLastValue)){

                        $secondLastValueLast = 1;



                        $senderId = DB::table('nothi_details')
                            ->where('noteId',$request->noteId)
                            ->where('nothId',$request->nothiId)
                            ->where('dakId',$request->dakId)
                            ->where('dakType',$request->status)
                            ->where('receiver',Auth::guard('admin')->user()->id)
                            ->value('sender');


                            //dd($senderId);


                            $mainId = DB::table('nothi_details')
                            ->where('noteId',$request->noteId)
                            ->where('nothId',$request->nothiId)
                            ->where('dakId',$request->dakId)
                            ->where('dakType',$request->status)
                            ->where('receiver',Auth::guard('admin')->user()->id)
                            ->value('id');


                            //dd($senderId.' '.Auth::guard('admin')->user()->id);


                     }else{

                        $secondLastValueLast = "";


                        $senderId = DB::table('nothi_details')
                        ->where('noteId',$request->noteId)
                        ->where('nothId',$request->nothiId)
                        ->where('dakId',$request->dakId)
                        ->where('dakType',$request->status)
                        ->where('receiver',Auth::guard('admin')->user()->id)
                        ->value('sender');


                        //dd($senderId);


                        $mainId = DB::table('nothi_details')
                        ->where('noteId',$request->noteId)
                        ->where('nothId',$request->nothiId)
                        ->where('dakId',$request->dakId)
                        ->where('dakType',$request->status)
                        ->where('receiver',Auth::guard('admin')->user()->id)
                        ->value('id');


                        //dd($senderId.' '.Auth::guard('admin')->user()->id);
                     }


                     //dd($secondLastValueLast);

                            //dd($senderId);
                            DB::table('nothi_details')
                            ->where('noteId',$request->noteId)
                            ->where('nothId',$request->nothiId)
                            ->where('dakId',$request->dakId)
                            ->where('dakType',$request->status)
                            ->update([
                                'sender' => Auth::guard('admin')->user()->id,
                                'receiver' =>$senderId,
                                'back_status' =>$secondLastValueLast
                             ]);


        // $mainSaveData = new NothiDetail();
        // $mainSaveData ->noteId = $request->noteId;
        // $mainSaveData ->nothId = $request->nothiId;
        // $mainSaveData ->dakId = $request->dakId;
        // $mainSaveData ->dakType = $request->status;
        // $mainSaveData ->sender = Auth::guard('admin')->user()->id;
        // $mainSaveData ->receiver = $senderId;
        // $mainSaveData ->back_status =1;
        // $mainSaveData->save();

        // $mainId = $mainSaveData->id;



        $mainSaveData = new ArticleSign();
        $mainSaveData ->dakDetailId = $mainId;
        $mainSaveData ->childId = $request->child_note_id;
        $mainSaveData ->sender = Auth::guard('admin')->user()->id;
        $mainSaveData ->permissionId = $senderId;
        $mainSaveData ->back_status = $secondLastValueLast;
        $mainSaveData->save();

    return redirect()->back()->with('success','সফলভাবে পাঠানো হয়েছে');
    }




    public function store(Request $request){

        //dd($request->all());

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));
        $created_at = $dt->format('Y-m-d h:i:s ');


        if($request->status == 'registration'){


            $saveNewData = new ChildNoteForRegistration();
            $saveNewData->parent_note_regid = $request->parentNoteId;
            $saveNewData->serial_number = 0;
            $saveNewData->description = $request->mainPartNote;
            $saveNewData->created_at =$created_at;
            $saveNewData->save();


     }elseif($request->status == 'renew'){


         $saveNewData = new ChildNoteForRenew();
         $saveNewData->parent_note_for_renew_id = $request->parentNoteId;
         $saveNewData->serial_number = 0;
         $saveNewData->description = $request->mainPartNote;
         $saveNewData->created_at =$created_at;
         $saveNewData->save();



     }elseif($request->status == 'nameChange'){

         $saveNewData = new ChildNoteForNameChange();
         $saveNewData->parentnote_name_change_id = $request->parentNoteId;
         $saveNewData->serial_number = 0;
         $saveNewData->description = $request->mainPartNote;
         $saveNewData->created_at =$created_at;
         $saveNewData->save();



     }elseif($request->status == 'fdNine'){

         $saveNewData = new ChildNoteForFdNine();
         $saveNewData->p_note_for_fd_nine_id = $request->parentNoteId;
         $saveNewData->serial_number = 0;
         $saveNewData->description = $request->mainPartNote;
         $saveNewData->created_at =$created_at;
         $saveNewData->save();


     }elseif($request->status == 'fdNineOne'){

         $saveNewData = new ChildNoteForFdNineOne();
         $saveNewData->p_note_for_fd_nine_one_id = $request->parentNoteId;
         $saveNewData->serial_number = 0;
         $saveNewData->description = $request->mainPartNote;
         $saveNewData->created_at =$created_at;
         $saveNewData->save();

     }elseif($request->status == 'fdSix'){

         $saveNewData = new ChildNoteForFdSix();
         $saveNewData->parent_note_for_fdsix_id = $request->parentNoteId;
         $saveNewData->serial_number = 0;
         $saveNewData->description = $request->mainPartNote;
         $saveNewData->created_at =$created_at;
         $saveNewData->save();

     }elseif($request->status == 'fdSeven'){

  $saveNewData = new ChildNoteForFdSeven();
  $saveNewData->parent_note_for_fd_seven_id = $request->parentNoteId;
  $saveNewData->serial_number = 0;
  $saveNewData->description = $request->mainPartNote;
  $saveNewData->created_at =$created_at;
  $saveNewData->save();


     }elseif($request->status == 'fcOne'){

         $saveNewData = new ChildNoteForFcOne();
         $saveNewData->parent_note_for_fc_one_id = $request->parentNoteId;
         $saveNewData->serial_number = 0;
         $saveNewData->description = $request->mainPartNote;
         $saveNewData->created_at =$created_at;
         $saveNewData->save();

     }elseif($request->status == 'fcTwo'){


         $saveNewData = new ChildNoteForFcTwo();
         $saveNewData->parent_note_for_fc_two_id = $request->parentNoteId;
         $saveNewData->serial_number = 0;
         $saveNewData->description = $request->mainPartNote;
         $saveNewData->created_at =$created_at;
         $saveNewData->save();


     }elseif($request->status == 'fdThree'){

         $saveNewData = new ChildNoteForFdThree();
         $saveNewData->parent_note_for_fd_three_id = $request->parentNoteId;
         $saveNewData->serial_number = 0;
         $saveNewData->description = $request->mainPartNote;
         $saveNewData->created_at =$created_at;
         $saveNewData->save();


     }


     return redirect()->back()->with('success','সফলভাবে সংরক্ষণ করা হয়েছে');
    }


    public function update(Request $request,$id){





        if($request->status == 'registration'){


            $saveNewData = ChildNoteForRegistration::find($id);

            $saveNewData->description = $request->mainPartNote;
            $saveNewData->save();


     }elseif($request->status == 'renew'){


         $saveNewData = ChildNoteForRenew::find($id);

         $saveNewData->description = $request->mainPartNote;
         $saveNewData->save();



     }elseif($request->status == 'nameChange'){

         $saveNewData = ChildNoteForNameChange::find($id);

         $saveNewData->description = $request->mainPartNote;
         $saveNewData->save();



     }elseif($request->status == 'fdNine'){

         $saveNewData = ChildNoteForFdNine::find($id);

         $saveNewData->description = $request->mainPartNote;
         $saveNewData->save();
     }elseif($request->status == 'fdNineOne'){

         $saveNewData = ChildNoteForFdNineOne::find($id);

         $saveNewData->description = $request->mainPartNote;
         $saveNewData->save();

     }elseif($request->status == 'fdSix'){

         $saveNewData = ChildNoteForFdSix::find($id);

         $saveNewData->description = $request->mainPartNote;
         $saveNewData->save();

     }elseif($request->status == 'fdSeven'){

  $saveNewData = ChildNoteForFdSeven::find($id);

  $saveNewData->description = $request->mainPartNote;
            $saveNewData->save();
     }elseif($request->status == 'fcOne'){

         $saveNewData = ChildNoteForFcOne::find($id);

         $saveNewData->description = $request->mainPartNote;
         $saveNewData->save();

     }elseif($request->status == 'fcTwo'){


         $saveNewData = ChildNoteForFcTwo::find($id);

         $saveNewData->description = $request->mainPartNote;
         $saveNewData->save();


     }elseif($request->status == 'fdThree'){

         $saveNewData = ChildNoteForFdThree::find($id);

         $saveNewData->description = $request->mainPartNote;
         $saveNewData->save();


     }


     return redirect()->back()->with('success','সফলভাবে সংশোধন করা হয়েছে');



    }
}
