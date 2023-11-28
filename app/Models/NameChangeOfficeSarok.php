<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NameChangeOfficeSarok extends Model
{
    use HasFactory;


    protected $fillable = [
        'parentnote_name_change_id',
        'office_subject',
        'office_sutro',
        'description'
    ];
}
