<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildNoteForRenew extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_note_for_renew_id',
        'serial_number',
        'description'
    ];


    public function parentNoteForRenew()
    {
        return $this->belongsTo(ParentNoteForRenew::class,'parent_note_for_renew_id');
    }
}
