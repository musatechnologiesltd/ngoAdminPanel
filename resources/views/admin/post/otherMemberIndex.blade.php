@extends('admin.master.master')

@section('title')
ডাক তালিকা | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>ডাক তালিকা</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">ডাক </li>
                    <li class="breadcrumb-item">ডাক তালিকা</li>
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
                    <ul class="nav nav-dark" id="pills-darktab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="pills-darkhome-tab" data-bs-toggle="pill" href="#pills-darkhome" role="tab" aria-controls="pills-darkhome" aria-selected="true"><i class="icofont icofont-ui-home"></i>ডাক</a></li>
                    </ul>
                    <div class="tab-content" id="pills-darktabContent">
                        <div class="tab-pane fade show active" id="pills-darkhome" role="tabpanel" aria-labelledby="pills-darkhome-tab">
                            <div class="table-responsive product-table mb-0 m-t-30">
                                <table class="display" id="basic-1">
                                    <tbody>

                                        @foreach($ngoStatusReg as $allStatusData)

                                        <?php

$formOneDataId = DB::table('ngo_statuses')->where('id',$allStatusData->registration_status_id)
                                            ->value('fd_one_form_id');

                                     $form_one_data = DB::table('fd_one_forms')
                                     ->where('id',$formOneDataId)->first();


                                     $adminNamePrapok = DB::table('admins')
                                            ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

                                            $adminNamePrerok = DB::table('admins')
                                            ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


                        $decesionName = DB::table('dak_details')
                        ->where('id',$allStatusData->dak_detail_id)->value('decision_list');
                                        ?>
                                    <tr>
                                        <td style="text-align:left;">
                                            উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
                                            প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
                                            প্রাপকঃ {{ $adminNamePrapok}}</span>  <br>
                                            বিষয়ঃ <b> এনজিও নিবন্ধনের নোটিশ                                     {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b> <br>
                                            সিধান্তঃ <span style="color:blue;">{{ $decesionName }}। </span>
                                        </td>
                                        <td style="text-align:right;">

                                            @if($allStatusData->original_recipient == 1)
                                            <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'registration','id'=>$allStatusData->registration_status_id]) }}';">View</button>

                                            @else

                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                    @foreach($ngoStatusRenew as $allStatusData)

                                    <?php

$formOneDataId = DB::table('ngo_renews')->where('id',$allStatusData->renew_status_id)
                                        ->value('fd_one_form_id');

                                 $form_one_data = DB::table('fd_one_forms')
                                 ->where('id',$formOneDataId)->first();


                                 $adminNamePrapok = DB::table('admins')
                                        ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

                                        $adminNamePrerok = DB::table('admins')
                                        ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


                    $decesionName = DB::table('dak_details')
                    ->where('id',$allStatusData->dak_detail_id)->value('decision_list');
                                    ?>
                                <tr>
                                    <td style="text-align:left;">
                                        উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
                                        প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
                                        প্রাপকঃ {{ $adminNamePrapok}}</span>  <br>
                                        বিষয়ঃ <b> এনজিও নিবন্ধন নবায়নের নোটিশ                                     {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b> <br>
                                        সিধান্তঃ <span style="color:blue;">{{ $decesionName }}। </span>
                                    </td>
                                    <td style="text-align:right;">

                                        @if($allStatusData->original_recipient == 1)
                                        <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'renew','id'=>$allStatusData->renew_status_id]) }}';">View</button>

                                        @else

                                        @endif
                                    </td>
                                </tr>
                                @endforeach


                                @foreach($ngoStatusNameChange as $allStatusData)

                                <?php

