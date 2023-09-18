@extends('admin.master.master')

@section('title')
এনজিও নিবন্ধন নবায়ন এর  বিস্তারিত  | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>এনজিও নিবন্ধন নবায়ন তথ্য</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">এনজিও নিবন্ধন নবায়ন তথ্য</li>
                    <li class="breadcrumb-item active">এনজিও প্রোফাইল</li>
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
        <div class="row">
            <!-- user profile header start-->
            <div class="col-sm-12">
              <div class="d-flex justify-content-start">
                  <div class="card profile-header me-4">
                    <div class="userpro-box">
                        <div class="img-wrraper">
                            @if(empty($users_info->image))
                            <div class="avatar"><img class="img-fluid" alt="" src="{{ asset('/') }}public/admin/user.png"></div>
                            @else
                            <div class="avatar"><img class="img-fluid" alt="" src="{{ $ins_url }}{{ $users_info->image }}"></div>
                            @endif
                        </div>

                        <?php

                       $getNgoType = DB::table('ngo_type_and_languages')->where('user_id',$form_one_data->user_id)->value('ngo_type');

                       $ngoTypeData = DB::table('ngo_type_and_languages')->where('user_id',$form_one_data->user_id)->first();
                        ?>
                        <div class="user-designation">
                            <div class="title">
                                @if($getNgoType == 'Foreign')
                                <h4>{{ $form_one_data->organization_name }}</h4>
                              <h6>{{ $form_one_data->address_of_head_office_eng }}</h6>
                                @else
                                <h4>{{ $form_one_data->organization_name_ban }}</h4>
                              <h6>{{ $form_one_data->address_of_head_office }}</h6>
                                @endif
                                <!--<h6>{{ $form_one_data->email }}</h6>-->
                               <!-- <p>{{ $form_one_data->phone }}</p> -->
                            </div>    @if($getNgoType == 'Foreign')
                            <h6>বিদেশী এনজিও </h6>
                            @else
                            <h6>দেশি এনজিও </h6>

                            @endif
                            @if($ngoTypeData->ngo_type_new_old == 'Old')
                            <h6>এনজিও'র ধরন : পুরাতন</h6>
                            @else

                            <h6>এনজিও'র ধরন : নতুন</h6>
                            @endif
                            <div class="follow">
                                <ul class="follow-list">
                                    <li>
                                        <div class="follow-num">


                                            {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($all_data_for_new_list_all->created_at))) }}



                                        </div>
                                        <span>জমাদানের তারিখ</span>
                                    </li>
                                    <li>
                                        <div class="follow-num"> @if($mainIdR->status == 'Accepted')

                                            <button class="btn btn-secondary " type="button">
                                                গৃহীত

                                            </button>
                                            @elseif($mainIdR->status == 'Ongoing')

                                            <button class="btn btn-secondary " type="button">
                                                চলমান

                                            </button>
                                            @else
                                            <button class="btn btn-secondary " type="button">
                                                প্রত্যাখ্যান

                                            </button>
                                            @endif</div>
                                        <span>স্ট্যাটাস</span>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="card profile-header">
                  <div class="card-body text-center">
                    <div class="userpro-box">
                        <div class="user-designation">
                            <h4>{{ $form_one_data->name_of_head_in_bd }}</h4>
                            <h5>ঠিকানা:  @if($getNgoType == 'Foreign')
                                    {{ $form_one_data->address_of_head_office_eng }}
                                    @else

                             {{ $form_one_data->address_of_head_office }}
                                    @endif</h5>
                            <h5>মোবাইল নম্বর:    {{ App\Http\Controllers\Admin\CommonController::englishToBangla($form_one_data->phone) }}</h5>
                            <h5>ইমেইল:    {{ $form_one_data->email }}</h5>
                          </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <?php



             ?>
            <!-- user profile header end-->
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="row">
                    <!-- profile post start-->
                    <div class="col-sm-12">
                        <div class="card height-equal">
                            <div class="card-header pb-0">
                                <h5>এনজিও নিবন্ধন নবায়ন সমস্ত তথ্য</h5>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-dark" id="pills-darktab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="pills-darkhome-tab"
                                        data-bs-toggle="pill" href="#pills-darkhome"
                                        role="tab" aria-controls="pills-darkhome"
                                        aria-selected="true" style=""><i
                                class="icofont icofont-ui-home"></i>এফডি -৮ ফরম</a></li>






                <li class="nav-item"><a class="nav-link" id="pills-darkdoc-tab"
                                        data-bs-toggle="pill" href="#pills-darkdoc"
                                        role="tab" aria-controls="pills-darkdoc"
                                        aria-selected="false" style=""><i
                                class="icofont icofont-animal-lemur"></i>নথিপত্র</a>
                </li>



                                    @if($renew_status == "Accepted")

                                    <li class="nav-item"><a class="nav-link" id="pills-darkdoc1-tab"
                                        data-bs-toggle="pill" href="#pills-darkdoc1"
                                        role="tab" aria-controls="pills-darkdoc1"
                                        aria-selected="false" style=""><i
                                class="icofont icofont-animal-lemur"></i>সার্টিফিকেট প্রিন্ট করুন </a>
                </li>

                @else

                <li class="nav-item"><a class="nav-link" id="pills-darkdoc1-tab"
                    data-bs-toggle="pill" href="#pills-darkdoc1"
                    role="tab" aria-controls="pills-darkdoc1"
                    aria-selected="false" style=""><i
            class="icofont icofont-animal-lemur"></i>স্টেটাস আপডেট করুন </a>
             </li>



                @endif

                                </ul>
                                <div class="tab-content" id="pills-darktabContent">
                                    <div class="tab-pane fade active show" id="pills-darkhome"
                                         role="tabpanel" aria-labelledby="pills-darkhome-tab">
                                        <div class="mb-0 m-t-30">
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td>১.</td>
                                                    <td colspan="3">সংস্থার বিবরণ:</td>
                                                </tr>
                                                  <?php
 $getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',$form_one_data->user_id)->value('ngo_type');
                             // dd($getngoForLanguage);


                                    $reg_name = DB::table('fd_one_forms')->where('user_id',$form_one_data->user_id)->value('organization_name_ban');


                                                  ?>
                                                <tr>
                                                    <td></td>
                                                    <td>(i)</td>
                                                    <td>সংস্থার নাম</td>
                                                    <td>: {{ $reg_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(ii)</td>
                                                    <td>সংস্থার ঠিকানা</td>
                                                    <td>: {{ $form_one_data->organization_address}}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(iii)</td>
                                                    <td>ডাইরি নম্বর </td>
                                                    <td>:

                                                        @if($ngoTypeData->ngo_type_new_old == 'Old')

                                                        {{ App\Http\Controllers\Admin\CommonController::englishToBangla($ngoTypeData->registration)}}
                                                        @else

                                                      @if($form_one_data->registration_number == 0)


                                                      @else

                                                      {{ App\Http\Controllers\Admin\CommonController::englishToBangla($form_one_data->registration_number)}}

                                                      @endif

                                                      @endif


                                                  </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(iv)</td>
                                                    <td>কোন দেশীয় সংস্থা</td>
                                                    <td>: {{ $form_one_data->country_of_origin }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(v)</td>
                                                    <td>প্রধান কার্যালয়ের ঠিকানা</td>
                                                    <td>: {{ $form_one_data->address_of_head_office }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>টেলিফোন নম্বর ,মোবাইল নম্বর ,ইমেইল  ও ওয়েব এড্রেস</td>
                                                    <td>:
                                                        @if(!$renewInfoData)

                                                        @else
                                                        {{ App\Http\Controllers\Admin\CommonController::englishToBangla($renewInfoData->phone_new) }},{{ App\Http\Controllers\Admin\CommonController::englishToBangla($renewInfoData->mobile_new) }},{{ $renewInfoData->email_new }},{{ $renewInfoData->web_site_name }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(vi)</td>
                                                    <td>বাংলাদেশস্থ সংস্থা প্রধানের তথ্যাদি</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>ক) নাম</td>
                                                    <td>: {{ $form_one_data->name_of_head_in_bd }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>খ) পূর্ণকালীন/ খণ্ডকালীন</td>
                                                    <td>: {{ $form_one_data->job_type }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>গ) ঠিকানা,টেলিফোন নম্বর ,মোবাইল নম্বর, ইমেইল</td>
                                                    <td>:{{ $form_one_data->address }},{{ App\Http\Controllers\Admin\CommonController::englishToBangla($renewInfoData->mobile) }} {{ App\Http\Controllers\Admin\CommonController::englishToBangla($form_one_data->phone) }}, {{ $form_one_data->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>ঘ) নাগরিকত্ব (পূর্বতন নাগরিকত্ব যদি থাকে তাও উল্লেখ
                                                        করতে হবে)
                                                    </td>
                                                    <td>: {{ $form_one_data->citizenship }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>ঙ) পেশা (বর্তমান পেশা উল্লেখ করতে হবে)</td>
                                                    <td>: {{ $form_one_data->profession }}</td>
                                                </tr>

                                                <tr>
                                                    <td>২.</td>
                                                    <td colspan="2">বিগত ১০(দশ) বছরে বৈদেশিক অনুদানে পরিচালত কার্যক্রমের বিবরণ (প্রকল্প ওয়ারী তথাদির সংক্ষিপ্তসার সংযুক্ত করতে হবে)
                                                    </td>
                                                    <td>:

                                                        @if(!$renewInfoData)


                                                        @else
                                                        @if(empty($renewInfoData->foregin_pdf))

                                                        @else
                                                        <a target="_blank"  href="{{ route('foreginPdfDownload',base64_encode($renewInfoData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
                                                        @endif
@endif

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>৩.</td>
                                                    <td colspan="2">সংস্থার সম্ভাব্য/প্রত্যাশিত বার্ষিক বাজেট (উৎসসহ)
                                                    </td>
                                                    <td>:          @if(!$renewInfoData)


                                                        @else
                                                        @if(empty($renewInfoData->yearly_budget))

                                                        @else
                                                        <a target="_blank"  href="{{ route('yearlyBudgetPdfDownload',base64_encode($renewInfoData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
                                                        @endif
@endif</td>
                                                </tr>


                                                <tr>
                                                    <td>৪.</td>
                                                    <td colspan="3">কর্মকর্তাদের তথ্যাদি পৃথক কাগজে
                                                        [ঊর্ধ্বতন ৫(পাঁচ) জন কর্মকর্তার]
                                                        উপস্থাপন করতে হবে
                                                    </td>
                                                </tr>
                                                @foreach($all_partiw as $key=>$all_all_parti)
                                                <tr>
                                                    <td></td>
                                                    <td>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1 )}}.</td>
                                                    <td>কর্মকর্তা {{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1 )}}</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(ক)</td>
                                                    <td>নাম</td>
                                                    <td>: {{ $all_all_parti->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(খ)</td>
                                                    <td>পদবি</td>
                                                    <td>: {{ $all_all_parti->position }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(গ)</td>
                                                    <td>ঠিকানা</td>
                                                    <td>: {{ $all_all_parti->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(ঘ)</td>
                                                    <td>নাগরিকত্ব (দ্বৈত নাগরিকত্ব থাকলে উল্লেখ করতে হবে)
                                                    </td>
                                                    <td>: {{ $all_all_parti->citizenship }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(ঙ)</td>
                                                    <td>যোগদানের তারিখ</td>
                                                    <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($all_all_parti->date_of_join))) }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(চ)</td>
                                                    <td>বেতন ভাতাদি</td>
                                                    <td>: {{ $all_all_parti->salary_statement }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(ছ)</td>
                                                    <td>মোবাইল নম্বর </td>
                                                    <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($all_all_parti->mobile) }}</td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td>(জ)</td>
                                                    <td>ইমেইল এড্রেস</td>
                                                    <td>: {{ $all_all_parti->email }}</td>
                                                </tr>


                                                <tr>
                                                    <td></td>
                                                    <td>(ঝ)</td>
                                                    <td>সম্পৃক্ত অন্য পেশার বিবরণ</td>
                                                    <td>: {{ $all_all_parti->other_occupation }}</td>
                                                </tr>
                                                @endforeach

                                                <tr>
                                                    <td>৫.</td>
                                                    <td colspan="2">নিবন্ধন ফি ও ভ্যাট পরিশোধ করা হয়েছে
                                                        কিনা (চালানের কপি সংযুক্ত করতে
                                                        হবে)
                                                    </td>
                                                    <td>: @if(!$renewInfoData)


                                                        @else
                                                        @if(empty($renewInfoData->copy_of_chalan))

                                                        @else
                                                        <a target="_blank"  href="{{ route('copyOfChalanPdfDownload',base64_encode($renewInfoData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
                                                        @endif
@endif</td>
                                                </tr>

                                                <tr>
                                                    <td>৬.</td>
                                                    <td colspan="2">তফসিল -১ এ বর্ণিত যেকোন ফি এর ভ্যাট বকেয়া থাকলে পরিশোধ হয়েছে কিনা (চালানের কপি সংযুক্ত করতে হবে)
                                                    </td>
                                                    <td>: @if(!$renewInfoData)


                                                        @else
                                                        @if(empty($renewInfoData->due_vat_pdf))

                                                        @else
                                                        <a target="_blank"  href="{{ route('dueVatPdfDownload',base64_encode($renewInfoData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
                                                        @endif
@endif</td>
                                                </tr>

                                                <tr>
                                                    <td>৭.</td>
                                                    <td colspan="3">মাদার একাউন্ট এর বিস্তারিত বিবরণ (হিসাব
                                                        নম্বর, ধরণ, ব্যাংকের
                                                        নাম,শাখা ও বিস্তারিত ঠিকানা)
                                                    </td>
                                                </tr>
                                                @if(!$get_all_data_adviser_bank)

                                                @else
                                                <tr>
                                                    <td></td>
                                                    <td>(ক)</td>
                                                    <td>হিসাব নম্বর</td>
                                                    <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($get_all_data_adviser_bank->account_number) }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(খ)</td>
                                                    <td>ধরণ</td>
                                                    <td>: {{ $get_all_data_adviser_bank->account_type }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(গ)</td>
                                                    <td>ব্যাংকের নাম</td>
                                                    <td>: {{ $get_all_data_adviser_bank->name_of_bank }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(ঘ)</td>
                                                    <td>শাখা</td>
                                                    <td>: {{ $get_all_data_adviser_bank->branch_name_of_bank }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>(ঙ)</td>
                                                    <td>বিস্তারিত ঠিকানা</td>
                                                    <td>: {{ $get_all_data_adviser_bank->bank_address }}</td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td>৮.</td>
                                                    <td colspan="2">ব্যাংক হিসাব নম্বর পরিবর্তন হয়ে থাকলে ব্যুরোর অনুমোদনপত্রের কপি সংযুক্ত করতে হবে
                                                    </td>
                                                    <td>: @if(!$renewInfoData)


                                                        @else
                                                        @if(empty($renewInfoData->change_ac_number))

                                                        @else
                                                        <a target="_blank"  href="{{ route('changeAcNumberDownload',base64_encode($renewInfoData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
                                                        @endif
@endif</td>
                                                </tr>

                                                </tbody>
                                            </table>


                                            <table style=" margin-top: 15px;width:100%">

                                                <tr>
                                                    <td style="padding-left:1130px;" colspan="3"><img width="150" height="60" src="{{ $ins_url }}{{ $renewInfoData->digital_signature}}"/></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left:1130px;" colspan="3"><img width="150" height="60" src="{{ $ins_url }}{{ $renewInfoData->digital_seal}}"/></td>
                                                </tr>
                                            </table>


                                            <table style=" margin-top: 10px;width:100%">
                                                <tr>
                                                    <td style="padding-left:1130px;" colspan="3">প্রধান নির্বাহীর স্বাক্ষর ও সিল</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 65%"></td>
                                                    <td style="text-align: left; width:5%;">নাম </td>
                                                    <td style="width:30%; text-align: left;">: {{ $renewInfoData->chief_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 65%"></td>
                                                    <td style="text-align: left; width: 5%;">পদবি </td>
                                                    <td style="width:30%; text-align: left;">: {{ $renewInfoData->chief_desi }}</td>
                                                </tr>

                                                <tr>
                                                    <td style="width: 65%"></td>
                                                    <td style="text-align: left; width: 5%;">তারিখ </td>

                                                    <td style="width:30%; text-align: left;">: {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime(\Carbon\Carbon::parse($renewInfoData->created_at)->toDateString()))) }}</td>

                                                </tr>
                                            </table>

                                        </div>

                                    </div>



                                    <div class="tab-pane fade" id="pills-darkdoc" role="tabpanel"
                                         aria-labelledby="pills-darkdoc-tab">
                                        <div class="mb-0 m-t-30">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>নথির নাম</th>
                                                    <th>নথি দেখুন</th>
                                                </tr>
                                                {{-- <tr>
                                                    <td>প্রধান নির্বাহীর স্বাক্ষরকৃত এফডি - ৮ ফরম </td>
                                                    <td><a target="_blank"  href="{{ route('verifiedFdEightDownload',base64_encode($renewInfoData->id)) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a></td>
                                                </tr> --}}


                                                <?php


$renewalFileList = DB::table('renewal_files')->where('fd_one_form_id',$form_one_data->id)->latest()->get();




?>



                                                @if($getNgoType == 'Foreign')

                                                @foreach($renewalFileList as $ngoOtherDocListsFirst)


                                                <!--new start -->
                                                @if(empty($ngoOtherDocListsFirst->list_of_board_of_directors_or_board_of_trustees))

                                                @else
                                                <?php

                                                  $file_path = url($ngoOtherDocListsFirst->list_of_board_of_directors_or_board_of_trustees);
                                                  $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                                                  ?>



                                               <tr>
                                                   <td>বোর্ড অব ডিরেক্টরস /বোর্ড অব ট্রাস্টিজ তালিকা (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কতৃক নোটারীকৃত /সত্যায়িত )</td>
                                                   <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'trustees', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
                                                       <i class="fa fa-eye"></i>
                                                   </a></td>
                                               </tr>


                                                      @endif

                                                      <!--end if -->





                                               <!--new start -->
                                               @if(empty($ngoOtherDocListsFirst->organization_by_laws_or_constitution))

                                               @else
                                               <?php

                                               $file_path = url($ngoOtherDocListsFirst->organization_by_laws_or_constitution);
                                               $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                                               ?>


                                               <tr>
                                                   <td> সংস্থার বাই লজ (By laws)/গঠনতন্ত্র  (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কতৃক নোটারীকৃত /সত্যায়িত )</td>
                                                   <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'laws_or_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
                                                       <i class="fa fa-eye"></i>
                                                   </a></td>
                                               </tr>


                                               @endif

                                               <!--end if -->




                                               <!--new start -->
                                               @if(empty($ngoOtherDocListsFirst->work_procedure_of_organization))

                                               @else
                                               <?php

                                               $file_path = url($ngoOtherDocListsFirst->work_procedure_of_organization);
                                               $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                                               ?>

                                               <tr>
                                                   <td> সংস্থার বোর্ড অব ডিরেক্টরস /বোর্ড অব ট্রাস্টিজ সভার কার্যবিবরণী (কার্যবিবরনীতে বোর্ড গঠন সংক্রান্ত ,নিবন্ধন নবায়ন করার প্রস্তাব,গঠনতন্ত্র পরিবর্তন সংক্রান্ত বিষয়াদি উল্লেখপূর্বক ) (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কতৃক নোটারীকৃত /সত্যায়িত )</td>
                                                   <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'work_procedure', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
                                                       <i class="fa fa-eye"></i>
                                                   </a></td>
                                               </tr>



                                               @endif

                                               <!--end if -->




                                               <!--new start -->
                                               @if(empty($ngoOtherDocListsFirst->last_ten_years_audit_report_and_annual_report_of_the_company))

                                               @else
                                               <?php

                                               $file_path = url($ngoOtherDocListsFirst->last_ten_years_audit_report_and_annual_report_of_the_company);
                                               $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                                               ?>

                                               <tr>
                                                   <td>সংস্থার বিগত ১০(দশ ) বছরের অডিট রিপোর্ট  এবং বার্ষিক প্রতিবেদনের সত্যায়িত অনুলিপি </td>
                                                   <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'last_ten_years', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
                                                       <i class="fa fa-eye"></i>
                                                   </a></td>
                                               </tr>


                                               @endif

                                               <!--end if -->



                                               <!--new start -->
                                               @if(empty($ngoOtherDocListsFirst->registration_certificate))

                                               @else
                                               <?php

                                               $file_path = url($ngoOtherDocListsFirst->registration_certificate);
                                               $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                                               ?>


                                               <tr>
                                                   <td> সংস্থার মূল কার্যালয়ের নিবন্ধনপত্রের (সংশ্লিষ্ট দেশের নোটারীকৃত /সত্যায়িত ) অনুলিপি</td>
                                                   <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'registration_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
                                                       <i class="fa fa-eye"></i>
                                                   </a></td>
                                               </tr>



                                               @endif

                                               <!--end if -->



                                                    <!--new start -->
                                               @if(empty($ngoOtherDocListsFirst->attested_copy_of_latest_registration_or_renewal_certificate))

                                               @else
                                               <?php

                                               $file_path = url($ngoOtherDocListsFirst->attested_copy_of_latest_registration_or_renewal_certificate);
                                               $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                                               ?>


                                               <tr>
                                                   <td> সর্বশেষ নিবন্ধন /নবায়ন সনদপত্রের সত্যায়িত অনুলিপি</td>
                                                   <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'registration_or_renewal_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
                                                       <i class="fa fa-eye"></i>
                                                   </a></td>
                                               </tr>



                                               @endif

                                               <!--end if -->



                                                              <!--new start -->
                                               @if(empty($ngoOtherDocListsFirst->right_to_information_act))

                                               @else
                                               <?php

                                               $file_path = url($ngoOtherDocListsFirst->right_to_information_act);
                                               $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                                               ?>

                                               <tr>
                                                   <td>  Right To Information Act- ২০০৯ - এর আওতায় - Focal Point নিয়োগ করত:ব্যুরোকে অবহিতকরণ পত্রের অনুলিপি</td>
                                                   <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'right_to_information_act', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
                                                       <i class="fa fa-eye"></i>
                                                   </a></td>
                                               </tr>



                                               @endif

                                               <!--end if -->


                                                @if($ngoOtherDocListsFirst->constitution_of_the_organization_has_changed == 'Yes')



                                                <!--new start -->
                                                @if(empty($ngoOtherDocListsFirst->the_constitution_of_the_company_along_with_fee_if_changed))

                                                @else
                                                <?php

                                                  $file_path = url($ngoOtherDocListsFirst->the_constitution_of_the_company_along_with_fee_if_changed);
                                                  $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                                                  ?>


                                               <tr>
                                                   <td>সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে থাকলে নির্ধারিত ফি সহ তার সত্যায়িত অনুলিপি</td>
                                                   <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'fee_if_changed', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
                                                       <i class="fa fa-eye"></i>
                                                   </a></td>
                                               </tr>




                                                      @endif

                                                      <!--end if -->



                                               <!--new start -->
                                               @if(empty($ngoOtherDocListsFirst->constitution_approved_by_primary_registering_authority))

                                               @else
                                               <?php

                                               $file_path = url($ngoOtherDocListsFirst->constitution_approved_by_primary_registering_authority);
                                               $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                                               ?>


                                               <tr>
                                                   <td>প্রাথমিক নিবন্ধনকারী কতৃপক্ষের অনুমোদিতো গঠনতন্ত্রের সত্যায়িত কপি</td>
                                                   <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'primary_registering_authority', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
                                                       <i class="fa fa-eye"></i>
                                                   </a></td>
                                               </tr>



                                               @endif

                                               <!--end if -->



                                               <!--new start -->
                                               @if(empty($ngoOtherDocListsFirst->clean_copy_of_the_constitution))

                                               @else
                                               <?php

                                               $file_path = url($ngoOtherDocListsFirst->clean_copy_of_the_constitution);
                                               $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                                               ?>


                                               <tr>
                                                   <td>সংস্থার চেয়ারম্যান ও সেক্রেটারি কর্তৃক যৌথ স্বাক্ষরিত গঠনতন্ত্র পরিচ্ছন্ন কপি</td>
                                                   <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'clean_copy_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
                                                       <i class="fa fa-eye"></i>
                                                   </a></td>
                                               </tr>




                                               @endif

                                               <!--end if -->



                                               <!--new start -->
                                               @if(empty($ngoOtherDocListsFirst->payment_of_change_fee))

                                               @else
                                               <?php

                                               $file_path = url($ngoOtherDocListsFirst->payment_of_change_fee);
                                               $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                                               ?>


                                               <tr>
                                                   <td>  গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ফি জমা প্রদানের চালানের মূলকপি </td>
                                                   <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'payment_of_change_fee', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
                                                       <i class="fa fa-eye"></i>
                                                   </a></td>
                                               </tr>



                                               @endif

                                               <!--end if -->


                                               <!--new start -->
                                               @if(empty($ngoOtherDocListsFirst->section_sub_section_of_the_constitution))

                                               @else
                                               <?php

                                               $file_path = url($ngoOtherDocListsFirst->section_sub_section_of_the_constitution);
                                               $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                                               ?>


                                               <tr>
                                                   <td>গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ও সংযোজনের বিষয়ে সাধারণ সভার কার্যবিবরণীর সত্যায়িত কপি</td>
                                                   <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'section_sub_section_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
                                                       <i class="fa fa-eye"></i>
                                                   </a></td>
                                               </tr>



                                               @endif

                                               <!--end if -->

                                               <!--new start -->
                                               @if(empty($ngoOtherDocListsFirst->previous_constitution_and_current_constitution_compare))

                                               @else
                                               <?php

                                               $file_path = url($ngoOtherDocListsFirst->previous_constitution_and_current_constitution_compare);
                                               $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                                               ?>


                                               <tr>
                                                   <td>পূর্ব গঠনতন্ত্র ও বর্তমান গঠনতন্ত্রের তুলনামূলক বিবরণী (প্রতি পাতায় সভাপতি ও সম্পাদকের যৌথ স্বাক্ষরসহ)</td>
                                                   <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'previous_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
                                                       <i class="fa fa-eye"></i>
                                                   </a></td>
                                               </tr>



                                               @endif

                                               <!--end if -->


                                                @else

                                               <!--new start -->
                                               @if(empty($ngoOtherDocListsFirst->constitution_of_the_organization_if_unchanged))

                                               @else
                                               <?php

                                               $file_path = url($ngoOtherDocListsFirst->constitution_of_the_organization_if_unchanged);
                                               $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                                               ?>


                                               <tr>
                                                   <td>সংস্থার গঠনতন্ত্র পরিবর্তন না হয়ে থাকলে 'পরিবর্তন হয়নি' মর্মে  প্রত্যয়ন কপি (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কতৃক নোটারীকৃত /সত্যায়িত )</td>
                                                   <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'organization_if_unchanged', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
                                                       <i class="fa fa-eye"></i>
                                                   </a></td>
                                               </tr>




                                               @endif

                                               <!--end if -->
                                                @endif


                                               @endforeach

                                                @else



                                                @foreach($renewalFileList as $ngoOtherDocListsFirst)



 <!--new start -->
 @if(empty($ngoOtherDocListsFirst->registration_renewal_fee))

 @else
 <?php

   $file_path = url($ngoOtherDocListsFirst->registration_renewal_fee);
   $filename  = pathinfo($file_path, PATHINFO_FILENAME);


   ?>



<tr>
    <td>নিবন্ধন নবায়ন ফি জমাদানের চালানের মূলকপিসহ সত্যায়িত অনুলিপি</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'registration_renewal_fee', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
        <i class="fa fa-eye"></i>
    </a></td>
</tr>


       @endif

       <!--end if -->



       <!--new start -->
 @if(empty($ngoOtherDocListsFirst->committee_members_list))

 @else
 <?php

   $file_path = url($ngoOtherDocListsFirst->committee_members_list);
   $filename  = pathinfo($file_path, PATHINFO_FILENAME);


   ?>



<tr>
    <td>নিবন্ধনকালীন দাখিলকৃত সাধারণ ও নির্বাহী কমিটির তালিকা এবং বর্তমান সাধারণ সদস্য ও নির্বাহী কমিটির তালিকা</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'committee_members_list', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
        <i class="fa fa-eye"></i>
    </a></td>
</tr>


       @endif

       <!--end if -->



              <!--new start -->
 @if(empty($ngoOtherDocListsFirst->approval_of_executive_committee))

 @else
 <?php

   $file_path = url($ngoOtherDocListsFirst->approval_of_executive_committee);
   $filename  = pathinfo($file_path, PATHINFO_FILENAME);


   ?>



<tr>
    <td>                                                                                    উপস্থিত সাধারণ সদস্যদের উপস্থিতির স্বাক্ষরিত তালিকাসহ নির্বাহী কমিটি অনুমোদন সংক্রান্ত সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'approval_of_executive_committee', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
        <i class="fa fa-eye"></i>
    </a></td>
</tr>


       @endif

       <!--end if -->

              <!--new start -->
              @if(empty($ngoOtherDocListsFirst->nid_and_image_of_executive_committee_members))

              @else
              <?php

                $file_path = url($ngoOtherDocListsFirst->nid_and_image_of_executive_committee_members);
                $filename  = pathinfo($file_path, PATHINFO_FILENAME);


                ?>



             <tr>
                 <td> নির্বাহী কমিটির সদস্যদের পাসপোর্ট সাইজের ছবিসহ জাতীয় পরিচয়পত্রে সত্যায়িত অনুলিপি</td>
                 <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'nid_and_image_of_executive_committee_members', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
                     <i class="fa fa-eye"></i>
                 </a></td>
             </tr>


                    @endif

                    <!--end if -->






 <!--new start -->
 @if(empty($ngoOtherDocListsFirst->list_of_board_of_directors_or_board_of_trustees))

 @else
 <?php

   $file_path = url($ngoOtherDocListsFirst->list_of_board_of_directors_or_board_of_trustees);
   $filename  = pathinfo($file_path, PATHINFO_FILENAME);


   ?>



<tr>
    <td>বোর্ড অব ডিরেক্টরস /বোর্ড অব ট্রাস্টিজ তালিকা (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কতৃক নোটারীকৃত /সত্যায়িত )</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'trustees', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
        <i class="fa fa-eye"></i>
    </a></td>
</tr>


       @endif

       <!--end if -->





<!--new start -->
@if(empty($ngoOtherDocListsFirst->organization_by_laws_or_constitution))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->organization_by_laws_or_constitution);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>
    <td> অন্য কোনো আইনে নিবন্ধিত হলে সংশিষ্ট কতৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকার সত্যায়িত অনুলিপি</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'laws_or_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
        <i class="fa fa-eye"></i>
    </a></td>
</tr>


@endif

<!--end if -->




<!--new start -->
@if(empty($ngoOtherDocListsFirst->work_procedure_of_organization))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->work_procedure_of_organization);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>

<tr>
    <td>প্রাথমিক নিবন্ধনকারী কতৃপক্ষের অনুমোদিত গঠনতন্ত্রের সত্যায়িত অনুলিপি</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'work_procedure', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
        <i class="fa fa-eye"></i>
    </a></td>
</tr>



@endif

<!--end if -->




<!--new start -->
@if(empty($ngoOtherDocListsFirst->last_ten_years_audit_report_and_annual_report_of_the_company))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->last_ten_years_audit_report_and_annual_report_of_the_company);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>

<tr>
    <td>সংস্থার বিগত ১০(দশ ) বছরের অডিট রিপোর্ট  এবং বার্ষিক প্রতিবেদনের সত্যায়িত অনুলিপি </td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'last_ten_years', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
        <i class="fa fa-eye"></i>
    </a></td>
</tr>


@endif

<!--end if -->



<!--new start -->
@if(empty($ngoOtherDocListsFirst->registration_certificate))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->registration_certificate);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>
    <td> সংস্থার মূল কার্যালয়ের নিবন্ধনপত্রের (সংশ্লিষ্ট দেশের নোটারীকৃত /সত্যায়িত ) অনুলিপি</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'registration_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
        <i class="fa fa-eye"></i>
    </a></td>
