<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdThreeDocPresent extends Model
{
    use HasFactory;

    protected $fillable = ['fd_three_dak_id','document_branch','document_type_id','document_number','document_year','document_class','document_subject','sender','receiver'];
}
