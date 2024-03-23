<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory;
    use HasApiTokens, Notifiable;

    protected $table = 'requests';

    protected $fillable = [
        'employee_id',
        'services_id',
        'requirements_pass',
        'comments',
        'price',
        'clients_id',
        'finishied',
        'paid',
        'invoice_id',
        'paid_amount',
        'filess',
        'sample_date',
        'reciveing_date',
        'expiredate',
    ];
    public $timestamps = false;
}

