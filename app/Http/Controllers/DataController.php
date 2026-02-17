<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Lab;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
        // SELECT * FROM PATIENTS WHERE ID=1;
        $obj = Patient::find(3);
        $relatedFile = $obj->getFile;
        $relatedLabs = $obj->getLabs;
        $relatedServices = $obj->getServices;


        $file = File::find(3);
        $relatedPatient = $file->getPatient;

        $lab = Lab::find(1);
        $relatedPatient = $lab->getPatient;


        $service = Service::find(2);
        $relatedPatients =$service->getPatients;
        return $relatedPatients;
    }
}
