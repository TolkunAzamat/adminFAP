<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use App\Models\Residents;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    public function list()
    {
        $currentUser = auth()->user();
        $query = Residents::where('user_id', $currentUser->id)->get();

        $currentMonth = now()->format('m');
        $vaccines = Vaccine::whereMonth('datevaccine', $currentMonth)->get();

        $vaccineData = [];

        foreach ($vaccines as $vaccine) {
            $users = $query->whereRaw("TIMESTAMPDIFF(YEAR, date, CURDATE()) = ?", [$vaccine->age])->get();

            foreach ($users as $user) {
                $vaccineData[] = [$user->surname,$user->name,$user->patronymic,$user->date, $vaccine->name,$vaccine->age];
            }
        }

        return view('doctor.allPlainVaccine', ['vaccineData' => $vaccineData]);
    }
}


