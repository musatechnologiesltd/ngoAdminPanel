<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoFDNineDak extends Model
{
    use HasFactory;

    protected $fillable = ['attraction_attention','informational_purposes','copy_of_work','sender_admin_id','receiver_admin_id','f_d_nine_status_id','original_recipient','status'];
}