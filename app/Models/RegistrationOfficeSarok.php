<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationOfficeSarok extends Model
{
    use HasFactory;


    protected $fillable = [
        'parent_note_regid',
        'office_subject',
        'office_sutro',
        'description',
        'admin_id',
        'receiver_id',
        'sent_status'
    ];


}
