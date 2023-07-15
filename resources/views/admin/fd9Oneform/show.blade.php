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
                <h3>Working Permit List</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">FD-09(01)</li>
                    <li class="breadcrumb-item">FD-09(01) List</li>
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

        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h5>এফডি-৯(১) ফরম</h5>
                    <p>বিদেশি বিশেষজ্ঞ, উপদেষ্টা, কর্মকর্তা বা স্বেচ্ছাসেবী এর ওয়ার্ক পারমিটের
                        (কার্যানুমতি)
                        আবেদন ফরম</p>
                </div>

                <div>
                    <p>বরাবর <br>
                        মহাপরিচালক <br>
                        এনজিও বিষয় ব্যুরো, ঢাকা <br>
                        জনাব,</p>
                    {{-- <p>নিষয়ঃ </p> --}}
                </div>
            </div>
            <div class="card-body fd0901_text_style">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>বিষয়:</td>
                            <td>{{ $dataFromNVisaFd9Fd1->organization_name_ban }} সংস্থার বিদেশি বিশেষজ্ঞউপদেষ্টা/কর্মকর্ত/সেচ্ছাসেবী "<span>{{ $dataFromNVisaFd9Fd1->foreigner_name_for_subject }}</span>" এর
                                ওয়ার্ক পারমিট প্রসঙ্গে।
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>সূত্র: এনজিও বিষয়ক ব্যুরোর স্মারক নম্বর <span>{{ $dataFromNVisaFd9Fd1->sarok_number }}</span> তারিখ <span>{{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->application_date))) }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p class="mt-3 mb-2">
                    উপর্যুক্ত বিষয় ও সূত্রের বরাতে "<span>{{ $dataFromNVisaFd9Fd1->institute_name }}</span>" সংস্থার "<span>{{ $dataFromNVisaFd9Fd1->prokolpo_name }}</span>" প্রকল্পের আওতায় "<span>{{ $dataFromNVisaFd9Fd1->designation_name }}</span>" হিসেবে বিদেশী বিশেষজ্ঞ/
                    উপদেষ্টা/কর্মকর্তা/স্বেচ্ছাসেবী <span>{{ $dataFromNVisaFd9Fd1->foreigner_name_for_body }}</span> কে <span>{{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->expire_from_date))) }}</span> খ্রি: হতে <span>{{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->expire_to_date))) }}</span> পর্যন্ত সময়ের জন্য নিয়োগ করা হয়েছে। সংস্থার অনুকূলে
                    উক্ত ব্যাক্তির অনুমোদিত সময়ের জন্য ওয়ার্ক পারমিট ইস্যু করার জন্য ওয়ার্ক পারমিট ইস্যু করার
                    জন্য একসাথে নিম্ন বর্ণিত কাগজপত্র সংযুক্ত করা হল:
                </p>

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
                            <a target="_blank"  href="{{ route('fd9OneDownload',['cat'=>'appoinmentLetter','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
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
                            <a target="_blank"  href="{{ route('fd9OneDownload',['cat'=>'fd9Copy','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
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
                            <a target="_blank"  href="{{ route('fd9OneDownload',['cat'=>'visacopy','id'=>$dataFromNVisaFd9Fd1->id]) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> Open </a>
                            @endif
{{-- <a href="{{ route('nVisaCopyDownload',$dataFromNVisaFd9Fd1->id) }}" target="_blank">{{ $filename.'.'.$extension  }}</a>, --}}
                            {{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->arrival_date_in_nvisa))) }}</td>
                        </tr>
                    </tbody>
                </table>

                <p class="mb-3">এমতবস্থায়, অত্র সংস্থার উল্লেখিত পদে <span>{{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->proposed_from_date))) }}</span> হতে <span>{{ str_replace($engDATE,$bangDATE,date('d-m-Y', strtotime($dataFromNVisaFd9Fd1->proposed_from_date))) }}</span> মেয়াদে উক্ত বিদেশি কর্মকর্তাকে ওয়ার্ক পারমিট ইস্যু করার জন্য বিনীত অনুরধ করেছি।</p>

                <div class="row">
                    <div class="col-lg-6 col-sm-12"></div>
                    <div class="col-lg-6 col-sm-12">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td>প্রধান নির্বাহীর স্বাক্ষর ও সিল</td>
                            </tr>
                            <tr>
                                <td>নামঃ</td>
                            </tr>
                            <tr>
                                <td>পদবীঃ</td>
                            </tr>
                            <tr>
                                <td>তারিখঃ</td>
                            </tr>
                            </tbody>
                        </table>
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

@endsection
