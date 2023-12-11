@extends('admin.master.master')

@section('title')
ওয়ার্ক পারমিট | {{ $ins_name }}
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
                <h3>ওয়ার্ক পারমিট</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">এফডি৯.১ (ওয়ার্ক পারমিট)</li>
                    <li class="breadcrumb-item">ওয়ার্কিং পারমিটের বিবরণ </li>
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
        @include('flash_message')
        <div class="card">
        <div class="card-body">


            <div class="row mb-4">
                <div class="col-lg-12">

                    <div class="text-end">



                       @if(empty($dataFromNVisaFd9Fd1->status))
                        <button onclick="location.href = '{{ route('showDataAll',['status'=>'fdNineOne','id'=>$mainIdFdNineOne]) }}';" type="button" class="btn btn-primary add-btn">ডাক দেখুন</button>

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
                                class="icofont icofont-ui-home"></i>এফডি-৯(১) ফরম</a></li>



                                <li class="nav-item"><a class="nav-link" id="pills-darkprofile-tab1"
                                    data-bs-toggle="pill" href="#pills-darkprofile1"
                                    role="tab" aria-controls="pills-darkprofil1e"
                                    aria-selected="false" style=""><i
                            class="icofont icofont-man-in-glasses"></i>নিরাপত্তা ছাড়পত্র</a>
            </li>
            <li class="nav-item"><a class="nav-link" id="pills-darkcontact-tab22"
                                    data-bs-toggle="pill" href="#pills-darkcontact22"
                                    role="tab" aria-controls="pills-darkcontact22"
                                    aria-selected="false" style=""><i
                            class="icofont icofont-contacts"></i>ফরওয়ার্ডিং লেটার</a>
            </li>




                                <li class="nav-item"><a class="nav-link" id="pills-darkprofile-tab"
                                        data-bs-toggle="pill" href="#pills-darkprofile"
                                        role="tab" aria-controls="pills-darkprofile"
                                        aria-selected="false" style=""><i
                                class="icofont icofont-man-in-glasses"></i>নথিপত্র</a>
                </li>



                <li class="nav-item"><a class="nav-link" id="pills-darkdoc2-tab"
                    data-bs-toggle="pill" href="#pills-darkdoc2"
                    role="tab" aria-controls="pills-darkdoc2"
                    aria-selected="false" style=""><i
            class="icofont icofont-animal-lemur"></i>আবেদনের স্টেটাস</a>
             </li>




                <li class="nav-item"><a class="nav-link" id="pills-darkdoc1-tab"
                    data-bs-toggle="pill" href="#pills-darkdoc1"
                    role="tab" aria-controls="pills-darkdoc1"
                    aria-selected="false" style=""><i
            class="icofont icofont-animal-lemur"></i>সুরক্ষা বিভাগে আবেদন পাঠান</a>
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

                                        <p>এফডি-৯(১) পিডিএফ ডাউনলোড করুন</p>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="text-center">
                                            <p>পিডিএফ ডাউনলোড</p>
                                            <a class="btn btn-sm btn-success" target="_blank"
                                                   href = '{{ route('verified_fd_nine_one_download',$dataFromNVisaFd9Fd1->id) }}'>
                                                   ডাউনলোড করুন
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <h4>এফডি-৯(১) ফরম</h4>
                                <h5>বিদেশি বিশেষজ্ঞ, উপদেষ্টা, কর্মকর্তা বা স্বেচ্ছাসেবী এর ওয়ার্ক পারমিটের (কার্যানুমতি)
                                    আবেদন ফরম</h5>

                            </div>

                            <div>
                                <p>বরাবর <br>
                                    মহাপরিচালক <br>
                                    এনজিও বিষয় ব্যুরো, ঢাকা <br>
                                    জনাব,</p>

                            </div>
                        </div>

                        <div class="card-body fd0901_text_style">
                            <table class="table table-borderless">
                                <tr>
                                    <td>বিষয়:</td>
                                    <td>"{{ $dataFromNVisaFd9Fd1->institute_name }}" সংস্থার বিদেশি বিশেষজ্ঞউপদেষ্টা/কর্মকর্ত/সেচ্ছাসেবী "{{ $dataFromNVisaFd9Fd1->foreigner_name_for_subject }}" এর
                                        ওয়ার্ক পারমিট প্রসঙ্গে।
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>সূত্র: এনজিও বিষয়ক ব্যুরোর স্মারক নম্বর {{ $dataFromNVisaFd9Fd1->sarok_number }} তারিখ {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->application_date))) }}
                                    </td>
                                </tr>
                            </table>
                            <p class="mt-3 mb-2">
                                উপর্যুক্ত বিষয় ও সূত্রের বরাতে "{{ $dataFromNVisaFd9Fd1->institute_name }}" সংস্থার "{{ $dataFromNVisaFd9Fd1->prokolpo_name }}" প্রকল্পের আওতায় "{{ $dataFromNVisaFd9Fd1->designation_name }}" হিসেবে বিদেশী বিশেষজ্ঞ/
                                উপদেষ্টা/কর্মকর্তা/স্বেচ্ছাসেবী {{ $dataFromNVisaFd9Fd1->foreigner_name_for_body }} কে {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->expire_from_date))) }} খ্রি: হতে {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->expire_to_date))) }} পর্যন্ত সময়ের জন্য নিয়োগ করা হয়েছে। সংস্থার অনুকূলে
                                উক্ত ব্যাক্তির অনুমোদিত সময়ের জন্য ওয়ার্ক পারমিট ইস্যু করার
                                জন্য একসাথে নিম্ন বর্ণিত কাগজপত্র সংযুক্ত করা হলো:
                            </p>

                            <table class="table table-borderless">
                                <tr>
                                    <td>০১</td>
                                    <td>নিয়োগপত্র সত্যায়ন প্রমাণক</td>
                                     <td> :@if(!$dataFromNVisaFd9Fd1->attestation_of_appointment_letter)

                                        @else

                                    <a target="_blank"  href="{{ route('fd9OneDownload',['cat'=>'appoinmentLetter','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
                                         @endif</td>
                                </tr>

                                <tr>
                                    <td>০২</td>
                            <td>ফর্ম ৯ এর কপি</td>
                                     <td>:@if(!$dataFromNVisaFd9Fd1->copy_of_form_nine)

                                        @else

                                    <a target="_blank"  href="{{ route('fd9OneDownload',['cat'=>'fd9Copy','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
                                         @endif</td>
                                </tr>

                                <tr>
                                    <td>০৩</td>
                            <td>ছবি</td>
                                     <td>:<img src="{{ $ins_url }}{{ $dataFromNVisaFd9Fd1->foreigner_image }}" style="height:40px;"/></td>
                                </tr>

                                <tr>
                                    <td>০৪</td>
                                    <td>এন ভিসা নিয়ে আগমনের তারিখ (প্রমানসহ)</td>
                                     <td> @if(!$dataFromNVisaFd9Fd1->copy_of_nvisa)

                                        @else

                                         <a target="_blank"  href="{{ route('fd9OneDownload',['cat'=>'visacopy','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>,
                                         @endif

                                         {{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->arrival_date_in_nvisa))) }}</td>
                                </tr>

                            </table>

                            <p class="mb-3">এমতবস্থায়, অত্র সংস্থার উল্লেখিত পদে {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->proposed_from_date))) }} হতে {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->proposed_from_date))) }} মেয়াদে উক্ত বিদেশি কর্মকর্তাকে ওয়ার্ক পারমিট ইস্যু করার জন্য বিনীত অনুরোধ করেছি।</p>

                    <div class="row">
                        <div class="col-lg-6 col-sm-12"></div>
                        <div class="col-lg-6 col-sm-12">

                        </div>
                    </div>



                        </div>




                    </div>

                </div>
                <div class="tab-pane fade" id="pills-darkprofile" role="tabpanel"
                     aria-labelledby="pills-darkprofile-tab">
                    <div class="mb-0 m-t-30">
                      <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>০১</td>
                                    <td>নিয়োগপত্র সত্যায়ন প্রমাণক</td>
                                    <td>: @if(!$dataFromNVisaFd9Fd1->attestation_of_appointment_letter)

                                        @else

         <?php

                                         $file_path = url($dataFromNVisaFd9Fd1->attestation_of_appointment_letter);
                                         $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                         $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                         ?>
                                    <a target="_blank"  href="{{ route('fd9OneDownload',['cat'=>'appoinmentLetter','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
                                         @endif
                                         {{-- <a href="{{ route('niyogPotroDownload',$dataFromNVisaFd9Fd1->id) }}" target="_blank">{{ $filename.'.'.$extension  }}</a> --}}
        </td>
                                </tr>
                                <tr>
                                    <td>০২</td>
                                    <td>ফর্ম ৯ এর কপি</td>
                                    <td>:  @if(!$dataFromNVisaFd9Fd1->copy_of_form_nine)

                                        @else

         <?php

                                         $file_path = url($dataFromNVisaFd9Fd1->copy_of_form_nine);
                                         $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                         $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                         ?>
                                    <a target="_blank"  href="{{ route('fd9OneDownload',['cat'=>'fd9Copy','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
                                         @endif
                                         {{-- <a href="{{ route('formNinePdfDownload',$dataFromNVisaFd9Fd1->id) }}" target="_blank">{{ $filename.'.'.$extension  }}</a> --}}
        </td>
                                </tr>
                                <tr>
                                    <td>০৩</td>
                                    <td>ছবি</td>
                                    <td>:<img src="{{ $ins_url }}{{ $dataFromNVisaFd9Fd1->foreigner_image }}" style="height:40px;"/></td>
                                </tr>
                                <tr>
                                    <td>০৪</td>
                                    <td>এন ভিসা নিয়ে আগমনের তারিখ (প্রমানসহ)</td>
                                    <td>:

                                        @if(!$dataFromNVisaFd9Fd1->copy_of_nvisa)

                                   @else

        <?php

                                    $file_path = url($dataFromNVisaFd9Fd1->copy_of_nvisa);
                                    $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                    $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                    ?>
                                    <a target="_blank"  href="{{ route('fd9OneDownload',['cat'=>'visacopy','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
                                    @endif
        {{-- <a href="{{ route('nVisaCopyDownload',$dataFromNVisaFd9Fd1->id) }}" target="_blank">{{ $filename.'.'.$extension  }}</a>, --}}
                                    {{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->arrival_date_in_nvisa))) }}</td>
                                </tr>
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="pills-darkprofile1" role="tabpanel"
                aria-labelledby="pills-darkprofile-tab1">
                <div class="mb-0 m-t-30">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="others_inner_section">
                                        <h5>Application for Security Clearance</h5>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3 ">
                                <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                    Basic Information
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-9 col-sm-12">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Approved permission period</td>
                                                    <td>:{{ $nVisabasicInfo->period_validity }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Effective Date</td>
                                                    <td>:{{ date('d-m-Y', strtotime($nVisabasicInfo->permit_efct_date)) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ref no. of issued work permit</td>
                                                    <td>:{{ $nVisabasicInfo->visa_ref_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Received Visa Recommendation Lette</td>
                                                    <td>:{{ $nVisabasicInfo->visa_recomendation_letter_received_way	 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ref no. of Visa Recommendation Letter</td>
                                                    <td>:{{ $nVisabasicInfo->visa_recomendation_letter_ref_no	 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Department in</td>
                                                    <td>:{{ $nVisabasicInfo->department_in	 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Work Permit type</td>
                                                    <td>:{{ $nVisabasicInfo->visa_category	 }}</td>
                                                </tr>

                                            </table>
                                        </div>
                                        <div class="col-lg-3 col-sm-12">
                                            <div class="nvisa-avatar">
                                                @if(!$nVisabasicInfo->applicant_photo)
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" style="height: 80px;" alt="">
                                                @else
                                                <img src="{{ $ins_url }}{{ $nVisabasicInfo->applicant_photo }}" style="height: 80px;" alt="">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3 ">
                                <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                    A. PARTICULAR OF SPONSOR/EMPLOYER
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td colspan="2">Name of the enterprise (organization/company): {{ $nVisaSponSor->org_name }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="background-color: #d4d4d4">Address of the enterprise (Bangladesh Only)</td>
                                        </tr>
                                        <tr>
                                            <td>House/Plot/Holding/Village:: {{ $nVisaSponSor->org_house_no }}  </td>
                                            <td>Flat/Apartment/Floor: {{ $nVisaSponSor->org_flat_no }}</td>
                                        </tr>
                                        <tr>
                                            <td>Road Number: {{ $nVisaSponSor->org_road_no }}</td>
                                            <td>Post/Zip Code: {{ $nVisaSponSor->org_post_code }}</td>
                                        </tr>
                                        <tr>
                                            <td>Post Office: {{ $nVisaSponSor->org_post_office }}</td>
                                            <td>Telephone Number: {{ $nVisaSponSor->org_phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>City/District: {{ $nVisaSponSor->org_district }}</td>
                                            <td>Thana/Upazilla: {{ $nVisaSponSor->org_thana }}</td>
                                        </tr>
                                        <tr>
                                            <td>Fax Number: {{ $nVisaSponSor->org_fax_no }}</td>
                                            <td>Email: {{ $nVisaSponSor->org_email }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Type of the Organization: Admin</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Nature of buisness: {{ $nVisaSponSor->nature_of_business }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Authorized Capital: {{ $nVisaSponSor->authorized_capital }}</td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">Paid up capital: {{ $nVisaSponSor->paid_up_capital }}</td>
                                        </tr>
                                        <tr>
                                            <td>Remittance received during last 12 months: {{ $nVisaSponSor->remittance_received }}</td>
                                            <td>Type of Industry:Admin </td>
                                        </tr>
                                        <tr>
                                            <td>Recommendation of Company Boards: {{ $nVisaSponSor->recommendation_of_company_board }}</td>
                                            <td>Whether local, foreign or joint venture company (if joint venture, percentage of local and foreign investment is to be shown): {{ $nVisaSponSor->company_share }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card mt-3 ">
                                <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                    B. PARTICULARS OF FOREIGN INCUMBENT
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td colspan="2">Name of the foreign national: {{ $nVisaForeignerInfo->name_of_the_foreign_national }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nationality: {{ $nVisaForeignerInfo->nationality  }}</td>
                                            <td>Passport Number: {{ $nVisaForeignerInfo->passport_no }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date of Issue: {{ $nVisaForeignerInfo->passport_issue_date }}</td>
                                            <td>Place of Issue: {{ $nVisaForeignerInfo->passport_issue_place }} </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Expiry Date: {{ $nVisaForeignerInfo->passport_expiry_date }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="background-color: #d4d4d4">Permanent Address</td>
                                        </tr>
                                        <tr>
                                            <td>Country: {{ $nVisaForeignerInfo->home_country }}</td>
                                            <td>House/Plot/Holding Number: {{ $nVisaForeignerInfo->house_no }}</td>
                                        </tr>
                                        <tr>
                                            <td>Flat/Apartment/Floor Number: {{ $nVisaForeignerInfo->flat_no }}</td>
                                            <td>Road Name/Road Number: {{ $nVisaForeignerInfo->road_no }} </td>
                                        </tr>
                                        <tr>
                                            <td><b></b> </td>
                                            <td><b></b> </td>
                                        </tr>
                                        <tr>
                                            <td>Post/Zip Code: {{ $nVisaForeignerInfo->post_code }}</td>
                                            <td>State/Province: {{ $nVisaForeignerInfo->state }}</td>
                                        </tr>
                                        <tr>
                                            <td>Telephone Number: {{ $nVisaForeignerInfo->phone }}</td>
                                            <td>City: {{ $nVisaForeignerInfo->city }}</td>
                                        </tr>
                                        <tr>
                                            <td>Fax Number:  {{ $nVisaForeignerInfo->fax_no }}</td>
                                            <td>Email: {{ $nVisaForeignerInfo->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth: {{ $nVisaForeignerInfo->date_of_birth }}</td>
                                            <td>Marital Status: {{ $nVisaForeignerInfo->martial_status }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card mt-3 ">
                                <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                    C. EMPLOYMENT INFORMATION
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Name of the post employed for (Designation):: {{ $nVisaEmploye->employed_designation }}</td>
                                            <td>Date of arrival in Bangladesh:  {{ $nVisaEmploye->date_of_arrival_in_bangladesh }}</td>
                                        </tr>
                                        <tr>
                                            <td>Type of visa: N-Visa </td>
                                            <td>Date of first assignment: {{ $nVisaEmploye->first_appoinment_date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Desired Effective Date: {{ $nVisaEmploye->desired_effective_date }}</td>
                                            <td>Desired End Date: {{ $nVisaEmploye->desired_end_date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Desired Duration: {{ $nVisaEmploye->visa_validity }}</td>
                                            <td>Brief job description: {{ $nVisaEmploye->brief_job_description }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Employee Justification: {{ $nVisaEmploye->employee_justification }} </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card mt-3 ">
                                <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                    D. WORKPLACE ADDRESS
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>House/Plot/Holding/Village::  {{ $nVisaWorkPlace->work_house_no }}</td>
                                            <td>Flat/Apartment/Floor: {{ $nVisaWorkPlace->work_flat_no }}</td>
                                        </tr>
                                        <tr>
                                            <td>Road Number: {{ $nVisaWorkPlace->work_road_no }} </td>
                                            <td>City/District: {{ $nVisaWorkPlace->work_district }}</td>
                                        </tr>
                                        <tr>
                                            <td>Thana/Upazilla: {{ $nVisaWorkPlace->work_thana }} </td>
                                            <td>Email: {{ $nVisaWorkPlace->work_email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Type of Organization: এনজিও</td>
                                            <td>Contact Person Mobile Number: {{ $nVisaWorkPlace->contact_person_mobile_number }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>


                            <?php

$annual =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisabasicInfo->id)->where('salary_category','Annual Bonus')->first();

$medical =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisabasicInfo->id)->where('salary_category','Medical Allowance')->first();

$entertainment =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisabasicInfo->id)->where('salary_category','Entertainment Allowance')->first();


$convoy =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisabasicInfo->id)->where('salary_category','Conveyance')->first();

$house =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisabasicInfo->id)->where('salary_category','House Rent')->first();

$overseas =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisabasicInfo->id)->where('salary_category','Overseas Allowance')->first();


$basic =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisabasicInfo->id)->where('salary_category','Basic Salary')->first();


$mainDatac =DB::table('n_visa_compensation_and_benifits')
->where('n_visa_id',$nVisabasicInfo->id)->first();



?>

<!--compansation --->

@if(!$mainDatac)
<div class="card mt-3 ">
<div class="card-header bg-primary d-flex justify-content-between align-items-center">
E.COMPENSATION AND BENIFITS
</div>
<div class="card-body">
No Information Available
</div>
</div>
@else
<div class="card mt-3 ">
<div class="card-header bg-primary d-flex justify-content-between align-items-center">
E.COMPENSATION AND BENIFITS
</div>
<div class="card-body">
<table class="table table-bordered">
    <tr>
        <td><b>Salary Structure</b></td>
        <td colspan="3"><b>Payble Locally</b></td>
    </tr>
    <tr>
        <td></td>
        <td>Payment</td>
        <td>Amount</td>
        <td>Currency</td>
    </tr>
    @if(!$basic)

    @else
    <tr>
        <td>a. Basic Salary</td>
        <td>{{ $basic->payment_type }}</td>
        <td>{{ $basic->amount }}</td>
        <td>{{ $basic->currency }}</td>
    </tr>
    @endif
    @if(!$overseas)

    @else
    <tr>
        <td>b. Overseas allowance</td>
        <td>{{ $overseas->payment_type }}</td>
        <td>{{ $overseas->amount }}</td>
        <td>{{ $overseas->currency }}</td>
    </tr>
    @endif
    @if(!$house)

    @else
    <tr>
        <td>c. House rent/Accommodation</td>
        <td>{{ $house->payment_type }}</td>
        <td>{{ $house->amount }}</td>
        <td>{{ $house->currency }}</td>
    </tr>
    @endif
    @if(!$convoy)

    @else
    <tr>
        <td>d. Conveyance</td>
        <td>{{ $convoy->payment_type }}</td>
        <td>{{ $convoy->amount }}</td>
        <td>{{ $convoy->currency }}</td>
    </tr>
    @endif
    @if(!$entertainment)

    @else
    <tr>
        <td>e. Entertainmemt allowance</td>
        <td>{{ $entertainment->payment_type }}</td>
        <td>{{ $entertainment->amount }}</td>
        <td>{{ $entertainment->currency }}</td>
    </tr>
    @endif
    @if(!$medical)

    @else
    <tr>
        <td>f. Medical allowance<</td>
        <td>{{ $medical->payment_type }}</td>
        <td>{{ $medical->amount }}</td>
        <td>{{ $medical->currency }}</td>
    </tr>
    @endif
    @if(!$annual)

    @else
    <tr>
        <td>g. Annual Bonus</td>
        <td>{{ $annual->payment_type }}</td>
        <td>{{ $annual->amount }}</td>
        <td>{{ $annual->currency }}</td>
    </tr>
    @endif
    <tr>
        <td>h. Other fringe benefits, if any/td>
        <td colspan="3">{{ $nVisabasicInfo->other_benefit }}</td>
    </tr>
    <tr>
        <td>i. Any Particular Comments of remarks</td>
        <td colspan="3">{{ $nVisabasicInfo->salary_remarks }}</td>
    </tr>
</table>
</div>
</div>

@endif


<!--end compansation -->



                            <div class="card mt-3 ">
                                <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                    F. Manpower of the office
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td colspan="3"><b>Local (a)</b></td>
                                            <td colspan="3"><b>Foreign  (b)</b></td>
                                            <td rowspan="2"><b>Grand Total
                                                (a+b)</b></td>
                                            <td colspan="2"><b>Ratio</b></td>
                                        </tr>
                                        <tr>
                                            <td>Executive</td>
                                            <td>Supporting Staff </td>
                                            <td>Total</td>
                                            <td>Executive</td>
                                            <td>Supporting Staff</td>
                                            <td>Total</td>
                                            <td>Local </td>
                                            <td>Foreign</td>
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
                                            <td>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($nVisaManPower->local_executive) }}</td>
                                            <td>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($nVisaManPower->local_supporting_staff) }}</td>
                                            <td>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($nVisaManPower->local_total) }}</td>
                                            <td>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($nVisaManPower->foreign_executive) }}</td>
                                            <td>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($nVisaManPower->foreign_supporting_staff) }}</td>
                                            <td>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($nVisaManPower->foreign_total) }}</td>
                                            <td>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($nVisaManPower->gand_total) }}</td>
                                            <td>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($nVisaManPower->local_ratio) }}</td>
                                            <td>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($nVisaManPower->foreign_ratio) }}</td>
                                        </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>
                            <div class="card mt-3 ">
                                <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                    G. Necessary Document for Work Permit (PDF)
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>#</th>
        <th>Required Attachment</th>
        <th>Action</th>
                                            </tr>
                                        @if(!$nVisaDocs)

                                        {{-- <tr>
                                            <td>1</td>
                                            <td>Copy of buyer's nomination letter in case of employment of buyer;s representative</td>
                                            <td>







                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Copy of registration letter of board of investment, if not submitted earlier</td>
                                            <td></td>
                                        </tr> --}}
                                        <tr>
                                            <td>1</td>
                                            <td>Copy of service contract/agreement/ appointment letter in case of employee</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
    <td>Decision of the board of the directors of the company regarding employment of foreign nationals (In case of limited company) showing salary & other facility only signed by directors present in the meeting</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
    <td>	Memorandum & Articles of Association of the company duly signed by shareholders along with certificate of incorporation (In case of limited company), if not sumitted earlier</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
    <td>Photocopy of passport with E-type visa for employees/PI-type visa for Investors</td>
                                            <td></td>
                                        </tr>

                                        @else


                                        {{-- <tr>
                                            <td>1</td>
                                            <td>Copy of buyer's nomination letter in case of employment of buyer;s representative</td>
                                            <td>


                                               @if(empty($nVisaDocs->nomination_letter_of_buyer))


                                               @else

                                                <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'nomination','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                @endif


                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Copy of registration letter of board of investment, if not submitted earlier</td>
                                            <td>

                                                @if(empty($nVisaDocs->registration_letter_of_board_of_investment))


                                                @else

                                                 <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'investment','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                 @endif

                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <td>1</td>
                                            <td>Copy of service contract/agreement/ appointment letter in case of employee</td>
                                            <td>

                                                @if(empty($nVisaDocs->employee_contract_copy))


                                                @else

                                                 <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'contract','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                 @endif

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Decision of the board of the directors of the company regarding employment of foreign nationals (In case of limited company) showing salary & other facility only signed by directors present in the meeting</td>
                                            <td>

                                                @if(empty($nVisaDocs->board_of_the_directors_sign_lette))


                                                @else

                                                 <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'directors','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                 @endif

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>	Memorandum & Articles of Association of the company duly signed by shareholders along with certificate of incorporation (In case of limited company), if not sumitted earlier</td>
                                            <td>
                                                @if(empty($nVisaDocs->share_holder_copy))


                                                @else

                                                 <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'shareHolder','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>

                                                 @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Photocopy of passport with E-type visa for employees/PI-type visa for Investors</td>
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
                                    H. Authorized Personal of the organization
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Organization Name: {{ $nVisaAuthPerson->auth_person_org_name }}</td>
                                            <td>Organization House No: {{ $nVisaAuthPerson->auth_person_org_house_no }}</td>
                                        </tr>
                                        <tr>
                                            <td>Organization Flat No: {{ $nVisaAuthPerson->auth_person_org_flat_no }}</td>
                                            <td>Organization Road No: {{ $nVisaAuthPerson->auth_person_org_road_no }}</td>
                                        </tr>
                                        <tr>
                                            <td>Organization Thana: {{ $nVisaAuthPerson->auth_person_org_thana }}</td>
                                            <td>Organization Post Office: {{ $nVisaAuthPerson->auth_person_org_post_office }}</td>
                                        </tr>
                                        <tr>
                                            <td>Organization District: {{ $nVisaAuthPerson->auth_person_org_district }}</td>
                                            <td>Organization Mobile: {{ $nVisaAuthPerson->auth_person_org_mobile }}</td>
                                        </tr>
                                        <tr>
                                            <td>Submission Date:  {{ $nVisaAuthPerson->submission_date }}</td>
                                            <td>Expatriate Name: {{ $nVisaAuthPerson->expatriate_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Expatriate Emai: {{ $nVisaAuthPerson->expatriate_email }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>


                <div class="tab-pane fade" id="pills-darkcontact22" role="tabpanel"
                         aria-labelledby="pills-darkcontact-tab22">
                         <div class="mb-0 m-t-30">

                            <?php


                            $forwardingLetterData =DB::table('forwarding_letters')
            ->where('fd9_form_id',$dataFromNVisaFd9Fd1->id)->first();

//dd($forwardingLetterData);

                            ?>
                            @if (empty($nVisabasicInfo->forwarding_letter))
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="custom-validation" action="{{ route('postForwardingLetter') }}" id="form" method="post" enctype="multipart/form-data">
                                                @csrf
                                                   <input type="hidden" value="{{ $nVisabasicInfo->id }}" name="id" required>
                                                <div class="form-group col-md-12 col-sm-12">
                                                    <label for="email">ফরওয়ার্ডিং লেটার</label>
                                                    <input type="file" accept=".pdf" name="forwardingLetter" class="form-control form-control-sm" required>
                                                </div>







                                        </div>
                                        <div class="card-footer text-end">
                                            <button class="btn btn-primary" type="submit">জমা দিন </button>
                                        </div>
                                    </form>
                                    </div>
                                </div>

                            </div>
                            @else
                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12">


                                    <div class="text-end">



                                    <div class="card">

                                        <div class="card-header">
                                            <button class="btn btn-sm btn-success"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                ফরওয়ার্ডিং লেটার আপডেট  করুন
                                            </button>

                                            <!--model-->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalLabel">পিডিএফ আপলোড</h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="custom-validation" action="{{ route('postForwardingLetter') }}" id="form" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                               <input type="hidden" value="{{ $nVisabasicInfo->id }}" name="id" required>
                                                            <div class="form-group col-md-12 col-sm-12">
                                                                <label for="email">ফরওয়ার্ডিং লেটার</label>
                                                                <input type="file" accept=".pdf" name="forwardingLetter" class="form-control form-control-sm" required>
                                                            </div>



                                                            <button type="submit" class="btn btn-primary btn-lg  waves-effect  btn-sm waves-light mr-1">
                                                                জমা দিন
                                                             </button>
                                                        </form>

                                                    </div>

                                                  </div>
                                                </div>
                                              </div>
                                            <!--model -->
                                        </div>
                                        </div>
                                        <div class="card-body">



                                            <iframe src=
                                            "{{ url('public/'.$nVisabasicInfo->forwarding_letter) }}"
                                                            width="100%"
                                                            height="800">
                                                    </iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                </div>

               <!--new code start-->

                <div class="tab-pane fade" id="pills-darkdoc2" role="tabpanel"
                aria-labelledby="pills-darkdoc2-tab">
               <div class="mb-0 m-t-30">

                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <form action="{{ route('statusUpdateForFd9') }}" method="post">
                                    @csrf


                                    <input type="hidden" value="{{ $dataFromNVisaFd9Fd1->id }}" name="id" />

                                    <input type="hidden" value="{{ $get_email_from_user }}" name="email" />

                                    <label>স্টেটাস:</label>
                                    <select class="form-control form-control-sm mt-4" name="status" id="regStatus">

                                        <option value="Ongoing" {{ $dataFromNVisaFd9Fd1->status == 'Ongoing' ? 'selected':''  }}>চলমান</option>

<option value="Submitted" {{ $dataFromNVisaFd9Fd1->status == 'Submitted' ? 'selected':''  }}>জমা দেওয়া হয়েছে </option>

                                        <option value="Accepted" {{ $dataFromNVisaFd9Fd1->status == 'Accepted' ? 'selected':''  }}>গৃহীত</option>
                                        <option value="Correct" {{ $dataFromNVisaFd9Fd1->status == 'Correct' ? 'selected':''  }}>সংশোধন করুন</option>
                                        <option value="Rejected" {{ $dataFromNVisaFd9Fd1->status == 'Rejected' ? 'selected':''  }}>প্রত্যাখ্যান করুন</option>

                                    </select>


                                    @if($dataFromNVisaFd9Fd1->status == 'Correct' || $dataFromNVisaFd9Fd1->status == 'Rejected')

                                    <div id="rValueStatus" >
                                        <label>বিস্তারিত লিখুন:</label>
                                        <textarea class="form-control form-control-sm" name="comment">{{ $dataFromNVisaFd9Fd1->comment }}</textarea>
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



                <!--new code -->



                <div class="tab-pane fade" id="pills-darkdoc1" role="tabpanel"
                aria-labelledby="pills-darkdoc1-tab">
               <div class="mb-0 m-t-30">


                <div class="card">
                    <div class="card-body">
                        @if (empty($nVisabasicInfo->forwarding_letter))

                        <div class="row">

<h5>ফরওয়ার্ডিং লেটার আপলোড করুন</h5>
                        </div>


                        @else
                        <div class="row">
                            <?php

                            $checkTracking =DB::table('secruity_checks')
                            ->where('n_visa_id',$nVisabasicInfo->id)->get();;

                            ?>
                            <div class="col-md-12">
                                @if(count($checkTracking) == 0)

                                <form class="custom-validation" action="{{ route('submitForCheck') }}" id="form" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $dataFromNVisaFd9Fd1->id }}" />
                                   <button class="btn btn-primary" type="submit">আবেদনপত্র জমাদিন</button>
                               </form>

                                @else
                                <h1>আবেদনপত্রের স্টেটাস</h1>

                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ট্র্যাকিং নম্বর</th>
                                        <th scope="col">স্ট্যাটাসের নাম</th>
                                        <th scope="col">কার্যকলাপ</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($checkTracking as $key=>$AllCheckTracking)
                                      <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $AllCheckTracking->tracking_no }}</td>
                                        <td>{{ $AllCheckTracking->statusName }}</td>
<td>
<button  data-id = "{{ $AllCheckTracking->n_visa_id }}" class="btn btn-primary statusCheck" type="button">
    <i class="ri-add-line align-bottom me-1"></i> স্টেটাস দেখুন
</button >
</td>
                                      </tr>
                                      @endforeach

                                    </tbody>
                                  </table>

                                @endif
                            </div>
                            <div class="col-md-12" id="finalResult">

                            </div>

                        </div>
                        @endif
                    </div>
                </div>

               </div>
           </div>


            </div>
        </div>
        </div>
    </div>
    <!-- profile post end-->

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


<script type="text/javascript">
    $(".statusCheck").click(function () {

        var mainId = $(this).attr("data-id");
        //alert(mainId);

        $.ajax({
            url: "{{ route('statusCheck') }}",
            method: 'GET',
            data: {mainId:mainId},
            success: function(data) {

              $("#finalResult").html('');
              $("#finalResult").html(data);
            }
        });



    });
</script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" required name="name[]" id="name'+i+'" placeholder="অনুলিপি" class="form-control" /></td><td><button type="button" class="btn btn-sm btn-outline-danger remove-input-field">মুছে ফেলুন</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection
