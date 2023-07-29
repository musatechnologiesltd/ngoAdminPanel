@extends('admin.master.master')

@section('title')
Assigned User List | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Assigned User</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Assigned User List</li>
                </ol>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div>
</div>


<!-- Container-fluid starts-->
<div class="container-fluid list-products">
    <div class="row">
        <!-- Individual column searching (text inputs) Starts-->
        <div class="col-sm-12">
            <div class="card">

                <div class="card-body">

                    @foreach($branchLists as $AllBranchLists)

                    <?php


                     ?>
                    <div class="card">

                        <div class="card-header">
                          <span style="font-weight:900;font-size:15px;">{{ $AllBranchLists->branch_name }}</span>
                        </div>

                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Designation Name</th>
                                      <th scope="col">Staff Name</th>
                                      <th scope="col">Start Date</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th scope="row">1</th>
                                      <td>Mark</td>
                                      <td>Otto</td>
                                      <td>@mdo</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">2</th>
                                      <td>Jacob</td>
                                      <td>Thornton</td>
                                      <td>@fat</td>
                                    </tr>

                                  </tbody>
                            </table>

                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
        <!-- Individual column searching (text inputs) Ends-->
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection


@section('script')
@endsection

