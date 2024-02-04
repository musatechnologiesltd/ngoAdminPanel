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

<div class="card">
    <div class="card-header bg-primary" id="heading{{ $key+1 }}">
      <h5 class="mb-0">
        <button class="btn btn-link text-white" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key+1 }}" aria-expanded="true" aria-controls="collapseFour">

            অনুচ্ছেদ#<span>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($activeCode.'.'.$key+1) }}</span> <span style="padding-right:40px;"><span style="font-size: 10px;padding-right:60px;">({{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($childNoteNewLists->created_at))).')'  }}</span>
        </button>

        @if($childNoteNewLists->admin_id == Auth::guard('admin')->user()->id)

        @if(($childNoteNewLists->sent_status == 1) && ($childNoteNewLists->admin_id == Auth::guard('admin')->user()->id))


    @else


@if($key+1 == 1)


@else
<!-- new delete code -->
<a class="btn-sm btn btn-outline-danger"  onclick="deleteTag({{ $childNoteNewLists->id}})">


    <i class="fa fa-trash" aria-hidden="true"></i>

</a>


<form id="delete-form-{{ $childNoteNewLists->id }}" action="{{ route('deleteAllParagraph',['id'=>$childNoteNewLists->id,'status'=>$status]) }}" method="POST" style="display: none;">
    @method('DELETE')
                                  @csrf

                              </form>

    <!-- end delete code -->
@endif

@endif
        @else


        @endif
      </h5>
    </div>
    @if(count($childNoteNewList)  == ($key+1))
    <div class="mclose collapse show" id="collapse{{ $key+1 }}" aria-labelledby="heading{{ $key+1 }}" data-bs-parent="#accordion1">
@else
<div class="collapse" id="collapse{{ $key+1 }}" aria-labelledby="heading{{ $key+1 }}" data-bs-parent="#accordion1">
@endif
      <div class="card-body">
        <form class="custom-validation" action="{{ route('childNote.update',$childNoteNewLists->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
            @csrf
            @method('PUT')

            <input type="hidden" value="{{ $status }}" name="status"/>

            <input type="hidden" value="{{ $id }}" name="noteId"/>
            <input type="hidden" value="{{ $activeCode }}" name="activeCode"/>
            <input type="hidden" value="{{ $nothiId }}" name="nothiId"/>
            <input type="hidden" value="{{ $parentId }}" name="dakId"/>
             <div id="container">

<!-- new code start -->
{!! $childNoteNewLists->description !!}
<!-- new code end -->
    </div>

  <?php

$senderIdNew = DB::table('nothi_details')
->where('noteId',$id)
->where('nothId',$nothiId)
->where('dakId',$parentId)
->where('dakType',$status)
//->whereNull('back_status')
->where('receiver',Auth::guard('admin')->user()->id)
->orWhere('sender',Auth::guard('admin')->user()->id)
->get();


// dd($senderIdNew);

    ?>




    <div class="row">

@if(count($senderIdNew) == 0)

@else

@foreach($senderIdNew as $senderIdNew)

<?php

$mainSenderIdNew =DB::table('article_signs')
->where('dakDetailId',$senderIdNew->id)
->where('childId',$childNoteNewLists->id)->get();

//dd($mainSenderIdNew);
?>
@if(count($mainSenderIdNew) == 0)

@else

@foreach($mainSenderIdNew as $j=>$mainSenderIdNews)

<?php
$adminId = DB::table('admins')->where('id',$mainSenderIdNews->sender)->first();
$adminId2 = DB::table('admins')->where('id',$mainSenderIdNews->permissionId)->first();

?>

@if(!$adminId)

@else

<?php
$desiName = DB::table('designation_lists')
    ->where('id',$adminId->designation_list_id)
    ->value('designation_name');
$branchName = DB::table('branches')->where('id',$adminId->branch_id)->value('branch_name');

?>
@if($mainSenderIdNews->back_status == 1)

@else

<div class="col-lg-3 col-md-3 col-sm-6 mb-2">
<div class="text-center">
<img src="{{ asset('/') }}{{ $adminId->admin_sign }}" alt="" height="50" width="180">
<div style="height:1px; width:100%; background-color: #BC1133"></div>
<p style="line-height:1.4; color: #BC1133; font-size: 14px;">
{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y H:i:s', strtotime($mainSenderIdNews->created_at))) }}<br>
{{ $adminId->admin_name_ban }} <br>
{{ $desiName }} <br>
{{ $branchName }}</p>
</div>
</div>
@endif


        @endif
        @endforeach

        @if(!$adminId2)

@else

<?php


$desiName1 = DB::table('designation_lists')
    ->where('id',$adminId2->designation_list_id)
    ->value('designation_name');
$branchName1 = DB::table('branches')->where('id',$adminId2->branch_id)->value('branch_name');



?>
@if($mainSenderIdNews->back_status == 1)

@else
@if($senderIdNew->permission_status == 1)
        <div class="col-lg-3 col-md-3 col-sm-6 mb-2" >
            @else
            <div class="col-lg-3 col-md-3 col-sm-6 mb-2" style="margin-top: 50px;">
            @endif
            <div class="text-center">
                @if($senderIdNew->permission_status == 1)
                <img src="{{ asset('/') }}{{ $adminId2->admin_sign }}" alt="" height="50" width="180">
                @else

                @endif
                <div style="height:1px; width:100%; background-color: #BC1133"></div>
                <p style="line-height:1.4; color: #BC1133; font-size: 14px;">


                    @if($senderIdNew->permission_status == 1)
                {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y H:i:s', strtotime($senderIdNew->created_at))) }}<br>
                    @else

                    @endif
                    {{ $adminId2->admin_name_ban }} <br>
                    {{ $desiName1 }} <br>
                    {{ $branchName1 }}</p>
            </div>
        </div>
        @endif
        @endif


        @endif
        @endforeach

        @endif

    </div>
<!-- end sign code -->
<?php

$unsentAtt = DB::table('note_attachments')
->where('noteId',$id)
->where('nothiId',$nothiId)
->where('status',$status)
//->where('admin_id',Auth::guard('admin')->user()->id)
 ->where('child_id',$childNoteNewLists->id)
->get();

?>



 <p class="mt-4">সংযুক্তি({{ count($unsentAtt) }})</p>
 <ul>
    @foreach($unsentAtt as $unsentAtts )
    <li><a target="_blank" href="{{ $unsentAtts->link }}"><i class="fa fa-paperclip"></i></a> {{ $unsentAtts->title }}</li>
    @endforeach
 </ul>
    <div class="d-flex flex-row-reverse mt-3">


        @if(count($childNoteNewList)  == ($key+1))



        <button data-bs-toggle="modal"
        data-original-title="" data-bs-target="#myModal22stu" class="btn btn-danger ms-3" type="button">
            <i class="fa fa-send"></i>
            নথি প্রেরণ
        </button>

        <a href="javascript:void(0)" id="newPara" class=" btn-sm btn btn-primary">নতুন অনুচ্ছেদ</a>


@else


@endif



    </div>


        </form>


    </div>
    </div>
  </div>
