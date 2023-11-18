@extends('admin.master.master')

@section('title')
এফডি - ৯ ফরম | {{ $ins_name }}
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
                <h3>বিদেশী কর্মকর্তার নিয়োগ পত্রের সত্যায়ন পত্র </h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">এফডি - ৯ ফরম</li>
                    <li class="breadcrumb-item">এফডি - ৯ ফরম এর বিবরণ </li>
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

                           @if($dataFromNVisaFd9Fd1->status == 'Ongoing')
                            <button onclick="location.href = '{{ route('showDataAll',['status'=>'fdNine','id'=>$mainIdFdNine]) }}';" type="button" class="btn btn-primary float-right">ডাক দেখুন</button>

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
                                    class="icofont icofont-ui-home"></i>এফডি - ৯ ফরম </a></li>


                    <li class="nav-item"><a class="nav-link" id="pills-darkdoc-tab"
                                            data-bs-toggle="pill" href="#pills-darkdoc"
                                            role="tab" aria-controls="pills-darkdoc"
                                            aria-selected="false" style=""><i
                                    class="icofont icofont-animal-lemur"></i>নথিপত্র</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="pills-darkdoc1-tab"
                        data-bs-toggle="pill" href="#pills-darkdoc1"
                        role="tab" aria-controls="pills-darkdoc1"
                        aria-selected="false" style=""><i
                class="icofont icofont-animal-lemur"></i>আবেদনের স্টেটাস</a>
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

                                            <p>এফডি-০৯ পিডিএফ ডাউনলোড করুন</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="text-center">
                                                <p>পিডিএফ ডাউনলোড</p>
                                                <a class="btn btn-sm btn-success" target="_blank"
                                                       href = '{{ route('fdNinePdfDownload',$dataFromNVisaFd9Fd1->id) }}'>
                                                       ডাউনলোড করুন
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
$banglaValue =App\Http\Controllers\Admin\CommonController::englishToBangla($formatDate);


