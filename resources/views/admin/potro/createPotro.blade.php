@extends('admin.master.master')

@section('title')
পত্রাংশ তৈরী করুন
@endsection


@section('body')
  <style>

    .bactive{
        background: #24695c !important;
    color: white;
    }
        #container {
            width: 100%;
        }

        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 10vh;
        }

        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>



<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>পত্রাংশ তৈরী করুন</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">পত্রাংশ</a></li>
                    <li class="breadcrumb-item">পত্রাংশ তৈরী করুন</li>
                </ol>
            </div>
        </div>
    </div>
</div>


   <!-- Container-fluid starts-->
   <div class="container-fluid list-products">
    <div class="row">
        <!-- Individual column searching (text inputs) Starts-->
        <div class="col-sm-12">
            <div class="card">
                        <div class="card-body">
                            <div class="row">

@include('flash_message')

                                <div class="col-lg-12 col-sm-12">
                            <ul class="nav nav-tabs" id="icon-tab" role="tablist">

                                <li class="nav-item"><a class="nav-link" id="profile-icon-tab"
                                                        data-bs-toggle="tab" href="#profile-icon" role="tab"
                                                        aria-controls="profile-icon"
                                                        aria-selected="false"><i
                                                class="icofont icofont-man-in-glasses"></i>পত্রাংশ</a></li>
                            </ul>
                            <div class="tab-content mt-4" id="icon-tabContent">

                                <div class="tab-pane show active fade" id="profile-icon" role="tabpanel"
                                     aria-labelledby="profile-icon-tab">


                                    <div class="row">
                                        <div class="col-xl-9">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-2 col-xs-12">
                                                        <div class="nav flex-column nav-pills"
                                                             id="v-pills-tab" role="tablist"
                                                             aria-orientation="vertical"><a
                                                                    class="nav-link active"
                                                                    id="v-pills-home-tab"
                                                                    data-bs-toggle="pill"
                                                                    href="#v-pills-home" role="tab"
                                                                    aria-controls="v-pills-home"
                                                                    aria-selected="true">অফিস স্মারক</a>
                                                                    {{-- <a
                                                                    class="nav-link"
                                                                    id="v-pills-profile-tab"
                                                                    data-bs-toggle="pill"
                                                                    href="#v-pills-profile" role="tab"
                                                                    aria-controls="v-pills-profile"
                                                                    aria-selected="false">সরকারি পত্র</a><a
                                                                    class="nav-link"
                                                                    id="v-pills-messages-tab"
                                                                    data-bs-toggle="pill"
                                                                    href="#v-pills-messages" role="tab"
                                                                    aria-controls="v-pills-messages"
                                                                    aria-selected="false">বেসরকারি
                                                                পত্র</a><a
                                                                    class="nav-link"
                                                                    id="v-pills-settings-tab"
                                                                    data-bs-toggle="pill"
                                                                    href="#v-pills-settings" role="tab"
                                                                    aria-controls="v-pills-settings"
                                                                    aria-selected="false">বিজ্ঞপ্তি/নোটিশ</a> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-10 col-xs-12">
                                                        <div class="tab-content"
                                                             id="v-pills-tabContent">
                                                            <div class="tab-pane fade show active"
                                                                 id="v-pills-home" role="tabpanel"
                                                                 aria-labelledby="v-pills-home-tab">
                                                                <div class="card">
                                                                    <div class="card-body">

                                                                        <?php
                                                                        $nothiApproverList = DB::table('nothi_approvers')->where('nothiId',$nothiId)
                                                                               ->where('status',$status)
                                                                               ->where('noteId',$id)->first();


                                                                        if(!$nothiApproverList){

                                                                                $appName = '';
                                                                                $desiName = '';
                                                                                $dateApp = '';
                                                                                $dateAppBan = '';
                                                                        }else{





                                                                               $nothiApproverLista = DB::table('admins')->where('id',$nothiApproverList->adminId)
                                                                               ->first();

                                                                               if(!$nothiApproverLista){


                                                                                $appName = '';
                                                                                $desiName = '';


                                                                               }else{

                                                                                $designationName = DB::table('designation_lists')
                                                                                        ->where('id',$nothiApproverLista->designation_list_id)
                                                                                        ->value('designation_name');


                                                                                $appName = $nothiApproverLista->admin_name_ban;
                                                                                $desiName = $designationName;

                                                                               }


                                                                               $dateApp =  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d F Y', strtotime($nothiApproverList->created_at)));
                                                                               $dateAppBan =  $nothiApproverList->bangla_date;
                                                                            }



 ?>
 @if(count($officeDetail) > 0 )

 @foreach($officeDetail as $officeDetails)




                                                                        <div class="text-center mb-3 mt-2">
                                                                            <img src="{{ asset('/') }}public/pdfLogo.png" alt="" style="height: 80px;width:80px;">
                                                                            <h3>গণপ্রজাতন্ত্রী বাংলাদেশ
                                                                                সরকার</h3>
                                                                            <h5>এনজিও বিষয়ক ব্যুরো <br>
                                                                                প্রধানমন্ত্রীর কার্যালয় <br>
                                                                                প্লট-ই, ১৩/বি, আগারগাঁও <br>
                                                                                শেরেবাংলা নগর, ঢাকা-১২০৭
                                                                            </h5>
                                                                        </div>
                                                                        <div class="row" class="mt-4">
                                                                            <div class="col-md-6">
                                                                                <p ><span style="font-weight:900;">স্মারক নং:</span> {{ App\Http\Controllers\Admin\CommonController::englishToBangla('১১.২২.৩৩৩৩.৪৪৪.৫৫.'.$nothiNumber) }}</p>
                                                                            </div>
                                                                            <div class="col-md-6" style="text-align: right;">
                                                                                <table class="table table-borderless">
                                                                                    <tr>
                                                                                        <td style="width: 60%;">তারিখ:</td>
                                                                                        <td style="text-align: left; padding-left: 10px;">{{ $dateAppBan }} বঙ্গাব্দ  <br> {{ $dateApp }} খ্রিস্টাব্দ</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        </div>



                                                                      <form class="custom-validation" action="{{ route('officeSarok.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
@csrf
                                                                        <input type="hidden" value="{{ $id }}" name="noteId"/>
                                                                        <input type="hidden" value="{{ $activeCode }}" name="activeCode"/>
                                                                        <input type="hidden" value="{{ $nothiId }}" name="nothiId"/>
                                                                        <input type="hidden" value="{{ $parentId }}" name="dakId"/>
                                                                        <input type="hidden" value="{{ $id }}" name="parentNoteId"/>
                                                                        <input type="hidden" value="{{ $status }}" name="status"/>


                                                                      <input type="hidden" name="updateOrSubmit" id="updateOrSubmit" value="1"/>
                                                                      <input type="hidden" name="sorkariUpdateId" id="sorkariUpdateId" value="{{ $officeDetails->id }}"/>
                                                                      <div class="row mt-3">
                                                                        <div class="col-xl-3 ">বিষয় :
                                                                        </div>
                                                                        <div class="col-xl-9">


                                                                            <textarea id="ineditor1" name="subject" contenteditable="true">
                                                                                {!! $officeDetails->office_subject !!}
                                                                                 </textarea>
                                                                    </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                        <div class="col-xl-3">সুত্রঃ
                                                                            (যদি থাকে):
                                                                        </div>

                                                                        <div class="col-xl-9">
                                                                            <textarea id="ineditor2" name="sutro" contenteditable="true">
                                                                            {!! $officeDetails->office_sutro !!}
                                                                            </textarea>
                                                                        </div>

                                                                        <input type="hidden" name="parentIdForPotrangso" id="parentIdForPotrangso" value="{{ $id }}"/>
                                                                                             <input type="hidden" name="statusForPotrangso" id="statusForPotrangso" value="{{ $status }}"/>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-xl-12">

                                                                                <label class="form-label">সম্পাদন শেষ করুন</label>

                                                                                <button class="btn btn-primary  mt-2" id="sorkariSarokUpdate"

                                                                                aria-expanded="false">
                                                                                সংশোধন করুন </button>


                                                                                <textarea id="editor1222" class="mainEdit"  name="maindes" >
                                                                                        {!! $officeDetails->description !!}
                                                                                    </textarea>


                                                                        </div>
                                                                    </div>




                                                            </form>






                                                                        <!-- approver start --->

                                                                        <?php
                                                                        $potroZariListValue =  DB::table('nothi_details')
                                                                                        ->where('noteId',$id)
                                                                                        ->where('nothId',$nothiId)
                                                                                        ->where('dakId',$parentId)
                                                                                        ->where('dakType',$status)
                                                                                        ->value('permission_status');



                                                                            ?>

                                                                        <div class="mt-4" style="text-align: right;">

                                                                            @if($potroZariListValue == 1)

                                                                            @if(!$nothiApproverLista)

                                                                            @else
                                                                            <img src="{{ asset('/') }}{{ $nothiApproverLista->admin_sign }}" style="height:30px;"/><br>
                                                                            @endif

                                                                            @else
                                                                            @endif
                                                                        <span>{{ $appName }}</span><br>
                                                                        <span>{{ $desiName }}</span>
                                                                        </div>

                                                                        <!-- approver end -->

                                                                   <!--prapok-->
                                                                    <div class="mt-4">
                                                                        @foreach($nothiPropokListUpdate as $nothiPropokLists)
                                                                        <span>{{ $nothiPropokLists->otherOfficerDesignation }},{{ $nothiPropokLists->otherOfficerBranch }}</span> ।<br>
                                                                        @endforeach
                                                                    </div>
                                                                    <!--end prapok  --->

                                                                    <!-- attraction -->

                                                                    @if(count($nothiAttractListUpdate) == 0)

                                                                    @else
                                                                    <h6 class="mt-4">দৃষ্টি আকর্ষণ</h6>
                                                                    @foreach($nothiAttractListUpdate as $nothiPropokLists)
                                                                    <span>{{ $nothiPropokLists->otherOfficerDesignation }},{{ $nothiPropokLists->otherOfficerBranch }}</span> ।<br>
                                                                    @endforeach
                                                                    @endif

                                                                    <!-- attracttion -->

                                                                    <!-- sarok number --->

                                                                    <div class="row" class="mt-4">
                                                                        <div class="col-md-6">
                                                                            <p ><span style="font-weight:900;">স্মারক নং:</span> {{ App\Http\Controllers\Admin\CommonController::englishToBangla('১১.২২.৩৩৩৩.৪৪৪.৫৫.'.$nothiNumber) }}</p>
                                                                        </div>
                                                                        <div class="col-md-6" style="text-align: right;">
                                                                            <table class="table table-borderless">
                                                                                <tr>
                                                                                    <td style="width: 60%;">তারিখ:</td>
                                                                                    <td style="text-align: left; padding-left: 10px;">{{ $dateAppBan }} বঙ্গাব্দ  <br> {{ $dateApp }} খ্রিস্টাব্দ</td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>





                                                                    <!-- end sarok number -->

                                                                    <!--copy-->

                                                                    @if(count($nothiCopyListUpdate) == 0)

                                                                    @else
                                                                    <h6 class="mt-4">সদয় জ্ঞাতার্থে/জ্ঞাতার্থে (জ্যেষ্ঠতার ক্রমানুসারে নয় ):</h6>
                                                                    @foreach($nothiCopyListUpdate as $key=>$nothiPropokLists)
                                                                    <span>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }} | {{ $nothiPropokLists->otherOfficerDesignation }},{{ $nothiPropokLists->otherOfficerBranch }}</span>;<br>
                                                                    @endforeach
                                                                    @endif

                                                                    <!--end copy list -->
<!--prapok-->
<div class="mt-4" style="text-align: right;">

    <span>{{ $appName }}</span><br>
    <span>{{ $desiName }}</span>
    </div>
@endforeach
    @else

    <!-- no data available  -->
    <div class="text-center mb-3 mt-2">
        <h3>গণপ্রজাতন্ত্রী বাংলাদেশ
            সরকার</h3>
        <h5>এনজিও বিষয়ক ব্যুরো <br>
            প্রধানমন্ত্রীর কার্যালয় <br>
            প্লট-ই, ১৩/বি, আগারগাঁও <br>
            শেরেবাংলা নগর, ঢাকা-১২০৭
        </h5>
    </div>
    <div class="row" class="mt-4">
        <div class="col-md-6">
            <p ><span style="font-weight:900;">স্মারক নং:</span> {{ App\Http\Controllers\Admin\CommonController::englishToBangla('১১.২২.৩৩৩৩.৪৪৪.৫৫.'.$nothiNumber) }}</p>
        </div>
        <div class="col-md-6" style="text-align: right;">
            <table class="table table-borderless">
                <tr>
                    <td style="width: 60%;">তারিখ:</td>
                    <td style="text-align: left; padding-left: 10px;">{{ $dateAppBan }} বঙ্গাব্দ  <br> {{ $dateApp }} খ্রিস্টাব্দ</td>
                </tr>
            </table>
        </div>
    </div>
    <form class="custom-validation" action="{{ route('officeSarok.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
        @csrf

        <input type="hidden" value="{{ $id }}" name="noteId"/>
                                        <input type="hidden" value="{{ $activeCode }}" name="activeCode"/>
                                        <input type="hidden" value="{{ $nothiId }}" name="nothiId"/>
                                        <input type="hidden" value="{{ $parentId }}" name="dakId"/>
                                        <input type="hidden" value="{{ $id }}" name="parentNoteId"/>
                                        <input type="hidden" value="{{ $status }}" name="status"/>

        <div class="row mt-3">
            <div class="col-xl-3">বিষয় :
            </div>
            <div class="col-xl-9">
                <textarea id="ineditor1" name="subject" contenteditable="true">
                    ...............................................
                     </textarea>

                     <input type="hidden" name="parentIdForPotrangso" id="parentIdForPotrangso" value="{{ $id }}"/>
                     <input type="hidden" name="statusForPotrangso" id="statusForPotrangso" value="{{ $status }}"/>
        </span>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3">সুত্রঃ
                (যদি থাকে):
            </div>
            <div class="col-xl-9">

 <textarea id="ineditor2" name="sutro" contenteditable="true">
                              ...............................................
                               </textarea>


            {{-- <span id="idOfElement1"
                  class="block">
            <textarea class=" form-control edit"   id="" >.............................................................................................</textarea>
            <span class="preview"></span> --}}

            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">

                    <label class="form-label">সম্পাদন শেষ করুন</label>



                        <textarea id="editor1222" class="mainEdit"  name="maindes" >

                        </textarea>


            </div>
        </div>

        <button class="btn btn-primary  mt-2" id="sorkariSarokSubmit"

        aria-expanded="false">
    সংরক্ষন করুন
