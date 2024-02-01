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

		thead, tbody, tfoot, tr, td, th
		{
			border-width: 1px !important;
			border-color: black !important;
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

@include('flashMessage')
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

<button class="btn btn-transparent mt-2 bactive"  onclick="location.href = '{{ route('addChildNote', ['status' => $status,'parentId'=>$parentId,'nothiId'=>$nothiId,'id' =>$checkParents->id,'activeCode' => ($key+1)]) }}';"><span class="me-2" style="padding:2px 5px; border-radius: 6px; border: 1px solid black">{{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }}</span>{{ $checkParents->subject}}</button>
@else
<button class="btn btn-transparent mt-2"  onclick="location.href = '{{ route('addChildNote', ['status' => $status,'parentId'=>$parentId,'nothiId'=>$nothiId,'id' =>$checkParents->id,'activeCode' => ($key+1)]) }}';"><span class="me-2" style="padding:2px 5px; border-radius: 6px; border: 1px solid black">{{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }}</span>{{ $checkParents->subject}}</button>
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
                                                class="icofont icofont-files"></i>পত্রাংশ</a></li>


                                                <!-- new code start --->

                                                @if($status == 'renew')


                                                <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight"
                                                    data-bs-toggle="tab" href="#profile-icon_form_eight" role="tab"
                                                    aria-controls="profile-icon"
                                                    aria-selected="false"><i
                                            class="icofont icofont-file-document"></i>এফডি - ৮ ফরম</a></li>

                                            <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight_nothi"
                                                data-bs-toggle="tab" href="#profile-icon_form_eight_nothi" role="tab"
                                                aria-controls="profile-icon"
                                                aria-selected="false"><i
                                        class="icofont icofont-list"></i>নথিপত্র</a></li>


                                                @elseif($status == 'registration')
                                                <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight"
                                                    data-bs-toggle="tab" href="#profile-icon_form_eight" role="tab"
                                                    aria-controls="profile-icon"
                                                    aria-selected="false"><i
                                            class="icofont icofont-file-document"></i>এফডি - ১ ফরম</a></li>

                                            <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight_nothi"
                                                data-bs-toggle="tab" href="#profile-icon_form_eight_nothi" role="tab"
                                                aria-controls="profile-icon"
                                                aria-selected="false"><i
                                        class="icofont icofont-list"></i>নথিপত্র</a></li>

                                                @elseif($status == 'nameChange')
                                                <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight_nothi"
                                                    data-bs-toggle="tab" href="#profile-icon_form_eight_nothi" role="tab"
                                                    aria-controls="profile-icon"
                                                    aria-selected="false"><i
                                            class="icofont icofont-list"></i>নথিপত্র</a></li>

                                            @elseif($status == 'fdNine')



                                        <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight_nothi"
                                            data-bs-toggle="tab" href="#profile-icon_form_eight_nothi" role="tab"
                                            aria-controls="profile-icon"
                                            aria-selected="false"><i
                                    class="icofont icofont-list"></i>নথিপত্র</a></li>

                                    @elseif($status == 'fdNineOne')


                                    <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight"
                                        data-bs-toggle="tab" href="#profile-icon_form_eight" role="tab"
                                        aria-controls="profile-icon"
                                        aria-selected="false"><i
                                class="icofont icofont-file-document"></i>নিরাপত্তা ছাড়পত্র</a></li>


                                    <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight_nothi"
                                        data-bs-toggle="tab" href="#profile-icon_form_eight_nothi" role="tab"
                                        aria-controls="profile-icon"
                                        aria-selected="false"><i
                                class="icofont icofont-list"></i>নথিপত্র</a></li>
                                @elseif($status == 'fdSix')


                                <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight"
                                    data-bs-toggle="tab" href="#profile-icon_form_eight" role="tab"
                                    aria-controls="profile-icon"
                                    aria-selected="false"><i
                            class="icofont icofont-file-document"></i>এফডি - ৬ ফরম</a></li>


                                <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight_nothi"
                                    data-bs-toggle="tab" href="#profile-icon_form_eight_nothi" role="tab"
                                    aria-controls="profile-icon"
                                    aria-selected="false"><i
                            class="icofont icofont-list"></i>এফডি - ২ ফরম</a></li>

                            @elseif($status == 'fdSeven')


                                <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight"
                                    data-bs-toggle="tab" href="#profile-icon_form_eight" role="tab"
                                    aria-controls="profile-icon"
                                    aria-selected="false"><i
                            class="icofont icofont-file-document"></i>এফডি - ৭ ফরম</a></li>


                                <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight_nothi"
                                    data-bs-toggle="tab" href="#profile-icon_form_eight_nothi" role="tab"
                                    aria-controls="profile-icon"
                                    aria-selected="false"><i
                            class="icofont icofont-list"></i>এফডি - ২ ফরম</a></li>


                            @elseif($status == 'fcOne')


                            <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight"
                                data-bs-toggle="tab" href="#profile-icon_form_eight" role="tab"
                                aria-controls="profile-icon"
                                aria-selected="false"><i
                        class="icofont icofont-file-document"></i>এফসি -১ ফরম</a></li>


                            <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight_nothi"
                                data-bs-toggle="tab" href="#profile-icon_form_eight_nothi" role="tab"
                                aria-controls="profile-icon"
                                aria-selected="false"><i
                        class="icofont icofont-list"></i>এফডি - ২ ফরম</a></li>

                        @elseif($status == 'fcTwo')


                        <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight"
                            data-bs-toggle="tab" href="#profile-icon_form_eight" role="tab"
                            aria-controls="profile-icon"
                            aria-selected="false"><i
                    class="icofont icofont-file-document"></i>এফসি - ২ ফরম</a></li>


                        <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight_nothi"
                            data-bs-toggle="tab" href="#profile-icon_form_eight_nothi" role="tab"
                            aria-controls="profile-icon"
                            aria-selected="false"><i
                    class="icofont icofont-list"></i>এফডি - ২ ফরম</a></li>



                    @elseif($status == 'fdThree')


                    <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight"
                        data-bs-toggle="tab" href="#profile-icon_form_eight" role="tab"
                        aria-controls="profile-icon"
                        aria-selected="false"><i
                class="icofont icofont-file-document"></i>এফডি - ৩ ফরম</a></li>


                    <li class="nav-item"><a class="nav-link" id="profile-icon-tab_form_eight_nothi"
                        data-bs-toggle="tab" href="#profile-icon_form_eight_nothi" role="tab"
                        aria-controls="profile-icon"
                        aria-selected="false"><i
                class="icofont icofont-list"></i>এফডি - ২ ফরম</a></li>



                                                @endif

                                                <!-- end new code --->




                            </ul>
                            <div class="tab-content mt-4" id="icon-tabContent">
                                <div class="tab-pane fade show active" id="icon-home" role="tabpanel"
                                     aria-labelledby="icon-home-tab">

                                     @if(count($checkParent) == 0)
                                     <h3>কোন নোট পাওয়া যায়নি</h3>
                                     @else

                                    @if(count($childNoteNewList) > 0)
                                    @include('admin.presentDocument.childNoteAddSecondStep')
                                    @else
                                    @include('admin.presentDocument.childNoteAddFirstStep')
                                    @endif
                                    @endif


                                </div>
                                <div class="tab-pane fade" id="profile-icon" role="tabpanel"
                                     aria-labelledby="profile-icon-tab">

                                     @if(count($officeDetail) == 0 )

                                     <h5 style="color:red;"><span><i class="fa fa-exclamation-triangle"></i></span>কোনো পত্র পাওয়া যায়নি </h5>

                                     @else
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-sm-12 col-xs-12">
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
                                                                                $dateAppBan='';
                                                                                $appSignature ='';
                                                                                $aphone = '';
                                                                                $aemail = '';

                                                                        }else{





                                                                               $nothiApproverLista = DB::table('admins')->where('id',$nothiApproverList->adminId)
                                                                               ->first();

                                                                               if(!$nothiApproverLista){


                                                                                $appName = '';
                                                                                $desiName = '';
                                                                                $appSignature ='';
                                                                                $aphone = '';
                                                                                $aemail = '';

                                                                               }else{

                                                                                $designationName = DB::table('designation_lists')
                                                                                        ->where('id',$nothiApproverLista->designation_list_id)
                                                                                        ->value('designation_name');


                                                                                $appName = $nothiApproverLista->admin_name_ban;
                                                                                $desiName = $designationName;
                                                                                $appSignature =$nothiApproverLista->admin_sign;

                                                                                $aphone = $nothiApproverLista->admin_mobile;
                                                                                $aemail = $nothiApproverLista->email;


                                                                               }


                                                                               $dateApp =  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d F Y', strtotime($nothiApproverList->created_at)));
                                                                               $dateAppBan =  $nothiApproverList->bangla_date;

                                                                            }



 ?>


 @foreach($officeDetail as $officeDetails)

 <!-- new code potrangso -->
 <?php
