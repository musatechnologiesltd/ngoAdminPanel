<table class="table table-bordered">
    <tr>
        <th>নথির নাম</th>
        <th>নথি দেখুন</th>
    </tr>
    <tr>
        <td>পরিচালন পরিকল্পনা</td>
        <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('formOnePdf',['main_id'=>$form_one_data->id,'id'=>'plan']) }}" >
            <i class="fa fa-eye"></i>
        </a></td>
    </tr>
    <tr>
        <td>চালানের কপি</td>
        <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('formOnePdf',['main_id'=>$form_one_data->id,'id'=>'invoice']) }}">
            <i class="fa fa-eye"></i>
        </a></td>
    </tr>
    <tr>
        <td>ট্রেজারি চালানের মূলকপি</td>
        <td> <a target="_blank" class="btn btn-sm btn-success" href="{{ route('formOnePdf',['main_id'=>$form_one_data->id,'id'=>'treasury_bill']) }}">
            <i class="fa fa-eye"></i>
        </a></td>
    </tr>

    {{-- <tr>
        <td>কর্মকর্তার স্বাক্ষর ও তারিখ সহ ফরম - ০১ এর ফাইনাল কপি </td>
        <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('formOnePdf',['main_id'=>$form_one_data->id,'id'=>'final_pdf']) }}">
            <i class="fa fa-eye"></i>
        </a></td>
    </tr> --}}


    @foreach($all_source_of_fund as $all_get_all_source_of_fund_data)
    <tr>
        <td>
        সম্ভাব্য দাতার কাছ থেকে প্রতিশ্রুতির চিঠি(দাতা সংস্থার নাম)
        </td>
        <td> <a target="_blank" class="btn btn-sm btn-success" href="{{ route('sourceOfFund',$all_get_all_source_of_fund_data->id ) }}">
            <i class="fa fa-eye"></i>
        </a>({{ $all_get_all_source_of_fund_data->name }})</td>
    </tr>

    @endforeach

    @foreach($get_all_data_other as $key=>$all_get_all_data_other)

    <tr>
    <td>{{ $all_get_all_data_other->information_title }} {{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }}</td>
    <td><a  target="_blank" class="btn btn-sm btn-success" href="{{ route('otherPdfView',$all_get_all_data_other->id ) }}">
        <i class="fa fa-eye"></i>
    </a></td>
</tr>
@endforeach

@foreach($form_member_data_doc as $key=>$all_form_member_data_doc)

<tr>
    <td>এনজিও  কর্মকর্তাদের  নথি {{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }}</td>
    <td><a  target="_blank" class="btn btn-sm btn-success" href="{{ route('ngoMemberDocPdfView',$all_form_member_data_doc->id ) }}">
        <i class="fa fa-eye"></i>
    </a></td>
</tr>

@endforeach



@foreach($form_ngo_data_doc as $key=>$all_form_member_data_doc)
<?php

$ngoTypeInfo = DB::table('ngo_type_and_languages')->where('user_id',$form_one_data->user_id)->value('ngo_type');

?>

@if($ngoTypeInfo == 'দেশিও')
<tr>
    @if($key+1 == 1)
    <td>কমিটির তালিকা ও নিবন্ধন সনদপত্রের সত্যায়িত অনুলিপি</td>
    @elseif($key+1 == 2)
    <td>গঠনতন্ত্রের সত্যায়িত অনুলিপি</td>
    @elseif($key+1 == 3)
    <td>সংস্থার কার্যক্রম প্রতিবেদন</td>
    @elseif($key+1 == 4)
    <td>দাতা সংস্হার প্রতিশুতিপত্র</td>
    @elseif($key+1 == 5)
 <td>সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি</td>
    @elseif($key+1 == 6)
    <td>সংস্থার সাধারণ সদস্যদের নামের তালিকা</td>

    @endif
    <td><a  target="_blank" class="btn btn-sm btn-success" href="{{ route('ngoDocPdfView',$all_form_member_data_doc->id ) }}">
        <i class="fa fa-eye"></i>
    </a></td>
</tr>
@else




<tr>  @if($key+1 == 1)

    <td> FD - 1 Form</td>

    @elseif($key+1 == 2)

    <td> Form No - 8</td>
@elseif($key+1 == 3)
    <td>Certificate Of Incorporation in the Country Of Origin</td>
    @elseif($key+1 == 4)
    <td>Attested copy of Constitution</td>
    @elseif($key+1 == 5)
    <td>Activities Report</td>
    @elseif($key+1 == 6)
    <td>Decision Of the Committee/Board To Open Office In Bangladesh</td>
    @elseif($key+1 == 7)
    <td>Letter Of Appoinment Of The Country Representative</td>
    @elseif($key+1 == 8)
 <td>Deed Of Agreement Stamp Of TK.300/-with the landlord in Support Of Opening the Office In Bangladesh</td>
    @elseif($key+1 == 9)
    <td>Letter Of Intent</td>

    @endif
    <td><a  target="_blank" class="btn btn-sm btn-success" href="{{ route('ngoDocPdfView',$all_form_member_data_doc->id ) }}">
        <i class="fa fa-eye"></i>
    </a></td>
</tr>

@endif

@endforeach

<?php



?>

@if(count($form_member_data_doc_renew) == 0)


@else
@foreach($form_member_data_doc_renew as $all)
<tr>
    <td>বিগত ১০(দশ) বছরে বৈদেশিক অনুদানে পরিচালত কার্যক্রমের বিবরণ (প্রকল্প ওয়ারী তথাদির সংক্ষিপ্তসার সংযুক্ত করতে হবে)</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewPdfList',['main_id'=>$form_one_data->user_id,'id'=>'f']) }}">
        <i class="fa fa-eye"></i>
    </a></td>
</tr>


<tr>
    <td>সংস্থার সম্ভাব্য/প্রত্যাশিত বার্ষিক বাজেট (উৎসসহ)</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewPdfList',['main_id'=>$form_one_data->user_id,'id'=>'y']) }}">
        <i class="fa fa-eye"></i>
    </a></td>
</tr>


<tr>
    <td>নিবন্ধন ফি ও ভ্যাট পরিশোধ করা হয়েছে কিনা (চালানের কপি সংযুক্ত করতে হবে)</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewPdfList',['main_id'=>$form_one_data->user_id,'id'=>'c']) }}">
        <i class="fa fa-eye"></i>
    </a></td>
</tr>


<tr>
    <td>তফসিল-১ এ বর্ণিত যেকোন ফি এর ভ্যাট বকেয়া থাকলে পরিশোধ করা হয়েছে কিনা (চালানের কপি সংযুক্ত করতে হবে)</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewPdfList',['main_id'=>$form_one_data->user_id,'id'=>'d']) }}">
        <i class="fa fa-eye"></i>
    </a></td>
</tr>


<tr>
    <td>ব্যাংক হিসাব নম্বর পরিবর্তন হয়ে থাকলে ব্যুরোর অনুমদনপত্রের কপি সংযুক্ত করতে হবে</td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewPdfList',['main_id'=>$form_one_data->user_id,'id'=>'ch']) }}">
        <i class="fa fa-eye"></i>
    </a></td>
</tr>
@endforeach
@endif

</table>
