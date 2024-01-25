<div class="card-body">


            <div class="table-responsive product-table mb-0 ">
                <table class="display" id="basic-1">
                    <tbody>

                        @foreach($ngoStatusReg as $i=>$allStatusData)

                        <?php

                        //new code
$orginalReceverId= DB::table('ngo_registration_daks')
->where('registration_status_id',$allStatusData->registration_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('ngo_statuses')->where('id',$allStatusData->registration_status_id)->value('fd_one_form_id');
$formOneData = DB::table('fd_one_forms')->where('id',$formOneDataId)->first();
$adminNamePrapok = DB::table('admins') ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');
$adminNamePrerok = DB::table('admins')->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');
$decesionName = DB::table('dak_details')->where('id',$allStatusData->dak_detail_id)->where('status','registration')->value('decision_list');
$dakDetail = DB::table('dak_details')->where('access_id',$allStatusData->registration_status_id)->orderBy('id','desc')->first();

                        ?>
                    <tr>
                        <td style="text-align:left;">
                            উৎসঃ {{ $formOneData->organization_name_ban }} <br>
                            প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
                            মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
                            বিষয়ঃ <b> এনজিও নিবন্ধন </b><br>
                            সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
                            তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
                        </td>
                        <td style="text-align:right;">

                            @if($allStatusData->original_recipient == 1)


                            <button  type="button" class="btn-xs btn btn-primary"
                            data-toggle="tooltip" data-placement="top"
                            title="নথিতে উপস্থাপন করুন"
                            data-bs-toggle="modal"
                            data-original-title="" data-bs-target="#myModal{{ $allStatusData->id }}">
                        <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                    </button>

                    @include('admin.post.nothiModal')

                            <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'registration','id'=>$allStatusData->registration_status_id]) }}';">প্রেরণ</button>
                            <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('registrationView',$formOneDataId) }}';">দেখুন</button>

                            @else
                            <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('registrationView',$formOneDataId) }}';">দেখুন</button>
                            @endif


                                                                                     <!--new code-->
             <button type="button" class="btn btn-primary btn-xs"
             data-bs-toggle="modal"
             data-original-title="" data-bs-target="#myModalreg{{ $i }}">
             ডাক গতিবিধি
     </button>


     <!-- Modal -->
     <div class="modal right fade bd-example-modal-lg"
     id="myModalreg{{ $i }}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">
                    ডাক গতিবিধি</h4>
            </div>

            <div class="modal-body">

                    @if(!$dakDetail)

                    @else

                    <?php

$mainDetail = DB::table('ngo_registration_daks')
->where('registration_status_id',$allStatusData->registration_status_id)->orderBy('id','asc')->get();

                    ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php

$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

                <div class="d-flex mb-2">
                    <div class="flex-shrink-0 tracking_img">

                        @if($key == 0)

                        @if(empty($senderImage))

                        <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                        @else

                        <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                        @else

                        @if(empty($receiverImage))
                        <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                        @else


                        <img src="{{ asset('/') }}{{ $receiverImage }}" class="rounded-circle" alt="Sample Image">
@endif

                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <div class="card" style="border:2px solid #979797">
                            <div class="card-body">
                                <div class="tracking_box">
                                    <h5>বিষয়ঃ এনজিও নিবন্ধন</h5>
                                    @if(!$dakDetail->main_file)

                                    @else

                                    <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>

                                    @endif

                                    <hr>
                                    <ul>
                                        <li>প্রেরক : {{ $senderName }}</li>
                                        <li>প্রাপক : {{ $receiverName }}</li>
                                    </ul>
                                    <hr>
                                    <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime(\Carbon\Carbon::parse($dakDetail->created_at)->toDateString()))) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                @endif

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
             <!--end new code -->
                        </td>
                    </tr>
                    @endforeach

                    @foreach($ngoStatusRenew as $r=>$allStatusData)

                    <?php

