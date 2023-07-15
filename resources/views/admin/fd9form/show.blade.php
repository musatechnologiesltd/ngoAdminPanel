@extends('admin.master.master')

@section('title')
FD-9 (N-Visa) | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<?php
 $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
      'May','June','July','August','September','October','November','December','Saturday','Sunday',
      'Monday','Tuesday','Wednesday','Thursday','Friday');
      $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
      'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
      বুধবার','বৃহস্পতিবার','শুক্রবার'
      );



?>
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Foreign National Employment Letter Attestation Form</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">FD-09</li>
                    <li class="breadcrumb-item">FD-09 View</li>
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
                <ul class="nav nav-dark" id="pills-darktab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="pills-darkhome-tab"
                                            data-bs-toggle="pill" href="#pills-darkhome"
                                            role="tab" aria-controls="pills-darkhome"
                                            aria-selected="true" style=""><i
                                    class="icofont icofont-ui-home"></i>FD09 Form</a></li>
                    <li class="nav-item"><a class="nav-link" id="pills-darkprofile-tab"
                                            data-bs-toggle="pill" href="#pills-darkprofile"
                                            role="tab" aria-controls="pills-darkprofile"
                                            aria-selected="false" style=""><i
                                    class="icofont icofont-man-in-glasses"></i>Security
                            Clearance</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="pills-darkcontact-tab"
                                            data-bs-toggle="pill" href="#pills-darkcontact"
                                            role="tab" aria-controls="pills-darkcontact"
                                            aria-selected="false" style=""><i
                                    class="icofont icofont-contacts"></i>Forwarding
                            Letter</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="pills-darkdoc-tab"
                                            data-bs-toggle="pill" href="#pills-darkdoc"
                                            role="tab" aria-controls="pills-darkdoc"
                                            aria-selected="false" style=""><i
                                    class="icofont icofont-animal-lemur"></i>Document Send
                            to Ministry of Home Affairs</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-darktabContent">
                    <div class="tab-pane fade active show" id="pills-darkhome"
                         role="tabpanel" aria-labelledby="pills-darkhome-tab">
                        <div class="mb-0 m-t-30">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <p>Download FD-09 PDF</p>
                                            <p>এফডি-০৯ পিডিএফ ডাউনলোড করুন</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="text-center">
                                                <p>PDF Download (পিডিএফ ডাউনলোড )</p>
                                                <a class="btn btn-sm btn-success" target="_blank"
                                                       href = '{{ route('fdNinePdfDownload',$dataFromNVisaFd9Fd1->id) }}'>
                                                    Download FD09-From
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4>এফডি-৯ ফরম</h4>
                                        <h5>বিদেশি নাগরিক নিয়োগপত্র সত্যায়ন ফরম</h5>
                                    </div>
<?php
$mainValue =Carbon\Carbon::parse($ngoStatus->updated_at)->toDateString();
$formatDate = date('d-m-Y', strtotime($mainValue));
$banglaValue =str_replace($engDATE,$bangDATE,$formatDate);


