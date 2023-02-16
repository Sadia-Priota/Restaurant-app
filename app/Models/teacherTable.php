<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacherTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course',
        'institute',
    ];

    protected $table = 'teacher_tables';
}
