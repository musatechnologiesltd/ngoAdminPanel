@extends('admin.master.master')

@section('title')
ওয়ার্কিং পারমিটের তালিকা | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>ওয়ার্কিং পারমিটের তালিকা</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">এফডি৯.১ (ওয়ার্ক পারমিট)</li>
                    <li class="breadcrumb-item">এফডি৯.১ (ওয়ার্ক পারমিট) তালিকা</li>
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
                <div class="card-header pb-0">

                </div>
                <div class="card-body">
                    <div class="table-responsive product-table">
                        <table class="display" id="basic-1">
                            <thead>
                            <tr>
                                <th>এনজিও নিবন্ধন নম্বর</th>
                                <th>এনজিওর নাম & ঠিকানা</th>
                                <th>বিদেশীর নাম</th>
                                <th>স্টেটাস</th>
                                <th>জমাদানের তারিখ</th>
                                <th>কার্যকলাপ</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($dataFromNVisaFd9Fd1 as $allDataFromNVisaFd9Fd1)
                            <tr>
                                <td>#{{ App\Http\Controllers\Admin\CommonController::englishToBangla($allDataFromNVisaFd9Fd1->registration_number) }}</td>
                                <td><h6> {{ $allDataFromNVisaFd9Fd1->organization_name_ban }} </h6><span>Address: {{ $allDataFromNVisaFd9Fd1->organization_address }}</span></td>
                                <td>{{ $allDataFromNVisaFd9Fd1->foreigner_name_for_subject }} </td>
                                <td class="font-success">
@if(empty($allDataFromNVisaFd9Fd1->status))
চলমান
                                    @else
Confirmed
                                    @endif

                                </td>
                                <td>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($allDataFromNVisaFd9Fd1->created_at) }}</td>
                                <td>
                                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd9OneForm.show',$allDataFromNVisaFd9Fd1->id) }}';">বিস্তারিত দেখুন</button>
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
