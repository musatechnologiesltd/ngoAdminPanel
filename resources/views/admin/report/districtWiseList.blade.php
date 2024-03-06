@extends('admin.master.master')

@section('title')
জেলাভিত্তিক এনজিও তালিকা | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>জেলাভিত্তিক এনজিও তালিকা</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">রিপোর্ট</li>
                    <li class="breadcrumb-item">জেলাভিত্তিক এনজিও তালিকা</li>
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
                    <div class="mb-3">
                        <label class="form-label" for="">জেলার নাম</label>
                        <select class="form-control" required name="district_id" id="district_id" type="text" placeholder="">
                            <option value="">--অনুগ্রহ করে নির্বাচন করুন--</option>
                            <option value="all">সকল জেলা</option>
                            @foreach($allDistrictList as $AllBranchLists)
                            <option value="{{ $AllBranchLists->id }}" >{{ $AllBranchLists->bn_name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('branch_id'))
                        <span class="text-danger">{{ $errors->first('branch_id') }}</span>
                    @endif
                    </div>

                </div>
            </div>
        </div>

        <div class="col-sm-12"  >
            <div class="card">

                <div class="card-body">


                    <div class="table-responsive product-table" >

                        <table class="display" id="basic-1">
                            <thead>
                            <tr>

                                <th>নিবন্ধন নম্বর</th>
                                <th>এনজিওর নাম ও ঠিকানা</th>
                                <th>এনজিও'র ধরন</th>
                                <th>মোবাইল নম্বর</th>
                                <th>পেমেন্ট</th>
                                <th>স্ট্যাটাস</th>



                            </tr>
                            </thead>
                            <tbody id="searchTable">


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
<script>
    $("#district_id").change(function(){


var district_id = $(this).val();


//alert(dakId+nothiId+status);


$.ajax({
    url: "{{ route('districtWiseListSearch') }}",
    method: 'GET',
    data: {district_id:district_id},
    success: function(data) {

         $("#searchTable").html(data);
    }
    });


});
</script>
@endsection