</button>
</form>
            <!-- approver start --->



            <div class="mt-4" style="text-align: right;">
                <span>{{ $appName }}</span><br>
                <span>{{ $desiName }}</span>
                </div>

                <!-- approver end -->

           <!--prapok-->
            <div class="mt-4">
                @foreach($nothiPropokListUpdate as $nothiPropokLists)
                <span>{{ $nothiPropokLists->otherOfficerDesignation }},{{ $nothiPropokLists->otherOfficerBranch }}</span> ।<br>
                @endforeach
            </div>
            <!--end prapok  --->

            <!-- attraction -->

            @if(count($nothiAttractListUpdate) == 0)

            @else
            <h6 class="mt-4">দৃষ্টি আকর্ষণ</h6>
            @foreach($nothiAttractListUpdate as $nothiPropokLists)
            <span>{{ $nothiPropokLists->otherOfficerDesignation }},{{ $nothiPropokLists->otherOfficerBranch }}</span> ।<br>
            @endforeach
            @endif

            <!-- attracttion -->

            <!-- sarok number --->

            <div class="row" class="mt-4">
                <div class="col-md-6">
                    <p ><span style="font-weight:900;">স্মারক নং:</span> {{ App\Http\Controllers\Admin\CommonController::englishToBangla('১১.২২.৩৩৩৩.৪৪৪.৫৫.'.$nothiNumber) }}</p>
                </div>
                <div class="col-md-6" style="text-align: right;">
                    <table class="table table-borderless">
                        <tr>
                            <td style="width: 60%;">তারিখ:</td>
                            <td style="text-align: left; padding-left: 10px;">{{ $dateAppBan }} বঙ্গাব্দ  <br> {{ $dateApp }} খ্রিস্টাব্দ</td>
                        </tr>
                    </table>
                </div>
            </div>





            <!-- end sarok number -->

            <!--copy-->

            @if(count($nothiCopyListUpdate) == 0)

            @else
            <h6 class="mt-4">সদয় জ্ঞাতার্থে/জ্ঞাতার্থে (জ্যেষ্ঠতার ক্রমানুসারে নয় ):</h6>
            @foreach($nothiCopyListUpdate as $key=>$nothiPropokLists)
            <span>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }} | {{ $nothiPropokLists->otherOfficerDesignation }},{{ $nothiPropokLists->otherOfficerBranch }}</span>;<br>
            @endforeach
            @endif

            <!--end copy list -->