//new code
$orginalReceverId= DB::table('ngo_renew_daks')
->where('renew_status_id',$allStatusData->renew_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('ngo_renews')->where('id',$allStatusData->renew_status_id)->value('fd_one_form_id');
$formOneData = DB::table('fd_one_forms')->where('id',$formOneDataId)->first();
$adminNamePrapok = DB::table('admins')->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');
$adminNamePrerok = DB::table('admins')->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');
$decesionName = DB::table('dak_details')->where('id',$allStatusData->dak_detail_id)->where('status','renew')->value('decision_list');
$dakDetail = DB::table('dak_details')->where('access_id',$allStatusData->renew_status_id)->orderBy('id','desc')->first();

                    ?>
                <tr>
                    <td style="text-align:left;">
                        উৎসঃ {{ $formOneData->organization_name_ban }} <br>
                        প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
                        মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
                        বিষয়ঃ <b> এনজিও নবায়ন</b><br>
                        সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
                        তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
                    </td>
                    <td style="text-align:right;">

                        @if($allStatusData->original_recipient == 1)

                        <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#remyModal{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button>

                @include('admin.post.renothiModal')

                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'renew','id'=>$allStatusData->renew_status_id]) }}';">প্রেরণ</button>
                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('renewView',$allStatusData->renew_status_id) }}';">দেখুন</button>
                        @else
                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('renewView',$allStatusData->renew_status_id) }}';">দেখুন</button>
                        @endif


                                        <!--new code-->
             <button type="button" class="btn btn-primary btn-xs"
             data-bs-toggle="modal"
             data-original-title="" data-bs-target="#myModalrenew{{ $r }}">
             ডাক গতিবিধি
     </button>


     <!-- Modal -->
     <div class="modal right fade bd-example-modal-lg"
     id="myModalrenew{{ $r }}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">
                    ডাক গতিবিধি</h4>
            </div>

            <div class="modal-body">

                    @if(!$dakDetail)

                    @else

                    <?php

$mainDetail = DB::table('ngo_renew_daks')
->where('renew_status_id',$allStatusData->renew_status_id)->orderBy('id','asc')->get();

                    ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php

$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

                <div class="d-flex mb-2">
                    <div class="flex-shrink-0 tracking_img">

                        @if($key == 0)

                        @if(empty($senderImage))

                        <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                        @else

                        <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                        @else

                        @if(empty($receiverImage))
                        <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                        @else

                        <img src="{{ asset('/') }}{{ $receiverImage }}" class="rounded-circle" alt="Sample Image">
@endif

                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <div class="card" style="border:2px solid #979797">
                            <div class="card-body">
                                <div class="tracking_box">
                                    <h5>বিষয়ঃ এনজিও নবায়ন</h5>
                                    @if(!$dakDetail->main_file)

                                    @else

                                    <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>

                                    @endif

                                    <hr>
                                    <ul>
                                        <li>প্রেরক : {{ $senderName }}</li>
                                        <li>প্রাপক : {{ $receiverName }}</li>
                                    </ul>
                                    <hr>
                                    <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime(\Carbon\Carbon::parse($dakDetail->created_at)->toDateString()))) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                @endif

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
             <!--end new code -->
                    </td>
                </tr>
                @endforeach


                @foreach($ngoStatusNameChange as $k=>$allStatusData)

                <?php

                                        //new code
$orginalReceverId= DB::table('ngo_name_change_daks')
->where('name_change_status_id',$allStatusData->name_change_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('ngo_name_changes')->where('id',$allStatusData->name_change_status_id)->value('fd_one_form_id');
$formOneData = DB::table('fd_one_forms')->where('id',$formOneDataId)->first();
$adminNamePrapok = DB::table('admins')->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');
$adminNamePrerok = DB::table('admins')->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');
$decesionName = DB::table('dak_details')->where('id',$allStatusData->dak_detail_id)->where('status','nameChange')->value('decision_list');
$dakDetail = DB::table('dak_details')->where('access_id',$allStatusData->name_change_status_id)->orderBy('id','desc')->first();
                ?>
            <tr>
                <td style="text-align:left;">
                    উৎসঃ {{ $formOneData->organization_name_ban }} <br>
                    প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
                    মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
                    বিষয়ঃ <b> এনজিও'র নাম পরিবর্তনের   </b><br>
                    সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
                    তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
                </td>
                <td style="text-align:right;">

                    @if($allStatusData->original_recipient == 1)

                    <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#nammyModal{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button>

                @include('admin.post.namnothiModal')

                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'nameChange','id'=>$allStatusData->name_change_status_id]) }}';">প্রেরণ</button>
                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('nameChangeView',$allStatusData->name_change_status_id) }}';">দেখুন</button>
                    @else
                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('nameChangeView',$allStatusData->name_change_status_id) }}';">দেখুন</button>
                    @endif


                              <!--new code-->
             <button type="button" class="btn btn-primary btn-xs"
             data-bs-toggle="modal"
             data-original-title="" data-bs-target="#myModalnameChange{{ $k }}">
             ডাক গতিবিধি
     </button>


     <!-- Modal -->
     <div class="modal right fade bd-example-modal-lg"
     id="myModalnameChange{{ $k }}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">
                    ডাক গতিবিধি</h4>
            </div>

            <div class="modal-body">

                    @if(!$dakDetail)

                    @else

                    <?php

$mainDetail = DB::table('ngo_name_change_daks')
->where('name_change_status_id',$allStatusData->name_change_status_id)
->where('receiver_admin_id',Auth::guard('admin')->user()->id)
->orwhere('sender_admin_id',Auth::guard('admin')->user()->id)
->orderBy('id','asc')->get();

                    ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php

