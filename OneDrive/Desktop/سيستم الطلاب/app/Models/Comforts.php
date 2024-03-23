<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comforts extends Model
{
    use HasFactory;
    protected $table = 'comforts';
    protected $fillable = [
        'id_student',
        'reason',
        'days',
        'class_discount',
    ];

    public $timestamps = false;
}
