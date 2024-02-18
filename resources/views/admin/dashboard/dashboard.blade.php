@extends('admin.master.master')

@section('title')
ড্যাশবোর্ড
@endsection


@section('body')
 <!-- Container-fluid starts-->
 <div class="container-fluid dashboard-default-sec">
 @include('flash_message')
    <div class="row">
        <div class="col-xl-5 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-12 col-md-6 box-col-6 des-xl-50">
                    <div class="card profile-greeting">
                        <div class="card-header">
                            <div class="header-top">
                                <div class="setting-list bg-primary position-unset">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-white"><i class="icon-user"></i></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center p-t-0">
                            <h3 class="font-light">ফিরে আসার জন্য স্বাগতম, {{ Auth::guard('admin')->user()->name }}!!</h3>
                            <p>আমরা আনন্দিত যে আপনি এই ড্যাশবোর্ড পরিদর্শন করছেন.</p>
                            {{-- <button class="btn btn-light">Update Your Profile</button> --}}
                        </div>
                        <div class="confetti">
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-xl-7 box-col-12 des-xl-100 dashboard-sec">
            <div class="row">




                <div class="col-xl-6 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i class="fa fa-align-left"></i>
                            </div>
                            <h5>{{ $totalRegisteredNgo }}</h5>
                            <p>নিবন্ধন আবেদন</p>

                            <div class="parrten">
                                <i class="fa fa-align-left"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i class="fa fa-history"></i>
                            </div>
                            <h5>{{ $totalRenewNgoRequest }}</h5>
                            <p>নবায়ন আবেদন</p>


                            <div class="parrten">
                                <i class="fa fa-history"></i>
                            </div>
                        </div>
                    </div>
                </div>






            </div>
        </div>

    </div>
</div>

<!--dd-->
<div class="container-fluid dashboard-default-sec">
    <div class="row">

        <div class="col-xl-4 col-md-4 col-sm-4 box-col-4 des-xl-25 rate-sec">
            <div class="card income-card card-primary">
                <div class="card-body text-center">
                    <div class="round-box">
                        <i class="fa fa-file-text-o"></i>
                    </div>
                    <h5>{{ $totalNameChangeNgoRequest }}</h5>
                    <p>নাম পরিবর্তন  আবেদন</p>

                    <div class="parrten">
                        <i class="fa fa-file-text-o"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-4 col-sm-4 box-col-4 des-xl-25 rate-sec">
            <div class="card income-card card-primary">
                <div class="card-body text-center">
                    <div class="round-box">
                        <i class="fa fa-file"></i>
                    </div>
                    <h5>{{ $totalRejectedNgo }}</h5>
                    <p>এন - ভিসা আবেদন </p>

                    <div class="parrten">
                        <i class="fa fa-file"></i>
                    </div>
                </div>
            </div>
        </div>


                <div class="col-xl-4 col-md-4 col-sm-4 box-col-4 des-xl-25 rate-sec">
                    <div class="card income-card card-secondary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i class="fa fa-power-off"></i>
                            </div>
                            <h5>{{ $totalRejectedNameChangeNgoRequest }}</h5>
                            <p>ওয়ার্ক - পারমিট আবেদন</p>

                            <div class="parrten">
                                <i class="fa fa-power-off"></i>
                            </div>
                        </div>
                    </div>
                </div>







                </div>
                </div>
<!--e-->
<!-- Container-fluid Ends-->
 <div class="container-fluid dashboard-default-sec">
    <div class="row">
       <div class="col-sm-12">
            <div class="card">