?>
                                    <div>
                                        <p>বরাবর <br>
                                            মহাপরিচালক <br>
                                            এনজিও বিষয় ব্যুরো, ঢাকা <br>
                                            জনাব,</p>
                                        <p>নিম্নলখিত নিয়োগপ্রাপ্ত বিদেশি নাগরিক/নাগরিকগণকে
                                            এ সংস্থায় (নিবন্ধন নম্বরঃ{{str_replace($engDATE,$bangDATE,$dataFromNVisaFd9Fd1->registration_number)}}
                                            তারিখঃ {{$banglaValue}}) বৈদেশিক
                                            অনুদান (স্বেচ্ছাসেবামূলক কর্মকান্ড) রেগুলেশন আইন
                                            ২০১৬ অনুযায়ী নিয়োগপত্র সত্যায়ন ও
                                            এনডিসা প্রাপ্তির সুপারিশপত্র
                                            পাওয়ার জন্য আবেদন করছিঃ</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>১.</td>
                                                <td>বিদেশি নাগরিকের নাম (ইংরেজীতে Capital Letter এ)</td>
                                                <td>: {{ $dataFromNVisaFd9Fd1->fd9_foreigner_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>২.</td>
                                                <td>(ক) পিতার নাম</td>
                                                <td>: {{ $dataFromNVisaFd9Fd1->fd9_father_name }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>(খ) স্বামী/স্ত্রীর নাম</td>
                                                <td>: {{ $dataFromNVisaFd9Fd1->fd9_husband_or_wife_name }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>(গ) মাতার নাম</td>
                                                <td>: {{ $dataFromNVisaFd9Fd1->fd9_mother_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>৩.</td>
                                                <td>জন্ম স্থান ও তারিখ</td>
                                                <td>: {{ $dataFromNVisaFd9Fd1->fd9_birth_place }} ও {{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->fd9_dob))) }}</td>
                                            </tr>
                                            <tr>
                                                <td>৪.</td>
                                                <td>পাসপোর্ট নম্বর, ইস্যু ও মেয়াদোর্ত্তীণ তারিখ</td>
                                                <td>: {{ $dataFromNVisaFd9Fd1->fd9_passport_number }},{{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->fd9_passport_issue_date))) }},{{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->fd9_passport_expiration_date))) }}</td>
                                            </tr>
                                            <tr>
                                                <td>৫.</td>
                                                <td>পাসপোর্টে প্রদত্ত সনাক্তকারী চিহ্ন</td>
                                                <td>: {{ $dataFromNVisaFd9Fd1->fd9_identification_mark_given_in_passport }}</td>
                                            </tr>
                                            <tr>
                                                <td>৬.</td>
                                                <td>পুরুষ/মহিলা</td>
                                                <td>: {{ $dataFromNVisaFd9Fd1->fd9_male_or_female }}</td>
                                            </tr>
                                            <tr>
                                                <td>৭.</td>
                                                <td>বৈবাহিক অবস্থা</td>
                                                <td>: {{ $dataFromNVisaFd9Fd1->fd9_marital_status }}</td>
                                            </tr>
                                            <tr>
                                                <td>৮.</td>
                                                <td>জাতীয়তা / নাগরিকত্ব</td>
                                                <td>: {{ $dataFromNVisaFd9Fd1->fd9_nationality_or_citizenship }}</td>
                                            </tr>
                                            <tr>
                                                <td>৯.</td>
                                                <td>একাধিক নাগরিকত্ব থাকলে বিবরণ</td>
                                                <td>: {{ $dataFromNVisaFd9Fd1->fd9_details_if_multiple_citizenships }}</td>
                                            </tr>
                                            <tr>
                                                <td>১০.</td>
                                                <td>পূর্বের নাগরিকত্ব থাকলে তা বহাল না থাকার কারণ</td>
                                                <td>: {{ $dataFromNVisaFd9Fd1->fd9_previous_citizenship_is_grounds_for_non_retention }}</td>
                                            </tr>
                                            <tr>
                                                <td>১১.</td>
                                                <td>বর্তমান ঠিকানা</td>
                                                <td>: {{ $dataFromNVisaFd9Fd1->fd9_current_address }}</td>
                                            </tr>
                                            <tr>
                                                <td>১২.</td>
                                                <td>পরিবারের সদস্য সংখ্যা</td>
                                                <td>: {{ $dataFromNVisaFd9Fd1->fd9_number_of_family_members }}</td>
                                            </tr>

                                            <?php
                                            $familyData = DB::table('fd9_foreigner_employee_family_member_lists')
                   ->where('fd9_form_id',$dataFromNVisaFd9Fd1->id)->get();

                                            //dd($familyData);
                                             ?>


                                        <tr>
                                            <td>১৩.</td>
                                            <td>পরিবারের সদসাদের নাম ও বয়স (যাহারা তার সাথে
                                                থাকবেন)
                                            </td>
                                            <td>: @foreach($familyData as $key=>$allFamilyData)
                                                {{ $allFamilyData->family_member_name }},{{ $allFamilyData->family_member_age }}<br>
                                                @endforeach</td>
                                        </tr>
                                        <tr>
                                            <td>১৪.</td>
                                            <td>একাডেমিক যোগ্যতা (একাডেমিক যোগ্যতার সমর্থনে সনদপত্রের কপি সংযুক্ত করতে হবে</td>
                                            <td>:  @if(!$dataFromNVisaFd9Fd1->fd9_academic_qualification)

                                                @else


সংযুক্ত
                                                 @endif
                                                </td>
                                        </tr>
                                        <tr>
                                            <td>১৫.</td>
                                            <td>কারিগরি ও অন্যান্য যোগ্যতা যদি থাকে (প্রাসঙ্গিক সনদপত্রের কপি সংযুক্ত করতে
                                                হবে)
                                            </td>
                                            <td>: @if(!$dataFromNVisaFd9Fd1->fd9_technical_and_other_qualifications_if_any)

                                                @else


সংযুক্ত
                                                 @endif</td>
                                        </tr>
                                        <tr>
                                            <td>১৬.</td>
                                            <td>অতীত অভিজ্ঞতা এবং যে কাজে তাঁকে নিয়োগ দেয়া হচ্ছে তাতে তার দক্ষতা (প্রমাণকসহ)
                                            </td>
                                            <td>: @if(!$dataFromNVisaFd9Fd1->fd9_past_experience)

                                                @else


সংযুক্ত
                                                 @endif</td>
                                        </tr>
                                        <tr>
                                            <td>১৭.</td>
                                            <td>যে সব দেশ ভ্রমণ করেছেন (কর্মসংস্থানের জন্য)</td>
                                            <td>: {{ $dataFromNVisaFd9Fd1->fd9_countries_that_have_traveled }}</td>
                                        </tr>
                                        <tr>
                                            <td>১৮.</td>
                                            <td>যে পদের জন্য নিয়োগ প্রস্তাব দেয়া হয়েছে : (নিয়োগপত্র কপি ও চুক্তিপত্র সংযুক্ত
                                                করতে হবে)
                                            </td>
                                            <td>:  @if(!$dataFromNVisaFd9Fd1->fd9_offered_post)

                                                @else


সংযুক্ত
                                                 @endif</td>
                                        </tr>
                                        <tr>
                                            <td>১৯.</td>
                                            <td>যে প্রকল্পে তাকে নিয়োগের প্রস্থাব করা হয়েছে তার নাম ও মেয়াদ ব্যুরোর অনুমোদন
                                                পত্র সংযুক্ত করতে হবে)
                                            </td>
                                            <td>: @if(!$dataFromNVisaFd9Fd1->fd9_name_of_proposed_project)

                                                @else


