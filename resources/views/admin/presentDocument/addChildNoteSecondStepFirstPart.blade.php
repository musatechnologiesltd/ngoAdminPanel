<style>
    .custom_table_accordion	thead,
    .custom_table_accordion tbody,
    .custom_table_accordion tfoot,
    .custom_table_accordion tr,
    .custom_table_accordion td,
    .custom_table_accordion th
    {
        border-width: 1px !important;
        border-color: black !important;
    }
</style>


<?php

$receiverId = DB::table('nothi_details')
->where('noteId',$id)
->where('nothId',$nothiId)
->where('dakId',$parentId)
->where('dakType',$status)
->where('childId',$childNoteNewLists->id)
->where('sender',Auth::guard('admin')->user()->id)
->value('receiver');



$paraSentStatus = DB::table('nothi_details')
                            ->where('noteId',$id)
                            ->where('nothId',$nothiId)
                            ->where('dakId',$parentId)
                            ->where('dakType',$status)
                            ->where('childId',$childNoteNewLists->id)
                            ->where('sender',Auth::guard('admin')->user()->id)
                            ->orderBy('id','desc')
                            ->value('sent_status_other');


                            $paraViewStatus = DB::table('nothi_details')
                            ->where('noteId',$id)
                            ->where('nothId',$nothiId)
                            ->where('dakId',$parentId)
                            ->where('dakType',$status)
                            ->where('childId',$childNoteNewLists->id)
                            ->orderBy('id','desc')
                            ->where('sender',Auth::guard('admin')->user()->id)
                            ->value('view_status');



?>

<div class="card">
<div class="card-header bg-primary" id="heading{{ $key+1 }}">
  <h5 class="mb-0">
    <button class="btn btn-sm btn-link text-white" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key+1 }}" aria-expanded="true" aria-controls="collapseFour">
       অনুচ্ছেদ#<span>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($activeCode.'.'.$key+1) }}</span> <span style="padding-right:40px;"><span style="font-size: 10px;padding-right:60px;">({{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($childNoteNewLists->created_at))).')'  }}</span>

    </button>
    @if(empty($receiverId))

    @if($key+1 == 1)


@else

    <!-- new delete code -->
    <a class="btn-sm btn btn-primary"  onclick="deleteTag({{ $childNoteNewLists->id}})">


    <i class="fa fa-trash" aria-hidden="true"></i>

</a>


<form id="delete-form-{{ $childNoteNewLists->id }}" action="{{ route('deleteAllParagraph',['id'=>$childNoteNewLists->id,'status'=>$status]) }}" method="POST" style="display: none;">
    @method('DELETE')
                                  @csrf

                              </form>

    <!-- end delete code -->
    @endif

    @endif
  </h5>


</div>

@if(count($childNoteNewList)  == ($key+1))
<div class="mclose collapse show" id="collapse{{ $key+1 }}" aria-labelledby="heading{{ $key+1 }}" data-bs-parent="#accordion1">
@else
<div class="collapse" id="collapse{{ $key+1 }}" aria-labelledby="heading{{ $key+1 }}" data-bs-parent="#accordion1">
@endif



  <div class="card-body">
    <form  class="custom-validation" action="{{ route('childNote.update',$childNoteNewLists->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
        @csrf
        @method('PUT')

        <input type="hidden" value="{{ $status }}" name="status"/>

        <input type="hidden" value="{{ $id }}" name="noteId"/>
        <input type="hidden" value="{{ $activeCode }}" name="activeCode"/>
        <input type="hidden" value="{{ $nothiId }}" name="nothiId"/>
        <input type="hidden" value="{{ $parentId }}" name="dakId"/>
        {{-- <input type="hidden" value="{{ $status }}" name="status"/> --}}
         <div id="container mt-2">

            <div class="custom_table_accordion" id="descriptionFirst{{ $key+1 }}">

            {!! $childNoteNewLists->description !!}
            </div>

    <textarea class="maineditor maineditorOne{{ $key+1 }}" style="display: none;" name="mainPartNote" >

        {!! $childNoteNewLists->description !!}
    </textarea>
</div>
<div id="tableListNnn{{ $childNoteNewLists->id }}">

</div>
<!--start sign code -->

@if($childNoteNewLists->back_sign_status == 1)
<div class="row">
<!--back code -->

<?php
$backSignDetail=DB::table('admins')->where('id',$childNoteNewLists->admin_id)
->first();

$backSignDetailOne=DB::table('admins')->where('id',$childNoteNewLists->receiver_id)
->first();
?>

@if(!$backSignDetail)



@else
<?php
$desiName1 = DB::table('designation_lists')
->where('id',$backSignDetail->designation_list_id)
->value('designation_name');
$branchName1 = DB::table('branches')->where('id',$backSignDetail->branch_id)->value('branch_name');