<div class="card-header">
    <b>আগত ডাকের তালিকা</b>
              </div>
              <div class="card-body">

                        <div class="table-responsive product-table mb-0">
                            <table class="display" id="basic-1">
                                <tbody>


                                  @include('admin.post.registrationDakFirstStep')

                                  @include('admin.post.renewDakFirstStep')


                                  @include('admin.post.nameChangeDakFirstStep')


                                  @include('admin.post.fdNineDakFirstStep')


                                  @include('admin.post.fdNineOneDakFirstStep')


                                  @include('admin.post.fdSixDakFirstStep')


                                  @include('admin.post.fdSevenDakFirstStep')

                                  @include('admin.post.fcOneDakFirstStep')


                                  @include('admin.post.fcTwoDakFirstStep')


                                  @include('admin.post.fdThreeDakFirstStep')


                                  @include('admin.post.duplicateCertificateDakFirstStep')

                                  @include('admin.post.contitutionDakFirstStep')

                                  @include('admin.post.executiveCommitteeDakFirstStep')



                                </tbody>
                            </table>
                        </div>

            </div>
         </div>
      </div>
   </div>
</div>

<!-- Container-fluid Ends-->
<div class="container-fluid dashboard-default-sec">
    <div class="row">
       <div class="col-sm-12">
            <div class="card">
<div class="card-header">
    <b>আগত নথির  তালিকা</b>
              </div>
              <div class="card-body">

                <table class="table table-striped" >
                    <tbody>
                        @foreach ($senderNothiListRegistration->unique('receiver') as $key=>$nothiLists1)

                        <?php

$nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
?>

@if(!$nothiLists)

@else
                    <tr>
                        <td>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <div class="accordion-button collapsed"
                                         data-bs-toggle="collapse"
                                         data-bs-target="#flush-collapseregistration{{ $nothiLists1->id }}">
                                                            <span>
                                                                                                                                            <span style="line-height:3">
                                                <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                            <br>
                                                            <span style="text-align:left;"> <span
                                                                        style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                            <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                            </span>
                                    </div>
                                </h2>
                                <div id="flush-collapseregistration{{ $nothiLists1->id }}"
                                     class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="d-flex mt-3">
                                            <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                                <i class="fa fa-plus"></i>
                                                নতুন নোট
                                            </button>
                                            <button class="btn btn-transparent ms-3" type="button">
                                                <i class="fa fa-envelope"></i>
                                                সকল নোট
                                            </button>
                                        </div>
                                        <div class="card-body">

<?php





if($nothiLists1->dakType == 'registration'){


$allNoteListNew = DB::table('parent_note_for_registrations')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
// ->where('id',$nothiLists1->noteId)
->get();





}



?>
@if(count($allNoteListNew) > 0)
<ul>
@foreach($allNoteListNew as $key=>$allNoteListNews)
                                          <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                                @endforeach
                                            </ul>

                                            @else


                                            <p>কোন নোট পাওয়া যায়নি</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                        @foreach ($senderNothiList->unique('receiver') as $key=>$nothiLists1)

                        <?php

$nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
?>

@if(!$nothiLists)

@else
                    <tr>
                        <td>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <div class="accordion-button collapsed"
                                         data-bs-toggle="collapse"
                                         data-bs-target="#flush-collapse{{ $key+1 }}">
                                                            <span>
                                                                                                                                            <span style="line-height:3">
                                                <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                            <br>
                                                            <span style="text-align:left;"> <span
                                                                        style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                            <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                            </span>
                                    </div>
                                </h2>
                                <div id="flush-collapse{{ $key+1 }}"
                                     class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="d-flex mt-3">
                                            <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                                <i class="fa fa-plus"></i>
                                                নতুন নোট
                                            </button>
                                            <button class="btn btn-transparent ms-3" type="button">
                                                <i class="fa fa-envelope"></i>
                                                সকল নোট
                                            </button>
                                        </div>
                                        <div class="card-body">

<?php

if($nothiLists1->dakType == 'renew'){




$allNoteListNew = DB::table('parent_note_for_renews')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
// ->where('id',$nothiLists1->noteId)
->get();






}

?>
@if(count($allNoteListNew) > 0)
<ul>
@foreach($allNoteListNew as $key=>$allNoteListNews)
                                          <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                                @endforeach
                                            </ul>

                                            @else


                                            <p>কোন নোট পাওয়া যায়নি</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif
                    @endforeach


                    <!-- name change start --->

                    @foreach ($senderNothiListnameChange->unique('receiver') as $key=>$nothiLists1)

                    <?php

$nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
?>

@if(!$nothiLists)

@else
                <tr>
                    <td>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <div class="accordion-button collapsed"
                                     data-bs-toggle="collapse"
                                     data-bs-target="#flush-collapsenameChange{{ $key+1 }}">
                                                        <span>
                                                                                                                                        <span style="line-height:3">
                                            <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                        <br>
                                                        <span style="text-align:left;"> <span
                                                                    style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                        <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                        </span>
                                </div>
                            </h2>
                            <div id="flush-collapsenameChange{{ $key+1 }}"
                                 class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="d-flex mt-3">
                                        <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-plus"></i>
                                            নতুন নোট
                                        </button>
                                        <button class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-envelope"></i>
                                            সকল নোট
                                        </button>
                                    </div>
                                    <div class="card-body">

<?php
if($nothiLists1->dakType == 'nameChange'){






$allNoteListNew = DB::table('parent_note_for_name_changes')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
// ->where('id',$nothiLists1->noteId)
->get();






}



?>
@if(count($allNoteListNew) > 0)
<ul>
@foreach($allNoteListNew as $key=>$allNoteListNews)
                                      <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                            @endforeach
                                        </ul>

                                        @else


                                        <p>কোন নোট পাওয়া যায়নি</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach

                    <!-- name change end -->

                    <!-- fd 9 start --->

                    @foreach ($senderNothiListfdNine->unique('receiver') as $key=>$nothiLists1)

                    <?php

$nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
?>

@if(!$nothiLists)

@else
                <tr>
                    <td>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <div class="accordion-button collapsed"
                                     data-bs-toggle="collapse"
                                     data-bs-target="#flush-collapsefdNine{{ $key+1 }}">
                                                        <span>
                                                                                                                                        <span style="line-height:3">
                                            <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                        <br>
                                                        <span style="text-align:left;"> <span
                                                                    style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                        <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                        </span>
                                </div>
                            </h2>
                            <div id="flush-collapsefdNine{{ $key+1 }}"
                                 class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="d-flex mt-3">
                                        <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-plus"></i>
                                            নতুন নোট
                                        </button>
                                        <button class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-envelope"></i>
                                            সকল নোট
                                        </button>
                                    </div>
                                    <div class="card-body">

<?php

if($nothiLists1->dakType== 'fdNine'){






$allNoteListNew = DB::table('parent_note_for_fd_nines')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
// ->where('id',$nothiLists1->noteId)
->get();





}



?>
@if(count($allNoteListNew) > 0)
<ul>
@foreach($allNoteListNew as $key=>$allNoteListNews)
                                      <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                            @endforeach
                                        </ul>

                                        @else


                                        <p>কোন নোট পাওয়া যায়নি</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach

                    <!-- fd 9 end -->

                    <!-- fd nine one start -->


                    @foreach ($senderNothiListfdNineOne->unique('receiver') as $key=>$nothiLists1)

                    <?php

$nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
?>

@if(!$nothiLists)

@else
                <tr>
                    <td>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <div class="accordion-button collapsed"
                                     data-bs-toggle="collapse"
                                     data-bs-target="#flush-collapsefdNineOne{{ $key+1 }}">
                                                        <span>
                                                                                                                                        <span style="line-height:3">
                                            <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                        <br>
                                                        <span style="text-align:left;"> <span
                                                                    style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                        <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                        </span>
                                </div>
                            </h2>
                            <div id="flush-collapsefdNineOne{{ $key+1 }}"
                                 class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="d-flex mt-3">
                                        <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-plus"></i>
                                            নতুন নোট
                                        </button>
                                        <button class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-envelope"></i>
                                            সকল নোট
                                        </button>
                                    </div>
                                    <div class="card-body">

<?php
if($nothiLists1->dakType == 'fdNineOne'){





$allNoteListNew = DB::table('parent_note_for_fd_nine_ones')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
// ->where('id',$nothiLists1->noteId)
->get();






}



