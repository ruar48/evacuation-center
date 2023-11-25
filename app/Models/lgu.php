<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lgu extends Model
{
    protected $fillable = [
        'city',
        'contact_info',
        'email',
        'website',
        'fb',


    ];
    use HasFactory;
}
