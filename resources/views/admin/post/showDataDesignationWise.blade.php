<form class="custom-validation" action="{{ route('dakListFirstStep') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
    @csrf
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>কর্মকর্তা</th>
        </tr>

        @foreach($totalBranchList as $allTotalBranchList)

       <?php

          $getAllDesignationName = DB::table('designation_lists')
          ->where('branch_id',$allTotalBranchList->id)
          ->whereIn('id',$totalDesi)->orderBy('designation_serial','asc')->get();

        ?>
        <tr >
            <td>
                <button data-id="{{ $allTotalBranchList->id }}" class="btn btn-outline-success remove-input-field-new"><i class="fa fa-trash"></i></button>
            </td>
            <td>
                <b>শাখাঃ {{ $allTotalBranchList->branch_name }}</b>
                <table class="table table-bordered">
                @foreach($getAllDesignationName as $allGetAllDesignationName)

                <?php
                $adminId = DB::table('admin_designation_histories')->where('designation_list_id',$allGetAllDesignationName->id)->value('admin_id');
                $adminName = DB::table('admins')->where('id',$adminId)->value('admin_name_ban');
        ?>

                <tr id="brnachWiseDelete{{ $allGetAllDesignationName->id }}">

                    <td>
                        <a data-id="{{ $allTotalBranchList->id }}"  class="btn btn-outline-success remove-input-field"><i class="fa fa-trash"></i></a>
                    </td>
                    <td>
                        <input type="hidden" value="{{ $id }}" name="main_id"/>
                        <input type="hidden" value="{{ $adminId }}" name="admin_id[]"/>
                        {{ $adminName }},{{ $allGetAllDesignationName->designation_name }} <span style="font-size:12px; color: #aeaeae;">{{ $allTotalBranchList->branch_name }}</span>
                    </td>

                </tr>

                @endforeach
                </table>
            </td>
        </tr>

        @endforeach





    </table>


    <button type="submit" class="btn btn-success mt-5">জমা দিন</button>

    </form>

    <script>
    $(document).on('click', '.remove-input-field', function () {
        //$(this).parents('tr').remove();

           var deleteId = $(this).data('id');



         $('#brnachWiseDelete'+deleteId).remove();
    });


    $(document).on('click', '.remove-input-field-new', function () {

        // var deleteId = $(this).data('id');



        // $('#brnachWiseDelete'+deleteId).remove();

        $(this).parents('tr').remove();
    });



    </script>
