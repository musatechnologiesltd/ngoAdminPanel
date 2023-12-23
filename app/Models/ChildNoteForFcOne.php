<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildNoteForFcOne extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_note_for_fc_one_id',
        'serial_number',
        'description',
        'admin_id'
    ];

    public function parentNoteForFcOne()
    {
        return $this->belongsTo(ParentNoteForFcOne::class,'parent_note_for_fc_one_id');
    }
}