<!--prapok-->
<div class="mt-4" style="text-align: right;">

<span>{{ $appName }}</span><br>
<span>{{ $desiName }}</span>
</div>
    <!-- end no data available -->


    @endif

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                 id="v-pills-profile" role="tabpanel"
                                                                 aria-labelledby="v-pills-profile-tab">
                                                                <p>Demo</p>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                 id="v-pills-messages" role="tabpanel"
                                                                 aria-labelledby="v-pills-messages-tab">
                                                                <p>Demo</p>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                 id="v-pills-settings" role="tabpanel"
                                                                 aria-labelledby="v-pills-settings-tab">
                                                                <p>Demo</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <h5>পত্র গ্রহণকারী</h5>
                                            <div class="row">

                                                <?php

$totalOnumodonKari = DB::table('nothi_approvers')
            ->where('nothiId',$nothiId)
            ->where('noteId',$id)
            ->where('status',$status)
            ->count();


            $totalPrerok = DB::table('nothi_senders')
            ->where('nothiId',$nothiId)
            ->where('noteId',$id)
            ->where('status',$status)
            ->count();


            $totalPrapok = DB::table('nothi_prapoks')
            ->where('nothiId',$nothiId)
            ->where('noteId',$id)
            ->where('nijOfficeId',$status)
            ->where('status',1)
            ->count();


            $totalAttarct = DB::table('nothi_attarcts')
            ->where('nothiId',$nothiId)
            ->where('noteId',$id)
            ->where('nijOfficeId',$status)
            ->where('status',1)
            ->count();






            $totalOnuLipi = DB::table('nothi_copies')
            ->where('nothiId',$nothiId)
            ->where('noteId',$id)
            ->where('nijOfficeId',$status)
            ->where('status',1)
            ->count();



                                                    ?>




                                                <div class="col-10">
                                                    <p><i class="fa fa-arrow-right"></i> অনুমোদনকারী ({{ App\Http\Controllers\Admin\CommonController::englishToBangla($totalOnumodonKari) }})</p>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-transparent" data-bs-toggle="modal"
                                                            data-original-title="" data-bs-target="#myModal2">
                                                        <i class="fa fa-user-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-10">
                                                    <p><i class="fa fa-arrow-right"></i> প্রেরক ({{ App\Http\Controllers\Admin\CommonController::englishToBangla($totalPrerok) }})</p>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-transparent" data-bs-toggle="modal"
                                                    data-original-title="" data-bs-target="#myModal2s">
                                                        <i class="fa fa-user-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-10">
                                                    <p><i class="fa fa-arrow-right"></i> প্রাপক ({{ App\Http\Controllers\Admin\CommonController::englishToBangla($totalPrapok) }})</p>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-transparent" data-bs-toggle="modal"
                                                    data-original-title="" data-bs-target="#myModal22">
                                                        <i class="fa fa-user-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-10">
                                                    <p><i class="fa fa-arrow-right"></i> দৃষ্টি আকর্ষণ ({{App\Http\Controllers\Admin\CommonController::englishToBangla($totalAttarct)}})</p>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-transparent" data-bs-toggle="modal"
                                                    data-original-title="" data-bs-target="#myModal222">
                                                        <i class="fa fa-user-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-10">
                                                    <p><i class="fa fa-arrow-right"></i> অনুলিপি ({{ App\Http\Controllers\Admin\CommonController::englishToBangla($totalOnuLipi) }})</p>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-transparent" data-bs-toggle="modal"
                                                    data-original-title="" data-bs-target="#myModal223">
                                                        <i class="fa fa-user-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
        </div>
        <!-- Individual column searching (text inputs) Ends-->
    </div>
