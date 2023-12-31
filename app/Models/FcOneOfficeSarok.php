<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcOneOfficeSarok extends Model
{
    use HasFactory;

    protected $table = "fc_one_office_saroks";

    protected $fillable = [
        'parent_note_for_fc_one_id',
        'office_subject',
        'office_sutro',
        'description',
        'admin_id',
        'receiver_id',
        'sent_status'
    ];
}
