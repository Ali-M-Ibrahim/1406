<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function getPatients(){
        return $this->belongsToMany(Patient::class,
        'service_patients',
        'service_id',
        'patient_id');
    }
}
