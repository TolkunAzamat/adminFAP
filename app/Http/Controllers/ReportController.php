<?php

namespace App\Http\Controllers;

use App\Models\PergnantWomen;
use App\Models\InfectionPatients;
use App\Models\ChronicOutpatients;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function addview()
    {
     return view('doctor.reports');
    }

    public function report()
{
 // Получение данных из разных таблиц
 $births = PergnantWomen::whereYear('whenGaveBirth', date('Y'))->count();
 $chronicPatients = ChronicOutpatients::select('diagnosis', DB::raw('COUNT(*) as count'))
 ->groupBy('diagnosis')
 ->get();

// Подготовка данных для отображения


foreach ($chronicPatients as $patient) {
 $reportData[] = [$patient->diagnosis, $patient->count];
}

$infectionPatients = InfectionPatients::select('diagnos', DB::raw('COUNT(*) as count'))
 ->groupBy('diagnos')
 ->get();

// Подготовка данных для отображения


foreach ($infectionPatients as $patient) {
 $data[] = [$patient->diagnos, $patient->count];
}

 // Возврат представления с передачей данных
 return view('doctor.reports', compact('reportData','data'));
}
}
