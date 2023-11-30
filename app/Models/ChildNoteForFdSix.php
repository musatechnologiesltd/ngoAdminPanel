<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildNoteForFdSix extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_note_for_fdsix_id',
        'serial_number',
        'description'
    ];

    public function parentNoteForFdsix()
    {
        return $this->belongsTo(ParentNoteForFdsix::class,'parent_note_for_fdsix_id');
    }
}