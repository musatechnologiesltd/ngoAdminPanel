@extends('admin.master.master')

@section('title')
User List
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <h3>Staff List</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Staff List</li>

          </ol>
        </div>
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6 mt-3">
            @if (Auth::guard('admin')->user()->can('userAdd'))
            <a  href="{{ route('user.create') }}" class="btn btn-primary add-btn" type="button">
                <i class="ri-add-line align-bottom me-1"></i>  Add User
            </a>
                                                @endif
        </div>
      </div>
    </div>
  </div>
        <!-- end page title -->

        <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        @include('flash_message')
                        <div class="table-responsive">
                        <table id="basic-1" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>

                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Signature</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Branch</th>
                                   <th>Mobile Number</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)


                                <tr>
                                   <td>


                                    {{ $loop->index+1 }}




                                </td>

                                <td>

                                    @if(empty($user->admin_image))
                                    @else
<img src="{{ asset('/') }}{{ $user->admin_image }}" style="height:15px" />
@endif
                                </td>

                                <td>
                                    @if(empty($user->admin_sign))
                                    @else
                                    <img src="{{ asset('/') }}{{ $user->admin_sign }}" style="height:15px" />
                                    @endif

                                                                    </td>

                                    <td>{{ $user->admin_name }}</td>

                                    <td>     <?php

                                        $desiName = DB::table('designation_lists')
                                        ->where('id',$user->designation_list_id)
                                        ->value('designation_name');


                                            ?>
                                            {{ $desiName }}</td>
                                    <td><?php

                                        $branchName = DB::table('branches')->where('id',$user->branch_id)->value('branch_name');


                                            ?>
                                            {{ $branchName }}</td>
                                    <td>{{ $user->admin_mobile }}</td>

                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                        <span class="badge bg-success mt-1">
                                                {{ $role->name }}
                                        </span>
                                        @endforeach
                                    </td>
                                    <td>{{ $user->admin_job_start_date }}</td>

                                    <td>{{ $user->admin_job_end_date }}</td>



                                    <td>

                                          <a type="button" href="{{ route('user.edit',$user->id) }}"
                                          class="btn btn-primary waves-light waves-effect  btn-sm" >
                                          <i class="fa fa-pencil"></i></a>

                                            <!--  Large modal example -->
                                            <div class="modal fade bs-example-modal-lg{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myLargeModalLabel">Update User</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data" id="form" data-parsley-validate="">

                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row">
                                                                    <div class="form-group col-md-4 col-sm-12">
                                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control form-control-sm" id="name" data-parsley-maxlength="150" name="name" placeholder="Enter Name" value="{{ $user->admin_name }}" required>


                                                                    </div>
                                                                    <div class="form-group col-md-4 col-sm-12">
                                                                        <label for="email">Position</label>
                                                                        <input type="text" class="form-control form-control-sm" data-parsley-maxlength="200"  name="position" placeholder="Enter Position" value="{{ $user->admin_position }}" required>
                                                                    </div>


                                                                    <div class="form-group col-md-4 col-sm-12">
                                                                        <label for="position">Department</label>
                                                                        <input type="text" class="form-control" id="department" data-parsley-maxlength="200" name="department" value="{{ $user->admin_department }}" placeholder="Enter Department" required>

                                                                        @if ($errors->has('department'))
                                                                        <span class="text-danger">{{ $errors->first('department') }}</span>
                                                                    @endif


                                                                      </div>

                                                                      <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="position">Job Start Date</label>
                                                                        <input type="text" class="form-control datepicker23" id=""  name="admin_job_start_date" value="{{ $user->admin_job_start_date }}" placeholder="Enter Date" required>

                                                                        @if ($errors->has('admin_job_start_date'))
                                                                        <span class="text-danger">{{ $errors->first('admin_job_start_date') }}</span>
                                                                    @endif


                                                                      </div>

                                                                      <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="position">Job End Date</label>
                                                                        <input type="text" class="form-control datepicker23" id=""  name="admin_job_end_date" value="{{ $user->admin_job_end_date }}" placeholder="Enter Date" required>

                                                                        @if ($errors->has('admin_job_end_date'))
                                                                        <span class="text-danger">{{ $errors->first('admin_job_end_date') }}</span>
                                                                    @endif
                                                                      </div>




                                                                    <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="email">Email</label>
                                                                        <input type="text" class="form-control form-control-sm" id="email" data-parsley-maxlength="100" name="email" placeholder="Enter Email" value="{{ $user->email }}">
                                                                    </div>
                                                                     <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="text">Mobile Number</label>
                                                                        <input type="text" class="form-control form-control-sm" data-parsley-length="[11, 11]" name="phone" placeholder="Enter Mobile Number" value="{{ $user->admin_mobile }}" required>
                                                                    </div>



                                                                </div>

                                                                <div class="row">
                                                                    <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="password">Password</label>
                                                                        <input type="password" class="form-control form-control-sm" parsley-required="true" id="pw" name="password" placeholder="Enter Password" value="">
                                                                    </div>
                                                                    <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="password_confirmation">Confirm Password</label>
                                                                        <input type="password" class="form-control form-control-sm" data-parsley-equalto="#pw"
                                                                        parsley-required="true" id="pwc" name="password_confirmation" placeholder="Enter Password" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="password">Assign Role</label><br>
                                                                        <select name="roles[]" id="roles" class="form-control form-control-sm" required>
                                                                            @foreach ($roles as $role)
                                                                                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6 col-sm-12">
                                                                        <label for="password_confirmation">Profile Image</label>
                                                                        <input type="file" class="form-control form-control-sm"  name="image" placeholder="Enter Image">
                                                                        <img src="{{ asset('/') }}{{ $user->admin_image }}" style="height:30px;"/>
                                                                    </div>


                                                                    <div class="form-group col-md-12 col-sm-12">
                                                                        <label for="password_confirmation">Signature</label>
                                                                        <input type="file" class="form-control form-control-sm" id="" name="sign" accept="image/png, image/jpg, image/jpeg" placeholder="Enter Image" >
                                                                        <img src="{{ asset('/') }}{{ $user->admin_sign }}" style="height:30px;"/>
                                                                        @if ($errors->has('sign'))
                                                                        <span class="text-danger">{{ $errors->first('sign') }}</span>
                                                                    @endif


                                                                    </div>





                                                                </div>

                                                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->








<button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $user->id}})" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></button>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy',$user->id) }}" method="POST" style="display: none;">
                      @method('DELETE')
                                                    @csrf

                                                </form>

                                    </td>
                                </tr>
@endforeach

                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->



    </div>
    <!-- container-fluid -->
</div>




@endsection

@section('script')

@endsection