$potroZariListValueZari =  DB::table('nothi_details')
                    ->where('noteId',$id)
                    ->where('nothId',$nothiId)
                    ->where('dakId',$parentId)
                    ->where('dakType',$status)
                    ->value('zari_permission_status');

                    $potroZariListValueZariPdf =  DB::table('nothi_details')
                    ->where('noteId',$id)
                    ->where('nothId',$nothiId)
                    ->where('dakId',$parentId)
                    ->where('dakType',$status)
                    ->value('potroPdf');
 ?>
 <!-- end new code potrangso -->


 <!-- new button code start -->

 @if($potroZariListValueZari == 1)

 <button class="btn btn-primary me-2" onclick="location.href = '{{ route('printPotrangso', ['status' => $status,'parentId'=>$parentId,'nothiId'=>$nothiId,'id' =>$id,'sarokCode'=>$officeDetails->id]) }}';"><i class="fa fa-print"></i> প্রিন্ট করুন</button>

 <div class="row mt-3">
    <div class="col-xl-2 ">পত্রের বিষয়:</div>
    <div class="col-xl-10">{!! $officeDetails->office_subject !!}</div>
</div>

 <div class="row mt-3">

    <object
    data='{{ asset('/') }}{{ 'public/'.$potroZariListValueZariPdf }}'
    type="application/pdf"
    width="500"
    height="900"
  >

    <iframe
      src='{{ asset('/')}}{{ 'public/'.$potroZariListValueZariPdf }}'
      width="500"
      height="900"
    >
    <p>This browser does not support PDF!</p>
    </iframe>
  </object>

