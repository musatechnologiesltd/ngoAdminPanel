<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
use DateTime;
use DateTimezone;

class ParentNoteController extends Controller
{
    public function store(Request $request){

       //dd($request->all());


       $dt = new DateTime();
       $dt->setTimezone(new DateTimezone('Asia/Dhaka'));
       $created_at = $dt->format('Y-m-d h:i:s');


       if($request->status == 'registration'){


           $saveNewData = new ParentNoteForRegistration();
           $saveNewData->registration_doc_id = $request->doc_id;
           $saveNewData->serial_number = 0;
           $saveNewData->subject = $request->subject;
           $saveNewData->name ='নোট';
           $saveNewData->created_at =$created_at;
           $saveNewData->save();


    }elseif($request->status == 'renew'){


        $saveNewData = new ParentNoteForRenew();
        $saveNewData->renew_doc_present_id  = $request->doc_id;
        $saveNewData->serial_number = 0;
        $saveNewData->subject = $request->subject;
        $saveNewData->name ='নোট';
        $saveNewData->created_at =$created_at;
        $saveNewData->save();



    }elseif($request->status == 'nameChange'){

        $saveNewData = new ParentNoteForNameChange();
        $saveNewData->name_chane_doc_present_id = $request->doc_id;
        $saveNewData->serial_number = 0;
        $saveNewData->subject = $request->subject;
        $saveNewData->name ='নোট';
        $saveNewData->created_at =$created_at;
        $saveNewData->save();



    }elseif($request->status == 'fdNine'){

        $saveNewData = new ParentNoteForFdNine();
        $saveNewData->fd_nine_doc_present_id = $request->doc_id;
        $saveNewData->serial_number = 0;
        $saveNewData->subject = $request->subject;
        $saveNewData->name ='নোট';
        $saveNewData->created_at =$created_at;
        $saveNewData->save();


    }elseif($request->status == 'fdNineOne'){

        $saveNewData = new ParentNoteForFdNineOne();
        $saveNewData->fd_nine_one_doc_present_id = $request->doc_id;
        $saveNewData->serial_number = 0;
        $saveNewData->subject = $request->subject;
        $saveNewData->name ='নোট';
        $saveNewData->created_at =$created_at;
        $saveNewData->save();

    }elseif($request->status == 'fdSix'){

        $saveNewData = new ParentNoteForFdsix();
        $saveNewData->fd_six_doc_present_id = $request->doc_id;
        $saveNewData->serial_number = 0;
        $saveNewData->subject = $request->subject;
        $saveNewData->name ='নোট';
        $saveNewData->created_at =$created_at;
        $saveNewData->save();

    }elseif($request->status == 'fdSeven'){

           $saveNewData = new ParentNoteForFdSeven();
           $saveNewData->fd_seven_doc_present_id = $request->doc_id;
           $saveNewData->serial_number = 0;
           $saveNewData->subject = $request->subject;
           $saveNewData->name ='নোট';
           $saveNewData->created_at =$created_at;
           $saveNewData->save();


    }elseif($request->status == 'fcOne'){

        $saveNewData = new ParentNoteForFcOne();
        $saveNewData->fc_one_doc_present_id = $request->doc_id;
        $saveNewData->serial_number = 0;
        $saveNewData->subject = $request->subject;
        $saveNewData->name ='নোট';
        $saveNewData->created_at =$created_at;
        $saveNewData->save();

    }elseif($request->status == 'fcTwo'){


        $saveNewData = new ParentNoteForFcTwo();
        $saveNewData->fc_two_doc_present_id = $request->doc_id;
        $saveNewData->serial_number = 0;
        $saveNewData->subject = $request->subject;
        $saveNewData->name ='নোট';
        $saveNewData->created_at =$created_at;
        $saveNewData->save();


    }elseif($request->status == 'fdThree'){

        $saveNewData = new ParentNoteForFdThree();
        $saveNewData->fd_three_doc_present_id = $request->doc_id;
        $saveNewData->serial_number = 0;
        $saveNewData->subject = $request->subject;
        $saveNewData->name ='নোট';
        $saveNewData->created_at =$created_at;
        $saveNewData->save();


    }


    return redirect()->back()->with('success','সফলভাবে সংরক্ষণ করা হয়েছে');

    }
}