</tr>



@endif

<!--end if -->



     <!--new start -->
@if(empty($ngoOtherDocListsFirst->attested_copy_of_latest_registration_or_renewal_certificate))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->attested_copy_of_latest_registration_or_renewal_certificate);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>
    <td> সর্বশেষ নিবন্ধন /নবায়ন সনদপত্রের সত্যায়িত অনুলিপি</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'registration_or_renewal_certificate', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
        <i class="fa fa-eye"></i>
    </a></td>
</tr>



@endif

<!--end if -->



               <!--new start -->
@if(empty($ngoOtherDocListsFirst->right_to_information_act))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->right_to_information_act);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>

<tr>
    <td>  Right To Information Act- ২০০৯ - এর আওতায় - Focal Point নিয়োগ করত:ব্যুরোকে অবহিতকরণ পত্রের অনুলিপি</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'right_to_information_act', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
        <i class="fa fa-eye"></i>
    </a></td>
</tr>



@endif

<!--end if -->


 @if($ngoOtherDocListsFirst->constitution_of_the_organization_has_changed == 'Yes')



 <!--new start -->
 @if(empty($ngoOtherDocListsFirst->the_constitution_of_the_company_along_with_fee_if_changed))

 @else
 <?php

   $file_path = url($ngoOtherDocListsFirst->the_constitution_of_the_company_along_with_fee_if_changed);
   $filename  = pathinfo($file_path, PATHINFO_FILENAME);


   ?>


