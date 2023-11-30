<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NothiDetail extends Model
{
    use HasFactory;

    protected $fillable = ['nothId','dakId','dakType','sender','receiver'];

}
