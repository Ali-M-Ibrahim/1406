<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    public function getPatient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
}
