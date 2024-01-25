
@foreach($dataFromFd3Form as $ps=>$allStatusData)

                    <?php


    $checkDataAvailableOrNot = DB::table('fd_three_daks')->where('fd_three_status_id',$allStatusData->id)
                    ->where('sender_admin_id',Auth::guard('admin')->user()->id)
                    ->where('status',1)->value('id');

                    //new code
    $orginalReceverId= DB::table('fd_three_daks')->where('fd_three_status_id',$allStatusData->id)->where('original_recipient',1)->value('receiver_admin_id');
    $orginalReceverName= DB::table('admins')->where('id',$orginalReceverId)->value('admin_name_ban');
    $formOneData = DB::table('fd_one_forms')->where('id',$allStatusData->fd_one_form_id)->first();
    $decesionNameId = DB::table('fd_three_daks')->where('fd_three_status_id',$allStatusData->id)->value('dak_detail_id');
    $decesionName = DB::table('dak_details')->where('id',$decesionNameId)->where('status','fdThree')->value('decision_list');
    $dakDetail = DB::table('dak_details')->where('access_id',$allStatusData->mainId)->orderBy('id','desc')->first();
                    ?>

                     @if(!empty($checkDataAvailableOrNot))

                     @include('admin.post.receivedFdThreeDak')

                                    @else
                <tr>
                    <td style="text-align:left;">
                        উৎসঃ {{ $formOneData->organization_name_ban }} <br>
                        প্রেরকঃ {{ $formOneData->organization_name_ban }}<span class="p-4"><i class="fa fa-user"></i>
                        মূল-প্রাপক : {{ $orginalReceverName }}</span>  <br>
                        বিষয়ঃ <b> এফডি - ৩    </b><br>
                        @if(empty($decesionName))

                        @else
                        সিদ্ধান্ত: <span style="color:blue;">{{ $decesionName }}। </span><br>
                        @endif
                        তারিখ:<b>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b>
                    </td>
                    <td style="text-align:right;">
                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fdThree','id'=>$allStatusData->mainId]) }}';">প্রেরণ</button>
                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd3Form.show',$allStatusData->mainId) }}';">দেখুন</button>


                         <!--new code-->
                     <button type="button" class="btn btn-primary btn-xs"
                     data-bs-toggle="modal"
                     data-original-title="" data-bs-target="#myModalfd3{{ $ps }}">
                     ডাক গতিবিধি
             </button>


             <!-- Modal -->
             <div class="modal right fade bd-example-modal-lg"
             id="myModalfd3{{ $ps }}" tabindex="-1" role="dialog"
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
->where('fd_three_status_id',$allStatusData->mainId)->orderBy('id','asc')->get();

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
                                            <h5>বিষয়ঃ এফডি - ৩   </h5>
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
                @endif
                @endforeach


                    <!-- fd three form end -->