$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

                <div class="d-flex mb-2">
                    <div class="flex-shrink-0 tracking_img">

                        @if($key == 0)

                        @if(empty($senderImage))

                        <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                        @else

                        <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                        @else

                        @if(empty($receiverImage))
                        <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                        @else

                        <img src="{{ asset('/') }}{{ $receiverImage }}" class="rounded-circle" alt="Sample Image">
@endif

                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <div class="card" style="border:2px solid #979797">
                            <div class="card-body">
                                <div class="tracking_box">
                                    <h5>বিষয়ঃ এনজিও'র নাম পরিবর্তনের    </h5>
                                    @if(!$dakDetail->main_file)

                                    @else

                                    <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>

                                    @endif

                                    <hr>
                                    <ul>
                                        <li>প্রেরক : {{ $senderName }}</li>
                                        <li>প্রাপক : {{ $receiverName }}</li>
                                    </ul>
                                    <hr>
                                    <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime(\Carbon\Carbon::parse($dakDetail->created_at)->toDateString()))) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                @endif

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
             <!--end new code -->
                </td>
            </tr>
            @endforeach


            @foreach($ngoStatusFDNineDak as $m=>$allStatusData)

            <?php

                                                                                    //new code
$orginalReceverId= DB::table('ngo_f_d_nine_daks')
->where('f_d_nine_status_id',$allStatusData->f_d_nine_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('fd9_forms')->where('id',$allStatusData->f_d_nine_status_id)->value('fd_one_form_id');
$formOneData = DB::table('fd_one_forms')->where('id',$formOneDataId)->first();
$adminNamePrapok = DB::table('admins')->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');
$adminNamePrerok = DB::table('admins')->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');
$decesionName = DB::table('dak_details')->where('id',$allStatusData->dak_detail_id)->where('status','fdNine')->value('decision_list');
$dakDetail = DB::table('dak_details')->where('access_id',$allStatusData->f_d_nine_status_id)->orderBy('id','desc')->first();

            ?>
        <tr>
            <td style="text-align:left;">
                উৎসঃ {{ $formOneData->organization_name_ban }} <br>
                প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
                মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
                বিষয়ঃ <b> এফডি৯ (এন-ভিসা)   </b><br>
                সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
                তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
            </td>
            <td style="text-align:right;">

                @if($allStatusData->original_recipient == 1)

                <button type="button" class="btn-xs btn btn-primary"
                data-toggle="tooltip" data-placement="top"
                title="নথিতে উপস্থাপন করুন"
                data-bs-toggle="modal"
                data-original-title="" data-bs-target="#fdninemyModal{{ $allStatusData->id }}">
            <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
        </button>

        @include('admin.post.fdninenothiModal')

                <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fdNine','id'=>$allStatusData->f_d_nine_status_id]) }}';">প্রেরণ</button>
                <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd9Form.show',$allStatusData->f_d_nine_status_id) }}';">দেখুন</button>
                @else
                <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd9Form.show',$allStatusData->f_d_nine_status_id) }}';">দেখুন</button>
                @endif


                     <!--new code-->
             <button type="button" class="btn btn-primary btn-xs"
             data-bs-toggle="modal"
             data-original-title="" data-bs-target="#myModalfd9{{ $m }}">
             ডাক গতিবিধি
     </button>


     <!-- Modal -->
     <div class="modal right fade bd-example-modal-lg"
     id="myModalfd9{{ $m }}" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">
                    ডাক গতিবিধি</h4>
            </div>

            <div class="modal-body">

                    @if(!$dakDetail)

                    @else

                    <?php

$mainDetail = DB::table('ngo_f_d_nine_daks')
->where('f_d_nine_status_id',$allStatusData->f_d_nine_status_id)
->where('receiver_admin_id',Auth::guard('admin')->user()->id)
->orwhere('sender_admin_id',Auth::guard('admin')->user()->id)->orderBy('id','asc')->get();

                    ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php

$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

                <div class="d-flex mb-2">
                    <div class="flex-shrink-0 tracking_img">

                        @if($key == 0)

                        @if(empty($senderImage))

                        <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                        @else

                        <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                        @else

                        @if(empty($receiverImage))
                        <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                        @else

                        <img src="{{ asset('/') }}{{ $receiverImage }}" class="rounded-circle" alt="Sample Image">
@endif

                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <div class="card" style="border:2px solid #979797">
                            <div class="card-body">
                                <div class="tracking_box">
                                    <h5>বিষয়ঃ এফডি৯ (এন-ভিসা)   </h5>
                                    @if(!$dakDetail->main_file)

                                    @else

                                    <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>

                                    @endif

                                    <hr>
                                    <ul>
                                        <li>প্রেরক : {{ $senderName }}</li>
                                        <li>প্রাপক : {{ $receiverName }}</li>
                                    </ul>
                                    <hr>
                                    <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime(\Carbon\Carbon::parse($dakDetail->created_at)->toDateString()))) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                @endif

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
             <!--end new code -->
            </td>
        </tr>
        @endforeach


        @foreach($ngoStatusFDNineOneDak as $f=>$allStatusData)

        <?php

                                                                                               //new code
