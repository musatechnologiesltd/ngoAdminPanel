<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdSevenOfficeSarok extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_note_for_fd_seven_id',
        'office_subject',
        'office_sutro',
        'description'
    ];
}