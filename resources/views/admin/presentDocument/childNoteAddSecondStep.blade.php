


    <div class="row">

        <div class="col-sm-8 col-xs-8">

            <p style="font-size: 14px;"><b>{{$checkParentFirst->subject }}<span style="padding-left: 5px;color:#660080">{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($checkParentFirst->created_at))) }}</span></b></p>

        </div>
        <div class="col-sm-4 col-xs-4">
            <div class="d-flex flex-row-reverse">
                {{-- <a  href ="" class="btn btn-outline-danger btn-sm"aria-expanded="false"><i class="fa fa-print"></i></a> --}}
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

@if($childNoteNewLists->admin_id == Auth::guard('admin')->user()->id)

     @include('admin.presentDocument.addChildNoteSecondStepFirstPart')

     @else

     @if(($childNoteNewLists->sent_status == 1) && ($childNoteNewLists->receiver_id == Auth::guard('admin')->user()->id))
     @include('admin.presentDocument.addChildNoteSecondStepFirstPart')

     @else


     @endif


      @endif


      @endforeach

      <div class="card" id="newParaDes" style="display: none;">
        <div class="card-header bg-primary" id="eheadingSix">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed text-white" data-bs-toggle="collapse" data-bs-target="#ecollapseSix" aria-expanded="false" aria-controls="collapseSix">নতুন অনুচ্ছেদ</button>
          </h5>
        </div>
        <div class="collapse show" id="ecollapseSix" aria-labelledby="eheadingSix" data-bs-parent="#accordion1">
          <div class="card-body">


            <form class="custom-validation" action="{{ route('childNote.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                @csrf
                <input type="hidden" value="{{ $id }}" name="parentNoteId"/>
                <input type="hidden" value="{{ $status }}" name="status"/>

                <input type="hidden" value="{{ $id }}" name="noteId"/>
                <input type="hidden" value="{{ $activeCode }}" name="activeCode"/>
                <input type="hidden" value="{{ $nothiId }}" name="nothiId"/>
                <input type="hidden" value="{{ $parentId }}" name="dakId"/>

            <div id="container">
                <textarea class="maineditor" id="mainpeditor"  name="mainPartNote">
                    <p>লিখুন</p>
                </textarea>
            </div>
            <div class="d-flex flex-row-reverse mt-3">

                <?php

$senderIdNew12 = DB::table('nothi_details')
->where('noteId',$id)
->where('nothId',$nothiId)
->where('dakId',$parentId)
->where('dakType',$status)
->whereNull('back_status')
//->where('sender',Auth::guard('admin')->user()->id)
->value('permission_status');

?>

@if($senderIdNew12 == 1)


@else



                <div class="dropdown">

                    <button class="btn btn-success" value="সংরক্ষন ও খসড়া" name="final_button" type="submit"

                    aria-expanded="false">
                    সংরক্ষন ও খসড়া
            </button>


                    <button class="btn btn-primary" value="সংরক্ষন করুন" type="submit" name="final_button"

                            aria-expanded="false">
                        সংরক্ষন করুন
                    </button>

                </div>
                @endif
            </div>
             </form>



        </div>
        </div>
      </div>
    </div>