$orginalReceverId= DB::table('ngo_f_d_nine_one_daks')
->where('f_d_nine_one_status_id',$allStatusData->f_d_nine_one_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('fd9_one_forms')->where('id',$allStatusData->f_d_nine_one_status_id)->value('fd_one_form_id');
$form9OneDataId = DB::table('fd9_one_forms')->join('n_visas', 'n_visas.fd9_one_form_id', '=', 'fd9_one_forms.id')
->where('n_visas.id',$allStatusData->f_d_nine_one_status_id)->value('n_visas.fd9_one_form_id');
$formOneData = DB::table('fd_one_forms')->where('id',$formOneDataId)->first();
$adminNamePrapok = DB::table('admins')->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');
$adminNamePrerok = DB::table('admins')->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');
$decesionName = DB::table('dak_details')->where('id',$allStatusData->dak_detail_id)->where('status','fdNineOne')->value('decision_list');
$dakDetail = DB::table('dak_details')->where('access_id',$allStatusData->f_d_nine_one_status_id)->orderBy('id','desc')->first();
        ?>
    <tr>
        <td style="text-align:left;">
            উৎসঃ {{ $formOneData->organization_name_ban }} <br>
            প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
            মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
            বিষয়ঃ <b> এফডি৯.১ (ওয়ার্ক পারমিট)     </b><br>
            সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
            তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
        </td>
        <td style="text-align:right;">

            @if($allStatusData->original_recipient == 1)

            <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#fdnineonemyModal{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button>

                @include('admin.post.fdnineonenothiModal')

            <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fdNineOne','id'=>$allStatusData->f_d_nine_one_status_id]) }}';">প্রেরণ</button>
            <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd9OneForm.show',$allStatusData->f_d_nine_one_status_id) }}';">দেখুন</button>
            @else
            <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd9OneForm.show',$allStatusData->f_d_nine_one_status_id) }}';">দেখুন</button>
            @endif


<!--new code-->
<button type="button" class="btn btn-primary btn-xs"
data-bs-toggle="modal"
data-original-title="" data-bs-target="#myModalfd9one{{ $f }}">
ডাক গতিবিধি
</button>


<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModalfd9one{{ $f }}" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myModalLabel2">
ডাক গতিবিধি</h4>
</div>

<div class="modal-body">

@if(!$dakDetail)

@else

<?php

$mainDetail = DB::table('ngo_f_d_nine_one_daks')
->where('f_d_nine_one_status_id',$allStatusData->f_d_nine_one_status_id)
->where('receiver_admin_id',Auth::guard('admin')->user()->id)
->orwhere('sender_admin_id',Auth::guard('admin')->user()->id)
->orderBy('id','asc')->get();

?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php

$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

<div class="d-flex mb-2">
<div class="flex-shrink-0 tracking_img">

@if($key == 0)

@if(empty($senderImage))

<img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
@else

<img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
@else

@if(empty($receiverImage))
<img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

@else

<img src="{{ asset('/') }}{{ $receiverImage }}" class="rounded-circle" alt="Sample Image">
@endif

@endif
</div>
<div class="flex-grow-1">
<div class="card" style="border:2px solid #979797">
  <div class="card-body">
      <div class="tracking_box">
          <h5>বিষয়ঃ এফডি৯.১ (ওয়ার্ক পারমিট)   </h5>
          @if(!$dakDetail->main_file)

          @else

          <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>

          @endif

          <hr>

          <ul>
              <li>প্রেরক : {{ $senderName }}</li>
              <li>প্রাপক : {{ $receiverName }}</li>
          </ul>
          <hr>
          <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime(\Carbon\Carbon::parse($dakDetail->created_at)->toDateString()))) }}</p>
      </div>
  </div>
</div>
</div>
</div>

@endforeach

@endif

</div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
<!--end new code -->
</td>
    </tr>
    @endforeach


    <!--fdsix code start--->

    @foreach($ngoStatusFdSixDak as $p=>$allStatusData)

    <?php
