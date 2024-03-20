<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoFdSevenDak extends Model
{
    use HasFactory;

    protected $table = "ngo_fd_seven_daks";

    protected $fillable = [

        'nothi_jat_id',
        'nothi_jat_status',
        'dak_detail_id',
        'attraction_attention',
        'informational_purposes',
        'copy_of_work',
        'sender_admin_id',
        'receiver_admin_id',
        'fd_seven_status_id',
        'original_recipient',
        'status',
        'sent_status',
        'present_status',
        'amPmValue'

    ];
}
