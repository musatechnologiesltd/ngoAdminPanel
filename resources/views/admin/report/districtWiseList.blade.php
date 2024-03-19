@extends('admin.master.master')

@section('title')
জেলাভিত্তিক এনজিও'র তালিকা | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>জেলাভিত্তিক এনজিও'র তালিকা</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">রিপোর্ট</li>
                    <li class="breadcrumb-item">জেলাভিত্তিক এনজিও'র তালিকা</li>
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
                                <th>জেলা</th>
                                <th>মোবাইল নম্বর</th>
                                <th>ইমেইল</th>
                                <th>ওয়েবসাইট </th>



                            </tr>
                            </thead>
                            <tbody id="searchTable">

                                @foreach($allFdOneData as $allFdOneDatas)
                                <?php
                                $ngoOldNew = DB::table('ngo_type_and_languages')
                                                             ->where('user_id',$allFdOneDatas->user_id)
                                                             ->value('ngo_type_new_old');

                                                             $getngoForLanguageNewO = DB::table('ngo_type_and_languages')
                                                             ->where('user_id',$allFdOneDatas->user_id)->value('registration');

                                ?>
                                @if($ngoOldNew == 'Old')


                                    <?php
                                $mainCheckAll = DB::table('ngo_renews')
                                                             ->where('fd_one_form_id',$allFdOneDatas->id)
                                                             ->value('status');


                                ?>


                                @else
                                <?php
                                $mainCheckAll = DB::table('ngo_statuses')
                                                             ->where('fd_one_form_id',$allFdOneDatas->id)
                                                             ->value('status');

                                ?>

                                @endif

                                @if(empty($mainCheckAll))

                                @else
                                <tr>

                                    <td>
                                        @if($ngoOldNew == 'Old')
                                        #{{ App\Http\Controllers\Admin\CommonController::englishToBangla($getngoForLanguageNewO) }}
                                        @else

                                    @if($allFdOneDatas->registration_number == 0)

                                        #{{ App\Http\Controllers\Admin\CommonController::englishToBangla($allFdOneDatas->registration_number_given_by_admin) }}
                                        @else
                                        #{{ App\Http\Controllers\Admin\CommonController::englishToBangla($allFdOneDatas->registration_number) }}
                                        @endif
                                @endif

                                    </td>




                                    <td><h6>
                                         {{ $allFdOneDatas->organization_name_ban  }}<br>

                                    </h6><span>ঠিকানা: {{ $allFdOneDatas->organization_address }}</td>


                                          <td>
                                            <?php


                                            $districtName = DB::table('districts')
                                            ->where('id',$allFdOneDatas->district_id)
                                            ->value('bn_name');
                                ?>


                                {{ $districtName }}
                                        </td>



                                            <td>{{ $allFdOneDatas->phone }}</td>
                                            <td>{{ $allFdOneDatas->email }}</td>
                                            <td>
                                                {{ $allFdOneDatas->web_site_name }}

                                </td>
                                </tr>
                                @endif
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
