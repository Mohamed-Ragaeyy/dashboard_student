<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplinary extends Model
{
    use HasFactory;
    protected $table = 'disciplinary';
    protected $fillable = [
        'id_student',
        'reason',
        'type',
        'class_discount',
    ];

    public $timestamps = false;
}
