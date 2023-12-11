@extends('admin.master.master')

@section('title')
এফডি - ৭ ফরম | {{ $ins_name }}
@endsection



@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>দুর্যোগকালীন ও দুর্যোগ পরবর্তী জরুরি ত্রাণ সহায়তা কার্যক্রম/ প্রকল্প প্রস্তাব ফরম</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">এফডি - ৭ ফরম</li>
                    <li class="breadcrumb-item">এফডি - ৭ ফরম এর বিবরণ</li>
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



                            @if($dataFromFd7Form->status == 'Ongoing')
                            <button onclick="location.href = '{{ route('showDataAll',['status'=>'fdSeven','id'=>$dataFromFd7Form->mainId]) }}';" type="button" class="btn btn-primary add-btn">ডাক দেখুন</button>

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
                                    class="icofont icofont-ui-home"></i>এফডি - ৭ ফরম</a></li>


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
                                        <h4>এফডি - ৭ ফরম</h4>
                                        <h5>দুর্যোগকালীন ও দুর্যোগ পরবর্তী জরুরি ত্রাণ সহায়তা কার্যক্রম/ প্রকল্প প্রস্তাব ফরম</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered mb-4">
                                        <tr>
                                            <td>এনজিও'র নাম</td>
                                            <td>: {{ $dataFromFd7Form->ngo_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>ঠিকানা</td>
                                            <td>: {{ $dataFromFd7Form->ngo_address }}</td>
                                        </tr>

                                        <tr>
                                            <td>নিবন্ধন নম্বর</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFd7Form->ngo_registration_number) }}</td>
                                        </tr>
                                        <tr>
                                            <td>ব্যুরোর নিবন্ধন তারিখ </td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFd7Form->ngo_registration_date) }}</td>
                                        </tr>
                                        <tr>
                                            <td>প্রস্তাবিত প্রকল্পের নাম</td>
                                            <td>: {{ $dataFromFd7Form->ngo_prokolpo_name }}</td>
                                        </tr>
                                    </table>


                                        <h5 class="mb-4">অর্থ বা ত্রাণ-সামগ্রীর উৎস <br>
                                            দাতা সংস্থার প্রতিশ্রুতিপত্র</h5>

                                            <table class="table table-bordered mb-4">
                                                <tr>
                                                    <td>দাতা সংস্থার বিবরণ</td>
                                                    <td>: {{ $dataFromFd7Form->donor_organization_description }}</td>
                                                </tr>
                                                <tr>
                                                    <td>প্রধান নির্বাহী কর্মকর্তা/ দাতা</td>
                                                    <td>: {{ $dataFromFd7Form->donor_organization_chief_type }}</td>
                                                </tr>

                                                <tr>
                                                    <td>নাম</td>
                                                    <td>: {{ $dataFromFd7Form->donor_organization_chief_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>দাতা সংস্থার নাম</td>
                                                    <td>: {{ $dataFromFd7Form->donor_organization_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>যোগাযোগগের ঠিকানা</td>
                                                    <td>: {{ $dataFromFd7Form->donor_organization_address }}</td>
                                                </tr>

                                                <tr>
                                                    <td>টেলিফোন</td>
                                                    <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFd7Form->donor_organization_phone) }}</td>
                                                </tr>


                                                <tr>
                                                    <td>ইমেইল</td>
                                                    <td>: {{ $dataFromFd7Form->donor_organization_email }}</td>
                                                </tr>

                                                <tr>
                                                    <td>ওয়েবসাইট</td>
                                                    <td>: {{ $dataFromFd7Form->donor_organization_website }}</td>
                                                </tr>
                                            </table>

                                                <h5 class="mb-4">দাতা সংস্থার প্রতিশ্রুতিপত্র</h5>


                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>চলমান প্রকল্পের নাম</td>
                                                    <td>: {{ $dataFromFd7Form->ongoing_prokolpo_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>মোট ব্যায়</td>
                                                    <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFd7Form->total_prokolpo_cost) }}</td>
                                                </tr>

                                                <tr>
                                                    <td>ব্যুরোর অনুমোদনের তারিখ</td>
                                                    <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFd7Form->date_of_bureau_approval) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>অনুমোদনপত্র সংযুক্ত করতে হবে</td>
                                                    <td>:<a href="{{ route('authorizationLetter',$dataFromFd7Form->id) }}" target="_blank" class="btn btn-success">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>মূল প্রকল্পের শতকরা কতভাগ এই প্রকল্পের ব্যায় করা হয়</td>
                                                    <td>: {{ $dataFromFd7Form->percentage_of_the_original_project }}</td>
                                                </tr>

                                                <tr>
                                                    <td>চলমান প্রকল্পের উপর কোন বিরূপ প্রভাব ফেলবে কি না</td>
                                                    <td>: {{ $dataFromFd7Form->adverse_impact_on_the_ongoing_project }}</td>
                                                </tr>


                                                <tr>
                                                    <td>দাতা সংস্থার প্রতিশ্রুতিপত্র (কপি সংযুক্ত করতে হবে)</td>
                                                    <td>:<a href="{{ route('letterFromDonorAgency',$dataFromFd7Form->id) }}" target="_blank" class="btn btn-success">View</a></td>
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
                                                ওয়ার্ড: {{ $prokolpoAreaListAll->ward_name }} <br>
                                                বরাদ্দকৃত বাজেট: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($prokolpoAreaListAll->allocated_budget) }} <br>
                                    উপকারভোগীর সংখ্যা: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($prokolpoAreaListAll->number_of_beneficiaries) }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    <div class="mb-4">

                                        <h5>কার্যক্রমের মেয়াদকাল</h5>
                                    </div>

                                    <table class="table table-bordered mb-4">
                                        <tr>
                                            <td>আরম্ভের তারিখ</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFd7Form->ngo_prokolpo_start_date) }}</td>
                                        </tr>
                                        <tr>
                                            <td>সমাপ্তির তারিখ</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFd7Form->ngo_prokolpo_end_date) }}</td>
                                        </tr>

                                    </table>


                                    <table class="table table-bordered mb-4">
                                        <tr>
                                            <td>দুর্যোগকালীন ও দুর্যোগ পরবর্তী জরুরি ত্রাণ সহায়তা কার্যক্রম/ প্রকল্প প্রস্তাব ফরম পিডিএফ  / এফডি -৭ ফরম</td>
                                            <td>: <a href="{{ route('reliefAssistanceProjectProposalPdf',$dataFromFd7Form->id) }}" target="_blank" class="btn btn-success">View</a></td>
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
                                            <td>: {{ $dataFromFd7Form->country_of_origin }}</td>
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
                                            <td><a href="{{ route('fd7fd2PdfDownload',$fd2FormList->id) }}" target="_blank" class="btn btn-success">View</a></td>
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
                                            <td><a href="{{ route('fd7fd2OtherPdfDownload',$fd2OtherInfoAll->id) }}" target="_blank" class="btn btn-success">View</a></td>
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
                                            <form action="{{ route('statusUpdateForFd7') }}" method="post">
                                                @csrf


                                                <input type="hidden" value="{{ $dataFromFd7Form->mainId }}" name="id" />


                                                <input type="hidden" value="{{ $get_email_from_user }}" name="email" />

                                                <label>স্টেটাস:</label>
                                                <select class="form-control form-control-sm mt-4" name="status" id="regStatus">

                                                    <option value="Ongoing" {{ $dataFromFd7Form->status == 'Ongoing' ? 'selected':''  }}>চলমান</option>

                                                    <option value="Accepted" {{ $dataFromFd7Form->status == 'Accepted' ? 'selected':''  }}>গৃহীত</option>
                                                    <option value="Correct" {{ $dataFromFd7Form->status == 'Correct' ? 'selected':''  }}>সংশোধন করুন</option>
                                                    <option value="Rejected" {{ $dataFromFd7Form->status == 'Rejected' ? 'selected':''  }}>প্রত্যাখ্যান করুন</option>

                                                </select>


                                                @if($dataFromFd7Form->status == 'Correct' || $dataFromFd7Form->status == 'Rejected')

                                                <div id="rValueStatus" >
                                                    <label>বিস্তারিত লিখুন:</label>
                                                    <textarea class="form-control form-control-sm" name="comment">{{ $dataFromFd7Form->comment }}</textarea>
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