<tr>
    <td>সংস্থার গঠনতন্ত্র পরিবর্তন হয়ে থাকলে নির্ধারিত ফি সহ তার সত্যায়িত অনুলিপি</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'fee_if_changed', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
        <i class="fa fa-eye"></i>
    </a></td>
</tr>




       @endif

       <!--end if -->



<!--new start -->
@if(empty($ngoOtherDocListsFirst->constitution_approved_by_primary_registering_authority))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->constitution_approved_by_primary_registering_authority);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>
    <td>প্রাথমিক নিবন্ধনকারী কতৃপক্ষের অনুমোদিতো গঠনতন্ত্রের সত্যায়িত কপি</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'primary_registering_authority', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
        <i class="fa fa-eye"></i>
    </a></td>
</tr>



@endif

<!--end if -->



<!--new start -->
@if(empty($ngoOtherDocListsFirst->clean_copy_of_the_constitution))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->clean_copy_of_the_constitution);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>
    <td>সংস্থার চেয়ারম্যান ও সেক্রেটারি কর্তৃক যৌথ স্বাক্ষরিত গঠনতন্ত্র পরিচ্ছন্ন কপি</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'clean_copy_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
        <i class="fa fa-eye"></i>
    </a></td>
</tr>




@endif

<!--end if -->



