<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NothiPermission extends Model
{
    use HasFactory;

    protected $fillable = ['nothId','adminId'];
}
