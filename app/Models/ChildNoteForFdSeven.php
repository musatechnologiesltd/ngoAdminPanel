<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildNoteForFdSeven extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_note_for_fd_seven_id',
        'serial_number',
        'description'
    ];

    public function parentNoteForFdSeven()
    {
        return $this->belongsTo(ParentNoteForFdSeven::class,'parent_note_for_fd_seven_id');
    }
}
