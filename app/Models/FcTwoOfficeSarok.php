<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcTwoOfficeSarok extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_note_for_fc_two_id',
        'office_subject',
        'office_sutro',
        'description',
        'admin_id',
        'receiver_id',
        'sent_status'
    ];
}
