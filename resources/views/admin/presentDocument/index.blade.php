@extends('admin.master.master')

@section('title')
সকল নথি
@endsection


@section('body')


<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>সকল নথি</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">সকল নথি</li>
                </ol>
            </div>
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                @if (Auth::guard('admin')->user()->can('countryAdd'))
                <a class="btn btn-primary dropdown-toggle waves-effect  btn-sm waves-light mt-5" type="button" href="{{ route('documentPresent.create') }}">
                                                        <i class="far fa-calendar-plus  mr-2"></i> নতুন নথি তৈরী করুন
                </a>
                                                    @endif
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
                    <div class="card-body">

<!-- new code start -->

<div class="table-responsive">
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <table class="table table-striped">
            <tbody>

                @foreach ($nothiList as $nothiLists)
            <tr>
                <td>
                    <p>
                        <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>
                        {{ $nothiLists->document_subject }}
                    </p>
                    <p>
                        <span >
                            <span style="text-align:left;">
                                <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ App\Http\Controllers\Admin\CommonController::englishToBangla('১১.২২.৩৩৩৩.৪৪৪.৫৫.'.$nothiLists->document_number) }}
                                <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শ্রেণী: </span> {{ $nothiLists->document_class }}</span>
                    </p>
                </td>
                <td>
                    <div class="d-flex flex-row-reverse mt-3">
                        <button class="btn btn-dark ms-3" type="button">
                            <i class="fa fa-list-alt"></i>
                            নথি অনুমতির ইতিহাস
                        </button>
                        <button class="btn btn-dark ms-3" type="button"
                                data-bs-toggle="modal"
                                data-original-title=""
                                data-bs-target="#myModal2">
                            <i class="fa fa-sitemap"></i>
                            অনুমতি সংশোধন
                        </button>
                        <button class="btn btn-primary ms-3" onclick="location.href = '{{ route('documentPresent.edit',$nothiLists->id) }}';" type="button">
                            <i class="fa fa-send"></i>
                            নথি সম্পাদনা
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>

<!-- new code end -->

                    </div>

                </div>
            </div>
        </div>
        <!-- Individual column searching (text inputs) Ends-->
    </div>
</div>
<!-- Container-fluid Ends-->
<div class="modal fade bd-example-modal-lg11" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
    <h4 class="modal-title" id="myLargeModalLabel">নোটের বিষয়</h4>
    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="">
        <div class="mb-3">
            <label class="form-label" for="">বিষয়</label>
            <input class="form-control" type="text">
        </div>
        <button class="btn btn-primary" type="button" onclick="location.href = '';">
            জমা দিন
        </button>
    </form>
</div>
</div>
</div>
</div>

<!--modal section for permission person list-->
<div class="modal right fade bd-example-modal-lg"
id="myModal2" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg-custom" role="document">
<div class="modal-content">
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel2">
        অনুমতিপ্রাপ্ত ব্যাক্তি বাছাই করুন </h4>
</div>

<div class="modal-body">
    <div class="container-fluid list-products">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>পদবি নির্বাচন করুন</h5>
                            </div>
                            <div class="card-body">
                                <div id="page-wrap">
                                    <h5>এনজিও বিষয়ক ব্যুরো শাখা ১১ টি, পদ ৪৩ টি, শূন্যপদ ৩৫টি, কর্মরত ৮
                                        জন</h5>
                                    <ul class="treeview">
                                        <li>
                                            <input type="checkbox" name="tall" id="tall">
                                            <label for="tall" class="custom-unchecked">মহাপরিচালক মহোদয়ের
                                                শাখা</label>

                                            <ul>
                                                <li>
                                                    <input type="checkbox" name="tall-1" id="tall-1">
                                                    <label for="tall-1" class="custom-unchecked">শেখ মোঃ
                                                        মনিরুজ্জামান</label>
                                                </li>
                                                <li class="last">
                                                    <input type="checkbox" name="tall-3" id="tall-3">
                                                    <label for="tall-3" class="custom-unchecked">শূন্য
                                                        পদ</label>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>নির্বাচিত পদসমূহ</h5>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-dark" id="pills-darktab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active"
                                                            id="pills-darkhome-tab"
                                                            data-bs-toggle="pill" href="#pills-darkhome"
                                                            role="tab" aria-controls="pills-darkhome"
                                                            aria-selected="true"><i
                                                    class="icofont icofont-ui-home"></i>
                                            স্বাক্ষরকারী ব্যাক্তি সমূহ</a></li>
                                </ul>
                                <div class="tab-content" id="pills-darktabContent">
                                    <div class="tab-pane fade show active" id="pills-darkhome"
                                         role="tabpanel" aria-labelledby="pills-darkhome-tab">
                                        <div class="podobi_tab mt-4">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>#</th>
                                                    <th>কর্মকর্তা</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <button class="btn btn-outline-success"><i
                                                                    class="fa fa-trash"></i></button>
                                                    </td>
                                                    <td>
                                                        <b>শাখাঃ মহাপরিচালক মহোদয়ের শাখা (২)</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <button class="btn btn-outline-success"><i
                                                                    class="fa fa-trash"></i></button>
                                                    </td>
                                                    <td>
                                                        শেখ মনিরুজামান,মহাপরিচালক <span
                                                                style="font-size:12px; color: #aeaeae;">মহাপরিচালক মহোদয়ের শাখা, এনজিও বিষয়ক ব্যুরো</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
</div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
</div>





@endsection
@section('script')
<script>


$("#document_type_id").change(function(){

    var docId = $(this).val();


    $.ajax({
            url: "{{ route('docTypeCode') }}",
            method: 'GET',
            data: {docId:docId},
            success: function(data) {

                 $("#document_number").val(data+'.');
            }
            });


});
</script>

@endsection