$formOneDataId = DB::table('ngo_name_changes')->where('id',$allStatusData->name_change_status_id)
                                    ->value('fd_one_form_id');

                             $form_one_data = DB::table('fd_one_forms')
                             ->where('id',$formOneDataId)->first();


                             $adminNamePrapok = DB::table('admins')
                                    ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

                                    $adminNamePrerok = DB::table('admins')
                                    ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


                $decesionName = DB::table('dak_details')
                ->where('id',$allStatusData->dak_detail_id)->value('decision_list');
                                ?>
                            <tr>
                                <td style="text-align:left;">
                                    উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
                                    প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
                                    প্রাপকঃ {{ $adminNamePrapok}}</span>  <br>
                                    বিষয়ঃ <b> এনজিও'র নাম পরিবর্তনের নোটিশ                                    {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b> <br>
                                    সিধান্তঃ <span style="color:blue;">{{ $decesionName }}। </span>
                                </td>
                                <td style="text-align:right;">

                                    @if($allStatusData->original_recipient == 1)
                                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'nameChange','id'=>$allStatusData->name_change_status_id]) }}';">View</button>

                                    @else

                                    @endif
                                </td>
                            </tr>
                            @endforeach


                            @foreach($ngoStatusFDNineDak as $allStatusData)

                            <?php

$formOneDataId = DB::table('fd9_forms')->join('n_visas', 'n_visas.id', '=', 'fd9_forms.n_visa_id')
            ->join('fd_one_forms', 'fd_one_forms.id', '=', 'n_visas.fd_one_form_id')
            ->select('fd_one_forms.*','fd9_forms.*','fd9_forms.status as mainStatus','n_visas.*','n_visas.id as nVisaId')
            ->where('fd9_forms.id',$allStatusData->f_d_nine_status_id)->value('n_visas.fd_one_form_id');

                         $form_one_data = DB::table('fd_one_forms')
                         ->where('id',$formOneDataId)->first();


                         $adminNamePrapok = DB::table('admins')
                                ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

                                $adminNamePrerok = DB::table('admins')
                                ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


            $decesionName = DB::table('dak_details')
            ->where('id',$allStatusData->dak_detail_id)->value('decision_list');
                            ?>
                        <tr>
                            <td style="text-align:left;">
                                উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
                                প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
                                প্রাপকঃ {{ $adminNamePrapok}}</span>  <br>
                                বিষয়ঃ <b> এফডি৯ (এন-ভিসা) নোটিশ                                     {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b> <br>
                                সিধান্তঃ <span style="color:blue;">{{ $decesionName }}। </span>
                            </td>
                            <td style="text-align:right;">

                                @if($allStatusData->original_recipient == 1)
                                <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fdNine','id'=>$allStatusData->f_d_nine_status_id]) }}';">View</button>

                                @else

                                @endif
                            </td>
                        </tr>
                        @endforeach


                        @foreach($ngoStatusFDNineOneDak as $allStatusData)

                        <?php

$formOneDataId = DB::table('fd9_one_forms')->where('id',$allStatusData->f_d_nine_one_status_id)
                            ->value('fd_one_form_id');

                     $form_one_data = DB::table('fd_one_forms')
                     ->where('id',$formOneDataId)->first();


                     $adminNamePrapok = DB::table('admins')
                            ->where('id',$allStatusData->receiver_admin_id)->value('admin_name_ban');

                            $adminNamePrerok = DB::table('admins')
                            ->where('id',$allStatusData->sender_admin_id)->value('admin_name_ban');


        $decesionName = DB::table('dak_details')
        ->where('id',$allStatusData->dak_detail_id)->value('decision_list');
                        ?>
                    <tr>
                        <td style="text-align:left;">
                            উৎসঃ {{ $form_one_data->organization_name_ban }} <br>
                            প্রেরকঃ {{ $adminNamePrerok }}<span class="p-4"><i class="fa fa-user"></i>
                            প্রাপকঃ {{ $adminNamePrapok}}</span>  <br>
                            বিষয়ঃ <b> এফডি৯.১ (ওয়ার্ক পারমিট) নোটিশ                                     {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allStatusData->created_at))) }} </b> <br>
                            সিধান্তঃ <span style="color:blue;">{{ $decesionName }}। </span>
                        </td>
                        <td style="text-align:right;">

                            @if($allStatusData->original_recipient == 1)
                            <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('showDataAll',['status'=>'fdNineOne','id'=>$allStatusData->f_d_nine_one_status_id]) }}';">View</button>

                            @else

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
        <!-- Individual column searching (text inputs) Ends-->
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection


@section('script')

@endsection