?>
                                    <div>
                                        <p>বরাবর <br>
                                            মহাপরিচালক <br>
                                            এনজিও বিষয় ব্যুরো, ঢাকা <br>
                                            জনাব,</p>
                                        <p>নিম্নলখিত নিয়োগপ্রাপ্ত বিদেশি নাগরিক/নাগরিকগণকে
                                            @if($ngoTypeData->ngo_type_new_old == 'Old')
                                            এ সংস্থায় (নিবন্ধন নম্বরঃ{{App\Http\Controllers\Admin\CommonController::englishToBangla($ngoTypeData->registration)}}
                                            @else
                                            এ সংস্থায় (নিবন্ধন নম্বরঃ{{App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromNVisaFd9Fd1->registration_number)}}
                                            @endif
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
                                                <td>: {{ $dataFromNVisaFd9Fd1->fd9_birth_place }} ও {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->fd9_dob))) }}</td>
                                            </tr>
                                            <tr>
                                                <td>৪.</td>
                                                <td>পাসপোর্ট নম্বর, ইস্যু ও মেয়াদোর্ত্তীণ তারিখ</td>
                                                <td>: {{ $dataFromNVisaFd9Fd1->fd9_passport_number }},{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->fd9_passport_issue_date))) }},{{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->fd9_passport_expiration_date))) }}</td>
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
                                                <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromNVisaFd9Fd1->fd9_number_of_family_members) }}</td>
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
                                                {{ $allFamilyData->family_member_name }},{{ App\Http\Controllers\Admin\CommonController::englishToBangla($allFamilyData->family_member_age) }}<br>
                                                @endforeach</td>
                                        </tr>
                                        <tr>
                                            <td>১৪.</td>
                                            <td>একাডেমিক যোগ্যতা (একাডেমিক যোগ্যতার সমর্থনে সনদপত্রের কপি সংযুক্ত করতে হবে</td>
                                            <td>:  @if(!$dataFromNVisaFd9Fd1->fd9_academic_qualification)

                                                @else


                                                <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'academicQualification','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
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


                                                <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'techQualification','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                                                 @endif</td>
                                        </tr>
                                        <tr>
                                            <td>১৬.</td>
                                            <td>অতীত অভিজ্ঞতা এবং যে কাজে তাঁকে নিয়োগ দেয়া হচ্ছে তাতে তার দক্ষতা (প্রমাণকসহ)
                                            </td>
                                            <td>: @if(!$dataFromNVisaFd9Fd1->fd9_past_experience)

                                                @else


                                                <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'pastExperience','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
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


                                                <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'offeredPost','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                                                 @endif</td>
                                        </tr>
                                        <tr>
                                            <td>১৯.</td>
                                            <td>যে প্রকল্পে তাকে নিয়োগের প্রস্থাব করা হয়েছে তার নাম ও মেয়াদ ব্যুরোর অনুমোদন
                                                পত্র সংযুক্ত করতে হবে)
                                            </td>
                                            <td>: @if(!$dataFromNVisaFd9Fd1->fd9_name_of_proposed_project)

                                                @else


                                                <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'proposedProject','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                                                 @endif</td>
                                        </tr>
                                        <tr>
                                            <td>২০.</td>
                                            <td>নিয়োগের যে তারিখ নির্ধারণ করা হয়েছে</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromNVisaFd9Fd1->fd9_date_of_appointment) }}</td>
                                        </tr>
                                        <tr>
                                            <td>২১.</td>
                                            <td>এক্সটেনশন হয়ে থাকলে তার সময়কাল</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->fd9_extension_date))) }}</td>
                                        </tr>
                                        <tr>
                                            <td>২২.</td>
                                            <td>এ প্রকল্পে কতজন বিদেশির পদের সংস্থান রয়েছে এবং কর্মরত কতজন</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromNVisaFd9Fd1->fd9_post_available_for_foreigner_and_working) }}</td>
                                        </tr>
                                        <tr>
                                            <td>২৩.</td>
                                            <td>বাংলাদেশের ইতঃপূর্বে অন্যকোন সংস্থায় কাজ করেছিলেন কিনা তার বিবরণ</td>
                                            <td>: {{ $dataFromNVisaFd9Fd1->fd9_previous_work_experience_in_bangladesh }}</td>
                                        </tr>
                                        <tr>
                                            <td>২৪.</td>
                                            <td>সংস্থায় বর্তমানে কতজন বিদেশি নাগরিক কর্মরত আছেন</td>
                                            <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($dataFromNVisaFd9Fd1->fd9_total_foreigner_working) }}</td>
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


                                                <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'copyOfPassport','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                                                 @endif</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12"></div>
                                        <div class="col-lg-6 col-sm-12">
                                            <table class="table table-borderless">

                                                <tr>
                                                    <td><img width="150" height="60" src="{{ $ins_url }}{{ $dataFromNVisaFd9Fd1->digital_signature}}"/></td>
                                                </tr>


                                                <tr>
                                                    <td><img width="150" height="60" src="{{ $ins_url }}{{ $dataFromNVisaFd9Fd1->digital_seal}}"/></td>
                                                </tr>

                                                <tr>
                                                    <td>প্রধান নির্বাহীর স্বাক্ষর ও সিল</td>
                                                </tr>


                                                <tr>
                                                    <td>প্রধান নির্বাহীর স্বাক্ষর ও সিল</td>
                                                </tr>
                                                <tr>
                                                    <td>নামঃ {{  $dataFromNVisaFd9Fd1->chief_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>পদবীঃ {{  $dataFromNVisaFd9Fd1->chief_desi }}</td>
                                                </tr>
                                                <tr>
                                                    <td>তারিখঃ {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime(\Carbon\Carbon::parse($dataFromNVisaFd9Fd1->created_at)->toDateString() )))}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="tab-pane fade" id="pills-darkdoc" role="tabpanel"
                         aria-labelledby="pills-darkdoc-tab">
                        <div class="mb-0 m-t-30">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h5>নথিপত্র</h5>
                                    <span>নথি দেখুন করুন</span>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>নথির নাম</th>
                                            <th>নথি দেখুন</th>
                                        </tr>
                                        @if(!$nVisaDocs)

                                                {{-- <tr>
                                                    <td>১</td>
                                                    <td>ক্রেতার প্রতিনিধি নিয়োগের ক্ষেত্রে ক্রেতার মনোনয়ন পত্রের অনুলিপি</td>
                                                    <td>







                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>২</td>
                                                    <td>বিনিয়োগ বোর্ডের নিবন্ধন পত্রের অনুলিপি, যদি আগে জমা না দেওয়া হয়</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>৩</td>
                                                    <td>কর্মচারীর ক্ষেত্রে পরিষেবা চুক্তি/চুক্তি/নিয়োগ পত্রের অনুলিপি</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>৪</td>
                                                    <td>বিদেশী নাগরিকদের নিয়োগ সংক্রান্ত কোম্পানির পরিচালক পর্ষদের সিদ্ধান্ত (সীমিত কোম্পানির ক্ষেত্রে) বেতন এবং অন্যান্য সুবিধা দেখায় শুধুমাত্র সভায় উপস্থিত পরিচালকদের দ্বারা স্বাক্ষরিত কোম্পানির</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>৫</td>
                                                    <td>মেমোরেন্ডাম এবং আর্টিকেল অফ অ্যাসোসিয়েশন শেয়ারহোল্ডারদের দ্বারা যথাযথভাবে স্বাক্ষরিত এবং অন্তর্ভুক্তির শংসাপত্র সহ (লিমিটেড কোম্পানির ক্ষেত্রে), যদি আগে জমা না দেওয়া হয়</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>৬</td>
                                                    <td>কর্মচারীদের জন্য ই-টাইপ ভিসা সহ পাসপোর্টের ফটোকপি/বিনিয়োগকারীদের জন্য পিআই-টাইপ ভিসা</td>
                                                    <td></td>
                                                </tr> --}}

                                                @else

                                                @if(empty($nVisaDocs->nomination_letter_of_buyer))


                                                @else
                                                <tr>

                                                    <td>ক্রেতার প্রতিনিধি নিয়োগের ক্ষেত্রে ক্রেতার মনোনয়ন পত্রের অনুলিপি</td>
                                                    <td>

