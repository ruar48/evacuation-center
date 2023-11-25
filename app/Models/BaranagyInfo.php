<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaranagyInfo extends Model
{
    protected $fillable = [
        'barangay_name',

    ];
    public function evac_information(){
        return $this->hasMany(EvacuationInfo::class);
    }
    use HasFactory;
}
