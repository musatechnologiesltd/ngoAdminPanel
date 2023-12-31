<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoFDNineOneDak extends Model
{
    use HasFactory;

    protected $table = "ngo_f_d_nine_one_daks";

    protected $fillable = ['dak_detail_id','attraction_attention','informational_purposes','copy_of_work','sender_admin_id','receiver_admin_id','f_d_nine_one_status_id','original_recipient','status'];
}
