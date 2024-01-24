@extends('admin.master.master')

@section('title')
প্রেরিত নথি
@endsection


@section('body')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>প্রেরিত নথি</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">প্রেরিত নথি</a></li>
                    <li class="breadcrumb-item">প্রেরিত নথি</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid list-products">
    <div class="row">
        <!-- Individual column searching (text inputs) Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <table class="table table-striped" >
                        <tbody>

                            @foreach ($senderNothiList as $key=>$nothiLists1)

                            <?php

 $nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();

 if($nothiLists1->dakType == 'registration'){

$allNoteListNew = DB::table('parent_note_for_registrations')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)->get();

}elseif($nothiLists1->dakType == 'renew'){

$allNoteListNew = DB::table('parent_note_for_renews')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)->get();

}elseif($nothiLists1->dakType == 'nameChange'){

$allNoteListNew = DB::table('parent_note_for_name_changes')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)->get();

}elseif($nothiLists1->dakType== 'fdNine'){

$allNoteListNew = DB::table('parent_note_for_fd_nines')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)->get();

}elseif($nothiLists1->dakType == 'fdNineOne'){

$allNoteListNew = DB::table('parent_note_for_fd_nine_ones')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)->get();

}elseif($nothiLists1->dakType == 'fdSix'){

allNoteListNew = DB::table('parent_note_for_fdsixes')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)->get();

}elseif($nothiLists1->dakType == 'fdSeven'){

$allNoteListNew = DB::table('parent_note_for_fd_sevens')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)->get();

}elseif($nothiLists1->dakType == 'fcOne'){

$allNoteListNew = DB::table('parent_note_for_fc_ones')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)->get();

}elseif($nothiLists1->dakType == 'fcTwo'){

$allNoteListNew = DB::table('parent_note_for_fc_twos')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)->get();

}elseif($nothiLists1->dakType == 'fdThree'){

$allNoteListNew = DB::table('parent_note_for_fd_threes')->where('nothi_detail_id',$nothiLists1->dakId)
->where('serial_number',$nothiLists1->nothId)->get();

}
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
                                                <button onclick="location.href = '{{ route('addParentNote',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                                    <i class="fa fa-plus"></i>
                                                    নতুন নোট
                                                </button>
                                                <button class="btn btn-transparent ms-3" type="button">
                                                    <i class="fa fa-envelope"></i>
                                                    সকল নোট
                                                </button>
                                            </div>
                                            <div class="card-body">

@if(count($allNoteListNew) > 0)
<ul>
@foreach($allNoteListNew as $key=>$allNoteListNews)
                                              <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('addChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
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
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
