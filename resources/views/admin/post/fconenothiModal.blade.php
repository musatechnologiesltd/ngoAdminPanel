<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
     id="fconemyModal{{ $allStatusData->id }}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-lg-custom"
         role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">
                    নথিসমূহ</h4>
            </div>

            <div class="modal-body">
                <h5>একশনঃ নথিতে উপস্থাপনঃ এফসি-১ নোটিশ</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <h5>সকল নথি</h5>
                    </div>
                    <div class="col-lg-6" style="text-align: right;">
                        <button onclick="location.href = '{{ route('documentPresent.create') }}';" type="button"
                        class="btn btn-primary">
                    <i class="fa fa-plus"></i> নতুন
                    নথি তৈরি করুন
                </button>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="নথি খুজুন"><span
                                    class="input-group-text"><i class="fa fa-search"> </i></span>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <div class="table-responsive">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingTwo">
                                                    <div class="accordion-button collapsed"
                                                         data-bs-toggle="collapse"
                                                         data-bs-target="#flush-collapseTwo">
                                                                            <span>
                                                                                                                                                            <span style="line-height:3">
                                                                <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  ডিও লেটার</span>
                                                                            <br>
                                                                            <span style="text-align:left;"> <span
                                                                                        style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> ৩৭.০১.২৬০৩.০০০.৯৯.০০৪.২৩
                                                                            <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> রেজিস্ট্রির অফিস</span>
                                                                            </span>
                                                    </div>
                                                </h2>
                                                <div id="flush-collapseTwo"
                                                     class="accordion-collapse collapse">
                                                    <div class="accordion-body">
                                                        <div class="d-flex mt-3">
                                                            <button class="btn btn-transparent ms-3" type="button">
                                                                <i class="fa fa-plus"></i>
                                                                নতুন নোট
                                                            </button>
                                                            <button class="btn btn-transparent ms-3" type="button">
                                                                <i class="fa fa-envelope"></i>
                                                                সকল নোট
                                                            </button>
                                                        </div>
                                                        <div class="card-body">
                                                            <p>কোন নোট পাওয়া যায়নি</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
</div>