?>
@if(count($allNoteListNew) > 0)
<ul>
@foreach($allNoteListNew as $key=>$allNoteListNews)
                                      <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                            @endforeach
                                        </ul>

                                        @else


                                        <p>কোন নোট পাওয়া যায়নি</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach

                    <!-- fd nine one end -->

                    <!-- fd seven start -->


                    @foreach ($senderNothiListfdSeven->unique('receiver') as $key=>$nothiLists1)

                    <?php

$nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
?>

@if(!$nothiLists)

@else
                <tr>
                    <td>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <div class="accordion-button collapsed"
                                     data-bs-toggle="collapse"
                                     data-bs-target="#flush-collapsefdSeven{{ $key+1 }}">
                                                        <span>
                                                                                                                                        <span style="line-height:3">
                                            <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                        <br>
                                                        <span style="text-align:left;"> <span
                                                                    style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                        <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                        </span>
                                </div>
                            </h2>
                            <div id="flush-collapsefdSeven{{ $key+1 }}"
                                 class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="d-flex mt-3">
                                        <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-plus"></i>
                                            নতুন নোট
                                        </button>
                                        <button class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-envelope"></i>
                                            সকল নোট
                                        </button>
                                    </div>
                                    <div class="card-body">

<?php

if($nothiLists1->dakType == 'fdSeven'){





$allNoteListNew = DB::table('parent_note_for_fd_sevens')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
// ->where('id',$nothiLists1->noteId)
->get();





}



?>
@if(count($allNoteListNew) > 0)
<ul>
@foreach($allNoteListNew as $key=>$allNoteListNews)
                                      <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                            @endforeach
                                        </ul>

                                        @else


                                        <p>কোন নোট পাওয়া যায়নি</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach

                    <!-- fd seven end -->


                    <!-- fd six start -->

                    @foreach ($senderNothiListfdSix->unique('receiver') as $key=>$nothiLists1)

                    <?php

$nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
?>

@if(!$nothiLists)

@else
                <tr>
                    <td>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <div class="accordion-button collapsed"
                                     data-bs-toggle="collapse"
                                     data-bs-target="#flush-collapsefdSix{{ $key+1 }}">
                                                        <span>
                                                                                                                                        <span style="line-height:3">
                                            <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                        <br>
                                                        <span style="text-align:left;"> <span
                                                                    style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                        <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                        </span>
                                </div>
                            </h2>
                            <div id="flush-collapsefdSix{{ $key+1 }}"
                                 class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="d-flex mt-3">
                                        <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-plus"></i>
                                            নতুন নোট
                                        </button>
                                        <button class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-envelope"></i>
                                            সকল নোট
                                        </button>
                                    </div>
                                    <div class="card-body">

<?php
if($nothiLists1->dakType == 'fdSix'){





$allNoteListNew = DB::table('parent_note_for_fdsixes')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
// ->where('id',$nothiLists1->noteId)
->get();





}



?>
@if(count($allNoteListNew) > 0)
<ul>
@foreach($allNoteListNew as $key=>$allNoteListNews)
                                      <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                            @endforeach
                                        </ul>

                                        @else


                                        <p>কোন নোট পাওয়া যায়নি</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach

                    <!-- fd six end-->

                    <!--fc one start -->

                    @foreach ($senderNothiListfcOne->unique('receiver') as $key=>$nothiLists1)

                    <?php

$nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
?>

@if(!$nothiLists)

@else
                <tr>
                    <td>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <div class="accordion-button collapsed"
                                     data-bs-toggle="collapse"
                                     data-bs-target="#flush-collapsefcon{{ $key+1 }}">
                                                        <span>
                                                                                                                                        <span style="line-height:3">
                                            <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                        <br>
                                                        <span style="text-align:left;"> <span
                                                                    style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                        <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                        </span>
                                </div>
                            </h2>
                            <div id="flush-collapsefcon{{ $key+1 }}"
                                 class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="d-flex mt-3">
                                        <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-plus"></i>
                                            নতুন নোট
                                        </button>
                                        <button class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-envelope"></i>
                                            সকল নোট
                                        </button>
                                    </div>
                                    <div class="card-body">

