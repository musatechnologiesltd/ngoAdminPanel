@extends('admin.master.master')

@section('title')
কার্য ব্যাবস্থাপনার তালিকা | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>কার্য ব্যাবস্থাপনার তালিকা</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">কার্য ব্যবস্থাপনা</li>
                    <li class="breadcrumb-item">কার্য ব্যাবস্থাপনার তালিকা</li>
                </ol>
            </div>
            <div class="col-sm-6 ">
                @if (Auth::guard('admin')->user()->can('taskManagerAdd'))
                <div class="text-end">
                <a  href="{{ route('taskManager.create') }}" class="btn btn-primary add-btn" type="button">
                    <i class="ri-add-line align-bottom me-1"></i> কার্য ব্যাবস্থাপনার তথ্য যোগ করুন
                </a>
                </div>
                                                    @endif
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid list-products">
    <div class="row">
        <!-- Individual column searching (text inputs) Starts-->

        <div class="col-sm-12"  >
            <div class="card">

                <div class="card-body">

                    <div class="table-responsive product-table" >

                        <table class="display" id="basic-1">
                            <thead>
                            <tr>
                                <th>ক্র: নং:</th>
                                <th>কাজের ধরন</th>
                                <th>কাজের নাম</th>
                                <th>কাজ শেষ করার তারিখ</th>
                                <th>কার্যকলাপ</th>

                            </tr>
                            </thead>
                            <tbody id="searchTable">

                                @foreach($allTaskList as $key=>$allPermissionGroup)
                                <tr>
<td>{{ $key+1 }}</td>
                                    <td>{{ $allPermissionGroup->task_type }}</td>
                                    <td>{{ $allPermissionGroup->task_name }}</td>
                                    <td>

@if(empty($allPermissionGroup->end_date))


@else

                                        {{ App\Http\Controllers\Admin\CommonController::englishToBangla($allPermissionGroup->end_date) }}
@endif

                                    </td>
                                    <td>

                                        <div class="hstack gap-3 fs-15">


                                            <a href="{{ route('taskManager.edit',$allPermissionGroup->id) }}" class="btn btn-info waves-light waves-effect  btn-sm"><i class="fa fa-edit"></i></a>

                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key+1 }}" class="btn btn-primary waves-light waves-effect  btn-sm"><i class="fa fa-eye"></i></a>


                                        <div class="modal fade" id="exampleModal{{ $key+1 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">কাজের বিবরণ</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <?php

                                        $adminIdList = DB::table('assaign_tasks')
                                        ->where('task_id',$allPermissionGroup->id)
                                        ->get();


                                            ?>


                                                    <h6><u>কর্মকর্তাদের তালিকা</u></h6>

                                                    <ul>
                                                        @foreach($adminIdList as $key=>$adminIdLists)
                                                        <?php

$adminNameList = DB::table('admins')
                                        ->where('id',$adminIdLists->admin_id)
                                        ->first();


                                                        ?>
                                                        @if(!$adminNameList)

                                                        @else
                                                        <?php

$desiName = DB::table('designation_lists')
                                        ->where('id',$adminNameList->designation_list_id)
                                        ->value('designation_name');

                                        $branchName = DB::table('branches')->where('id',$adminNameList->branch_id)->value('branch_name');

                                                        ?>

                                                        @if(count($adminIdList)== ($key+1))

                                                        <li>{{ $adminNameList->admin_name_ban }}, {{ $desiName }}, {{ $branchName }} <span style="font-weight:bold;color:green;">( {{ $adminIdLists->status }})</span> |</li>
@else
<li>{{ $adminNameList->admin_name_ban }}, {{ $desiName }}, {{ $branchName }} <span style="font-weight:bold;color:green;">( {{ $adminIdLists->status }})</span>;</li>
@endif

                                                        @endif
                                                        @endforeach
                                                    </ul>

                                                    <h6 class="mt-3"><u>কাজের বিবরণ</u></h6>
{!! $allPermissionGroup->description !!}

                                                </div>

                                              </div>
                                            </div>
                                          </div>




                                          <a onclick="deleteTag({{ $allPermissionGroup->id}})" class="btn btn-danger waves-light waves-effect  btn-sm"><i class="fa fa-trash-o"></i></a>

                                          <form id="delete-form-{{ $allPermissionGroup->id }}" action="{{ route('taskManager.destroy',$allPermissionGroup->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                                                          @csrf

                                                                      </form>

                                        </div>
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