</div>

 @else

 <div class="d-flex flex-wrap mb-4">


    <?php

        $firstSenderId = DB::table('nothi_first_sender_lists')
        ->where('noteId',$id)
        ->where('nothId',$nothiId)
        ->where('dakId',$parentId)
        ->where('dakType',$status)
        ->where('sender',Auth::guard('admin')->user()->id)
        ->value('id');

        ?>

@if(empty($firstSenderId))

<?php

$potroZariListValue =  DB::table('nothi_details')
                    ->where('noteId',$id)
                    ->where('nothId',$nothiId)
                    ->where('dakId',$parentId)
                    ->where('dakType',$status)
                    ->value('permission_status');

?>

@if($potroZariListValue == 1)
    <div class="dropdown me-2">
        <button class="btn btn-primary dropdown-toggle"
                type="button"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false">
            পত্র অনুমোদন করুন
        </button>
        <div class="dropdown-menu"
             aria-labelledby="dropdownMenuButton1">
            <div>
                <h3 class="popover-header">পত্র অনুমোদন </h3>
                <div class="popover-body">আপনি কি পত্র অনুমোদন করতে চান</div>
                <div class="d-flex justify-content-center p-2">
                    <button  onclick="location.href = '{{ route('givePermissionToNote', ['status' => $status,'parentId'=>$parentId,'nothiId'=>$nothiId,'id' =>$id,'childnote'=>$childNoteNewListValue]) }}';" class="btn btn-primary me-2">হ্যাঁ</button>
                    <button class="btn btn-danger">না</button>
                </div>
            </div>
        </div>
    </div>
    @else
