@extends('admin.master.master')

@section('title')
সেটিং
@endsection


@section('body')
<div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <h3>সেটিং </h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
            <li class="breadcrumb-item">সেটিং</li>

          </ol>
        </div>
        <div class="col-sm-6">

        </div>

        </div>
      </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <div class="d-flex profile-wrapper">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">


                        </ul>
                        <div class="flex-shrink-0">
                            {{-- <a href="{{ route('profile.index') }}" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i>Profile</a> --}}
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content pt-4 text-muted">
                        <div class="tab-pane active" id="overview-tab" role="tabpanel">
                            <div class="row">
                                <div class="col-xxl-12">


                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">তথ্য</h5>
                                            @include('flash_message')
                                            <form action="{{ route('setting.store') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th class="ps-0" scope="row">পুরো নাম:</th>
                                                            <td class="text-muted">
                                                                <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->admin_name }}" name="পুরো নাম"/>
                                                                <input type="hidden" class="form-control" value="{{ Auth::guard('admin')->user()->id }}" name="id"/>

                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th class="ps-0" scope="row">মোবাইল নম্বর:</th>
                                                            <td class="text-muted">

                                                                <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->admin_mobile }}" name="মোবাইল নম্বর"/>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">ই-মেইল:</th>
                                                            <td class="text-muted">

                                                                <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->email }}" name="ই-মেইল"/>
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <th class="ps-0" scope="row">ছবি:</th>
                                                            <td class="text-muted">

                                                                <input type="file" class="form-control"  name="image"/>
                                                                <div class="avatar-lg">
                                                                @if(empty(Auth::guard('admin')->user()->admin_image))
                        <img src="{{asset('/')}}public/admin/user.png" alt="user-img" class="" style="height:50px;"/>
                        @else
                        <img src="{{asset('/')}}{{ Auth::guard('admin')->user()->admin_image }}" alt="user-img" class="" style="height:50px;" />
                        @endif
                                                                </div>
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <th class="ps-0" scope="row">স্বাক্ষর:</th>
                                                            <td class="text-muted">

                                                                <input type="file" class="form-control"  name="image"/>
                                                                <div class="avatar-lg">
                                                                @if(empty(Auth::guard('admin')->user()->admin_sign))
                        <img src="{{asset('/')}}public/admin/user.png" alt="user-img" class="" style="height:50px;"/>
                        @else
                        <img src="{{asset('/')}}{{ Auth::guard('admin')->user()->admin_sign }}" alt="user-img" class="" style="height:50px;" />
                        @endif
                                                                </div>
                                                            </td>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light btn-sm">Update</button>
                                            </form>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->


                                </div>
                                <!--end col-->

                            </div>
                            <!--end row-->
                        </div>

                    </div>
                    <!--end tab-content-->
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div><!-- container-fluid -->
</div><!-- End Page-content -->
@endsection

@section('script')
@endsection

