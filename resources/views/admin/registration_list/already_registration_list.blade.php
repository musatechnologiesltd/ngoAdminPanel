@extends('admin.master.master')

@section('title')
Ngo Registration List | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Rejected NGO Registration List</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">NGO Registration</li>
                    <li class="breadcrumb-item">New NGO Registration List</li>
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

                <div class="card-body">
                    <div class="table-responsive product-table">
                        <table class="display" id="basic-1">
                            <thead>
                            <tr>
                                <th>UserID</th>
                                <th>NGO Name & Address</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Submit date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($all_data_for_new_list as $all_data_for_new_list_all)

                                <?php

                                $fdOneFormId = DB::table('fd_one_forms')->where('id',$all_data_for_new_list_all->fd_one_form_id)->value('user_id');
                                  $getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',$fdOneFormId)->value('ngo_type');
                             // dd($getngoForLanguage);
                                  if($getngoForLanguage =='দেশিও'){

                                    $reg_name = DB::table('fd_one_forms')->where('id',$all_data_for_new_list_all->fd_one_form_id)->value('organization_name_ban');

                                  }else{
                                    $reg_name = DB::table('fd_one_forms')->where('id',$all_data_for_new_list_all->fd_one_form_id)->value('organization_name');
                                  }

                                  ?>

                                <?php

                                $reg_number = DB::table('fd_one_forms')->where('id',$all_data_for_new_list_all->fd_one_form_id)->value('registration_number_given_by_admin');

                                $reg_address = DB::table('fd_one_forms')->where('id',$all_data_for_new_list_all->fd_one_form_id)->value('organization_address');

                                ?>
                            <tr>
                                <td>#{{ $reg_number }}</td>
                                <td><h6> NGO Name: {{ $reg_name  }}</h6><span>Address: {{ $reg_address }}</td>
                                <td>Yes</td>
                                <td class="font-success"><button class="btn btn-secondary btn-xs" type="button">{{ $all_data_for_new_list_all->status }}</button></td>
                                <td>


                                    {{ date('d-M-y', strtotime($all_data_for_new_list_all->created_at)) }}

                                </td>
                                <td>

                                    @if (Auth::guard('admin')->user()->can('register_list_view'))
                                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('registrationView',$all_data_for_new_list_all->fd_one_form_id) }}';">View</button>
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