ff


                                                        <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'nomination','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>




                                                    </td>
                                                </tr>
                                                @endif
                                                @if(empty($nVisaDocs->registration_letter_of_board_of_investment))


                                                        @else
                                                <tr>

                                                    <td>বিনিয়োগ বোর্ডের নিবন্ধন পত্রের অনুলিপি, যদি আগে জমা না দেওয়া হয়</td>
                                                    <td>



                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'investment','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>



                                                    </td>
                                                </tr>
                                                @endif
                                                @if(empty($nVisaDocs->employee_contract_copy))


                                                @else
                                                <tr>

                                                    <td>কর্মচারীর ক্ষেত্রে পরিষেবা চুক্তি/চুক্তি/নিয়োগ পত্রের অনুলিপি</td>
                                                    <td>



                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'contract','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>



                                                    </td>
                                                </tr>
                                                @endif
                                                @if(empty($nVisaDocs->board_of_the_directors_sign_lette))


                                                        @else
                                                <tr>

                                                    <td>বিদেশী নাগরিকদের নিয়োগ সংক্রান্ত কোম্পানির পরিচালক পর্ষদের সিদ্ধান্ত (সীমিত কোম্পানির ক্ষেত্রে) বেতন এবং অন্যান্য সুবিধা দেখায় শুধুমাত্র সভায় উপস্থিত পরিচালকদের দ্বারা স্বাক্ষরিত কোম্পানির</td>
                                                    <td>



                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'directors','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>



                                                    </td>
                                                </tr>
                                                @endif
                                                @if(empty($nVisaDocs->share_holder_copy))


                                                @else
                                                <tr>

                                                    <td>মেমোরেন্ডাম এবং আর্টিকেল অফ অ্যাসোসিয়েশন শেয়ারহোল্ডারদের দ্বারা যথাযথভাবে স্বাক্ষরিত এবং অন্তর্ভুক্তির শংসাপত্র সহ (লিমিটেড কোম্পানির ক্ষেত্রে), যদি আগে জমা না দেওয়া হয়</td>
                                                    <td>


                                                         <a target="_blank"  href="{{ route('nVisaDocumentDownload',['cat'=>'shareHolder','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>


                                                    </td>
                                                </tr>
                                                @endif
                                                @if(empty($nVisaDocs->passport_photocopy))


                                                @else
                                                <tr>

                                                    <td>কর্মচারীদের জন্য ই-টাইপ ভিসা সহ পাসপোর্টের ফটোকপি/বিনিয়োগকারীদের জন্য পিআই-টাইপ ভিসা</td>
                                                    <td>


                                                         <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'passportCopy','id'=>$nVisaDocs->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>


                                                    </td>
                                                </tr>
                                                @endif

                                                @endif
                                                @if(!$dataFromNVisaFd9Fd1->fd9_academic_qualification)

                                                @else
                                                <tr>

                                                    <td>একাডেমিক যোগ্যতা (একাডেমিক যোগ্যতার সমর্থনে সনদপত্রের কপি সংযুক্ত করতে হবে</td>
                                                    <td>:


                                                        <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'academicQualification','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>

                                                        </td>
                                                </tr>
                                                @endif
                                                @if(!$dataFromNVisaFd9Fd1->fd9_technical_and_other_qualifications_if_any)

                                                        @else
                                                <tr>

                                                    <td>কারিগরি ও অন্যান্য যোগ্যতা যদি থাকে (প্রাসঙ্গিক সনদপত্রের কপি সংযুক্ত করতে
                                                        হবে)
                                                    </td>
                                                    <td>:


                                                        <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'techQualification','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>

                                                    </td>
                                                </tr>
                                                @endif
                                                @if(!$dataFromNVisaFd9Fd1->fd9_past_experience)

                                                        @else
                                                <tr>

                                                    <td>অতীত অভিজ্ঞতা এবং যে কাজে তাঁকে নিয়োগ দেয়া হচ্ছে তাতে তার দক্ষতা (প্রমাণকসহ)
                                                    </td>
                                                    <td>:


                                                        <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'pastExperience','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>

                                                        </td>
                                                </tr>
                                                @endif
                                                @if(!$dataFromNVisaFd9Fd1->fd9_offered_post)

                                                @else
                                                <tr>

                                                    <td>যে পদের জন্য নিয়োগ প্রস্তাব দেয়া হয়েছে : (নিয়োগপত্র কপি ও চুক্তিপত্র সংযুক্ত
                                                        করতে হবে)
                                                    </td>
                                                    <td>:


                                                        <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'offeredPost','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                                                         </td>
                                                </tr>
                                                @endif
                                                @if(!$dataFromNVisaFd9Fd1->fd9_name_of_proposed_project)

                                                        @else
                                                <tr>

                                                    <td>যে প্রকল্পে তাকে নিয়োগের প্রস্থাব করা হয়েছে তার নাম ও মেয়াদ ব্যুরোর অনুমোদন
                                                        পত্র সংযুক্ত করতে হবে)
                                                    </td>
                                                    <td>:


                                                        <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'proposedProject','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>
                                                         </td>
                                                </tr>
                                                @endif

                                                @if(!$dataFromNVisaFd9Fd1->fd9_foreigner_passport_size_photo)

                                                @else
                                                <tr>

                                                    <td>বিদেশি নাগরিকের পাসপোর্ট সাইজের ছবি</td>
                                                    <td>:

                                                        <img src="{{ $ins_url }}{{ $dataFromNVisaFd9Fd1->fd9_foreigner_passport_size_photo }}" alt="" style="height:40px;" id="output">


                                                    </td>
                                                </tr>
                                                @endif
                                                @if(!$dataFromNVisaFd9Fd1->fd9_copy_of_passport)

                                                        @else
                                                <tr>

                                                    <td>পাসপোর্টের কপি সংযুক্ত</td>
                                                    <td>:


                                                        <a target="_blank" href="{{ route('nVisaDocumentDownload',['cat'=>'copyOfPassport','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন  </a>

                                                        </td>
                                                </tr>
                                                @endif

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="tab-pane fade" id="pills-darkdoc1" role="tabpanel"
                    aria-labelledby="pills-darkdoc1-tab">
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