//new code
$orginalReceverId= DB::table('ngo_fd_six_daks')
->where('fd_six_status_id',$allStatusData->fd_six_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('fd6_forms')->where('id',$allStatusData->fd_six_status_id)->value('fd_one_form_id');
$formOneData = DB::table('fd_one_forms')->where('id',$formOneDataId)->first();
$adminNamePrapok = DB::table('admins')->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');
$adminNamePrerok = DB::table('admins')->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');
$decesionName = DB::table('dak_details')->where('id',$allStatusData->dak_detail_id)->where('status','fdSix')->value('decision_list');
$dakDetail = DB::table('dak_details')->where('access_id',$allStatusData->fd_six_status_id)->orderBy('id','desc')->first();
    ?>
<tr>
    <td style="text-align:left;">
        উৎসঃ {{ $formOneData->organization_name_ban }} <br>
        প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
        মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
        বিষয়ঃ <b> এফডি - ৬    </b><br>
        সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
        তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
    </td>
    <td style="text-align:right;">

        @if($allStatusData->original_recipient == 1)

        <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#fdsixmyModal{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button>

                @include('admin.post.fdsixnothiModal')

        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fdSix','id'=>$allStatusData->fd_six_status_id]) }}';">প্রেরণ</button>
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd6Form.show',$allStatusData->fd_six_status_id) }}';">দেখুন</button>
        @else
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd6Form.show',$allStatusData->fd_six_status_id) }}';">দেখুন</button>
        @endif


             <!--new code-->
     <button type="button" class="btn btn-primary btn-xs"
     data-bs-toggle="modal"
     data-original-title="" data-bs-target="#myModalfd6{{ $p }}">
     ডাক গতিবিধি
</button>


<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModalfd6{{ $p }}" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel2">
            ডাক গতিবিধি</h4>
    </div>

    <div class="modal-body">

            @if(!$dakDetail)

            @else

            <?php

$mainDetail = DB::table('ngo_fd_six_daks')
->where('fd_six_status_id',$allStatusData->fd_six_status_id)
->where('receiver_admin_id',Auth::guard('admin')->user()->id)
->orwhere('sender_admin_id',Auth::guard('admin')->user()->id)->orderBy('id','asc')->get();

            ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php

$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

        <div class="d-flex mb-2">
            <div class="flex-shrink-0 tracking_img">

                @if($key == 0)

                @if(empty($senderImage))

                <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                @else

                <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                @else

                @if(empty($receiverImage))
                <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                @else

                <img src="{{ asset('/') }}{{ $receiverImage }}" class="rounded-circle" alt="Sample Image">
@endif

                @endif
            </div>
            <div class="flex-grow-1">
                <div class="card" style="border:2px solid #979797">
                    <div class="card-body">
                        <div class="tracking_box">
                            <h5>বিষয়ঃ এফডি - ৬   </h5>
                            @if(!$dakDetail->main_file)

                            @else

                            <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>

                            @endif

                            <hr>
                            <ul>
                                <li>প্রেরক : {{ $senderName }}</li>
                                <li>প্রাপক : {{ $receiverName }}</li>
                            </ul>
                            <hr>
                            <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime(\Carbon\Carbon::parse($dakDetail->created_at)->toDateString()))) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        @endif



    </div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
     <!--end new code -->
    </td>
</tr>
@endforeach

    <!--fdsix code end ---->

    <!--fdseven code start ---->


    @foreach($ngoStatusFdSevenDak as $p=>$allStatusData)

    <?php


                                                                               //new code
$orginalReceverId= DB::table('ngo_fd_seven_daks')
->where('fd_seven_status_id',$allStatusData->fd_seven_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('fd7_forms')->where('id',$allStatusData->fd_seven_status_id)->value('fd_one_form_id');
$formOneData = DB::table('fd_one_forms')->where('id',$formOneDataId)->first();
$adminNamePrapok = DB::table('admins')->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');
$adminNamePrerok = DB::table('admins')->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');
$decesionName = DB::table('dak_details')->where('id',$allStatusData->dak_detail_id)->where('status','fdSeven')->value('decision_list');
$dakDetail = DB::table('dak_details')->where('access_id',$allStatusData->fd_seven_status_id)->orderBy('id','desc')->first();
    ?>
<tr>
    <td style="text-align:left;">
        উৎসঃ {{ $formOneData->organization_name_ban }} <br>
        প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
        মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
        বিষয়ঃ <b> এফডি - ৭     </b><br>
        সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
        তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
    </td>
    <td style="text-align:right;">

        @if($allStatusData->original_recipient == 1)

        <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#fdsevenmyModal{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button>

                @include('admin.post.fdsevennothiModal')

        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fdSeven','id'=>$allStatusData->fd_seven_status_id]) }}';">প্রেরণ</button>
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd7Form.show',$allStatusData->fd_seven_status_id) }}';">দেখুন</button>
        @else
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd7Form.show',$allStatusData->fd_seven_status_id) }}';">দেখুন</button>
        @endif


             <!--new code-->
     <button type="button" class="btn btn-primary btn-xs"
     data-bs-toggle="modal"
     data-original-title="" data-bs-target="#myModalfd7{{ $p }}">
     ডাক গতিবিধি
</button>


<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModalfd7{{ $p }}" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel2">
            ডাক গতিবিধি</h4>
    </div>

    <div class="modal-body">

            @if(!$dakDetail)

            @else

            <?php

$mainDetail = DB::table('ngo_fd_seven_daks')
->where('fd_seven_status_id',$allStatusData->fd_seven_status_id)
->where('receiver_admin_id',Auth::guard('admin')->user()->id)
->orwhere('sender_admin_id',Auth::guard('admin')->user()->id)->orderBy('id','asc')->get();

            ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php

$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

        <div class="d-flex mb-2">
            <div class="flex-shrink-0 tracking_img">

                @if($key == 0)

                @if(empty($senderImage))

                <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                @else

                <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                @else

                @if(empty($receiverImage))
                <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                @else

                <img src="{{ asset('/') }}{{ $receiverImage }}" class="rounded-circle" alt="Sample Image">
@endif

                @endif
            </div>
            <div class="flex-grow-1">
                <div class="card" style="border:2px solid #979797">
                    <div class="card-body">
                        <div class="tracking_box">
                            <h5>বিষয়ঃ এফডি - ৭    </h5>
                            @if(!$dakDetail->main_file)

                            @else

                            <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>

                            @endif

                            <hr>
                            <ul>
                                <li>প্রেরক : {{ $senderName }}</li>
                                <li>প্রাপক : {{ $receiverName }}</li>
                            </ul>
                            <hr>
                            <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime(\Carbon\Carbon::parse($dakDetail->created_at)->toDateString()))) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        @endif

    </div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
     <!--end new code -->
    </td>
