@extends('admin.master.master')

@section('title')
Employee End Date List
@endsection


@section('css')
<link href="{{ asset('/') }}public/admin/assets/jquery-editable-select.min.css" rel="stylesheet" />
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <h3>Employee End Date List</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Employee End Date List</li>

          </ol>
        </div>
       
      </div>
    </div>
  </div>
        <!-- end page title -->
 <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                      <form class="custom-validation" action="{{ route('employeeEndDatePost') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                @csrf
                        
                          <div class="mb-3">
                                        <label class="form-label" for="">Employee</label>
                            <div class="span7">
                                        <select class="form-control" required name="admin_id" id="admin_id" type="text" placeholder="">
                                            <option value="">--Please Select--</option>
                                            @foreach($users as $AllBranchLists)
                                            <option value="{{ $AllBranchLists->id }}" >{{ $AllBranchLists->admin_name }}</option>
                                            @endforeach
                                        </select>
                            </div>
                                        @if ($errors->has('admin_id'))
                                        <span class="text-danger">{{ $errors->first('admin_id') }}</span>
                                    @endif
                                    </div>
                        
                      </form>
                      
                  </div>
                  
              </div>
               </div>
           </div>
    </div>
@endsection
@section('script')
 <script src="{{ asset('/') }}public/admin/assets/jquery-editable-select.js"></script>

 <script>
        $(document).ready(function () {
            $("#admin_id").change(function () {
                var mainId = $(this).val();
                alert(mainId);
            });
        });
    </script>


    <script>
      window.onload = function () {
        $('#basic').editableSelect();
        $('#default').editableSelect({ effects: 'default' });
        $('#slide').editableSelect({ effects: 'slide' });
        $('#fade').editableSelect({ effects: 'fade' });
        $('#filter').editableSelect({ filter: false });
        $('#html').editableSelect();
        $('#onselect').editableSelect({
          onSelect: function (element) {
            $('#afterSelect').html($(this).val());
          }
        });
      }
    </script>
@endsection