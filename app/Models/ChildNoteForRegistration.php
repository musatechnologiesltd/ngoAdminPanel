<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildNoteForRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_note_regid',
        'serial_number',
        'description'
    ];


    public function parentNoteForRegistration()
    {
        return $this->belongsTo(ParentNoteForRegistration::class,'parent_note_regid');
    }
}