</tr>
@endforeach

    <!--fdseven code end ---->

    <!-- fc one code start -->

    @foreach($ngoStatusFcOneDak as $p=>$allStatusData)

    <?php

$orginalReceverId= DB::table('fc_one_daks')
->where('fc_one_status_id',$allStatusData->fc_one_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('fc1_forms')->where('id',$allStatusData->fc_one_status_id)->value('fd_one_form_id');
$formOneData = DB::table('fd_one_forms')->where('id',$formOneDataId)->first();
$adminNamePrapok = DB::table('admins')->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');
$adminNamePrerok = DB::table('admins')->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');
$decesionName = DB::table('dak_details')->where('id',$allStatusData->dak_detail_id)->where('status','fcOne')->value('decision_list');
$dakDetail = DB::table('dak_details')->where('access_id',$allStatusData->fc_one_status_id)->orderBy('id','desc')->first();
    ?>
<tr>
    <td style="text-align:left;">
        উৎসঃ {{ $formOneData->organization_name_ban }} <br>
        প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
        মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
        বিষয়ঃ <b> এফসি-১   </b><br>
        সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
        তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
    </td>
    <td style="text-align:right;">

        @if($allStatusData->original_recipient == 1)

        <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#fconemyModal{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button>

                @include('admin.post.fconenothiModal')

        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fcOne','id'=>$allStatusData->fc_one_status_id]) }}';">প্রেরণ</button>
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fc1Form.show',$allStatusData->fc_one_status_id) }}';">দেখুন</button>
        @else
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fc1Form.show',$allStatusData->fc_one_status_id) }}';">দেখুন</button>
        @endif


             <!--new code-->
     <button type="button" class="btn btn-primary btn-xs"
     data-bs-toggle="modal"
     data-original-title="" data-bs-target="#myModalfc1{{ $p }}">
     ডাক গতিবিধি
</button>


<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModalfc1{{ $p }}" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel2">
            ডাক গতিবিধি</h4>
    </div>

    <div class="modal-body">

            @if(!$dakDetail)

            @else

            <?php

$mainDetail = DB::table('fc_one_daks')
->where('fc_one_status_id',$allStatusData->fc_one_status_id)
->where('receiver_admin_id',Auth::guard('admin')->user()->id)
->orwhere('sender_admin_id',Auth::guard('admin')->user()->id)->orderBy('id','asc')->get();

            ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php

$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

        <div class="d-flex mb-2">
            <div class="flex-shrink-0 tracking_img">

                @if($key == 0)

                @if(empty($senderImage))

                <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                @else

                <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                @else

                @if(empty($receiverImage))
                <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                @else

                <img src="{{ asset('/') }}{{ $receiverImage }}" class="rounded-circle" alt="Sample Image">
@endif

                @endif
            </div>
            <div class="flex-grow-1">
                <div class="card" style="border:2px solid #979797">
                    <div class="card-body">
                        <div class="tracking_box">
                            <h5>বিষয়ঃ এফসি-১  </h5>
                            @if(!$dakDetail->main_file)

                            @else

                            <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>

                            @endif

                            <hr>
                            <ul>
                                <li>প্রেরক : {{ $senderName }}</li>
                                <li>প্রাপক : {{ $receiverName }}</li>
                            </ul>
                            <hr>
                            <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime(\Carbon\Carbon::parse($dakDetail->created_at)->toDateString()))) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        @endif

    </div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
     <!--end new code -->
    </td>