@endif
    @endif
    <button class="btn btn-primary me-2" onclick="location.href = '{{ route('createPotro', ['status' => $status,'parentId'=>$parentId,'nothiId'=>$nothiId,'id' =>$id,'activeCode' =>$activeCode]) }}';"><i class="fa fa-pencil"></i> সংশোধন করুন</button>
    <a target="_blank"    class="btn btn-primary me-2" href = '{{ route('printPotrangso', ['status' => $status,'parentId'=>$parentId,'nothiId'=>$nothiId,'id' =>$id,'sarokCode'=>$officeDetails->id]) }}'><i class="fa fa-print"></i> প্রিন্ট করুন</a>

    <?php
    $potroZariListValue =  DB::table('nothi_details')
                    ->where('noteId',$id)
                    ->where('nothId',$nothiId)
                    ->where('dakId',$parentId)
                    ->where('dakType',$status)
                    ->value('permission_status');



        ?>

        @if($potroZariListValue == 1)
        <button class="btn btn-primary me-2" data-bs-toggle="modal"
        data-original-title="" data-bs-target="#potroZariModal"><i class="fa fa-print"></i>পত্র জারি করুন </button>
        @else


        @endif
</div>

 <!-- new button code end -->


	<table class="table table-borderless">
	<tbody style="border-width:0 !important">
			<tr style="border-width:0 !important">
			<td style="width: 25%; vertical-align: top; border-width:0 !important">
				<img src="{{ asset('/') }}public/bangladesh50.png" alt="" style="height: 60px;width:120px;">
			</td>
			<td style="width: 50%; text-align:center; border-width:0 !important">
				<p>
					গণপ্রজাতন্ত্রী বাংলাদেশ সরকার <br>
					এনজিও বিষয়ক ব্যুরো  <br>
					প্রধানমন্ত্রীর কার্যালয় <br>
					প্লট-ই-১৩/বি, আগারগাঁও, শেরেবাংলা নগর, ঢাকা-১২০৭। <br>
					www:ngoab.gov.bd
				</p>
			</td>
			<td style="width: 25%; text-align: right; vertical-align: top; border-width:0 !important;">
				<img src="{{ asset('/') }}public/mujib100.png" alt="" style="height: 80px;width:120px;">
			</td>
		</tr>
	</tbody>

	</table>
                                                                        <div class="row" class="mt-4">
                                                                            <div class="col-md-6">

                                                                                <?php
                                                                                $potrangshoDraft =  DB::table('potrangsho_drafts')
                                                                                                  ->where('sarokId',$officeDetails->id)
                                                                                                  ->where('status',$status)
                                                                                                  ->orderBy('id','desc')
                                                                                                  ->first();

                                                                                  ?>

@if(!$potrangshoDraft)
<p ><span>স্মারক নং:</span> {{ App\Http\Controllers\Admin\CommonController::englishToBangla($nothiNumber) }}</p>
@else
<div style="display: flex;">
@if(($potrangshoDraft->SentStatus == 0)&&($potrangshoDraft->adminId == Auth::guard('admin')->user()->id))
<p ><span> স্মারক নং:</span> {!! $potrangshoDraft->sarok_number !!}</p>
@else
<p ><span> স্মারক নং:</span> {!! $officeDetails->sarok_number !!}</p>
@endif
</div>

@endif







                                                                            </div>
                                                                            <div class="col-md-6" style="text-align: right;">
																			<div style="display:flex; justify-content:right;">
																			<p>তারিখ:</p>
																			<p>
																			@if($potroZariListValue == 1)
                                                                                            {{ $dateAppBan }} বঙ্গাব্দ  <br> {{ $dateApp }} খ্রিস্টাব্দ
                                                                                            @else

                                                                                            @endif
																			</p>
																			</div>

                                                                            </div>
                                                                        </div>




@if(!$potrangshoDraft)

@else

