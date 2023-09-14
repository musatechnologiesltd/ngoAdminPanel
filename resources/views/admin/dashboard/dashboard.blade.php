@extends('admin.master.master')

@section('title')
ড্যাশবোর্ড
@endsection


@section('body')
 <!-- Container-fluid starts-->
 <div class="container-fluid dashboard-default-sec">
    <div class="row">
        <div class="col-xl-5 box-col-12 des-xl-100">
            <div class="row">
                <div class="col-xl-12 col-md-6 box-col-6 des-xl-50">
                    <div class="card profile-greeting">
                        <div class="card-header">
                            <div class="header-top">
                                <div class="setting-list bg-primary position-unset">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <div class="setting-white"><i class="icon-user"></i></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center p-t-0">
                            <h3 class="font-light">ফিরে আসার জন্য স্বাগতম, {{ Auth::guard('admin')->user()->name }}!!</h3>
                            <p>আমরা আনন্দিত যে আপনি এই ড্যাশবোর্ড পরিদর্শন করছেন.</p>
                            {{-- <button class="btn btn-light">Update Your Profile</button> --}}
                        </div>
                        <div class="confetti">
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                            <div class="confetti-piece"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-xl-7 box-col-12 des-xl-100 dashboard-sec">
            <div class="row">
                <div class="col-xl-6 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i class="fa fa-history"></i>
                            </div>
                            <h5>{{ $totalRenewNgoRequest }}</h5>
                            <p>মোট পুনর্নবীকরণ অনুরোধ</p>


                            <div class="parrten">
                                <i class="fa fa-history"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
                    <div class="card income-card card-secondary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i class="fa fa-power-off"></i>
                            </div>
                            <h5>{{ $totalRejectedRenewNgoRequest }}</h5>
                            <p>মোট প্রত্যাখ্যান পুনর্নবীকরণ অনুরোধ</p>

                            <div class="parrten">
                                <i class="fa fa-power-off"></i>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>
</div>

<!--dd-->
<div class="container-fluid dashboard-default-sec">
    <div class="row">
<div class="col-xl-4 col-md-4 col-sm-4 box-col-4 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i class="fa fa-align-left"></i>
                            </div>
                            <h5>{{ $totalRegisteredNgo }}</h5>
                            <p>মোট এনজিও রেজিস্টার</p>

                            <div class="parrten">
                                <i class="fa fa-align-left"></i>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-xl-4 col-md-4 col-sm-4 box-col-4 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i class="fa fa-file"></i>
                            </div>
                            <h5>{{ $totalRenewNgoRequest }}</h5>
                            <p>মোট এনজিও পুনর্নবীকরণ</p>

                            <div class="parrten">
                                <i class="fa fa-file"></i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-md-4 col-sm-4 box-col-4 des-xl-25 rate-sec">
                    <div class="card income-card card-primary">
                        <div class="card-body text-center">
                            <div class="round-box">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            <h5>{{ $totalNameChangeNgoRequest }}</h5>
                            <p>মোট এনজিও নাম পরিবর্তন</p>

                            <div class="parrten">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
<!--e-->
<!-- Container-fluid Ends-->
 <div class="container-fluid dashboard-default-sec">
    <div class="row">
       <div class="col-sm-12">
            <div class="card">
<div class="card-header">
    এনজিও নিবন্ধন আবেদনের তালিকা
              </div>
                <div class="card-body">
                  <div class="table-responsive product-table">
                        <table class="display" id="basic-1">
                            <thead>
                            <tr>
                                <th>ট্র্যাকিং নম্বর</th>
                                <th>এনজিওর নাম ও ঠিকানা</th>
                                <th>পেমেন্ট</th>
                                <th>স্ট্যাটাস</th>
                                <th>জমাদানের তারিখ</th>
                                <th>কার্যকলাপ</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($all_data_for_new_list as $all_data_for_new_list_all)

                                <?php

                                $fdOneFormId = DB::table('fd_one_forms')->where('id',$all_data_for_new_list_all->fd_one_form_id)->value('user_id');
                                  $getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',$fdOneFormId)->value('ngo_type');
                             // dd($getngoForLanguage);

                             $ngoOldNew = DB::table('ngo_type_and_languages')
                             ->where('user_id',$fdOneFormId)
                             ->value('ngo_type_new_old');

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
                                <td>#{{ App\Http\Controllers\Admin\CommonController::englishToBangla($reg_number) }}</td>
                                <td>
                                    <h6>

                                        এনজিওর নাম: {{ $reg_name  }} <br>
                                        @if($ngoOldNew == 'Old')
                                        এনজিও'র ধরন : পুরাতন
                                        @else

                                        এনজিও'র ধরন : নতুন
                                        @endif


                                    </h6>

                                    <span>ঠিকানা: {{ $reg_address }}</td>
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
                                    @elseif($all_data_for_new_list_all->status == 'Rejected')
                                    <button class="btn btn-secondary btn-xs" type="button">
                                        প্রত্যাখ্যান

                                    </button>

                                    @else
                                    <button class="btn btn-secondary btn-xs" type="button">
                                        চলমান

                                    </button>

                                    @endif
                                </td>
                                <td>


                                    {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($all_data_for_new_list_all->created_at))) }}

                                </td>
                                <td>

                                    @if (Auth::guard('admin')->user()->can('register_list_view'))
                                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('registrationView',$all_data_for_new_list_all->fd_one_form_id) }}';">বিস্তারিত দেখুন</button>
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
   </div>
</div>

 <div class="container-fluid dashboard-default-sec">
    <div class="row">
       <div class="col-sm-12">
            <div class="card">
<div class="card-header">
    এনজিও নাম পরিবর্তনের তালিকা
              </div>
                <div class="card-body">
                    <div class="table-responsive product-table">
                        <table class="display" id="basic-2">
                            <thead>
                            <tr>
                                <th>ডাইরি নম্বর</th>
                                <th>আগের এনজিওর নাম (বাংলা ও ইংরেজি)</th>
                                <th>অনুরোধ করা এনজিও নাম (বাংলা ও ইংরেজি)</th>
                                <th>পেমেন্ট</th>
                                <th>স্ট্যাটাস</th>
                                <th>জমাদানের তারিখ</th>
                                <th>কার্যকলাপ</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($all_data_for_new_list_name_change as $all_data_for_new_list_all)

                                <?php
 $fdOneFormId =  DB::table('fd_one_forms')->where('id',$all_data_for_new_list_all->fd_one_form_id)->value('user_id');
                                $reg_number = DB::table('fd_one_forms')->where('id',$all_data_for_new_list_all->fd_one_form_id)->value('registration_number');
                         $getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',$fdOneFormId)->value('ngo_type');
                             // dd($getngoForLanguage);
                                  if($getngoForLanguage =='দেশিও'){

                                    $reg_name = DB::table('fd_one_forms')->where('id',$all_data_for_new_list_all->fd_one_form_id)->value('organization_name_ban');

                                  }else{
                                    $reg_name = DB::table('fd_one_forms')->where('id',$all_data_for_new_list_all->fd_one_form_id)->value('organization_name');
                                  }
                                $reg_address = DB::table('fd_one_forms')->where('id',$all_data_for_new_list_all->fd_one_form_id)->value('organization_address');

                                ?>
                            <tr>
                                <td>#{{ App\Http\Controllers\Admin\CommonController::englishToBangla($reg_number) }}</td>
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
                                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('nameChangeView',$all_data_for_new_list_all->id) }}';">বিস্তারিত দেখুন</button>
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
   </div>
</div>


 <div class="container-fluid dashboard-default-sec">
    <div class="row">
       <div class="col-sm-12">
            <div class="card">
<div class="card-header">
    এনজিও নিবন্ধন নবায়ন তালিকা
              </div>
                <div class="card-body">
                   <div class="table-responsive product-table">
                        <table class="display" id="basic-3">
                            <thead>
                            <tr>
                                <th>ডাইরি নম্বর</th>
                                <th>এনজিওর নাম ও ঠিকানা</th>
                                <th>পেমেন্ট</th>
                                <th>স্ট্যাটাস</th>
                                <th>জমাদানের তারিখ</th>
                                <th>কার্যকলাপ</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($all_data_for_new_list_renew as $all_data_for_new_list_all)

                                <?php
 $fdOneFormId =  DB::table('fd_one_forms')->where('id',$all_data_for_new_list_all->fd_one_form_id)->value('user_id');
                                $reg_number = DB::table('fd_one_forms')->where('id',$all_data_for_new_list_all->fd_one_form_id)->value('registration_number');
                                 $getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id', $fdOneFormId)->value('ngo_type');
                             // dd($getngoForLanguage);
                                  if($getngoForLanguage =='দেশিও'){

                                    $reg_name = DB::table('fd_one_forms')->where('id',$all_data_for_new_list_all->fd_one_form_id)->value('organization_name_ban');

                                  }else{
                                    $reg_name = DB::table('fd_one_forms')->where('id',$all_data_for_new_list_all->fd_one_form_id)->value('organization_name');
                                  }
                                $reg_address = DB::table('fd_one_forms')->where('id',$all_data_for_new_list_all->fd_one_form_id)->value('organization_address');

                                ?>
                            <tr>
                                <td>#{{ App\Http\Controllers\Admin\CommonController::englishToBangla($reg_number) }}</td>
                                <td><h6> এনজিওর নাম: {{ $reg_name  }}</h6><span>ঠিকানা: {{ $reg_address }}</td>
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
                                    @elseif($all_data_for_new_list_all->status == 'Rejected')
                                    <button class="btn btn-secondary btn-xs" type="button">
                                        প্রত্যাখ্যান

                                    </button>

                                    @else
                                    <button class="btn btn-secondary btn-xs" type="button">
                                        চলমান

                                    </button>

                                    @endif
                                </td>
                                <td>

                                    {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($all_data_for_new_list_all->created_at))) }}

                                </td>
                                <td>

                                    @if (Auth::guard('admin')->user()->can('register_list_view'))
                                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('renewView',$all_data_for_new_list_all->id) }}';">বিস্তারিত দেখুন</button>
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
   </div>
</div>
@endsection

@section('script')


@endsection



