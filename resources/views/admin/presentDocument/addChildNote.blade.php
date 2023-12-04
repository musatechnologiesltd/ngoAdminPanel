@extends('admin.master.master')

@section('title')
নোটাংশ
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
                <h3>নোটাংশ</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">নোটাংশ</a></li>
                    <li class="breadcrumb-item">নোটাংশ</li>
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
                                <div class="col-lg-2 col-sm-12">
                                    <div style="border-right: 1px solid gray; height:100%">

                                        <!-- add note button -->
                                        <button class="btn btn-outline-success" data-bs-toggle="modal" data-original-title="" data-bs-target="#myModal3" data-bs-original-title="" title=""><i class="fa fa-calendar"></i> নতুন নোট</button>
<!-- end add note button -->






                                        @if(count($checkParent) == 0)

                                        @else
                                        <p class="mt-2">মোট নোট <span>({{ App\Http\Controllers\Admin\CommonController::englishToBangla(count($checkParent)) }})</span></p>
                                        <hr>

                                        @foreach($checkParent as $key=>$checkParents)

@if($activeCode == ($key+1))

<button class="btn btn-transparent mt-2 bactive"  onclick="location.href = '{{ route('addChildNote', ['status' => $status,'parentId'=>$parentId,'nothiId'=>$nothiId,'id' =>$checkParents->id,'activeCode' => ($key+1)]) }}';"><span class="me-2" style="padding:2px 5px; border-radius: 6px; border: 1px solid black">{{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }}</span>{{ $checkParents->name }}</button>
@else
<button class="btn btn-transparent mt-2"  onclick="location.href = '{{ route('addChildNote', ['status' => $status,'parentId'=>$parentId,'nothiId'=>$nothiId,'id' =>$checkParents->id,'activeCode' => ($key+1)]) }}';"><span class="me-2" style="padding:2px 5px; border-radius: 6px; border: 1px solid black">{{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }}</span>{{ $checkParents->name }}</button>
@endif

                                        @if(count($checkParent) == ($key+1))

                                        @else
                                        <hr>
                                        @endif
                                        @endforeach

                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-10 col-sm-12">
                            <ul class="nav nav-tabs" id="icon-tab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="icon-home-tab"
                                                        data-bs-toggle="tab" href="#icon-home" role="tab"
                                                        aria-controls="icon-home" aria-selected="true"><i
                                                class="icofont icofont-ui-home"></i>নোটাংশ</a></li>
                                <li class="nav-item"><a class="nav-link" id="profile-icon-tab"
                                                        data-bs-toggle="tab" href="#profile-icon" role="tab"
                                                        aria-controls="profile-icon"
                                                        aria-selected="false"><i
                                                class="icofont icofont-man-in-glasses"></i>পত্রাংশ</a></li>
                            </ul>
                            <div class="tab-content mt-4" id="icon-tabContent">
                                <div class="tab-pane fade show active" id="icon-home" role="tabpanel"
                                     aria-labelledby="icon-home-tab">

                                     @if(count($checkParent) == 0)
                                     <h3>কোন নোট পাওয়া যায়নি</h3>
                                     @else


                                     <!--first note start-->

                                    <?php



if($status == 'registration'){


$checkParentFirst = DB::table('parent_note_for_registrations')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
   ->first();


   $childNoteNewList = DB::table('child_note_for_registrations')
           ->where('parent_note_regid',$checkParentFirst->id)->get();


}elseif($status == 'renew'){




$checkParentFirst = DB::table('parent_note_for_renews')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->first();


$childNoteNewList = DB::table('child_note_for_renews')
           ->where('parent_note_for_renew_id',$checkParentFirst->id)->get();



}elseif($status == 'nameChange'){






$checkParentFirst = DB::table('parent_note_for_name_changes')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->first();


$childNoteNewList = DB::table('child_note_for_name_changes')
           ->where('parentnote_name_change_id',$checkParentFirst->id)->get();



}elseif($status == 'fdNine'){






$checkParentFirst = DB::table('parent_note_for_fd_nines')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->first();


$childNoteNewList = DB::table('child_note_for_fd_nines')
           ->where('p_note_for_fd_nine_id',$checkParentFirst->id)->get();

//dd($checkParent);


}elseif($status == 'fdNineOne'){





$checkParentFirst = DB::table('parent_note_for_fd_nine_ones')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->first();

$childNoteNewList = DB::table('child_note_for_fd_nine_ones')
           ->where('p_note_for_fd_nine_one_id',$checkParentFirst->id)->get();




}elseif($status == 'fdSix'){




$checkParentFirst = DB::table('parent_note_for_fdsixes')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->first();

$childNoteNewList = DB::table('child_note_for_fd_sixes')
           ->where('parent_note_for_fdsix_id',$checkParentFirst->id)->get();



}elseif($status == 'fdSeven'){





$checkParentFirst = DB::table('parent_note_for_fd_sevens')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->first();

$childNoteNewList = DB::table('child_note_for_fd_sevens')
           ->where('parent_note_for_fd_seven_id',$checkParentFirst->id)->get();



}elseif($status == 'fcOne'){



$checkParentFirst = DB::table('parent_note_for_fc_ones')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->first();


$childNoteNewList = DB::table('child_note_for_fc_ones')
           ->where('parent_note_for_fc_one_id',$checkParentFirst->id)->get();




}elseif($status == 'fcTwo'){




$checkParentFirst = DB::table('parent_note_for_fc_twos')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->first();

$childNoteNewList = DB::table('child_note_for_fc_twos')
           ->where('parent_note_for_fc_two_id',$checkParentFirst->id)->get();





}elseif($status == 'fdThree'){






$checkParentFirst = DB::table('parent_note_for_fd_threes')->where('nothi_detail_id',$parentId)
->where('serial_number',$nothiId)
->first();


$childNoteNewList = DB::table('child_note_for_fd_threes')
           ->where('parent_note_for_fd_three_id',$checkParentFirst->id)->get();


}





                                    ?>

                                     <!--end first note-->

                                 @if(count($childNoteNewList) > 0)

                                 {{-- <h3>কোন নোট পাওয়া যায়নি</h3> --}}


                                 <div class="card-body">
                                    <div class="default-according" id="accordion1">

