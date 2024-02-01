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
use Mail;
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
use App\Models\NoteAttachment;
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
use App\Models\PotrangshoDraft;
class ChildNoteController extends Controller
{

    public function getdataforNothiList(Request $request){

        //dd(12);
        $nothiCopyListId=$request->getFinalValue;

        $eid=$request->eid;

        if($request->mmStatus == 'registration'){

            $childNoteNewList = DB::table('child_note_for_registrations')
            ->where('id',$request->getFinalValue)->first();


            }elseif($request->mmStatus == 'renew'){

            $childNoteNewList = DB::table('child_note_for_renews')
            ->where('id',$request->getFinalValue)->first();


            }elseif($request->mmStatus == 'nameChange'){

            $childNoteNewList = DB::table('child_note_for_name_changes')
            ->where('id',$request->getFinalValue)->first();



            }elseif($request->mmStatus == 'fdNine'){


            $childNoteNewList = DB::table('child_note_for_fd_nines')
            ->where('id',$request->getFinalValue)->first();


            }elseif($request->mmStatus == 'fdNineOne'){


            $childNoteNewList = DB::table('child_note_for_fd_nine_ones')
            ->where('id',$request->getFinalValue)->first();



            }elseif($request->mmStatus == 'fdSix'){


            $childNoteNewList = DB::table('child_note_for_fd_sixes')
            ->where('id',$request->getFinalValue)->first();


            }elseif($request->mmStatus == 'fdSeven'){


            $childNoteNewList = DB::table('child_note_for_fd_sevens')
            ->where('id',$request->getFinalValue)->first();


            }elseif($request->mmStatus == 'fcOne'){


            $childNoteNewList = DB::table('child_note_for_fc_ones')
            ->where('id',$request->getFinalValue)->first();



            }elseif($request->mmStatus == 'fcTwo'){



            $childNoteNewList = DB::table('child_note_for_fc_twos')
            ->where('id',$request->getFinalValue)->first();



            }elseif($request->mmStatus == 'fdThree'){


            $childNoteNewList = DB::table('child_note_for_fd_threes')
            ->where('id',$request->getFinalValue)->first();



            }

        $data = view('admin.presentDocument.getdataforTest',compact('eid','nothiCopyListId','childNoteNewList'))->render();
            return response()->json(['data'=>$data]);

    }


    public function deleteAttachment($id){

  $dataDelete = NoteAttachment::where('id',$id)->delete();

  return redirect()->back()->with('error','সফলভাবে মুছে ফেলা হয়েছে ');
    }


    public function deleteAllParagraph($id,$status){

           if($status == 'registration'){

            $childNoteNewList = DB::table('child_note_for_registrations')
            ->where('id',$id)->delete();


            }elseif($status == 'renew'){

            $childNoteNewList = DB::table('child_note_for_renews')
            ->where('id',$id)->delete();


            }elseif($status == 'nameChange'){

            $childNoteNewList = DB::table('child_note_for_name_changes')
            ->where('id',$id)->delete();



            }elseif($status == 'fdNine'){


            $childNoteNewList = DB::table('child_note_for_fd_nines')
            ->where('id',$id)->delete();


            }elseif($status == 'fdNineOne'){


            $childNoteNewList = DB::table('child_note_for_fd_nine_ones')
            ->where('id',$id)->delete();



            }elseif($status == 'fdSix'){


            $childNoteNewList = DB::table('child_note_for_fd_sixes')
            ->where('id',$id)->delete();


            }elseif($status == 'fdSeven'){


            $childNoteNewList = DB::table('child_note_for_fd_sevens')
            ->where('id',$id)->delete();


            }elseif($status == 'fcOne'){


            $childNoteNewList = DB::table('child_note_for_fc_ones')
            ->where('id',$id)->delete();



            }elseif($status == 'fcTwo'){



            $childNoteNewList = DB::table('child_note_for_fc_twos')
            ->where('id',$id)->delete();



            }elseif($status == 'fdThree'){


            $childNoteNewList = DB::table('child_note_for_fd_threes')
            ->where('id',$id)->delete();



            }


            return redirect()->back()->with('error','সফলভাবে মুছে ফেলা হয়েছে');
    }


    public function printPotrangsoPdfForEmail($status,$parentId,$nothiId,$id){

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
            ->where('serial_number',$nothiId)
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

        $sarokCode = 1;

        $data = view('admin.presentDocument.printPotrangso',['nothiYear'=>$nothiYear,'sarokCode'=>$sarokCode,'parentId'=>$parentId,'id'=>$id,'status'=>$status,'checkParent'=>$checkParent,'officeDetail'=>$officeDetail,'nothiNumber'=>$nothiNumber,'nothiId'=>$nothiId,'user'=>$user,'nothiPropokListUpdate'=>$nothiPropokListUpdate,'nothiAttractListUpdate'=>$nothiAttractListUpdate,'branchListForSerial'=>$branchListForSerial,'permissionNothiList'=>$permissionNothiList,'nothiCopyListUpdate'=>$nothiCopyListUpdate])->render();

        $mpdf = new Mpdf([
      'default_font' => 'nikosh'
        ]);

        $mpdf->WriteHTML($data);
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
            ->where('serial_number',$nothiId)
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
        $nothiPropokListUpdate = NothiPrapok::where('nothiId',$nothiId)
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

        $data = view('admin.presentDocument.printPotrangso',['nothiYear'=>$nothiYear,'sarokCode'=>$sarokCode,'parentId'=>$parentId,'id'=>$id,'status'=>$status,'checkParent'=>$checkParent,'officeDetail'=>$officeDetail,'nothiNumber'=>$nothiNumber,'nothiId'=>$nothiId,'user'=>$user,'nothiPropokListUpdate'=>$nothiPropokListUpdate,'nothiAttractListUpdate'=>$nothiAttractListUpdate,'branchListForSerial'=>$branchListForSerial,'permissionNothiList'=>$permissionNothiList,'nothiCopyListUpdate'=>$nothiCopyListUpdate])->render();

        $mpdf = new Mpdf([
    'default_font' => 'nikosh'
         ]);

         $mpdf->WriteHTML($data);
         $mpdf->Output();
         die();

        }


