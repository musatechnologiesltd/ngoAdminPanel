@extends('admin.master.master')

@section('title')
এনজিও নাম পরিবর্তন  এর  বিস্তারিত  | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>এনজিও নাম পরিবর্তন  তথ্য</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">এনজিও নাম পরিবর্তন  তথ্য</li>
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


                               @if($getNgoType == 'Foreign')
                               <h6>বিদেশী এনজিও </h6>
                               @else
                               <h6>দেশি এনজিও </h6>

                               @endif
                               @if($ngoTypeData->ngo_type_new_old == 'Old')
                               <h6>এনজিও'র ধরন : পুরাতন</h6>
                               @else

                               <h6>এনজিও'র ধরন : নতুন</h6>
                               @endif


                            </div>
                            <div class="follow">
                                <ul class="follow-list">
                                    <li>
                                        <div class="follow-num">


                                            {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-F-y', strtotime($all_data_for_new_list_all->created_at))) }}



                                        </div>
                                        <span>জমাদানের তারিখ</span>
                                    </li>
                                    <li>
                                        <div class="follow-num"> @if($all_data_for_new_list_all->status == 'Accepted')

                                            <button class="btn btn-secondary " type="button">
                                                গৃহীত

                                            </button>
                                            @elseif($all_data_for_new_list_all->status == 'Ongoing')

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
                                <h5>এনজিও নাম পরিবর্তন  সমস্ত তথ্য</h5>
                            </div>
                            <div class="card-body">


                                <div class="row mb-4">
                                    <div class="col-lg-12">

                                        <div class="text-end">

                                           @if($getformOneId->status == 'Ongoing')
                                            <button onclick="location.href = '{{ route('showDataAll',['status'=>'nameChange','id'=>$getformOneId->id]) }}';" type="button" class="btn btn-primary float-right">ডাক দেখুন</button>

                                            @else

                                            @endif

                                        </div>
                                    </div>
                                </div>


                                <ul class="nav nav-dark" id="pills-darktab" role="tablist">


                                    @if($getNgoType == 'Foreign')

                                    <li class="nav-item"><a class="nav-link active" id="pills-darkdoc-tab"
                                        data-bs-toggle="pill" href="#pills-darkdoc"
                                        role="tab" aria-controls="pills-darkdoc"
                                        aria-selected="false" style=""><i
                                class="icofont icofont-animal-lemur"></i>নথিপত্র</a>
                </li>





                                    @else
                <li class="nav-item"><a class="nav-link active" id="pills-darkprofile-tab"
                                        data-bs-toggle="pill" href="#pills-darkprofile"
                                        role="tab" aria-controls="pills-darkprofile"
                                        aria-selected="false" style=""><i
                                class="icofont icofont-man-in-glasses"></i>ফরম -৮</a>
                </li>




                <li class="nav-item"><a class="nav-link" id="pills-darkdoc-tab"
                                        data-bs-toggle="pill" href="#pills-darkdoc"
                                        role="tab" aria-controls="pills-darkdoc"
                                        aria-selected="false" style=""><i
                                class="icofont icofont-animal-lemur"></i>নথিপত্র</a>
                </li>

                @endif



                                    @if($name_change_status == "Accepted")

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



                                    @if($getNgoType == 'Foreign')
                                    <div class="tab-pane fade " id="pills-darkprofile" role="tabpanel"
                                    aria-labelledby="pills-darkprofile-tab">
                                    @else

                                    <div class="tab-pane fade active show" id="pills-darkprofile" role="tabpanel"
                                         aria-labelledby="pills-darkprofile-tab">

@endif


                                        <div class="mb-0 m-t-30">
                                          <div class="table-responsive">
                                            <table class="table table-bordered overflow-scroll">
                                                <tr>
                                                    <th rowspan="2">ক্রঃ নং</th>
                                                    <th rowspan="2">নাম ও পদবী</th>
                                                    <th rowspan="2">জন্ম তারিখ</th>
                                                    <th rowspan="2">এনএইডি এবং মোবাইল নং</th>
                                                    <th rowspan="2">বাবার নাম</th>
                                                    <th colspan="2">ঠিকানা</th>
                                                    <th rowspan="2">স্বামী/স্ত্রীর নাম</th>
                                                    <th rowspan="2">শিক্ষাগত যোগ্যতা</th>
                                                    <th colspan="3">পেশা</th>
                                                    <th rowspan="2">তিনি কি অন্য কোন এনজিওর সদস্য বা
                                                        পরিষেবাধারী ছিলেন (যদি তা হয় তবে অনুগ্রহ করে
                                                        চিহ্নিত করুন)
                                                    </th>
                                                    <th rowspan="2">মন্তব্য</th>
                                                    <th rowspan="2">স্বাক্ষর এবং তারিখ</th>
                                                </tr>
                                                <tr>
                                                    <th>বর্তমান ঠিকানা</th>
                                                    <th>স্থায়ী ঠিকানা</th>
                                                    <th>সরকারী/আধা সরকারী/সরকারি স্বায়ত্তশাসিত</th>
                                                    <th>ব্যক্তিগত সেবা</th>
                                                    <th>স্ব সেবা</th>
                                                </tr>
                                                @foreach($form_eight_data as $key=>$all_all_parti)
    <tr>
        <td>{{  $key+1 }}</td>
        <td>{{ $all_all_parti->name }} & {{ $all_all_parti->desi }}</td>
        <td>

         <?php   $start_date_one = date("d/m/Y", strtotime($all_all_parti->dob)); ?>


         {{  App\Http\Controllers\Admin\CommonController::englishToBangla($start_date_one) }}


        </td>
        <td>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($all_all_parti->nid_no) }} & {{ App\Http\Controllers\Admin\CommonController::englishToBangla($all_all_parti->phone) }}</td>
        <td>{{ $all_all_parti->father_name }}</td>
        <td>{{ $all_all_parti->present_address }}</td>
        <td>{{ $all_all_parti->permanent_address }}</td>
        <td>{{ $all_all_parti->name_supouse }}</td>
        <td>{{ $all_all_parti->edu_quali }}</td>
        <td>

            @if($all_all_parti->profession  == 'Govt./Semi Govt./Govt Autonomous' || $all_all_parti->profession  == 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত')

            {{ $all_all_parti->job_des }}
            @else
-
            @endif


        </td>
        <td>@if($all_all_parti->profession  == 'Private Service' || $all_all_parti->profession  == 'ব্যক্তিগত সেবা')

            {{ $all_all_parti->job_des }}
            @else
-
            @endif</td>
        <td>@if($all_all_parti->profession  == 'Self Service' || $all_all_parti->profession  == 'স্ব সেবা')

            {{ $all_all_parti->job_des }}
            @else
-
            @endif</td>
        <td>{{ $all_all_parti->service_status }}</td>
        <td></td>
        <td>


        </td>

    </tr>
    @endforeach
                                            </table>
                                          </div>
                                        </div>
                                    </div>


                                    @if($getNgoType == 'Foreign')

                                    <div class="tab-pane fade active show" id="pills-darkdoc" role="tabpanel"
                                    aria-labelledby="pills-darkdoc-tab">


                                    @else

                                    <div class="tab-pane fade" id="pills-darkdoc" role="tabpanel"
                                         aria-labelledby="pills-darkdoc-tab">

                                         @endif




                                        <div class="mb-0 m-t-30">
                                            <table class="table table-bordered">
                                                <tr>

                                                    <th>নথি দেখুন</th>
                                                </tr>


                                                @if($getNgoType == 'Foreign')



                                                @foreach($allNameChangeDoc as $key=>$AllNameChangeInfoDoc)



                                                @if(($key+1) ==1)

                                                <tr>
                                                    <td>


                                                <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                    ০২টি জাতীয় পত্রিকায় ( বাংলা ও ইংরেজী পত্রিকায় "নাম পরিবর্তন বিষয়ে বিজ্ঞাপনের মূলকপি
                                               </a>
                                            </td>

                                        </tr>

                                                @elseif(($key+1) ==2)

                                                <tr>
                                                    <td>
                                                <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                    নাম পরিবর্তন ফি বাবদ-২৬,০০০/- (ছাব্বিশ হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপি এবং ১৫% ভ্যাট (কোড নং - ১-১১৩৩ -০০৩৫ - ০৩১১) প্রদানপূর্বক চালানের মূলকপিসহ
                                               </a>

                                            </td>

                                        </tr>
                                               @elseif(($key+1) ==3)

                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                সংশ্লিষ্ট দেশের বোর্ড অব ডিরেক্টরস /বোর্ড অব ট্রাস্টির তালিকা ( সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত )
                                           </a>

                                        </td>

                                    </tr>
                                               @elseif(($key+1) ==4)


                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                               নাম পরিবর্তন বিষয়ে সংশ্লিষ্ট দেশের বোর্ড অব ডিরেক্টরস /বোর্ড অব ট্রাস্টির সিদ্ধান্তের কপি  (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত মূলকপিসহ )
                                               </a>

                                            </td>

                                        </tr>
                                               @elseif(($key+1) ==5)

                                               <tr>
                                                <td>


                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                ৩০০/তিনশত) টাকার স্টাম্পে নাম পরিবর্তনের বিষয়ে এফিডেবিট এর কপি
                                                </a>


                                            </td>

                                        </tr>

                                               @elseif(($key+1) ==6)

                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                এনজিও বিষয়ক ব্যুরোর মুল সনদপত্র
                                                </a>
                                            </td>

                                        </tr>
                                               @elseif(($key+1) ==7)

                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                সংস্থার পরিবর্তিত নামের সনদপত্র /ইনকর্পোরেটর সার্টিফিকেট (সংশ্লিষ্ট দেশের নোটারীকৃত মূলকপি )
                                                </a>
                                            </td>

                                        </tr>
                                               @elseif(($key+1) ==8)

                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                সংস্থার পরিবর্তিত নামের বাই লজ (By Laws)/গঠনতন্ত্রের কপি (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কতৃক নোটারীকৃত মূলকপিসহ )
                                                </a>

                                            </td>

                                        </tr>

                                               @elseif(($key+1) ==9)

                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                সংস্থার পূর্ববর্তী নামের সকল দায় -দায়িত্ব বর্তমানে পরিবর্তিত নামের সংস্থার উপর বর্তাইবে মর্মে অঙ্গীকার নামা (সংস্থার প্রধান কতৃক স্বাক্ষরিত )
                                                </a>

                                            </td>

                                        </tr>

                                               @elseif(($key+1) ==10)


                                               <tr>
                                                <td>
                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                ২০১০-২০১১ অর্থবছর হতে হালনাগাদ পর্যন্ত সংস্থার নিবন্ধন/নিবন্ধন নবায়ন /নাম পরিবর্তন /গঠনতন্ত্রের যে কোনো ধারা পরিবর্তনের বিষয়ের দাখিলকৃত ফি এর ১৫% বকেয়া ভ্যাট (যদি ইতিমধ্যে প্রদান করা হয়ে না থাকে ) সংশ্লিষ্ট কোডে
                                                জমাপূর্বক চালানের মুলকপিসহ
                                                </a>

                                            </td>

                                        </tr>

                                               @elseif(($key+1) ==11)
                                               <tr>
                                                <td>
                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                গঠনতন্ত্র পরিবর্তন ফি বাবদ-১৩,০০০/ (তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপি এবং ১৫% ভ্যাট (কোড নং - ১-১১৩৩ -০০৩৫ - ০৩১১) প্রদানপূর্বক চালানের মূলকপিসহ
                                                </a>

                                            </td>

                                        </tr>


                                               @elseif(($key+1) ==12)

                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                প্রাথমিক নিবন্ধনকারী কতৃপক্ষের অনুমোদিতো গঠনতন্ত্রের সত্যায়িত কপি
                                                </a>

                                            </td>

                                        </tr>

                                               @elseif(($key+1) ==13)

                                               <tr>
                                                <td>


                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                সংস্থার চেয়ারম্যান ও সেক্রেটারি কর্তৃক যৌথ স্বাক্ষরিত গঠনতন্ত্র পরিচ্ছন্ন কপি
                                                </a>
                                            </td>

                                        </tr>


                                               @elseif(($key+1) ==14)

                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ফি জমা প্রদানের চালানের মূলকপি
                                                </a>

                                            </td>

                                        </tr>

                                               @elseif(($key+1) ==15)

                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ও সংযোজনের বিষয়ে সাধারণ সভার কার্যবিবরণীর সত্যায়িত কপি
                                                </a>

                                            </td>

                                        </tr>
                                               @elseif(($key+1) ==16)

                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                পূর্ব গঠনতন্ত্র ও বর্তমান গঠনতন্ত্রের তুলনামূলক বিবরণী (প্রতি পাতায় সভাপতি ও সম্পাদকের যৌথ স্বাক্ষরসহ)
                                                </a>

                                            </td>

                                        </tr>
                                               @endif




                                                @endforeach





                                                @else
                                                @foreach($allNameChangeDoc as $key=>$AllNameChangeInfoDoc)



                                                @if(($key+1) ==1)

<tr>
                                               <td>

                                                <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                    ০২টি জাতীয় পত্রিকায় ( বাংলা ও ইংরেজী পত্রিকায় "নাম পরিবর্তন বিষয়ে বিজ্ঞাপনের মূলকপি
                                               </a>
                                            </td>
                                        </tr>


                                                @elseif(($key+1) ==2)


                                                <tr>
                                                    <td>


                                                <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                    নাম পরিবর্তন ফি বাবদ-২৬,০০০/- (ছাব্বিশ হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপি এবং ১৫% ভ্যাট (কোড নং - ১-১১৩৩ -০০৩৫ - ০৩১১) প্রদানপূর্বক চালানের মূলকপিসহ
                                               </a>

                                            </td>

                                        </tr>
                                               @elseif(($key+1) ==3)


<tr>
                                               <td>
                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                ফরম -৮ মোতাবেক নির্বাহী কমিটির তালিকা
                                           </a>


                                        </td>

                                    </tr>


                                               @elseif(($key+1) ==4)

                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                নির্বাহী কমিটির সদস্যদের ভোটার আইডি কার্ডের ফটোকপিসহ সত্যায়িত পাসপোর্ট সাইজের ছবি
                                               </a>

                                            </td>

                                        </tr>


                                               @elseif(($key+1) ==5)

                                               <tr>
                                                <td>


                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                ৩০০/তিনশত) টাকার স্টাম্পে নাম পরিবর্তনের বিষয়ে এফিডেবিট এর কপি
                                                </a>


                                            </td>

                                        </tr>

                                               @elseif(($key+1) ==6)

                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                এনজিও বিষয়ক ব্যুরোর মুল সনদপত্র
                                                </a>

                                            </td>

                                        </tr>

                                               @elseif(($key+1) ==7)


                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                পরিবর্তিত নামে প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের সত্যায়িত সনদপত্রের কপি
                                                </a>

                                            </td>

                                        </tr>

                                               @elseif(($key+1) ==8)


                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকার সত্যায়িত কপি
                                                </a>

                                            </td>

                                        </tr>

                                               @elseif(($key+1) ==9)


                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                সর্বশেষ সাধারণ সদস্যদের তালিকা
                                                </a>

                                                @elseif(($key+1) == 10)

                                                <tr>
                                                    <td>

                                                <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                    নাম পরিবর্তন সংক্রান্ত বিষয়ে সাধারণ সভার কা্যবিবরণীর (উপস্থিত সদস্যদের তালিকাসহ) সত্যায়িত কপি
                                                    </a>

                                                </td>

                                            </tr>
                                                    @elseif(($key+1) == 11)

                                                    <tr>
                                                        <td>

                                                    <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                        পূর্ববর্তী নামের সকল দায়-দায়িত্ব বর্তমানে পরিবর্তিত নামের সংস্থার উপর বর্তাইবে মর্মে অংগীকার নামা (সভাপতি ও সাধারণ সম্পাদক কর্তৃক স্বাক্ষরিত)।
                                                        </a>

                                                        @elseif(($key+1) == 12)

                                                        <tr>
                                                            <td>

                                                        <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                            দাখিলকৃত চালানের ডপর ১৫% ভ্যাট নির্ধারিত কোডে জমাপূর্বক চালানের মূলকলিসহ (কোড নং-১-১১৩৩-০০৩৫-০৩১১)
                                                            </a>

                                                        </td>

                                                    </tr>

                                               @elseif(($key+1) ==13)


                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                ২০১০-২০১১ অর্থবছর হতে হালনাগাদ পর্যন্ত সংস্থার নিবন্ধন/নিবন্ধন নবায়ন /নাম পরিবর্তন /গঠনতন্ত্রের যে কোনো ধারা পরিবর্তনের বিষয়ের দাখিলকৃত ফি এর ১৫% বকেয়া ভ্যাট (যদি ইতিমধ্যে প্রদান করা হয়ে না থাকে ) সংশ্লিষ্ট কোডে
                                                জমাপূর্বক চালানের মুলকপিসহ
                                                </a>
                                            </td>

                                        </tr>
                                               @elseif(($key+1) ==14)


                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                গঠনতন্ত্র পরিবর্তন ফি বাবদ-১৩,০০০/ (তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপি এবং ১৫% ভ্যাট (কোড নং - ১-১১৩৩ -০০৩৫ - ০৩১১) প্রদানপূর্বক চালানের মূলকপিসহ
                                                </a>

                                            </td>

                                        </tr>
                                               @elseif(($key+1) ==15)

                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                প্রাথমিক নিবন্ধনকারী কতৃপক্ষের অনুমোদিতো গঠনতন্ত্রের সত্যায়িত কপি
                                                </a>


                                               @elseif(($key+1) ==16)


                                               <tr>
                                                <td>


                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                সংস্থার চেয়ারম্যান ও সেক্রেটারি কর্তৃক যৌথ স্বাক্ষরিত গঠনতন্ত্র পরিচ্ছন্ন কপি
                                                </a>

                                            </td>

                                        </tr>
                                               @elseif(($key+1) ==17)


                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ফি জমা প্রদানের চালানের মূলকপি
                                                </a>
                                            </td>

                                        </tr>
                                               @elseif(($key+1) ==18)


                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ও সংযোজনের বিষয়ে সাধারণ সভার কার্যবিবরণীর সত্যায়িত কপি
                                                </a>
                                               @elseif(($key+1) ==19)


                                               <tr>
                                                <td>

                                               <a target="_blank"  href="{{ route('nameChangeDoc',$AllNameChangeInfoDoc->id) }}" >
                                                পূর্ব গঠনতন্ত্র ও বর্তমান গঠনতন্ত্রের তুলনামূলক বিবরণী (প্রতি পাতায় সভাপতি ও সম্পাদকের যৌথ স্বাক্ষরসহ)
                                                </a>


                                            </td>

                                               </tr>
                                               @endif




                                                @endforeach
                                            @endif
                                            </table>
                                        </div>
                                    </div>



                                    @if($name_change_status == "Accepted")







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

    @if($ngoTypeData->ngo_type_new_old == 'Old')
    <tr>
        <td></td>
        <td>(i)</td>
        <td>নিবন্ধন নম্বর</td>
        <td>:







          {{ App\Http\Controllers\Admin\CommonController::englishToBangla($ngoTypeData->registration)}}





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
        <td>মেয়াদ শুরু </td>
        <td>:
<?php

$lastDate = date('Y-m-d', strtotime($ngoTypeData->last_renew_date));
$newdate = date("Y-m-d",strtotime ( '-10 year' , strtotime ( $lastDate ) )) ;

?>


          {{App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($newdate)))}}


      </td>
    </tr>


    <tr>
        <td></td>
        <td>(iv)</td>
        <td>শেষ নবায়ন তারিখ</td>
        <td>:



          {{App\Http\Controllers\Admin\CommonController::englishToBangla($ngoTypeData->last_renew_date)}}


      </td>
    </tr>


    @else
    <tr>
        <td></td>
        <td>(i)</td>
        <td>ডাইরি নম্বর </td>
        <td>:





          @if($form_one_data->registration_number == 0)


          @else

          {{ $form_one_data->registration_number}}

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
    @endif
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



                                            <form action="{{ route('updateStatusNameChangeForm') }}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{ $getformOneId->id }}" name="id" />
                                                <input type="hidden" value="{{ $get_email_from_user }}" name="email" />
                                                <select class="form-control form-control-sm" name="status" id="regStatus">

                                                    <option value="Ongoing" {{ $getformOneId->status == 'Ongoing' ? 'selected':''  }}>চলমান</option>
                                                    <option value="Accepted" {{ $getformOneId->status == 'Accepted' ? 'selected':''  }}>গৃহীত</option>
                                                    <option value="Correct" {{ $all_data_for_new_list_all->status == 'Correct' ? 'selected':''  }}>সংশোধন করুন</option>
                                                    <option value="Rejected" {{ $getformOneId->status == 'Rejected' ? 'selected':''  }}>প্রত্যাখ্যান করুন</option>

                                                </select>

                                                <div id="rValueStatus" style="display:none;">
                                                    <label>বিস্তারিত লিখুন:</label>
                                                    <textarea class="form-control form-control-sm" name="comment"></textarea>
                                                </div>

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
