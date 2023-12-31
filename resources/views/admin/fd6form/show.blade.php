@extends('admin.master.master')

@section('title')
এফডি - ৬ ফরম | {{ $ins_name }}
@endsection



@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>প্রকল্প প্রস্তাব ফরম </h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">এফডি - ৬ ফরম</li>
                    <li class="breadcrumb-item">এফডি - ৬ ফরম এর বিবরণ</li>
                </ol>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</div>
 <!-- Container-fluid starts-->
 <div class="container-fluid">
    <div class="user-profile">
        <div class="card height-equal">
            <div class="card-body">


                <div class="row mb-4">
                    <div class="col-lg-12">

                        <div class="text-end">



                            @if($dataFromFd6Form->status == 'Ongoing')
                            <button onclick="location.href = '{{ route('showDataAll',['status'=>'fdSix','id'=>$dataFromFd6Form->mainId]) }}';" type="button" class="btn btn-primary add-btn">ডাক দেখুন</button>

                            @else

                            @endif
                        </div>
                    </div>
                </div>



                <ul class="nav nav-dark" id="pills-darktab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="pills-darkhome-tab"
                                            data-bs-toggle="pill" href="#pills-darkhome"
                                            role="tab" aria-controls="pills-darkhome"
                                            aria-selected="true" style=""><i
                                    class="icofont icofont-ui-home"></i>এফডি - ৬ ফরম</a></li>


                    <li class="nav-item"><a class="nav-link" id="pills-darkprofile-tab"
                                            data-bs-toggle="pill" href="#pills-darkprofile"
                                            role="tab" aria-controls="pills-darkprofile"
                                            aria-selected="false" style=""><i
                                    class="icofont icofont-man-in-glasses"></i>এফডি -২ ফরম</a>
                    </li>


                    <li class="nav-item"><a class="nav-link" id="pills-darkprofile-tab1"
                        data-bs-toggle="pill" href="#pills-darkprofile1"
                        role="tab" aria-controls="pills-darkprofile1"
                        aria-selected="false" style=""><i
                class="icofont icofont-man-in-glasses"></i>আবেদনের স্টেটাস</a>