</tr>
@endforeach

    <!--fc one code end-->


    <!-- fc two code start -->


    @foreach($ngoStatusFcTwoDak as $p=>$allStatusData)

    <?php

                                                                     //new code
$orginalReceverId= DB::table('fc_two_daks')
->where('fc_two_status_id',$allStatusData->fc_two_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('fc2_forms')->where('id',$allStatusData->fc_two_status_id)->value('fd_one_form_id');
$formOneData = DB::table('fd_one_forms')->where('id',$formOneDataId)->first();
$adminNamePrapok = DB::table('admins')->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');
$adminNamePrerok = DB::table('admins')->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');
$decesionName = DB::table('dak_details')->where('id',$allStatusData->dak_detail_id)->where('status','fcTwo')->value('decision_list');
$dakDetail = DB::table('dak_details')->where('access_id',$allStatusData->fc_two_status_id)->orderBy('id','desc')->first();
    ?>
<tr>
    <td style="text-align:left;">
        উৎসঃ {{ $formOneData->organization_name_ban }} <br>
        প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
        মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
        বিষয়ঃ <b> এফসি-২   </b><br>
        সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
        তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
    </td>
    <td style="text-align:right;">

        @if($allStatusData->original_recipient == 1)

        <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#fctwomyModal{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button>

                @include('admin.post.fctwonothiModal')

        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fcTwo','id'=>$allStatusData->fc_two_status_id]) }}';">প্রেরণ</button>
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fc2Form.show',$allStatusData->fc_two_status_id) }}';">দেখুন</button>
        @else
        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fc2Form.show',$allStatusData->fc_two_status_id) }}';">দেখুন</button>
        @endif


             <!--new code-->
     <button type="button" class="btn btn-primary btn-xs"
     data-bs-toggle="modal"
     data-original-title="" data-bs-target="#myModalfc2{{ $p }}">
     ডাক গতিবিধি
</button>


<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModalfc2{{ $p }}" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel2">
            ডাক গতিবিধি</h4>
    </div>

    <div class="modal-body">

            @if(!$dakDetail)

            @else

            <?php

$mainDetail = DB::table('fc_two_daks')
->where('fc_two_status_id',$allStatusData->fc_two_status_id)
->where('receiver_admin_id',Auth::guard('admin')->user()->id)
->orwhere('sender_admin_id',Auth::guard('admin')->user()->id)->orderBy('id','asc')->get();

            ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php



$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

        <div class="d-flex mb-2">
            <div class="flex-shrink-0 tracking_img">

                @if($key == 0)

                @if(empty($senderImage))

                <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                @else

                <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                @else

                @if(empty($receiverImage))
                <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                @else

                <img src="{{ asset('/') }}{{ $receiverImage }}" class="rounded-circle" alt="Sample Image">
@endif

                @endif
            </div>
            <div class="flex-grow-1">
                <div class="card" style="border:2px solid #979797">
                    <div class="card-body">
                        <div class="tracking_box">
                            <h5>বিষয়ঃ এফসি-২  </h5>
                            @if(!$dakDetail->main_file)

                            @else

                            <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>

                            @endif

                            <hr>
                            <ul>
                                <li>প্রেরক : {{ $senderName }}</li>
                                <li>প্রাপক : {{ $receiverName }}</li>
                            </ul>
                            <hr>
                            <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime(\Carbon\Carbon::parse($dakDetail->created_at)->toDateString()))) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        @endif

    </div><!-- modal-content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
     <!--end new code -->
    </td>
</tr>
@endforeach

    <!--fc two code end-->

     <!-- fd three form start -->


     @foreach($ngoStatusFdThreeDak as $p=>$allStatusData)

     <?php

                                                                                                   //new code
$orginalReceverId= DB::table('fd_three_daks')
->where('fd_three_status_id',$allStatusData->fd_three_status_id)
->where('original_recipient',1)
->value('receiver_admin_id');

$orginalReceverName= DB::table('admins')
->where('id',$orginalReceverId)
->value('admin_name_ban');

//end new code

