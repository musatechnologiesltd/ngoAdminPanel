@extends('admin.master.master')

@section('title')
FD-9 (N-Visa) | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Foreign National Employment Letter Attestation Form</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">FD-09</li>
                    <li class="breadcrumb-item">FD-09 List</li>
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
                                <th>NGOID</th>
                                <th>NGO Name & Address</th>
                                <th>Foreigner Name</th>
                                <th>Status</th>
                                <th>Submit date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($dataFromNVisaFd9Fd1 as $allDataFromNVisaFd9Fd1)
                            <tr>
                                <td>#{{ $allDataFromNVisaFd9Fd1->registration_number }}</td>
                                <td><h6> {{ $allDataFromNVisaFd9Fd1->organization_name_ban }} </h6><span>Address: {{ $allDataFromNVisaFd9Fd1->organization_address }}</span></td>
                                <td>{{ $allDataFromNVisaFd9Fd1->fd9_foreigner_name }} </td>
                                <td class="font-success">
@if(empty($allDataFromNVisaFd9Fd1->status))
                                    Ongoing
                                    @else
Confirmed
                                    @endif

                                </td>
                                <td>{{ $allDataFromNVisaFd9Fd1->created_at }}</td>
                                <td>
                                    <button class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="" onclick="location.href = '{{ route('fd9Form.show',$allDataFromNVisaFd9Fd1->id) }}';">View</button>
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
