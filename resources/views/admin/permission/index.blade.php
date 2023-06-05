@extends('admin.master.master')

@section('title')
Permission
@endsection


@section('body')
<div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <h3>Permission List</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Permission List</li>

          </ol>
        </div>
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6 mt-5">
            @if (Auth::guard('admin')->user()->can('permissionAdd'))
            <button class="btn btn-primary add-btn" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="ri-add-line align-bottom me-1"></i>  Add Permission
                                                </button>


                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Permission</h1>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="{{ route('permission.store') }}" enctype="multipart/form-data">
                                                                @csrf

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="mb-4">
                                                                            <label for="formrow-email-input" class="form-label">Group Name</label>
                                                                            <input type="text" name="group_name"  class="form-control" placeholder="Company Name" required>
                                                                            <small></small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">

                                                                        <table class="table table-bordered" id="dynamicAddRemove">
                                                                            <tr>
                                                                                <th>Permission Name</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><input type="text" name="name[]" placeholder="Enter Ename" id="name0" class="form-control" />
                                                                                </td>
                                                                                <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Subject</button></td>
                                                                            </tr>
                                                                        </table>

                                                                    </div>



</div>






                                                                <div>
                                                                    <button type="submit" class="btn btn-primary w-md">Save Changes</button>
                                                                </div>


                                                            </form>
                                                        </div>

                                                      </div>
                                                    </div>
                                                  </div>
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
                        <table id="basic-1" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>

                                    <th>Group Name</th>
                                    <th>Permission List</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pers as $key=>$allPermissionGroup)
                                <tr>

                                    <td>{{ $allPermissionGroup->group_name }}</td>
                                    <td>

                                        <?php

$permissionList = DB::table('permissions')->where('group_name',$allPermissionGroup->group_name)
->select('name')->get();

                                            ?>

                                       @foreach($permissionList as $allPermissionList)

                                       <span class="badge bg-success">{{ $allPermissionList->name }}</span>

                                       @endforeach

                                    </td>

                                    <td>

                                        <div class="hstack gap-3 fs-15">

                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key+1 }}" class="btn btn-primary waves-light waves-effect  btn-sm"><i class="fa fa-edit"></i></a>


                                        <div class="modal fade" id="exampleModal{{ $key+1 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Update Information</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('permission.update',$allPermissionGroup->group_name)}}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="mb-4">
                                                                    <label for="formrow-email-input" class="form-label">Group Name</label>
                                                                    <input type="text" name="group_name" value="{{ $allPermissionGroup->group_name }}"  class="form-control" placeholder="Group Name" required>
                                                                    <small></small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">

                                                                <table class="table table-bordered" id="dynamicAddRemovee{{ $key+1 }}">
                                                                    <tr>
                                                                        <th>Permission Name</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                    @foreach($permissionList as $j=>$allPermissionList)
                                                                    @if($j == 0 )
                                                                    <tr id="mDelete{{ $j+50000 }}">
                                                                        <td><input type="text" name="name[]" value="{{ $allPermissionList->name }}" placeholder="Enter Ename" id="name{{ $j+50000 }}" class="form-control" />
                                                                        </td>
                                                                        <td><button type="button" name="add" id="dynamic-arr{{ $key+1 }}" class="btn btn-outline-primary">Add Subject</button></td>
                                                                    </tr>
                                                                    @else
                                                                    <tr id="mDelete{{ $j+50000 }}">
                                                                        <td><input type="text" name="name[]" value="{{ $allPermissionList->name }}" placeholder="Enter Ename" id="name{{ $j+50000 }}" class="form-control" />
                                                                        </td>
                                                                        <td><button type="button" id="remove-input-fieldd{{ $j+50000 }}" class="btn btn-outline-danger">Delete</button></td>
                                                                    </tr>

                                                                    @endif
                                                                    @endforeach
                                                                </table>

                                                            </div>






                                                        </div>






                                                        <div>
                                                            <button type="submit" class="btn btn-primary w-md">Save Changes</button>
                                                        </div>


                                                    </form>
                                                </div>

                                              </div>
                                            </div>
                                          </div>

                                          <?php

                                        $getIdFromGroup = DB::table('permissions')
                                        ->where('group_name',$allPermissionGroup->group_name)
                                        ->value('id');
                                          ?>


                                          <a onclick="deleteTag({{ $getIdFromGroup}})" class="btn btn-danger waves-light waves-effect  btn-sm"><i class="fa fa-trash-o"></i></a>

                                          <form id="delete-form-{{ $getIdFromGroup }}" action="{{ route('permission.destroy',$getIdFromGroup) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                                                          @csrf

                                                                      </form>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="name[]" id="name'+i+'" placeholder="Enter Name" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>


<script type="text/javascript">
    var i = 0;
    $("[id^=dynamic-arr]").click(function () {
        ++i;
        var main_id = $(this).attr('id');
        var id_for_pass = main_id.slice(11);

        $("#dynamicAddRemovee"+id_for_pass).append('<tr id="mDelete'+i+'"><td><input type="text" name="name[]" id="name'+i+'" placeholder="Enter Name" class="form-control" /></td><td><button type="button" id="remove-input-field'+i+'" class="btn btn-outline-danger">Delete</button></td></tr>'
            );
    });


    $(document).on('click', '[id^=remove-input-fieldd]', function () {

        var main_id = $(this).attr('id');
        var id_for_pass = main_id.slice(19);

        //alert(id_for_pass);

        $("#mDelete"+id_for_pass).remove();

        //$(this).parents('tr').remove();
    });
</script>

@endsection
