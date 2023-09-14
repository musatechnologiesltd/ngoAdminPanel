<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoRenewDak extends Model
{
    use HasFactory;
    protected $fillable = ['attraction_attention','informational_purposes','copy_of_work','sender_admin_id','receiver_admin_id','renew_status_id','original_recipient','status'];
}