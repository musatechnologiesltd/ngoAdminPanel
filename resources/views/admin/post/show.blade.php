@extends('admin.master.master')

@section('title')
ডাক প্রেরণ তালিকা | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>ডাক প্রেরণ তালিকা</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">ডাক </li>
                    <li class="breadcrumb-item">ডাক প্রেরণ করুন</li>
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
                <div class="card-header pb-0">
                    <h5>ডাক প্রেরণ করুন</h5>
                </div>
                <form class="form theme-form">
                    <div class="card-body">
                        <h5>সিধান্তঃ বিধি মোতাবেক বাবস্থা নিন।</h5>
                        <div class="nothi_header_box">
                            <span>সিধান্ত নিন</span>
                        </div>
                        <div class="form-group mt-3 m-checkbox-inline mb-0 custom-radio-ml">
                            <div class="radio radio-primary">
                                <input id="radioinline1" type="radio" name="radio1" value="option1">
                                <label class="mb-0" for="radioinline1">বিধি মোতাবেক বাবস্থা নিন</label>
                            </div>
                            <div class="radio radio-primary">
                                <input id="radioinline2" type="radio" name="radio1" value="option1">
                                <label class="mb-0" for="radioinline2">নথিতে উপস্থাপন করুন</label>
                            </div>
                            <div class="radio radio-primary">
                                <input id="radioinline3" type="radio" name="radio1" value="option1">
                                <label class="mb-0" for="radioinline3">নথিজাত করুন</label>
                            </div>
                            <div class="radio radio-primary">
                                <input id="radioinline4" type="radio" name="radio1" value="option1">
                                <label class="mb-0" for="radioinline4">সিধান্ত নিজে নিন</label>
                            </div>
                        </div>
                        <select class="form-select digits mt-3" id="exampleFormControlSelect9">
                            <option>দেখলাম কাজ শুরু হচ্ছে</option>
                            <option>পেশ করুন</option>
                            <option>তদন্ত পূর্বক প্রতিবেদন দিবেন</option>
                            <option>দেখলাম পেশ করুন</option>
                            <option>নথিজাত করুন</option>
                        </select>
                        <div class="nothi_header_box">
                            <span>বিধি মোতাবেক ব্যবস্থা নিন</span>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label"
                                           for="exampleInputPassword21">অগ্রাধিকার</label>
                                    <select class="form-select digits" id="exampleFormControlSelect9">
                                        <option>সর্বচ্চ অগ্রাধিকার</option>
                                        <option>অবিলম্বে</option>
                                        <option>জরুরী</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputPassword21">গোপনীয়তা</label>
                                    <select class="form-select digits" id="exampleFormControlSelect9">
                                        <option>গোপনীয়তা বাছাই করুন</option>
                                        <option>অতি গোপনীয়তা</option>
                                        <option>বিশেষ গোপনীয়</option>
                                        <option>গোপনীয়</option>
                                        <option>সিমিত</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class=" nothi_header_box">
                            <span>বিধি মোতাবেক ব্যবস্থা নিন</span>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row-reverse bd-highlight">
                                    <button class="btn btn-primary"><i class="fa fa-send"></i>
                                        প্রেরন
                                    </button>
                                    <a class="btn btn-outline-success me-2" href = "{{ route('createSeal',$id) }}"><i class="fa fa-plus"></i> নতুন
                                        সিল বানান
                                    </a>
                                </div>
                                <ul class="nav nav-tabs" id="icon-tab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="icon-home-tab"
                                                            data-bs-toggle="tab" href="#icon-home1"
                                                            role="tab" aria-controls="icon-home"
                                                            aria-selected="true"><i
                                                    class="icofont icofont-ui-home"></i>নিজ অফিস</a></li>
                                </ul>
                                <div class="tab-content" id="icon-tabContent">
                                    <div class="tab-pane fade show active" id="icon-home1" role="tabpanel"
                                         aria-labelledby="icon-home-tab">
                                        <table class="table table-bordered mt-3">
                                            <tr>
                                                <th>
                                                    {{-- <button class="btn btn-outline-success">#</button> --}}
                                                </th>
                                                <th>পদবী</th>
                                                <th>নাম</th>
                                                <th>মূল-প্রাপক</th>
                                                <th>কার্যার্থে অনুলিপি</th>
                                                <th>জ্ঞাতার্থে অনুলিপি</th>
                                                <th>দৃষ্টি আকর্ষণ</th>
                                            </tr>
                                            @foreach($allRegistrationDak as $showAllRegistrationDak)

                                            <?php
                                            $adminName = DB::table('admins')
                                            ->where('id',$showAllRegistrationDak->receiver_admin_id)->value('admin_name_ban');

                                            $designationId = DB::table('admin_designation_histories')
                                            ->where('admin_id',$showAllRegistrationDak->receiver_admin_id)
                                            ->value('designation_list_id');

                                            $designationName = DB::table('designation_lists')
                                            ->where('id',$designationId)->value('designation_name');

                                            $branchId = DB::table('designation_lists')
                                            ->where('id',$designationId)->value('branch_id');

                                            $branchName = DB::table('branches')
                                            ->where('id',$branchId)->value('branch_name');
?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <button class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </td>
                                                <td>{{ $branchName }}, {{ $designationName }}
                                                </td>
                                                <td>{{ $adminName }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div>
                                                            <div class="md-radio">
                                                                <input  id="mul{{ $showAllRegistrationDak->id }}" type="radio" name="main_prapok">
                                                                <label for="mul{{ $showAllRegistrationDak->id }}"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="custom_checkbox">
                                                            <input id="check{{ $showAllRegistrationDak->id }}" class="custom_check"
                                                                   type="checkbox" name="karjo_onulipi"/>
                                                            <label for="check{{ $showAllRegistrationDak->id }}" style="--d: 30px">
                                                                <svg viewBox="0,0,50,50">
                                                                    <path d="M5 30 L 20 45 L 45 5"></path>
                                                                </svg>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="custom_checkbox">
                                                            <input id="icheck{{ $showAllRegistrationDak->id }}" class="custom_check"
                                                                   type="checkbox" name="info_onulipi"/>
                                                            <label for="icheck{{ $showAllRegistrationDak->id }}" style="--d: 30px">
                                                                <svg viewBox="0,0,50,50">
                                                                    <path d="M5 30 L 20 45 L 45 5"></path>
                                                                </svg>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="custom_checkbox">
                                                            <input id="echeck{{ $showAllRegistrationDak->id }}" class="custom_check"
                                                                   type="checkbox" name="eye_onulipi"/>
                                                            <label for="echeck{{ $showAllRegistrationDak->id }}" style="--d: 30px">
                                                                <svg viewBox="0,0,50,50">
                                                                    <path d="M5 30 L 20 45 L 45 5"></path>
                                                                </svg>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Individual column searching (text inputs) Ends-->
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection


@section('script')

<script>

$(document).on('click', '.passBranch1', function(){
});
</script>

@endsection
