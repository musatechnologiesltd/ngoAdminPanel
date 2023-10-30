<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcTwoDak extends Model
{
    use HasFactory;

    protected $fillable = ['dak_detail_id','attraction_attention','informational_purposes','copy_of_work','sender_admin_id','receiver_admin_id','fc_two_status_id','original_recipient','status'];
}
