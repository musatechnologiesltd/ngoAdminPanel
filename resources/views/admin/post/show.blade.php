@extends('admin.master.master')

@section('title')
ডাক প্রেরণ তালিকা | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>ডাক প্রেরণ তালিকা</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">ডাক </li>
                    <li class="breadcrumb-item">ডাক প্রেরণ করুন</li>
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
                    <h5>ডাক প্রেরণ করুন</h5>
                    @include('flash_message')
                </div>
                <form class="custom-validation" action="{{ route('dakListSecondStep') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                    @csrf
                    <div class="card-body">
                        <h5>সিধান্তঃ বিধি মোতাবেক বাবস্থা নিন।</h5>
                        <div class="nothi_header_box">
                            <span>সিধান্ত নিন</span>
                        </div>
                        <div class="form-group mt-3 m-checkbox-inline mb-0 custom-radio-ml">
                            <div class="radio radio-primary">
                                <input id="radioinline1" type="radio" class="decision_list" name="decision_list" value="বিধি মোতাবেক বাবস্থা নিন" required>
                                <label class="mb-0" for="radioinline1">বিধি মোতাবেক বাবস্থা নিন</label>
                            </div>
                            <div class="radio radio-primary">
                                <input id="radioinline2" type="radio" class="decision_list" name="decision_list" value="নথিতে উপস্থাপন করুন" required>
                                <label class="mb-0" for="radioinline2">নথিতে উপস্থাপন করুন</label>
                            </div>
                            <div class="radio radio-primary">
                                <input id="radioinline3" type="radio" class="decision_list" name="decision_list" value="নথিজাত করুন" required>
                                <label class="mb-0" for="radioinline3">নথিজাত করুন</label>
                            </div>
                            <div class="radio radio-primary">
                                <input id="own_decision" type="radio" class="decision_list" name="decision_list" value="সিধান্ত নিজে নিন" required>
                                <label class="mb-0" for="own_decision">সিধান্ত নিজে নিন</label>
                            </div>
                        </div>

                        <input type="text" placeholder="সিধান্ত নিজে নিন" class="form-control digits mt-3" style="display: none;" name="decision_list_detail" id="decision_list_detail"/>
                        {{-- <select class="form-select digits mt-3" style="display: none;" name="decision_list_detail" id="decision_list_detail" >
                            <option value="">-- অনুগ্রহ করে নির্বাচন করুন --</option>
                            <option value="দেখলাম কাজ শুরু হচ্ছে">দেখলাম কাজ শুরু হচ্ছে</option>
                            <option value="পেশ করুন">পেশ করুন</option>
                            <option value="তদন্ত পূর্বক প্রতিবেদন দিবেন">তদন্ত পূর্বক প্রতিবেদন দিবেন</option>
                            <option value="দেখলাম পেশ করুন">দেখলাম পেশ করুন</option>
                            <option value="নথিজাত করুন">নথিজাত করুন</option>
                        </select> --}}
                        <div class="nothi_header_box">
                            <span id="result_one">বিধি মোতাবেক ব্যবস্থা নিন</span>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label"
                                           for="exampleInputPassword21">অগ্রাধিকার</label>
                                    <select class="form-select digits" name="priority_list" id="exampleFormControlSelect9" required>
                                        <option value="">-- অনুগ্রহ করে নির্বাচন করুন --</option>
                                        <option value="সর্বচ্চ অগ্রাধিকার">সর্বচ্চ অগ্রাধিকার</option>
                                        <option value="অবিলম্বে">অবিলম্বে</option>
                                        <option value="জরুরী">জরুরী</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputPassword21">গোপনীয়তা</label>
                                    <select class="form-select digits" name="secret_list" id="exampleFormControlSelect9" required>

                                        <option value="">গোপনীয়তা বাছাই করুন</option>
                                        <option value="অতি গোপনীয়তা">অতি গোপনীয়তা</option>
                                        <option value="বিশেষ গোপনীয়">বিশেষ গোপনীয়</option>
                                        <option value="গোপনীয়">গোপনীয়</option>
                                        <option value="সিমিত">সিমিত</option>
                                    </select>
                                </div>
                                <input value="{{ $mainstatus}}" type="hidden" name="mainstatus"/>
                            </div>
                        </div>
                        <div class=" nothi_header_box">
                            <span id="result_two">বিধি মোতাবেক ব্যবস্থা নিন</span>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row-reverse bd-highlight">
                                    <button  type="submit" class="btn btn-primary"><i class="fa fa-send"></i>
                                        প্রেরন
                                    </button>


                                    <a class="btn btn-outline-success me-2" href = "{{ route('createSeal',['status'=>$mainstatus,'id'=>$id]) }}"><i class="fa fa-plus"></i> নতুন
                                        সিল বানান
                                    </a>



                                </div>
                                <ul class="nav nav-tabs" id="icon-tab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="icon-home-tab"
                                                            data-bs-toggle="tab" href="#icon-home1"
                                                            role="tab" aria-controls="icon-home"
                                                            aria-selected="true"><i
                                                    class="icofont icofont-ui-home"></i>নিজ অফিস</a></li>
                                </ul>
                                <div class="tab-content" id="icon-tabContent">
                                    <div class="tab-pane fade show active" id="icon-home1" role="tabpanel"
                                         aria-labelledby="icon-home-tab">
                                        <table class="table table-bordered mt-3">
                                            <tr>
                                                <th>
                                                    {{-- <button class="btn btn-outline-success">#</button> --}}
                                                </th>
                                                <th>পদবী</th>
                                                <th>নাম</th>
                                                <th>মূল-প্রাপক</th>
                                                <th>কার্যার্থে অনুলিপি</th>
                                                <th>জ্ঞাতার্থে অনুলিপি</th>
                                                <th>দৃষ্টি আকর্ষণ</th>
                                            </tr>
                                            @foreach($allRegistrationDak as $showAllRegistrationDak)

                                            <?php
                                            $adminName = DB::table('admins')
                                            ->where('id',$showAllRegistrationDak->receiver_admin_id)->value('admin_name_ban');

                                            $designationId = DB::table('admin_designation_histories')
                                            ->where('admin_id',$showAllRegistrationDak->receiver_admin_id)
                                            ->value('designation_list_id');

                                            $designationName = DB::table('designation_lists')
                                            ->where('id',$designationId)->value('designation_name');

                                            $branchId = DB::table('designation_lists')
                                            ->where('id',$designationId)->value('branch_id');

                                            $branchName = DB::table('branches')
                                            ->where('id',$branchId)->value('branch_name');
?>
                                            <tr>
                                                <td>
                                                    {{-- <div class="d-flex justify-content-center">
                                                        <button class="btn btn-outline-success"><i class="fa fa-trash"></i></button>
                                                    </div> --}}


                                                    <div class="d-flex justify-content-center">
                                                    <a  href="{{ route('deleteMemberList',$showAllRegistrationDak->id) }}" type="button" class="btn btn-outline-success"  ><i class="fa fa-trash"></i></a>

                                                    </div>


                                                </td>
                                                <td>{{ $branchName }}, {{ $designationName }}
                                                </td>
                                                <td>{{ $adminName }}</td>
                                                <td>

                                                    <input value="{{ $showAllRegistrationDak->id }}" type="hidden" name="receiverId[{{ $showAllRegistrationDak->id }}]"/>
                                                    <input value="{{ $showAllRegistrationDak->id }}" type="hidden" name="receiverIdAjax[]"/>

                                                    <div class="d-flex justify-content-center">


                                                        <div class="custom_checkbox">
                                                            <input id="mmcheck{{ $showAllRegistrationDak->id }}" class="custom_check main_prapok"
                                                                   type="checkbox" name="main_prapok{{ $showAllRegistrationDak->id }}[{{ $showAllRegistrationDak->id }}]" value="1" data-mid="{{ $showAllRegistrationDak->id }}" />
                                                            <label for="mmcheck{{ $showAllRegistrationDak->id }}" style="--d: 30px">
                                                                <svg viewBox="0,0,50,50">
                                                                    <path d="M5 30 L 20 45 L 45 5"></path>
                                                                </svg>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="custom_checkbox">
                                                            <input id="check{{ $showAllRegistrationDak->id }}" class="custom_check karjo_onulipi"
                                                                   type="checkbox" name="karjo_onulipi{{ $showAllRegistrationDak->id }}[{{ $showAllRegistrationDak->id }}]" value="1" data-mid="{{ $showAllRegistrationDak->id }}" />
                                                            <label for="check{{ $showAllRegistrationDak->id }}" style="--d: 30px">
                                                                <svg viewBox="0,0,50,50">
                                                                    <path d="M5 30 L 20 45 L 45 5"></path>
                                                                </svg>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="custom_checkbox">
                                                            <input id="icheck{{ $showAllRegistrationDak->id }}" class="custom_check info_onulipi"
                                                                   type="checkbox" name="info_onulipi{{ $showAllRegistrationDak->id }}[{{ $showAllRegistrationDak->id }}]" value="1" data-mid = "{{ $showAllRegistrationDak->id }}" />
                                                            <label for="icheck{{ $showAllRegistrationDak->id }}" style="--d: 30px">
                                                                <svg viewBox="0,0,50,50">
                                                                    <path d="M5 30 L 20 45 L 45 5"></path>
                                                                </svg>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="custom_checkbox">
                                                            <input id="echeck{{ $showAllRegistrationDak->id }}" class="custom_check eye_onulipi"
                                                                   type="checkbox" data-mid = "{{ $showAllRegistrationDak->id }}" value="1"  name="eye_onulipi{{ $showAllRegistrationDak->id }}[{{ $showAllRegistrationDak->id }}]"/>
                                                            <label for="echeck{{ $showAllRegistrationDak->id }}" style="--d: 30px">
                                                                <svg viewBox="0,0,50,50">
                                                                    <path d="M5 30 L 20 45 L 45 5"></path>
                                                                </svg>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Individual column searching (text inputs) Ends-->
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection


@section('script')

<script>

$(document).on('click', '.main_prapok', function(){

    var mainPrapokId = $(this).data('mid');

    $('input.main_prapok').not(this).prop('checked', false);



    if($(this).is(':checked')){


$("#check"+mainPrapokId).prop('checked', false);
$("#icheck"+mainPrapokId).prop('checked', false);
$("#echeck"+mainPrapokId).prop('checked', false);


}



// //     alert(mainPrapokId);


//     var receiver_id_ajax = $('input[name="receiverIdAjax[]"]').map(function (idx, ele) {
//    return $(ele).val();
// }).get();

// var receiver_id_ajax_new = $.grep(receiver_id_ajax, function(value) {
//   return value != mainPrapokId;
// });

// //alert(y);

// for (var i = 0; i < receiver_id_ajax_new.length; i++) {


//     $("#check"+receiver_id_ajax_new[i] << 0).removeAttr('disabled');
//     $("#icheck"+receiver_id_ajax_new[i] << 0).removeAttr('disabled');
//     $("#echeck"+receiver_id_ajax_new[i] << 0).removeAttr('disabled');

// }


//     if($(this).is(':checked')){

//     $("#check"+mainPrapokId).attr('disabled', 'disabled');
//     $("#icheck"+mainPrapokId).attr('disabled', 'disabled');
//     $("#echeck"+mainPrapokId).attr('disabled', 'disabled');
//     }else{

//     $("#check"+mainPrapokId).removeAttr('disabled');
//     $("#icheck"+mainPrapokId).removeAttr('disabled');
//     $("#echeck"+mainPrapokId).removeAttr('disabled');

//     }
});

/////
//karjo_onulipi
$(document).on('click', '.karjo_onulipi', function(){

    var mainPrapokId = $(this).data('mid');



    if($(this).is(':checked')){


$("#check"+mainPrapokId).prop('checked', true);
$("#mmcheck"+mainPrapokId).prop('checked', false);
$("#icheck"+mainPrapokId).prop('checked', false);
$("#echeck"+mainPrapokId).prop('checked', false);


}

});

//info_onulipi

$(document).on('click', '.info_onulipi', function(){

var mainPrapokId = $(this).data('mid');



if($(this).is(':checked')){


$("#check"+mainPrapokId).prop('checked', false);
$("#mmcheck"+mainPrapokId).prop('checked', false);
$("#icheck"+mainPrapokId).prop('checked', true);
$("#echeck"+mainPrapokId).prop('checked', false);


}

});


//eye_onulipi

$(document).on('click', '.eye_onulipi', function(){

var mainPrapokId = $(this).data('mid');

//alert(mainPrapokId);

if($(this).is(':checked')){


$("#check"+mainPrapokId).prop('checked', false);
$("#mmcheck"+mainPrapokId).prop('checked', false);
$("#icheck"+mainPrapokId).prop('checked', false);
$("#echeck"+mainPrapokId).prop('checked', true);


}

});

//decision list

$(document).on('click', '.decision_list', function(){

    var decisionVal = $(this).val();

    $('#result_one').html(decisionVal);
    $('#result_two').html(decisionVal);

    if(decisionVal == 'সিধান্ত নিজে নিন'){

        $('#decision_list_detail').show();


    }else{
        $('#decision_list_detail').hide();

    }


});

</script>

@endsection
