@extends('admin.master.master')

@section('title')
এফসি-১ ফরম | {{ $ins_name }}
@endsection



@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>এককালীন অনুদান গ্রহণের আবেদন ফরম</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">এফসি-১ ফরম</li>
                    <li class="breadcrumb-item">এফসি-১ ফরম এর বিবরণ</li>
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



                            @if($dataFromFc1Form->status == 'Ongoing')
                            <button onclick="location.href = '{{ route('showDataAll',['status'=>'fcOne','id'=>$dataFromFc1Form->mainId]) }}';" type="button" class="btn btn-primary add-btn">ডাক দেখুন</button>

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
                                    class="icofont icofont-ui-home"></i>এফসি-১ ফরম
                                </a></li>


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
                                        <h4>এফসি-১ ফরম</h4>
                                        <h5>এককালীন অনুদান গ্রহণের আবেদন ফরম</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered mb-4">
                                        <tr>
                                            <td>এনজিও'র নাম</td>
                                            <td>: {{ $dataFromFc1Form->ngo_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>ঠিকানা</td>
                                            <td>: {{ $dataFromFc1Form->ngo_address }}</td>
                                        </tr>

                                        <tr>
                                            <td>টেলিফোন</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFc1Form->ngo_telephone_number) }}</td>
                                        </tr>
                                        <tr>
                                            <td>মোবাইল নম্বর</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFc1Form->ngo_mobile_number) }}</td>
                                        </tr>
                                        <tr>
                                            <td>ইমেইল ঠিকানা</td>
                                            <td>: {{ $dataFromFc1Form->ngo_email }}</td>
                                        </tr>

                                        <tr>
                                            <td>ওয়েবসাইট</td>
                                            <td>: {{ $dataFromFc1Form->ngo_website }}</td>
                                        </tr>
                                    </table>


                                        <h5 class="mb-4">প্রকল্পের মেয়াদ</h5>

                                            <table class="table table-bordered mb-4">
                                                <tr>
                                                    <td>আরম্ভের তারিখ</td>
                                                    <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFc1Form->ngo_prokolpo_start_date) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>সমাপ্তির তারিখ</td>
                                                    <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFc1Form->ngo_prokolpo_end_date) }}</td>
                                                </tr>
                                            </table>

                                                <h5 class="mb-4">কর্ম এলাকা ও বাজেট</h5>


                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>কর্ম এলাকা জেলা</td>
                                                    <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFc1Form->ngo_district) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>কর্ম এলাকা উপজেলা</td>
                                                    <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFc1Form->ngo_sub_district) }}</td>
                                                </tr>

                                                <tr>
                                                    <td>মোট উপকারভোগীর সংখ্যা</td>
                                                    <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFc1Form->total_number_of_beneficiaries) }}</td>
                                                </tr>



                                            </table>


                                    <h5 class="mb-4">যে বৈদেশিক উৎস থেকে অনুদান গ্রহণ করা হবে তার বিবরণ<br>
                                        ব্যক্তির ক্ষেত্রে</h5>
                                    <table class="table table-bordered mb-4">
                                        <tr>
                                            <td>পূর্ণ নাম</td>
                                            <td>: {{ $dataFromFc1Form->foreigner_donor_full_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>পেশা</td>
                                            <td>: {{ $dataFromFc1Form->foreigner_donor_occupation }}</td>
                                        </tr>

                                        <tr>
                                            <td>যোগাযোগের ঠিকানা</td>
                                            <td>: {{ $dataFromFc1Form->foreigner_donor_address }}</td>
                                        </tr>
                                        <tr>
                                            <td>টেলিফোন</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFc1Form->foreigner_donor_telephone_number) }}</td>
                                        </tr>
                                        <tr>
                                            <td>ফ্যাক্স</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFc1Form->foreigner_donor_fax) }}</td>
                                        </tr>

                                        <tr>
                                            <td>ইমেইল নম্বর</td>
                                            <td>: {{ $dataFromFc1Form->foreigner_donor_email }}</td>
                                        </tr>


                                        <tr>
                                            <td>জাতীয়তা/নাগরিকত্ব</td>
                                            <td>: {{ $dataFromFc1Form->foreigner_donor_nationality }}</td>
                                        </tr>

                                        <tr>
                                            <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত United Nations Security Council’s Resolution (UNSCR) কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা</td>
                                            <td>: {{ $dataFromFc1Form->foreigner_donor_is_verified }}</td>
                                        </tr>


                                        <tr>
                                            <td>উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা</td>
                                            <td>: {{ $dataFromFc1Form->foreigner_donor_is_affiliatedrict }}</td>
                                        </tr>
                                    </table>
                                    <div class="mb-4">

                                        <h5>যে বৈদেশিক উৎস থেকে অনুদান গ্রহণ করা হবে তার বিবরণ<br>
                                            সংস্থা ক্ষেত্রে</h5>
                                    </div>

                                    <table class="table table-bordered mb-4">
                                        <tr>
                                            <td>সংস্থার নাম</td>
                                            <td>: {{ $dataFromFc1Form->organization_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>অফিস/ সংস্থার ঠিকানা</td>
                                            <td>: {{ $dataFromFc1Form->organization_address }}</td>
                                        </tr>

                                        <tr>
                                            <td>টেলিফোন</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFc1Form->organization_telephone_number) }}</td>
                                        </tr>
                                        <tr>
                                            <td>ফ্যাক্স নম্বর</td>
                                            <td>: {{ $dataFromFc1Form->organization_fax }}</td>
                                        </tr>
                                        <tr>
                                            <td>ইমেইল</td>
                                            <td>: {{ $dataFromFc1Form->organization_email }}</td>
                                        </tr>

                                        <tr>
                                            <td>ওয়েবসাইট</td>
                                            <td>: {{ $dataFromFc1Form->organization_website }}</td>
                                        </tr>




                                        <tr>
                                            <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত United Nations Security Council’s Resolution (UNSCR) কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা</td>
                                            <td>: {{ $dataFromFc1Form->organization_is_verified }}</td>
                                        </tr>


                                        <tr>
                                            <td>উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা</td>
                                            <td>: {{ $dataFromFc1Form->relation_with_donor }}</td>
                                        </tr>

                                        <tr>
                                            <td>প্রধান নির্বাহী কর্মকর্তার নাম</td>
                                            <td>: {{ $dataFromFc1Form->organization_ceo_name }}</td>
                                        </tr>

                                        <tr>
                                            <td>প্রধান নির্বাহী কর্মকর্তার পদবি</td>
                                            <td>: {{ $dataFromFc1Form->organization_ceo_designation }}</td>
                                        </tr>

                                        <tr>
                                            <td>বাংলাদেশের জন্য দায়িত্ব প্রাপ্ত নির্বাহীর নাম</td>
                                            <td>: {{ $dataFromFc1Form->organization_name_of_executive_responsible_for_bd }}</td>
                                        </tr>

                                        <tr>
                                            <td>বাংলাদেশের জন্য দায়িত্ব প্রাপ্ত নির্বাহীর পদবি</td>
                                            <td>: {{ $dataFromFc1Form->organization_name_of_executive_responsible_for_bd_designation }}</td>
                                        </tr>


                                        <tr>
                                            <td>সংস্থার উদ্দেশ্যসমূহ</td>
                                            <td>: {{ $dataFromFc1Form->objectives_of_the_organization }}</td>
                                        </tr>

                                        <tr>
                                            <td>প্রতিশ্রুতিপত্র আছে কিনা</td>
                                            <td>: {{ $dataFromFc1Form->organization_letter_of_commitment }}</td>
                                        </tr>

                                        <tr>
                                            <td>কাজের নাম, অর্থের পরিমান ও মেয়াদকাল সুস্পষ্টভাবে উল্লেখপূর্বক কপি সংযুক্ত করতে হবে</td>
                                            <td>:<a href="{{ route('fc1PdfDownload',$dataFromFc1Form->id) }}" target="_blank" class="btn btn-success">View</a></td>
                                        </tr>

                                    </table>

                                    <div class="mb-4">

                                        <h5>অনুদানের বিস্তারিত বিবরণ</h5>
                                    </div>

                                    <table class="table table-bordered">
                                        <tr>
                                            <td>বৈদেশিক মুদ্রার পরিমান</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFc1Form->organization_amount_of_foreign_currency) }}</td>
                                        </tr>
                                        <tr>
                                            <td>সমপরিমাণ বাংলাদেশী টাকা</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFc1Form->equivalent_amount_of_bd_taka) }}</td>
                                        </tr>

                                        <tr>
                                            <td>পণ্যসামগ্রী (বাংলাদেশী মুদ্রায় আনুমানিক মূল্য)</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFc1Form->commodities_value_in_bangladeshi_currency) }}</td>
                                        </tr>




                                    </table>

                                    <div class="mb-4">

                                        <h5>ব্যাংক সংক্রান্ত তথ্যাবলী</h5>
                                    </div>

                                    <table class="table table-bordered">
                                        <tr>
                                            <td>যে ব্যাংকের মাধ্যমে বৈদেশিক অনুদান গ্রহণ করতে ইচ্ছুক তার নাম</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFc1Form->bank_name) }}</td>
                                        </tr>
                                        <tr>
                                            <td>ঠিকানা</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFc1Form->bank_address) }}</td>
                                        </tr>

                                        <tr>
                                            <td>ব্যাংক হিসাবের নাম</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFc1Form->bank_account_name) }}</td>
                                        </tr>

                                        <tr>
                                            <td>ব্যাংক হিসাব নম্বর</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromFc1Form->bank_account_number) }}</td>
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
                                            <td>: {{ $dataFromFc1Form->country_of_origin }}</td>
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
                                            <td><a href="{{ route('fc1fd2PdfDownload',$fd2FormList->id) }}" target="_blank" class="btn btn-success">View</a></td>
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
                                            <td><a href="{{ route('fc1fd2OtherPdfDownload',$fd2OtherInfoAll->id) }}" target="_blank" class="btn btn-success">View</a></td>
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
                                            <form action="{{ route('statusUpdateForFc1') }}" method="post">
                                                @csrf


                                                <input type="hidden" value="{{ $dataFromFc1Form->mainId }}" name="id" />


                                                <input type="hidden" value="{{ $get_email_from_user }}" name="email" />

                                                <label>স্টেটাস:</label>
                                                <select class="form-control form-control-sm mt-4" name="status" id="regStatus">

                                                    <option value="Ongoing" {{ $dataFromFc1Form->status == 'Ongoing' ? 'selected':''  }}>চলমান</option>

                                                    <option value="Accepted" {{ $dataFromFc1Form->status == 'Accepted' ? 'selected':''  }}>গৃহীত</option>
                                                    <option value="Correct" {{ $dataFromFc1Form->status == 'Correct' ? 'selected':''  }}>সংশোধন করুন</option>
                                                    <option value="Rejected" {{ $dataFromFc1Form->status == 'Rejected' ? 'selected':''  }}>প্রত্যাখ্যান করুন</option>

                                                </select>


                                                @if($dataFromFc1Form->status == 'Correct' || $dataFromFc1Form->status == 'Rejected')

                                                <div id="rValueStatus" >
                                                    <label>বিস্তারিত লিখুন:</label>
                                                    <textarea class="form-control form-control-sm" name="comment">{{ $dataFromFc1Form->comment }}</textarea>
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
