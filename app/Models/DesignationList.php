<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignationList extends Model
{
    use HasFactory;
    protected $fillable = ['branch_id','designation_name'];

    public function admin()
    {
        return $this->belongsTo(Admin::class,'designation_list_id');
    }

    public function designationStep()
    {
        return $this->hasMany(DesignationStep::class,'designation_list_id');
    }

   


    public function branchList()
    {
        return $this->hasOne(Branch::class,'branch_id');
    }
}
