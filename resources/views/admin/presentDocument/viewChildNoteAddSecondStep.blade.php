<div class="row">

    <div class="col-sm-8 col-xs-8">

        <p style="font-size: 14px;"><b>{{$checkParentFirst->subject }}<span style="padding-left: 5px;color:#660080">{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($checkParentFirst->created_at))) }}</span></b></p>

    </div>
    <div class="col-sm-4 col-xs-4">
        <div class="d-flex flex-row-reverse">
            <a  href ="" class="btn btn-outline-danger btn-sm"aria-expanded="false"><i class="fa fa-print"></i></a>
        </div>
    </div>
</div>
<hr>
    <div class="default-according" id="accordion1">



@foreach($childNoteNewList as $key=>$childNoteNewLists)
<?php

$creatorNAme = DB::table('admins')
->where('id',$childNoteNewLists->admin_id)
->value('admin_name_ban');

            ?>


      <div class="card">
        <div class="card-header bg-primary" id="heading{{ $key+1 }}">
          <h5 class="mb-0">
            <button class="btn btn-link text-white" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key+1 }}" aria-expanded="true" aria-controls="collapseFour">

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
                 <div id="container">


                {!! $childNoteNewLists->description !!}


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

        <div class="d-flex flex-row-reverse mt-3">


            @if(count($childNoteNewList)  == ($key+1))



            <button data-bs-toggle="modal"
            data-original-title="" data-bs-target="#myModal22stu" class="btn btn-danger ms-3" type="button">
                <i class="fa fa-send"></i>
                প্রেরণ করুন
            </button>

            <a href="javascript:void(0)" id="newPara" class=" btn-sm btn btn-primary">নতুন অনুচ্ছেদ</a>


@else


@endif



        </div>


            </form>


        </div>
        </div>
      </div>
      @endforeach

      <div class="card" id="newParaDes" style="display: none;">
        <div class="card-header bg-primary" id="eheadingSix">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed text-white" data-bs-toggle="collapse" data-bs-target="#ecollapseSix" aria-expanded="false" aria-controls="ecollapseSix">নতুন অনুচ্ছেদ</button>
          </h5>
        </div>
        <div class="collapse mclose2 " id="ecollapseSix" aria-labelledby="eheadingSix" >
          <div class="card-body">


            <form class="custom-validation" action="{{ route('childNote.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                @csrf
                <input type="hidden" value="{{ $id }}" name="parentNoteId"/>
                <input type="hidden" value="{{ $status }}" name="status"/>
            <div id="container">
                <textarea class="maineditor" id="mainpeditor"  name="mainPartNote">
                    <p>লিখুন</p>
                </textarea>
            </div>
            <div class="d-flex flex-row-reverse mt-3">

<?php


$senderIdNew122 = DB::table('nothi_details')
                ->where('noteId',$id)
                ->where('nothId',$nothiId)
                ->where('dakId',$parentId)
                ->where('dakType',$status)
                ->whereNull('back_status')
                //->where('sender',Auth::guard('admin')->user()->id)
                ->value('zari_permission_status');

?>

@if($senderIdNew122 == 1)

@else


<div class="d-flex flex-row-reverse mt-3">

    <div class="dropdown">



        <button class="btn btn-primary" value="সংরক্ষন করুন" type="submit" name="final_button"

                aria-expanded="false">
            সংরক্ষন করুন
        </button>




    </div>
</div>





                @endif


            </div>
             </form>



        </div>
        </div>
      </div>
    </div>

