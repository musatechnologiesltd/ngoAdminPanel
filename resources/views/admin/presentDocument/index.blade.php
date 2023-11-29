@extends('admin.master.master')

@section('title')
নথি তালিকা
@endsection


@section('body')
  <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>নথি তালিকা </h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                                <li class="breadcrumb-item">নথি তালিকা</li>
                            </ol>
                        </div>
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                            @if (Auth::guard('admin')->user()->can('countryAdd'))
                            <a class="btn btn-primary dropdown-toggle waves-effect  btn-sm waves-light mt-5" type="button" href="{{ route('documentPresent.create') }}">
                                                                    <i class="far fa-calendar-plus  mr-2"></i> নতুন নথি তৈরী করুন
                            </a>
                                                                @endif
                        </div>
                    </div>
                </div>
            </div>

              <!-- Container-fluid starts-->
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card">
                      <div class="card-header pb-0">
                        <h5>নথি তালিকা</h5>
                      </div>
                      <div class="card-body">
                        @include('flash_message')
                        <div class="table-responsive">
                            <table id="basic-1" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                            <th>ক্র: নং:</th>
                                                            <th>নথি শাখা</th>
                                                            <th>নথি ধরণ</th>
                                                            <th>নথি নম্বর</th>
                                                            <th>নথি শ্রেণি</th>
                                                            <th>নথির বিষয়</th>
                                                            <th>বছর</th>
                                                            <th>কার্যকলাপ</th>
                                                                    </tr>
                                                                </thead>


                                                                <tbody>
                                                                    @foreach ($nothiList as $nothiLists)


                                                        <tr>
                                                           <td>


                                                            {{ $loop->index+1 }}




                                                        </td>

                                                            <td>{{ $nothiLists->document_branch }}</td>
                                                            <td>


                                                                <?php


                                                                $documenTypes = DB::table('document_types')
                                                                ->where('id',$nothiLists->document_type_id)
                                                                ->value('document_type');

                                                           ?>


                                                                {{ $documenTypes }}



                                                            </td>
                                                            <td>{{ App\Http\Controllers\Admin\CommonController::englishToBangla('১১.২২.৩৩৩৩.৪৪৪.৫৫.'.$nothiLists->document_number) }}</td>
                                                            <td>{{ $nothiLists->document_class }}</td>
                                                            <td>{{ $nothiLists->document_subject }}</td>
                                                            <td>{{ $nothiLists->document_year }}</td>
                                                            <td>
                                                              @if (Auth::guard('admin')->user()->can('countryUpdate'))
                                                                  <button type="button" onclick="location.href = '{{ route('documentPresent.edit',$nothiLists->id) }}';"
                                                                  class="btn btn-primary  btn-sm" >
                                                                  <i class="fa fa-pencil"></i></button>




                        @endif

                        {{-- <button type="button" class="btn btn-primary waves-light waves-effect  btn-sm" onclick="window.location.href='{{ route('admin.users.view',$nothiLists->id) }}'"><i class="fa fa-eye"></i></button> --}}

                                                          @if (Auth::guard('admin')->user()->can('countryDelete'))

                        <button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $nothiLists->id}})" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></button>
                                            <form id="delete-form-{{ $nothiLists->id }}" action="{{ route('documentPresent.destroy',$nothiLists->id) }}" method="POST" style="display: none;">
                                              @method('DELETE')
                                                                            @csrf

                                                                        </form>
                                                                        @endif
                                                            </td>
                                                        </tr>
                        @endforeach


                                                                </tbody>
                                                            </table>
                        </div>

                      </div>

                    </div>

                  </div>
                </div>
              </div>
            <!-- Container-fluid Ends-->
@endsection
@section('script')
<script>


$("#document_type_id").change(function(){

    var docId = $(this).val();


    $.ajax({
            url: "{{ route('docTypeCode') }}",
            method: 'GET',
            data: {docId:docId},
            success: function(data) {

                 $("#document_number").val(data+'.');
            }
            });


});
</script>

@endsection
