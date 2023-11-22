<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FcOneDocPresent extends Model
{
    use HasFactory;

    protected $fillable = ['fc_one_dak_id','document_branch','document_type_id','document_number','document_year','document_class','document_subject','sender','receiver'];
}
