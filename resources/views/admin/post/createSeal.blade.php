@extends('admin.master.master')

@section('title')
সীল তৈরি করুন | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>সীল তৈরি করুন</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">সীল</li>
                    <li class="breadcrumb-item">সীল তৈরি করুন</li>
                </ol>
            </div>
            <div class="col-sm-6">
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
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>পদবি নির্বাচন করুন</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-dark" id="pills-darktab" role="tablist">
                                        <li class="nav-item"><a class="nav-link active"
                                                                id="pills-darkhome-tab"
                                                                data-bs-toggle="pill" href="#pills-darkhome"
                                                                role="tab" aria-controls="pills-darkhome"
                                                                aria-selected="true"><i
                                                        class="icofont icofont-ui-home"></i>নিজ অফিসের
                                                পদসমূহ</a></li>
                                    </ul>
                                    <div class="tab-content" id="pills-darktabContent">
                                        <div class="tab-pane fade show active" id="pills-darkhome"
                                             role="tabpanel" aria-labelledby="pills-darkhome-tab">
                                            <div class="podobi_tab mt-4">
                                                <div class="treecheckbox_custom" id="treecheckbox">
                                                    <ul>
                                                        <li>এনজিও বিষয়ক ব্যুরো শাখা {{ $totalBranch }} টি, পদ {{ $totalDesignation }} টি, শূন্যপদ ৮৪টি,
                                                            কর্মরত {{ $totaluser }} জন
                                                            <ul>
                                                                <li data-jstree="{&quot;opened&quot;:true}">
                                                                    মহাপরিচালক মহোদয়ের শাখা (২)
                                                                    <ul>
                                                                        <li data-jstree="{&quot;selected&quot;:&quot;folder&quot;}">
                                                                            শেখ মনিরুজামান মহাপরিচালক
                                                                        </li>
                                                                        <li data-jstree="{&quot;type&quot;:&quot;folder&quot;}">
                                                                            মোঃ কুদ্দিছুর রহমান
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                            <ul>
                                                                <li data-jstree="{&quot;opened&quot;:true}">
                                                                    মহাপরিচালক মহোদয়ের শাখা (২)
                                                                    <ul>
                                                                        <li data-jstree="{&quot;type&quot;:&quot;folder&quot;}">
                                                                            শেখ মনিরুজামান মহাপরিচালক
                                                                        </li>
                                                                        <li data-jstree="{&quot;type&quot;:&quot;folder&quot;}">
                                                                            মোঃ কুদ্দিছুর রহমান
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                            <ul>
                                                                <li data-jstree="{&quot;opened&quot;:true}">
                                                                    মহাপরিচালক মহোদয়ের শাখা (২)
                                                                    <ul>
                                                                        <li data-jstree="{&quot;type&quot;:&quot;folder&quot;}">
                                                                            শেখ মনিরুজামান মহাপরিচালক
                                                                        </li>
                                                                        <li data-jstree="{&quot;type&quot;:&quot;folder&quot;}">
                                                                            মোঃ কুদ্দিছুর রহমান
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                            <ul>
                                                                <li data-jstree="{&quot;opened&quot;:true}">
                                                                    মহাপরিচালক মহোদয়ের শাখা (২)
                                                                    <ul>
                                                                        <li data-jstree="{&quot;type&quot;:&quot;folder&quot;}">
                                                                            শেখ মনিরুজামান মহাপরিচালক
                                                                        </li>
                                                                        <li data-jstree="{&quot;type&quot;:&quot;folder&quot;}">
                                                                            মোঃ কুদ্দিছুর রহমান
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                            <ul>
                                                                <li data-jstree="{&quot;opened&quot;:true}">
                                                                    মহাপরিচালক মহোদয়ের শাখা (২)
                                                                    <ul>
                                                                        <li data-jstree="{&quot;type&quot;:&quot;folder&quot;}">
                                                                            শেখ মনিরুজামান মহাপরিচালক
                                                                        </li>
                                                                        <li data-jstree="{&quot;type&quot;:&quot;folder&quot;}">
                                                                            মোঃ কুদ্দিছুর রহমান
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                            <ul>
                                                                <li data-jstree="{&quot;opened&quot;:true}">
                                                                    মহাপরিচালক মহোদয়ের শাখা (২)
                                                                    <ul>
                                                                        <li data-jstree="{&quot;type&quot;:&quot;folder&quot;}">
                                                                            শেখ মনিরুজামান মহাপরিচালক
                                                                        </li>
                                                                        <li data-jstree="{&quot;type&quot;:&quot;folder&quot;}">
                                                                            মোঃ কুদ্দিছুর রহমান
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                            <ul>
                                                                <li data-jstree="{&quot;opened&quot;:true}">
                                                                    মহাপরিচালক মহোদয়ের শাখা (২)
                                                                    <ul>
                                                                        <li data-jstree="{&quot;type&quot;:&quot;folder&quot;}">
                                                                            শেখ মনিরুজামান মহাপরিচালক
                                                                        </li>
                                                                        <li data-jstree="{&quot;type&quot;:&quot;folder&quot;}">
                                                                            মোঃ কুদ্দিছুর রহমান
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                            <ul>
                                                                <li data-jstree="{&quot;opened&quot;:true}">
                                                                    মহাপরিচালক মহোদয়ের শাখা (২)
                                                                    <ul>
                                                                        <li data-jstree="{&quot;type&quot;:&quot;folder&quot;}">
                                                                            শেখ মনিরুজামান মহাপরিচালক
                                                                        </li>
                                                                        <li data-jstree="{&quot;type&quot;:&quot;folder&quot;}">
                                                                            মোঃ কুদ্দিছুর রহমান
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
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
                                                        class="icofont icofont-ui-home"></i>নিজ অফিসের
                                                পদসমূহ</a></li>
                                    </ul>
                                    <div class="tab-content" id="pills-darktabContent">
                                        <div class="tab-pane fade show active" id="pills-darkhome"
                                             role="tabpanel" aria-labelledby="pills-darkhome-tab">
                                            <div class="podobi_tab mt-4">
                                                <form>
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>কর্মকর্তা</th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        <td>
                                                            <b>শাখাঃ মহাপরিচালক মহোদয়ের শাখা (২)</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        <td>
                                                            শেখ মনিরুজামান,মহাপরিচালক <span style="font-size:12px; color: #aeaeae;">মহাপরিচালক মহোদয়ের শাখা, এনজিও বিষয়ক ব্যুরো</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        <td>
                                                            <b>শাখাঃ মহাপরিচালক মহোদয়ের শাখা (২)</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        <td>
                                                            শেখ মনিরুজামান,মহাপরিচালক <span style="font-size:12px; color: #aeaeae;">মহাপরিচালক মহোদয়ের শাখা, এনজিও বিষয়ক ব্যুরো</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        <td>
                                                            শেখ মনিরুজামান,মহাপরিচালক <span style="font-size:12px; color: #aeaeae;">মহাপরিচালক মহোদয়ের শাখা, এনজিও বিষয়ক ব্যুরো</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        <td>
                                                            <b>শাখাঃ মহাপরিচালক মহোদয়ের শাখা (২)</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        <td>
                                                            শেখ মনিরুজামান,মহাপরিচালক <span style="font-size:12px; color: #aeaeae;">মহাপরিচালক মহোদয়ের শাখা, এনজিও বিষয়ক ব্যুরো</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        <td>
                                                            <b>শাখাঃ মহাপরিচালক মহোদয়ের শাখা (২)</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        <td>
                                                            শেখ মনিরুজামান,মহাপরিচালক <span style="font-size:12px; color: #aeaeae;">মহাপরিচালক মহোদয়ের শাখা, এনজিও বিষয়ক ব্যুরো</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        <td>
                                                            শেখ মনিরুজামান,মহাপরিচালক <span style="font-size:12px; color: #aeaeae;">মহাপরিচালক মহোদয়ের শাখা, এনজিও বিষয়ক ব্যুরো</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        <td>
                                                            <b>শাখাঃ মহাপরিচালক মহোদয়ের শাখা (২)</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        <td>
                                                            শেখ মনিরুজামান,মহাপরিচালক <span style="font-size:12px; color: #aeaeae;">মহাপরিচালক মহোদয়ের শাখা, এনজিও বিষয়ক ব্যুরো</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        <td>
                                                            <b>শাখাঃ মহাপরিচালক মহোদয়ের শাখা (২)</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        <td>
                                                            শেখ মনিরুজামান,মহাপরিচালক <span style="font-size:12px; color: #aeaeae;">মহাপরিচালক মহোদয়ের শাখা, এনজিও বিষয়ক ব্যুরো</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        <td>
                                                            শেখ মনিরুজামান,মহাপরিচালক <span style="font-size:12px; color: #aeaeae;">মহাপরিচালক মহোদয়ের শাখা, এনজিও বিষয়ক ব্যুরো</span>
                                                        </td>
                                                    </tr>
                                                </table>


                                                <button type="submit" class="btn btn-success mt-5">জমা দিন</button>

                                                </form>
                                            </div>
                                        </div>
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
<!-- Container-fluid Ends-->
@endsection


@section('script')

@endsection
