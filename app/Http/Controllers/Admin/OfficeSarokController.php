<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Auth;
use Hash;
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



class OfficeSarokController extends Controller
{
    public function store(Request $request){




        //dd($request->all());


        if($request->updateOrSubmit == 1){


            if($request->statusForPotrangso == 'registration'){


                $saveNewData = RegistrationOfficeSarok::find($request->sorkariUpdateId);

                $saveNewData->office_subject = $request->subject;
                $saveNewData->office_sutro = $request->sutro;
                $saveNewData->description =$request->maindes;

                $saveNewData->save();


         }elseif($request->statusForPotrangso == 'renew'){


             $saveNewData = RenewOfficeSarok::find($request->sorkariUpdateId);

             $saveNewData->office_subject = $request->subject;
             $saveNewData->office_sutro = $request->sutro;
             $saveNewData->description =$request->maindes;

             $saveNewData->save();



         }elseif($request->statusForPotrangso == 'nameChange'){

             $saveNewData = NameChangeOfficeSarok::find($request->sorkariUpdateId);

             $saveNewData->office_subject = $request->subject;
             $saveNewData->office_sutro = $request->sutro;
             $saveNewData->description =$request->maindes;

             $saveNewData->save();



         }elseif($request->statusForPotrangso == 'fdNine'){

             $saveNewData = FdNineOfficeSarok::find($request->sorkariUpdateId);

             $saveNewData->office_subject = $request->subject;
             $saveNewData->office_sutro = $request->sutro;
             $saveNewData->description =$request->maindes;

             $saveNewData->save();


         }elseif($request->statusForPotrangso == 'fdNineOne'){

             $saveNewData = FdNineOneOfficeSarok::find($request->sorkariUpdateId);

             $saveNewData->office_subject = $request->subject;
             $saveNewData->office_sutro = $request->sutro;
             $saveNewData->description =$request->maindes;

             $saveNewData->save();

         }elseif($request->statusForPotrangso == 'fdSix'){

            //dd($request->sorkariUpdateId);

             $saveNewData = FdSixOfficeSarok::find($request->sorkariUpdateId);

             $saveNewData->office_subject = $request->subject;
             $saveNewData->office_sutro = $request->sutro;
             $saveNewData->description =$request->maindes;

             $saveNewData->save();

         }elseif($request->statusForPotrangso == 'fdSeven'){

                $saveNewData = FdSevenOfficeSarok::find($request->sorkariUpdateId);

                $saveNewData->office_subject = $request->subject;
                $saveNewData->office_sutro = $request->sutro;
                $saveNewData->description =$request->maindes;

                $saveNewData->save();


         }elseif($request->statusForPotrangso == 'fcOne'){

             $saveNewData = FcOneOfficeSarok::find($request->sorkariUpdateId);

             $saveNewData->office_subject = $request->subject;
             $saveNewData->office_sutro = $request->sutro;
             $saveNewData->description =$request->maindes;

             $saveNewData->save();

         }elseif($request->statusForPotrangso == 'fcTwo'){


             $saveNewData = FcTwoOfficeSarok::find($request->sorkariUpdateId);

                $saveNewData->office_subject = $request->subject;
                $saveNewData->office_sutro = $request->sutro;
                $saveNewData->description =$request->maindes;

             $saveNewData->save();


         }elseif($request->statusForPotrangso == 'fdThree'){

             $saveNewData = FdThreeOfficeSarok::find($request->sorkariUpdateId);

             $saveNewData->office_subject = $request->subject;
             $saveNewData->office_sutro = $request->sutro;
             $saveNewData->description =$request->maindes;

             $saveNewData->save();


         }


        }else{



        //dd($request->all());

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));
        $created_at = $dt->format('Y-m-d h:i:s');


