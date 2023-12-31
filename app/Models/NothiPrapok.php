<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NothiPrapok extends Model
{
    use HasFactory;
    protected $table = "nothi_prapoks";
    protected $fillable = ['nothiId','noteId','adminId','nijOfficeId','otherOfficerName','otherOfficerAddress','otherOfficerDesignation','otherOfficerBranch','otherOfficerEmail','otherOfficerPhone','status'];
}