<?php

if($nothiLists1->dakType == 'fcOne'){



$allNoteListNew = DB::table('parent_note_for_fc_ones')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
// ->where('id',$nothiLists1->noteId)
->get();







}



?>
@if(count($allNoteListNew) > 0)
<ul>
@foreach($allNoteListNew as $key=>$allNoteListNews)
                                      <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                            @endforeach
                                        </ul>

                                        @else


                                        <p>কোন নোট পাওয়া যায়নি</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach

                    <!-- fd one end -->

                    <!-- fc two start -->

                    @foreach ($senderNothiListfctwo->unique('receiver') as $key=>$nothiLists1)

                    <?php

$nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
?>

@if(!$nothiLists)

@else
                <tr>
                    <td>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <div class="accordion-button collapsed"
                                     data-bs-toggle="collapse"
                                     data-bs-target="#flush-collapsefctw{{ $key+1 }}">
                                                        <span>
                                                                                                                                        <span style="line-height:3">
                                            <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                        <br>
                                                        <span style="text-align:left;"> <span
                                                                    style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                        <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                        </span>
                                </div>
                            </h2>
                            <div id="flush-collapsefctw{{ $key+1 }}"
                                 class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="d-flex mt-3">
                                        <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-plus"></i>
                                            নতুন নোট
                                        </button>
                                        <button class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-envelope"></i>
                                            সকল নোট
                                        </button>
                                    </div>
                                    <div class="card-body">

<?php
if($nothiLists1->dakType == 'fcTwo'){




$allNoteListNew = DB::table('parent_note_for_fc_twos')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
// ->where('id',$nothiLists1->noteId)
->get();







}



?>
@if(count($allNoteListNew) > 0)
<ul>
@foreach($allNoteListNew as $key=>$allNoteListNews)
                                      <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                            @endforeach
                                        </ul>

                                        @else


                                        <p>কোন নোট পাওয়া যায়নি</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach

                    <!-- fc two end -->

                    <!-- fd three start -->

                    @foreach ($senderNothiListfdThree->unique('receiver') as $key=>$nothiLists1)

                    <?php

$nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
?>

@if(!$nothiLists)

@else
                <tr>
                    <td>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <div class="accordion-button collapsed"
                                     data-bs-toggle="collapse"
                                     data-bs-target="#flush-collapsefdt{{ $key+1 }}">
                                                        <span>
                                                                                                                                        <span style="line-height:3">
                                            <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                        <br>
                                                        <span style="text-align:left;"> <span
                                                                    style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                        <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                        </span>
                                </div>
                            </h2>
                            <div id="flush-collapsefdt{{ $key+1 }}"
                                 class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="d-flex mt-3">
                                        <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-plus"></i>
                                            নতুন নোট
                                        </button>
                                        <button class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-envelope"></i>
                                            সকল নোট
                                        </button>
                                    </div>
                                    <div class="card-body">

<?php

if($nothiLists1->dakType == 'fdThree'){






$allNoteListNew = DB::table('parent_note_for_fd_threes')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
// ->where('id',$nothiLists1->noteId)
->get();





}



?>
@if(count($allNoteListNew) > 0)
<ul>
@foreach($allNoteListNew as $key=>$allNoteListNews)
                                      <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                            @endforeach
                                        </ul>

                                        @else


                                        <p>কোন নোট পাওয়া যায়নি</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach
                    <!-- fd three end -->

                    <!-- duplicate start -->

                    @foreach ($senderNothiListduplicate->unique('receiver') as $key=>$nothiLists1)

                    <?php

$nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
?>

@if(!$nothiLists)

