<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModal2s"  role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel2">
        প্রেরক</h4>
</div>

<div class="modal-body">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('nothiSender.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="">অফিসার খুজুন</label> <br>
                    <select class="form-control js-example-basic-single" style="width: 100%" name="fadmin" id="">

                        @foreach($user as $users)
                        <option value="{{ $users->id }}">{{ $users->admin_name_ban }}</option>
                        @endforeach

                    </select>

                    <input type="hidden" name="fnothiId" value="{{ $nothiId }}"/>
                    <input type="hidden" name="fnoteId" value="{{ $id }}"/>
                    <input type="hidden" name="fstatus" value="{{ $status }}"/>


                </div>
                <div class="mt-3">
                    <button class="btn btn-info-gradien" type="submit">সংরক্ষণ করুন</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
</div>