$formOneDataId = DB::table('fd3_forms')->where('id',$allStatusData->fd_three_status_id)->value('fd_one_form_id');
$formOneData = DB::table('fd_one_forms')->where('id',$formOneDataId)->first();
$adminNamePrapok = DB::table('admins')->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');
$adminNamePrerok = DB::table('admins')->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');
$decesionName = DB::table('dak_details')->where('id',$allStatusData->dak_detail_id)->where('status','fdThree')->value('decision_list');
$dakDetail = DB::table('dak_details')->where('access_id',$allStatusData->fd_three_status_id)->orderBy('id','desc')->first();
     ?>
 <tr>
     <td style="text-align:left;">
         উৎসঃ {{ $formOneData->organization_name_ban }} <br>
         প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
         মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
         বিষয়ঃ <b> এফডি - ৩                                       {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b> <br>
         সিধান্তঃ <span style="color:blue;">{{ $decesionName }}। </span>
     </td>
     <td style="text-align:right;">

         @if($allStatusData->original_recipient == 1)

         <button type="button" class="btn-xs btn btn-primary"
                        data-toggle="tooltip" data-placement="top"
                        title="নথিতে উপস্থাপন করুন"
                        data-bs-toggle="modal"
                        data-original-title="" data-bs-target="#fdthreemyModal{{ $allStatusData->id }}">
                    <i class="fa fa-reply"></i> নথিতে উপস্থাপন করুন
                </button>

                @include('admin.post.fdthreenothiModal')

         <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fdThree','id'=>$allStatusData->fd_three_status_id]) }}';">প্রেরণ</button>
         <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd3Form.show',$allStatusData->fd_three_status_id) }}';">দেখুন</button>
         @else
         <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd3Form.show',$allStatusData->fd_three_status_id) }}';">দেখুন</button>
         @endif


              <!--new code-->
      <button type="button" class="btn btn-primary btn-xs"
      data-bs-toggle="modal"
      data-original-title="" data-bs-target="#myModalfd3{{ $p }}">
      ডাক গতিবিধি
</button>


<!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
id="myModalfd3{{ $p }}" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel2">
<div class="modal-dialog modal-lg" role="document">
 <div class="modal-content">
     <div class="modal-header">
         <h4 class="modal-title" id="myModalLabel2">
             ডাক গতিবিধি</h4>
     </div>

     <div class="modal-body">

             @if(!$dakDetail)

             @else

             <?php

$mainDetail = DB::table('fd_three_daks')
->where('fd_three_status_id',$allStatusData->fd_three_status_id)
->where('receiver_admin_id',Auth::guard('admin')->user()->id)
->orwhere('sender_admin_id',Auth::guard('admin')->user()->id)->orderBy('id','asc')->get();

             ?>

@foreach($mainDetail as  $key=>$allMainDetail)


<?php



$senderName = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$senderImage = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchId = DB::table('admins')
->where('id',$allMainDetail->sender_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiName = DB::table('designation_lists')
->where('id',$desiId)->value('designation_name');


$branchName = DB::table('branches')
->where('id',$branchId)->value('branch_name');


//receiver

$receiverName = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_name_ban');


$receiverImage = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('admin_image');


$desiIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('designation_list_id');


$branchIds = DB::table('admins')
->where('id',$allMainDetail->receiver_admin_id)
->orderBy('id','desc')->value('branch_id');


$desiNames = DB::table('designation_lists')
->where('id',$desiIds)->value('designation_name');


$branchNames = DB::table('branches')
->where('id',$branchIds)->value('branch_name');



?>

         <div class="d-flex mb-2">
             <div class="flex-shrink-0 tracking_img">

                 @if($key == 0)

                 @if(empty($senderImage))

                 <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">
                 @else

                 <img src="{{ asset('/') }}{{ $senderImage }}" class="rounded-circle" alt="Sample Image">
@endif
                 @else

                 @if(empty($receiverImage))
                 <img src="{{ asset('/') }}public/admin/user.png" class="rounded-circle" alt="Sample Image">

                 @else

                 <img src="{{ asset('/') }}{{ $receiverImage }}" class="rounded-circle" alt="Sample Image">
@endif

                 @endif
             </div>
             <div class="flex-grow-1">
                 <div class="card" style="border:2px solid #979797">
                     <div class="card-body">
                         <div class="tracking_box">
                             <h5>বিষয়ঃ এফডি - ৩  </h5>
                             @if(!$dakDetail->main_file)

                             @else

                             <a target="_blank" href="{{ route('main_doc_download',['id'=>$dakDetail->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>

                             @endif

                             <hr>
                             <ul>
                                 <li>প্রেরক : {{ $senderName }}</li>
                                 <li>প্রাপক : {{ $receiverName }}</li>
                             </ul>
                             <hr>
                             <p>তারিখ : {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime(\Carbon\Carbon::parse($dakDetail->created_at)->toDateString()))) }}</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         @endforeach

         @endif

        </div><!-- modal-content -->
 </div><!-- modal-dialog -->
</div><!-- modal -->
      <!--end new code -->
     </td>
 </tr>
 @endforeach

      <!-- fd three form end -->

                    </tbody>
                </table>
            </div>

</div>