<!--new start -->
@if(empty($ngoOtherDocListsFirst->payment_of_change_fee))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->payment_of_change_fee);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>
    <td>  গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ফি জমা প্রদানের চালানের মূলকপি </td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'payment_of_change_fee', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
        <i class="fa fa-eye"></i>
    </a></td>
</tr>



@endif

<!--end if -->


<!--new start -->
@if(empty($ngoOtherDocListsFirst->section_sub_section_of_the_constitution))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->section_sub_section_of_the_constitution);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>
    <td>গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ও সংযোজনের বিষয়ে সাধারণ সভার কার্যবিবরণীর সত্যায়িত কপি</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'section_sub_section_of_the_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
        <i class="fa fa-eye"></i>
    </a></td>
</tr>



@endif

<!--end if -->

<!--new start -->
@if(empty($ngoOtherDocListsFirst->previous_constitution_and_current_constitution_compare))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->previous_constitution_and_current_constitution_compare);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>
    <td>পূর্ব গঠনতন্ত্র ও বর্তমান গঠনতন্ত্রের তুলনামূলক বিবরণী (প্রতি পাতায় সভাপতি ও সম্পাদকের যৌথ স্বাক্ষরসহ)</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'previous_constitution', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
        <i class="fa fa-eye"></i>
    </a></td>
