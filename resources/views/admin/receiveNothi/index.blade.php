@extends('admin.master.master')

@section('title')
আগত নথি
@endsection


@section('body')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>আগত নথি</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">আগত নথি</a></li>
                    <li class="breadcrumb-item">আগত নথি</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid list-products">
    <div class="row">
        <!-- Individual column searching (text inputs) Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <table class="table table-striped" >
                        <tbody>

                                          <!-- registration list start -->


                                          @foreach ($senderNothiListRegistration->unique('sender') as $key=>$nothiLists1)

                                          <?php

               $nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
              ?>

              @if(!$nothiLists)

              @else


              <?php
              $getLastId = DB::table('parent_note_for_registrations')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->value('id');



              $getLastIdDate = DB::table('child_note_for_registrations')->where('parent_note_regid',$getLastId)
              //->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->first();

              if(!$getLastIdDate){

              $mainCodeDate ='';

              }else{


                  $mainCodeDate =App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($getLastIdDate->created_at))).' '.$getLastIdDate->amPmValue;

              }


              ?>
                                      <tr>
                                          <td>
                                              <div class="accordion-item">
                                                  <h2 class="accordion-header" id="flush-headingTwo">
                                                      <div class="accordion-button collapsed"
                                                           data-bs-toggle="collapse"
                                                           data-bs-target="#flush-collapse{{ $nothiLists1->id }}">
                                                                              <span>
                                                                                                                                                              <span style="line-height:3">
                                                                  <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                                              <br>
                                                                              <span style="text-align:left;"> <span
                                                                                          style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                                              <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                                              <br><br><span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নোটের সর্বশেষ তারিখ: {{ $mainCodeDate }}</span>
                                                                              </span>
                                                      </div>
                                                  </h2>
                                                  <div id="flush-collapse{{ $nothiLists1->id }}"
                                                       class="accordion-collapse collapse">
                                                      <div class="accordion-body">
                                                          <div class="d-flex mt-3">
                                                              <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                                                  <i class="fa fa-plus"></i>
                                                                  নতুন নোট
                                                              </button>
                                                              <button class="btn btn-transparent ms-3" type="button">
                                                                  <i class="fa fa-envelope"></i>
                                                                  সকল নোট
                                                              </button>
                                                          </div>
                                                          <div class="card-body">

              <?php





              if($nothiLists1->dakType == 'registration'){


              $allNoteListNew = DB::table('parent_note_for_registrations')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();





              }elseif($nothiLists1->dakType == 'renew'){




              $allNoteListNew = DB::table('parent_note_for_renews')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();






              }elseif($nothiLists1->dakType == 'nameChange'){






              $allNoteListNew = DB::table('parent_note_for_name_changes')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();






              }elseif($nothiLists1->dakType== 'fdNine'){






              $allNoteListNew = DB::table('parent_note_for_fd_nines')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();





              }elseif($nothiLists1->dakType == 'fdNineOne'){





              $allNoteListNew = DB::table('parent_note_for_fd_nine_ones')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();






              }elseif($nothiLists1->dakType == 'fdSix'){




              $allNoteListNew = DB::table('parent_note_for_fdsixes')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();





              }elseif($nothiLists1->dakType == 'fdSeven'){





              $allNoteListNew = DB::table('parent_note_for_fd_sevens')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();





              }elseif($nothiLists1->dakType == 'fcOne'){



              $allNoteListNew = DB::table('parent_note_for_fc_ones')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();







              }elseif($nothiLists1->dakType == 'fcTwo'){




              $allNoteListNew = DB::table('parent_note_for_fc_twos')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();







              }elseif($nothiLists1->dakType == 'fdThree'){






              $allNoteListNew = DB::table('parent_note_for_fd_threes')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();





              }



              ?>
              @if(count($allNoteListNew) > 0)
              <ul>
              @foreach($allNoteListNew as $key=>$allNoteListNews)
                                                            <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                                                  @endforeach
                                                              </ul>

                                                              @else


                                                              <p>কোন নোট পাওয়া যায়নি</p>
                                                              @endif
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </td>
                                      </tr>
                                      @endif
                                      @endforeach


                                          <!-- registration list end -->

                                          @foreach ($senderNothiList->unique('sender') as $key=>$nothiLists1)

                                          <?php

               $nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
              ?>

              @if(!$nothiLists)

              @else

              <?php
              $getLastId = DB::table('parent_note_for_renews')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->value('id');



              $getLastIdDate = DB::table('child_note_for_renews')->where('parent_note_for_renew_id',$getLastId)
              //->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->first();

              if(!$getLastIdDate){

              $mainCodeDate ='';

              }else{


                  $mainCodeDate =App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($getLastIdDate->created_at))).' '.$getLastIdDate->amPmValue;

              }






              ?>
                                      <tr>
                                          <td>
                                              <div class="accordion-item">
                                                  <h2 class="accordion-header" id="flush-headingTwo">
                                                      <div class="accordion-button collapsed"
                                                           data-bs-toggle="collapse"
                                                           data-bs-target="#flush-collapse{{ $nothiLists1->id }}">
                                                                              <span>
                                                                                                                                                              <span style="line-height:3">
                                                                  <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                                              <br>
                                                                              <span style="text-align:left;"> <span
                                                                                          style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                                              <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                                              <br><br><span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নোটের সর্বশেষ তারিখ: {{ $mainCodeDate }}</span>
                                                                              </span>

                                                      </div>
                                                  </h2>
                                                  <div id="flush-collapse{{ $nothiLists1->id }}"
                                                       class="accordion-collapse collapse">
                                                      <div class="accordion-body">
                                                          <div class="d-flex mt-3">
                                                              <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                                                  <i class="fa fa-plus"></i>
                                                                  নতুন নোট
                                                              </button>
                                                              <button class="btn btn-transparent ms-3" type="button">
                                                                  <i class="fa fa-envelope"></i>
                                                                  সকল নোট
                                                              </button>
                                                          </div>
                                                          <div class="card-body">

              <?php





              if($nothiLists1->dakType == 'registration'){


              $allNoteListNew = DB::table('parent_note_for_registrations')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();





              }elseif($nothiLists1->dakType == 'renew'){




              $allNoteListNew = DB::table('parent_note_for_renews')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();






              }elseif($nothiLists1->dakType == 'nameChange'){






              $allNoteListNew = DB::table('parent_note_for_name_changes')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();






              }elseif($nothiLists1->dakType== 'fdNine'){






              $allNoteListNew = DB::table('parent_note_for_fd_nines')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();





              }elseif($nothiLists1->dakType == 'fdNineOne'){





              $allNoteListNew = DB::table('parent_note_for_fd_nine_ones')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();






              }elseif($nothiLists1->dakType == 'fdSix'){




              $allNoteListNew = DB::table('parent_note_for_fdsixes')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();





              }elseif($nothiLists1->dakType == 'fdSeven'){





              $allNoteListNew = DB::table('parent_note_for_fd_sevens')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();





              }elseif($nothiLists1->dakType == 'fcOne'){



              $allNoteListNew = DB::table('parent_note_for_fc_ones')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();







              }elseif($nothiLists1->dakType == 'fcTwo'){




              $allNoteListNew = DB::table('parent_note_for_fc_twos')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();







              }elseif($nothiLists1->dakType == 'fdThree'){






              $allNoteListNew = DB::table('parent_note_for_fd_threes')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();





              }



              ?>
              @if(count($allNoteListNew) > 0)
              <ul>
              @foreach($allNoteListNew as $key=>$allNoteListNews)
                                                            <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                                                  @endforeach
                                                              </ul>

                                                              @else


                                                              <p>কোন নোট পাওয়া যায়নি</p>
                                                              @endif
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </td>
                                      </tr>
                                      @endif
                                      @endforeach
                                             <!-- name change start --->

                                  @foreach ($senderNothiListnameChange->unique('receiver') as $key=>$nothiLists1)

                                  <?php

              $nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
              ?>

              @if(!$nothiLists)

              @else

              <?php
              $getLastId = DB::table('parent_note_for_name_changes')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->value('id');



              $getLastIdDate = DB::table('child_note_for_name_changes')->where('parentnote_name_change_id',$getLastId)
              //->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->first();

              if(!$getLastIdDate){

              $mainCodeDate ='';

              }else{


                  $mainCodeDate =App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($getLastIdDate->created_at))).' '.$getLastIdDate->amPmValue;

              }


              ?>
                              <tr>
                                  <td>
                                      <div class="accordion-item">
                                          <h2 class="accordion-header" id="flush-headingTwo">
                                              <div class="accordion-button collapsed"
                                                   data-bs-toggle="collapse"
                                                   data-bs-target="#flush-collapsenameChange{{ $key+1 }}">
                                                                      <span>
                                                                                                                                                      <span style="line-height:3">
                                                          <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                                      <br>
                                                                      <span style="text-align:left;"> <span
                                                                                  style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                                      <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                                      <br><br><span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নোটের সর্বশেষ তারিখ: {{ $mainCodeDate }}</span>
                                                                  </span>
                                              </div>
                                          </h2>
                                          <div id="flush-collapsenameChange{{ $key+1 }}"
                                               class="accordion-collapse collapse">
                                              <div class="accordion-body">
                                                  <div class="d-flex mt-3">
                                                      <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-plus"></i>
                                                          নতুন নোট
                                                      </button>
                                                      <button class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-envelope"></i>
                                                          সকল নোট
                                                      </button>
                                                  </div>
                                                  <div class="card-body">

              <?php
              if($nothiLists1->dakType == 'nameChange'){






              $allNoteListNew = DB::table('parent_note_for_name_changes')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();






              }



              ?>
              @if(count($allNoteListNew) > 0)
              <ul>
              @foreach($allNoteListNew as $key=>$allNoteListNews)
                                                    <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                                          @endforeach
                                                      </ul>

                                                      @else


                                                      <p>কোন নোট পাওয়া যায়নি</p>
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                              @endif
                              @endforeach

                                  <!-- name change end -->

                                  <!-- fd 9 start --->

                                  @foreach ($senderNothiListfdNine->unique('receiver') as $key=>$nothiLists1)

                                  <?php

              $nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
              ?>

              @if(!$nothiLists)

              @else


              <?php
              $getLastId = DB::table('parent_note_for_fd_nines')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->value('id');



              $getLastIdDate = DB::table('child_note_for_fd_nines')->where('p_note_for_fd_nine_id',$getLastId)
              //->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->first();

              if(!$getLastIdDate){

              $mainCodeDate ='';

              }else{


                  $mainCodeDate =App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($getLastIdDate->created_at))).' '.$getLastIdDate->amPmValue;

              }


              ?>
                              <tr>
                                  <td>
                                      <div class="accordion-item">
                                          <h2 class="accordion-header" id="flush-headingTwo">
                                              <div class="accordion-button collapsed"
                                                   data-bs-toggle="collapse"
                                                   data-bs-target="#flush-collapsefdNine{{ $key+1 }}">
                                                                      <span>
                                                                                                                                                      <span style="line-height:3">
                                                          <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                                      <br>
                                                                      <span style="text-align:left;"> <span
                                                                                  style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                                      <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                                      <br><br><span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নোটের সর্বশেষ তারিখ: {{ $mainCodeDate }}</span>

                                                                  </span>
                                              </div>
                                          </h2>
                                          <div id="flush-collapsefdNine{{ $key+1 }}"
                                               class="accordion-collapse collapse">
                                              <div class="accordion-body">
                                                  <div class="d-flex mt-3">
                                                      <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-plus"></i>
                                                          নতুন নোট
                                                      </button>
                                                      <button class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-envelope"></i>
                                                          সকল নোট
                                                      </button>
                                                  </div>
                                                  <div class="card-body">

              <?php

              if($nothiLists1->dakType== 'fdNine'){






              $allNoteListNew = DB::table('parent_note_for_fd_nines')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();





              }



              ?>
              @if(count($allNoteListNew) > 0)
              <ul>
              @foreach($allNoteListNew as $key=>$allNoteListNews)
                                                    <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                                          @endforeach
                                                      </ul>

                                                      @else


                                                      <p>কোন নোট পাওয়া যায়নি</p>
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                              @endif
                              @endforeach

                                  <!-- fd 9 end -->

                                  <!-- fd nine one start -->


                                  @foreach ($senderNothiListfdNineOne->unique('receiver') as $key=>$nothiLists1)

                                  <?php

              $nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
              ?>

              @if(!$nothiLists)

              @else


              <?php
              $getLastId = DB::table('parent_note_for_fd_nine_ones')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->value('id');



              $getLastIdDate = DB::table('child_note_for_fd_nine_ones')->where('p_note_for_fd_nine_one_id',$getLastId)
              //->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->first();

              if(!$getLastIdDate){

              $mainCodeDate ='';

              }else{


                  $mainCodeDate =App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($getLastIdDate->created_at))).' '.$getLastIdDate->amPmValue;

              }


              ?>
                              <tr>
                                  <td>
                                      <div class="accordion-item">
                                          <h2 class="accordion-header" id="flush-headingTwo">
                                              <div class="accordion-button collapsed"
                                                   data-bs-toggle="collapse"
                                                   data-bs-target="#flush-collapsefdNineOne{{ $key+1 }}">
                                                                      <span>
                                                                                                                                                      <span style="line-height:3">
                                                          <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                                      <br>
                                                                      <span style="text-align:left;"> <span
                                                                                  style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                                      <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                                      <br><br><span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নোটের সর্বশেষ তারিখ: {{ $mainCodeDate }}</span>
                                                                  </span>
                                              </div>
                                          </h2>
                                          <div id="flush-collapsefdNineOne{{ $key+1 }}"
                                               class="accordion-collapse collapse">
                                              <div class="accordion-body">
                                                  <div class="d-flex mt-3">
                                                      <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-plus"></i>
                                                          নতুন নোট
                                                      </button>
                                                      <button class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-envelope"></i>
                                                          সকল নোট
                                                      </button>
                                                  </div>
                                                  <div class="card-body">

              <?php
              if($nothiLists1->dakType == 'fdNineOne'){





              $allNoteListNew = DB::table('parent_note_for_fd_nine_ones')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();






              }



              ?>
              @if(count($allNoteListNew) > 0)
              <ul>
              @foreach($allNoteListNew as $key=>$allNoteListNews)
                                                    <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                                          @endforeach
                                                      </ul>

                                                      @else


                                                      <p>কোন নোট পাওয়া যায়নি</p>
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                              @endif
                              @endforeach

                                  <!-- fd nine one end -->

                                  <!-- fd seven start -->


                                  @foreach ($senderNothiListfdSeven->unique('receiver') as $key=>$nothiLists1)

                                  <?php

              $nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
              ?>

              @if(!$nothiLists)

              @else

              <?php
              $getLastId = DB::table('parent_note_for_fd_sevens')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->value('id');



              $getLastIdDate = DB::table('child_note_for_fd_sevens')->where('parent_note_for_fd_seven_id',$getLastId)
              //->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->first();

              if(!$getLastIdDate){

              $mainCodeDate ='';

              }else{


                  $mainCodeDate =App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($getLastIdDate->created_at))).' '.$getLastIdDate->amPmValue;

              }


              ?>
                              <tr>
                                  <td>
                                      <div class="accordion-item">
                                          <h2 class="accordion-header" id="flush-headingTwo">
                                              <div class="accordion-button collapsed"
                                                   data-bs-toggle="collapse"
                                                   data-bs-target="#flush-collapsefdSeven{{ $key+1 }}">
                                                                      <span>
                                                                                                                                                      <span style="line-height:3">
                                                          <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                                      <br>
                                                                      <span style="text-align:left;"> <span
                                                                                  style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                                      <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                                      <br><br><span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নোটের সর্বশেষ তারিখ: {{ $mainCodeDate }}</span>
                                                                  </span>
                                              </div>
                                          </h2>
                                          <div id="flush-collapsefdSeven{{ $key+1 }}"
                                               class="accordion-collapse collapse">
                                              <div class="accordion-body">
                                                  <div class="d-flex mt-3">
                                                      <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-plus"></i>
                                                          নতুন নোট
                                                      </button>
                                                      <button class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-envelope"></i>
                                                          সকল নোট
                                                      </button>
                                                  </div>
                                                  <div class="card-body">

              <?php

              if($nothiLists1->dakType == 'fdSeven'){





              $allNoteListNew = DB::table('parent_note_for_fd_sevens')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();





              }



              ?>
              @if(count($allNoteListNew) > 0)
              <ul>
              @foreach($allNoteListNew as $key=>$allNoteListNews)
                                                    <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                                          @endforeach
                                                      </ul>

                                                      @else


                                                      <p>কোন নোট পাওয়া যায়নি</p>
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                              @endif
                              @endforeach

                                  <!-- fd seven end -->


                                  <!-- fd six start -->

                                  @foreach ($senderNothiListfdSix->unique('receiver') as $key=>$nothiLists1)

                                  <?php

              $nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
              ?>

              @if(!$nothiLists)

              @else

              <?php
              $getLastId = DB::table('parent_note_for_fdsixes')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->value('id');



              $getLastIdDate = DB::table('child_note_for_fd_sixes')->where('parent_note_for_fdsix_id',$getLastId)
              //->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->first();

              if(!$getLastIdDate){

              $mainCodeDate ='';

              }else{


                  $mainCodeDate =App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($getLastIdDate->created_at))).' '.$getLastIdDate->amPmValue;

              }


              ?>
                              <tr>
                                  <td>
                                      <div class="accordion-item">
                                          <h2 class="accordion-header" id="flush-headingTwo">
                                              <div class="accordion-button collapsed"
                                                   data-bs-toggle="collapse"
                                                   data-bs-target="#flush-collapsefdSix{{ $key+1 }}">
                                                                      <span>
                                                                                                                                                      <span style="line-height:3">
                                                          <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                                      <br>
                                                                      <span style="text-align:left;"> <span
                                                                                  style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                                      <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                                      <br><br><span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নোটের সর্বশেষ তারিখ: {{ $mainCodeDate }}</span>
                                                                  </span>
                                              </div>
                                          </h2>
                                          <div id="flush-collapsefdSix{{ $key+1 }}"
                                               class="accordion-collapse collapse">
                                              <div class="accordion-body">
                                                  <div class="d-flex mt-3">
                                                      <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-plus"></i>
                                                          নতুন নোট
                                                      </button>
                                                      <button class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-envelope"></i>
                                                          সকল নোট
                                                      </button>
                                                  </div>
                                                  <div class="card-body">

              <?php
              if($nothiLists1->dakType == 'fdSix'){





              $allNoteListNew = DB::table('parent_note_for_fdsixes')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();





              }



              ?>
              @if(count($allNoteListNew) > 0)
              <ul>
              @foreach($allNoteListNew as $key=>$allNoteListNews)
                                                    <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                                          @endforeach
                                                      </ul>

                                                      @else


                                                      <p>কোন নোট পাওয়া যায়নি</p>
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                              @endif
                              @endforeach

                                  <!-- fd six end-->

                                  <!--fc one start -->

                                  @foreach ($senderNothiListfcOne->unique('receiver') as $key=>$nothiLists1)

                                  <?php

              $nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
              ?>

              @if(!$nothiLists)

              @else


              <?php
              $getLastId = DB::table('parent_note_for_fc_ones')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->value('id');



              $getLastIdDate = DB::table('child_note_for_fc_ones')->where('parent_note_for_fc_one_id',$getLastId)
              //->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->first();

              if(!$getLastIdDate){

              $mainCodeDate ='';

              }else{


                  $mainCodeDate =App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($getLastIdDate->created_at))).' '.$getLastIdDate->amPmValue;

              }


              ?>
                              <tr>
                                  <td>
                                      <div class="accordion-item">
                                          <h2 class="accordion-header" id="flush-headingTwo">
                                              <div class="accordion-button collapsed"
                                                   data-bs-toggle="collapse"
                                                   data-bs-target="#flush-collapsefcon{{ $key+1 }}">
                                                                      <span>
                                                                                                                                                      <span style="line-height:3">
                                                          <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                                      <br>
                                                                      <span style="text-align:left;"> <span
                                                                                  style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                                      <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                                      <br><br><span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নোটের সর্বশেষ তারিখ: {{ $mainCodeDate }}</span>
                                                                  </span>
                                              </div>
                                          </h2>
                                          <div id="flush-collapsefcon{{ $key+1 }}"
                                               class="accordion-collapse collapse">
                                              <div class="accordion-body">
                                                  <div class="d-flex mt-3">
                                                      <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-plus"></i>
                                                          নতুন নোট
                                                      </button>
                                                      <button class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-envelope"></i>
                                                          সকল নোট
                                                      </button>
                                                  </div>
                                                  <div class="card-body">

              <?php

              if($nothiLists1->dakType == 'fcOne'){



              $allNoteListNew = DB::table('parent_note_for_fc_ones')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();







              }



              ?>
              @if(count($allNoteListNew) > 0)
              <ul>
              @foreach($allNoteListNew as $key=>$allNoteListNews)
                                                    <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                                          @endforeach
                                                      </ul>

                                                      @else


                                                      <p>কোন নোট পাওয়া যায়নি</p>
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                              @endif
                              @endforeach

                                  <!-- fd one end -->

                                  <!-- fc two start -->

                                  @foreach ($senderNothiListfctwo->unique('receiver') as $key=>$nothiLists1)

                                  <?php

              $nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
              ?>

              @if(!$nothiLists)

              @else


              <?php
              $getLastId = DB::table('parent_note_for_fc_twos')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->value('id');



              $getLastIdDate = DB::table('child_note_for_fc_twos')->where('parent_note_for_fc_two_id',$getLastId)
              //->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->first();

              if(!$getLastIdDate){

              $mainCodeDate ='';

              }else{


                  $mainCodeDate =App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($getLastIdDate->created_at))).' '.$getLastIdDate->amPmValue;

              }


              ?>
                              <tr>
                                  <td>
                                      <div class="accordion-item">
                                          <h2 class="accordion-header" id="flush-headingTwo">
                                              <div class="accordion-button collapsed"
                                                   data-bs-toggle="collapse"
                                                   data-bs-target="#flush-collapsefctw{{ $key+1 }}">
                                                                      <span>
                                                                                                                                                      <span style="line-height:3">
                                                          <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                                      <br>
                                                                      <span style="text-align:left;"> <span
                                                                                  style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                                      <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                                      <br><br><span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নোটের সর্বশেষ তারিখ: {{ $mainCodeDate }}</span>
                                                                  </span>
                                              </div>
                                          </h2>
                                          <div id="flush-collapsefctw{{ $key+1 }}"
                                               class="accordion-collapse collapse">
                                              <div class="accordion-body">
                                                  <div class="d-flex mt-3">
                                                      <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-plus"></i>
                                                          নতুন নোট
                                                      </button>
                                                      <button class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-envelope"></i>
                                                          সকল নোট
                                                      </button>
                                                  </div>
                                                  <div class="card-body">

              <?php
              if($nothiLists1->dakType == 'fcTwo'){




              $allNoteListNew = DB::table('parent_note_for_fc_twos')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();







              }



              ?>
              @if(count($allNoteListNew) > 0)
              <ul>
              @foreach($allNoteListNew as $key=>$allNoteListNews)
                                                    <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                                          @endforeach
                                                      </ul>

                                                      @else


                                                      <p>কোন নোট পাওয়া যায়নি</p>
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                              @endif
                              @endforeach

                                  <!-- fc two end -->

                                  <!-- fd three start -->

                                  @foreach ($senderNothiListfdThree->unique('receiver') as $key=>$nothiLists1)

                                  <?php

              $nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
              ?>

              @if(!$nothiLists)

              @else


              <?php
              $getLastId = DB::table('parent_note_for_fd_threes')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->value('id');



              $getLastIdDate = DB::table('child_note_for_fd_threes')->where('parent_note_for_fd_three_id',$getLastId)
              //->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->first();

              if(!$getLastIdDate){

              $mainCodeDate ='';

              }else{


                  $mainCodeDate =App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($getLastIdDate->created_at))).' '.$getLastIdDate->amPmValue;

              }


              ?>
                              <tr>
                                  <td>
                                      <div class="accordion-item">
                                          <h2 class="accordion-header" id="flush-headingTwo">
                                              <div class="accordion-button collapsed"
                                                   data-bs-toggle="collapse"
                                                   data-bs-target="#flush-collapsefdt{{ $key+1 }}">
                                                                      <span>
                                                                                                                                                      <span style="line-height:3">
                                                          <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                                      <br>
                                                                      <span style="text-align:left;"> <span
                                                                                  style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                                      <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                                      <br><br><span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নোটের সর্বশেষ তারিখ: {{ $mainCodeDate }}</span>
                                                                  </span>
                                              </div>
                                          </h2>
                                          <div id="flush-collapsefdt{{ $key+1 }}"
                                               class="accordion-collapse collapse">
                                              <div class="accordion-body">
                                                  <div class="d-flex mt-3">
                                                      <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-plus"></i>
                                                          নতুন নোট
                                                      </button>
                                                      <button class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-envelope"></i>
                                                          সকল নোট
                                                      </button>
                                                  </div>
                                                  <div class="card-body">

              <?php

              if($nothiLists1->dakType == 'fdThree'){






              $allNoteListNew = DB::table('parent_note_for_fd_threes')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();





              }



              ?>
              @if(count($allNoteListNew) > 0)
              <ul>
              @foreach($allNoteListNew as $key=>$allNoteListNews)
                                                    <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                                          @endforeach
                                                      </ul>

                                                      @else


                                                      <p>কোন নোট পাওয়া যায়নি</p>
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                              @endif
                              @endforeach
                                  <!-- fd three end -->

                                  <!-- duplicate start -->

                                  @foreach ($senderNothiListduplicate->unique('receiver') as $key=>$nothiLists1)

                                  <?php

              $nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
              ?>

              @if(!$nothiLists)

              @else


              <?php
              $getLastId = DB::table('parent_note_for_duplicate_certificates')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->value('id');



              $getLastIdDate = DB::table('child_note_for_duplicate_certificates')->where('pnote_dupid',$getLastId)
              //->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->first();

              if(!$getLastIdDate){

              $mainCodeDate ='';

              }else{


                  $mainCodeDate =App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($getLastIdDate->created_at))).' '.$getLastIdDate->amPmValue;

              }


              ?>
                              <tr>
                                  <td>
                                      <div class="accordion-item">
                                          <h2 class="accordion-header" id="flush-headingTwo">
                                              <div class="accordion-button collapsed"
                                                   data-bs-toggle="collapse"
                                                   data-bs-target="#flush-collapsedup{{ $key+1 }}">
                                                                      <span>
                                                                                                                                                      <span style="line-height:3">
                                                          <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                                      <br>
                                                                      <span style="text-align:left;"> <span
                                                                                  style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                                      <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                                      <br><br><span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নোটের সর্বশেষ তারিখ: {{ $mainCodeDate }}</span>
                                                                  </span>
                                              </div>
                                          </h2>
                                          <div id="flush-collapsedup{{ $key+1 }}"
                                               class="accordion-collapse collapse">
                                              <div class="accordion-body">
                                                  <div class="d-flex mt-3">
                                                      <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-plus"></i>
                                                          নতুন নোট
                                                      </button>
                                                      <button class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-envelope"></i>
                                                          সকল নোট
                                                      </button>
                                                  </div>
                                                  <div class="card-body">

              <?php
              if($nothiLists1->dakType == 'duplicate'){






              $allNoteListNew = DB::table('parent_note_for_duplicate_certificates')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();





              }



              ?>
              @if(count($allNoteListNew) > 0)
              <ul>
              @foreach($allNoteListNew as $key=>$allNoteListNews)
                                                    <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                                          @endforeach
                                                      </ul>

                                                      @else


                                                      <p>কোন নোট পাওয়া যায়নি</p>
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                              @endif
                              @endforeach

                                  <!-- duplicate end-->
                                  <!-- constitution start-->

                                  @foreach ($senderNothiListconstitution->unique('receiver') as $key=>$nothiLists1)

                                  <?php

              $nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
              ?>

              @if(!$nothiLists)

              @else

              <?php
              $getLastId = DB::table('parent_note_for_constitutions')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->value('id');



              $getLastIdDate = DB::table('child_note_for_constitutions')->where('pnote_conid',$getLastId)
              //->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->first();

              if(!$getLastIdDate){

              $mainCodeDate ='';

              }else{


                  $mainCodeDate =App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($getLastIdDate->created_at))).' '.$getLastIdDate->amPmValue;

              }


              ?>
                              <tr>
                                  <td>
                                      <div class="accordion-item">
                                          <h2 class="accordion-header" id="flush-headingTwo">
                                              <div class="accordion-button collapsed"
                                                   data-bs-toggle="collapse"
                                                   data-bs-target="#flush-collapsecon{{ $key+1 }}">
                                                                      <span>
                                                                                                                                                      <span style="line-height:3">
                                                          <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                                      <br>
                                                                      <span style="text-align:left;"> <span
                                                                                  style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                                      <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                                      <br><br><span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নোটের সর্বশেষ তারিখ: {{ $mainCodeDate }}</span>
                                                                  </span>
                                              </div>
                                          </h2>
                                          <div id="flush-collapsecon{{ $key+1 }}"
                                               class="accordion-collapse collapse">
                                              <div class="accordion-body">
                                                  <div class="d-flex mt-3">
                                                      <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-plus"></i>
                                                          নতুন নোট
                                                      </button>
                                                      <button class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-envelope"></i>
                                                          সকল নোট
                                                      </button>
                                                  </div>
                                                  <div class="card-body">

              <?php


              if($nothiLists1->dakType == 'constitution'){






              $allNoteListNew = DB::table('parent_note_for_constitutions')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();





              }



              ?>
              @if(count($allNoteListNew) > 0)
              <ul>
              @foreach($allNoteListNew as $key=>$allNoteListNews)
                                                    <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                                          @endforeach
                                                      </ul>

                                                      @else


                                                      <p>কোন নোট পাওয়া যায়নি</p>
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                              @endif
                              @endforeach

                                  <!-- constitution end-->

                                  <!-- executive committee start-->

                                  @foreach ($senderNothiListcommittee->unique('receiver') as $key=>$nothiLists1)

                                  <?php

              $nothiLists = DB::table('nothi_lists')->where('id',$nothiLists1->nothId)->first();
              ?>

              @if(!$nothiLists)

              @else

              <?php
              $getLastId = DB::table('parent_not_for_executive_committees')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->value('id');



              $getLastIdDate = DB::table('child_note_for_executive_committees')->where('pnote_exeid',$getLastId)
              //->where('serial_number',$nothiLists1->nothId)
              ->orderBy('id','desc')
              ->first();

              if(!$getLastIdDate){

              $mainCodeDate ='';

              }else{


                  $mainCodeDate =App\Http\Controllers\Admin\CommonController::englishToBangla(date('d/m/y h:i:s', strtotime($getLastIdDate->created_at))).' '.$getLastIdDate->amPmValue;

              }


              ?>
                              <tr>
                                  <td>
                                      <div class="accordion-item">
                                          <h2 class="accordion-header" id="flush-headingTwo">
                                              <div class="accordion-button collapsed"
                                                   data-bs-toggle="collapse"
                                                   data-bs-target="#flush-collapseccc{{ $key+1 }}">
                                                                      <span>
                                                                                                                                                      <span style="line-height:3">
                                                          <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথিঃ</span>  {{ $nothiLists->document_subject }}</span>
                                                                      <br>
                                                                      <span style="text-align:left;"> <span
                                                                                  style="padding:5px; background-color:#879dd9; border-radius: 10px;">নথি নম্বরঃ</span> {{ $nothiLists->main_sarok_number }}
                                                                      <span style="padding:5px; background-color:#879dd9; border-radius: 10px;">শাখাঃ</span> {{ $nothiLists->document_branch }}</span>
                                                                      <br><br><span style="padding:5px; background-color:#879dd9; border-radius: 10px;">নোটের সর্বশেষ তারিখ: {{ $mainCodeDate }}</span>
                                                                  </span>
                                              </div>
                                          </h2>
                                          <div id="flush-collapseccc{{ $key+1 }}"
                                               class="accordion-collapse collapse">
                                              <div class="accordion-body">
                                                  <div class="d-flex mt-3">
                                                      <button onclick="location.href = '{{ route('addParentNoteFromView',['status'=>$nothiLists1->dakType,'dakId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists->id]) }}';" class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-plus"></i>
                                                          নতুন নোট
                                                      </button>
                                                      <button class="btn btn-transparent ms-3" type="button">
                                                          <i class="fa fa-envelope"></i>
                                                          সকল নোট
                                                      </button>
                                                  </div>
                                                  <div class="card-body">

              <?php

              if($nothiLists1->dakType == 'committee'){






              $allNoteListNew = DB::table('parent_not_for_executive_committees')->where('nothi_detail_id',$nothiLists1->dakId)
              ->where('serial_number',$nothiLists1->nothId)
              // ->where('id',$nothiLists1->noteId)
              ->get();





              }



              ?>
              @if(count($allNoteListNew) > 0)
              <ul>
              @foreach($allNoteListNew as $key=>$allNoteListNews)
                                                    <li>  {{ App\Http\Controllers\Admin\CommonController::englishToBangla(($key+1)) }} .   <a href="{{ route('viewChildNote', ['status' =>$nothiLists1->dakType,'parentId'=>$nothiLists1->dakId,'nothiId'=>$nothiLists1->nothId,'id' =>$allNoteListNews->id,'activeCode' => ($key+1)]) }}">{{ $allNoteListNews->subject }}</a> </li>
                                                          @endforeach
                                                      </ul>

                                                      @else


                                                      <p>কোন নোট পাওয়া যায়নি</p>
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                              @endif
                              @endforeach

                                  <!-- executive committee end-->
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
