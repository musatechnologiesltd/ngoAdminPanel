<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['branch_name','branch_code','branch_step'];

    public function admin()
    {
        return $this->belongsTo(Admin::class,'branch_id');
    }



    public function designationList()
    {
        return $this->hasMany(DesignationList::class,'branch_id');
    }


}