@else
                <tr>
                    <td>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <div class="accordion-button collapsed"
                                     data-bs-toggle="collapse"
                                     data-bs-target="#flush-collapsedup{{ $key+1 }}">
                                                        <span>
                                                                                                                                        <span style="line-height:3">
                                            <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                        <br>
                                                        <span style="text-align:left;"> <span
                                                                    style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                        <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                        </span>
                                </div>
                            </h2>
                            <div id="flush-collapsedup{{ $key+1 }}"
                                 class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="d-flex mt-3">
                                        <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-plus"></i>
                                            নতুন নোট
                                        </button>
                                        <button class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-envelope"></i>
                                            সকল নোট
                                        </button>
                                    </div>
                                    <div class="card-body">

<?php
if($nothiLists1->dakType == 'duplicate'){






$allNoteListNew = DB::table('parent_note_for_duplicate_certificates')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
// ->where('id',$nothiLists1->noteId)
->get();





}



?>
@if(count($allNoteListNew) > 0)
<ul>
@foreach($allNoteListNew as $key=>$allNoteListNews)
                                      <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                            @endforeach
                                        </ul>

                                        @else


                                        <p>কোন নোট পাওয়া যায়নি</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach

                    <!-- duplicate end-->
                    <!-- constitution start-->

                    @foreach ($senderNothiListconstitution->unique('receiver') as $key=>$nothiLists1)

                    <?php

$nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
?>

@if(!$nothiLists)

@else
                <tr>
                    <td>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <div class="accordion-button collapsed"
                                     data-bs-toggle="collapse"
                                     data-bs-target="#flush-collapsecon{{ $key+1 }}">
                                                        <span>
                                                                                                                                        <span style="line-height:3">
                                            <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                        <br>
                                                        <span style="text-align:left;"> <span
                                                                    style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                        <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                        </span>
                                </div>
                            </h2>
                            <div id="flush-collapsecon{{ $key+1 }}"
                                 class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="d-flex mt-3">
                                        <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-plus"></i>
                                            নতুন নোট
                                        </button>
                                        <button class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-envelope"></i>
                                            সকল নোট
                                        </button>
                                    </div>
                                    <div class="card-body">

<?php


if($nothiLists1->dakType == 'constitution'){






$allNoteListNew = DB::table('parent_note_for_constitutions')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
// ->where('id',$nothiLists1->noteId)
->get();





}



?>
@if(count($allNoteListNew) > 0)
<ul>
@foreach($allNoteListNew as $key=>$allNoteListNews)
                                      <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                            @endforeach
                                        </ul>

                                        @else


                                        <p>কোন নোট পাওয়া যায়নি</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach

                    <!-- constitution end-->

                    <!-- executive committee start-->

                    @foreach ($senderNothiListcommittee->unique('receiver') as $key=>$nothiLists1)

                    <?php

$nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
?>

@if(!$nothiLists)

@else
                <tr>
                    <td>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <div class="accordion-button collapsed"
                                     data-bs-toggle="collapse"
                                     data-bs-target="#flush-collapseccc{{ $key+1 }}">
                                                        <span>
                                                                                                                                        <span style="line-height:3">
                                            <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                        <br>
                                                        <span style="text-align:left;"> <span
                                                                    style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                        <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                        </span>
                                </div>
                            </h2>
                            <div id="flush-collapseccc{{ $key+1 }}"
                                 class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="d-flex mt-3">
                                        <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-plus"></i>
                                            নতুন নোট
                                        </button>
                                        <button class="btn btn-transparent ms-3" type="button">
                                            <i class="fa fa-envelope"></i>
                                            সকল নোট
                                        </button>
                                    </div>
                                    <div class="card-body">

<?php

if($nothiLists1->dakType == 'committee'){






$allNoteListNew = DB::table('parent_not_for_executive_committees')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)
// ->where('id',$nothiLists1->noteId)
->get();





}



?>
@if(count($allNoteListNew) > 0)
<ul>
@foreach($allNoteListNew as $key=>$allNoteListNews)
                                      <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                            @endforeach
                                        </ul>

                                        @else


                                        <p>কোন নোট পাওয়া যায়নি</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach

                    <!-- executive committee end-->
                    </tbody>
                </table>

            </div>

            </div>
       </div>
    </div>
</div>
@endsection

@section('script')


@endsection



