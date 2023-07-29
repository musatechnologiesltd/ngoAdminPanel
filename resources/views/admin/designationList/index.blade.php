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
                <form class="custom-validation" action="{{ route('designationList.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="">Branch Name</label>

                        <select class="form-control" name="branch_id" id="branch_id0" type="text" placeholder="" required>
                            <option value="">--Please Select--</option>
                            @foreach($branchLists as $AllBranchLists)
                            <option value="{{ $AllBranchLists->id }}">{{ $AllBranchLists->branch_name }}</option>
                            @endforeach
                        </select>
                        <input class="form-control" name="serial_part_one"  id="hidden_value0" type="hidden" step="0.01"  placeholder="" required readonly>
                    </div>
                <div class="mb-3">
                    <label class="form-label" for="">Designation Name</label>
                    <input class="form-control" name="designation_name" id="designation_name0" type="text" placeholder="" required>
                </div>




                <div class="mb-3">
                    <label class="form-label" for="">Designation Serial</label>

                    <div class="row">
                        <div class="col-md-2">
                            <input class="form-control" name="serial_part_one1"  id="serial_part_one0" type="number" step="0.01"  placeholder="" required readonly>
                        </div>

                        <div class="col-md-10">
                            <input class="form-control" name="serial_pert_two"  id="designation_serial0" type="number"  placeholder="" required>
                        </div>
                    </div>


                </div>
                <small class="text-danger" id="result0"></small>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" id="finalButton0" type="submit">Submit</button>
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
                                <th>Branch Name</th>
                                <th>Designation Name</th>

                                <th>Designation Serial</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($designationLists as $key=>$AllDesignationLists)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <?php

                                    $branchName = DB::table('branches')->where('id',$AllDesignationLists->branch_id)->value('branch_name');


                                        ?>
                                        {{ $branchName }}


                                                                    </td>
                                <td>{{ $AllDesignationLists->designation_name }}</td>

                                <td>{{ $AllDesignationLists->designation_serial }}</td>
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
                                                      <form action="{{ route('designationList.update',$AllDesignationLists->id ) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                                          @method('PUT')
                                                          @csrf
                                                          <div class="mb-3">
                                                            <label class="form-label" for="">Branch Name</label>

                                                            <select class="form-control" name="branch_id" id="branch_id{{ $AllDesignationLists->id }}" type="text" placeholder="" required>
                                                                <option value="">--Please Select--</option>
                                                                @foreach($branchLists as $AllBranchLists)
                                                                <option value="{{ $AllBranchLists->id }}"  {{ $AllDesignationLists->branch_id == $AllBranchLists->id ? 'selected':''  }}>{{ $AllBranchLists->branch_name }}</option>
                                                                @endforeach
                                                            </select>

                                                            <input class="form-control" name="serial_part_one"  id="hidden_value{{ $AllDesignationLists->id }}" type="hidden" step="0.01"  placeholder="" required readonly>

                                                        </div>
                                                          <div class="mb-3">
                                                            <label class="form-label" for="">Designation Name</label>
                                                            <input class="form-control" name="designation_name" value="{{ $AllDesignationLists->designation_name  }}" id="designation_name{{ $AllDesignationLists->id }}" type="text" placeholder="" required>
                                                        </div>



                                                        <div class="mb-3">
                                                            <label class="form-label" for="">Designation Serial</label>
                                                            <input class="form-control" name="designation_serial" value="{{ $AllDesignationLists->designation_serial }}" id="designation_serial{{ $AllDesignationLists->id  }}" type="number" step="0.01" placeholder="" required>

                                                        </div>


                                                        <small class="text-danger" id="result{{ $AllDesignationLists->id  }}"></small>

                                                          <button type="submit" id="finalButton{{ $AllDesignationLists->id  }}" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
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
<!-- branch-->


<script>
    $("[id^=branch_id]").change(function(){
        var main_id = $(this).attr('id');
        var id_for_pass = main_id.slice(9);


        //part one id

        var firstValue = $('#hidden_value'+id_for_pass).val();
        var secondValue = $('#designation_serial'+id_for_pass).val();

        //end part one if


        var branchId = $('#branch_id'+id_for_pass).val();
        var designationName = $('#designation_name'+id_for_pass).val();

        var designationSerial =firstValue + '.'+secondValue;
        //alert(branchId);


        $.ajax({
        url: "{{ route('showBranchStep') }}",
        method: 'GET',
        data: {branchId:branchId},
        success: function(data) {



            $("#serial_part_one"+id_for_pass).val(data);
            $("#hidden_value"+id_for_pass).val(data);




        }
        });

        //

        $.ajax({
        url: "{{ route('checkDesignation') }}",
        method: 'GET',
        data: {branchId:branchId,designationName:designationName,designationSerial:designationSerial},
        success: function(data) {

            if(data >= 1){

                $("#result"+id_for_pass).html('You Have Already Add This Step');
                $("#finalButton"+id_for_pass).hide();

            }else{

                $("#result"+id_for_pass).html('');
                $("#finalButton"+id_for_pass).show();
            }


        }
        });



        //alert(id_for_pass);
    });
    </script>
<!-- end branch -->

<!-- designation -->
<script>
    $("[id^=designation_name]").keyup(function(){
        var main_id = $(this).attr('id');
        var id_for_pass = main_id.slice(16);


        var branchId = $('#branch_id'+id_for_pass).val();
        var designationName = $('#designation_name'+id_for_pass).val();

        var designationSerial = $('#designation_serial'+id_for_pass).val();
        //alert(branchId);


        $.ajax({
        url: "{{ route('checkDesignation') }}",
        method: 'GET',
        data: {branchId:branchId,designationName:designationName,designationSerial:designationSerial},
        success: function(data) {

            if(data >= 1){

                $("#result"+id_for_pass).html('You Have Already Add This Step');
                $("#finalButton"+id_for_pass).hide();

            }else{

                $("#result"+id_for_pass).html('');
                $("#finalButton"+id_for_pass).show();
            }


        }
        });



        //alert(id_for_pass);
    });
    </script>
<!-- end designation -->


<!--step-->
<script>
    $("[id^=designation_serial]").keyup(function(){
        var main_id = $(this).attr('id');
        var id_for_pass = main_id.slice(18);


        //part one id

        var firstValue = $('#hidden_value'+id_for_pass).val();
        var secondValue = $('#designation_serial'+id_for_pass).val();

        //end part one if


        var branchId = $('#branch_id'+id_for_pass).val();
        var designationName = $('#designation_name'+id_for_pass).val();

        var designationSerial =firstValue + '.'+secondValue;
        //alert(branchId);


        $.ajax({
        url: "{{ route('checkDesignation') }}",
        method: 'GET',
        data: {branchId:branchId,designationName:designationName,designationSerial:designationSerial},
        success: function(data) {

            if(data >= 1){

                $("#result"+id_for_pass).html('You Have Already Add This Step');
                $("#finalButton"+id_for_pass).hide();

            }else{

                $("#result"+id_for_pass).html('');
                $("#finalButton"+id_for_pass).show();
            }


        }
        });



        //alert(id_for_pass);
    });
    </script>
    <!--end step-->
@endsection