</li>



                </ul>
                <div class="tab-content" id="pills-darktabContent">
                    <div class="tab-pane fade active show" id="pills-darkhome"
                         role="tabpanel" aria-labelledby="pills-darkhome-tab">
                        <div class="mb-0 m-t-30">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4>এফডি - ৬ ফরম </h4>
                                        <h5>প্রকল্প প্রস্তাব ফরম</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered mb-4">
                                        <tr>
                                            <td>এনজিও'র নাম</td>
                                            <td>: {{ $dataFromFd6Form->ngo_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>ব্যুরোর নিবন্ধন তারিখ </td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFd6Form->ngo_registration_date) }}</td>
                                        </tr>
                                        <tr>
                                            <td>সর্বশেষ নবায়ন</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFd6Form->ngo_last_renew_date) }}</td>
                                        </tr>
                                        <tr>
                                            <td>মেয়াদ উত্তীর্ণের তারিখ</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFd6Form->ngo_expiration_date) }}</td>
                                        </tr>
                                        <tr>
                                            <td>ঠিকানা</td>
                                            <td>: {{ $dataFromFd6Form->ngo_address }}</td>
                                        </tr>
                                        <tr>
                                            <td>টেলিফোন </td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFd6Form->ngo_telephone_number) }}</td>
                                        </tr>
                                        <tr>
                                            <td>মোবাইল নম্বর</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFd6Form->ngo_mobile_number) }}</td>
                                        </tr>
                                        <tr>
                                            <td>ইমেইল ঠিকানা</td>
                                            <td>: {{ $dataFromFd6Form->ngo_email_address }}</td>
                                        </tr>
                                        <tr>
                                            <td>ওয়েবসাইট</td>
                                            <td>: {{ $dataFromFd6Form->ngo_website }}</td>
                                        </tr>
                                        <tr>
                                            <td>প্রকল্প নাম</td>
                                            <td>: {{ $dataFromFd6Form->ngo_prokolpo_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>প্রকল্প মেয়াদ </td>
                                            <td>: {{ $dataFromFd6Form->ngo_prokolpo_duration }}</td>
                                        </tr>
                                        <tr>
                                            <td>আরম্ভের তারিখ </td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFd6Form->ngo_prokolpo_start_date) }}</td>
                                        </tr>
                                        <tr>
                                            <td>সমাপ্তির তারিখ </td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFd6Form->ngo_prokolpo_end_date) }}</td>
                                        </tr>
                                    </table>
                                    <h5 class="mb-4">প্রকল্প এলাকা</h5>
                                    <table class="table table-bordered mb-4">
                                        <tr>
                                            <th>বিভাগ</th>
                                            <th>জেলা/সিটি কর্পোরেশন</th>
                                            <th>উপজেলা/থানা/পৌরসভা/ওয়ার্ড</th>
                                        </tr>
                                        @foreach($prokolpoAreaList as $prokolpoAreaListAll)
                                        <tr>
                                            <td>বিভাগ: {{ $prokolpoAreaListAll->division_name }}</td>
                                            <td>
                                                জেলা: {{ $prokolpoAreaListAll->district_name }} <br>
                                                সিটি কর্পোরেশন: {{ $prokolpoAreaListAll->city_corparation_name }}
                                            </td>
                                            <td>
                                                উপজেলা: {{ $prokolpoAreaListAll->upozila_name }} <br>
                                                থানা: {{ $prokolpoAreaListAll->thana_name }} <br>
                                                পৌরসভা: {{ $prokolpoAreaListAll->municipality_name }} <br>
                                                ওয়ার্ড: {{ $prokolpoAreaListAll->ward_name }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    <div class="mb-4">
                                        <h4>প্রাক্কলিক ব্যয় ও দাতা সংস্থার নাম : </h4>
                                        <h5>প্রাক্কলিক ব্যয় (টাকায়) </h5>
                                    </div>
                                    <table class="table table-bordered mb-4">
                                        <tr>
                                            <th>অর্থের উৎসের বিবরণ:</th>
                                            <th>১ম বছর</th>
                                            <th>২য় বছর</th>
                                            <th>৩য় বছর</th>
                                            <th>৪র্থ বছর</th>
                                            <th>৫ম বছর</th>
                                            <th>মোট</th>
                                            <th>মন্তব্য</th>
                                        </tr>
                                        <tr>
                                            <td>১.বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি তাকে পরিবর্তিত)</td>
                                            <td>{{ $dataFromFd6Form->grants_received_from_abroad_first_year }}</td>
                                            <td>{{ $dataFromFd6Form->grants_received_from_abroad_second_year }}</td>
                                            <td>{{ $dataFromFd6Form->grants_received_from_abroad_third_year }}</td>
                                            <td>{{ $dataFromFd6Form->grants_received_from_abroad_fourth_year }}</td>
                                            <td>{{ $dataFromFd6Form->grants_received_from_abroad_fifth_year }}</td>
                                            <td>{{ $dataFromFd6Form->grants_received_from_abroad_total }}</td>
                                            <td>{{ $dataFromFd6Form->grants_received_from_abroad_comment }}</td>
                                        </tr>
                                        <tr>
                                            <td>২.দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত অনুদান </td>
                                            <td>{{ $dataFromFd6Form->donations_made_by_foreign_donors_first_year }}</td>
                                            <td>{{ $dataFromFd6Form->donations_made_by_foreign_donors_second_year }}</td>
                                            <td>{{ $dataFromFd6Form->donations_made_by_foreign_donors_third_year }}</td>
                                            <td>{{ $dataFromFd6Form->donations_made_by_foreign_donors_fourth_year }}</td>
                                            <td>{{ $dataFromFd6Form->donations_made_by_foreign_donors_fifth_year }}</td>
                                            <td>{{ $dataFromFd6Form->donations_made_by_foreign_donors_total }}</td>
                                            <td>{{ $dataFromFd6Form->donations_made_by_foreign_donors_comment }}</td>
                                        </tr>
                                        <tr>
                                            <td>৩.স্থানীয় অনুদান  (উৎসের বিস্তারিত বিবরণ ও প্রমাণকসহ)</td>
                                            <td>{{ $dataFromFd6Form->local_grants_first_year }}</td>
                                            <td>{{ $dataFromFd6Form->local_grants_second_year }}</td>
                                            <td>{{ $dataFromFd6Form->local_grants_third_year }}</td>
                                            <td>{{ $dataFromFd6Form->local_grants_fourth_year }}</td>
                                            <td>{{ $dataFromFd6Form->local_grants_fifth_year }}</td>
                                            <td>{{ $dataFromFd6Form->local_grants_donors_total }}</td>
                                            <td>{{ $dataFromFd6Form->local_grants_donors_comment }}</td>
                                        </tr>
                                        <tr>
                                            <td>মোট </td>
                                            <td>{{ $dataFromFd6Form->total_first_year }}</td>
                                            <td>{{ $dataFromFd6Form->total_second_year }}</td>
                                            <td>{{ $dataFromFd6Form->total_third_year }}</td>
                                            <td>{{ $dataFromFd6Form->total_fourth_year }}</td>
                                            <td>{{ $dataFromFd6Form->total_fifth_year }}</td>
                                            <td>{{ $dataFromFd6Form->total_donors_total }}</td>
                                            <td>{{ $dataFromFd6Form->total_donors_comment }}</td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered mb-4">
                                        <tr>
                                            <td>দাতা সংস্থার নাম</td>
                                            <td>: {{ $dataFromFd6Form->donor_organization_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>দাতা সংস্থার ঠিকানা </td>
                                            <td>: {{ $dataFromFd6Form->donor_organization_address }}</td>
                                        </tr>
                                        <tr>
                                            <td>ফোন/মোবাইল/ইমেইল নম্বর </td>
                                            <td>: {{ $dataFromFd6Form->donor_organization_phone_mobile_email }}</td>
                                        </tr>
                                        <tr>
                                            <td>ওয়েবসাইট</td>
                                            <td>: {{ $dataFromFd6Form->donor_organization_website }}</td>
                                        </tr>
                                        <tr>
                                            <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধের নিমিত্ত</td>
                                            <td>: {{ $dataFromFd6Form->money_laundering_and_terrorist_financing }}</td>
                                        </tr>
                                    </table>
                                    <h5 class="mb-3">প্রশাসনিক ব্যয় ও প্রকল্প ব্যায়ের অনুপাত:</h5>
                                    <table class="table table-bordered mb-3">
                                        <tr>
                                            <td>প্রকল্প ব্যয়</td>
                                            <td>{{ $dataFromFd6Form->project_cost }}</td>
                                            <td>{{ $dataFromFd6Form->project_cost_ratio }}</td>
                                        </tr>
                                        <tr>
                                            <td>প্রশাসনিক ব্যয়</td>
                                            <td>{{ $dataFromFd6Form->administrative_cost }}</td>
                                            <td>{{ $dataFromFd6Form->administrative_ratio }}</td>
                                        </tr>
                                        <tr>
                                            <td>মোট</td>
                                            <td>{{ $dataFromFd6Form->project_and_administrative_cost }}</td>
                                            <td>{{ $dataFromFd6Form->project_and_administrative_cost_ratio }}</td>
                                        </tr>
                                    </table>
                                    <h5 class="mb-4">প্রকল্প এলাকাসমূহে প্রকল্পের বিস্তারিত সাইনবোর্ড প্রদর্শন বিষয়ক
                                            তথ্যাদি :</h5>
                                    <table class="table table-bordered mb-4">
                                        <tr>
                                            <td>প্রকল্পের নাম  </td>
                                            <td>: {{ $dataFromFd6Form->project_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>প্রকল্পের মেয়াদকাল </td>
                                            <td>: {{ $dataFromFd6Form->duration_of_project }}</td>
                                        </tr>
                                        <tr>
                                            <td>প্রকল্পের মোট বরাদ্দ </td>
                                            <td>: {{ $dataFromFd6Form->total_allocation_of_project }}</td>
                                        </tr>
                                        <tr>
                                            <td>প্রকল্প এলাকায় মোট বরাদ্দ </td>
                                            <td>: {{ $dataFromFd6Form->total_allocation_in_project_area }}</td>
                                        </tr>
                                        <tr>
                                            <td> মোট উপকারভোগীর সংখ্যা </td>
                                            <td>: {{ $dataFromFd6Form->total_beneficiaries }}</td>
                                        </tr>
                                        <tr>
                                            <td>প্রকল্প এলাকায় মোট জনসংখ্যা </td>
                                            <td>: {{ $dataFromFd6Form->total_population_in_project_area }}</td>
                                        </tr>
                                        <tr>
                                            <td>দাতা সংস্থার নাম</td>
                                            <td>: {{ $dataFromFd6Form->donor_organization_name_two }}</td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered mb-4">
                                        <tr>
                                            <td>প্রকল্প প্রস্তাব ফরম / এফডি - ৬  পিডিএফ </td>
                                            <td>: <a href="{{ route('fd6PdfDownload',$dataFromFd6Form->mainId) }}" target="_blank" class="btn btn-success">View</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-darkprofile" role="tabpanel"
                         aria-labelledby="pills-darkprofile-tab">
                        <div class="mb-0 m-t-30">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h4>এফডি -২ ফরম</h4>
                                            <h5>অর্থছাড়ের আবেদন ফরম</h5>
                                        </div>
                                    </div>
                                    <table class="table table-bordered mb-4">
                                        <tr>
                                            <td>সংস্থার নাম</td>
                                            <td>: {{ $fd2FormList->ngo_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>সংস্থার ঠিকানা</td>
                                            <td>: {{ $fd2FormList->ngo_address }}</td>
                                        </tr>
                                        <tr>
                                            <td>প্রকল্প নাম</td>
                                            <td>: {{ $fd2FormList->ngo_prokolpo_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>কোন দেশীয় সংস্থা</td>
                                            <td>: {{ $dataFromFd6Form->country_of_origin }}</td>
                                        </tr>
                                        <tr>
                                            <td>প্রকল্প মেয়াদ </td>
                                            <td>: {{ $fd2FormList->ngo_prokolpo_duration }}</td>
                                        </tr>
                                        <tr>
                                            <td>আরম্ভের তারিখ </td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($fd2FormList->ngo_prokolpo_start_date) }}</td>
                                        </tr>
                                        <tr>
                                            <td>সমাপ্তির তারিখ </td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($fd2FormList->ngo_prokolpo_end_date) }}</td>
                                        </tr>
                                        <tr>
                                            <td>প্রস্তাবিত অর্থছাড়ের পরিমান (বাংলাদেশী টাকা )</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($fd2FormList->proposed_rebate_amount_bangladeshi_taka) }}</td>
                                        </tr>
                                        <tr>
                                            <td>প্রস্তাবিত অর্থছাড়ের পরিমান (বৈদেশিক মুদ্রায় )</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($fd2FormList->proposed_rebate_amount_in_foreign_currency) }}</td>
                                        </tr>
                                        <tr>
                                            <td>এফডি ২ ফর্ম উপলোড </td>
                                            <td><a href="{{ route('fd2PdfDownload',$fd2FormList->id) }}" target="_blank" class="btn btn-success">View</a></td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered mb-4">
                                        <tr>
                                            <th>ফাইলের নাম</th>
                                            <th>ফাইল</th>
                                        </tr>
                                        @foreach($fd2OtherInfo as $fd2OtherInfoAll)
                                        <tr>
                                            <td>{{ $fd2OtherInfoAll->file_name }}</td>
                                            <td><a href="{{ route('fd2OtherPdfDownload',$fd2OtherInfoAll->id) }}" target="_blank" class="btn btn-success">View</a></td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--new tab start-->

                    <div class="tab-pane fade" id="pills-darkprofile1" role="tabpanel"
                         aria-labelledby="pills-darkprofile-tab1">
                        <div class="mb-0 m-t-30">


                            <div class="card">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <form action="{{ route('statusUpdateForFd6') }}" method="post">
                                                @csrf


                                                <input type="hidden" value="{{ $dataFromFd6Form->mainId }}" name="id" />


                                                <input type="hidden" value="{{ $get_email_from_user }}" name="email" />

                                                <label>স্টেটাস:</label>
                                                <select class="form-control form-control-sm mt-4" name="status" id="regStatus">

                                                    <option value="Ongoing" {{ $dataFromFd6Form->status == 'Ongoing' ? 'selected':''  }}>চলমান</option>

                                                    <option value="Accepted" {{ $dataFromFd6Form->status == 'Accepted' ? 'selected':''  }}>গৃহীত</option>
                                                    <option value="Correct" {{ $dataFromFd6Form->status == 'Correct' ? 'selected':''  }}>সংশোধন করুন</option>
                                                    <option value="Rejected" {{ $dataFromFd6Form->status == 'Rejected' ? 'selected':''  }}>প্রত্যাখ্যান করুন</option>

                                                </select>


                                                @if($dataFromFd6Form->status == 'Correct' || $dataFromFd6Form->status == 'Rejected')

                                                <div id="rValueStatus" >
                                                    <label>বিস্তারিত লিখুন:</label>
                                                    <textarea class="form-control form-control-sm" name="comment">{{ $dataFromFd6Form->comment }}</textarea>
                                                </div>
                                                @else
                                                <div id="rValueStatus" style="display:none;">
                                                    <label>বিস্তারিত লিখুন:</label>
                                                    <textarea class="form-control form-control-sm" name="comment"></textarea>
                                                </div>
                                                @endif
                                                <button type="submit" class="btn btn-primary mt-5">আপডেট করুন</button>

                                              </form>
                                        </div>
                                        <div class="col-md-12" id="finalResult">

                                        </div>

                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>
                    <!--end new tab-->
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Container-fluid Ends-->
@endsection


@section('script')
<script>
    $(document).ready(function(){
      $("#regStatus").change(function(){
        var valmain = $(this).val();

        if(valmain == 'Accepted'){
           $('#rValue').show();
           $('#rValueStatus').hide();

        }
        else{
            $('#rValue').hide();
            $('#rValueStatus').show();
        }
      });
    });
    </script>
@endsection
