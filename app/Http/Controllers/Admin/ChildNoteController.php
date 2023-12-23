<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Image;
use Auth;
use Hash;
use PDF;
use File;
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
use App\Models\NothiFirstSenderList;
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
use Mpdf\Mpdf;
class ChildNoteController extends Controller
{


    public function dd(){

        $mpdf = new Mpdf([
            'default_font_size' => 14,
            'default_font' => 'nikosh'
        ]);

        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);

        $mpdf->WriteHTML('এর ক্ষতিপূরণ নির্ধারণ সংক্রান্ত প্রতিবেদন।');



        $mpdf->Output();
        die();

    }


    public function printPotrangso($status,$parentId,$nothiId,$id,$sarokCode){


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


        $nothiNumber = NothiList::where('id',$nothiId)->value('main_sarok_number');

        $nothiYear = NothiList::where('id',$nothiId)->value('document_year');

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



        //$file_Name_Custome = 'printPotrangso';
        $data = view('admin.presentDocument.printPotrangso',['nothiYear'=>$nothiYear,'sarokCode'=>$sarokCode,'parentId'=>$parentId,'id'=>$id,'status'=>$status,'checkParent'=>$checkParent,'officeDetail'=>$officeDetail,'nothiNumber'=>$nothiNumber,'nothiId'=>$nothiId,'user'=>$user,'nothiPropokListUpdate'=>$nothiPropokListUpdate,'nothiAttractListUpdate'=>$nothiAttractListUpdate,'branchListForSerial'=>$branchListForSerial,'permissionNothiList'=>$permissionNothiList,'nothiCopyListUpdate'=>$nothiCopyListUpdate])->render();
//return $pdf->stream($file_Name_Custome.''.'.pdf');

//dd(11);

$mpdf = new Mpdf([
    //'default_font_size' => 14,
    'default_font' => 'nikosh'
]);

//$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);

$mpdf->WriteHTML($data);



$mpdf->Output();
die();




    }


    public function addChildNoteFromView($status,$parentId,$nothiId,$id,$activeCode){

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


        $nothiNumber = NothiList::where('id',$nothiId)->value('main_sarok_number');

        $nothiYear = NothiList::where('id',$nothiId)->value('document_year');

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




        return view('admin.presentDocument.addParentNoteFromView',compact('nothiYear','branchListForSerial','permissionNothiList','nothiCopyListUpdate','nothiAttractListUpdate','nothiPropokListUpdate','user','nothiId','nothiNumber','officeDetail','checkParent','status','id','parentId','activeCode'));

    }

    public function addChildNote($status,$parentId,$nothiId,$id,$activeCode){

//dd(bangla_date(time(),"bn","d-m-y"));

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


        $nothiNumber = NothiList::where('id',$nothiId)->value('main_sarok_number');

        $nothiYear = NothiList::where('id',$nothiId)->value('document_year');

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


        //new code december 23




        if($status == 'registration'){


        $checkParentFirst = DB::table('parent_note_for_registrations')->where('nothi_detail_id',$parentId)
        ->where('serial_number',$nothiId)
        ->where('id',$id)
           ->first();


           $childNoteNewList = DB::table('child_note_for_registrations')
                   ->where('parent_note_regid',$id)->get();


                   $childNoteNewListValue = DB::table('child_note_for_registrations')
                   ->where('parent_note_regid',$id)->orderBy('id','desc')->value('id');


        }elseif($status == 'renew'){




        $checkParentFirst = DB::table('parent_note_for_renews')->where('nothi_detail_id',$parentId)
        ->where('serial_number',$nothiId)
        ->where('id',$id)
        ->first();


        $childNoteNewList = DB::table('child_note_for_renews')
                   ->where('parent_note_for_renew_id',$id)->get();


                   $childNoteNewListValue = DB::table('child_note_for_renews')
                   ->where('parent_note_for_renew_id',$id)->orderBy('id','desc')->value('id');



        }elseif($status == 'nameChange'){






        $checkParentFirst = DB::table('parent_note_for_name_changes')->where('nothi_detail_id',$parentId)
        ->where('serial_number',$nothiId)
        ->where('id',$id)
        ->first();


        $childNoteNewList = DB::table('child_note_for_name_changes')
                   ->where('parentnote_name_change_id',$id)->get();


                   $childNoteNewListValue = DB::table('child_note_for_name_changes')
                   ->where('parentnote_name_change_id',$id)->orderBy('id','desc')->value('id');



        }elseif($status == 'fdNine'){






        $checkParentFirst = DB::table('parent_note_for_fd_nines')->where('nothi_detail_id',$parentId)
        ->where('serial_number',$nothiId)
        ->where('id',$id)
        ->first();


        $childNoteNewList = DB::table('child_note_for_fd_nines')
                   ->where('p_note_for_fd_nine_id',$id)->get();

                   $childNoteNewListValue = DB::table('child_note_for_fd_nines')
                   ->where('p_note_for_fd_nine_id',$id)->orderBy('id','desc')->value('id');

        //dd($checkParent);


        }elseif($status == 'fdNineOne'){





        $checkParentFirst = DB::table('parent_note_for_fd_nine_ones')->where('nothi_detail_id',$parentId)
        ->where('serial_number',$nothiId)
        ->where('id',$id)
        ->first();

        $childNoteNewList = DB::table('child_note_for_fd_nine_ones')
                   ->where('p_note_for_fd_nine_one_id',$id)->get();


                   $childNoteNewListValue = DB::table('child_note_for_fd_nine_ones')
                   ->where('p_note_for_fd_nine_one_id',$id)->orderBy('id','desc')->value('id');




        }elseif($status == 'fdSix'){




        $checkParentFirst = DB::table('parent_note_for_fdsixes')->where('nothi_detail_id',$parentId)
        ->where('serial_number',$nothiId)
        ->where('id',$id)
        ->first();

        $childNoteNewList = DB::table('child_note_for_fd_sixes')
                   ->where('parent_note_for_fdsix_id',$id)->get();


                   $childNoteNewListValue = DB::table('child_note_for_fd_sixes')
                   ->where('parent_note_for_fdsix_id',$id)->orderBy('id','desc')->value('id');



        }elseif($status == 'fdSeven'){





        $checkParentFirst = DB::table('parent_note_for_fd_sevens')->where('nothi_detail_id',$parentId)
        ->where('serial_number',$nothiId)
        ->where('id',$id)
        ->first();

        $childNoteNewList = DB::table('child_note_for_fd_sevens')
                   ->where('parent_note_for_fd_seven_id',$id)->get();


                   $childNoteNewListValue = DB::table('child_note_for_fd_sevens')
                   ->where('parent_note_for_fd_seven_id',$id)->orderBy('id','desc')->value('id');



        }elseif($status == 'fcOne'){



        $checkParentFirst = DB::table('parent_note_for_fc_ones')->where('nothi_detail_id',$parentId)
        ->where('serial_number',$nothiId)
        ->where('id',$id)
        ->first();


        $childNoteNewList = DB::table('child_note_for_fc_ones')
                   ->where('parent_note_for_fc_one_id',$id)->get();

                   $childNoteNewListValue = DB::table('child_note_for_fc_ones')
                   ->where('parent_note_for_fc_one_id',$id)->orderBy('id','desc')->value('id');




        }elseif($status == 'fcTwo'){




        $checkParentFirst = DB::table('parent_note_for_fc_twos')->where('nothi_detail_id',$parentId)
        ->where('serial_number',$nothiId)
        ->where('id',$id)
        ->first();

        $childNoteNewList = DB::table('child_note_for_fc_twos')
                   ->where('parent_note_for_fc_two_id',$id)->get();


                   $childNoteNewListValue = DB::table('child_note_for_fc_twos')
                   ->where('parent_note_for_fc_two_id',$id)->orderBy('id','desc')->value('id');





        }elseif($status == 'fdThree'){






        $checkParentFirst = DB::table('parent_note_for_fd_threes')->where('nothi_detail_id',$parentId)
        ->where('serial_number',$nothiId)
        ->where('id',$id)
        ->first();


        $childNoteNewList = DB::table('child_note_for_fd_threes')
                   ->where('parent_note_for_fd_three_id',$id)->get();

                   $childNoteNewListValue = DB::table('child_note_for_fd_threes')
                   ->where('parent_note_for_fd_three_id',$id)->orderBy('id','desc')->value('id');


        }







        //end new code december 23




        return view('admin.presentDocument.addChildNote',compact('childNoteNewListValue','childNoteNewList','checkParentFirst','nothiYear','branchListForSerial','permissionNothiList','nothiCopyListUpdate','nothiAttractListUpdate','nothiPropokListUpdate','user','nothiId','nothiNumber','officeDetail','checkParent','status','id','parentId','activeCode'));
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


                $nothiNumber = NothiList::where('id',$nothiId)->value('main_sarok_number');
                $nothiYear = NothiList::where('id',$nothiId)->value('document_year');

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









if($status == 'registration'){


$checkParentFirst = DB::table('parent_note_for_registrations')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->where('id',$id)
->first();


$childNoteNewList = DB::table('child_note_for_registrations')
->where('parent_note_regid',$id)->get();

$childNoteNewListValue = DB::table('child_note_for_registrations')
->where('parent_note_regid',$id)->orderBy('id','desc')->value('id');

}elseif($status == 'renew'){




$checkParentFirst = DB::table('parent_note_for_renews')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->where('id',$id)
->first();


$childNoteNewList = DB::table('child_note_for_renews')
->where('parent_note_for_renew_id',$id)->get();

$childNoteNewListValue = DB::table('child_note_for_renews')
->where('parent_note_for_renew_id',$id)->orderBy('id','desc')->value('id');

}elseif($status == 'nameChange'){






$checkParentFirst = DB::table('parent_note_for_name_changes')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->where('id',$id)
->first();


$childNoteNewList = DB::table('child_note_for_name_changes')
->where('parentnote_name_change_id',$id)->get();

$childNoteNewListValue = DB::table('child_note_for_name_changes')
->where('parentnote_name_change_id',$id)->orderBy('id','desc')->value('id');


}elseif($status == 'fdNine'){






$checkParentFirst = DB::table('parent_note_for_fd_nines')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->where('id',$id)
->first();


$childNoteNewList = DB::table('child_note_for_fd_nines')
->where('p_note_for_fd_nine_id',$id)->get();

//dd($checkParent);
$childNoteNewListValue = DB::table('child_note_for_fd_nines')
->where('p_note_for_fd_nine_id',$id)->orderBy('id','desc')->value('id');

}elseif($status == 'fdNineOne'){





$checkParentFirst = DB::table('parent_note_for_fd_nine_ones')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->where('id',$id)
->first();

$childNoteNewList = DB::table('child_note_for_fd_nine_ones')
->where('p_note_for_fd_nine_one_id',$id)->get();

$childNoteNewListValue = DB::table('child_note_for_fd_nine_ones')
->where('p_note_for_fd_nine_one_id',$id)->orderBy('id','desc')->value('id');


}elseif($status == 'fdSix'){




$checkParentFirst = DB::table('parent_note_for_fdsixes')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->where('id',$id)
->first();

$childNoteNewList = DB::table('child_note_for_fd_sixes')
->where('parent_note_for_fdsix_id',$id)->get();

$childNoteNewListValue = DB::table('child_note_for_fd_sixes')
->where('parent_note_for_fdsix_id',$id)->orderBy('id','desc')->value('id');

}elseif($status == 'fdSeven'){





$checkParentFirst = DB::table('parent_note_for_fd_sevens')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->where('id',$id)
->first();

$childNoteNewList = DB::table('child_note_for_fd_sevens')
->where('parent_note_for_fd_seven_id',$id)->get();

$childNoteNewListValue = DB::table('child_note_for_fd_sevens')
->where('parent_note_for_fd_seven_id',$id)->orderBy('id','desc')->value('id');

}elseif($status == 'fcOne'){



$checkParentFirst = DB::table('parent_note_for_fc_ones')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->where('id',$id)
->first();


$childNoteNewList = DB::table('child_note_for_fc_ones')
->where('parent_note_for_fc_one_id',$id)->get();

$childNoteNewListValue = DB::table('child_note_for_fc_ones')
->where('parent_note_for_fc_one_id',$id)->orderBy('id','desc')->value('id');


}elseif($status == 'fcTwo'){




$checkParentFirst = DB::table('parent_note_for_fc_twos')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->where('id',$id)
->first();

$childNoteNewList = DB::table('child_note_for_fc_twos')
->where('parent_note_for_fc_two_id',$id)->get();


$childNoteNewListValue = DB::table('child_note_for_fc_twos')
->where('parent_note_for_fc_two_id',$id)->orderBy('id','desc')->value('id');


}elseif($status == 'fdThree'){






$checkParentFirst = DB::table('parent_note_for_fd_threes')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->where('id',$id)
->first();


$childNoteNewList = DB::table('child_note_for_fd_threes')
->where('parent_note_for_fd_three_id',$id)->get();


$childNoteNewListValue = DB::table('child_note_for_fd_threes')
->where('parent_note_for_fd_three_id',$id)->orderBy('id','desc')->value('id');


}





//dd(count($childNoteNewList));




                return view('admin.presentDocument.viewChildNote',compact('childNoteNewListValue','childNoteNewList','checkParentFirst','nothiYear','branchListForSerial','permissionNothiList','nothiCopyListUpdate','nothiAttractListUpdate','nothiPropokListUpdate','user','nothiId','nothiNumber','officeDetail','checkParent','status','id','parentId','activeCode'));
            }


            public function givePermissionToNote($status,$parentId,$nothiId,$id,$childnote){


                // dd(DB::table('nothi_details')
                // ->where('noteId',$id)
                // ->where('nothId',$nothiId)
                // ->where('dakId',$parentId)
                // ->where('dakType',$status)->value('id'));
//dd(12)

                DB::table('nothi_details')
                ->where('noteId',$id)
                ->where('nothId',$nothiId)
                ->where('dakId',$parentId)
                ->where('dakType',$status)
                ->update([

                    'permission_status' =>1
                 ]);
                 return redirect()->back()->with('success','সফলভাবে অনুমতি দেওয়া হয়েছে');
            }


            public function givePermissionForPotroZari($status,$parentId,$nothiId,$id,$childnote){


                // dd(DB::table('nothi_details')
                // ->where('noteId',$id)
                // ->where('nothId',$nothiId)
                // ->where('dakId',$parentId)
                // ->where('dakType',$status)->value('id'));



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


                $nothiNumber = NothiList::where('id',$nothiId)->value('main_sarok_number');
                $nothiYear = NothiList::where('id',$nothiId)->value('document_year');

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



                $file_Name_Custome ='IssuedPaper-'.date('d').date('F').date('Y').'-'.time().CommonController::generateRandomInteger();

                $url = public_path('uploads\IssuedPaper');
                //dd($url);


                    File::makeDirectory($url, 0777, true, true);



                $data =view('admin.presentDocument.issuedPaper',[
                    'nothiYear'=>$nothiYear,
                    'childnote'=>$childnote,
                    'parentId'=>$parentId,
                    'id'=>$id,
                    'status'=>$status,
                    'checkParent'=>$checkParent,
                    'officeDetail'=>$officeDetail,
                    'nothiNumber'=>$nothiNumber,
                    'nothiId'=>$nothiId,
                    'user'=>$user,
                    'nothiPropokListUpdate'=>$nothiPropokListUpdate,
                    'nothiAttractListUpdate'=>$nothiAttractListUpdate,
                    'branchListForSerial'=>$branchListForSerial,
                    'permissionNothiList'=>$permissionNothiList,
                    'nothiCopyListUpdate'=>$nothiCopyListUpdate])->render();
                     //return $pdf->stream($file_Name_Custome.''.'.pdf');


                     DB::table('nothi_details')
                ->where('noteId',$id)
                ->where('nothId',$nothiId)
                ->where('dakId',$parentId)
                ->where('dakType',$status)
                ->update([
                    'potroPdf'=>'uploads/IssuedPaper/'.$file_Name_Custome.'.pdf',
                    'zari_permission_status' =>1
                 ]);



                 $pdfFilePath =$file_Name_Custome.'.pdf';


                     $mpdf = new Mpdf([
                        //'default_font_size' => 14,
                        'default_font' => 'nikosh'
                    ]);

                    //$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);

                    $mpdf->WriteHTML($data);



                    $mpdf->Output("./public/uploads/IssuedPaper/".$pdfFilePath, "F");
                    //die();



                 return redirect()->back()->with('success','সফলভাবে অনুমতি দেওয়া হয়েছে');
            }


    public function saveNothiPermission(Request $request){




        //dd($request->all());


        //NothiFirstSenderList


        if($request->first_sender == 'first_sender'){

        $mainSaveData = new NothiFirstSenderList();
        $mainSaveData ->noteId = $request->noteId;
        $mainSaveData ->nothId = $request->nothiId;
        $mainSaveData ->dakId = $request->dakId;
        $mainSaveData ->dakType = $request->status;
        $mainSaveData ->sender = Auth::guard('admin')->user()->id;
        $mainSaveData->save();


        }


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
            $saveNewData->admin_id =Auth::guard('admin')->user()->id;
            $saveNewData->save();


     }elseif($request->status == 'renew'){


         $saveNewData = new ChildNoteForRenew();
         $saveNewData->parent_note_for_renew_id = $request->parentNoteId;
         $saveNewData->serial_number = 0;
         $saveNewData->description = $request->mainPartNote;
         $saveNewData->created_at =$created_at;
         $saveNewData->admin_id =Auth::guard('admin')->user()->id;
         $saveNewData->save();



     }elseif($request->status == 'nameChange'){

         $saveNewData = new ChildNoteForNameChange();
         $saveNewData->parentnote_name_change_id = $request->parentNoteId;
         $saveNewData->serial_number = 0;
         $saveNewData->description = $request->mainPartNote;
         $saveNewData->created_at =$created_at;
         $saveNewData->admin_id =Auth::guard('admin')->user()->id;
         $saveNewData->save();



     }elseif($request->status == 'fdNine'){

         $saveNewData = new ChildNoteForFdNine();
         $saveNewData->p_note_for_fd_nine_id = $request->parentNoteId;
         $saveNewData->serial_number = 0;
         $saveNewData->description = $request->mainPartNote;
         $saveNewData->created_at =$created_at;
         $saveNewData->admin_id =Auth::guard('admin')->user()->id;
         $saveNewData->save();


     }elseif($request->status == 'fdNineOne'){

         $saveNewData = new ChildNoteForFdNineOne();
         $saveNewData->p_note_for_fd_nine_one_id = $request->parentNoteId;
         $saveNewData->serial_number = 0;
         $saveNewData->description = $request->mainPartNote;
         $saveNewData->created_at =$created_at;
         $saveNewData->admin_id =Auth::guard('admin')->user()->id;
         $saveNewData->save();

     }elseif($request->status == 'fdSix'){

         $saveNewData = new ChildNoteForFdSix();
         $saveNewData->parent_note_for_fdsix_id = $request->parentNoteId;
         $saveNewData->serial_number = 0;
         $saveNewData->description = $request->mainPartNote;
         $saveNewData->created_at =$created_at;
         $saveNewData->admin_id =Auth::guard('admin')->user()->id;
         $saveNewData->save();

     }elseif($request->status == 'fdSeven'){

  $saveNewData = new ChildNoteForFdSeven();
  $saveNewData->parent_note_for_fd_seven_id = $request->parentNoteId;
  $saveNewData->serial_number = 0;
  $saveNewData->description = $request->mainPartNote;
  $saveNewData->created_at =$created_at;
  $saveNewData->admin_id =Auth::guard('admin')->user()->id;
  $saveNewData->save();


     }elseif($request->status == 'fcOne'){

         $saveNewData = new ChildNoteForFcOne();
         $saveNewData->parent_note_for_fc_one_id = $request->parentNoteId;
         $saveNewData->serial_number = 0;
         $saveNewData->description = $request->mainPartNote;
         $saveNewData->created_at =$created_at;
         $saveNewData->admin_id =Auth::guard('admin')->user()->id;
         $saveNewData->save();

     }elseif($request->status == 'fcTwo'){


         $saveNewData = new ChildNoteForFcTwo();
         $saveNewData->parent_note_for_fc_two_id = $request->parentNoteId;
         $saveNewData->serial_number = 0;
         $saveNewData->description = $request->mainPartNote;
         $saveNewData->created_at =$created_at;
         $saveNewData->admin_id =Auth::guard('admin')->user()->id;
         $saveNewData->save();


     }elseif($request->status == 'fdThree'){

         $saveNewData = new ChildNoteForFdThree();
         $saveNewData->parent_note_for_fd_three_id = $request->parentNoteId;
         $saveNewData->serial_number = 0;
         $saveNewData->description = $request->mainPartNote;
         $saveNewData->created_at =$created_at;

         $saveNewData->admin_id =Auth::guard('admin')->user()->id;

         $saveNewData->save();


     }


     if($request->final_button == 'সংরক্ষন ও খসড়া'){

        return redirect('admin/createPotro/'.$request->status.'/'.$request->dakId.'/'.$request->nothiId.'/'.$request->noteId.'/'.$request->activeCode)->with('success','সফলভাবে সংরক্ষণ করা হয়েছে');

     }else{
        return redirect()->back()->with('success','সফলভাবে সংরক্ষণ করা হয়েছে');
     }



    }


    public function update(Request $request,$id){


//dd($request->all());


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


     if($request->final_button == 'সংশোধন ও খসড়া'){

        return redirect('admin/createPotro/'.$request->status.'/'.$request->dakId.'/'.$request->nothiId.'/'.$request->noteId.'/'.$request->activeCode)->with('success','সফলভাবে সংশোধন করা হয়েছে');

     }else{
        return redirect()->back()->with('success','সফলভাবে সংশোধন করা হয়েছে');
     }





    }
}