    public function addChildNoteFromView($status,$parentId,$nothiId,$id,$activeCode){

        if($status == 'registration'){

            $officeDetail = RegistrationOfficeSarok::where('parent_note_regid',$id)->get();
            $checkParent = ParentNoteForRegistration::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)->get();

        }elseif($status == 'renew'){

            $officeDetail = RenewOfficeSarok::where('parent_note_for_renew_id',$id)->get();
            $checkParent = ParentNoteForRenew::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)->get();

        }elseif($status == 'nameChange'){

            $officeDetail = NameChangeOfficeSarok::where('parentnote_name_change_id',$id)->get();
            $checkParent = ParentNoteForNameChange::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)->get();

        }elseif($status == 'fdNine'){

            $officeDetail = FdNineOfficeSarok::where('p_note_for_fd_nine_id',$id)->get();
            $checkParent = ParentNoteForFdNine::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)->get();

        }elseif($status == 'fdNineOne'){

            $officeDetail = FdNineOneOfficeSarok::where('p_note_for_fd_nine_one_id',$id)->get();
            $checkParent = ParentNoteForFdNineOne::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)->get();

        }elseif($status == 'fdSix'){

            $officeDetail = FdSixOfficeSarok::where('parent_note_for_fdsix_id',$id)->get();
            $checkParent = ParentNoteForFdsix::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)->get();

        }elseif($status == 'fdSeven'){

            $officeDetail = FdSevenOfficeSarok::where('parent_note_for_fd_seven_id',$id)->get();
            $checkParent = ParentNoteForFdSeven::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)->get();

        }elseif($status == 'fcOne'){

            $officeDetail = FcOneOfficeSarok::where('parent_note_for_fc_one_id',$id)->get();
            $checkParent = ParentNoteForFcOne::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)->get();

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
        $nothiPropokListUpdate = NothiPrapok::where('nothiId',$nothiId)
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



        if($status == 'registration'){

             //new code
             $mainIdR = '';$fdOneFormId = '';$renewInfoData = '';
             $dataFromFd3Form = 0;$dataFromNVisaFd9Fd1='';$allNameChangeDoc = '';
             $getformOneId='';$nVisaDocs='';$ngoStatus='';
             $get_email_from_user=0;$mainIdFdNineOne=0;$nVisabasicInfo=0;
             $forwardingLetterOnulipi=0;$editCheck1=0;$editCheck=0;$statusData=0;
             $nVisaWorkPlace=0;$nVisaSponSor=0;$nVisaForeignerInfo=0;
             $nVisaManPower=0;$nVisaEmploye=0;$nVisaCompensationAndBenifits=0;
             $nVisaAuthPerson=0;$dataFromFc1Form=0;$dataFromFd6Form =0;
             $fd2FormList=0;$fd2OtherInfo=0;$prokolpoAreaList=0;
             $dataFromFd7Form=0;$dataFromFc2Form=0;

            $officeDetail = RegistrationOfficeSarok::where('parent_note_regid',$id)->get();
            $checkParent = ParentNoteForRegistration::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)->get();

            $registration_status_id = DB::table('ngo_registration_daks')
            ->where('id',$parentId)->value('registration_status_id');
            $fdOneIdForNothi = DB::table('ngo_statuses')->where('id',$registration_status_id)->value('fd_one_form_id');
            $rStatus = DB::table('ngo_statuses')->where('fd_one_form_id',$fdOneIdForNothi)->value('status');
            $nameChangeStatus = DB::table('ngo_name_changes')->where('fd_one_form_id',$fdOneIdForNothi)->value('status');
            $renewStatus = DB::table('ngo_renews')->where('fd_one_form_id',$fdOneIdForNothi)->value('status');
            $allDataForNewListAll = DB::table('ngo_statuses')->where('fd_one_form_id',$fdOneIdForNothi)->first();
            $formOneData = DB::table('fd_one_forms')->where('id',$fdOneIdForNothi)->first();
            $ngoTypeData = DB::table('ngo_type_and_languages')->where('user_id',$formOneData->user_id)->first();
            $signDataNew = DB::table('form_eights')->where('fd_one_form_id',$fdOneIdForNothi)->first();
            $formEghtData = DB::table('form_eights')->where('fd_one_form_id',$fdOneIdForNothi)->get();
            $formMemberData = DB::table('ngo_member_lists')->where('fd_one_form_id',$fdOneIdForNothi)->get();
            $formMemberDataDocRenew = DB::table('ngo_renew_infos')->where('fd_one_form_id',$fdOneIdForNothi)->get();
            $durationListAll1 = DB::table('ngo_durations')->where('fd_one_form_id',$fdOneIdForNothi)->value('ngo_duration_end_date');
            $durationListAll1 = DB::table('ngo_durations')->where('fd_one_form_id',$fdOneIdForNothi)->value('ngo_duration_start_date');
            $formMemberDataDoc = DB::table('ngo_member_nid_photos')->where('fd_one_form_id',$fdOneIdForNothi)->get();
            $formNgoDataDoc = DB::table('ngo_other_docs')->where('fd_one_form_id',$fdOneIdForNothi)->get();
            $usersInfo = DB::table('users')->where('id',$formOneData->user_id)->first();
            $allSourceOfFund = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$formOneData->id)->get();
            $allPartiw = DB::table('fd_one_member_lists')->where('fd_one_form_id',$formOneData->id)->get();
            $getAllDataAdviserBank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$formOneData->id)->first();
            $getAllDataOther= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$formOneData->id)->get();
            $getAllDataAdviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$formOneData->id)->get();
                             //new code

        }elseif($status == 'renew'){

            $dataFromFd3Form = 0;$allNameChangeDoc = '';$getformOneId='';
            $ngoTypeData = '';$dataFromNVisaFd9Fd1='';$nVisaDocs='';
            $ngoStatus='';$get_email_from_user=0;$mainIdFdNineOne=0;
            $nVisabasicInfo=0;$forwardingLetterOnulipi=0;$editCheck1=0;
            $editCheck=0;$statusData=0;$nVisaWorkPlace=0;
            $nVisaSponSor=0;$nVisaForeignerInfo=0;$nVisaManPower=0;
            $nVisaEmploye=0;$nVisaCompensationAndBenifits=0;$nVisaAuthPerson=0;
            $dataFromFc1Form=0;$dataFromFd6Form =0;$fd2FormList=0;
            $fd2OtherInfo=0;$prokolpoAreaList=0;$dataFromFd7Form=0;$dataFromFc2Form=0;

            $officeDetail = RenewOfficeSarok::where('parent_note_for_renew_id',$id)->get();
            $checkParent = ParentNoteForRenew::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)->get();

            $renew_status_id = DB::table('ngo_renew_daks')
              ->where('id',$parentId)->value('renew_status_id');
            $mainIdR = DB::table('ngo_renews')->where('id',$renew_status_id)->first();
            $fdOneFormId = DB::table('ngo_renews')->where('id',$renew_status_id)->first();
            $formOneData = DB::table('fd_one_forms')->where('id',$fdOneFormId->fd_one_form_id)->first();
            $rStatus = DB::table('ngo_renews')->where('fd_one_form_id',$formOneData->id)->value('status');
            $nameChangeStatus = DB::table('ngo_name_changes')->where('fd_one_form_id',$formOneData->id)->value('status');
            $renewStatus = DB::table('ngo_renews')->where('id',$id)->value('status');
            $allDataForNewListAll = DB::table('ngo_renews')->where('fd_one_form_id',$formOneData->id)->first();
            $formEghtData = DB::table('form_eights')->where('fd_one_form_id',$formOneData->id)->get();
            $formMemberData = DB::table('ngo_member_lists')->where('fd_one_form_id',$formOneData->id)->get();
            $renewInfoData = DB::table('ngo_renew_infos')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->first();
            $formMemberDataDocRenew = DB::table('ngo_renew_infos')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->get();
            $durationListAll1 = DB::table('ngo_durations')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->value('ngo_duration_end_date');
            $durationListAll1 = DB::table('ngo_durations')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->value('ngo_duration_start_date');
            $formMemberDataDoc = DB::table('ngo_member_nid_photos')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->get();
            $formNgoDataDoc = DB::table('ngo_other_docs')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->get();
            $usersInfo = DB::table('users')->where('id',$formOneData->user_id)->first();
            $allSourceOfFund = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$formOneData->id)->get();
            $allPartiw = DB::table('fd_one_member_lists')->where('fd_one_form_id',$formOneData->id)->get();
            $getAllDataAdviserBank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$formOneData->id)->first();
            $getAllDataOther= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$formOneData->id)->get();
            $getAllDataAdviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$formOneData->id)->get();


        }elseif($status == 'nameChange'){

            $dataFromFd3Form = 0;$renewInfoData='';$ngoTypeData = '';
            $mainIdR ='';$dataFromNVisaFd9Fd1='';$nVisaDocs='';
            $ngoStatus='';$get_email_from_user=0;$mainIdFdNineOne=0;
            $nVisabasicInfo=0;$forwardingLetterOnulipi=0;$editCheck1=0;
            $editCheck=0;$statusData=0;$nVisaWorkPlace=0;$nVisaSponSor=0;
            $nVisaForeignerInfo=0;$nVisaManPower=0;$nVisaEmploye=0;
            $nVisaCompensationAndBenifits=0;$nVisaAuthPerson=0;$dataFromFd6Form =0;
            $fd2FormList=0;$fd2OtherInfo=0;$prokolpoAreaList=0;$dataFromFc1Form=0;
            $dataFromFc2Form=0;$dataFromFd7Form=0;

            $officeDetail = NameChangeOfficeSarok::where('parentnote_name_change_id',$id)->get();
            $checkParent = ParentNoteForNameChange::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)->get();

            $name_change_status_id = DB::table('ngo_name_change_daks')->where('id',$parentId)->value('name_change_status_id');
            $allNameChangeDoc = DB::table('name_change_docs')->where('ngo_name_change_id',$name_change_status_id)->get();
            $getformOneId = DB::table('ngo_name_changes')->where('id',$name_change_status_id)->first();
            $formOneData = DB::table('fd_one_forms')->where('id',$getformOneId->fd_one_form_id)->first();
            $rStatus = DB::table('ngo_statuses')->where('fd_one_form_id',$formOneData->id)->value('status');
            $nameChangeStatus = DB::table('ngo_name_changes')->where('id',$name_change_status_id)->value('status');
            $renewStatus = DB::table('ngo_renews')->where('fd_one_form_id',$formOneData->id)->value('status');
            $checkOldorNew = DB::table('ngo_type_and_languages')->where('user_id',$formOneData->user_id)->value('ngo_type_new_old');

            if($checkOldorNew == 'Old'){

             $allDataForNewListAll = DB::table('ngo_renews')->where('fd_one_form_id',$formOneData->id)->first();
            }else{

             $allDataForNewListAll = DB::table('ngo_statuses')->where('fd_one_form_id',$formOneData->id)->first();
            }

            $formEghtData = DB::table('form_eights')->where('fd_one_form_id',$formOneData->id)->get();
            $formMemberData = DB::table('ngo_member_lists')->where('fd_one_form_id',$formOneData->id)->get();
            $formMemberDataDocRenew = DB::table('ngo_renew_infos')->where('fd_one_form_id',$formOneData->id)->get();
            $durationListAll1 = DB::table('ngo_durations')->where('fd_one_form_id',$formOneData->id)->value('ngo_duration_end_date');
            $durationListAll1 = DB::table('ngo_durations')->where('fd_one_form_id',$formOneData->id)->value('ngo_duration_start_date');
            $formMemberDataDoc = DB::table('ngo_member_nid_photos')->where('fd_one_form_id',$formOneData->id)->get();
            $formNgoDataDoc = DB::table('ngo_other_docs')->where('fd_one_form_id',$formOneData->id)->get();
            $usersInfo = DB::table('users')->where('id',$formOneData->user_id)->first();
            $allSourceOfFund = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$formOneData->id)->get();
            $allPartiw = DB::table('fd_one_member_lists')->where('fd_one_form_id',$formOneData->id)->get();
            $getAllDataAdviserBank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$formOneData->id)->first();
            $getAllDataOther= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$formOneData->id)->get();
            $getAllDataAdviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$formOneData->id)->get();

        }elseif($status == 'fdNine'){

            $dataFromFd3Form = 0;$get_email_from_user=0;$mainIdFdNineOne=0;
            $nVisabasicInfo=0;$forwardingLetterOnulipi=0;$editCheck1=0;
            $editCheck=0;$statusData=0;$nVisaWorkPlace=0;$nVisaSponSor=0;
            $nVisaForeignerInfo=0;$nVisaManPower=0;$nVisaEmploye=0;
            $nVisaCompensationAndBenifits=0;$nVisaAuthPerson=0;$mainIdR=0;
            $renewInfoData=0;$formOneData=0;$allDataForNewListAll=0;
            $formEghtData=0;$formMemberData=0;$formMemberDataDoc=0;
            $formNgoDataDoc=0;$usersInfo=0;$allSourceOfFund=0;$allPartiw=0;
            $allNameChangeDoc = 0;$getformOneId= 0;$durationListAll1 =0;
            $durationListAll1 = 0;$renewStatus = 0;$nameChangeStatus = 0;
            $rStatus = 0;$formMemberDataDocRenew =0;$getAllDataAdviser=0;
            $getAllDataOther=0;$getAllDataAdviserBank=0;$dataFromFd6Form =0;
            $fd2FormList=0;$fd2OtherInfo=0;$prokolpoAreaList=0;$dataFromFd7Form=0;
            $dataFromFc1Form=0;$dataFromFc2Form=0;


            $officeDetail = FdNineOfficeSarok::where('p_note_for_fd_nine_id',$id)->get();
            $checkParent = ParentNoteForFdNine::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)
            ->get();

            $fd_nine_status_id = DB::table('ngo_f_d_nine_daks')->where('id',$parentId)->value('f_d_nine_status_id');

            $dataFromNVisaFd9Fd1 = DB::table('fd9_forms')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd9_forms.fd_one_form_id')
            ->select('fd_one_forms.*','fd9_forms.*')
            ->where('fd9_forms.id',$fd_nine_status_id)
            ->first();

            $ngoTypeData = DB::table('ngo_type_and_languages')->where('user_id',$dataFromNVisaFd9Fd1->user_id)->first();
            $checkOldorNew = DB::table('ngo_type_and_languages')->where('user_id',$dataFromNVisaFd9Fd1->user_id)->value('ngo_type_new_old');

           if($checkOldorNew == 'Old'){

            $ngoStatus = DB::table('ngo_renews')->where('fd_one_form_id',$dataFromNVisaFd9Fd1->fd_one_form_id)->first();

            }else{

            $ngoStatus = DB::table('ngo_statuses')->where('fd_one_form_id',$dataFromNVisaFd9Fd1->fd_one_form_id)->first();

           }

            $nVisaDocs = DB::table('n_visa_necessary_document_for_work_permits')->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->first();


        }elseif($status == 'fdNineOne'){

            $dataFromFd3Form = 0;$dataFromFd6Form =0;$fd2FormList=0;
            $fd2OtherInfo=0;$prokolpoAreaList=0;$mainIdR=0;
            $renewInfoData=0;$dataFromFd7Form=0;$formOneData=0;
            $allDataForNewListAll=0;$formEghtData=0;$formMemberData=0;
            $formMemberDataDoc=0;$formNgoDataDoc=0;$usersInfo=0;
            $allSourceOfFund=0;$allPartiw=0;$allNameChangeDoc = 0;
            $getformOneId= 0;$durationListAll1 =0;$durationListAll1 = 0;
            $renewStatus = 0;$nameChangeStatus = 0;$rStatus = 0;
            $formMemberDataDocRenew =0;$getAllDataAdviser=0;
            $getAllDataOther=0;$getAllDataAdviserBank=0;
            $dataFromFc1Form=0;$dataFromFc2Form=0;

            $officeDetail = FdNineOneOfficeSarok::where('p_note_for_fd_nine_one_id',$id)->get();
            $checkParent = ParentNoteForFdNineOne::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)
            ->get();

           $fd_nine_one_status_id = DB::table('ngo_f_d_nine_one_daks')->where('id',$parentId)->value('f_d_nine_one_status_id');

           $mainIdFdNineOne = $fd_nine_one_status_id;

           $dataFromNVisaFd9Fd1 = DB::table('fd9_one_forms')
           ->join('fd_one_forms', 'fd9_one_forms.fd_one_form_id', '=', 'fd_one_forms.id')
           ->select('fd_one_forms.*','fd9_one_forms.*','fd9_one_forms.id as mainId','fd9_one_forms.chief_name as chiefName','fd9_one_forms.chief_desi as chiefDesi','fd9_one_forms.digital_signature as chiefSign','fd9_one_forms.digital_seal as chiefSeal','fd9_one_forms.created_at as chiefDate')
           ->orderBy('fd9_one_forms.id','desc')
           ->where('fd9_one_forms.id',$fd_nine_one_status_id)
           ->first();

           $get_email_from_user = DB::table('users')->where('id',$dataFromNVisaFd9Fd1->user_id)->value('email');
           $forwardId =  DB::table('forwarding_letters')->where('fd9_form_id',$dataFromNVisaFd9Fd1->mainId)->orderBy('id','desc')->value('id');
           $forwardingLetterOnulipi = DB::table('forwarding_letter_onulipis')->where('forwarding_letter_id',$forwardId)->get();
           $editCheck = DB::table('fd9_forwarding_letter_edits')->where('forwarding_letter_id',$forwardId)->orderBy('id','desc')->value('pdf_part_one');
           $editCheck1 = DB::table('fd9_forwarding_letter_edits')->where('forwarding_letter_id',$forwardId)->orderBy('id','desc')->value('pdf_part_two');
           $ngoTypeData = DB::table('ngo_type_and_languages')->where('user_id',$dataFromNVisaFd9Fd1->user_id)->first();

           if($ngoTypeData->ngo_type_new_old == 'Old'){

            $ngoStatus = DB::table('ngo_renews')->where('fd_one_form_id',$dataFromNVisaFd9Fd1->fd_one_form_id)->first();

           }else{

            $ngoStatus = DB::table('ngo_statuses')->where('fd_one_form_id',$dataFromNVisaFd9Fd1->fd_one_form_id)->first();

        }


     $nVisabasicInfo = DB::table('n_visas')
     ->where('fd9_one_form_id',$dataFromNVisaFd9Fd1->mainId)->first();
     $statusData = DB::table('secruity_checks')->where('n_visa_id',$nVisabasicInfo->id)->value('created_at');
     $nVisaAuthPerson = DB::table('n_visa_authorized_personal_of_the_orgs')
                   ->where('n_visa_id',$nVisabasicInfo->id)->first();
     $nVisaCompensationAndBenifits = DB::table('n_visa_compensation_and_benifits')
                   ->where('n_visa_id',$nVisabasicInfo->id)->get();
     $nVisaEmploye = DB::table('n_visa_employment_information')
                   ->where('n_visa_id',$nVisabasicInfo->id)->first();
     $nVisaManPower = DB::table('n_visa_manpower_of_the_offices')
                   ->where('n_visa_id',$nVisabasicInfo->id)->first();
     $nVisaDocs = DB::table('n_visa_necessary_document_for_work_permits')
                   ->where('n_visa_id',$nVisabasicInfo->id)->first();
     $nVisaForeignerInfo = DB::table('n_visa_particulars_of_foreign_incumbnets')
                   ->where('n_visa_id',$nVisabasicInfo->id)->first();
     $nVisaSponSor = DB::table('n_visa_particular_of_sponsor_or_employers')
                   ->where('n_visa_id',$nVisabasicInfo->id)->first();
     $nVisaWorkPlace = DB::table('n_visa_work_place_addresses')
                   ->where('n_visa_id',$nVisabasicInfo->id)->first();



        }elseif($status == 'fdSix'){

            $dataFromFd3Form = 0;$dataFromFd7Form=0;$ngoStatus=0;
            $ngoTypeData=0;$nVisaDocs=0;$dataFromNVisaFd9Fd1=0;
            $nVisabasicInfo=0;$forwardingLetterOnulipi=0;$editCheck1=0;
            $editCheck=0;$statusData=0;$nVisaWorkPlace=0;$nVisaSponSor=0;
            $nVisaForeignerInfo=0;$nVisaManPower=0;$nVisaEmploye=0;
            $nVisaCompensationAndBenifits=0;$nVisaAuthPerson=0;
            $mainIdR=0;$renewInfoData=0;$mainIdFdNineOne =0;$dataFromFc2Form=0;
            $formOneData=0;$allDataForNewListAll=0;$formEghtData=0;
            $formMemberData=0;$formMemberDataDoc=0;$formNgoDataDoc=0;
            $usersInfo=0; $allSourceOfFund=0;$allPartiw=0;
            $allNameChangeDoc = 0;$getformOneId= 0;$durationListAll1 =0;
            $durationListAll1 = 0;$renewStatus = 0;$nameChangeStatus = 0;
            $rStatus = 0;$formMemberDataDocRenew =0;$getAllDataAdviser=0;
            $getAllDataOther=0;$getAllDataAdviserBank=0;$dataFromFc1Form=0;


            $officeDetail = FdSixOfficeSarok::where('parent_note_for_fdsix_id',$id)->get();
            $fd_six_status_id = DB::table('ngo_fd_six_daks')
                ->where('id',$parentId)
                ->value('fd_six_status_id');

            $dataFromFd6Form = DB::table('fd6_forms')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd6_forms.fd_one_form_id')
            ->select('fd_one_forms.*','fd6_forms.*','fd6_forms.id as mainId')
            ->where('fd6_forms.id',$fd_six_status_id)
            ->orderBy('fd6_forms.id','desc')
            ->first();
            $get_email_from_user = DB::table('users')->where('id',$dataFromFd6Form->user_id)->value('email');
            $fd2FormList = DB::table('fd2_forms')->where('fd_one_form_id',$dataFromFd6Form->fd_one_form_id)
               ->where('fd_six_form_id',base64_encode($dataFromFd6Form->mainId))->latest()->first();
            $fd2OtherInfo = DB::table('fd2_form_other_infos')->where('fd2_form_id',$fd2FormList->id)->latest()->get();
            $prokolpoAreaList = DB::table('fd6_form_prokolpo_areas')->where('fd6_form_id',$dataFromFd6Form->mainId)->latest()->get();

            $checkParent = ParentNoteForFdsix::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)
            ->get();



        }elseif($status == 'fdSeven'){

            $dataFromFd3Form = 0;$dataFromFd6Form = 0;$ngoStatus=0;
            $ngoTypeData=0;$nVisaDocs=0;$dataFromNVisaFd9Fd1=0;
            $nVisabasicInfo=0;$forwardingLetterOnulipi=0;$editCheck1=0;
            $editCheck=0;$statusData=0;$nVisaWorkPlace=0;$nVisaSponSor=0;
            $nVisaForeignerInfo=0;$nVisaManPower=0;$nVisaEmploye=0;
            $nVisaCompensationAndBenifits=0;$nVisaAuthPerson=0;$mainIdR=0;
            $renewInfoData=0;$mainIdFdNineOne =0;$formOneData=0;
            $allDataForNewListAll=0;$formEghtData=0;$formMemberData=0;
            $formMemberDataDoc=0;$formNgoDataDoc=0;$usersInfo=0;
            $allSourceOfFund=0;$allPartiw=0;$allNameChangeDoc = 0;
            $getformOneId= 0;$durationListAll1 =0;$durationListAll1 = 0;
            $renewStatus = 0;$nameChangeStatus = 0;$rStatus = 0;
            $formMemberDataDocRenew =0;$getAllDataAdviser=0;$getAllDataOther=0;
            $getAllDataAdviserBank=0;$dataFromFc2Form=0;$dataFromFc1Form=0;

            $officeDetail = FdSevenOfficeSarok::where('parent_note_for_fd_seven_id',$id)->get();
            $fd_seven_status_id = DB::table('ngo_fd_seven_daks')
            ->where('id',$parentId)
            ->value('fd_seven_status_id');

            $dataFromFd7Form = DB::table('fd7_forms')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd7_forms.fd_one_form_id')
            ->select('fd_one_forms.*','fd7_forms.*','fd7_forms.id as mainId')
            ->where('fd7_forms.id',$fd_seven_status_id)
           ->orderBy('fd7_forms.id','desc')
           ->first();
           $get_email_from_user = DB::table('users')->where('id',$dataFromFd7Form->user_id)->value('email');
           $fd2FormList = DB::table('fd2_form_for_fd7_forms')->where('fd_one_form_id',$dataFromFd7Form->fd_one_form_id)
           ->where('fd7_form_id',$dataFromFd7Form->mainId)->latest()->first();
           $fd2OtherInfo = DB::table('fd2_fd7_other_infos')->where('fd2_form_for_fd7_form_id',$fd2FormList->id)->latest()->get();
           $prokolpoAreaList = DB::table('fd7_form_prokolpo_areas')->where('fd7_form_id',$dataFromFd7Form->mainId)->latest()->get();

           $checkParent = ParentNoteForFdSeven::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)
            ->get();



        }elseif($status == 'fcOne'){

            $dataFromFd3Form = 0;$dataFromFc2Form=0;$prokolpoAreaList=0;
            $dataFromFd6Form = 0;$dataFromFd7Form = 0;$ngoStatus=0;
            $ngoTypeData=0;$nVisaDocs=0;$dataFromNVisaFd9Fd1=0;
            $nVisabasicInfo=0;$forwardingLetterOnulipi=0;$editCheck1=0;
            $editCheck=0;$statusData=0;$nVisaWorkPlace=0;$nVisaSponSor=0;
            $nVisaForeignerInfo=0;$nVisaManPower=0;$nVisaEmploye=0;
            $nVisaCompensationAndBenifits=0;$nVisaAuthPerson=0;$mainIdR=0;
            $renewInfoData=0;$mainIdFdNineOne =0;$formOneData=0;
            $allDataForNewListAll=0;$formEghtData=0;$formMemberData=0;
            $formMemberDataDoc=0;$formNgoDataDoc=0;$usersInfo=0;
            $allSourceOfFund=0;$allPartiw=0;$allNameChangeDoc = 0;
            $getformOneId= 0;$durationListAll1 =0;$durationListAll1 = 0;
            $renewStatus = 0;$nameChangeStatus = 0;$rStatus = 0;
            $formMemberDataDocRenew =0;$getAllDataAdviser=0;$getAllDataOther=0;
            $getAllDataAdviserBank=0;


            $officeDetail = FcOneOfficeSarok::where('parent_note_for_fc_one_id',$id)->get();

            $fc_one_status_id = DB::table('fc_one_daks')
            ->where('id',$parentId)
            ->value('fc_one_status_id');

            $dataFromFc1Form = DB::table('fc1_forms')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fc1_forms.fd_one_form_id')
            ->select('fd_one_forms.*','fc1_forms.*','fc1_forms.id as mainId')
            ->where('fc1_forms.id',$fc_one_status_id)
            ->orderBy('fc1_forms.id','desc')
            ->first();

           $get_email_from_user = DB::table('users')->where('id',$dataFromFc1Form->user_id)->value('email');
           $fd2FormList = DB::table('fd2_form_for_fc1_forms')->where('fd_one_form_id',$dataFromFc1Form->fd_one_form_id)
           ->where('fc1_form_id',$dataFromFc1Form->mainId)->latest()->first();
           $fd2OtherInfo = DB::table('fd2_fc1_other_infos')->where('fd2_form_for_fc1_form_id',$fd2FormList->id)->latest()->get();

           $checkParent = ParentNoteForFcOne::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)
            ->get();




        }elseif($status == 'fcTwo'){

            $dataFromFd3Form = 0;$dataFromFc1Form =0;$prokolpoAreaList=0;
            $dataFromFd6Form = 0;$dataFromFd7Form = 0;$ngoStatus=0;
            $ngoTypeData=0;$nVisaDocs=0;$dataFromNVisaFd9Fd1=0;
            $nVisabasicInfo=0;$forwardingLetterOnulipi=0;$editCheck1=0;
            $editCheck=0;$statusData=0;$nVisaWorkPlace=0;$nVisaSponSor=0;
            $nVisaForeignerInfo=0;$nVisaManPower=0;$nVisaEmploye=0;
            $nVisaCompensationAndBenifits=0;$nVisaAuthPerson=0;$mainIdR=0;
            $renewInfoData=0;$mainIdFdNineOne =0;$formOneData=0;
            $allDataForNewListAll=0;$formEghtData=0; $formMemberData=0;
            $formMemberDataDoc=0;$formNgoDataDoc=0;$usersInfo=0;$allSourceOfFund=0;
            $allPartiw=0;$allNameChangeDoc = 0;$getformOneId= 0;$durationListAll1 =0;
            $durationListAll1 = 0;$renewStatus = 0;$nameChangeStatus = 0;
            $rStatus = 0;$formMemberDataDocRenew =0;$getAllDataAdviser=0;
            $getAllDataOther=0;$getAllDataAdviserBank=0;


            $officeDetail = FcTwoOfficeSarok::where('parent_note_for_fc_two_id',$id)->get();


            $fc_two_status_id = DB::table('fc_two_daks')
            ->where('id',$parentId)
            ->value('fc_two_status_id');

            $dataFromFc2Form = DB::table('fc2_forms')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fc2_forms.fd_one_form_id')
            ->select('fd_one_forms.*','fc2_forms.*','fc2_forms.id as mainId')
            ->where('fc2_forms.id',$fc_two_status_id)
            ->orderBy('fc2_forms.id','desc')
            ->first();

           $get_email_from_user = DB::table('users')->where('id',$dataFromFc2Form->user_id)->value('email');
           $fd2FormList = DB::table('fd2_form_for_fc2_forms')->where('fd_one_form_id',$dataFromFc2Form->fd_one_form_id)
           ->where('fc2_form_id',$dataFromFc2Form->mainId)->latest()->first();
           $fd2OtherInfo = DB::table('fd2_fc2_other_infos')->where('fd2_form_for_fc2_form_id',$fd2FormList->id)->latest()->get();

            $checkParent = ParentNoteForFcTwo::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)
            ->get();

        }elseif($status == 'fdThree'){

            $dataFromFc2Form =0;$dataFromFc1Form =0;$prokolpoAreaList=0;
            $dataFromFd6Form = 0;$dataFromFd7Form = 0;$ngoStatus=0;
            $ngoTypeData=0;$nVisaDocs=0;$dataFromNVisaFd9Fd1=0;
            $nVisabasicInfo=0;$forwardingLetterOnulipi=0;$editCheck1=0;
            $editCheck=0;$statusData=0;$nVisaWorkPlace=0;$nVisaSponSor=0;
            $nVisaForeignerInfo=0;$nVisaManPower=0;$nVisaEmploye=0;
            $nVisaCompensationAndBenifits=0;$nVisaAuthPerson=0;$mainIdR=0;
            $renewInfoData=0;$mainIdFdNineOne =0;$formOneData=0;
            $allDataForNewListAll=0; $formEghtData=0;$formMemberData=0;
            $formMemberDataDoc=0;$formNgoDataDoc=0;$usersInfo=0;
            $allSourceOfFund=0;$allPartiw=0;$allNameChangeDoc = 0;
            $getformOneId= 0;$durationListAll1 =0;$durationListAll1 = 0;
            $renewStatus = 0;$nameChangeStatus = 0;$rStatus = 0;
            $formMemberDataDocRenew =0;$getAllDataAdviser=0;
            $getAllDataOther=0;$getAllDataAdviserBank=0;

            $officeDetail = FdThreeOfficeSarok::where('parent_note_for_fd_three_id',$id)->get();

            $fd_three_status_id = DB::table('fd_three_daks')
            ->where('id',$parentId)
            ->value('fd_three_status_id');

            $dataFromFd3Form = DB::table('fd3_forms')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd3_forms.fd_one_form_id')
            ->select('fd_one_forms.*','fd3_forms.*','fd3_forms.id as mainId')
            ->where('fd3_forms.id',$fd_three_status_id)
            ->orderBy('fd3_forms.id','desc')
            ->first();

            $get_email_from_user = DB::table('users')->where('id',$dataFromFd3Form->user_id)->value('email');
            $fd2FormList = DB::table('fd2_form_for_fd3_forms')->where('fd_one_form_id',$dataFromFd3Form->fd_one_form_id)
           ->where('fd3_form_id',$dataFromFd3Form->mainId)->latest()->first();
            $fd2OtherInfo = DB::table('fd2_fd3_other_infos')->where('fd2_form_for_fd3_form_id',$fd2FormList->id)->latest()->get();

            $checkParent = ParentNoteForFdThree::where('nothi_detail_id',$parentId)
            ->where('serial_number',$nothiId)
            ->get();


        }


        $nothiNumber = NothiList::where('id',$nothiId)->value('main_sarok_number');
        $nothiYear = NothiList::where('id',$nothiId)->value('document_year');
        $user = Admin::where('id','!=',1)->get();
        $nothiPropokListUpdate = NothiPrapok::where('nothiId',$nothiId)
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

        $checkParentFirst = DB::table('parent_note_for_registrations')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
        $childNoteNewList = DB::table('child_note_for_registrations')->where('parent_note_regid',$id)->get();
        $childNoteNewListValue = DB::table('child_note_for_registrations')->where('parent_note_regid',$id)->orderBy('id','desc')->value('id');

        }elseif($status == 'renew'){

        $checkParentFirst = DB::table('parent_note_for_renews')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
        $childNoteNewList = DB::table('child_note_for_renews')->where('parent_note_for_renew_id',$id)->get();
        $childNoteNewListValue = DB::table('child_note_for_renews')->where('parent_note_for_renew_id',$id)->orderBy('id','desc')->value('id');

       }elseif($status == 'nameChange'){

        $checkParentFirst = DB::table('parent_note_for_name_changes')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
        $childNoteNewList = DB::table('child_note_for_name_changes')->where('parentnote_name_change_id',$id)->get();
        $childNoteNewListValue = DB::table('child_note_for_name_changes')->where('parentnote_name_change_id',$id)->orderBy('id','desc')->value('id');

       }elseif($status == 'fdNine'){

        $checkParentFirst = DB::table('parent_note_for_fd_nines')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
        $childNoteNewList = DB::table('child_note_for_fd_nines')->where('p_note_for_fd_nine_id',$id)->get();
        $childNoteNewListValue = DB::table('child_note_for_fd_nines')->where('p_note_for_fd_nine_id',$id)->orderBy('id','desc')->value('id');

       }elseif($status == 'fdNineOne'){

        $checkParentFirst = DB::table('parent_note_for_fd_nine_ones')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
        $childNoteNewList = DB::table('child_note_for_fd_nine_ones')->where('p_note_for_fd_nine_one_id',$id)->get();
        $childNoteNewListValue = DB::table('child_note_for_fd_nine_ones')->where('p_note_for_fd_nine_one_id',$id)->orderBy('id','desc')->value('id');

       }elseif($status == 'fdSix'){

        $checkParentFirst = DB::table('parent_note_for_fdsixes')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
        $childNoteNewList = DB::table('child_note_for_fd_sixes')->where('parent_note_for_fdsix_id',$id)->get();
        $childNoteNewListValue = DB::table('child_note_for_fd_sixes')->where('parent_note_for_fdsix_id',$id)->orderBy('id','desc')->value('id');

      }elseif($status == 'fdSeven'){

        $checkParentFirst = DB::table('parent_note_for_fd_sevens')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
        $childNoteNewList = DB::table('child_note_for_fd_sevens')->where('parent_note_for_fd_seven_id',$id)->get();
        $childNoteNewListValue = DB::table('child_note_for_fd_sevens')->where('parent_note_for_fd_seven_id',$id)->orderBy('id','desc')->value('id');

      }elseif($status == 'fcOne'){

        $checkParentFirst = DB::table('parent_note_for_fc_ones')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
        $childNoteNewList = DB::table('child_note_for_fc_ones')->where('parent_note_for_fc_one_id',$id)->get();
        $childNoteNewListValue = DB::table('child_note_for_fc_ones')->where('parent_note_for_fc_one_id',$id)->orderBy('id','desc')->value('id');

      }elseif($status == 'fcTwo'){

        $checkParentFirst = DB::table('parent_note_for_fc_twos')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
        $childNoteNewList = DB::table('child_note_for_fc_twos')->where('parent_note_for_fc_two_id',$id)->get();
        $childNoteNewListValue = DB::table('child_note_for_fc_twos')->where('parent_note_for_fc_two_id',$id)->orderBy('id','desc')->value('id');

      }elseif($status == 'fdThree'){

        $checkParentFirst = DB::table('parent_note_for_fd_threes')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
        $childNoteNewList = DB::table('child_note_for_fd_threes')->where('parent_note_for_fd_three_id',$id)->get();
        $childNoteNewListValue = DB::table('child_note_for_fd_threes')->where('parent_note_for_fd_three_id',$id)->orderBy('id','desc')->value('id');

    }

        return view('admin.presentDocument.addChildNote',compact(

            'get_email_from_user',
            'dataFromFd6Form',
            'fd2FormList',
            'fd2OtherInfo',
            'prokolpoAreaList',
            'dataFromFd7Form',
            'dataFromFc1Form',
            'dataFromFc2Form',
            'dataFromFd3Form',
            'mainIdFdNineOne',
            'nVisabasicInfo',
            'forwardingLetterOnulipi',
            'editCheck1',
            'editCheck',
            'statusData',
            'ngoStatus',
            'nVisaWorkPlace',
            'nVisaSponSor',
            'nVisaForeignerInfo',
            'nVisaManPower',
            'nVisaEmploye',
            'nVisaCompensationAndBenifits',
            'nVisaAuthPerson',
            'nVisaDocs',
            'dataFromNVisaFd9Fd1',
            'allNameChangeDoc',
            'getformOneId',
            'durationListAll1',
            'durationListAll1',
            'rStatus',
            'ngoTypeData',
            'renewInfoData',
            'mainIdR',
            'renewStatus',
            'nameChangeStatus',
            'formMemberDataDocRenew',
            'getAllDataAdviser',
            'getAllDataOther',
            'getAllDataAdviserBank',
            'allPartiw',
            'allSourceOfFund',
            'usersInfo',
            'formNgoDataDoc',
            'formMemberDataDoc',
            'formMemberData',
            'formEghtData',
            'allDataForNewListAll',
            'formOneData',
            'childNoteNewListValue',
            'childNoteNewList',
            'checkParentFirst',
            'nothiYear',
            'branchListForSerial',
            'permissionNothiList',
            'nothiCopyListUpdate',
            'nothiAttractListUpdate',
            'nothiPropokListUpdate',
            'user',
            'nothiId',
            'nothiNumber',
            'officeDetail',
            'checkParent',
            'status',
            'id',
            'parentId',
            'activeCode'
        ));
    }


    public function viewChildNote($status,$parentId,$nothiId,$id,$activeCode){


        if($status == 'registration'){

             $mainIdR = '';$fdOneFormId = '';$renewInfoData = '';
             $dataFromFd3Form = 0;$dataFromNVisaFd9Fd1='';$allNameChangeDoc = '';
             $getformOneId='';$nVisaDocs='';$ngoStatus='';
             $get_email_from_user=0;$mainIdFdNineOne=0;$nVisabasicInfo=0;
             $forwardingLetterOnulipi=0;$editCheck1=0;$editCheck=0;$statusData=0;
             $nVisaWorkPlace=0;$nVisaSponSor=0;$nVisaForeignerInfo=0;
             $nVisaManPower=0;$nVisaEmploye=0;$nVisaCompensationAndBenifits=0;
             $nVisaAuthPerson=0;$dataFromFc1Form=0;$dataFromFd6Form =0;
             $fd2FormList=0;$fd2OtherInfo=0;$prokolpoAreaList=0;
             $dataFromFd7Form=0;$dataFromFc2Form=0;

            $officeDetail = RegistrationOfficeSarok::where('parent_note_regid',$id)->get();
            $checkParent = ParentNoteForRegistration::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)->get();

            $registration_status_id = DB::table('ngo_registration_daks')
              ->where('id',$parentId)->value('registration_status_id');

            $fdOneIdForNothi = DB::table('ngo_statuses')->where('id',$registration_status_id)->value('fd_one_form_id');
            $rStatus = DB::table('ngo_statuses')->where('fd_one_form_id',$fdOneIdForNothi)->value('status');
            $nameChangeStatus = DB::table('ngo_name_changes')->where('fd_one_form_id',$fdOneIdForNothi)->value('status');
            $renewStatus = DB::table('ngo_renews')->where('fd_one_form_id',$fdOneIdForNothi)->value('status');
            $allDataForNewListAll = DB::table('ngo_statuses')->where('fd_one_form_id',$fdOneIdForNothi)->first();
            $formOneData = DB::table('fd_one_forms')->where('id',$fdOneIdForNothi)->first();
            $ngoTypeData = DB::table('ngo_type_and_languages')->where('user_id',$formOneData->user_id)->first();
            $signDataNew = DB::table('form_eights')->where('fd_one_form_id',$fdOneIdForNothi)->first();
            $formEghtData = DB::table('form_eights')->where('fd_one_form_id',$fdOneIdForNothi)->get();
            $formMemberData = DB::table('ngo_member_lists')->where('fd_one_form_id',$fdOneIdForNothi)->get();
            $formMemberDataDocRenew = DB::table('ngo_renew_infos')->where('fd_one_form_id',$fdOneIdForNothi)->get();
            $durationListAll1 = DB::table('ngo_durations')->where('fd_one_form_id',$fdOneIdForNothi)->value('ngo_duration_end_date');
            $durationListAll1 = DB::table('ngo_durations')->where('fd_one_form_id',$fdOneIdForNothi)->value('ngo_duration_start_date');
            $formMemberDataDoc = DB::table('ngo_member_nid_photos')->where('fd_one_form_id',$fdOneIdForNothi)->get();
            $formNgoDataDoc = DB::table('ngo_other_docs')->where('fd_one_form_id',$fdOneIdForNothi)->get();
            $usersInfo = DB::table('users')->where('id',$formOneData->user_id)->first();
            $allSourceOfFund = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$formOneData->id)->get();
            $allPartiw = DB::table('fd_one_member_lists')->where('fd_one_form_id',$formOneData->id)->get();
            $getAllDataAdviserBank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$formOneData->id)->first();
            $getAllDataOther= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$formOneData->id)->get();
            $getAllDataAdviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$formOneData->id)->get();

        }elseif($status == 'renew'){

            $dataFromFd3Form = 0;$allNameChangeDoc = '';$getformOneId='';
            $ngoTypeData = '';$dataFromNVisaFd9Fd1='';$nVisaDocs='';
            $ngoStatus='';$get_email_from_user=0;$mainIdFdNineOne=0;
            $nVisabasicInfo=0;$forwardingLetterOnulipi=0;$editCheck1=0;
            $editCheck=0;$statusData=0;$nVisaWorkPlace=0;
            $nVisaSponSor=0;$nVisaForeignerInfo=0;$nVisaManPower=0;
            $nVisaEmploye=0;$nVisaCompensationAndBenifits=0;$nVisaAuthPerson=0;
            $dataFromFc1Form=0;$dataFromFd6Form =0;$fd2FormList=0;
            $fd2OtherInfo=0;$prokolpoAreaList=0;$dataFromFd7Form=0;$dataFromFc2Form=0;

            $officeDetail = RenewOfficeSarok::where('parent_note_for_renew_id',$id)->get();
            $checkParent = ParentNoteForRenew::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)->get();

            $renew_status_id = DB::table('ngo_renew_daks')
            ->where('id',$parentId)->value('renew_status_id');

            $mainIdR = DB::table('ngo_renews')->where('id',$renew_status_id)->first();
            $fdOneFormId = DB::table('ngo_renews')->where('id',$renew_status_id)->first();
            $formOneData = DB::table('fd_one_forms')->where('id',$fdOneFormId->fd_one_form_id)->first();
            $rStatus = DB::table('ngo_renews')->where('fd_one_form_id',$formOneData->id)->value('status');
            $nameChangeStatus = DB::table('ngo_name_changes')->where('fd_one_form_id',$formOneData->id)->value('status');
            $renewStatus = DB::table('ngo_renews')->where('id',$id)->value('status');
            $allDataForNewListAll = DB::table('ngo_renews')->where('fd_one_form_id',$formOneData->id)->first();
            $formEghtData = DB::table('form_eights')->where('fd_one_form_id',$formOneData->id)->get();
            $formMemberData = DB::table('ngo_member_lists')->where('fd_one_form_id',$formOneData->id)->get();
            $renewInfoData = DB::table('ngo_renew_infos')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->first();
            $formMemberDataDocRenew = DB::table('ngo_renew_infos')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->get();
            $durationListAll1 = DB::table('ngo_durations')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->value('ngo_duration_end_date');
            $durationListAll1 = DB::table('ngo_durations')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->value('ngo_duration_start_date');
            $formMemberDataDoc = DB::table('ngo_member_nid_photos')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->get();
            $formNgoDataDoc = DB::table('ngo_other_docs')->where('fd_one_form_id',$fdOneFormId->fd_one_form_id)->get();
            $usersInfo = DB::table('users')->where('id',$formOneData->user_id)->first();
            $allSourceOfFund = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$formOneData->id)->get();
            $allPartiw = DB::table('fd_one_member_lists')->where('fd_one_form_id',$formOneData->id)->get();
            $getAllDataAdviserBank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$formOneData->id)->first();
            $getAllDataOther= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$formOneData->id)->get();
            $getAllDataAdviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$formOneData->id) ->get();


        }elseif($status == 'nameChange'){

            $dataFromFd3Form = 0;$renewInfoData='';$ngoTypeData = '';
            $mainIdR ='';$dataFromNVisaFd9Fd1='';$nVisaDocs='';
            $ngoStatus='';$get_email_from_user=0;$mainIdFdNineOne=0;
            $nVisabasicInfo=0;$forwardingLetterOnulipi=0;$editCheck1=0;
            $editCheck=0;$statusData=0;$nVisaWorkPlace=0;$nVisaSponSor=0;
            $nVisaForeignerInfo=0;$nVisaManPower=0;$nVisaEmploye=0;
            $nVisaCompensationAndBenifits=0;$nVisaAuthPerson=0;$dataFromFd6Form =0;
            $fd2FormList=0;$fd2OtherInfo=0;$prokolpoAreaList=0;$dataFromFc1Form=0;
            $dataFromFc2Form=0;$dataFromFd7Form=0;

            $name_change_status_id = DB::table('ngo_name_change_daks')
            ->where('id',$parentId)
            ->value('name_change_status_id');


           $allNameChangeDoc = DB::table('name_change_docs')->where('ngo_name_change_id',$name_change_status_id)->get();
           $getformOneId = DB::table('ngo_name_changes')->where('id',$name_change_status_id)->first();
           $formOneData = DB::table('fd_one_forms')->where('id',$getformOneId->fd_one_form_id)->first();
           $rStatus = DB::table('ngo_statuses')->where('fd_one_form_id',$formOneData->id)->value('status');
           $nameChangeStatus = DB::table('ngo_name_changes')->where('id',$name_change_status_id)->value('status');
           $renewStatus = DB::table('ngo_renews')->where('fd_one_form_id',$formOneData->id)->value('status');
           $checkOldorNew = DB::table('ngo_type_and_languages')->where('user_id',$formOneData->user_id)->value('ngo_type_new_old');

          if($checkOldorNew == 'Old'){

            $allDataForNewListAll = DB::table('ngo_renews')->where('fd_one_form_id',$formOneData->id)->first();
           }else{

            $allDataForNewListAll = DB::table('ngo_statuses')->where('fd_one_form_id',$formOneData->id)->first();
           }

              $formEghtData = DB::table('form_eights')->where('fd_one_form_id',$formOneData->id)->get();
              $formMemberData = DB::table('ngo_member_lists')->where('fd_one_form_id',$formOneData->id)->get();
              $formMemberDataDocRenew = DB::table('ngo_renew_infos')->where('fd_one_form_id',$formOneData->id)->get();
              $durationListAll1 = DB::table('ngo_durations')->where('fd_one_form_id',$formOneData->id)->value('ngo_duration_end_date');
              $durationListAll1 = DB::table('ngo_durations')->where('fd_one_form_id',$formOneData->id)->value('ngo_duration_start_date');
              $formMemberDataDoc = DB::table('ngo_member_nid_photos')->where('fd_one_form_id',$formOneData->id)->get();
              $formNgoDataDoc = DB::table('ngo_other_docs')->where('fd_one_form_id',$formOneData->id)->get();
              $usersInfo = DB::table('users')->where('id',$formOneData->user_id)->first();
              $allSourceOfFund = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$formOneData->id)->get();
              $allPartiw = DB::table('fd_one_member_lists')->where('fd_one_form_id',$formOneData->id)->get();
              $getAllDataAdviserBank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$formOneData->id)->first();
              $getAllDataOther= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$formOneData->id)->get();
              $getAllDataAdviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$formOneData->id)->get();

              $officeDetail = NameChangeOfficeSarok::where('parentnote_name_change_id',$id)->get();
              $checkParent = ParentNoteForNameChange::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)->get();



        }elseif($status == 'fdNine'){

            $dataFromFd3Form = 0;$get_email_from_user=0;$mainIdFdNineOne=0;
            $nVisabasicInfo=0;$forwardingLetterOnulipi=0;$editCheck1=0;
            $editCheck=0;$statusData=0;$nVisaWorkPlace=0;$nVisaSponSor=0;
            $nVisaForeignerInfo=0;$nVisaManPower=0;$nVisaEmploye=0;
            $nVisaCompensationAndBenifits=0;$nVisaAuthPerson=0;$mainIdR=0;
            $renewInfoData=0;$formOneData=0;$allDataForNewListAll=0;
            $formEghtData=0;$formMemberData=0;$formMemberDataDoc=0;
            $formNgoDataDoc=0;$usersInfo=0;$allSourceOfFund=0;$allPartiw=0;
            $allNameChangeDoc = 0;$getformOneId= 0;$durationListAll1 =0;
            $durationListAll1 = 0;$renewStatus = 0;$nameChangeStatus = 0;
            $rStatus = 0;$formMemberDataDocRenew =0;$getAllDataAdviser=0;
            $getAllDataOther=0;$getAllDataAdviserBank=0;$dataFromFd6Form =0;
            $fd2FormList=0;$fd2OtherInfo=0;$prokolpoAreaList=0;$dataFromFd7Form=0;
            $dataFromFc1Form=0;$dataFromFc2Form=0;


            $fd_nine_status_id = DB::table('ngo_f_d_nine_daks')
               ->where('id',$parentId)->value('f_d_nine_status_id');

            $dataFromNVisaFd9Fd1 = DB::table('fd9_forms')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd9_forms.fd_one_form_id')
            ->select('fd_one_forms.*','fd9_forms.*')
            ->where('fd9_forms.id',$fd_nine_status_id)
            ->first();

            $ngoTypeData = DB::table('ngo_type_and_languages')
            ->where('user_id',$dataFromNVisaFd9Fd1->user_id)->first();
            $checkOldorNew = DB::table('ngo_type_and_languages')
            ->where('user_id',$dataFromNVisaFd9Fd1->user_id)->value('ngo_type_new_old');

            if($checkOldorNew == 'Old'){

                $ngoStatus = DB::table('ngo_renews')->where('fd_one_form_id',$dataFromNVisaFd9Fd1->fd_one_form_id)->first();
            }else{

                $ngoStatus = DB::table('ngo_statuses')->where('fd_one_form_id',$dataFromNVisaFd9Fd1->fd_one_form_id)->first();
            }


            $nVisaDocs = DB::table('n_visa_necessary_document_for_work_permits')->where('n_visa_id',$dataFromNVisaFd9Fd1->id)->first();

            $officeDetail = FdNineOfficeSarok::where('p_note_for_fd_nine_id',$id)->get();
            $checkParent = ParentNoteForFdNine::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)->get();

        }elseif($status == 'fdNineOne'){

            $dataFromFd3Form = 0;$dataFromFd6Form =0;$fd2FormList=0;
            $fd2OtherInfo=0;$prokolpoAreaList=0;$mainIdR=0;
            $renewInfoData=0;$dataFromFd7Form=0;$formOneData=0;
            $allDataForNewListAll=0;$formEghtData=0;$formMemberData=0;
            $formMemberDataDoc=0;$formNgoDataDoc=0;$usersInfo=0;
            $allSourceOfFund=0;$allPartiw=0;$allNameChangeDoc = 0;
            $getformOneId= 0;$durationListAll1 =0;$durationListAll1 = 0;
            $renewStatus = 0;$nameChangeStatus = 0;$rStatus = 0;
            $formMemberDataDocRenew =0;$getAllDataAdviser=0;
            $getAllDataOther=0;$getAllDataAdviserBank=0;
            $dataFromFc1Form=0;$dataFromFc2Form=0;

            $fd_nine_one_status_id = DB::table('ngo_f_d_nine_one_daks')
                    ->where('id',$parentId)
                    ->value('f_d_nine_one_status_id');
            $mainIdFdNineOne = $fd_nine_one_status_id;

            $dataFromNVisaFd9Fd1 = DB::table('fd9_one_forms')
            ->join('fd_one_forms', 'fd9_one_forms.fd_one_form_id', '=', 'fd_one_forms.id')
            ->select('fd_one_forms.*','fd9_one_forms.*','fd9_one_forms.id as mainId','fd9_one_forms.chief_name as chiefName','fd9_one_forms.chief_desi as chiefDesi','fd9_one_forms.digital_signature as chiefSign','fd9_one_forms.digital_seal as chiefSeal','fd9_one_forms.created_at as chiefDate')
            ->orderBy('fd9_one_forms.id','desc')
            ->where('fd9_one_forms.id',$fd_nine_one_status_id)
            ->first();

            $get_email_from_user = DB::table('users')->where('id',$dataFromNVisaFd9Fd1->user_id)->value('email');
            $forwardId =  DB::table('forwarding_letters')->where('fd9_form_id',$dataFromNVisaFd9Fd1->mainId)->orderBy('id','desc')->value('id');
            $forwardingLetterOnulipi = DB::table('forwarding_letter_onulipis')->where('forwarding_letter_id',$forwardId)->get();
            $editCheck = DB::table('fd9_forwarding_letter_edits')->where('forwarding_letter_id',$forwardId)->orderBy('id','desc')->value('pdf_part_one');
            $editCheck1 = DB::table('fd9_forwarding_letter_edits')->where('forwarding_letter_id',$forwardId)->orderBy('id','desc')->value('pdf_part_two');
            $ngoTypeData = DB::table('ngo_type_and_languages')->where('user_id',$dataFromNVisaFd9Fd1->user_id)->first();

            if($ngoTypeData->ngo_type_new_old == 'Old'){

                $ngoStatus = DB::table('ngo_renews')->where('fd_one_form_id',$dataFromNVisaFd9Fd1->fd_one_form_id)->first();

                }else{

                $ngoStatus = DB::table('ngo_statuses')->where('fd_one_form_id',$dataFromNVisaFd9Fd1->fd_one_form_id)->first();

            }

            $nVisabasicInfo = DB::table('n_visas')->where('fd9_one_form_id',$dataFromNVisaFd9Fd1->mainId)->first();
            $statusData = DB::table('secruity_checks')->where('n_visa_id',$nVisabasicInfo->id)->value('created_at');
            $nVisaAuthPerson = DB::table('n_visa_authorized_personal_of_the_orgs')->where('n_visa_id',$nVisabasicInfo->id)->first();
            $nVisaCompensationAndBenifits = DB::table('n_visa_compensation_and_benifits')->where('n_visa_id',$nVisabasicInfo->id)->get();
            $nVisaEmploye = DB::table('n_visa_employment_information')->where('n_visa_id',$nVisabasicInfo->id)->first();
            $nVisaManPower = DB::table('n_visa_manpower_of_the_offices')->where('n_visa_id',$nVisabasicInfo->id)->first();
            $nVisaDocs = DB::table('n_visa_necessary_document_for_work_permits')->where('n_visa_id',$nVisabasicInfo->id)->first();
            $nVisaForeignerInfo = DB::table('n_visa_particulars_of_foreign_incumbnets')->where('n_visa_id',$nVisabasicInfo->id)->first();
            $nVisaSponSor = DB::table('n_visa_particular_of_sponsor_or_employers')->where('n_visa_id',$nVisabasicInfo->id)->first();
            $nVisaWorkPlace = DB::table('n_visa_work_place_addresses')->where('n_visa_id',$nVisabasicInfo->id)->first();

            $officeDetail = FdNineOneOfficeSarok::where('p_note_for_fd_nine_one_id',$id)->get();
            $checkParent = ParentNoteForFdNineOne::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)
                    ->get();

        }elseif($status == 'fdSix'){

            $dataFromFd3Form = 0;$dataFromFd7Form=0;$ngoStatus=0;
            $ngoTypeData=0;$nVisaDocs=0;$dataFromNVisaFd9Fd1=0;
            $nVisabasicInfo=0;$forwardingLetterOnulipi=0;$editCheck1=0;
            $editCheck=0;$statusData=0;$nVisaWorkPlace=0;$nVisaSponSor=0;
            $nVisaForeignerInfo=0;$nVisaManPower=0;$nVisaEmploye=0;
            $nVisaCompensationAndBenifits=0;$nVisaAuthPerson=0;
            $mainIdR=0;$renewInfoData=0;$mainIdFdNineOne =0;$dataFromFc2Form=0;
            $formOneData=0;$allDataForNewListAll=0;$formEghtData=0;
            $formMemberData=0;$formMemberDataDoc=0;$formNgoDataDoc=0;
            $usersInfo=0; $allSourceOfFund=0;$allPartiw=0;
            $allNameChangeDoc = 0;$getformOneId= 0;$durationListAll1 =0;
            $durationListAll1 = 0;$renewStatus = 0;$nameChangeStatus = 0;
            $rStatus = 0;$formMemberDataDocRenew =0;$getAllDataAdviser=0;
            $getAllDataOther=0;$getAllDataAdviserBank=0;$dataFromFc1Form=0;

            $fd_six_status_id = DB::table('ngo_fd_six_daks')->where('id',$parentId)->value('fd_six_status_id');

            $dataFromFd6Form = DB::table('fd6_forms')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd6_forms.fd_one_form_id')
            ->select('fd_one_forms.*','fd6_forms.*','fd6_forms.id as mainId')
            ->where('fd6_forms.id',$fd_six_status_id)
            ->orderBy('fd6_forms.id','desc')
            ->first();

            $get_email_from_user = DB::table('users')->where('id',$dataFromFd6Form->user_id)->value('email');
            $fd2FormList = DB::table('fd2_forms')->where('fd_one_form_id',$dataFromFd6Form->fd_one_form_id)
               ->where('fd_six_form_id',base64_encode($dataFromFd6Form->mainId))->latest()->first();
            $fd2OtherInfo = DB::table('fd2_form_other_infos')->where('fd2_form_id',$fd2FormList->id)->latest()->get();
            $prokolpoAreaList = DB::table('fd6_form_prokolpo_areas')->where('fd6_form_id',$dataFromFd6Form->mainId)->latest()->get();

            $officeDetail = FdSixOfficeSarok::where('parent_note_for_fdsix_id',$id)->get();
            $checkParent = ParentNoteForFdsix::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)
                    ->get();

        }elseif($status == 'fdSeven'){


            $dataFromFd3Form = 0;$dataFromFd6Form = 0;$ngoStatus=0;
            $ngoTypeData=0;$nVisaDocs=0;$dataFromNVisaFd9Fd1=0;
            $nVisabasicInfo=0;$forwardingLetterOnulipi=0;$editCheck1=0;
            $editCheck=0;$statusData=0;$nVisaWorkPlace=0;$nVisaSponSor=0;
            $nVisaForeignerInfo=0;$nVisaManPower=0;$nVisaEmploye=0;
            $nVisaCompensationAndBenifits=0;$nVisaAuthPerson=0;$mainIdR=0;
            $renewInfoData=0;$mainIdFdNineOne =0;$formOneData=0;
            $allDataForNewListAll=0;$formEghtData=0;$formMemberData=0;
            $formMemberDataDoc=0;$formNgoDataDoc=0;$usersInfo=0;
            $allSourceOfFund=0;$allPartiw=0;$allNameChangeDoc = 0;
            $getformOneId= 0;$durationListAll1 =0;$durationListAll1 = 0;
            $renewStatus = 0;$nameChangeStatus = 0;$rStatus = 0;
            $formMemberDataDocRenew =0;$getAllDataAdviser=0;$getAllDataOther=0;
            $getAllDataAdviserBank=0;$dataFromFc2Form=0;$dataFromFc1Form=0;

            $fd_seven_status_id = DB::table('ngo_fd_seven_daks')
            ->where('id',$parentId)
            ->value('fd_seven_status_id');

            $dataFromFd7Form = DB::table('fd7_forms')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd7_forms.fd_one_form_id')
            ->select('fd_one_forms.*','fd7_forms.*','fd7_forms.id as mainId')
            ->where('fd7_forms.id',$fd_seven_status_id)
            ->orderBy('fd7_forms.id','desc')
            ->first();


           $get_email_from_user = DB::table('users')->where('id',$dataFromFd7Form->user_id)->value('email');
           $fd2FormList = DB::table('fd2_form_for_fd7_forms')->where('fd_one_form_id',$dataFromFd7Form->fd_one_form_id)
                                       ->where('fd7_form_id',$dataFromFd7Form->mainId)->latest()->first();
           $fd2OtherInfo = DB::table('fd2_fd7_other_infos')->where('fd2_form_for_fd7_form_id',$fd2FormList->id)->latest()->get();
           $prokolpoAreaList = DB::table('fd7_form_prokolpo_areas')->where('fd7_form_id',$dataFromFd7Form->mainId)->latest()->get();

           $officeDetail = FdSevenOfficeSarok::where('parent_note_for_fd_seven_id',$id)->get();
           $checkParent = ParentNoteForFdSeven::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)
                    ->get();

        }elseif($status == 'fcOne'){


            $dataFromFd3Form = 0;$dataFromFc2Form=0;$prokolpoAreaList=0;
            $dataFromFd6Form = 0;$dataFromFd7Form = 0;$ngoStatus=0;
            $ngoTypeData=0;$nVisaDocs=0;$dataFromNVisaFd9Fd1=0;
            $nVisabasicInfo=0;$forwardingLetterOnulipi=0;$editCheck1=0;
            $editCheck=0;$statusData=0;$nVisaWorkPlace=0;$nVisaSponSor=0;
            $nVisaForeignerInfo=0;$nVisaManPower=0;$nVisaEmploye=0;
            $nVisaCompensationAndBenifits=0;$nVisaAuthPerson=0;$mainIdR=0;
            $renewInfoData=0;$mainIdFdNineOne =0;$formOneData=0;
            $allDataForNewListAll=0;$formEghtData=0;$formMemberData=0;
            $formMemberDataDoc=0;$formNgoDataDoc=0;$usersInfo=0;
            $allSourceOfFund=0;$allPartiw=0;$allNameChangeDoc = 0;
            $getformOneId= 0;$durationListAll1 =0;$durationListAll1 = 0;
            $renewStatus = 0;$nameChangeStatus = 0;$rStatus = 0;
            $formMemberDataDocRenew =0;$getAllDataAdviser=0;$getAllDataOther=0;
            $getAllDataAdviserBank=0;


            $fc_one_status_id = DB::table('fc_one_daks')
            ->where('id',$parentId)
            ->value('fc_one_status_id');

            $dataFromFc1Form = DB::table('fc1_forms')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fc1_forms.fd_one_form_id')
            ->select('fd_one_forms.*','fc1_forms.*','fc1_forms.id as mainId')
            ->where('fc1_forms.id',$fc_one_status_id)
            ->orderBy('fc1_forms.id','desc')
            ->first();


            $get_email_from_user = DB::table('users')->where('id',$dataFromFc1Form->user_id)->value('email');
            $fd2FormList = DB::table('fd2_form_for_fc1_forms')->where('fd_one_form_id',$dataFromFc1Form->fd_one_form_id)
           ->where('fc1_form_id',$dataFromFc1Form->mainId)->latest()->first();
            $fd2OtherInfo = DB::table('fd2_fc1_other_infos')->where('fd2_form_for_fc1_form_id',$fd2FormList->id)->latest()->get();

            $officeDetail = FcOneOfficeSarok::where('parent_note_for_fc_one_id',$id)->get();
            $checkParent = ParentNoteForFcOne::where('nothi_detail_id',$parentId)->get();


        }elseif($status == 'fcTwo'){

            $dataFromFd3Form = 0;$dataFromFc1Form =0;$prokolpoAreaList=0;
            $dataFromFd6Form = 0;$dataFromFd7Form = 0;$ngoStatus=0;
            $ngoTypeData=0;$nVisaDocs=0;$dataFromNVisaFd9Fd1=0;
            $nVisabasicInfo=0;$forwardingLetterOnulipi=0;$editCheck1=0;
            $editCheck=0;$statusData=0;$nVisaWorkPlace=0;$nVisaSponSor=0;
            $nVisaForeignerInfo=0;$nVisaManPower=0;$nVisaEmploye=0;
            $nVisaCompensationAndBenifits=0;$nVisaAuthPerson=0;$mainIdR=0;
            $renewInfoData=0;$mainIdFdNineOne =0;$formOneData=0;
            $allDataForNewListAll=0;$formEghtData=0; $formMemberData=0;
            $formMemberDataDoc=0;$formNgoDataDoc=0;$usersInfo=0;$allSourceOfFund=0;
            $allPartiw=0;$allNameChangeDoc = 0;$getformOneId= 0;$durationListAll1 =0;
            $durationListAll1 = 0;$renewStatus = 0;$nameChangeStatus = 0;
            $rStatus = 0;$formMemberDataDocRenew =0;$getAllDataAdviser=0;
            $getAllDataOther=0;$getAllDataAdviserBank=0;

            $fc_two_status_id = DB::table('fc_two_daks')
            ->where('id',$parentId)
            ->value('fc_two_status_id');


            $dataFromFc2Form = DB::table('fc2_forms')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fc2_forms.fd_one_form_id')
            ->select('fd_one_forms.*','fc2_forms.*','fc2_forms.id as mainId')
            ->where('fc2_forms.id',$fc_two_status_id)
            ->orderBy('fc2_forms.id','desc')
            ->first();

           $get_email_from_user = DB::table('users')->where('id',$dataFromFc2Form->user_id)->value('email');
           $fd2FormList = DB::table('fd2_form_for_fc2_forms')->where('fd_one_form_id',$dataFromFc2Form->fd_one_form_id)
           ->where('fc2_form_id',$dataFromFc2Form->mainId)->latest()->first();
           $fd2OtherInfo = DB::table('fd2_fc2_other_infos')->where('fd2_form_for_fc2_form_id',$fd2FormList->id)->latest()->get();

           $officeDetail = FcTwoOfficeSarok::where('parent_note_for_fc_two_id',$id)->get();
           $checkParent = ParentNoteForFcTwo::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)
                    ->get();





        }elseif($status == 'fdThree'){

            $dataFromFc2Form =0;$dataFromFc1Form =0;$prokolpoAreaList=0;
            $dataFromFd6Form = 0;$dataFromFd7Form = 0;$ngoStatus=0;
            $ngoTypeData=0;$nVisaDocs=0;$dataFromNVisaFd9Fd1=0;
            $nVisabasicInfo=0;$forwardingLetterOnulipi=0;$editCheck1=0;
            $editCheck=0;$statusData=0;$nVisaWorkPlace=0;$nVisaSponSor=0;
            $nVisaForeignerInfo=0;$nVisaManPower=0;$nVisaEmploye=0;
            $nVisaCompensationAndBenifits=0;$nVisaAuthPerson=0;$mainIdR=0;
            $renewInfoData=0;$mainIdFdNineOne =0;$formOneData=0;
            $allDataForNewListAll=0; $formEghtData=0;$formMemberData=0;
            $formMemberDataDoc=0;$formNgoDataDoc=0;$usersInfo=0;
            $allSourceOfFund=0;$allPartiw=0;$allNameChangeDoc = 0;
            $getformOneId= 0;$durationListAll1 =0;$durationListAll1 = 0;
            $renewStatus = 0;$nameChangeStatus = 0;$rStatus = 0;
            $formMemberDataDocRenew =0;$getAllDataAdviser=0;
            $getAllDataOther=0;$getAllDataAdviserBank=0;



            $fd_three_status_id = DB::table('fd_three_daks')
            ->where('id',$parentId)
            ->value('fd_three_status_id');

            $dataFromFd3Form = DB::table('fd3_forms')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'fd3_forms.fd_one_form_id')
            ->select('fd_one_forms.*','fd3_forms.*','fd3_forms.id as mainId')
            ->where('fd3_forms.id',$fd_three_status_id)
           ->orderBy('fd3_forms.id','desc')
           ->first();

           $get_email_from_user = DB::table('users')->where('id',$dataFromFd3Form->user_id)->value('email');
           $fd2FormList = DB::table('fd2_form_for_fd3_forms')->where('fd_one_form_id',$dataFromFd3Form->fd_one_form_id)
           ->where('fd3_form_id',$dataFromFd3Form->mainId)->latest()->first();
           $fd2OtherInfo = DB::table('fd2_fd3_other_infos')->where('fd2_form_for_fd3_form_id',$fd2FormList->id)->latest()->get();

           $officeDetail = FdThreeOfficeSarok::where('parent_note_for_fd_three_id',$id)->get();
           $checkParent = ParentNoteForFdThree::where('nothi_detail_id',$parentId)
                    ->where('serial_number',$nothiId)
                    ->get();


                }


                $nothiNumber = NothiList::where('id',$nothiId)->value('main_sarok_number');
                $nothiYear = NothiList::where('id',$nothiId)->value('document_year');
                $user = Admin::where('id','!=',1)->get();
                $nothiPropokListUpdate = NothiPrapok::where('nothiId',$nothiId)
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

                    $checkParentFirst = DB::table('parent_note_for_registrations')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
                    $childNoteNewList = DB::table('child_note_for_registrations')->where('parent_note_regid',$id)->get();
                    $childNoteNewListValue = DB::table('child_note_for_registrations')->where('parent_note_regid',$id)->orderBy('id','desc')->value('id');

                    }elseif($status == 'renew'){

                    $checkParentFirst = DB::table('parent_note_for_renews')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
                    $childNoteNewList = DB::table('child_note_for_renews')->where('parent_note_for_renew_id',$id)->get();
                    $childNoteNewListValue = DB::table('child_note_for_renews')->where('parent_note_for_renew_id',$id)->orderBy('id','desc')->value('id');

                   }elseif($status == 'nameChange'){

                    $checkParentFirst = DB::table('parent_note_for_name_changes')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
                    $childNoteNewList = DB::table('child_note_for_name_changes')->where('parentnote_name_change_id',$id)->get();
                    $childNoteNewListValue = DB::table('child_note_for_name_changes')->where('parentnote_name_change_id',$id)->orderBy('id','desc')->value('id');

                   }elseif($status == 'fdNine'){

                    $checkParentFirst = DB::table('parent_note_for_fd_nines')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
                    $childNoteNewList = DB::table('child_note_for_fd_nines')->where('p_note_for_fd_nine_id',$id)->get();
                    $childNoteNewListValue = DB::table('child_note_for_fd_nines')->where('p_note_for_fd_nine_id',$id)->orderBy('id','desc')->value('id');

                   }elseif($status == 'fdNineOne'){

                    $checkParentFirst = DB::table('parent_note_for_fd_nine_ones')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
                    $childNoteNewList = DB::table('child_note_for_fd_nine_ones')->where('p_note_for_fd_nine_one_id',$id)->get();
                    $childNoteNewListValue = DB::table('child_note_for_fd_nine_ones')->where('p_note_for_fd_nine_one_id',$id)->orderBy('id','desc')->value('id');

                   }elseif($status == 'fdSix'){

                    $checkParentFirst = DB::table('parent_note_for_fdsixes')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
                    $childNoteNewList = DB::table('child_note_for_fd_sixes')->where('parent_note_for_fdsix_id',$id)->get();
                    $childNoteNewListValue = DB::table('child_note_for_fd_sixes')->where('parent_note_for_fdsix_id',$id)->orderBy('id','desc')->value('id');

                  }elseif($status == 'fdSeven'){

                    $checkParentFirst = DB::table('parent_note_for_fd_sevens')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
                    $childNoteNewList = DB::table('child_note_for_fd_sevens')->where('parent_note_for_fd_seven_id',$id)->get();
                    $childNoteNewListValue = DB::table('child_note_for_fd_sevens')->where('parent_note_for_fd_seven_id',$id)->orderBy('id','desc')->value('id');

                  }elseif($status == 'fcOne'){

                    $checkParentFirst = DB::table('parent_note_for_fc_ones')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
                    $childNoteNewList = DB::table('child_note_for_fc_ones')->where('parent_note_for_fc_one_id',$id)->get();
                    $childNoteNewListValue = DB::table('child_note_for_fc_ones')->where('parent_note_for_fc_one_id',$id)->orderBy('id','desc')->value('id');

                  }elseif($status == 'fcTwo'){

                    $checkParentFirst = DB::table('parent_note_for_fc_twos')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
                    $childNoteNewList = DB::table('child_note_for_fc_twos')->where('parent_note_for_fc_two_id',$id)->get();
                    $childNoteNewListValue = DB::table('child_note_for_fc_twos')->where('parent_note_for_fc_two_id',$id)->orderBy('id','desc')->value('id');

                  }elseif($status == 'fdThree'){

                    $checkParentFirst = DB::table('parent_note_for_fd_threes')->where('nothi_detail_id',$parentId)->where('serial_number',$nothiId)->where('id',$id)->first();
                    $childNoteNewList = DB::table('child_note_for_fd_threes')->where('parent_note_for_fd_three_id',$id)->get();
                    $childNoteNewListValue = DB::table('child_note_for_fd_threes')->where('parent_note_for_fd_three_id',$id)->orderBy('id','desc')->value('id');

                }


    return view('admin.presentDocument.viewChildNote',
    compact(


        'get_email_from_user',
        'dataFromFd6Form',
        'fd2FormList',
        'fd2OtherInfo',
        'prokolpoAreaList',
        'dataFromFd7Form',
        'dataFromFc1Form',
        'dataFromFc2Form',
        'dataFromFd3Form',
        'mainIdFdNineOne',
        'nVisabasicInfo',
        'forwardingLetterOnulipi',
        'editCheck1',
        'editCheck',
        'statusData',
        'ngoStatus',
        'nVisaWorkPlace',
        'nVisaSponSor',
        'nVisaForeignerInfo',
        'nVisaManPower',
        'nVisaEmploye',
        'nVisaCompensationAndBenifits',
        'nVisaAuthPerson',
        'nVisaDocs',
        'dataFromNVisaFd9Fd1',
        'allNameChangeDoc',
        'getformOneId',
        'durationListAll1',
        'durationListAll1',
        'rStatus',
        'ngoTypeData',
        'renewInfoData',
        'mainIdR',
        'renewStatus',
        'nameChangeStatus',
        'formMemberDataDocRenew',
        'getAllDataAdviser',
        'getAllDataOther',
        'getAllDataAdviserBank',
        'allPartiw',
        'allSourceOfFund',
        'usersInfo',
        'formNgoDataDoc',
        'formMemberDataDoc',
        'formMemberData',
        'formEghtData',
        'allDataForNewListAll',
        'formOneData',
        'childNoteNewListValue',
        'childNoteNewList',
        'checkParentFirst',
        'nothiYear',
        'branchListForSerial',
        'permissionNothiList',
        'nothiCopyListUpdate',
        'nothiAttractListUpdate',
        'nothiPropokListUpdate',
        'user',
        'nothiId',
        'nothiNumber',
        'officeDetail',
        'checkParent',
        'status',
        'id',
        'parentId',
        'activeCode'
));
            }


            public function givePermissionToNote($status,$parentId,$nothiId,$id,$childnote){

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

              $getPrapokLIst = DB::table('nothi_prapoks')
                ->where('nothiId',$nothiId)
                ->where('noteId',$id)
                ->where('nijOfficeId',$status)
                ->whereNotNull('otherOfficerEmail')
                ->get();

                $getAttlIst = DB::table('nothi_attarcts')
                ->where('nothiId',$nothiId)
                ->where('noteId',$id)
                ->where('nijOfficeId',$status)
                ->whereNotNull('otherOfficerEmail')
                ->get();

                $getCopylIst = DB::table('nothi_copies')
                ->where('nothiId',$nothiId)
                ->where('noteId',$id)
                ->where('nijOfficeId',$status)
                ->whereNotNull('otherOfficerEmail')
                ->get();




                if(count($getPrapokLIst) == 0){


                }else{

                   $mainUrl = url('printPotrangsoPdfForEmail/'.$status.'/'.$parentId.'/'.$nothiId.'/'.$id);

                    foreach($getPrapokLIst as $getPrapokLIsts){


                    Mail::send('emails.pdf', ['mainUrl' =>$mainUrl], function($message) use($getPrapokLIsts){
                        $message->to($getPrapokLIsts->otherOfficerEmail);
                        $message->subject('Issued Letter');
                    });

                }

                }


                if(count($getAttlIst) == 0){


                }else{

                    $mainUrl = url('printPotrangsoPdfForEmail/'.$status.'/'.$parentId.'/'.$nothiId.'/'.$id);

                    foreach($getAttlIst as $getPrapokLIsts){


                    Mail::send('emails.pdf', ['mainUrl' =>$mainUrl], function($message) use($getPrapokLIsts){
                        $message->to($getPrapokLIsts->otherOfficerEmail);
                        $message->subject('Issued Letter');
                    });

                }

                }

                if(count($getCopylIst) == 0){


                }else{

                    $mainUrl = url('printPotrangsoPdfForEmail/'.$status.'/'.$parentId.'/'.$nothiId.'/'.$id);

                    foreach($getPrapokLIst as $getPrapokLIsts){


                    Mail::send('emails.pdf', ['mainUrl' =>$mainUrl], function($message) use($getPrapokLIsts){
                        $message->to($getCopylIst->otherOfficerEmail);
                        $message->subject('Issued Letter');
                    });

                }

                }


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
                $nothiPropokListUpdate = NothiPrapok::where('nothiId',$nothiId)
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
                        'default_font' => 'nikosh'
                    ]);
                $mpdf->WriteHTML($data);
                $mpdf->Output("./public/uploads/IssuedPaper/".$pdfFilePath, "F");

                return redirect()->back()->with('success','সফলভাবে অনুমতি দেওয়া হয়েছে');
            }


    public function saveNothiPermission(Request $request){

        $lastSarokValue = PotrangshoDraft::where('nothiId',$request->nothiId)
                                        ->where('noteId',$request->noteId)
                                        ->where('status',$request->status)
                                        ->where('adminId',Auth::guard('admin')->user()->id)
                                        ->where('SentStatus',0)
                                        ->orderBy('id','desc')
                                        ->first();

                if(!$lastSarokValue){


                }else{

                    $newCode =PotrangshoDraft::find($lastSarokValue->id);
                    $newCode->SentStatus = 1;
                    $newCode->receiverId = $request->nothiPermissionId;
                    $newCode->save();

                if($request->status == 'registration'){

                    $saveNewData = RegistrationOfficeSarok::find($lastSarokValue->sarokId);
                    $saveNewData->office_subject = $lastSarokValue->office_subject;
                    $saveNewData->office_sutro = $lastSarokValue->office_sutro;
                    $saveNewData->description =$lastSarokValue->description;
                    $saveNewData->sarok_number =$lastSarokValue->sarok_number;
                    $saveNewData->extra_text =$lastSarokValue->extra_text;
                    $saveNewData->save();

                }elseif($request->status == 'renew'){

                    $saveNewData = RenewOfficeSarok::find($lastSarokValue->sarokId);
                    $saveNewData->office_subject = $lastSarokValue->office_subject;
                    $saveNewData->office_sutro = $lastSarokValue->office_sutro;
                    $saveNewData->description =$lastSarokValue->description;
                    $saveNewData->sarok_number =$lastSarokValue->sarok_number;
                    $saveNewData->extra_text =$lastSarokValue->extra_text;
                    $saveNewData->save();

                }elseif($request->status == 'nameChange'){

                    $saveNewData = NameChangeOfficeSarok::find($lastSarokValue->sarokId);
                    $saveNewData->office_subject = $lastSarokValue->office_subject;
                    $saveNewData->office_sutro = $lastSarokValue->office_sutro;
                    $saveNewData->description =$lastSarokValue->description;
                    $saveNewData->sarok_number =$lastSarokValue->sarok_number;
                    $saveNewData->extra_text =$lastSarokValue->extra_text;
                    $saveNewData->save();

                }elseif($request->status == 'fdNine'){

                    $saveNewData = FdNineOfficeSarok::find($lastSarokValue->sarokId);
                    $saveNewData->office_subject = $lastSarokValue->office_subject;
                    $saveNewData->office_sutro = $lastSarokValue->office_sutro;
                    $saveNewData->description =$lastSarokValue->description;
                    $saveNewData->sarok_number =$lastSarokValue->sarok_number;
                    $saveNewData->extra_text =$lastSarokValue->extra_text;
                    $saveNewData->save();


                 }elseif($request->status == 'fdNineOne'){

                    $saveNewData = FdNineOneOfficeSarok::find($lastSarokValue->sarokId);
                    $saveNewData->office_subject = $lastSarokValue->office_subject;
                    $saveNewData->office_sutro = $lastSarokValue->office_sutro;
                    $saveNewData->description =$lastSarokValue->description;
                    $saveNewData->sarok_number =$lastSarokValue->sarok_number;
                    $saveNewData->extra_text =$lastSarokValue->extra_text;
                    $saveNewData->save();

                 }elseif($request->status == 'fdSix'){

                    $saveNewData = FdSixOfficeSarok::find($lastSarokValue->sarokId);
                    $saveNewData->office_subject = $lastSarokValue->office_subject;
                    $saveNewData->office_sutro = $lastSarokValue->office_sutro;
                    $saveNewData->description =$lastSarokValue->description;
                    $saveNewData->sarok_number =$lastSarokValue->sarok_number;
                    $saveNewData->extra_text =$lastSarokValue->extra_text;
                    $saveNewData->save();

                 }elseif($request->status == 'fdSeven'){

                    $saveNewData = FdSevenOfficeSarok::find($lastSarokValue->sarokId);
                    $saveNewData->office_subject = $lastSarokValue->office_subject;
                    $saveNewData->office_sutro = $lastSarokValue->office_sutro;
                    $saveNewData->description =$lastSarokValue->description;
                    $saveNewData->sarok_number =$lastSarokValue->sarok_number;
                    $saveNewData->extra_text =$lastSarokValue->extra_text;
                    $saveNewData->save();


                 }elseif($request->status == 'fcOne'){

                    $saveNewData = FcOneOfficeSarok::find($lastSarokValue->sarokId);
                    $saveNewData->office_subject = $lastSarokValue->office_subject;
                    $saveNewData->office_sutro = $lastSarokValue->office_sutro;
                    $saveNewData->description =$lastSarokValue->description;
                    $saveNewData->sarok_number =$lastSarokValue->sarok_number;
                    $saveNewData->extra_text =$lastSarokValue->extra_text;
                    $saveNewData->save();

                 }elseif($request->status == 'fcTwo'){


                    $saveNewData = FcTwoOfficeSarok::find($lastSarokValue->sarokId);
                    $saveNewData->office_subject = $lastSarokValue->office_subject;
                    $saveNewData->office_sutro = $lastSarokValue->office_sutro;
                    $saveNewData->description =$lastSarokValue->description;
                    $saveNewData->sarok_number =$lastSarokValue->sarok_number;
                    $saveNewData->extra_text =$lastSarokValue->extra_text;
                    $saveNewData->save();


                 }elseif($request->status == 'fdThree'){

                    $saveNewData = FdThreeOfficeSarok::find($lastSarokValue->sarokId);
                    $saveNewData->office_subject = $lastSarokValue->office_subject;
                    $saveNewData->office_sutro = $lastSarokValue->office_sutro;
                    $saveNewData->description =$lastSarokValue->description;
                    $saveNewData->sarok_number =$lastSarokValue->sarok_number;
                    $saveNewData->extra_text =$lastSarokValue->extra_text;
                    $saveNewData->save();


                 }



                }
        //NothiFirstSenderList
if($request->first_sender == 'first_sender'){

    $mainSaveData = new NothiFirstSenderList();
    $mainSaveData ->noteId = $request->noteId;
    $mainSaveData ->nothId = $request->nothiId;
    $mainSaveData ->dakId = $request->dakId;
    $mainSaveData ->dakType = $request->status;
    $mainSaveData ->sender = Auth::guard('admin')->user()->id;
    $mainSaveData ->receiver = $request->nothiPermissionId;
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


        if($request->status == 'registration'){

            $saveNewData = ChildNoteForRegistration::find($request->child_note_id);
            $saveNewData->sent_status = 1;
            $saveNewData->receiver_id = $request->nothiPermissionId;
            $saveNewData->save();


     }elseif($request->status == 'renew'){


        $saveNewData = ChildNoteForRenew::find($request->child_note_id);
         $saveNewData->sent_status = 1;
         $saveNewData->receiver_id = $request->nothiPermissionId;
         $saveNewData->save();

    }elseif($request->status == 'nameChange'){

         $saveNewData = ChildNoteForNameChange::find($request->child_note_id);
         $saveNewData->sent_status = 1;
         $saveNewData->receiver_id = $request->nothiPermissionId;
         $saveNewData->save();

    }elseif($request->status == 'fdNine'){

         $saveNewData = ChildNoteForFdNine::find($request->child_note_id);
         $saveNewData->sent_status = 1;
         $saveNewData->receiver_id = $request->nothiPermissionId;
         $saveNewData->save();

    }elseif($request->status == 'fdNineOne'){

         $saveNewData = ChildNoteForFdNineOne::find($request->child_note_id);
         $saveNewData->sent_status = 1;
         $saveNewData->receiver_id = $request->nothiPermissionId;
         $saveNewData->save();

    }elseif($request->status == 'fdSix'){

         $saveNewData = ChildNoteForFdSix::find($request->child_note_id);
         $saveNewData->sent_status = 1;
         $saveNewData->receiver_id = $request->nothiPermissionId;
         $saveNewData->save();

    }elseif($request->status == 'fdSeven'){

         $saveNewData = ChildNoteForFdSeven::find($request->child_note_id);
         $saveNewData->sent_status = 1;
         $saveNewData->receiver_id = $request->nothiPermissionId;
         $saveNewData->save();

    }elseif($request->status == 'fcOne'){

         $saveNewData = ChildNoteForFcOne::find($request->child_note_id);
         $saveNewData->sent_status = 1;
         $saveNewData->receiver_id = $request->nothiPermissionId;
         $saveNewData->save();

    }elseif($request->status == 'fcTwo'){

         $saveNewData = ChildNoteForFcTwo::find($request->child_note_id);
         $saveNewData->sent_status = 1;
         $saveNewData->receiver_id = $request->nothiPermissionId;
         $saveNewData->save();

    }elseif($request->status == 'fdThree'){

         $saveNewData = ChildNoteForFdThree::find($request->child_note_id);
         $saveNewData->sent_status = 1;
         $saveNewData->receiver_id = $request->nothiPermissionId;
         $saveNewData->save();
    }

        return redirect()->back()->with('success','সফলভাবে পাঠানো হয়েছে');

    }

        return redirect()->back()->with('success','সফলভাবে পাঠানো হয়েছে');
    }


    public function saveNothiPermissionReturn(Request $request){

         $secondLastValue = ArticleSign::orderBy('id','desc')->value('back_status');

        if(empty($secondLastValue)){

            $secondLastValueLast = 1;
            $senderId = DB::table('nothi_details')
                            ->where('noteId',$request->noteId)
                            ->where('nothId',$request->nothiId)
                            ->where('dakId',$request->dakId)
                            ->where('dakType',$request->status)
                            ->where('receiver',Auth::guard('admin')->user()->id)
                            ->value('sender');
            $mainId = DB::table('nothi_details')
                            ->where('noteId',$request->noteId)
                            ->where('nothId',$request->nothiId)
                            ->where('dakId',$request->dakId)
                            ->where('dakType',$request->status)
                            ->where('receiver',Auth::guard('admin')->user()->id)
                            ->value('id');

        }else{

            $secondLastValueLast = "";


            $senderId = DB::table('nothi_details')
                        ->where('noteId',$request->noteId)
                        ->where('nothId',$request->nothiId)
                        ->where('dakId',$request->dakId)
                        ->where('dakType',$request->status)
                        ->where('receiver',Auth::guard('admin')->user()->id)
                        ->value('sender');

            $mainId = DB::table('nothi_details')
                        ->where('noteId',$request->noteId)
                        ->where('nothId',$request->nothiId)
                        ->where('dakId',$request->dakId)
                        ->where('dakType',$request->status)
                        ->where('receiver',Auth::guard('admin')->user()->id)
                        ->value('id');

                     }

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

            $lastSarokValue = PotrangshoDraft::where('nothiId',$request->nothiId)
            ->where('noteId',$request->noteId)
            ->where('status',$request->status)
            ->where('adminId',Auth::guard('admin')->user()->id)
            ->where('SentStatus',0)
            ->orderBy('id','desc')
            ->first();

        if(!$lastSarokValue){
        }else{

            $newCode =PotrangshoDraft::find($lastSarokValue->id);
            $newCode->SentStatus = 1;
            $newCode->receiverId = $request->nothiPermissionId;
            $newCode->save();

        if($request->status == 'registration'){

            $saveNewData = RegistrationOfficeSarok::find($lastSarokValue->sarokId);
            $saveNewData->office_subject = $lastSarokValue->office_subject;
            $saveNewData->office_sutro = $lastSarokValue->office_sutro;
            $saveNewData->description =$lastSarokValue->description;
            $saveNewData->save();

        }elseif($request->status == 'renew'){

            $saveNewData = RenewOfficeSarok::find($lastSarokValue->sarokId);
            $saveNewData->office_subject = $lastSarokValue->office_subject;
            $saveNewData->office_sutro = $lastSarokValue->office_sutro;
            $saveNewData->description =$lastSarokValue->description;
            $saveNewData->save();

        }elseif($request->status == 'nameChange'){

            $saveNewData = NameChangeOfficeSarok::find($lastSarokValue->sarokId);
            $saveNewData->office_subject = $lastSarokValue->office_subject;
            $saveNewData->office_sutro = $lastSarokValue->office_sutro;
            $saveNewData->description =$lastSarokValue->description;
            $saveNewData->save();

        }elseif($request->status == 'fdNine'){

            $saveNewData = FdNineOfficeSarok::find($lastSarokValue->sarokId);
            $saveNewData->office_subject = $lastSarokValue->office_subject;
            $saveNewData->office_sutro = $lastSarokValue->office_sutro;
            $saveNewData->description =$lastSarokValue->description;
            $saveNewData->save();


        }elseif($request->status == 'fdNineOne'){

            $saveNewData = FdNineOneOfficeSarok::find($lastSarokValue->sarokId);
            $saveNewData->office_subject = $lastSarokValue->office_subject;
            $saveNewData->office_sutro = $lastSarokValue->office_sutro;
            $saveNewData->description =$lastSarokValue->description;
            $saveNewData->save();

        }elseif($request->status == 'fdSix'){

            $saveNewData = FdSixOfficeSarok::find($lastSarokValue->sarokId);
            $saveNewData->office_subject = $lastSarokValue->office_subject;
            $saveNewData->office_sutro = $lastSarokValue->office_sutro;
            $saveNewData->description =$lastSarokValue->description;
            $saveNewData->save();

        }elseif($request->status == 'fdSeven'){

            $saveNewData = FdSevenOfficeSarok::find($lastSarokValue->sarokId);
            $saveNewData->office_subject = $lastSarokValue->office_subject;
            $saveNewData->office_sutro = $lastSarokValue->office_sutro;
            $saveNewData->description =$lastSarokValue->description;
            $saveNewData->save();

        }elseif($request->status == 'fcOne'){

            $saveNewData = FcOneOfficeSarok::find($lastSarokValue->sarokId);
            $saveNewData->office_subject = $lastSarokValue->office_subject;
            $saveNewData->office_sutro = $lastSarokValue->office_sutro;
            $saveNewData->description =$lastSarokValue->description;
            $saveNewData->save();

        }elseif($request->status == 'fcTwo'){


            $saveNewData = FcTwoOfficeSarok::find($lastSarokValue->sarokId);
            $saveNewData->office_subject = $lastSarokValue->office_subject;
            $saveNewData->office_sutro = $lastSarokValue->office_sutro;
            $saveNewData->description =$lastSarokValue->description;
            $saveNewData->save();

        }elseif($request->status == 'fdThree'){

            $saveNewData = FdThreeOfficeSarok::find($lastSarokValue->sarokId);
            $saveNewData->office_subject = $lastSarokValue->office_subject;
            $saveNewData->office_sutro = $lastSarokValue->office_sutro;
            $saveNewData->description =$lastSarokValue->description;
            $saveNewData->save();

        }

 }

            $mainSaveData = new ArticleSign();
            $mainSaveData ->dakDetailId = $mainId;
            $mainSaveData ->childId = $request->child_note_id;
            $mainSaveData ->sender = Auth::guard('admin')->user()->id;
            $mainSaveData ->permissionId = $senderId;
            $mainSaveData ->back_status = $secondLastValueLast;
            $mainSaveData->save();


        if($request->status == 'registration'){

            $saveNewData = ChildNoteForRegistration::find($request->child_note_id);
            $saveNewData->sent_status = 1;
            $saveNewData->receiver_id = $request->nothiPermissionId;
            $saveNewData->save();

        }elseif($request->status == 'renew'){

            $saveNewData = ChildNoteForRenew::find($request->child_note_id);
            $saveNewData->sent_status = 1;
            $saveNewData->receiver_id = $request->nothiPermissionId;
            $saveNewData->save();

        }elseif($request->status == 'nameChange'){

            $saveNewData = ChildNoteForNameChange::find($request->child_note_id);
            $saveNewData->sent_status = 1;
            $saveNewData->receiver_id = $request->nothiPermissionId;
            $saveNewData->save();

        }elseif($request->status == 'fdNine'){

            $saveNewData = ChildNoteForFdNine::find($request->child_note_id);
            $saveNewData->sent_status = 1;
            $saveNewData->receiver_id = $request->nothiPermissionId;
            $saveNewData->save();

        }elseif($request->status == 'fdNineOne'){

            $saveNewData = ChildNoteForFdNineOne::find($request->child_note_id);
            $saveNewData->sent_status = 1;
            $saveNewData->receiver_id = $request->nothiPermissionId;
            $saveNewData->save();

        }elseif($request->status == 'fdSix'){

            $saveNewData = ChildNoteForFdSix::find($request->child_note_id);
            $saveNewData->sent_status = 1;
            $saveNewData->receiver_id = $request->nothiPermissionId;
            $saveNewData->save();

        }elseif($request->status == 'fdSeven'){

            $saveNewData = ChildNoteForFdSeven::find($request->child_note_id);
            $saveNewData->sent_status = 1;
            $saveNewData->receiver_id = $request->nothiPermissionId;
            $saveNewData->save();

        }elseif($request->status == 'fcOne'){

            $saveNewData = ChildNoteForFcOne::find($request->child_note_id);
            $saveNewData->sent_status = 1;
            $saveNewData->receiver_id = $request->nothiPermissionId;
            $saveNewData->save();

        }elseif($request->status == 'fcTwo'){

            $saveNewData = ChildNoteForFcTwo::find($request->child_note_id);
            $saveNewData->sent_status = 1;
            $saveNewData->receiver_id = $request->nothiPermissionId;
            $saveNewData->save();

        }elseif($request->status == 'fdThree'){

         $saveNewData = ChildNoteForFdThree::find($request->child_note_id);
         $saveNewData->sent_status = 1;
         $saveNewData->receiver_id = $request->nothiPermissionId;
         $saveNewData->save();

        }

    return redirect()->back()->with('success','সফলভাবে পাঠানো হয়েছে');

    }