</div>
<!-- Container-fluid Ends-->


<!-- note add modal start -->


<div class="modal fade bd-example-modal-lg" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">নতুন নোট তৈরী করুন</h4>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="custom-validation" action="{{ route('parentNote.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                    @csrf

                    <input type="hidden" value="{{ $status }}" placeholder="নোট এর বিষয়" class="form-control" name="status" id=""/>
                    <input type="hidden" value="{{ $parentId }}" placeholder="নোট এর বিষয়" class="form-control" name="dakId" id=""/>
                    <input type="hidden" value="{{ $nothiId }}" placeholder="নোট এর বিষয়" class="form-control" name="nothiId" id=""/>
                    <div class="mb-3">
                    <label class="form-label" for="">নোট এর বিষয় </label>
                    <input type="text" placeholder="নোট এর বিষয়" class="form-control" name="subject" id=""/>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-md mt-3">সংরক্ষণ করুন</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- end note add modal start -->

<!-- nothi approval modal -->
@include('admin.presentDocument.nothiApproverModal')
<!-- end nothi approval modal -->


<!-- nothi sender modal -->
@include('admin.presentDocument.nothiSenderModal')
<!-- end nothi sender modal -->



<!--propok modal data -->
@include('admin.presentDocument.nothiPrapokModal')
<!-- end prapok modal -->


<!-- attract nothi-->
@include('admin.presentDocument.nothiAttractModal')
<!-- end attract nothi -->


<!-- copy nothi -->

@include('admin.presentDocument.nothiCopyModal')
<!-- end copy nothi -->





<!--code for ajax -->


<!--end code for ajax-->
@endsection


@section('script')

<script>

$(".chb").change(function()
                                  {
                                      $(".chb").prop('checked',false);
                                      $(this).prop('checked',true);
                                  });
</script>


<!-- slef oficer add code -->




<script>



$("#otherOfficerAdd").click(function(){

   var otherOfficerName = $("#otherOfficerName").val();
   var otherOfficerDesignation = $("#otherOfficerDesignation").val();
   var otherOfficerAddress = $("#otherOfficerAddress").val();
   var otherOfficerBranch = $("#otherOfficerBranch").val();
   var otherOfficerEmail = $("#otherOfficerEmail").val();
   var otherOfficerPhone = $("#otherOfficerPhone").val();

   var snothiId =$('#snothiId').val();
var sstatus =$('#sstatus').val();

var snoteId =$('#snoteId').val();





   //alert(formData);


   $.ajax({
    url: "{{ route('otherOfficerAdd') }}",
    method: 'get',
    data: {snoteId:snoteId,sstatus:sstatus,snothiId:snothiId,otherOfficerName:otherOfficerName,otherOfficerDesignation:otherOfficerDesignation,otherOfficerAddress:otherOfficerAddress,otherOfficerBranch:otherOfficerBranch,otherOfficerEmail:otherOfficerEmail,otherOfficerPhone:otherOfficerPhone},
    success: function(data) {
      $("#otherOfficerName").val('');
   $("#otherOfficerDesignation").val('');
   $("#otherOfficerAddress").val('');
   $("#otherOfficerBranch").val('');
   $("#otherOfficerEmail").val('');
   $("#otherOfficerPhone").val('');

        $("#sms22").html('<div class="alert" style=" padding: 20px;background-color: #1b4c43 !important;color: white;"><strong>ডেটা সফলভাবে যোগ করা হয়েছে</strong></div>');
        $('#tableListN').html(data);
    }
    });



});


$("#attractOtherOfficerAdd").click(function(){

var otherOfficerName = $("#otherOfficerName2").val();
var otherOfficerDesignation = $("#otherOfficerDesignation2").val();
var otherOfficerAddress = $("#otherOfficerAddress2").val();
var otherOfficerBranch = $("#otherOfficerBranch2").val();
var otherOfficerEmail = $("#otherOfficerEmail2").val();
var otherOfficerPhone = $("#otherOfficerPhone2").val();

var snothiId =$('#snothiId2').val();
var sstatus =$('#sstatus2').val();

var snoteId =$('#snoteId2').val();





//alert(formData);


$.ajax({
 url: "{{ route('attractOtherOfficerAdd') }}",
 method: 'get',
 data: {snoteId:snoteId,sstatus:sstatus,snothiId:snothiId,otherOfficerName:otherOfficerName,otherOfficerDesignation:otherOfficerDesignation,otherOfficerAddress:otherOfficerAddress,otherOfficerBranch:otherOfficerBranch,otherOfficerEmail:otherOfficerEmail,otherOfficerPhone:otherOfficerPhone},
 success: function(data) {
   $("#otherOfficerName2").val('');
$("#otherOfficerDesignation2").val('');
$("#otherOfficerAddress2").val('');
$("#otherOfficerBranch2").val('');
$("#otherOfficerEmail2").val('');
$("#otherOfficerPhone2").val('');

     $("#sms22a").html('<div class="alert" style=" padding: 20px;background-color: #1b4c43 !important;color: white;"><strong>ডেটা সফলভাবে যোগ করা হয়েছে</strong></div>');
     $('#tableListN2').html(data);
 }
 });



});


$("#copyOtherOfficerAdd").click(function(){

var otherOfficerName = $("#otherOfficerName3").val();
var otherOfficerDesignation = $("#otherOfficerDesignation3").val();
var otherOfficerAddress = $("#otherOfficerAddress3").val();
var otherOfficerBranch = $("#otherOfficerBranch3").val();
var otherOfficerEmail = $("#otherOfficerEmail3").val();
var otherOfficerPhone = $("#otherOfficerPhone3").val();

var snothiId =$('#snothiId3').val();
var sstatus =$('#sstatus3').val();

var snoteId =$('#snoteId3').val();





//alert(formData);


$.ajax({
 url: "{{ route('copyOtherOfficerAdd') }}",
 method: 'get',
 data: {snoteId:snoteId,sstatus:sstatus,snothiId:snothiId,otherOfficerName:otherOfficerName,otherOfficerDesignation:otherOfficerDesignation,otherOfficerAddress:otherOfficerAddress,otherOfficerBranch:otherOfficerBranch,otherOfficerEmail:otherOfficerEmail,otherOfficerPhone:otherOfficerPhone},
 success: function(data) {
   $("#otherOfficerName3").val('');
$("#otherOfficerDesignation3").val('');
$("#otherOfficerAddress3").val('');
$("#otherOfficerBranch3").val('');
$("#otherOfficerEmail3").val('');
$("#otherOfficerPhone3").val('');

     $("#sms22c").html('<div class="alert" style=" padding: 20px;background-color: #1b4c43 !important;color: white;"><strong>ডেটা সফলভাবে যোগ করা হয়েছে</strong></div>');
     $('#tableListN3').html(data);
 }
 });



});


$("#selfOfficerAdd").click(function(){



var selfOfficerList =$('#selfOfficerList').val();
var snothiId =$('#snothiId').val();
var sstatus =$('#sstatus').val();
var snoteId =$('#snoteId').val();
//alert(selfOfficerList);


$.ajax({
    url: "{{ route('selfOfficerAdd') }}",
    method: 'get',
    data: {snoteId:snoteId,snothiId:snothiId,sstatus:sstatus,selfOfficerList:selfOfficerList},
    success: function(data) {


        $("#sms2").html('<div class="alert" style=" padding: 20px;background-color: #1b4c43 !important;color: white;"><strong>ডেটা সফলভাবে যোগ করা হয়েছে</strong></div>');
        $('#tableListN').html(data);
    }
    });



});


$("#attractSelfOfficerAdd").click(function(){



var selfOfficerList =$('#attractselfOfficerList').val();
var snothiId =$('#snothiId2').val();
var sstatus =$('#sstatus2').val();
var snoteId =$('#snoteId2').val();
//alert(selfOfficerList);


$.ajax({
    url: "{{ route('attractSelfOfficerAdd') }}",
    method: 'get',
    data: {snoteId:snoteId,snothiId:snothiId,sstatus:sstatus,selfOfficerList:selfOfficerList},
    success: function(data) {


        $("#sms2a").html('<div class="alert" style=" padding: 20px;background-color: #1b4c43 !important;color: white;"><strong>ডেটা সফলভাবে যোগ করা হয়েছে</strong></div>');
        $('#tableListN2').html(data);
    }
    });



});


$("#copySelfOfficerAdd").click(function(){



var selfOfficerList =$('#copyselfOfficerList').val();
var snothiId =$('#snothiId3').val();
var sstatus =$('#sstatus3').val();
var snoteId =$('#snoteId3').val();
//alert(selfOfficerList);


$.ajax({
    url: "{{ route('copySelfOfficerAdd') }}",
    method: 'get',
    data: {snoteId:snoteId,snothiId:snothiId,sstatus:sstatus,selfOfficerList:selfOfficerList},
    success: function(data) {


        $("#sms2c").html('<div class="alert" style=" padding: 20px;background-color: #1b4c43 !important;color: white;"><strong>ডেটা সফলভাবে যোগ করা হয়েছে</strong></div>');
        $('#tableListN3').html(data);
    }
    });



});

    </script>




<!-- end self officer add code -->



<!-- Plugin used-->
<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
<script>
    $('.maineditor').each(function () {

    var ii = $(this).prop('id');
        CKEDITOR.replace(ii);
    });


    CKEDITOR.replace('editor1222');

    //CKEDITOR.replace('mainpeditor');




    </script>
<script>
    CKEDITOR.replace('peditor');
</script>
<script>
    // Turn off automatic editor creation first.
    CKEDITOR.disableAutoInline = true;
    //CKEDITOR.inline('ineditor2' );
    CKEDITOR.inline('ineditor1' );
</script>


<script>
    // Turn off automatic editor creation first.
    CKEDITOR.disableAutoInline = true;
    //CKEDITOR.inline('ineditor2' );
    CKEDITOR.inline('ineditor2' );
</script>


<!--script for  nottangoso start-->
<script type="text/javascript">

    $(document).ready(function () {


        $('body').on('click', '#delete-user1', function () {

            // $("#delete-user1").click(function(){

          var userURL = $(this).data('url');
          var trObj = $(this);

          //alert(22);

          if(confirm("Are you sure you want to remove this user?") == true){
                $.ajax({
                    url: userURL,
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        alert(data.success);
                        trObj.parents("tr").remove();
                    }
                });
          }

       });

    });

</script>


<script type="text/javascript">

    $(document).ready(function () {


        $('body').on('click', '#delete-user12', function () {

            // $("#delete-user1").click(function(){

          var userURL = $(this).data('url');
          var trObj = $(this);

          //alert(22);

          if(confirm("Are you sure you want to remove this user?") == true){
                $.ajax({
                    url: userURL,
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        alert(data.success);
                        trObj.parents("tr").remove();
                    }
                });
          }

       });

    });

</script>


<script type="text/javascript">

    $(document).ready(function () {


        $('body').on('click', '#delete-user13', function () {

            // $("#delete-user1").click(function(){

          var userURL = $(this).data('url');
          var trObj = $(this);

          //alert(22);

          if(confirm("Are you sure you want to remove this user?") == true){
                $.ajax({
                    url: userURL,
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        alert(data.success);
                        trObj.parents("tr").remove();
                    }
                });
          }

       });

    });

</script>


<script>
    $.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

    });

    </script>
@endsection
