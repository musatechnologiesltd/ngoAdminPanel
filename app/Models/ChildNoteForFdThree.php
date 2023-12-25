<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildNoteForFdThree extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_note_for_fd_three_id',
        'serial_number',
        'description',
        'admin_id',
        'receiver_id',
        'sent_status'
    ];

    public function parentNoteForFdThree()
    {
        return $this->belongsTo(ParentNoteForFdThree::class,'parent_note_for_fd_three_id');
    }
}
