<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function getFile(){
        return $this->hasOne(File::class,'patient_id','id');
    }

    public function getLabs(){
        return $this->hasMany(Lab::class,'patient_id','id');
    }

    public function getServices(){
        return $this->belongsToMany(
            Service::class,
        'service_patients',
            'patient_id',
            'service_id'
        );
    }
}
