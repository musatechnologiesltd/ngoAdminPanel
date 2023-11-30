<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildNoteForNameChange extends Model
{
    use HasFactory;
    protected $fillable = [
        'parentnote_name_change_id',
        'serial_number',
        'description'
    ];

    public function parentNoteForNameChange()
    {
        return $this->belongsTo(ParentNoteForNameChange::class,'parentnote_name_change_id');
    }
}