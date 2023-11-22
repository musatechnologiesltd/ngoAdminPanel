<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdNineOneDocPresent extends Model
{
    use HasFactory;

    protected $fillable = ['ngo_f_d_nine_one_dak_id','document_branch','document_type_id','document_number','document_year','document_class','document_subject','sender','receiver'];
}