@foreach($childNoteNewList as $key=>$childNoteNewLists)

                                      <div class="card">
                                        <div class="card-header bg-primary" id="heading{{ $key+1 }}">
                                          <h5 class="mb-0">
                                            <button class="btn btn-link text-white" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key+1 }}" aria-expanded="true" aria-controls="collapseFour">অনুচ্ছেদ#<span>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }}</span> <span style="padding-right:40px;">{{ App\Http\Controllers\Admin\CommonController::englishToBangla($childNoteNewLists->created_at) }}</span>
                                          </h5>
                                        </div>
                                        <div class="collapse" id="collapse{{ $key+1 }}" aria-labelledby="heading{{ $key+1 }}" data-bs-parent="#accordion1">
                                          <div class="card-body">
                                            <form class="custom-validation" action="{{ route('childNote.update',$childNoteNewLists->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="{{ $status }}" name="status"/>
                                                 <div id="container">
                                            <textarea class="maineditor" name="mainPartNote" id="editor{{ $key+1 }}">

                                                {!! $childNoteNewLists->description !!}
                                            </textarea>
                                        </div>


                                        <div class="d-flex flex-row-reverse mt-3">

                                            <button class="btn btn-danger ms-3" type="button">
                                                <i class="fa fa-send"></i>
                                                বাতিল করুন
                                            </button>
                                            <div class="dropdown">
                                                <button class="btn btn-primary " type="submit"

                                                        aria-expanded="false">
                                                        সংশোধন করুন
                                                </button>
                                                {{-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" href="#">সংরক্ষন করুন</a></li>
                                                    <li><a class="dropdown-item" href="#">সংরক্ষন ও খসড়া</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">সংরক্ষন ও নতুন
                                                            অনুচ্ছেদ</a></li>
                                                    <li><a class="dropdown-item" href="#">সংরক্ষন ও প্রেরণ</a>
                                                    </li>
                                                </ul> --}}
                                            </div>
                                        </div>


                                            </form>


                                        </div>
                                        </div>
                                      </div>
                                      @endforeach

                                      <div class="card">
                                        <div class="card-header bg-primary" id="headingSix">
                                          <h5 class="mb-0">
                                            <button class="btn btn-link collapsed text-white" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">নতুন অনুচ্ছেদ</button>
                                          </h5>
                                        </div>
                                        <div class="collapse show" id="collapseSix" aria-labelledby="headingSix" data-bs-parent="#accordion1">
                                          <div class="card-body">


                                            <form class="custom-validation" action="{{ route('childNote.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                                @csrf
                                                <input type="hidden" value="{{ $checkParentFirst->id }}" name="parentNoteId"/>
                                                <input type="hidden" value="{{ $status }}" name="status"/>
                                            <div id="container">
                                                <textarea class="maineditor" id="mainpeditor"  name="mainPartNote">
                                                    <p>লিখুন</p>
                                                </textarea>
                                            </div>
                                            <div class="d-flex flex-row-reverse mt-3">

                                                <button class="btn btn-danger ms-3" type="button">
                                                    <i class="fa fa-send"></i>
                                                    বাতিল করুন
                                                </button>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary " type="submit"

                                                            aria-expanded="false">
                                                        সংরক্ষন করুন
                                                    </button>
                                                    {{-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href="#">সংরক্ষন করুন</a></li>
                                                        <li><a class="dropdown-item" href="#">সংরক্ষন ও খসড়া</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">সংরক্ষন ও নতুন
                                                                অনুচ্ছেদ</a></li>
                                                        <li><a class="dropdown-item" href="#">সংরক্ষন ও প্রেরণ</a>
                                                        </li>
                                                    </ul> --}}
                                                </div>
                                            </div>
                                             </form>



                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>





                                 @else
                                     <form class="custom-validation" action="{{ route('childNote.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        <input type="hidden" value="{{ $checkParentFirst->id }}" name="parentNoteId"/>
                                        <input type="hidden" value="{{ $status }}" name="status"/>
                                    <div id="container">
                                        <textarea id="peditor"  name="mainPartNote">
                                            <p>লিখুন</p>
                                        </textarea>
                                    </div>
                                    <div class="d-flex flex-row-reverse mt-3">

                                        <button class="btn btn-danger ms-3" type="button">
                                            <i class="fa fa-send"></i>
                                            বাতিল করুন
                                        </button>
                                        <div class="dropdown">
                                            <button class="btn btn-primary " type="submit"

                                                    aria-expanded="false">
                                                সংরক্ষন করুন
                                            </button>
                                            {{-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#">সংরক্ষন করুন</a></li>
                                                <li><a class="dropdown-item" href="#">সংরক্ষন ও খসড়া</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">সংরক্ষন ও নতুন
                                                        অনুচ্ছেদ</a></li>
                                                <li><a class="dropdown-item" href="#">সংরক্ষন ও প্রেরণ</a>
                                                </li>
                                            </ul> --}}
                                        </div>
                                    </div>
                                     </form>
                                    @endif
                                    @endif


                                </div>
                                <div class="tab-pane fade" id="profile-icon" role="tabpanel"
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
                                                                    aria-selected="true">অফিস স্মারক</a><a
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
                                                                    aria-selected="false">বিজ্ঞপ্তি/নোটিশ</a>
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
                                                                        <div class="text-center mb-3">
                                                                            <h3>গণপ্রজাতন্ত্রী বাংলাদেশ
                                                                                সরকার</h3>
                                                                            <h5>এনজিও বিষয়ক ব্যুরো <br>
                                                                                প্রধানমন্ত্রীর কার্যালয় <br>
                                                                                প্লট-ই, ১৩/বি, আগারগাঁও <br>
                                                                                শেরেবাংলা নগর, ঢাকা-১২০৭
                                                                            </h5>
                                                                        </div>
                                                                        <p>স্মারক নং- {{ App\Http\Controllers\Admin\CommonController::englishToBangla('১১.২২.৩৩৩৩.৪৪৪.৫৫.'.$nothiNumber) }}</p>


                                                                      @if(count($officeDetail) > 0 )
                                                                      <form class="custom-validation" action="{{ route('officeSarok.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                                                      @foreach($officeDetail as $officeDetails)
                                                                      <input type="hidden" name="updateOrSubmit" id="updateOrSubmit" value="1"/>
                                                                      <input type="hidden" name="sorkariUpdateId" id="sorkariUpdateId" value="{{ $officeDetails->id }}"/>
                                                                      <div class="row">
                                                                        <div class="col-xl-3">বিষয় :
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

                                                                                             <input type="hidden" name="parentIdForPotrangso" id="parentIdForPotrangso" value="{{ $id }}"/>
                                                                                             <input type="hidden" name="statusForPotrangso" id="statusForPotrangso" value="{{ $status }}"/>
                                                                    </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-xl-12">

                                                                                <label class="form-label">সম্পাদন শেষ করুন</label>



                                                                                <textarea id="editor1222" class="mainEdit"  name="maindes" >
                                                                                        {!! $officeDetails->description !!}
                                                                                    </textarea>


                                                                        </div>
                                                                    </div>

                                                                      @endforeach

                                                                      <button class="btn btn-primary  mt-2" id="sorkariSarokUpdate"

                                                                      aria-expanded="false">
                                                                      সংশোধন করুন
                                                              </button>
                                                            </form>
                                                                      @else
                                                                      <form class="custom-validation" action="{{ route('officeSarok.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                                                        @csrf
                                                                        <div class="row">
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
                                                <div class="col-10">
                                                    <p><i class="fa fa-arrow-right"></i> অনুমোদনকারী</p>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-transparent" data-bs-toggle="modal"
                                                            data-original-title="" data-bs-target="#myModal2">
                                                        <i class="fa fa-user-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-10">
                                                    <p><i class="fa fa-arrow-right"></i> প্রেরক</p>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-transparent">
                                                        <i class="fa fa-user-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-10">
                                                    <p><i class="fa fa-arrow-right"></i> প্রাপক</p>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-transparent" data-bs-toggle="modal"
                                                    data-original-title="" data-bs-target="#myModal22">
                                                        <i class="fa fa-user-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-10">
                                                    <p><i class="fa fa-arrow-right"></i> দৃষ্টি আকর্ষণ</p>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-transparent">
                                                        <i class="fa fa-user-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-10">
                                                    <p><i class="fa fa-arrow-right"></i> অনুলিপি</p>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-transparent">
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
<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModal2"  role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel2">
        অনুমোদনকারী</h4>
