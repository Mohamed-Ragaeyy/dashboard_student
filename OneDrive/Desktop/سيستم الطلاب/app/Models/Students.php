<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'name',
        'phone',
        'national_number',
        'college',
        'section',
        'total',
        'address',
        'number',
    ];

    public $timestamps = false;
}
