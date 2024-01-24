@extends('admin.master.master')

@section('title')
কর্মকর্তার তথ্য আপডেট করুন
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <h3>কর্মকর্তার তথ্য</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
            <li class="breadcrumb-item">কর্মকর্তার তথ্য আপডেট করুন</li>

          </ol>
        </div>
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6 mt-3">

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
                            <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data" id="form" data-parsley-validate="">

                                @csrf
                                @method('PUT')
                                  <div class="row">

                                      <div class="col-lg-12">
                                          <div class="card">
                                              <div class="card-body">


                                                  <div class="row">
                              <div class="form-group col-md-6 col-sm-12">
                                  <label for="name">নাম (ইংরেজি) <span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" id="name" name="name" data-parsley-maxlength="150" value="{{ $user->admin_name }}" placeholder="নাম (ইংরেজি)" required>

                                  @if ($errors->has('name'))
                                  <span class="text-danger">{{ $errors->first('name') }}</span>
                              @endif


                              </div>


                              <div class="form-group col-md-6 col-sm-12">
                                <label for="name">নাম <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name_ban" name="name_ban" data-parsley-maxlength="150" value="{{ $user->admin_name_ban }}" placeholder="নাম" required>

                                @if ($errors->has('name_ban'))
                                <span class="text-danger">{{ $errors->first('name_ban') }}</span>
                            @endif


                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="email">ইমেইল <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" data-parsley-maxlength="100" id="email" value="{{ $user->email }}" name="email" placeholder="ইমেইল" required>

                                @if ($errors->has('email'))
                              <span class="text-danger">{{ $errors->first('email') }}</span>
                          @endif
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="text">মোবাইল নম্বর <span class="text-danger">*</span></label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type = "number"
                                maxlength = "11" class="form-control form-control-sm" class="form-control form-control-sm" id="text" data-parsley-length="[11, 11]" name="phone" value="{{ $user->admin_mobile }}" placeholder="মোবাইল নম্বর" required>

                                @if ($errors->has('phone'))
                              <span class="text-danger">{{ $errors->first('phone') }}</span>
                          @endif
                            </div>


                          </div>



                          <div class="row">
                              <div class="form-group col-md-6 col-sm-12">
                                  <label for="password">রোল বরাদ্দ করুন <span class="text-danger">*</span></label>
                                  <select name="roles[]" id="roles" multiple="multiple"  class="form-control form-control-sm js-example-basic-multiple" required>
                                      @foreach ($roles as $role)
                  <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                               <div class="form-group col-md-6 col-sm-12">
                                  <label for="password_confirmation">প্রোফাইল ছবি</label>
                                  <input type="file" class="form-control form-control-sm" id="" name="image" accept="image/png, image/jpg, image/jpeg" placeholder="Enter Image" >
                                  <img src="{{ asset('/') }}{{ $user->admin_image }}" style="height:30px;margin-top:10px;"/>
                                  @if ($errors->has('image'))
                                  <span class="text-danger">{{ $errors->first('image') }}</span>
                              @endif

                              <small class="form-text text-muted" id="emailHelp">Image Size: 100px * 100px</small>
                              </div>

                              <div class="form-group col-md-12 col-sm-12">
                                <label for="password_confirmation">স্বাক্ষর</label>
                                <input type="file" class="form-control form-control-sm" id="" name="sign" accept="image/png, image/jpg, image/jpeg" placeholder="Enter Image" >
                                <img src="{{ asset('/') }}{{ $user->admin_sign }}" style="height:30px;margin-top:10px;"/>
                                @if ($errors->has('sign'))
                                <span class="text-danger">{{ $errors->first('sign') }}</span>
                            @endif
                            <small class="form-text text-muted" id="emailHelp">Image Size: 300px * 80px</small

                            </div>


                          </div>


                                              </div>

                                          </div>
                                      </div>



                                      <div class="col-lg-12">
                                          <div class="float-right d-none d-md-block">
                                              <div class="form-group mb-4">
                                                  <div>
                                                      <button type="submit" class="btn btn-primary btn-lg  waves-effect  btn-sm waves-light mr-1">
                                                        আপডেট করুন
                                                      </button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div> <!-- end col -->
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('Script')

@endsection
