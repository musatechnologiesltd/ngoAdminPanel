<table class="table table-bordered">
    <tbody>
    <tr>
        <td>১.</td>
        <td colspan="3">সংস্থার বিবরণ:</td>
    </tr>
      <?php
$getngoForLanguage = DB::table('ngo_type_and_languages')->where('user_id',$formOneData->user_id)->value('ngo_type');
$regName = DB::table('fd_one_forms')->where('user_id',$formOneData->user_id)->value('organization_name_ban');

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
        <td>: {{ $formOneData->organization_address}}</td>
    </tr>
    <tr>
        <td></td>
        <td>(iii)</td>
        <td>ডাইরি নম্বর </td>
        <td>:{{ App\Http\Controllers\Admin\CommonController::englishToBangla($ngoTypeData->registration )}}</td>
    </tr>
    <tr>
        <td></td>
        <td>(iv)</td>
        <td>কোন দেশীয় সংস্থা</td>
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
        <td></td>
        <td>টেলিফোন নম্বর ,মোবাইল নম্বর ,ইমেইল  ও ওয়েব এড্রেস</td>
        <td>:
            @if(!$formOneData)

            @else
            {{ App\Http\Controllers\Admin\CommonController::englishToBangla($formOneData->org_phone) }},{{ App\Http\Controllers\Admin\CommonController::englishToBangla($formOneData->org_mobile) }},{{ $formOneData->org_email }},{{ $formOneData->web_site_name }}
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
        <td>: {{ $formOneData->name_of_head_in_bd }}</td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td>খ) জাতীয়তা</td>
        <td>: {{ $formOneData->nationality }}</td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td>গ) পূর্ণকালীন/ খণ্ডকালীন</td>
        <td>: {{ $formOneData->job_type }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>ঘ) ঠিকানা,টেলিফোন নম্বর ,মোবাইল নম্বর, ইমেইল</td>
        <td>:{{ $formOneData->address }},{{ App\Http\Controllers\Admin\CommonController::englishToBangla($formOneData->tele_phone_number) }} {{ App\Http\Controllers\Admin\CommonController::englishToBangla($formOneData->phone) }}, {{ $formOneData->email }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>ঙ) নাগরিকত্ব (পূর্বতন নাগরিকত্ব যদি থাকে তাও উল্লেখ
            করতে হবে)
        </td>
        <td>: {{ $formOneData->citizenship }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>চ) পেশা (বর্তমান পেশা উল্লেখ করতে হবে)</td>
        <td>: {{ $formOneData->profession }}</td>
    </tr>

    <tr>
        <td>২.</td>
        <td colspan="2">বিগত ১০(দশ) বছরে বৈদেশিক অনুদানে পরিচালত কার্যক্রমের বিবরণ (প্রকল্প ওয়ারী তথাদির সংক্ষিপ্তসার সংযুক্ত করতে হবে)
        </td>
        <td>:

            @if(!$formOneData)


            @else
            @if(empty($formOneData->foregin_pdf))

            @else
            <a target="_blank"  href="{{ route('foreginPdfDownloadOld',base64_encode($formOneData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
            @endif
@endif

        </td>
    </tr>

    <tr>
        <td>৩.</td>
        <td colspan="2">সংস্থার সম্ভাব্য/প্রত্যাশিত বার্ষিক বাজেট (উৎসসহ)
        </td>
        <td>:       @if(!$formOneData)


            @else

            {{$formOneData->annual_budget}},
            @if(empty($formOneData->annual_budget_file))

            @else
            <a target="_blank"  href="{{ route('yearlyBudgetPdfDownloadOld',base64_encode($formOneData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
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
        <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime($allAllParti->date_of_join))) }}</td>
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
        <td>মোবাইল নম্বর </td>
        <td>: {{ App\Http\Controllers\Admin\CommonController::englishToBangla($allAllParti->mobile) }}</td>
    </tr>

    <tr>
        <td></td>
        <td>(জ)</td>
        <td>ইমেইল এড্রেস</td>
        <td>: {{ $allAllParti->email }}</td>
    </tr>


    <tr>
        <td></td>
        <td>(ঝ)</td>
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
        <td>: @if(!$formOneData)


            @else
            @if(empty($formOneData->copy_of_chalan))

            @else
            <a target="_blank"  href="{{ route('copyOfChalanPdfDownloadOld',base64_encode($formOneData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
            @endif
@endif</td>
    </tr>

    <tr>
        <td>৬.</td>
        <td colspan="2">তফসিল -১ এ বর্ণিত যেকোন ফি এর ভ্যাট বকেয়া থাকলে পরিশোধ হয়েছে কিনা (চালানের কপি সংযুক্ত করতে হবে)
        </td>
        <td>: @if(!$formOneData)


            @else
            @if(empty($formOneData->due_vat_pdf))

            @else
            <a target="_blank"  href="{{ route('dueVatPdfDownloadOld',base64_encode($formOneData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
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
        <td colspan="2">ব্যাংক হিসাব নম্বর পরিবর্তন হয়ে থাকলে ব্যুরোর অনুমোদনপত্রের কপি সংযুক্ত করতে হবে
        </td>
        <td>: @if(!$formOneData)


            @else
            @if(empty($formOneData->change_ac_number))

            @else
            <a target="_blank"  href="{{ route('changeAcNumberDownloadOld',base64_encode($formOneData->id)) }}" class="btn btn-outline-success"><i class="fa fa-file-pdf-o"></i> দেখুন </a>
            @endif
@endif</td>
    </tr>

    </tbody>
</table>
<table style=" margin-top: 15px;width:100%">

    <tr>
        <td style="padding-left:1130px;" colspan="3"><img width="150" height="60" src="{{ $ins_url }}{{ $formOneData->digital_signature}}"/></td>
    </tr>
    <tr>
        <td style="padding-left:1130px;" colspan="3"><img width="150" height="60" src="{{ $ins_url }}{{ $formOneData->digital_seal}}"/></td>
    </tr>
</table>


<table style=" margin-top: 10px;width:100%">
    <tr>
        <td style="padding-left:1130px;" colspan="3">প্রধান নির্বাহীর স্বাক্ষর ও সিল</td>
    </tr>
    <tr>
        <td style="width: 65%"></td>
        <td style="text-align: left; width:5%;">নাম </td>
        <td style="width:30%; text-align: left;">: {{ $formOneData->chief_name }}</td>
    </tr>
    <tr>
        <td style="width: 65%"></td>
        <td style="text-align: left; width: 5%;">পদবি </td>
        <td style="width:30%; text-align: left;">: {{ $formOneData->chief_desi }}</td>
    </tr>

    <tr>
        <td style="width: 65%"></td>
        <td style="text-align: left; width: 5%;">তারিখ </td>

        <td style="width:30%; text-align: left;">: {{  App\Http\Controllers\Admin\CommonController::englishToBangla(date('d-m-Y', strtotime(\Carbon\Carbon::parse($formOneData->created_at)->toDateString()))) }}</td>

    </tr>
</table>
