<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleSign extends Model
{
    use HasFactory;

    protected $fillable = ['dakDetailId','childId','sender','permissionId','back_status'];
}