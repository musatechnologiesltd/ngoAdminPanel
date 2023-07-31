@extends('admin.master.master')

@section('title')
Assigned User List | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Assigned User</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Assigned User List</li>
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
        @include('flash_message')
        <div class="col-sm-12">
            <div class="card">

                <div class="card-body">

                    @foreach($branchLists as $key=>$AllBranchLists)

                    <input type="hidden" name="branchId[]" value="{{ $AllBranchLists->id }}"/>

                    <?php

$designationList = DB::table('designation_lists')->where('branch_id',$AllBranchLists->id)
                ->orderBy('designation_serial','asc')->get();
                     ?>
                    <div class="card">

                        <div class="card-header">
                          <span style="font-weight:900;font-size:15px;">{{ $AllBranchLists->branch_name }}</span>
                        </div>

                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                      <th scope="col">Designation Name</th>
                                      <th scope="col">Staff Name</th>
                                      <th scope="col">Start Date</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($designationList as $j=>$AllDesignationList)
                                    <form class="custom-validation" action="{{ route('assignedEmployee.store') }}" method="post" id="form" data-parsley-validate="" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="branchId" value="{{ $AllBranchLists->id }}"/>
                                    <?php

                                   $adminId =  DB::table('admins')->where('designation_list_id',$AllDesignationList->id)
                                               ->orderBy('id','desc')->value('id');

                                               $adminDate =  DB::table('admins')->where('designation_list_id',$AllDesignationList->id)
                                               ->orderBy('id','desc')->value('admin_job_start_date');
                                    ?>
                                    <input type="hidden" name="designation_list_id" value="{{ $AllDesignationList->id }}" />
                                    <tr>
                                        <td>

                                            @if(empty($adminDate))

                                            <input type="checkbox" id="checkMain{{ $AllDesignationList->id }}" class=""/>

                                            @else

                                            <input type="checkbox" id="checkMain{{ $AllDesignationList->id }}" class="" checked disabled/>
                                            @endif


                                        </td>

                                      <td>{{ $AllDesignationList->designation_name }}</td>
                                      <td>

                                        @if(empty($adminDate))

                                        <select class="form-control" style="display: none;" name="adminId"  id="adminId{{ $AllDesignationList->id }}">
                                            <option value="">--Please Select --</option>
                                            @foreach($users_as as $allusers)


                                            <option value="{{ $allusers->id }}">{{ $allusers->admin_name }}</option>

                                            @endforeach
                                            </select>
@else

<select class="form-control" name="adminId" disabled id="adminId{{ $AllDesignationList->id }}">
    <option value="">--Please Select --</option>
    @foreach($users as $allusers)


    <option value="{{ $allusers->id }}" {{ $allusers->id == $adminId ? 'selected':'' }}>{{ $allusers->admin_name }}</option>

    @endforeach
    </select>
@endif






                                    </td>
                                      <td>

                                        @if(empty($adminDate))
                                        <input type="text" style="display: none;" class="form-control datepicker233" value="{{ $adminDate }}" id="admin_job_start_date{{ $AllDesignationList->id }}"  name="admin_job_start_date" placeholder="Enter Date" >
                                        @else
                                        <input type="text" class="form-control datepicker233" value="{{ date('d-m-Y', strtotime($adminDate)) }}" id="admin_job_start_date{{ $AllDesignationList->id }}"   name="admin_job_start_date" placeholder="Enter Date" disabled>
                                        @endif
                                      </td>

                                      <td>
                                        @if(empty($adminDate))
                                        <button type="submit"  class="btn btn-primary btn-sm" id="bMain{{ $AllDesignationList->id }}" style="display: none;"><i class="fa fa-hand-o-right"></i></button>
                                        @else
                                        <button type="submit"  class="btn btn-primary btn-sm" id="bMain{{ $AllDesignationList->id }}" disabled><i class="fa fa-hand-o-right"></i></button>
                                        @endif

                                    </td>

                                    </tr>
                                </form>
@endforeach

                                  </tbody>
                            </table>

                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
        <!-- Individual column searching (text inputs) Ends-->
    </div>



</div>
<!-- Container-fluid Ends-->
@endsection


@section('script')

<!-- designation -->
<script>
    $("[id^=checkMain]").click(function(){
         var main_id = $(this).attr('id');
         var id_for_pass = main_id.slice(9);

         $("#bMain"+id_for_pass).hide();
         $("#adminId"+id_for_pass).hide();
         $("#admin_job_start_date"+id_for_pass).hide();




        if($(this).is(":checked")){
                //alert(id_for_pass);
                $("#bMain"+id_for_pass).show();
         $("#adminId"+id_for_pass).show();
         $("#admin_job_start_date"+id_for_pass).show();


            }
            else if($(this).is(":not(:checked)")){
                //alert(id_for_pass);
                $("#bMain"+id_for_pass).hide();
         $("#adminId"+id_for_pass).hide();
         $("#admin_job_start_date"+id_for_pass).hide();
            }





        //alert(id_for_pass);
    });
    </script>
<!-- end designation -->

@endsection

