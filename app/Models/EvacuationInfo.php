<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvacuationInfo extends Model
{
    protected $fillable = [
        'Last_name',
        'First_name',
        'Middle_name',
        'contact',
        'age',
        'gender',
        'brgy',
        'address',
        'head_fam',
        'evac_center',
        'calamity',

    ];

    public function barangay_information(){
        return $this->belongsTo(BaranagyInfo::class);
    }

    public function calamity_type(){
        return $this->belongsTo(CalamityType::class);
    }

    public function evac_center(){
        return $this->belongsTo(EvacuationCenter::class);
    }
    use HasFactory;
}
