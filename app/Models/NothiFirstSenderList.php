<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NothiFirstSenderList extends Model
{
    use HasFactory;

    protected $fillable = ['noteId','nothId','dakId','dakType','sender'];
}
