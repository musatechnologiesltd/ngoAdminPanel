<div class="card">
    <div class="card-header bg-primary" id="heading{{ $key+1 }}">
      <h5 class="mb-0">
        <button class="btn btn-sm btn-link text-white" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key+1 }}" aria-expanded="true" aria-controls="collapseFour">
           অনুচ্ছেদ#<span>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($activeCode.'.'.$key+1) }}</span> <span style="padding-right:40px;">{{ '('.$creatorNAme}} <span style="font-size: 10px;padding-right:60px;">{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($childNoteNewLists->created_at))).')'  }}</span>

        </button>
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
            {{-- <input type="hidden" value="{{ $status }}" name="status"/> --}}
             <div id="container">
        <textarea class="maineditor" name="mainPartNote" id="editor{{ $key+1 }}">

            {!! $childNoteNewLists->description !!}
        </textarea>
    </div>

<!--start sign code -->
<?php

$senderIdNew = DB::table('nothi_details')
            ->where('noteId',$id)
            ->where('nothId',$nothiId)
            ->where('dakId',$parentId)
            ->where('dakType',$status)
            ->whereNull('back_status')
            //->where('sender',Auth::guard('admin')->user()->id)
            ->first();

?>


@if(!$senderIdNew)

@else

<?php

$mainSenderIdNew =DB::table('article_signs')
->where('dakDetailId',$senderIdNew->id)
->where('childId',$childNoteNewLists->id)->get();

//dd($mainSenderIdNew);
?>

@if(count($mainSenderIdNew) == 0)

@else

<div class="row mt-3">
@foreach($mainSenderIdNew as $key=>$mainSenderIdNews)

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
<div class="col-lg-3 col-md-3 col-sm-6 mb-2" >
<div class="text-center">
<img src="{{ asset('/') }}{{ $adminId->admin_sign }}" alt="" height="50" width="180">

<div style="height:1px; width:100%; background-color: #BC1133"></div>

<p style="line-height:1.4; color: #BC1133; font-size: 14px;">
{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y H:i:s', strtotime($mainSenderIdNews->created_at))) }}<br>
{{ $adminId->admin_name_ban }}<br>
{{ $desiName }}<br>
{{ $branchName }}
</p>

</div>

</div>
@endif

@if($senderIdNew->permission_status == 1)

<?php
$desiName1 = DB::table('designation_lists')
    ->where('id',$adminId2->designation_list_id)
    ->value('designation_name');
$branchName1 = DB::table('branches')->where('id',$adminId2->branch_id)->value('branch_name');

?>
<div class="col-lg-3 col-md-3 col-sm-6 mb-2" >

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
@else

@endif

@endforeach
</div>

@endif

@endif

<!-- end sign code -->


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



            <button class="btn-sm btn btn-secondary" value="সংশোধন ও খসড়া" name="final_button" type="submit"

            aria-expanded="false">
           খসড়া
    </button>


    <?php

    $receiverId = DB::table('nothi_details')
    ->where('noteId',$id)
    ->where('nothId',$nothiId)
    ->where('dakId',$parentId)
    ->where('dakType',$status)
    ->where('sender',Auth::guard('admin')->user()->id)
    ->value('receiver');

    ?>


    @if(empty($receiverId))


    <button class="btn-sm btn btn-primary" value="সংশোধন" name="final_button" type="submit"

    aria-expanded="false">
    সংশোধন করুন
</button>

                    <button data-bs-toggle="modal"
                    data-original-title="" data-bs-target="#modalforsender1" class="btn-sm btn btn-info ms-3" type="button">
                        <i class="fa fa-send"></i>
                        নথি প্রেরণ
                    </button>

                    @else

                    <button data-bs-toggle="modal"
                    data-original-title="" data-bs-target="#modalforsenderreturn1" class="btn btn-danger ms-3" type="button">
                        <i class="btn-sm fa fa-arrow-circle-left"></i>
                        ফেরত আনুন
                    </button>
                    @endif

            @endif







     @if($childNoteNewLists->sent_status == 1)


            <a href="javascript:void(0)" id="newPara" class=" btn-sm btn btn-primary">নতুন অনুচ্ছেদ</a>





     @else
     @if(count($childNoteNewList)  == ($key+1))

     <a href="javascript:void(0)" id="newPara" class=" btn-sm btn btn-primary">নতুন অনুচ্ছেদ</a>
@else


@endif

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
