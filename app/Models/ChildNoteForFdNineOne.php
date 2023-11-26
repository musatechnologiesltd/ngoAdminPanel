<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildNoteForFdNineOne extends Model
{
    use HasFactory;
    protected $fillable = [
        'p_note_for_fd_nine_one_id',
        'serial_number',
        'description'
    ];

    public function parentNoteForFdNineOne()
    {
        return $this->belongsTo(ParentNoteForFdNineOne::class,'p_note_for_fd_nine_one_id');
    }
}
