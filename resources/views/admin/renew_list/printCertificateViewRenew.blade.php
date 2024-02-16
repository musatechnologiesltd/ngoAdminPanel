<!DOCTYPE html>
<html>
<head>
    <title>PDF</title>
    <style>

        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-size: 16px;
            font-family: mcFont, serif;
            font-weight: bold;
        }

        .pdf_back {
            height: 8.5in;
            width: 11in;
            /* background-image: url('public/cer.jpg'); */
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }

        .content {
            padding: .6in;
        }

        table
        {
            width: 100%;
        }

        .first_table {
            margin-top: 2.2in;
        }

        .second_table
        {
            margin-top: .32in;
        }

        .para_first
        {
            padding-top: 2px;
            height: 55px;
            line-height: 1.6;
            vertical-align:top;
        }

        .third_table
        {
            margin-top: .01in;
        }

        .para_first1
        {
            padding-top: 1px;
            height: 50px;
            line-height: 1.6;
            vertical-align:top;
        }

        .para_first1 p
        {
            text-indent: 50px;
        }

        .forth_table
        {
            margin-top: 8px;
        }
        .fifth_table
        {
            margin-top: 48px;
        }
    </style>
</head>
<body>
<?php
  $ngoTypeData = DB::table('ngo_type_and_languages')->where('user_id',$form_one_data->user_id)->first();

?>
<?php

$lastDate1 = date('Y-m-d', strtotime($ngoTypeData->last_renew_date ));
$newdateR = date("Y-m-d",strtotime ( '-10 year' , strtotime ( $lastDate1 ) )) ;
$tomorrow = date('Y-m-d', strtotime($lastDate1 .' +1 day'));
//dd($tomorrow);
?>
<div class="pdf_back">
    <div class="content">
        <table class="first_table">
            <tr>
                <td style="padding-left:32%;">


                    @if($ngoTypeData->ngo_type_new_old == 'Old')

{{ $ngoTypeData->registration }}

                    @else

                    {{ $form_one_data->registration_number }}

                    @endif


                </td>
                <td style="padding-left: 32%;">{{date('d/m/Y', strtotime($ngoTypeData->ngo_registration_date ))}}</td>
            </tr>
        </table>
        <table class="second_table">
            <tr>
                <td class="para_first">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $form_one_data->organization_name }}.
                </td>
            </tr>
        </table>
        <table class="third_table">
            <tr>
                <td class="para_first1">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $form_one_data->address_of_head_office_eng }}
                </td>
            </tr>
        </table>
        <table class="forth_table">

            <?php

            $lastDate = date('Y-m-d', strtotime($duration_list_all->ngo_duration_end_date ));
            $newdate = date("Y-m-d",strtotime ( '+10 year' , strtotime ( $tomorrow ) )) ;
           // $newyear = date('y', strtotime($newdate));
            ?>

            <tr>
                <td style="padding-left: 7%">{{date('d/m/Y', strtotime($tomorrow ))}}</td>
                <td style="padding-left: 5%">{{date('d/m/Y', strtotime($newdate ))}}</td>
            </tr>



        </table>
        <table class="fifth_table">
            <tr>
                <td style="width: 50%; padding-left: 60%">
                    <p>{{ $word1 }}</p>
                </td>
                <td style="width: 50%; padding-left: 22%">
                    {{ $newmonth }}
                </td>
            </tr>
            <tr>
                <td style="padding-left: 70px">{{ $word }}</td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