?>
<div class="col-lg-3 col-md-3 col-sm-6 mb-2">
    <div class="text-center">
    <img src="{{ asset('/') }}{{ $backSignDetail->admin_sign }}" alt="" height="50" width="180">
    <div style="height:1px; width:100%; background-color: #BC1133"></div>
    <p style="line-height:1.4; color: #BC1133; font-size: 14px;">
    {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y H:i:s', strtotime($childNoteNewLists->updated_at))) }}<br>
    {{ $backSignDetail->admin_name_ban }} <br>
    {{ $desiName1 }} <br>
    {{ $branchName1 }}</p>
    </div>
    </div>

@endif
<!-- new code-->
@if(!$backSignDetailOne)



@else
<?php
$desiName1 = DB::table('designation_lists')
->where('id',$backSignDetailOne->designation_list_id)
->value('designation_name');
$branchName1 = DB::table('branches')->where('id',$backSignDetailOne->branch_id)->value('branch_name');

?>
{{-- <div class="col-lg-3 col-md-3 col-sm-6 mb-2" style="margin-top: 50px;">
    <div class="text-center">

    <div style="height:1px; width:100%; background-color: #BC1133"></div>
    <p style="line-height:1.4; color: #BC1133; font-size: 14px;">

    {{ $backSignDetailOne->admin_name_ban }} <br>
    {{ $desiName1 }} <br>
    {{ $branchName1 }}</p>
    </div>
    </div> --}}

@endif
</div>
<!-- end back code -->

@else

<?php

$senderIdNews = DB::table('seal_statuses')
->where('noteId',$id)
->where('nothiId',$nothiId)
//->where('dakId',$parentId)
->where('status',$status)
//->where('seal_status',1)
->where('childId',$childNoteNewLists->id)
->get();

    ?>



<?php
$paraSentStatus = DB::table('nothi_details')
                            ->where('noteId',$id)
                            ->where('nothId',$nothiId)
                            ->where('dakId',$parentId)
                            ->where('dakType',$status)
                            ->where('childId',$childNoteNewLists->id)
                            ->orderBy('id','desc')
                            ->where('sender',Auth::guard('admin')->user()->id)
                            ->value('sent_status_other');
?>



    <div class="row">
<!-- para owner sign  start-->

@if($childNoteNewLists->sent_status == 1)

<?php
$mainSenderIdNews212=DB::table('admins')->where('id',$childNoteNewLists->admin_id)
->get();

?>
@foreach($mainSenderIdNews212 as $mainSenderIdNews22 )
<?php
$desiName1 = DB::table('designation_lists')
    ->where('id',$mainSenderIdNews22->designation_list_id)
    ->value('designation_name');
$branchName1 = DB::table('branches')->where('id',$mainSenderIdNews22->branch_id)->value('branch_name');

?>
<div class="col-lg-3 col-md-3 col-sm-6 mb-2">
    <div class="text-center">
    <img src="{{ asset('/') }}{{ $mainSenderIdNews22->admin_sign }}" alt="" height="50" width="180">
    <div style="height:1px; width:100%; background-color: #BC1133"></div>
    <p style="line-height:1.4; color: #BC1133; font-size: 14px;">
    {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y H:i:s', strtotime($childNoteNewLists->updated_at))) }}<br>
    {{ $mainSenderIdNews22->admin_name_ban }} <br>
    {{ $desiName1 }} <br>
    {{ $branchName1 }}</p>
    </div>
    </div>

@endforeach


@endif


<!-- para owner sign end-->
@foreach($senderIdNews as $jt=>$mainSenderIdNewss44)


<?php
$mainSenderIdNews21=DB::table('admins')->where('id',$mainSenderIdNewss44->receiver)
->get();

?>

@foreach($mainSenderIdNews21 as $mainSenderIdNews22 )

<?php
$desiName1 = DB::table('designation_lists')
    ->where('id',$mainSenderIdNews22->designation_list_id)
    ->value('designation_name');
$branchName1 = DB::table('branches')->where('id',$mainSenderIdNews22->branch_id)->value('branch_name');

?>


<!-- first condition-->

@if($mainSenderIdNewss44->seal_status == 1)

<div class="col-lg-3 col-md-3 col-sm-6 mb-2">

    @else
    <div class="col-lg-3 col-md-3 col-sm-6 mb-2" style="margin-top:50px;">

    @endif


<div class="text-center">
    @if($mainSenderIdNewss44->seal_status == 1)
<img src="{{ asset('/') }}{{ $mainSenderIdNews22->admin_sign }}" alt="" height="50" width="180">
@else

@endif
<div style="height:1px; width:100%; background-color: #BC1133"></div>
<p style="line-height:1.4; color: #BC1133; font-size: 14px;">

    @if($mainSenderIdNewss44->seal_status == 1)
{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y H:i:s', strtotime($mainSenderIdNewss44->updated_at))) }}<br>

@else


@endif
{{ $mainSenderIdNews22->admin_name_ban }} <br>
{{ $desiName1 }} <br>
{{ $branchName1 }}</p>
</div>
</div>

        @endforeach

        @endforeach

    </div>

@endif
<!-- end sign code -->

<!-- end sign code -->
<?php

$unsentAtt = DB::table('note_attachments')
->where('noteId',$id)
->where('nothiId',$nothiId)
->where('status',$status)
//where('admin_id',Auth::guard('admin')->user()->id)
->where('child_id',$childNoteNewLists->id)
->get();

?>



<p class="mt-4">সংযুক্তি({{ count($unsentAtt) }})</p>
<ul>
@foreach($unsentAtt as $unsentAtts )
<li>@if(empty($receiverId))<a  href="{{ route('deleteAttachment',$unsentAtts->id) }}"><i class="fa fa-trash"></i></a>@endif  <a target="_blank" href="{{ $unsentAtts->link }}"><i class="fa fa-paperclip"></i></a> {{ $unsentAtts->title }}</li>
@endforeach
</ul>

<div class="d-flex flex-row-reverse mt-3">

    {{-- <button class="btn btn-danger ms-3" type="button">
        <i class="fa fa-send"></i>
        বাতিল করুন
    </button> --}}
    <div class="dropdown">
        <?php

        $senderIdNew1 = DB::table('nothi_details')
        ->where('noteId',$id)
        ->where('nothId',$nothiId)
        ->where('dakId',$parentId)
        ->where('dakType',$status)
        ->whereNull('back_status')
        //->where('sender',Auth::guard('admin')->user()->id)
        ->value('permission_status');

                    ?>


        @if($senderIdNew1 == 1)

        @else

        @if($childNoteNewLists->back_sign_status == 1)

@else
        <button class="btn-sm btn btn-secondary" value="সংশোধন ও খসড়া" name="final_button" type="submit"

        aria-expanded="false">
       খসড়া
</button>

@endif





@if(empty($paraSentStatus))

@if($childNoteNewLists->admin_id == Auth::guard('admin')->user()->id)

<a class="btn-sm btn btn-primary editButtonFirst" id="dataMain{{ $childNoteNewLists->id }}"  data-eid="{{ $key+1 }}">
সংশোধন করুন
</a>


<button class="btn-sm btn btn-primary editButtonSecond{{ $key+1 }}" style="display: none;"  value="সংশোধন" name="final_button" type="submit"

aria-expanded="false">
সংরক্ষণ করুন
</button>

@else

@endif


                <button data-bs-toggle="modal"
                data-original-title="" data-bs-target="#modalforsenderpp{{ $childNoteNewLists->id }}" class="btn-sm btn btn-info ms-3" type="button">
                    <i class="fa fa-send"></i>
                    নথি প্রেরণ
                </button>


<!-- nothi sender list -->
@include('admin.presentDocument.mt2')
<!-- end nothi sender list -->

                @else


                @if($childNoteNewLists->admin_id == Auth::guard('admin')->user()->id )
                @if($childNoteNewLists->view_status == 1)

                @if($paraViewStatus == 1)


                @else


                <button type="button" class="btn btn-danger ms-3"" data-bs-toggle="modal" data-bs-target="#exampleModalr4r{{ $childNoteNewLists->id }}">
                    <i class="btn-sm fa fa-arrow-circle-left"></i>ফেরত আনুন
                  </button>
                 <!-- nothi sender list -->
                 @include('admin.presentDocument.updateRturnModalOther')
                 <!-- end nothi sender list -->
                @endif

                @else

                {{-- <button data-bs-toggle="modal"
                data-original-title="" data-bs-target="#modalfornewsenderreturn1{{ $childNoteNewLists->id }}" class="btn btn-danger ms-3" type="button">
                    <i class="btn-sm fa fa-arrow-circle-left"></i>
                    ফেরত আনুন
                </button> --}}


                <button type="button" class="btn btn-danger ms-3"" data-bs-toggle="modal" data-bs-target="#exampleModalr4r{{ $childNoteNewLists->id }}">
                    <i class="btn-sm fa fa-arrow-circle-left"></i>ফেরত আনুন
                  </button>


                  <!-- Modal -->
                <!-- nothi sender list -->
                @include('admin.presentDocument.updateRturnModal')
                <!-- end nothi sender list -->

                <!-- nothi sender list -->
@include('admin.presentDocument.mainReturn')
<!-- end nothi sender list -->
                @endif

@else

<!-- new-->

@if($paraViewStatus == 1)


@else


<button type="button" class="btn btn-danger ms-3"" data-bs-toggle="modal" data-bs-target="#exampleModalr4r{{ $childNoteNewLists->id }}">
    <i class="btn-sm fa fa-arrow-circle-left"></i>ফেরত আনুন
  </button>
 <!-- nothi sender list -->
 @include('admin.presentDocument.updateRturnModalOther')
 <!-- end nothi sender list -->
@endif

<!--end new code -->
@endif




                @endif

        @endif







 @if($paraSentStatus == 1)

        <a href="javascript:void(0)" id="newPara" class=" btn-sm btn btn-primary">নতুন অনুচ্ছেদ</a>







 @else



 <a href="javascript:void(0)" id="newPara" class=" btn-sm btn btn-primary">নতুন অনুচ্ছেদ</a>


 @endif



    </div>
</div>


    </form>



<!-- nothi sender list -->
@include('admin.presentDocument.nothiSendToUserModal')
<!-- end nothi sender list -->

</div>
</div>
</div>
