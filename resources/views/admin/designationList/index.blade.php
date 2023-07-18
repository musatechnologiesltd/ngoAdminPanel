@extends('admin.master.master')

@section('title')
Designation List | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Designation</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Designation List</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Add Designation List</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Designation Information</h4>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="custom-validation" action="{{ route('designationList.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="mb-3">
                    <label class="form-label" for="">Designation Name</label>
                    <input class="form-control" name="designation_name" id="" type="text" placeholder="">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="">Branch Name</label>

                    <select class="form-control" name="branch_id" id="" type="text" placeholder="">
                        <option>--Please Select--</option>
                        @foreach($branchLists as $AllBranchLists)
                        <option value="{{ $AllBranchLists->id }}">{{ $AllBranchLists->branch_name }}</option>
                        @endforeach
                    </select>

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
                                <th>Branch Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($designationLists as $key=>$AllDesignationLists)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $AllDesignationLists->designation_name }}</td>
                                <td>
<?php

$branchName = DB::table('branches')->where('id',$AllDesignationLists->branch_id)->value('branch_name');


    ?>
    {{ $branchName }}


                                </td>
                                <td>
                                    @if (Auth::guard('admin')->user()->can('designationUpdate'))
                                    <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $AllDesignationLists->id }}"
                                    class="btn btn-primary waves-light waves-effect  btn-sm" >
                                    <i class="fa fa-pencil"></i></button>

                                      <!--  Large modal example -->
                                      <div class="modal fade bs-example-modal-lg{{ $AllDesignationLists->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="myLargeModalLabel">Update Branch</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                      </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <form action="{{ route('designationList.update',$AllDesignationLists->id ) }}" method="POST" enctype="multipart/form-data">
                                                          @method('PUT')
                                                          @csrf
                                                          <div class="mb-3">
                                                            <label class="form-label" for="">Designation Name</label>
                                                            <input class="form-control" name="designation_name" value="{{ $AllDesignationLists->designation_name  }}" id="" type="text" placeholder="">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="">Branch Name</label>

                                                            <select class="form-control" name="branch_id" id="" type="text" placeholder="">
                                                                <option>--Please Select--</option>
                                                                @foreach($branchLists as $AllBranchLists)
                                                                <option value="{{ $AllBranchLists->id }}"  {{ $AllDesignationLists->branch_id == $AllBranchLists->id ? 'selected':''  }}>{{ $AllBranchLists->branch_name }}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>



                                                          <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                                                      </form>
                                                  </div>
                                              </div><!-- /.modal-content -->
                                          </div><!-- /.modal-dialog -->
                                      </div><!-- /.modal -->


@endif

{{-- <button type="button" class="btn btn-primary waves-light waves-effect  btn-sm" onclick="window.location.href='{{ route('admin.users.view',$AllDesignationLists->id) }}'"><i class="fa fa-eye"></i></button> --}}

                            @if (Auth::guard('admin')->user()->can('designationDelete'))

<button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $AllDesignationLists->id}})" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></button>
              <form id="delete-form-{{ $AllDesignationLists->id }}" action="{{ route('designationList.destroy',$AllDesignationLists->id) }}" method="POST" style="display: none;">
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

