<table class="table table-bordered">
    <tr>
        <th>নথির নাম</th>
        <th></th>
        <th>নথি দেখুন</th>
    </tr>
    <tr>
        <td>এফডি -১ ফরম</td>
        <td></td>
        <td>

            <a target="_blank" class="btn btn-sm btn-success" href="{{ route('formOnePdfMainForeign',['id'=>$formOneData->id]) }}" >
            <i class="fa fa-eye"></i>
        </a>


        @if(Route::is('addChildNote') || Route::is('viewChildNote'))

        <button  href="{{ route('formOnePdfMainForeign',['id'=>$formOneData->id]) }}" class="btn btn-secondary" id="attLink1"  data-name="এফডি -১ ফরম"><i class="fa fa-paperclip"></i></button>
        <button  href="{{ route('formOnePdfMainForeign',['id'=>$formOneData->id]) }}" class="btn btn-danger" id="copyLink1"><i class="fa fa-copy"></i></button>
        @else

        @endif


    </td>
    </tr>
    <tr>
        <td>পরিচালন পরিকল্পনা</td>
        <td></td>
        <td>

            <a target="_blank" class="btn btn-sm btn-success" href="{{ route('formOnePdf',['main_id'=>$formOneData->id,'id'=>'plan']) }}" >
            <i class="fa fa-eye"></i>
        </a>


        @if(Route::is('addChildNote') || Route::is('viewChildNote'))

        <button  href="{{ route('formOnePdf',['main_id'=>$formOneData->id,'id'=>'plan']) }}" class="btn btn-secondary" id="attLink1"  data-name="পরিচালন পরিকল্পনা"><i class="fa fa-paperclip"></i></button>
        <button  href="{{ route('formOnePdf',['main_id'=>$formOneData->id,'id'=>'plan']) }}" class="btn btn-danger" id="copyLink1"><i class="fa fa-copy"></i></button>
        @else

        @endif


    </td>
    </tr>
    <tr>
        <td>চালানের কপি</td>
        <td></td>
        <td>

            <a target="_blank" class="btn btn-sm btn-success" href="{{ route('formOnePdf',['main_id'=>$formOneData->id,'id'=>'invoice']) }}">
            <i class="fa fa-eye"></i>
        </a>
        @if(Route::is('addChildNote') || Route::is('viewChildNote'))

        <button  href="{{ route('formOnePdf',['main_id'=>$formOneData->id,'id'=>'invoice']) }}" class="btn btn-secondary" id="attLink1"  data-name="চালানের কপি"><i class="fa fa-paperclip"></i></button>
        <button  href="{{ route('formOnePdf',['main_id'=>$formOneData->id,'id'=>'invoice']) }}" class="btn btn-danger" id="copyLink1"><i class="fa fa-copy"></i></button>
        @else

        @endif

    </td>
    </tr>
    <tr>
        <td>ট্রেজারি চালানের মূলকপি</td>
        <td></td>
        <td>

            <a target="_blank" class="btn btn-sm btn-success" href="{{ route('formOnePdf',['main_id'=>$formOneData->id,'id'=>'treasury_bill']) }}">
            <i class="fa fa-eye"></i>
        </a>
        @if(Route::is('addChildNote') || Route::is('viewChildNote'))

        <button  href="{{ route('formOnePdf',['main_id'=>$formOneData->id,'id'=>'treasury_bill']) }}" class="btn btn-secondary" id="attLink1"  data-name="ট্রেজারি চালানের মূলকপি"><i class="fa fa-paperclip"></i></button>
        <button  href="{{ route('formOnePdf',['main_id'=>$formOneData->id,'id'=>'treasury_bill']) }}" class="btn btn-danger" id="copyLink1"><i class="fa fa-copy"></i></button>
        @else

        @endif

    </td>
    </tr>




    @foreach($allSourceOfFund as $allGetAllSourceOfFundData)
    <tr>
        <td>
        সম্ভাব্য দাতার কাছ থেকে প্রতিশ্রুতির চিঠি(দাতা সংস্থার নাম)
        </td>
        <td>{{ $allGetAllSourceOfFundData->name }}</td>
        <td>

            <a target="_blank" class="btn btn-sm btn-success" href="{{ route('sourceOfFund',$allGetAllSourceOfFundData->id ) }}">
            <i class="fa fa-eye"></i>
        </a>

        @if(Route::is('addChildNote') || Route::is('viewChildNote'))

        <button  href="{{ route('sourceOfFund',$allGetAllSourceOfFundData->id ) }}" class="btn btn-secondary" id="attLink1"  data-name="সম্ভাব্য দাতার কাছ থেকে প্রতিশ্রুতির চিঠি"><i class="fa fa-paperclip"></i></button>
        <button  href="{{ route('sourceOfFund',$allGetAllSourceOfFundData->id ) }}" class="btn btn-danger" id="copyLink1"><i class="fa fa-copy"></i></button>
        @else

        @endif


    </td>
    </tr>

    @endforeach

    @foreach($getAllDataOther as $key=>$AllGetAllDataOther)

    <tr>
    <td>{{ $AllGetAllDataOther->information_title }} {{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }}</td>
    <td></td>
    <td>

        <a  target="_blank" class="btn btn-sm btn-success" href="{{ route('otherPdfView',$AllGetAllDataOther->id ) }}">
        <i class="fa fa-eye"></i>
    </a>
    @if(Route::is('addChildNote') || Route::is('viewChildNote'))

    <button  href="{{ route('otherPdfView',$AllGetAllDataOther->id ) }}" class="btn btn-secondary" id="attLink1"  data-name="{{ $AllGetAllDataOther->information_title }}"><i class="fa fa-paperclip"></i></button>
    <button  href="{{ route('otherPdfView',$AllGetAllDataOther->id ) }}" class="btn btn-danger" id="copyLink1"><i class="fa fa-copy"></i></button>
    @else

    @endif


</td>
</tr>
@endforeach

@foreach($formMemberDataDoc as $key=>$allRormMemberDataDoc)

<tr>
    <td>এনজিও  কর্মকর্তাদের  নথি {{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }}</td>
    <td></td>
    <td>

        <a  target="_blank" class="btn btn-sm btn-success" href="{{ route('ngoMemberDocPdfView',$allRormMemberDataDoc->id ) }}">
        <i class="fa fa-eye"></i>
    </a>
    @if(Route::is('addChildNote') || Route::is('viewChildNote'))

    <button  href="{{ route('ngoMemberDocPdfView',$allRormMemberDataDoc->id ) }}" class="btn btn-secondary" id="attLink1"  data-name="এনজিও  কর্মকর্তাদের  নথি {{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1) }}"><i class="fa fa-paperclip"></i></button>
    <button  href="{{ route('ngoMemberDocPdfView',$allRormMemberDataDoc->id ) }}" class="btn btn-danger" id="copyLink1"><i class="fa fa-copy"></i></button>
    @else

    @endif

</td>
</tr>

@endforeach



@foreach($formNgoDataDoc as $key=>$allRormMemberDataDoc)
<?php

$ngoTypeInfo = DB::table('ngo_type_and_languages')->where('user_id',$formOneData->user_id)->value('ngo_type');

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
    <td></td>
    <td><a  target="_blank" class="btn btn-sm btn-success" href="{{ route('ngoDocPdfView',$allRormMemberDataDoc->id ) }}">
        <i class="fa fa-eye"></i>
    </a></td>
</tr>
@else




<tr>  @if($key+1 == 1)

    <td> Form No - 8</td>
@elseif($key+1 == 2)
    <td>Certificate Of Incorporation in the Country Of Origin</td>
    @elseif($key+1 == 3)
    <td>Attested copy of Constitution</td>
    @elseif($key+1 == 4)
    <td>Activities Report</td>
    @elseif($key+1 == 5)
    <td>Decision Of the Committee/Board To Open Office In Bangladesh</td>
    @elseif($key+1 == 6)
    <td>Letter Of Appoinment Of The Country Representative</td>
    @elseif($key+1 == 7)
 <td>Deed Of Agreement Stamp Of TK.300/-with the landlord in Support Of Opening the Office In Bangladesh</td>
    @elseif($key+1 == 8)
    <td>Letter Of Intent</td>

    @endif
    <td></td>
    <td>

    <a  target="_blank" class="btn btn-sm btn-success" href="{{ route('ngoDocPdfView',$allRormMemberDataDoc->id ) }}">
        <i class="fa fa-eye"></i>
    </a>



    @if(Route::is('addChildNote') || Route::is('viewChildNote'))


    @if($key+1 == 1)

    <button  href="{{ route('ngoDocPdfView',$allRormMemberDataDoc->id ) }}" class="btn btn-secondary" id="attLink1"  data-name="Form No - 8"><i class="fa fa-paperclip"></i></button>
@elseif($key+1 == 2)




<button  href="{{ route('ngoDocPdfView',$allRormMemberDataDoc->id ) }}" class="btn btn-secondary" id="attLink1"  data-name="Certificate Of Incorporation in the Country Of Origin"><i class="fa fa-paperclip"></i></button>
@elseif($key+1 == 3)




<button  href="{{ route('ngoDocPdfView',$allRormMemberDataDoc->id ) }}" class="btn btn-secondary" id="attLink1"  data-name="Attested copy of Constitution"><i class="fa fa-paperclip"></i></button>
@elseif($key+1 == 4)




<button  href="{{ route('ngoDocPdfView',$allRormMemberDataDoc->id ) }}" class="btn btn-secondary" id="attLink1"  data-name="Activities Report"><i class="fa fa-paperclip"></i></button>
@elseif($key+1 == 5)






<button  href="{{ route('ngoDocPdfView',$allRormMemberDataDoc->id ) }}" class="btn btn-secondary" id="attLink1"  data-name="Decision Of the Committee/Board To Open Office In Bangladesh"><i class="fa fa-paperclip"></i></button>

@elseif($key+1 == 6)



<button  href="{{ route('ngoDocPdfView',$allRormMemberDataDoc->id ) }}" class="btn btn-secondary" id="attLink1"  data-name="Letter Of Appoinment Of The Country Representative"><i class="fa fa-paperclip"></i></button>
@elseif($key+1 == 7)



<button  href="{{ route('ngoDocPdfView',$allRormMemberDataDoc->id ) }}" class="btn btn-secondary" id="attLink1"  data-name="Deed Of Agreement Stamp Of TK.300/-with the landlord in Support Of Opening the Office In Bangladesh"><i class="fa fa-paperclip"></i></button>
@elseif($key+1 == 8)



<button  href="{{ route('ngoDocPdfView',$allRormMemberDataDoc->id ) }}" class="btn btn-secondary" id="attLink1"  data-name="Letter Of Intent"><i class="fa fa-paperclip"></i></button>

@endif







    <button  href="{{ route('ngoMemberDocPdfView',$allRormMemberDataDoc->id ) }}" class="btn btn-danger" id="copyLink1"><i class="fa fa-copy"></i></button>
    @else

    @endif


</td>
</tr>

@endif

@endforeach

<?php



?>

@if(count($formMemberDataDocRenew) == 0)


@else
@foreach($formMemberDataDocRenew as $all)
<tr>
    <td>বিগত ১০(দশ) বছরে বৈদেশিক অনুদানে পরিচালত কার্যক্রমের বিবরণ (প্রকল্প ওয়ারী তথাদির সংক্ষিপ্তসার সংযুক্ত করতে হবে)</td>
    <td></td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewPdfList',['main_id'=>$formOneData->user_id,'id'=>'f']) }}">
        <i class="fa fa-eye"></i>
    </a></td>
</tr>


<tr>
    <td>সংস্থার সম্ভাব্য/প্রত্যাশিত বার্ষিক বাজেট (উৎসসহ)</td>
    <td></td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewPdfList',['main_id'=>$formOneData->user_id,'id'=>'y']) }}">
        <i class="fa fa-eye"></i>
    </a></td>
</tr>


<tr>
    <td>নিবন্ধন ফি ও ভ্যাট পরিশোধ করা হয়েছে কিনা (চালানের কপি সংযুক্ত করতে হবে)</td>
    <td></td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewPdfList',['main_id'=>$formOneData->user_id,'id'=>'c']) }}">
        <i class="fa fa-eye"></i>
    </a></td>
</tr>


<tr>
    <td>তফসিল-১ এ বর্ণিত যেকোন ফি এর ভ্যাট বকেয়া থাকলে পরিশোধ করা হয়েছে কিনা (চালানের কপি সংযুক্ত করতে হবে)</td>
    <td></td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewPdfList',['main_id'=>$formOneData->user_id,'id'=>'d']) }}">
        <i class="fa fa-eye"></i>
    </a></td>
</tr>


<tr>
    <td>ব্যাংক হিসাব নম্বর পরিবর্তন হয়ে থাকলে ব্যুরোর অনুমদনপত্রের কপি সংযুক্ত করতে হবে</td>
    <td></td>
    <td><a target="_blank" class="btn btn-sm btn-success" href="{{ route('renewPdfList',['main_id'=>$formOneData->user_id,'id'=>'ch']) }}">
        <i class="fa fa-eye"></i>
    </a></td>
</tr>
@endforeach
@endif

</table>