@if(($potrangshoDraft->SentStatus == 0)&&($potrangshoDraft->adminId == Auth::guard('admin')->user()->id))
<input type="hidden" name="updateOrSubmit" id="updateOrSubmit" value="1"/>
<input type="hidden" name="sorkariUpdateId" id="sorkariUpdateId" value="{{ $officeDetails->id }}"/>
<div class="d-flex justify-content-start mt-3">
  <p >বিষয় : </p>

        {!! $potrangshoDraft->office_subject !!}

</div>
<div class="d-flex justify-content-start">
  @if($potrangshoDraft->office_sutro == '<p>(যদি থাকে):...............................................</p>')

  @else
  <p >সুত্রঃ</p>

{!! $potrangshoDraft->office_sutro !!}
  @endif
  <input type="hidden" name="parentIdForPotrangso" id="parentIdForPotrangso" value="{{ $id }}"/>
                       <input type="hidden" name="statusForPotrangso" id="statusForPotrangso" value="{{ $status }}"/>
</div>
<div class="row">
  <div class="col-xl-12 mt-2">


                  {!! $potrangshoDraft->description !!}



  </div>
</div>

@else
<input type="hidden" name="updateOrSubmit" id="updateOrSubmit" value="1"/>
<input type="hidden" name="sorkariUpdateId" id="sorkariUpdateId" value="{{ $officeDetails->id }}"/>
<div class="d-flex justify-content-start mt-3">
  <p >বিষয় : </p>

        {!! $officeDetails->office_subject !!}

</div>
<div class="d-flex justify-content-start">
  @if($officeDetails->office_sutro == '<p>(যদি থাকে):...............................................</p>')

  @else
  <p style="">সুত্রঃ</p>

{!! $officeDetails->office_sutro !!}
  @endif
  <input type="hidden" name="parentIdForPotrangso" id="parentIdForPotrangso" value="{{ $id }}"/>
                       <input type="hidden" name="statusForPotrangso" id="statusForPotrangso" value="{{ $status }}"/>
</div>
<div class="row">
  <div class="col-xl-12 mt-2">


                  {!! $officeDetails->description !!}



  </div>
</div>
@endif
@endif














                                                                        <!-- approver start --->



                                                                        <div class="mt-4" style="text-align: right;">
                                                                            @if($potroZariListValue == 1)

                                                                            @if(!$nothiApproverLista)

                                                                            @else
                                                                            <img src="{{ asset('/') }}{{ $appSignature }}" style="height:30px;"/><br>
                                                                            @endif

                                                                            @else
                                                                            @endif
                                                                        <span>{{ $appName }}</span><br>
                                                                        <span>{{ $desiName }}</span>

                                                                        @if(!$potrangshoDraft)
                                                                        <br>

@else

@if(($potrangshoDraft->SentStatus == 0)&&($potrangshoDraft->adminId == Auth::guard('admin')->user()->id))

@if(empty($potrangshoDraft->extra_text ) || $potrangshoDraft->extra_text == '<p>..........</p>')
<br>
@else
{!! $potrangshoDraft->extra_text !!}
@endif
@else
@if(empty($officeDetails->extra_text ) || $officeDetails->extra_text == '<p>..........</p>')
<br>
@else
{!! $officeDetails->extra_text !!}
@endif
@endif


