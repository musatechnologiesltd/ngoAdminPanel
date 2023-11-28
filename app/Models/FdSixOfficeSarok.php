<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdSixOfficeSarok extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_note_for_fdsix_id',
        'office_subject',
        'office_sutro',
        'description'
    ];
}