        if($request->statusForPotrangso == 'registration'){


            $saveNewData = new RegistrationOfficeSarok();
            $saveNewData->parent_note_regid = $request->parentIdForPotrangso;
            $saveNewData->office_subject = $request->subject;
            $saveNewData->office_sutro = $request->sutro;
            $saveNewData->description =$request->maindes;
            $saveNewData->created_at =$created_at;
            $saveNewData->save();


     }elseif($request->statusForPotrangso == 'renew'){


         $saveNewData = new RenewOfficeSarok();
         $saveNewData->parent_note_for_renew_id = $request->parentIdForPotrangso;
         $saveNewData->office_subject = $request->subject;
         $saveNewData->office_sutro = $request->sutro;
         $saveNewData->description =$request->maindes;
         $saveNewData->created_at =$created_at;
         $saveNewData->save();



     }elseif($request->statusForPotrangso == 'nameChange'){

         $saveNewData = new NameChangeOfficeSarok();
         $saveNewData->parentnote_name_change_id = $request->parentIdForPotrangso;
         $saveNewData->office_subject = $request->subject;
         $saveNewData->office_sutro = $request->sutro;
         $saveNewData->description =$request->maindes;
         $saveNewData->created_at =$created_at;
         $saveNewData->save();



     }elseif($request->statusForPotrangso == 'fdNine'){

         $saveNewData = new FdNineOfficeSarok();
         $saveNewData->p_note_for_fd_nine_id = $request->parentIdForPotrangso;
         $saveNewData->office_subject = $request->subject;
         $saveNewData->office_sutro = $request->sutro;
         $saveNewData->description =$request->maindes;
         $saveNewData->created_at =$created_at;
         $saveNewData->save();


     }elseif($request->statusForPotrangso == 'fdNineOne'){

         $saveNewData = new FdNineOneOfficeSarok();
         $saveNewData->p_note_for_fd_nine_one_id = $request->parentIdForPotrangso;
         $saveNewData->office_subject = $request->subject;
         $saveNewData->office_sutro = $request->sutro;
         $saveNewData->description =$request->maindes;
         $saveNewData->created_at =$created_at;
         $saveNewData->save();

     }elseif($request->statusForPotrangso == 'fdSix'){

         $saveNewData = new FdSixOfficeSarok();
         $saveNewData->parent_note_for_fdsix_id = $request->parentIdForPotrangso;
         $saveNewData->office_subject = $request->subject;
         $saveNewData->office_sutro = $request->sutro;
         $saveNewData->description =$request->maindes;
         $saveNewData->created_at =$created_at;
         $saveNewData->save();

     }elseif($request->statusForPotrangso == 'fdSeven'){

            $saveNewData = new FdSevenOfficeSarok();
            $saveNewData->parent_note_for_fd_seven_id = $request->parentIdForPotrangso;
            $saveNewData->office_subject = $request->subject;
            $saveNewData->office_sutro = $request->sutro;
            $saveNewData->description =$request->maindes;
            $saveNewData->created_at =$created_at;
            $saveNewData->save();


     }elseif($request->statusForPotrangso == 'fcOne'){

         $saveNewData = new FcOneOfficeSarok();
         $saveNewData->parent_note_for_fc_one_id = $request->parentIdForPotrangso;
         $saveNewData->office_subject = $request->subject;
         $saveNewData->office_sutro = $request->sutro;
         $saveNewData->description =$request->maindes;
         $saveNewData->created_at =$created_at;
         $saveNewData->save();

     }elseif($request->statusForPotrangso == 'fcTwo'){


         $saveNewData = new FcTwoOfficeSarok();
         $saveNewData->parent_note_for_fc_two_id = $request->parentIdForPotrangso;
            $saveNewData->office_subject = $request->subject;
            $saveNewData->office_sutro = $request->sutro;
            $saveNewData->description =$request->maindes;
            $saveNewData->created_at =$created_at;
         $saveNewData->save();


     }elseif($request->statusForPotrangso == 'fdThree'){

         $saveNewData = new FdThreeOfficeSarok();
         $saveNewData->parent_note_for_fd_three_id = $request->parentIdForPotrangso;
         $saveNewData->office_subject = $request->subject;
         $saveNewData->office_sutro = $request->sutro;
         $saveNewData->description =$request->maindes;
         $saveNewData->created_at =$created_at;
         $saveNewData->save();


     }
    }

    if($request->updateOrSubmit == 1){
        return redirect()->back()->with('success','সফলভাবে সংশোধন করা হয়েছে');
    }else{
    return redirect()->back()->with('success','সফলভাবে সংরক্ষণ করা হয়েছে');
    }
    }
}
