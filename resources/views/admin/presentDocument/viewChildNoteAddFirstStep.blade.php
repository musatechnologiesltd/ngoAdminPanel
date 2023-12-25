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
<form class="custom-validation" action="{{ route('childNote.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
    @csrf
    <input type="hidden" value="{{ $id }}" name="noteId"/>
    <input type="hidden" value="{{ $activeCode }}" name="activeCode"/>
    <input type="hidden" value="{{ $nothiId }}" name="nothiId"/>
    <input type="hidden" value="{{ $parentId }}" name="dakId"/>
    <input type="hidden" value="{{ $id }}" name="parentNoteId"/>
    <input type="hidden" value="{{ $status }}" name="status"/>
<div id="container">
    <textarea id="peditor"  name="mainPartNote">
        <p>লিখুন</p>
    </textarea>
</div>
<div class="d-flex flex-row-reverse mt-3">

    <div class="dropdown">
        {{-- <button class="btn btn-success" value="সংরক্ষন ও খসড়া" name="final_button" type="submit"

        aria-expanded="false">
        সংরক্ষন ও খসড়া
</button> --}}


        <button class="btn btn-primary" value="সংরক্ষন করুন" type="submit" name="final_button"

                aria-expanded="false">
            সংরক্ষন করুন
        </button>

    </div>
</div>
 </form>