@endif

                                                                        <span>ফোন :{{ $aphone }}</span><br>
                                                                        <span>ইমেইল : {{ $aemail }}</span>
                                                                        </div>

                                                                        <!-- approver end -->

                                                                   <!--prapok-->
                                                                    <div class="mt-4">
                                                                        @foreach($nothiPropokListUpdate as $nothiPropokLists)
                                                                        @if(empty($nothiPropokLists->organization_name))
                                                                        {{ $nothiPropokLists->otherOfficerDesignation }}, এনজিও বিষয়ক ব্যুরো</span>।<br>
                                                                         @else
                                                                        {{ $nothiPropokLists->otherOfficerDesignation }}, {{ $nothiPropokLists->organization_name }}, {{ $nothiPropokLists->otherOfficerAddress }}</span> ।<br>
                                                                        @endif
                                                                        @endforeach
                                                                    </div>
                                                                    <!--end prapok  --->

                                                                    <!-- attraction -->

                                                                    @if(count($nothiAttractListUpdate) == 0)

                                                                    @else
                                                                    <h6 class="mt-4">দৃষ্টি আকর্ষণ</h6>
                                                                    @foreach($nothiAttractListUpdate as $nothiPropokLists)
                                                                    @if(empty($nothiPropokLists->organization_name))
                                                                        {{ $nothiPropokLists->otherOfficerDesignation }}, এনজিও বিষয়ক ব্যুরো</span>।<br>
                                                                         @else
                                                                        {{ $nothiPropokLists->otherOfficerDesignation }}, {{ $nothiPropokLists->organization_name }}, {{ $nothiPropokLists->otherOfficerAddress }}</span> ।<br>
                                                                        @endif
                                                                    @endforeach
                                                                    @endif

                                                                    <!-- attracttion -->

                                                                    <!-- sarok number --->

                                                                    @if(count($nothiCopyListUpdate) == 0)

                                                                    @else

                                                                    <div class="row" class="mt-5" style="margin-top:20px;">
                                                                        <div class="col-md-6">
                                                                            @if(!$potrangshoDraft)
                                                                            <p ><span > স্মারক নং:</span> {{ App\Http\Controllers\Admin\CommonController::englishToBangla($nothiNumber) }}</p>
                                                                            @else
                                                                            <div style="display: flex;">
                                                                            @if(($potrangshoDraft->SentStatus == 0)&&($potrangshoDraft->adminId == Auth::guard('admin')->user()->id))
                                                                            <p ><span > স্মারক নং:</span> {!! $potrangshoDraft->sarok_number !!}</p>
                                                                            @else
                                                                            <p ><span > স্মারক নং:</span> {!! $officeDetails->sarok_number !!}</p>
                                                                            @endif
                                                                            </div>

                                                                            @endif
                                                                        </div>
                                                                        <div class="col-md-6" style="text-align: right;">
                                                                            <div style="display:flex; justify-content:right;">
																			<p>তারিখ:</p>
																			<p>
																			@if($potroZariListValue == 1)
                                                                                            {{ $dateAppBan }} বঙ্গাব্দ  <br> {{ $dateApp }} খ্রিস্টাব্দ
                                                                                            @else

                                                                                            @endif
																			</p>
																			</div>
                                                                        </div>
                                                                    </div>

@endif



                                                                    <!-- end sarok number -->

                                                                    <!--copy-->

                                                                    @if(count($nothiCopyListUpdate) == 0)

                                                                    @else
                                                                    <h6 class="mt-4">সদয় জ্ঞাতার্থে/জ্ঞাতার্থে (জ্যেষ্ঠতার ক্রমানুসারে নয় ):</h6>
                                                                    @foreach($nothiCopyListUpdate as $key=>$nothiPropokLists)
                                                                    @if(empty($nothiPropokLists->organization_name))
                                                                    @if(count($nothiCopyListUpdate) == ($key+1))
                                                                    <span>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }} | {{ $nothiPropokLists->otherOfficerDesignation }}, এনজিও বিষয়ক ব্যুরো</span>।
                                                                    @else
                                                                    <span>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }} | {{ $nothiPropokLists->otherOfficerDesignation }}, এনজিও বিষয়ক ব্যুরো</span>;<br>

                                                                    @endif
                                                                    @else


                                                                    @if(count($nothiCopyListUpdate) == ($key+1))
                                                                    <span>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }} | {{ $nothiPropokLists->otherOfficerDesignation }}, {{ $nothiPropokLists->organization_name }}</span>,{{ $nothiPropokLists->otherOfficerAddress }}।
                                                                    @else
                                                                    <span>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }} | {{ $nothiPropokLists->otherOfficerDesignation }}, {{ $nothiPropokLists->organization_name }}</span>,{{ $nothiPropokLists->otherOfficerAddress }};<br>

                                                                    @endif



                                                                    @endif
                                                                    @endforeach
                                                                    @endif

                                                                    <!--end copy list -->
<!--prapok-->
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

    @if(!$potrangshoDraft)
