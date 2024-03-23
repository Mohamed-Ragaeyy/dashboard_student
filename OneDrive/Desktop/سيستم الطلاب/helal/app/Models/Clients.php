<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $fillable = [
        'name',
        'city',
        'tax_reg_number',
        'mobile',
        'tax_file_no',
        'email',
        'emailpassword',
        'tax_username',
        'tax_password',
        'office_password',
        'village',
        'activitie_id',
        'details_activ',
    ];
    public $timestamps = false;
}