</tr>



@endif

<!--end if -->


 @else

<!--new start -->
@if(empty($ngoOtherDocListsFirst->constitution_of_the_organization_if_unchanged))

@else
<?php

$file_path = url($ngoOtherDocListsFirst->constitution_of_the_organization_if_unchanged);
$filename  = pathinfo($file_path, PATHINFO_FILENAME);


?>


<tr>
    <td>সংস্থার গঠনতন্ত্র পরিবর্তন না হয়ে থাকলে 'পরিবর্তন হয়নি' মর্মে  প্রত্যয়ন কপি (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কতৃক নোটারীকৃত /সত্যায়িত )</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewalFileDownload', ['title' =>'organization_if_unchanged', 'id' =>$ngoOtherDocListsFirst->id]) }}" >
        <i class="fa fa-eye"></i>
    </a></td>
</tr>




@endif

<!--end if -->
 @endif


@endforeach


                                                @endif








                                            </table>
                                        </div>
                                    </div>



                                    @if($renew_status == "Accepted")








                                    <div class="tab-pane fade" id="pills-darkdoc1" role="tabpanel"
                                         aria-labelledby="pills-darkdoc1-tab">
                                        <div class="mb-0 m-t-30">
<!--cc-->
<table class="table table-bordered">
    <tbody>
    <tr>
        <td>১.</td>
        <td colspan="3">সংস্থার বিবরণ:</td>
    </tr>
    <tr>
        <td></td>
        <td>(i)</td>
        <td>ডাইরি নম্বর </td>
        <td>:


            @if($ngoTypeData->ngo_type_new_old == 'Old')

            {{ App\Http\Controllers\Admin\CommonController::englishToBangla($ngoTypeData->registration)}}
            @else




          @if($form_one_data->registration_number == 0)


          @else

          {{ App\Http\Controllers\Admin\CommonController::englishToBangla($form_one_data->registration_number)}}

          @endif


          @endif



      </td>
    </tr>
    <tr>
        <td></td>
        <td>(i)</td>
        <td>সংস্থার নাম</td>
        <td>: {{ $form_one_data->organization_name_ban }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(iii)</td>
        <td>সংস্থার ঠিকানা</td>
        <td>: {{ $form_one_data->address_of_head_office }}</td>
    </tr>

    <tr>
        <td></td>
        <td>(iv)</td>
        <td>মেয়াদ শুরু </td>
        <td>:

          @if(empty($duration_list_all))


          @else

          {{App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($duration_list_all )))}}
          @endif

      </td>
    </tr>


    <tr>
        <td></td>
        <td>(v)</td>
        <td>মেয়াদ শেষ </td>
        <td>:
            @if(empty($duration_list_all))


          @else
          {{App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($duration_list_all1 )))}}
      @endif
      </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3"><!-- Button trigger modal -->

           @if($form_one_data->registration_number_given_by_admin == 0)
           <button type="button" disabled class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            প্রিন্ট করুন
            </button>
          @else
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                প্রিন্ট করুন
            </button>
          @endif

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">সার্টিফিকেট প্রিন্ট করুন</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                    <form action="{{ route('printCertificateView') }}" method="get">

                        <input type="hidden" name="user_id" value="{{ $form_one_data->user_id  }}"/>

                        <input type="date" name="main_date" value="<?php   echo  date('Y-m-d'); ?>" class="form-control"/>

                        <button type="submit" class="btn btn-primary mt-4" type="submit">
                            প্রিন্ট করুন
                          </button>
                    </form>
                  </div>

                </div>
              </div>
            </div></td>
    </tr>
    </tbody>
