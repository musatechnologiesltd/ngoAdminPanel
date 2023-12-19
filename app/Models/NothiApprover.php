<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NothiApprover extends Model
{
    use HasFactory;

    protected $fillable = ['nothiId','noteId','adminId','status','bangla_date'];
}
