<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoNameChangeDak extends Model
{
    use HasFactory;
    protected $fillable = ['dak_detail_id','attraction_attention','informational_purposes','copy_of_work','sender_admin_id','receiver_admin_id','name_change_status_id','original_recipient','status'];
}