</div>

<div class="modal-body">
    <div class="card">
        <div class="card-body">
            <form action="">
                <div class="mb-3">
                    <label class="form-label" for="">অফিসার খুজুন</label> <br>
                    <select class="form-control js-example-basic-single" style="width: 100%" name="" id="">

                        @foreach($user as $users)
                        <option value="{{ $users->id }}">{{ $users->admin_name_ban }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mt-3">
                    <button class="btn btn-info-gradien">সংরক্ষণ করুন</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
</div>


<!--propok modal data -->
<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModal22" role="dialog"
aria-labelledby="myModalLabel22">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel2">
        প্রাপক </h4>
</div>

<div class="modal-body">
    <div class="card">

        <div class="card-body">
          <ul class="nav nav-tabs" id="icon-tab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="icon-home-tab" data-bs-toggle="tab" href="#icon-home1" role="tab" aria-controls="icon-home" aria-selected="true"><i class="icofont icofont-ui-home"></i>অফিসার খুজুন</a></li>
            <li class="nav-item"><a class="nav-link" id="profile-icon-tab" data-bs-toggle="tab" href="#profile-icon1" role="tab" aria-controls="profile-icon" aria-selected="false"><i class="icofont icofont-man-in-glasses"></i>অফিসার তথ্য নিজে লিখুন</a></li>
            <li class="nav-item"><a class="nav-link" id="contact-icon-tab" data-bs-toggle="tab" href="#contact-icon1" role="tab" aria-controls="contact-icon" aria-selected="false"><i class="icofont icofont-contacts"></i>বাছাইকৃত অফিসারগণ </a></li>
          </ul>
          <div class="tab-content" id="icon-tabContent">
            <div class="tab-pane fade show active" id="icon-home1" role="tabpanel" aria-labelledby="icon-home-tab">

                    <div class="mb-3 mt-4">
                        <label class="form-label" for="">অফিসার খুজুন</label> <br>
                        <select class="form-control js-example-basic-single" style="width: 100%" name="" id="selfOfficerList">

                            @foreach($user as $users)
                            <option value="{{ $users->id }}">{{ $users->admin_name_ban }}</option>
                            @endforeach

                        </select>


                        <input type="hidden" id="snothiId" value="{{ $nothiId }}"/>
                        <input type="hidden" id="sstatus" value="{{ $status }}"/>




                    </div>
                    <div class="mt-3">
                        <button class="btn btn-info-gradien"  id="selfOfficerAdd">সংরক্ষণ করুন</button>
                    </div>

            </div>
            <div class="tab-pane fade" id="profile-icon1" role="tabpanel" aria-labelledby="profile-icon-tab">
                <form action="" class="mt-4">
                    <div class="mb-3">
                        <label class="form-label" for="">অফিসার</label>
                         <input type="text" name="" class="form-control"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">পদবি</label>
                         <input type="text" name="" class="form-control"/>
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="">কার্যালয়/ঠিকানা</label>
                         <input type="text" name="" class="form-control"/>
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="">দপ্তর/শাখা </label>
                         <input type="text" name="" class="form-control"/>
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="">ইমেইল </label>
                         <input type="text" name="" class="form-control"/>
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="">মোবাইল</label>
                         <input type="text" name="" class="form-control"/>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-info-gradien">সংরক্ষণ করুন</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="contact-icon1" role="tabpanel" aria-labelledby="contact-icon-tab">
                <table class="table table-borderless" id="tableListN">

                    <tr>
                        <td><span class="text-bold">Name</span> Podobi</td>
                        <td><button class="btn btn-primary"><i class="fa fa-trash"></i></button></td>
                    </tr>

                  </table>
            </div>
          </div>
        </div>
      </div>
</div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
</div>
<!-- end prapok modal -->


<!--code for ajax -->


<!--end code for ajax-->
@endsection


@section('script')


<!-- slef oficer add code -->




<script>

$("#selfOfficerAdd").click(function(){



var selfOfficerList =$('#selfOfficerList').val();
var snothiId =$('#snothiId').val();
var sstatus =$('#sstatus').val();

//alert(selfOfficerList);


$.ajax({
    url: "{{ route('selfOfficerAdd') }}",
    method: 'get',
    data: {snothiId:snothiId,sstatus:sstatus,selfOfficerList:selfOfficerList},
    success: function(data) {


        tableListN
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



<script>
    $.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

    });

    </script>
@endsection