<br>
    @else

    @if(($potrangshoDraft->SentStatus == 0)&&($potrangshoDraft->adminId == Auth::guard('admin')->user()->id))

    @if(empty($potrangshoDraft->extra_text ) || $potrangshoDraft->extra_text == '<p>..........</p>')
<br>
    @else
    {!! $potrangshoDraft->extra_text !!}
    @endif
    @else
    @if(empty($officeDetails->extra_text ) || $officeDetails->extra_text == '<p>..........</p>')
<br>
    @else
    {!! $officeDetails->extra_text !!}
    @endif
    @endif


    @endif

                                                                            <span>ফোন :{{ $aphone }}</span><br>
                                                                            <span>ইমেইল : {{ $aemail }}</span>
    </div>
    @endif
@endforeach



                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @endif
                                </div>


       <!--new code start -->

       @if($status == 'renew')
       <div class="tab-pane fade" id="profile-icon_form_eight" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight">

       @include('admin.renewList.formEightPart')
       </div>

       <div class="tab-pane fade" id="profile-icon_form_eight_nothi" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight_nothi">
       @include('admin.renewList.filePart')

       </div>
       @elseIf($status == 'registration')





       <div class="tab-pane fade" id="profile-icon_form_eight" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight">

       @if($ngoTypeData->ngo_type == 'Foreign')
       @include('admin.registrationList.foreign.fdOneFormNothi')
       @else

       @include('admin.registrationList.fdOneFormNothi')

       @endif
       </div>

       <div class="tab-pane fade" id="profile-icon_form_eight_nothi" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight_nothi">

       @if($ngoTypeData->ngo_type == 'Foreign')
       @include('admin.registrationList.foreign.registrationDocument')

       @else
       @include('admin.registrationList.registrationDocument')

       @endif

       </div>

       @elseIf($status == 'nameChange')

       <div class="tab-pane fade" id="profile-icon_form_eight_nothi" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight_nothi">


       @include('admin.nameChangeList.documentListForNothi')



       </div>
       @elseIf($status == 'fdNine')



       <div class="tab-pane fade" id="profile-icon_form_eight_nothi" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight_nothi">
       @include('admin.fd9form.fd9formDoc')

       </div>

       @elseIf($status == 'fdNineOne')

       <div class="tab-pane fade" id="profile-icon_form_eight" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight">

       @include('admin.fd9Oneform.clearanceLetter')
       </div>

       <div class="tab-pane fade" id="profile-icon_form_eight_nothi" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight_nothi">
       @include('admin.fd9Oneform.fd9OneDoc')

       </div>

       @elseIf($status == 'fdSix')


       <div class="tab-pane fade" id="profile-icon_form_eight" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight">

       @include('admin.fd6form.fd6Form')
       </div>

       <div class="tab-pane fade" id="profile-icon_form_eight_nothi" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight_nothi">
       @include('admin.fd6form.fd2Form')

       </div>

       @elseIf($status == 'fdSeven')


       <div class="tab-pane fade" id="profile-icon_form_eight" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight">

       @include('admin.fd7form.fd7Form')
       </div>

       <div class="tab-pane fade" id="profile-icon_form_eight_nothi" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight_nothi">
       @include('admin.fd7form.fd2Form')

       </div>

       @elseIf($status == 'fcOne')

       <div class="tab-pane fade" id="profile-icon_form_eight" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight">

       @include('admin.fc1form.fc1Form')
       </div>

       <div class="tab-pane fade" id="profile-icon_form_eight_nothi" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight_nothi">
       @include('admin.fc1form.fd2Form')

       </div>

       @elseIf($status == 'fcTwo')

       <div class="tab-pane fade" id="profile-icon_form_eight" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight">

       @include('admin.fc2form.fc2Form')
       </div>

       <div class="tab-pane fade" id="profile-icon_form_eight_nothi" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight_nothi">
       @include('admin.fc2form.fd2Form')

       </div>

       @elseIf($status == 'fdThree')

       <div class="tab-pane fade" id="profile-icon_form_eight" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight">

       @include('admin.fd3form.fd3Form')
       </div>

       <div class="tab-pane fade" id="profile-icon_form_eight_nothi" role="tabpanel"
       aria-labelledby="profile-icon-tab_form_eight_nothi">
       @include('admin.fd3form.fd2Form')

       </div>

       @endif

       <!-- end new code-->







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
                <form id="form" class="custom-validation" action="{{ route('parentNote.store') }}" method="post" enctype="multipart/form-data"  data-parsley-validate="">
                    @csrf

                    <input type="hidden" value="{{ $status }}" placeholder="নোট এর বিষয়" class="form-control" name="status" id="mmStatus"/>
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


