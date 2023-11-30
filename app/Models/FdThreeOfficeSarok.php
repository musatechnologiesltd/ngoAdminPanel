<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdThreeOfficeSarok extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_note_for_fd_three_id',
        'office_subject',
        'office_sutro',
        'description'
    ];
}