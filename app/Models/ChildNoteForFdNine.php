<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildNoteForFdNine extends Model
{
    use HasFactory;

    protected $table = "child_note_for_fd_nines";

    protected $fillable = [
        'p_note_for_fd_nine_id',
        'serial_number',
        'description',
        'admin_id',
        'receiver_id',
        'sent_status'
    ];

    public function parentNoteForFdNine()
    {
        return $this->belongsTo(ParentNoteForFdNine::class,'p_note_for_fd_nine_id');
    }
}