<!-- nothi sender list -->
@include('admin.presentDocument.mt2')
<!-- end nothi sender list -->


<!-- nothi sender list -->
@include('admin.presentDocument.mt3')
<!-- end nothi sender list -->


<!-- nothi sender list -->
@include('admin.presentDocument.potroZariModal')
<!-- end nothi sender list -->


<!--code for ajax -->

<input type="hidden" name=""  id="lastChild" value="{{ $childNoteNewListValue }}"/>
<!--end code for ajax-->
@endsection


@section('script')
<script>
    $(document).ready(function(){
  $("[id^=dataMain]").click(function(){

    //alert(123);

    var eid =   $(this).data("eid");

    //mmStatus
    var mmStatus = $('#mmStatus').val();
    var value = $(this).attr('id');
    var getFinalValue = value.slice(8);







    $.ajax({
    url: "{{ route('getdataforNothiList') }}",
    method: 'get',
    data: {mmStatus:mmStatus,getFinalValue:getFinalValue,eid:eid},
    success: function(data) {



        $('#tableListNnn'+getFinalValue).html(data.data);




    },
    beforeSend: function(){
        $('#pageloader').show()
    },
    complete: function(){
        $('#pageloader').hide()
    }
    });


  });
});
</script>

<script>

$(document).on('click', 'a.editButtonFirst', function () {

    var id =   $(this).data("eid");
     //alert(id);

     $(this).hide();

     $(".editButtonSecond"+id).show();


     $("#descriptionFirst"+id).hide();
   // $(".maineditorOne"+id).show();
   // $(".maineditorOne"+id).attr('id','editor'+id);
   // onSelectedChanged();

    });


    function onSelectedChanged(){
        $('.maineditor').each(function () {

var ii = $(this).prop('id');
    CKEDITOR.replace(ii);
});
}




        </script>


<script>
    //jQuery('#copyLink1').on("click", function(event){

        $(document).on('click', 'button#attLink1', function () {
//alert(12);
            //dd(12);

            var lastChild = $('#lastChild').val();
         var name =   $(this).data("name")
    //event.preventDefault();
    var value = $(this).attr('href');
    var snothiId =$('#snothiId').val();
var sstatus =$('#sstatus').val();

var snoteId =$('#snoteId').val();
    //navigator.clipboard.writeText(value);

        //   alertify.set('notifier','position','top-center');
        //   alertify.success('সফলভাবে কপি হয়েছে');


        $.ajax({
    url: "{{ route('addParentAttachment') }}",
    method: 'get',
    data: {lastChild:lastChild,name:name,snoteId:snoteId,sstatus:sstatus,snothiId:snothiId,value:value},
    success: function(data) {

        location.reload(true);
        alertify.set('notifier','position','top-center');
          alertify.success('সফলভাবে কপি হয়েছে');

    }
    });

    });

    </script>


<script>
    //jQuery('#copyLink1').on("click", function(event){

        $(document).on('click', 'button#copyLink1', function () {

    //event.preventDefault();
    value = $(this).attr('href');


    navigator.clipboard.writeText(value);

          alertify.set('notifier','position','top-center');
          alertify.success('সফলভাবে কপি হয়েছে');

    });

    </script>
<script>


    $("#newPara").click(function(){

        $(".mclose").removeClass("show");
        $("#newParaDes").show();

                                  });
</script>

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
	<script>
    $('.maineditorForAdd').each(function () {

var ii = $(this).prop('id');
   CKEDITOR.replace(ii);
});
 </script>
@endsection
