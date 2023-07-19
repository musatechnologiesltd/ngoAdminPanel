@extends('admin.master.master')

@section('title')
Designation Step List | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Designation Step</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Designation Step List</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Add Designation Step</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Designation Step Information</h4>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="custom-validation" action="{{ route('designationStepList.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                    @csrf
                <div class="mb-3">
                    <label class="form-label" for="">Designation</label>
                    <select class="form-control" name="designation_list_id" id="" type="text" placeholder="" required>
                        <option value="">--Please Select--</option>
                        @foreach($designationLists as $AllDesignationLists)
                        <option value="{{ $AllDesignationLists->id }}">{{ $AllDesignationLists->designation_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="">Designation Step</label>
                    <input class="form-control" name="designation_step" id="" type="number" placeholder="" required>

                </div>
                <div class="mb-3">
                    <label class="form-label" for="">Designation Serial</label>
                    <input class="form-control" name="designation_serial" id="" type="number" placeholder="" required>

                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                </form>
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
                    <div class="table-responsive product-table">
                        <table class="display" id="basic-1">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Designation Name</th>
                                <th>Designation Step</th>
                                <th>Designation Serial</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($designationStepLists as $key=>$AllDesignationStepLists)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <?php

                                    $desiName = DB::table('designation_lists')
                                    ->where('id',$AllDesignationStepLists->designation_list_id)
                                    ->value('designation_name');


                                        ?>
                                        {{ $desiName }}


                                                                    </td>
                                <td>{{ $AllDesignationStepLists->designation_step }}</td>
                                <td>{{ $AllDesignationStepLists->designation_serial }}</td>
                                <td>
                                    @if (Auth::guard('admin')->user()->can('designationStepUpdate'))
                                    <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $AllDesignationStepLists->id }}"
                                    class="btn btn-primary waves-light waves-effect  btn-sm" >
                                    <i class="fa fa-pencil"></i></button>

                                      <!--  Large modal example -->
                                      <div class="modal fade bs-example-modal-lg{{ $AllDesignationStepLists->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="myLargeModalLabel">Update Branch</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                      </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <form action="{{ route('designationStepList.update',$AllDesignationStepLists->id ) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                                          @method('PUT')
                                                          @csrf
                                                          <div class="mb-3">
                                                            <label class="form-label" for="">Designation</label>
                                                            <select class="form-control" name="designation_list_id" id="" type="text" placeholder="" required>
                                                                <option>--Please Select--</option>
                                                                @foreach($designationLists as $AllDesignationLists)
                                                                <option value="{{ $AllDesignationLists->id }}" {{ $AllDesignationLists->id == $AllDesignationStepLists->designation_list_id ? 'selected':''  }}>{{ $AllDesignationLists->designation_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="">Designation Step</label>
                                                            <input class="form-control" name="designation_step" value="{{ $AllDesignationStepLists->designation_step }}" id="" type="text" placeholder="" required>

                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="">Designation Serial</label>
                                                            <input class="form-control" name="designation_serial" value="{{ $AllDesignationStepLists->designation_serial }}" id="" type="text" placeholder="" required>

                                                        </div>






                                                          <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                                                      </form>
                                                  </div>
                                              </div><!-- /.modal-content -->
                                          </div><!-- /.modal-dialog -->
                                      </div><!-- /.modal -->


@endif

{{-- <button type="button" class="btn btn-primary waves-light waves-effect  btn-sm" onclick="window.location.href='{{ route('admin.users.view',$AllDesignationStepLists->id) }}'"><i class="fa fa-eye"></i></button> --}}

                            @if (Auth::guard('admin')->user()->can('designationStepDelete'))

<button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $AllDesignationStepLists->id}})" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></button>
              <form id="delete-form-{{ $AllDesignationStepLists->id }}" action="{{ route('designationStepList.destroy',$AllDesignationStepLists->id) }}" method="POST" style="display: none;">
                @method('DELETE')
                                              @csrf

                                          </form>
                                          @endif
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
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

