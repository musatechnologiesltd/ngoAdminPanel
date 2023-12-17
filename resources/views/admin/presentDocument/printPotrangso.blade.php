<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf</title>
    <style>
        body
        {
            font-size:16px;
            width: 8.3in;
            height: 11.7in;
        }
        body,h5,h4,h3 {
            font-family: 'bangla', sans-serif;
        /* font-size: 14px; */

        }
        .upper_section
        {
            text-align:center;
        }
        .upper_section img
        {
            height: 10px;
            width: 10px;
        }
        .text_section
        {
            font-size: 18px;
            line-height: 1.4;
        }
        .pdf_table
        {
            border-collapse: collapse;
            width: 100%;
            margin: 25px 0;
        }
    </style>
</head>
<body>

<div class="upper_section">
    <img src="{{ asset('/') }}public/pdfLogo.jpg" alt="" style="height: 80px;width:80px;">
    <div class="text_section">
        <p>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার <br>
            মন্ত্রণালয়ের নাম লিখুন <br>
            এনজিও বিষয়ক ব্যুরো <br>
            সহকারী পরিচালক-১ (নিবন্ধন ও নবায়ন শাখা) <br>
            আগারগাঁও, শেরেবাংলানগর <br>
            ঢাকা-১২০৭</p>
    </div>
</div>

<?php
$nothiApproverList = DB::table('nothi_approvers')->where('nothiId',$nothiId)
       ->where('status',$status)
       ->where('noteId',$id)->first();


if(!$nothiApproverList){

        $appName = '';
        $desiName = '';
        $dateApp = '';

}else{





       $nothiApproverLista = DB::table('admins')->where('id',$nothiApproverList->adminId)
       ->first();

       if(!$nothiApproverLista){


        $appName = '';
        $desiName = '';

       }else{

        $designationName = DB::table('designation_lists')
                ->where('id',$nothiApproverLista->designation_list_id)
                ->value('designation_name');


        $appName = $nothiApproverLista->admin_name_ban;
        $desiName = $designationName;

       }


       $dateApp =  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/Y', strtotime($nothiApproverList->created_at)));

    }



?>
<table class="pdf_table">
    <tr>
        <td style="font-weight:bold;">স্মারক নম্বর: {{ App\Http\Controllers\Admin\CommonController::englishToBangla('১১.২২.৩৩৩৩.৪৪৪.৫৫.'.$nothiNumber) }}</td>
        <td style="text-align: right">তারিখ: {{ $dateApp }}</td>
    </tr>
</table>
@foreach($officeDetail as $officeDetails)
<table class="pdf_table">
    <tr>
        <td style="font-weight:bold;">বিষয়:  {!! $officeDetails->office_subject !!} </td>
    </tr>
    <tr>
        <td>সূত্র: (যদি থাকে)    {!! $officeDetails->office_sutro !!}</td>
    </tr>
</table>
<table class="pdf_table">
    <tr>
        <td>{!! $officeDetails->description !!}</td>
    </tr>
</table>
@endforeach
<table class="pdf_table">
    <tr>
        <td style="width:80%"></td>
        <td style="text-align:center; line-height:.8">

            <p>{{ $appName }}</p>
           <p>{{ $desiName }}</p>


        </td>
    </tr>
    @foreach($nothiPropokListUpdate as $nothiPropokLists)
    <tr>
        <td colspan="2">{{ $nothiPropokLists->otherOfficerDesignation }},{{ $nothiPropokLists->otherOfficerBranch }}। </td>
    </tr>
    @endforeach
</table>
<table class="pdf_table">
    <tr>
        <td style="font-weight:bold;">দৃষ্টি আকর্ষণ:</td>
    </tr>
    @foreach($nothiAttractListUpdate as $nothiPropokLists)
    <tr>
        <td style="padding-left:20px; padding-top: 10px;">{{ $nothiPropokLists->otherOfficerDesignation }},{{ $nothiPropokLists->otherOfficerBranch }}। </td>
    </tr>
    @endforeach
</table>
<table class="pdf_table">
    <tr>
        <td style="font-weight:bold;">স্মারক নম্বর: {{ App\Http\Controllers\Admin\CommonController::englishToBangla('১১.২২.৩৩৩৩.৪৪৪.৫৫.'.$nothiNumber) }}</td>
        <td style="text-align: right">তারিখ: {{ $dateApp }}</td>
    </tr>
</table>
<table class="pdf_table">
    <tr>
        <td style="font-weight:bold;">সদয় জ্ঞাতার্থে/জ্ঞাতার্থে (জ্যেষ্ঠতার ক্রমানুসারে নয়):</td>
    </tr>
    @foreach($nothiCopyListUpdate as $key=>$nothiPropokLists)
    <tr>
        <td style="padding-left:20px; padding-top: 10px;">{{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }} | {{ $nothiPropokLists->otherOfficerDesignation }},{{ $nothiPropokLists->otherOfficerBranch }}।</td>
    </tr>
    @endforeach

</table>

<table class="pdf_table">
    <tr>
        <td style="width:80%"></td>
        <td style="text-align:center; line-height:.8">

            <p>{{ $appName }}</p>
           <p>{{ $desiName }}</p>


        </td>
    </tr>

</table>

</body>
</html>