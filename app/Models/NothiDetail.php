<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NothiDetail extends Model
{
    use HasFactory;
    protected $table = "nothi_details";
    protected $fillable = ['noteId','nothId','dakId','dakType','sender','receiver','back_status','permission_status','zari_permission_status','potroPdf','onumodon_id'];

}
