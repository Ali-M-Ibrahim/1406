<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function getPatient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
}
