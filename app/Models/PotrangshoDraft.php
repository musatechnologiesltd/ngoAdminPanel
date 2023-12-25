<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotrangshoDraft extends Model
{
    use HasFactory;

    protected $fillable = [
        'adminId',
        'nothiId',
        'noteId',
        'sarokId',
        'receiverId',
        'SentStatus',
        'status',
        'office_subject',
        'office_sutro',
        'description'
    ];



}
