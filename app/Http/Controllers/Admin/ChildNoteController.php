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



class ChildNoteController extends Controller
{
    public function addChildNote($status,$parentId,$id,$activeCode){

//dd($status. $parentId. $id);

        if($status == 'registration'){



            $officeDetail = RegistrationOfficeSarok::where('parent_note_regid',$id)->get();
            $checkParent = ParentNoteForRegistration::where('registration_doc_id',$parentId)
                           ->get();



        }elseif($status == 'renew'){



            $officeDetail = RenewOfficeSarok::where('parent_note_for_renew_id',$id)->get();
            $checkParent = ParentNoteForRenew::where('renew_doc_present_id',$parentId)
            ->get();



        }elseif($status == 'nameChange'){



            $officeDetail = NameChangeOfficeSarok::where('parentnote_name_change_id',$id)->get();


            $checkParent = ParentNoteForNameChange::where('name_chane_doc_present_id',$parentId)
            ->get();



        }elseif($status == 'fdNine'){




            $officeDetail = FdNineOfficeSarok::where('p_note_for_fd_nine_id',$id)->get();

            $checkParent = ParentNoteForFdNine::where('fd_nine_doc_present_id',$parentId)
            ->get();

//dd($checkParent);


        }elseif($status == 'fdNineOne'){


            $officeDetail = FdNineOneOfficeSarok::where('p_note_for_fd_nine_one_id',$id)->get();


            $checkParent = ParentNoteForFdNineOne::where('fd_nine_one_doc_present_id',$parentId)
            ->get();




        }elseif($status == 'fdSix'){

          
            $officeDetail = FdSixOfficeSarok::where('parent_note_for_fdsix_id',$id)->get();

            $checkParent = ParentNoteForFdsix::where('fd_six_doc_present_id',$parentId)
            ->get();



        }elseif($status == 'fdSeven'){



            $officeDetail = FdSevenOfficeSarok::where('parent_note_for_fd_seven_id',$id)->get();

            $checkParent = ParentNoteForFdSeven::where('fd_seven_doc_present_id',$parentId)
            ->get();



        }elseif($status == 'fcOne'){


            $officeDetail = FcOneOfficeSarok::where('parent_note_for_fc_one_id',$id)->get();
            $checkParent = ParentNoteForFcOne::where('fc_one_doc_present_id',$parentId)
            ->get();




        }elseif($status == 'fcTwo'){


            $officeDetail = FcTwoOfficeSarok::where('parent_note_for_fc_two_id',$id)->get();

            $checkParent = ParentNoteForFcTwo::where('fc_two_doc_present_id',$parentId)
            ->get();





        }elseif($status == 'fdThree'){

            $officeDetail = FdThreeOfficeSarok::where('parent_note_for_fd_three_id',$id)->get();




            $checkParent = FdThreeOfficeSarok::where('fd_three_doc_present_id',$parentId)
            ->get();


        }



        return view('admin.presentDocument.addChildNote',compact('officeDetail','checkParent','status','id','parentId','activeCode'));
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