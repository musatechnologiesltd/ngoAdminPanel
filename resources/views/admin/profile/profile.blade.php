@extends('admin.master.master')

@section('title')
প্রোফাইল
@endsection


@section('body')

<div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <h3>প্রোফাইল </h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
            <li class="breadcrumb-item">প্রোফাইল</li>

          </ol>
        </div>
        <div class="col-sm-6">

        </div>

        </div>
      </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <div class="card">
                    <div class="card-body">
                        <center>
                        @if(empty(Auth::guard('admin')->user()->admin_image))
                        <img src="{{asset('/')}}public/admin/user.png" alt="user-img" class="img-thumbnail rounded-circle" style="height: 100px;"/>
                        @else
                        <img src="{{asset('/')}}{{ Auth::guard('admin')->user()->admin_image }}" alt="user-img" class="img-thumbnail rounded-circle" />
                        @endif
                        </center>
                    </div>
                </div>

            </div>
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Info</h5>
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th class="ps-0" scope="row">ইংরেজি নাম:</th>
                                                            <td class="text-muted">{{ Auth::guard('admin')->user()->admin_name }}</td>
                                                        </tr>
                                                        <?php
                                                        $designationName = DB::table('designation_lists')
                                                        ->where('id',Auth::guard('admin')->user()->designation_list_id)
                                                        ->value('designation_name');

                                                        $branchName = DB::table('branches')
                                                        ->where('id',Auth::guard('admin')->user()->branch_id)
                                                        ->value('branch_name');

                                                   ?>
                                                        <tr>
                                                            <th class="ps-0" scope="row">বাংলা নাম:</th>
                                                            <td class="text-muted">{{ Auth::guard('admin')->user()->admin_name_ban }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">পদবী:</th>
                                                            <td class="text-muted">{{ $designationName}}</td>
                                                        </tr>

                                                        <tr>
                                                            <th class="ps-0" scope="row">বিভাগ :</th>
                                                            <td class="text-muted">{{ $branchName}}</td>
                                                        </tr>


                                                        <tr>
                                                            <th class="ps-0" scope="row">মোবাইল নম্বর :</th>
                                                            <td class="text-muted">{{ App\Http\Controllers\Admin\CommonController::englishToBangla(Auth::guard('admin')->user()->admin_mobile) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">ই-মেইল:</th>
                                                            <td class="text-muted">{{ Auth::guard('admin')->user()->email }}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('script')
@endsection

