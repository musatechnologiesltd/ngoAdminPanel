@extends('admin.master.master')

@section('title')
ডাক তালিকা | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>ডাক তালিকা</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">ডাক </li>
                    <li class="breadcrumb-item">ডাক তালিকা</li>
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
                    <ul class="nav nav-dark" id="pills-darktab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="pills-darkhome-tab" data-bs-toggle="pill" href="#pills-darkhome" role="tab" aria-controls="pills-darkhome" aria-selected="true"><i class="icofont icofont-ui-home"></i>ডাক</a></li>
                    </ul>
                    <div class="tab-content" id="pills-darktabContent">
                        <div class="tab-pane fade show active" id="pills-darkhome" role="tabpanel" aria-labelledby="pills-darkhome-tab">
                            <div class="table-responsive product-table mb-0 m-t-30">
                                <table class="display" id="basic-1">
                                    <tbody>

                                        @foreach($all_data_for_new_list as $allStatusData)

                                        <?php

                                     $form_one_data = DB::table('fd_one_forms')->where('id',$allStatusData->fd_one_form_id)->first();

                                        ?>
                                    <tr>
                                        <td style="text-align:left;">
                                            উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
                                            প্রেরকঃ {{ $form_one_data->organization_name_ban }}<span class="p-4"><i class="fa fa-user"></i>
                                            প্রাপকঃ {{ Auth::guard('admin')->user()->admin_name_ban }}</span>  <br>
                                            বিষয়ঃ <b> এনজিও নিবন্ধনের নোটিশ                                     {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b> <br>
                                            {{-- সিধান্তঃ <span style="color:blue;"> বিধি মোতাবেক বাবস্থা নিন। </span> --}}
                                        </td>
                                        <td style="text-align:right;">
                                            <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'registration','id'=>$allStatusData->id]) }}';">View</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    {{-- <tr>
                                        <td style="text-align:left;">
                                            উৎসঃ মনির হোসেন <br>
                                            প্রেরকঃ মোঃ মনির হোসেন <span class="p-4"><i class="fa fa-user"></i>
                                            প্রাপকঃ মোঃ খরশেদ আলম </span>  <br>
                                            বিষয়ঃ <b> বিজ্ঞপ্তি/নোটিশ ০৪ জুন ২০২৩ </b> <br>
                                            সিধান্তঃ <span style="color:blue;"> বিধি মোতাবেক বাবস্থা নিন। </span>
                                        </td>
                                        <td style="text-align:right;">
                                            <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = 'nothi_view.php';">View</button>
                                        </td>
                                    </tr> --}}
                                    </tbody>
                                </table>
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
