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
            <ul class="nav nav-dark" id="pills-darktab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="pills-darkhome-tab"
                                        data-bs-toggle="pill" href="#pills-darkhome"
                                        role="tab" aria-controls="pills-darkhome"
                                        aria-selected="true" style=""><i
                                class="icofont icofont-ui-home"></i>এফডি-৯(১) ফরম</a></li>
                <li class="nav-item"><a class="nav-link" id="pills-darkprofile-tab"
                                        data-bs-toggle="pill" href="#pills-darkprofile"
                                        role="tab" aria-controls="pills-darkprofile"
                                        aria-selected="false" style=""><i
                                class="icofont icofont-man-in-glasses"></i>নথিপত্র</a>
                </li>


                <li class="nav-item"><a class="nav-link" id="pills-darkdoc1-tab"
                    data-bs-toggle="pill" href="#pills-darkdoc1"
                    role="tab" aria-controls="pills-darkdoc1"
                    aria-selected="false" style=""><i
            class="icofont icofont-animal-lemur"></i>স্টেটাস আপডেট করুন </a>
             </li>



            </ul>
            <div class="tab-content" id="pills-darktabContent">
                <div class="tab-pane fade active show" id="pills-darkhome"
                     role="tabpanel" aria-labelledby="pills-darkhome-tab">
                    <div class="mb-0 m-t-30">
                        @if(!$dataFromNVisaFd9Fd1->verified_fd_nine_one_form)
                        এনজিও প্রধান নির্বাহীর স্বাক্ষরকৃত পিডিএফ জমা দেয়নি
                        @else
                        <object
                        data='{{ $ins_url }}{{ 'public/'.$dataFromNVisaFd9Fd1->verified_fd_nine_one_form}}'
                        type="application/pdf"
                        width="100%"
                        height="678"
                      >

                        <iframe
                          src='{{ $ins_url }}{{ 'public/'.$dataFromNVisaFd9Fd1->verified_fd_nine_one_form}}'
                          width="100%"
                          height="900"
                        >
                        <p>This browser does not support PDF!</p>
                        </iframe>
                      </object>

                        @endif
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



                <div class="tab-pane fade" id="pills-darkdoc1" role="tabpanel"
                aria-labelledby="pills-darkdoc1-tab">
               <div class="mb-0 m-t-30">


                   <form action="{{ route('statusUpdateForFd9One') }}" method="post">
                       @csrf


                       <input type="hidden" value="{{ $dataFromNVisaFd9Fd1->mainId }}" name="id" />



                       <label>স্টেটাস:</label>
                       <select class="form-control form-control-sm mt-4" name="status" id="regStatus">

                           <option value="Ongoing" {{ $dataFromNVisaFd9Fd1->status == 'Ongoing' ? 'selected':''  }}>চলমান</option>
                           <option value="Accepted" {{ $dataFromNVisaFd9Fd1->status == 'Accepted' ? 'selected':''  }}>গৃহীত</option>
                           <option value="Rejected" {{ $dataFromNVisaFd9Fd1->status == 'Rejected' ? 'selected':''  }}>প্রত্যাখ্যান করুন</option>

                       </select>



                       <button type="submit" class="btn btn-primary mt-5">আপডেট করুন</button>

                     </form>

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

@endsection
