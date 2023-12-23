<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildNoteForFcTwo extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_note_for_fc_two_id',
        'serial_number',
        'description',
        'admin_id'
    ];

    public function parentNoteForFcTwo()
    {
        return $this->belongsTo(ParentNoteForFcTwo::class,'parent_note_for_fc_two_id');
    }
}