সংযুক্ত
                                                 @endif</td>
                                        </tr>
                                        <tr>
                                            <td>২০.</td>
                                            <td>নিয়োগের যে তারিখ নির্ধারণ করা হয়েছে</td>
                                            <td>: {{ $dataFromNVisaFd9Fd1->fd9_date_of_appointment }}</td>
                                        </tr>
                                        <tr>
                                            <td>২১.</td>
                                            <td>এক্সটেনশন হয়ে থাকলে তার সময়কাল</td>
                                            <td>: {{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->fd9_extension_date))) }}</td>
                                        </tr>
                                        <tr>
                                            <td>২২.</td>
                                            <td>এ প্রকল্পে কতজন বিদেশির পদের সংস্থান রয়েছে এবং কর্মরত কতজন</td>
                                            <td>: {{ $dataFromNVisaFd9Fd1->fd9_post_available_for_foreigner_and_working }}</td>
                                        </tr>
                                        <tr>
                                            <td>২৩.</td>
                                            <td>বাংলাদেশের ইতঃপূর্বে অন্যকোন সংস্থায় কাজ করেছিলেন কিনা তার বিবরণ</td>
                                            <td>: {{ $dataFromNVisaFd9Fd1->fd9_previous_work_experience_in_bangladesh }}</td>
                                        </tr>
                                        <tr>
                                            <td>২৪.</td>
                                            <td>সংস্থায় বর্তমানে কতজন বিদেশি নাগরিক কর্মরত আছেন</td>
                                            <td>: {{ $dataFromNVisaFd9Fd1->fd9_total_foreigner_working }}</td>
                                        </tr>
                                        <tr>
                                            <td>২৫.</td>
                                            <td>অন্য কোন তথ্য (যদি থাকে)</td>
                                            <td>: {{ $dataFromNVisaFd9Fd1->fd9_other_information }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>বিদেশি নাগরিকের পাসপোর্ট সাইজের ছবি</td>
                                            <td>: @if(!$dataFromNVisaFd9Fd1->fd9_foreigner_passport_size_photo)

                                                @else

                                                <img src="{{ $ins_url }}{{ $dataFromNVisaFd9Fd1->fd9_foreigner_passport_size_photo }}" alt="" style="height:40px;" id="output">

@endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>পাসপোর্টের কপি সংযুক্ত</td>
                                            <td>:  @if(!$dataFromNVisaFd9Fd1->fd9_copy_of_passport)

                                                @else


সংযুক্ত
                                                 @endif</td>
                                        </tr>
                                        </tbody>
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
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="others_inner_section">
                                                <h5>নিরাপত্তা ছাড়পত্রের জন্য আবেদন</h5>
                                                <div class="notice_underline"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                            সাধারণ তথ্য
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-9 col-sm-12">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td>প্রস্তাবিত অনুমোদনের সময়কাল</td>
                                                            <td>:{{ $dataFromNVisaFd9Fd1->period_validity }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>কার্যকর এর তারিখ</td>
                                                            <td>:{{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->permit_efct_date))) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>জারি করা ওয়ার্ক পারমিট এর রেফারেন্স নং</td>
                                                            <td>:{{ $dataFromNVisaFd9Fd1->visa_ref_no }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ভিসার সুপারিশ পত্র</td>
                                                            <td>:{{ $dataFromNVisaFd9Fd1->visa_recomendation_letter_received_way	 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ভিসার সুপারিশ পত্রের রেফারেন্স নং</td>
                                                            <td>:{{ $dataFromNVisaFd9Fd1->visa_recomendation_letter_ref_no	 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ডিপার্টমেন্ট</td>
                                                            <td>:{{ $dataFromNVisaFd9Fd1->department_in	 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ওয়ার্ক পারমিটের ধরন</td>
                                                            <td>:{{ $dataFromNVisaFd9Fd1->visa_category	 }}</td>
                                                        </tr>

                                                    </table>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <div class="nvisa-avatar">
                                                        @if(!$dataFromNVisaFd9Fd1->applicant_photo)
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" style="height: 80px;" alt="">
                                                        @else
                                                        <img src="{{ $ins_url }}{{ $dataFromNVisaFd9Fd1->applicant_photo }}" style="height: 80px;" alt="">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                            ক . স্পনসর/নিয়োগকর্তার বিশেষ বিবরণ
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td colspan="2">এন্টারপ্রাইজের নাম (সংস্থা/কোম্পানী) : {{ $nVisaSponSor->org_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="background-color: #d4d4d4">এন্টারপ্রাইজের ঠিকানা (শুধুমাত্র বাংলাদেশ)</td>
                                                </tr>
                                                <tr>
                                                    <td>বাড়ি/প্লট/হোল্ডিং/গ্রাম: {{ $nVisaSponSor->org_house_no }}  </td>
                                                    <td>ফ্ল্যাট/অ্যাপার্টমেন্ট/ফ্লোর: {{ $nVisaSponSor->org_flat_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>রাস্তার নম্বর: {{ $nVisaSponSor->org_road_no }}</td>
                                                    <td>পোস্ট/জিপ কোড: {{ $nVisaSponSor->org_post_code }}</td>
                                                </tr>
                                                <tr>
                                                    <td>পোস্ট অফিস: {{ $nVisaSponSor->org_post_office }}</td>
                                                    <td>টেলিফোন নম্বর: {{ $nVisaSponSor->org_phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>শহর/জেলা: {{ $nVisaSponSor->org_district }}</td>
                                                    <td>থানা/উপজেলা: {{ $nVisaSponSor->org_thana }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ফ্যাক্স নম্বর: {{ $nVisaSponSor->org_fax_no }}</td>
                                                    <td>ইমেল: {{ $nVisaSponSor->org_email }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">সংগঠনের ধরন: এনজিও</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">ব্যবসার প্রকৃতি: {{ $nVisaSponSor->nature_of_business }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">স্বীকৃত মূলধন: {{ $nVisaSponSor->authorized_capital }}</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2">পরিশোধিত মূলধন: {{ $nVisaSponSor->paid_up_capital }}</td>
                                                </tr>
                                                <tr>
                                                    <td>গত ১২ মাসে প্রাপ্ত রেমিট্যান্স: {{ $nVisaSponSor->remittance_received }}</td>
                                                    <td>শিল্পের ধরন:এনজিও </td>
                                                </tr>
                                                <tr>
                                                    <td>কোম্পানি বোর্ডের সুপারিশ: {{ $nVisaSponSor->recommendation_of_company_board }}</td>
                                                    <td>স্থানীয়, বিদেশী বা যৌথ উদ্যোগ কোম্পানি কিনা: {{ $nVisaSponSor->company_share }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                            খ. বিদেশী দায়িত্বশীল এর বিশেষ বিবরণ
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td colspan="2">বিদেশী নাগরিকের নাম: {{ $nVisaForeignerInfo->name_of_the_foreign_national }}</td>
                                                </tr>
                                                <tr>
                                                    <td>জাতীয়তা: {{ $nVisaForeignerInfo->nationality  }}</td>
                                                    <td>পাসপোর্ট নম্বর: {{ $nVisaForeignerInfo->passport_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ইস্যু তারিখ : {{ $nVisaForeignerInfo->passport_issue_date }}</td>
                                                    <td>ইস্যু স্থান: {{ $nVisaForeignerInfo->passport_issue_place }} </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">মেয়াদ শেষ হওয়ার তারিখ: {{ $nVisaForeignerInfo->passport_expiry_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="background-color: #d4d4d4">স্থায়ী ঠিকানা</td>
                                                </tr>
                                                <tr>
                                                    <td>দেশ: {{ $nVisaForeignerInfo->home_country }}</td>
                                                    <td>বাড়ি/প্লট/হোল্ডিং নম্বর: {{ $nVisaForeignerInfo->house_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ফ্ল্যাট/অ্যাপার্টমেন্ট/ফ্লোর নম্বর: {{ $nVisaForeignerInfo->flat_no }}</td>
                                                    <td>রাস্তার নাম/রাস্তার নম্বর: {{ $nVisaForeignerInfo->road_no }} </td>
                                                </tr>
                                                <tr>
                                                    <td><b></b> </td>
                                                    <td><b></b> </td>
                                                </tr>
                                                <tr>
                                                    <td>পোস্ট/জিপ কোড: {{ $nVisaForeignerInfo->post_code }}</td>
                                                    <td>রাজ্য/প্রদেশ: {{ $nVisaForeignerInfo->state }}</td>
                                                </tr>
                                                <tr>
                                                    <td>টেলিফোন নম্বর: {{ $nVisaForeignerInfo->phone }}</td>
                                                    <td>শহর: {{ $nVisaForeignerInfo->city }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ফ্যাক্স নম্বর:  {{ $nVisaForeignerInfo->fax_no }}</td>
                                                    <td>ইমেল: {{ $nVisaForeignerInfo->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>জন্ম তারিখ: {{ $nVisaForeignerInfo->date_of_birth }}</td>
                                                    <td>বৈবাহিক অবস্থা: {{ $nVisaForeignerInfo->martial_status }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                            গ.কর্মসংস্থান এর তথ্য
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>নিয়োগকৃত পদের নাম (পদবী): {{ $nVisaEmploye->employed_designation }}</td>
                                                    <td>বাংলাদেশে আগমনের তারিখ:  {{ $nVisaEmploye->date_of_arrival_in_bangladesh }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ভিসার ধরন: N-Visa </td>
                                                    <td>প্রথম নিয়োগের তারিখ: {{ $nVisaEmploye->first_appoinment_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td>কাঙ্খিত কার্যকরী তারিখ: {{ $nVisaEmploye->desired_effective_date }}</td>
                                                    <td>শেষ তারিখ: {{ $nVisaEmploye->desired_end_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td>পছন্দসই সময়কাল: {{ $nVisaEmploye->visa_validity }}</td>
                                                    <td>সংক্ষিপ্ত কাজের বিবরণ: {{ $nVisaEmploye->brief_job_description }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">কর্মচারী ন্যায্যতা: {{ $nVisaEmploye->employee_justification }} </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                            ঘ. কর্মস্থলের ঠিকানা
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>বাড়ি/প্লট/হোল্ডিং/গ্রাম:  {{ $nVisaWorkPlace->work_house_no }}</td>
                                                    <td>ফ্ল্যাট/অ্যাপার্টমেন্ট/ফ্লোর: {{ $nVisaWorkPlace->work_flat_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>রাস্তার নম্বর: {{ $nVisaWorkPlace->work_road_no }} </td>
                                                    <td>শহর/জেলা: {{ $nVisaWorkPlace->work_district }}</td>
                                                </tr>
                                                <tr>
                                                    <td>থানা/উপজেলা: {{ $nVisaWorkPlace->work_thana }} </td>
                                                    <td>ইমেইল: {{ $nVisaWorkPlace->work_email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>প্রতিষ্ঠানের ধরন: এনজিও</td>
                                                    <td>যোগাযোগ ব্যক্তির মোবাইল নম্বর: {{ $nVisaWorkPlace->contact_person_mobile_number }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>


                                    <?php

$annual =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->where('salary_category','Annual Bonus')->first();

$medical =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->where('salary_category','Medical Allowance')->first();

$entertainment =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->where('salary_category','Entertainment Allowance')->first();


$convoy =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->where('salary_category','Conveyance')->first();

$house =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->where('salary_category','House Rent')->first();

$overseas =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->where('salary_category','Overseas Allowance')->first();


$basic =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->where('salary_category','Basic Salary')->first();


$mainDatac =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$dataFromNVisaFd9Fd1->nVisaId)->first();



?>

<!--compansation --->

@if(!$mainDatac)
<div class="card mt-3 ">
    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
        ঙ. ক্ষতিপূরণ এবং বেনিফিট
    </div>
    <div class="card-body">
        কোন তথ্য নেই
    </div>
</div>
@else
<div class="card mt-3 ">
    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
        ঙ. ক্ষতিপূরণ এবং বেনিফিট
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <td><b>বেতন কাঠামো</b></td>
                <td colspan="3"><b>স্থানীয়ভাবে প্রদেয়</b></td>
            </tr>
            <tr>
                <td></td>
                <td>পারিশ্রমিক</td>
                <td>পরিমাণ</td>
                <td>মুদ্রা</td>
            </tr>
            <tr>
                <td>ক. মূল বেতন</td>
                <td>{{ $basic->payment_type }}</td>
                <td>{{ $basic->amount }}</td>
                <td>{{ $basic->currency }}</td>
            </tr>
            <tr>
                <td>খ. বিদেশী ভাতা</td>
                <td>{{ $overseas->payment_type }}</td>
                <td>{{ $overseas->amount }}</td>
                <td>{{ $overseas->currency }}</td>
            </tr>
            <tr>
                <td>গ. বাড়ি ভাড়া/বাসস্থান</td>
                <td>{{ $house->payment_type }}</td>
                <td>{{ $house->amount }}</td>
                <td>{{ $house->currency }}</td>
            </tr>
            <tr>
                <td>ঘ. পরিবহন</td>
                <td>{{ $convoy->payment_type }}</td>
                <td>{{ $convoy->amount }}</td>
                <td>{{ $convoy->currency }}</td>
            </tr>
            <tr>
                <td>ঙ. বিনোদন ভাতা</td>
                <td>{{ $entertainment->payment_type }}</td>
                <td>{{ $entertainment->amount }}</td>
                <td>{{ $entertainment->currency }}</td>
            </tr>
            <tr>
                <td>চ. চিকিৎসা ভাতা</td>
                <td>{{ $medical->payment_type }}</td>
                <td>{{ $medical->amount }}</td>
                <td>{{ $medical->currency }}</td>
            </tr>
            <tr>
                <td>ছ. বার্ষিক বোনাস</td>
                <td>{{ $annual->payment_type }}</td>
                <td>{{ $annual->amount }}</td>
                <td>{{ $annual->currency }}</td>
            </tr>
            <tr>
                <td>জ. অন্যান্য প্রান্তিক সুবিধা, যদি থাকে</td>
                <td colspan="3">{{ $dataFromNVisaFd9Fd1->other_benefit }}</td>
            </tr>
            <tr>
                <td>ঝ. কোনো বিশেষ মন্তব্য</td>
                <td colspan="3">{{ $dataFromNVisaFd9Fd1->salary_remarks }}</td>
            </tr>
        </table>
    </div>
</div>

@endif


<!--end compansation -->



                                    <div class="card mt-3 ">
                                        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                            চ. অফিসের জনবল
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td colspan="3"><b>স্থানীয় (ক)</b></td>
                                                    <td colspan="3"><b>বিদেশী (খ)</b></td>
                                                    <td rowspan="2"><b>সর্বমোট
                                                        (ক+খ)</b></td>
                                                    <td colspan="2"><b>অনুপাত</b></td>
                                                </tr>
                                                <tr>
                                                    <td>এক্সিকিউটিভ</td>
                                                    <td>সাপোর্টিং স্টাফ</td>
                                                    <td>মোট</td>
                                                    <td>এক্সিকিউটিভ</td>
                                                    <td>সাপোর্টিং স্টাফ</td>
                                                    <td>মোট</td>
                                                    <td>স্থানীয়</td>
                                                    <td>বিদেশী</td>
                                                </tr>
                                                @if(!$nVisaManPower)
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <td>{{ $nVisaManPower->local_executive }}</td>
                                                    <td>{{ $nVisaManPower->local_supporting_staff }}</td>
                                                    <td>{{ $nVisaManPower->local_total }}</td>
                                                    <td>{{ $nVisaManPower->foreign_executive }}</td>
                                                    <td>{{ $nVisaManPower->foreign_supporting_staff }}</td>
                                                    <td>{{ $nVisaManPower->foreign_total }}</td>
                                                    <td>{{ $nVisaManPower->gand_total }}</td>
                                                    <td>{{ $nVisaManPower->local_ratio }}</td>
                                                    <td>{{ $nVisaManPower->foreign_ratio }}</td>
                                                </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                            ছ. ওয়ার্ক পারমিটের জন্য প্রয়োজনীয় নথি (পিডিএফ)
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <th>#</th>
                                                    <th>প্রয়োজনীয় সংযুক্তি</th>
                                                    <th>সংযুক্ত ফাইল (পিডিএফ)</th>
                                                </tr>
                                                @if(!$nVisaDocs)

                                                <tr>
                                                    <td>১</td>
                                                    <td>ক্রেতার প্রতিনিধি নিয়োগের ক্ষেত্রে ক্রেতার মনোনয়ন পত্রের অনুলিপি</td>
                                                    <td>




                                                        <button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button>


                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>২</td>
                                                    <td>বিনিয়োগ বোর্ডের নিবন্ধন পত্রের অনুলিপি, যদি আগে জমা না দেওয়া হয়</td>
                                                    <td><button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button></td>
                                                </tr>
                                                <tr>
                                                    <td>৩</td>
                                                    <td>কর্মচারীর ক্ষেত্রে পরিষেবা চুক্তি/চুক্তি/নিয়োগ পত্রের অনুলিপি</td>
                                                    <td><button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button></td>
                                                </tr>
                                                <tr>
                                                    <td>৪</td>
                                                    <td>বিদেশী নাগরিকদের নিয়োগ সংক্রান্ত কোম্পানির পরিচালক পর্ষদের সিদ্ধান্ত (সীমিত কোম্পানির ক্ষেত্রে) বেতন এবং অন্যান্য সুবিধা দেখায় শুধুমাত্র সভায় উপস্থিত পরিচালকদের দ্বারা স্বাক্ষরিত কোম্পানির</td>
                                                    <td><button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button></td>
                                                </tr>
                                                <tr>
                                                    <td>৫</td>
                                                    <td>মেমোরেন্ডাম এবং আর্টিকেল অফ অ্যাসোসিয়েশন শেয়ারহোল্ডারদের দ্বারা যথাযথভাবে স্বাক্ষরিত এবং অন্তর্ভুক্তির শংসাপত্র সহ (লিমিটেড কোম্পানির ক্ষেত্রে), যদি আগে জমা না দেওয়া হয়</td>
                                                    <td><button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button></td>
                                                </tr>
                                                <tr>
                                                    <td>৬</td>
                                                    <td>কর্মচারীদের জন্য ই-টাইপ ভিসা সহ পাসপোর্টের ফটোকপি/বিনিয়োগকারীদের জন্য পিআই-টাইপ ভিসা</td>
                                                    <td><button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button></td>
                                                </tr>

                                                @else


                                                <tr>
                                                    <td>১</td>
                                                    <td>ক্রেতার প্রতিনিধি নিয়োগের ক্ষেত্রে ক্রেতার মনোনয়ন পত্রের অনুলিপি</td>
                                                    <td>


                                                       @if(empty($nVisaDocs->nomination_letter_of_buyer))


                                                       @else

                                                        <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'nomination','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                        @endif


                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>২</td>
                                                    <td>বিনিয়োগ বোর্ডের নিবন্ধন পত্রের অনুলিপি, যদি আগে জমা না দেওয়া হয়</td>
                                                    <td>

                                                        @if(empty($nVisaDocs->registration_letter_of_board_of_investment))


                                                        @else

                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'investment','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>৩</td>
                                                    <td>কর্মচারীর ক্ষেত্রে পরিষেবা চুক্তি/চুক্তি/নিয়োগ পত্রের অনুলিপি</td>
                                                    <td>

                                                        @if(empty($nVisaDocs->employee_contract_copy))


                                                        @else

                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'contract','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>৪</td>
                                                    <td>বিদেশী নাগরিকদের নিয়োগ সংক্রান্ত কোম্পানির পরিচালক পর্ষদের সিদ্ধান্ত (সীমিত কোম্পানির ক্ষেত্রে) বেতন এবং অন্যান্য সুবিধা দেখায় শুধুমাত্র সভায় উপস্থিত পরিচালকদের দ্বারা স্বাক্ষরিত কোম্পানির</td>
                                                    <td>

                                                        @if(empty($nVisaDocs->board_of_the_directors_sign_lette))


                                                        @else

                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'directors','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>৫</td>
                                                    <td>মেমোরেন্ডাম এবং আর্টিকেল অফ অ্যাসোসিয়েশন শেয়ারহোল্ডারদের দ্বারা যথাযথভাবে স্বাক্ষরিত এবং অন্তর্ভুক্তির শংসাপত্র সহ (লিমিটেড কোম্পানির ক্ষেত্রে), যদি আগে জমা না দেওয়া হয়</td>
                                                    <td>
                                                        @if(empty($nVisaDocs->share_holder_copy))


                                                        @else

                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'shareHolder','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>৬</td>
                                                    <td>কর্মচারীদের জন্য ই-টাইপ ভিসা সহ পাসপোর্টের ফটোকপি/বিনিয়োগকারীদের জন্য পিআই-টাইপ ভিসা</td>
                                                    <td>
                                                        @if(empty($nVisaDocs->passport_photocopy))


                                                        @else

                                                         <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'passportCopy','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif
                                                    </td>
                                                </tr>


                                                @endif
                                                </tbody></table>
                                        </div>
                                    </div>
                                    <div class="card mt-3 ">
                                        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                            জ. প্রতিষ্ঠানের অনুমোদিত ব্যক্তি
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>প্রতিষ্ঠানের নাম: {{ $nVisaAuthPerson->auth_person_org_name }}</td>
                                                    <td>প্রতিষ্ঠানের বাড়ি নম্বর: {{ $nVisaAuthPerson->auth_person_org_house_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>প্রতিষ্ঠানের ফ্ল্যাট নং: {{ $nVisaAuthPerson->auth_person_org_flat_no }}</td>
                                                    <td>প্রতিষ্ঠানের রোড নং: {{ $nVisaAuthPerson->auth_person_org_road_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>প্রতিষ্ঠানের থানা: {{ $nVisaAuthPerson->auth_person_org_thana }}</td>
                                                    <td>প্রতিষ্ঠানের ডাকঘর: {{ $nVisaAuthPerson->auth_person_org_post_office }}</td>
                                                </tr>
                                                <tr>
                                                    <td>প্রতিষ্ঠানের জেলা: {{ $nVisaAuthPerson->auth_person_org_district }}</td>
                                                    <td>প্রতিষ্ঠানের মোবাইল: {{ $nVisaAuthPerson->auth_person_org_mobile }}</td>
                                                </tr>
                                                <tr>
                                                    <td>জমা দেওয়ার তারিখ:  {{ $nVisaAuthPerson->submission_date }}</td>
                                                    <td>প্রবাসীর নাম: {{ $nVisaAuthPerson->expatriate_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>প্রবাসী ইমেইল: {{ $nVisaAuthPerson->expatriate_email }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-darkcontact" role="tabpanel"
                         aria-labelledby="pills-darkcontact-tab">
                        <div class="mb-0 m-t-30">

                            <?php


                            $forwardingLetterData =DB::table('forwarding_letters')
            ->where('fd9_form_id',$dataFromNVisaFd9Fd1->id)->first();



                            ?>
                            @if (is_null($forwardingLetterData))
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="custom-validation" action="{{ route('forwardingLetterPost') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label"
                                                           for="exampleFormControlInput1">Memorial no
                                                        (স্মারক নম্বর)</label>
                                                    <input class="form-control" name="sarok_number" required id="" type="text"
                                                           placeholder="13456798">

                                                           <input class="form-control" value="{{ $dataFromNVisaFd9Fd1->id }}" name="fd9_id" required id="" type="hidden"
                                                           placeholder="13456798">


                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label"
                                                           for="exampleFormControlInput1">assign officer
                                                        (দায়িত্বপ্রাপ্ত কর্মকর্তা) </label>
                                                        <input class="form-control" value="{{ Auth::guard('admin')->user()->admin_name }}"  id="" type="text"
                                                        placeholder="দায়িত্বপ্রাপ্ত কর্মকর্তা" readonly>
                                                        <input class="form-control" value="{{ Auth::guard('admin')->user()->id }}"  name="admin_id" type="hidden"
                                                        placeholder="দায়িত্বপ্রাপ্ত কর্মকর্তা" readonly>
                                                </div>
                                                <div class="mb-3">

                                                        <div class="col-md-12">

                                                            <table class="table table-bordered" id="dynamicAddRemove">
                                                                <tr>
                                                                    <th>Copy
                                                                        (অনুলিপি)</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                <tr>
                                                                    <td><input required type="text" name="name[]" placeholder="Enter Ename" id="name0" class="form-control" />
                                                                    </td>
                                                                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-sm btn-outline-primary">Add </button></td>
                                                                </tr>
                                                            </table>

                                                        </div>
                                                </div>


                                        </div>
                                        <div class="card-footer text-end">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>

                            </div>
                            @else
                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tbody>
                                                <tr>
                                                    <td>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</td>
                                                </tr>
                                                <tr>
                                                    <td>এনজিও বিষয়ক ব্যুরো</td>
                                                </tr>
                                                <tr>
                                                    <td>প্রধানমন্ত্রীর কার্যালয়</td>
                                                </tr>
                                                <tr>
                                                    <td>প্লট-ই, ১৩/বি, আগারগাঁও</td>
                                                </tr>
                                                <tr>
                                                    <td>শেরেবাংলা নগর, ঢাকা-১২০৭</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="pt-4">
                                                <table class="table table-borderless pt-4">
                                                    <tbody>
                                                    <tr>
                                                        <td>স্মারক নং- {{ str_replace($engDATE,$bangDATE,$forwardingLetterData->sarok_number) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>বিষয় : {{ $dataFromNVisaFd9Fd1->organization_name_ban }} নামীয় সংস্থার বিদেশী নাগরিক নিয়োগে
                                                            ছাড়পত্র প্রধানে
                                                            মতামত।
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-5">সূত্র: সংস্থার {{ str_replace($engDATE,$bangDATE,$forwardingLetterData->apply_date) }} {{ str_replace($engDATE,$bangDATE,$forwardingLetterData->apply_month_name ) }} {{ str_replace($engDATE,$bangDATE,$forwardingLetterData->apply_year_name) }}
                                                            তারিখের আবেদন।
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="pt-4">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                    <tr>
                                                        <td>উপযুক্ত বিষয় ও সূত্রস্থ পত্রের পরিপ্রেক্ষিতে
                                                            বর্ণিত সংস্থায়
                                                            নিয়োগের নিমিত্ত নিম্নবর্ণিত বিদেশী নাগরিকের
                                                            নিয়োগ/নিরাপত্তা
                                                            ছাড়পত্রের বিষয়ে প্রধানমন্ত্রীর কার্যালয়ের ২৫
                                                            নভেম্বর, ২০২১
                                                            তারিখের পরিপত্রের নির্দেশ মোতাবেক সুরক্ষা সেবা
                                                            বিভাগের মতামত
                                                            এনজিও বিষয়ক ব্যুরোতে প্রেরণের জন্য নির্দেশক্রমে
                                                            অনুরোধ করা
                                                            হলো।
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="row pt-4">
                                                <div class="col-lg-6">
                                                    <table class="table table-borderless">
                                                        <tbody>
                                                        <tr>
                                                            <td>বিদেশী নাম ও পদবী</td>
                                                            <td>: {{ $nVisaForeignerInfo->name_of_the_foreign_national }} , {{ $nVisaEmploye->employed_designation }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>জাতীয়তা</td>
                                                            <td>: {{ $nVisaForeignerInfo->nationality }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>পাসপোর্ট নম্বর</td>
                                                            <td>: {{ $nVisaForeignerInfo->passport_no }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>সংযুক্ত</td>
                                                            <td>:
                                                                <button class="btn btn-outline-success"><i
                                                                            class="fa fa-file-pdf-o"></i>
                                                                    Open
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-lg-6"></div>
                                            </div>

                                            <div class="pt-4">

                                                <?php
                 $designationName = DB::table('designation_lists')
                 ->where('id',Auth::guard('admin')->user()->designation_list_id)
                 ->value('designation_name');

                 $branchName = DB::table('branches')
                 ->where('id',Auth::guard('admin')->user()->branch_id)
                 ->value('branch_name');

                 $onuLipiList = DB::table('forwarding_letter_onulipis')
                 ->where('forwarding_letter_id',$forwardingLetterData->id)->get();



            ?>

                                                <table class="table table-borderless">
                                                    <tbody>
                                                    <tr>
                                                        <td>{{ Auth::guard('admin')->user()->admin_name_ban }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ $designationName }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ $branchName }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>ফোন: ৫৫০০৭৩৯৪</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="pt-4">
                                                <table class="table table-borderless"
                                                       style="text-align:right">
                                                    <tbody>
                                                    <tr>
                                                        <td>সচিব</td>
                                                    </tr>
                                                    <tr>
                                                        <td>সুরক্ষা সেবা বিভাগ</td>
                                                    </tr>
                                                    <tr>
                                                        <td> স্বরাষ্ট্র মন্ত্রণালয়</td>
                                                    </tr>
                                                    <tr>
                                                        <td>বাংলাদেশ সচিবালয় , ঢাকা।</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <table class="table table-borderless">
                                                <tbody>
                                                <tr>
                                                    <td>অনুলিপি:</td>
                                                </tr>
                                                @foreach($onuLipiList as  $key=>$allOnuLipiList)
                                                <tr>
                                                    <td>{{ str_replace($engDATE,$bangDATE,$key+1) }}। {{$allOnuLipiList->onulipi_name}}।
                                                    </td>
                                                </tr>
                                                @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-darkdoc" role="tabpanel"
                         aria-labelledby="pills-darkdoc-tab">
                        <div class="mb-0 m-t-30">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h5>Documents Send to Ministry of Home Affairs</h5>
                                    <span>Please explore all the documents before sent to Ministry of Home Affairs</span>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>File name</th>
                                            <th>File view</th>
                                        </tr>
                                        @if(!$nVisaDocs)

                                                <tr>
                                                    <td>১</td>
                                                    <td>ক্রেতার প্রতিনিধি নিয়োগের ক্ষেত্রে ক্রেতার মনোনয়ন পত্রের অনুলিপি</td>
                                                    <td>




                                                        <button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button>


                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>২</td>
                                                    <td>বিনিয়োগ বোর্ডের নিবন্ধন পত্রের অনুলিপি, যদি আগে জমা না দেওয়া হয়</td>
                                                    <td><button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button></td>
                                                </tr>
                                                <tr>
                                                    <td>৩</td>
                                                    <td>কর্মচারীর ক্ষেত্রে পরিষেবা চুক্তি/চুক্তি/নিয়োগ পত্রের অনুলিপি</td>
                                                    <td><button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button></td>
                                                </tr>
                                                <tr>
                                                    <td>৪</td>
                                                    <td>বিদেশী নাগরিকদের নিয়োগ সংক্রান্ত কোম্পানির পরিচালক পর্ষদের সিদ্ধান্ত (সীমিত কোম্পানির ক্ষেত্রে) বেতন এবং অন্যান্য সুবিধা দেখায় শুধুমাত্র সভায় উপস্থিত পরিচালকদের দ্বারা স্বাক্ষরিত কোম্পানির</td>
                                                    <td><button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button></td>
                                                </tr>
                                                <tr>
                                                    <td>৫</td>
                                                    <td>মেমোরেন্ডাম এবং আর্টিকেল অফ অ্যাসোসিয়েশন শেয়ারহোল্ডারদের দ্বারা যথাযথভাবে স্বাক্ষরিত এবং অন্তর্ভুক্তির শংসাপত্র সহ (লিমিটেড কোম্পানির ক্ষেত্রে), যদি আগে জমা না দেওয়া হয়</td>
                                                    <td><button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button></td>
                                                </tr>
                                                <tr>
                                                    <td>৬</td>
                                                    <td>কর্মচারীদের জন্য ই-টাইপ ভিসা সহ পাসপোর্টের ফটোকপি/বিনিয়োগকারীদের জন্য পিআই-টাইপ ভিসা</td>
                                                    <td><button class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </button></td>
                                                </tr>

                                                @else


                                                <tr>
                                                    <td>১</td>
                                                    <td>ক্রেতার প্রতিনিধি নিয়োগের ক্ষেত্রে ক্রেতার মনোনয়ন পত্রের অনুলিপি</td>
                                                    <td>


                                                       @if(empty($nVisaDocs->nomination_letter_of_buyer))


                                                       @else

                                                        <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'nomination','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                        @endif


                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>২</td>
                                                    <td>বিনিয়োগ বোর্ডের নিবন্ধন পত্রের অনুলিপি, যদি আগে জমা না দেওয়া হয়</td>
                                                    <td>

                                                        @if(empty($nVisaDocs->registration_letter_of_board_of_investment))


                                                        @else

                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'investment','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>৩</td>
                                                    <td>কর্মচারীর ক্ষেত্রে পরিষেবা চুক্তি/চুক্তি/নিয়োগ পত্রের অনুলিপি</td>
                                                    <td>

                                                        @if(empty($nVisaDocs->employee_contract_copy))


                                                        @else

                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'contract','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>৪</td>
                                                    <td>বিদেশী নাগরিকদের নিয়োগ সংক্রান্ত কোম্পানির পরিচালক পর্ষদের সিদ্ধান্ত (সীমিত কোম্পানির ক্ষেত্রে) বেতন এবং অন্যান্য সুবিধা দেখায় শুধুমাত্র সভায় উপস্থিত পরিচালকদের দ্বারা স্বাক্ষরিত কোম্পানির</td>
                                                    <td>

                                                        @if(empty($nVisaDocs->board_of_the_directors_sign_lette))


                                                        @else

                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'directors','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>৫</td>
                                                    <td>মেমোরেন্ডাম এবং আর্টিকেল অফ অ্যাসোসিয়েশন শেয়ারহোল্ডারদের দ্বারা যথাযথভাবে স্বাক্ষরিত এবং অন্তর্ভুক্তির শংসাপত্র সহ (লিমিটেড কোম্পানির ক্ষেত্রে), যদি আগে জমা না দেওয়া হয়</td>
                                                    <td>
                                                        @if(empty($nVisaDocs->share_holder_copy))


                                                        @else

                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'shareHolder','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>৬</td>
                                                    <td>কর্মচারীদের জন্য ই-টাইপ ভিসা সহ পাসপোর্টের ফটোকপি/বিনিয়োগকারীদের জন্য পিআই-টাইপ ভিসা</td>
                                                    <td>
                                                        @if(empty($nVisaDocs->passport_photocopy))


                                                        @else

                                                         <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'passportCopy','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                         @endif
                                                    </td>
                                                </tr>


                                                @endif

                                                <tr>
                                                    <td>৭</td>
                                                    <td>একাডেমিক যোগ্যতা (একাডেমিক যোগ্যতার সমর্থনে সনদপত্রের কপি সংযুক্ত করতে হবে</td>
                                                    <td>:  @if(!$dataFromNVisaFd9Fd1->fd9_academic_qualification)

                                                        @else


                                                        <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'academicQualification','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                                                         @endif
                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td>৮</td>
                                                    <td>কারিগরি ও অন্যান্য যোগ্যতা যদি থাকে (প্রাসঙ্গিক সনদপত্রের কপি সংযুক্ত করতে
                                                        হবে)
                                                    </td>
                                                    <td>: @if(!$dataFromNVisaFd9Fd1->fd9_technical_and_other_qualifications_if_any)

                                                        @else


                                                        <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'techQualification','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                                                         @endif</td>
                                                </tr>
                                                <tr>
                                                    <td>৯</td>
                                                    <td>অতীত অভিজ্ঞতা এবং যে কাজে তাঁকে নিয়োগ দেয়া হচ্ছে তাতে তার দক্ষতা (প্রমাণকসহ)
                                                    </td>
                                                    <td>: @if(!$dataFromNVisaFd9Fd1->fd9_past_experience)

                                                        @else


                                                        <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'pastExperience','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                                                         @endif</td>
                                                </tr>

                                                <tr>
                                                    <td>১০</td>
                                                    <td>যে পদের জন্য নিয়োগ প্রস্তাব দেয়া হয়েছে : (নিয়োগপত্র কপি ও চুক্তিপত্র সংযুক্ত
                                                        করতে হবে)
                                                    </td>
                                                    <td>:  @if(!$dataFromNVisaFd9Fd1->fd9_offered_post)

                                                        @else


                                                        <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'offeredPost','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                                                         @endif</td>
                                                </tr>
                                                <tr>
                                                    <td>১১</td>
                                                    <td>যে প্রকল্পে তাকে নিয়োগের প্রস্থাব করা হয়েছে তার নাম ও মেয়াদ ব্যুরোর অনুমোদন
                                                        পত্র সংযুক্ত করতে হবে)
                                                    </td>
                                                    <td>: @if(!$dataFromNVisaFd9Fd1->fd9_name_of_proposed_project)

                                                        @else


                                                        <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'proposedProject','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                                                         @endif</td>
                                                </tr>



                                                <tr>
                                                    <td>১২</td>
                                                    <td>বিদেশি নাগরিকের পাসপোর্ট সাইজের ছবি</td>
                                                    <td>: @if(!$dataFromNVisaFd9Fd1->fd9_foreigner_passport_size_photo)

                                                        @else

                                                        <img src="{{ $ins_url }}{{ $dataFromNVisaFd9Fd1->fd9_foreigner_passport_size_photo }}" alt="" style="height:40px;" id="output">

        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>১৩</td>
                                                    <td>পাসপোর্টের কপি সংযুক্ত</td>
                                                    <td>:  @if(!$dataFromNVisaFd9Fd1->fd9_copy_of_passport)

                                                        @else


                                                        <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'copyOfPassport','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                                                         @endif</td>
                                                </tr>
                                    </table>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Container-fluid Ends-->
@endsection

@section('script')
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" required name="name[]" id="name'+i+'" placeholder="Enter Name" class="form-control" /></td><td><button type="button" class="btn btn-sm btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection
