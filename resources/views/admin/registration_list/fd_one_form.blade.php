<table class="table table-bordered">
    <tbody>
    <tr>
        <td>১.</td>
        <td colspan="3">সংস্থার বিবরণ:</td>
    </tr>
      <?php
$getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',$formOneData->user_id)->value('ngo_type');

        if($getngoForLanguage =='দেশিও'){

        $regName = DB::table('fd_one_forms')->where('user_id',$formOneData->user_id)->value('organization_name_ban');

        }else{
        $regName = DB::table('fd_one_forms')->where('user_id',$formOneData->user_id)->value('organization_name');
        }
      ?>
    <tr>
        <td></td>
        <td>(i)</td>
        <td>সংস্থার নাম</td>
        <td>: {{ $regName }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(ii)</td>
        <td>সংস্থার ঠিকানা</td>
        <td>: {{ $formOneData->organization_address }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(iii)</td>
        <td>নিবন্ধন নম্বর</td>
        <td>:@if($formOneData->registration_number == 0)


          @else

          {{ App\Http\Controllers\Admin\CommonController::englishToBangla($formOneData->registration_number)}}

          @endif


      </td>
    </tr>
    <tr>
        <td></td>
        <td>(iv)</td>
        <td>{{ trans('fd_one_step_one.Country_of_Origin')}}</td>
        <td>: {{ $formOneData->country_of_origin }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(v)</td>
        <td>প্রধান কার্যালয়ের ঠিকানা</td>
        <td>: {{ $formOneData->address_of_head_office }}</td>
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
        <td>: {{ $formOneData->name_of_head_in_bd }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>খ) পূর্ণকালীন/ খণ্ডকালীন</td>
        <td>: {{ $formOneData->job_type }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>গ) {{ trans('fd_one_step_one.Address_Mobile_Number_Email')}}</td>
        <td>:{{ $formOneData->address }}, {{ App\Http\Controllers\Admin\CommonController::englishToBangla($formOneData->tele_phone_number.', '.$formOneData->phone) }}, {{ $formOneData->email }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>ঘ) নাগরিকত্ব (পূর্বতন নাগরিকত্ব যদি থাকে তাও উল্লেখ
            করতে হবে)
        </td>
        <td>: {{ $formOneData->citizenship }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>ঙ) পেশা (বর্তমান পেশা উল্লেখ করতে হবে)</td>
        <td>: {{ $formOneData->profession }}</td>
    </tr>
    <tr>
        <td>২.</td>
        <td colspan="3">প্রস্তাবিত কার্যক্রমের ক্ষেত্র
            (বিস্তারিত বিবরণ সংযুক্ত করতে হবে):
        </td>
    </tr>
    <tr>
        <td></td>
        <td>ক</td>
        <td>(i) পরিচালন পরিকল্পনা (Plan of Operation)</td>
        <td>:
            @if(empty($formOneData->plan_of_operation))

            @else

            <a target="_blank" class="btn btn-sm btn-success" href="{{ route('formOnePdf',['main_id'=>$formOneData->id,'id'=>'plan']) }}" >
                <i class="fa fa-file-pdf-o"></i> দেখুন
            </a>

            @endif
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>(ii) প্রকল্প এলাকা (জেলা ও উপজেলা)</td>
        <td>: {{ $formOneData->district }}</td>
    </tr>
    <tr>
        <td></td>
        <td>খ</td>
        <td>তহবিলের উৎস</td>
        <td></td>
    </tr>
    @foreach($allSourceOfFund as $allGetAllSourceOfFundData)
    <tr>
        <td></td>
        <td></td>
        <td>(i) দাতা/দাতা সংস্থাসমূহের নাম ও ঠিকানা</td>
        <td>: {{ $allGetAllSourceOfFundData->name }}, {{ $allGetAllSourceOfFundData->address }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>(ii) দাতা /দাতাসংস্থার অঙ্গীকারপত্রের কপি</td>
        <td>: @if(empty($allGetAllSourceOfFundData->letter_file))

            @else

<a target="_blank" class="btn btn-sm btn-success" href="{{ route('sourceOfFund',$allGetAllSourceOfFundData->id ) }}" >
            <i class="fa fa-file-pdf-o"></i> দেখুন
        </a>

            @endif</td>
    </tr>
    @endforeach
    <tr>
        <td>৩.</td>
        <td colspan="2">অঙ্গীকারকৃত অনুদানের পরিমাণ (বৈদেশিক
            মুদ্রা/বাংলাদেশ টাকায়)
        </td>
        <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($formOneData->annual_budget) }}</td>
    </tr>
    <tr>
        <td>৪.</td>
        <td colspan="3">কর্মকর্তাদের তথ্যাদি পৃথক কাগজে
            [ঊর্ধ্বতন ৫(পাঁচ) জন কর্মকর্তার]
            উপস্থাপন করতে হবে
        </td>
    </tr>
    @foreach($allPartiw as $key=>$allAllParti)
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
        <td>: {{ $allAllParti->name }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(খ)</td>
        <td>পদবি</td>
        <td>: {{ $allAllParti->position }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(গ)</td>
        <td>ঠিকানা</td>
        <td>: {{ $allAllParti->address }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(ঘ)</td>
        <td>নাগরিকত্ব (দ্বৈত নাগরিকত্ব থাকলে উল্লেখ করতে হবে)
        </td>
        <td>: {{ $allAllParti->citizenship }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(ঙ)</td>
        <td>যোগদানের তারিখ</td>
        <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($allAllParti->date_of_join) }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(চ)</td>
        <td>বেতন ভাতাদি</td>
        <td>: {{ $allAllParti->salary_statement }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(ছ)</td>
        <td>সম্পৃক্ত অন্য পেশার বিবরণ</td>
        <td>: {{ $allAllParti->other_occupation }}</td>
    </tr>
    @endforeach

    <tr>
        <td>৫.</td>
        <td colspan="2">নিবন্ধন ফি ও ভ্যাট পরিশোধ করা হয়েছে
            কিনা (চালানের কপি সংযুক্ত করতে
            হবে)
        </td>
        <td>:  @if(empty($formOneData->attach_the__supporting_paper))

            @else

            <a target="_blank" class="btn btn-sm btn-success" href="{{ route('formOnePdf',['main_id'=>$formOneData->id,'id'=>'invoice']) }}" >
                <i class="fa fa-file-pdf-o"></i> দেখুন
            </a>

            @endif</td>
    </tr>
    <tr>
        <td>৬.</td>
        <td colspan="3">নিয়োগের জন্য প্রস্তাবিত
            পরামর্শক/পরামর্শকগণের নাম এবং বিস্তারিত
            তথ্য(যদি থাকে)
        </td>
    </tr>
    @foreach($getAllDataAdviser as $key=>$allGetAllDataAdviser)
    <tr>
        <td></td>
        <td>{{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1 )}}.</td>
        <td>পরামর্শক {{ App\Http\Controllers\Admin\CommonController::englishToBangla($key+1 )}}</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>(ক)</td>
        <td>নাম</td>
        <td>: {{ $allGetAllDataAdviser->name }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(খ)</td>
        <td>বিস্তারিত বর্ণনা</td>
        <td>: {{ $allGetAllDataAdviser->information	 }}</td>
    </tr>
    @endforeach
    <tr>
        <td>৭.</td>
        <td colspan="3">মাদার একাউন্ট এর বিস্তারিত বিবরণ (হিসাব
            নম্বর, ধরণ, ব্যাংকের
            নাম,শাখা ও বিস্তারিত ঠিকানা)
        </td>
    </tr>
    @if(!$getAllDataAdviserBank)

    @else
    <tr>
        <td></td>
        <td>(ক)</td>
        <td>হিসাব নম্বর</td>
        <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($getAllDataAdviserBank->account_number) }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(খ)</td>
        <td>ধরণ</td>
        <td>: {{ $getAllDataAdviserBank->account_type }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(গ)</td>
        <td>ব্যাংকের নাম</td>
        <td>: {{ $getAllDataAdviserBank->name_of_bank }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(ঘ)</td>
        <td>শাখা</td>
        <td>: {{ $getAllDataAdviserBank->branch_name_of_bank }}</td>
    </tr>
    <tr>
        <td></td>
        <td>(ঙ)</td>
        <td>বিস্তারিত ঠিকানা</td>
        <td>: {{ $getAllDataAdviserBank->bank_address }}</td>
    </tr>
    @endif
    <tr>
        <td>৮.</td>
        <td colspan="2">অন্য কোন গুরুত্বপূর্ণ তথ্য যা আবেদনকারী
            উল্লেখ করতে ইচ্ছুক (পৃথক
            কাগজে সংযুক্ত করতে হবে)
        </td>
        <td>: @foreach($getAllDataOther as $AllGetAllDataOther)

            @if(empty($AllGetAllDataOther->information_pdf))

            @else

            <a target="_blank" class="btn btn-sm btn-success" href="{{ route('otherPdfView',$AllGetAllDataOther->id ) }}" >
                <i class="fa fa-file-pdf-o"></i> দেখুন
            </a>
            @endif


                            @endforeach</td>
    </tr>

    </tbody>

</table>

</div>

</div>
<div class="tab-pane fade" id="pills-darkprofile" role="tabpanel"
aria-labelledby="pills-darkprofile-tab">
<div class="mb-0 m-t-30">
<div class="table-responsive">





