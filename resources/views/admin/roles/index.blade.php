@extends('admin.master.master')

@section('title')
Role
@endsection


@section('body')

<div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <h3>Role List</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Role List</li>

          </ol>
        </div>
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6">
            @if (Auth::guard('admin')->user()->can('roleAdd'))
            <a href="{{ route('role.create') }}" type="button"  class="btn btn-raised btn-primary waves-effect  btn-sm  mt-5" >Add New Role</a>
             @endif
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
                        @include('flash_message')
                        <table id="basic-1" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>

                                        <th>sl</th>
                                        <th>Role Name</th>
                                        <th >Permission List</th>
                                        <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)

                                <tr>
                                   <td>

                                    {{ $loop->index+1 }}

                                    <td>{{ $role->name }}</td>
                                    <td >



                                        @foreach ($role->permissions as $key=>$perm)


                                        @if(($key+1) == 6)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 12)
                                            {{ $perm->name }},<br>
                                            @elseif(($key+1) == 18)
                                            {{ $perm->name }},<br>
                                            @elseif(($key+1) == 24)

                                            {{ $perm->name }},<br>
                                            @elseif(($key+1) == 30)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 36)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 42)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 48)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 54)
                                            {{ $perm->name }},<br>

                                            @elseif(($key+1) == 60)
                                            {{ $perm->name }},<br>

                                            @else
                                            {{ $perm->name }},
                                            @endif


                                        @endforeach

                                    </td>

                                                <td>




                                                        <a href="{{ route('role.edit',$role->id) }}" type="button" class="btn-sm btn btn-primary waves-light waves-effect"><i class="fa fa-edit"></i></a>



                                                        <button type="button" class="btn-sm btn btn-danger waves-light waves-effect" onclick="deleteTag({{ $role->id }})"><i class="fa fa-trash-o"></i></button>

 <form id="delete-form-{{ $role->id }}" action="{{ route('role.destroy',$role->id) }}" method="POST" style="display: none;">
  @method('DELETE')
                                                    @csrf

                                                </form>


                                                </td>
                                            </tr>
                                          @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>
</div>
@endsection

@section('script')
@endsection
