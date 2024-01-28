@extends('admin.master.master')

@section('title')
এফডি - ৩ ফরম | {{ $insName }}
@endsection


@section('css')

@endsection


@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>এফডি - ৩ ফরম</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">হোম</a></li>
                    <li class="breadcrumb-item">এফডি - ৩ ফরম</li>
                    <li class="breadcrumb-item active">পিডিএফ</li>
                </ol>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="user-profile">
        <div class="row">

            <object
            data='{{ $insUrl }}{{ 'public/'.$formOneData }}'
            type="application/pdf"
            width="500"
            height="900">

            <iframe
              src='{{ $insUrl }}{{ 'public/'.$formOneData }}'
              width="500"
              height="900">
            <p>This browser does not support PDF!</p>
            </iframe>
          </object>

        </div>
    </div>
</div>
@endsection



@section('script')

@endsection
