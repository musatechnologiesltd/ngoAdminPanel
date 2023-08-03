@extends('admin.master.master')

@section('title')
নতুন এনজিও নাম পরিবর্তনের তালিকা | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>নতুন এনজিও নাম পরিবর্তনের তালিকা</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">এনজিওর নাম পরিবর্তন</li>
                    <li class="breadcrumb-item">নতুন এনজিও নাম পরিবর্তনের তালিকা</li>
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
                                <th>ট্র্যাকিং নম্বর</th>
                                <th>আগের এনজিওর নাম (বাংলা ও ইংরেজি)</th>
                                <th>অনুরোধ করা এনজিও নাম (বাংলা ও ইংরেজি)</th>
                                <th>পেমেন্ট</th>
                                <th>স্ট্যাটাস</th>
                                <th>জমাদানের তারিখ</th>
                                <th>কার্যকলাপ</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($all_data_for_new_list as $all_data_for_new_list_all)

                                <?php

                                $reg_number = DB::table('fd_one_forms')->where('id',$all_data_for_new_list_all->fd_one_form_id)->first();
                         $getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',$reg_number->user_id)->value('ngo_type');
                             // dd($getngoForLanguage);
                                  if($getngoForLanguage =='দেশিও'){

                                    $reg_name = $reg_number->organization_name_ban;

                                  }else{
                                    $reg_name = $reg_number->organization_name;
                                  }
                                $reg_address =$reg_number->organization_address;

                                ?>
                            <tr>
                                <td>#{{ App\Http\Controllers\Admin\CommonController::englishToBangla($reg_number->registration_number_given_by_admin) }}</td>
                                <td><h6> এনজিওর নাম (বাংলা): {{ $all_data_for_new_list_all->previous_name_ban }}</h6><span>এনজিওর নাম (ইংরেজি): {{ $all_data_for_new_list_all->previous_name_eng }}</td>
                                <td><h6> এনজিওর নাম (বাংলা): {{ $all_data_for_new_list_all->present_name_ban }}</h6><span>এনজিওর নাম (ইংরেজি): {{ $all_data_for_new_list_all->present_name_eng }}</td>
                                <td>হ্যাঁ</td>
                                <td class="font-success">

                                    @if($all_data_for_new_list_all->status == 'Accepted')

                                    <button class="btn btn-secondary btn-xs" type="button">
                                        গৃহীত

                                    </button>
                                    @elseif($all_data_for_new_list_all->status == 'Ongoing')

                                    <button class="btn btn-secondary btn-xs" type="button">
                                        চলমান

                                    </button>
                                    @else
                                    <button class="btn btn-secondary btn-xs" type="button">
                                        প্রত্যাখ্যান

                                    </button>
                                    @endif
                                </td>
                                <td>


                                    {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($all_data_for_new_list_all->created_at))) }}


                                </td>
                                <td>

                                    @if (Auth::guard('admin')->user()->can('register_list_view'))
                                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('nameChangeView',$all_data_for_new_list_all->id) }}';">View</button>
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