</table>

<!---vvvvvvvvv-->
                                        </div>
                                    </div>
                                    @else
                                    <?php
                                    $fdOneFormId = DB::table('fd_one_forms')->where('id',$form_one_data->id)->value('user_id');
                                    $get_email_from_user = DB::table('users')->where('id',$fdOneFormId)->value('email');

                                            ?>
                                    <!--new-->

                                    <div class="tab-pane fade" id="pills-darkdoc1" role="tabpanel"
                                         aria-labelledby="pills-darkdoc1-tab">
                                        <div class="mb-0 m-t-30">


                                            <form action="{{ route('updateStatusRenewForm') }}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{ $mainIdR->id }}" name="id" />
                                                <input type="hidden" value="{{ $get_email_from_user }}" name="email" />
                                                <select class="form-control form-control-sm" name="status" >

                                                    <option value="Ongoing" {{ $mainIdR->status == 'Ongoing' ? 'selected':''  }}>চলমান</option>
                                                    <option value="Accepted" {{ $mainIdR->status == 'Accepted' ? 'selected':''  }}>গৃহীত</option>
                                                    <option value="Rejected" {{ $mainIdR->status == 'Rejected' ? 'selected':''  }}>প্রত্যাখ্যান করুন</option>

                                                </select>

                                                <button type="submit" class="btn btn-primary mt-5">আপডেট করুন</button>

                                              </form>


                                        </div>
                                    </div>

                                    <!--add new -->

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- profile post end-->
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
        }
        else{
            $('#rValue').hide();
        }
      });
    });
    </script>
@endsection
