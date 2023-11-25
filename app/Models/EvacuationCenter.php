<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvacuationCenter extends Model
{

    protected $fillable = [
        'center_name',
        'address',
        'contact',

    ];

    public function evac_center(){
        return $this->hasMany(EvacuationInfo::class);
    }
    use HasFactory;
}