public function store(Request $request){

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

            $childDataId = $saveNewData->id;

            $unsentAtt = DB::table('note_attachments')
            ->where('noteId',$request->noteId)
            ->where('nothiId',$request->nothiId)
            ->where('status',$request->status)
            ->where('admin_id',Auth::guard('admin')->user()->id)
            ->whereNull('child_id')
            ->update(array('child_id' => $childDataId));

    if($request->final_button == 'সংরক্ষন ও খসড়া'){

        return redirect('admin/createPotro/'.$request->status.'/'.$request->dakId.'/'.$request->nothiId.'/'.$request->noteId.'/'.$request->activeCode)->with('success','সফলভাবে সংরক্ষণ করা হয়েছে');

    }else{
        return redirect()->back()->with('success','সফলভাবে সংরক্ষণ করা হয়েছে');
     }
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

            $childDataId = $saveNewData->id;

            $unsentAtt = DB::table('note_attachments')
            ->where('noteId',$request->noteId)
            ->where('nothiId',$request->nothiId)
            ->where('status',$request->status)
            ->where('admin_id',Auth::guard('admin')->user()->id)
            ->whereNull('child_id')
            ->update(array('child_id' => $childDataId));

     if($request->final_button == 'সংশোধন ও খসড়া'){

        return redirect('admin/createPotro/'.$request->status.'/'.$request->dakId.'/'.$request->nothiId.'/'.$request->noteId.'/'.$request->activeCode)->with('success','সফলভাবে সংশোধন করা হয়েছে');

     }else{
        return redirect()->back()->with('success','সফলভাবে সংশোধন করা হয়েছে');
     }

    }
}
