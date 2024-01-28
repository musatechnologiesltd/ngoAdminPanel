@extends('admin.master.master')

@section('title')
নতুন নবায়ন অনুরোধের তালিকা  | {{ $insName }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>নতুন নবায়ন অনুরোধের  তালিকা </h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">এনজিও নবায়ন</li>
                    <li class="breadcrumb-item">নতুন নবায়ন অনুরোধের তালিকা</li>
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
                                <th>নিবন্ধন নম্বর</th>
                                <th>এনজিওর নাম ও ঠিকানা</th>
                                <th>পেমেন্ট</th>
                                <th>স্ট্যাটাস</th>
                                <th>জমাদানের তারিখ</th>
                                <th>কার্যকলাপ</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($allDataForNewLisas $allDataForNewListAll)

                                <?php

$fdOneFormId = DB::table('fd_one_forms')->where('id',$allDataForNewListAll->fd_one_form_id)->value('user_id');
$regNumber = DB::table('fd_one_forms')->where('id',$allDataForNewListAll->fd_one_form_id)->first();
$getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',$regNumber->user_id)->value('ngo_type');
$getngoForLanguageNewO = DB::table('ngo_type_and_languages')->where('user_id',$fdOneFormId)->value('registration');
$ngoOldNew = DB::table('ngo_type_and_languages')->where('user_id',$fdOneFormId)->value('ngo_type_new_old');

        if($getngoForLanguage =='দেশিও'){

                $regName = $regNumber->organization_name_ban;

        }else{
                $regName = $regNumber->organization_name;

        }
$regAddress =$regNumber->organization_address;

                                ?>
                            <tr>
                                <td>

                                    @if($ngoOldNew == 'Old')
                                    #{{ App\Http\Controllers\Admin\CommonController::englishToBangla($getngoForLanguageNewO) }}
                                    @else

                                    #{{ App\Http\Controllers\Admin\CommonController::englishToBangla($regNumber->registration_number) }}
@endif

                                </td>
                                <td><h6> এনজিওর নাম: {{ $regName  }}</h6><span>ঠিকানা: {{ $regAddress }}</td>
                                <td>হ্যাঁ</td>
                                <td class="font-success">

                                    @if($allDataForNewListAll->status == 'Accepted')

                                    <button class="btn btn-secondary btn-xs" type="button">
                                        গৃহীত

                                    </button>
                                    @elseif($allDataForNewListAll->status == 'Ongoing')

                                    <button class="btn btn-secondary btn-xs" type="button">
                                        চলমান

                                    </button>
                                    @else
                                    <button class="btn btn-secondary btn-xs" type="button">
                                        প্রত্যাখ্যান

                                    </button>
                                    @endif
                                </td>
                                <td>{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($allDataForNewListAll->created_at))) }}</td>
                                <td>

                                    @if (Auth::guard('admin')->user()->can('register_list_view'))
                                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('renewView',$allDataForNewListAll->id) }}';">বিস্তারিত দেখুন</button>
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
