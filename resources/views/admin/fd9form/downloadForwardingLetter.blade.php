<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('/') }}public/front/assets/css/style.css" rel="stylesheet">
    <style>
         body,h5,h4,h3 {
            font-family: 'bangla', sans-serif;
            font-size: 14px;

        }
    </style>
</head>
<body>
    <?php
 $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
      'May','June','July','August','September','October','November','December','Saturday','Sunday',
      'Monday','Tuesday','Wednesday','Thursday','Friday');
      $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
      'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
      বুধবার','বৃহস্পতিবার','শুক্রবার'
      );



?>
 <?php


 $forwardingLetterData =DB::table('forwarding_letters')
->where('fd9_form_id',$dataFromNVisaFd9Fd1->id)->first();



 ?>
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
                        <a target="_blnak" href="{{ route('fdNinePdfDownload',$dataFromNVisaFd9Fd1->id) }}" class="btn btn-outline-success"><i
                                    class="fa fa-file-pdf-o"></i>
                            দেখুন
                        </a>
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
</body>
</html>
