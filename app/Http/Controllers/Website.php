<?php

namespace App\Http\Controllers;

use App\Models\PergnantWomen;
use App\Models\Residents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Website extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;

        $chronicOutpatients = DB::table('chronic_outpatients')
            ->select('diagnosis', DB::raw('count(*) as count'))
            ->where('user_id', $userId)
            ->groupBy('diagnosis')
            ->get();
            $birthsByYear = Residents::select(DB::raw('YEAR(date) as year'), DB::raw('COUNT(*) as count'))
            ->groupBy('year')
            ->get();

            $births = PergnantWomen::select(DB::raw('YEAR(whenGaveBirth) as year'), DB::raw('COUNT(*) as count'))
            ->groupBy('year')
            ->get();

        $chartData = [];
        foreach ($births as $birth) {
            $chartData[] = [$birth->year, $birth->count];
        }

            $pergnants = PergnantWomen::select( DB::raw('COUNT(*) as count'))
            ->whereYear('whenGaveBirth', date('Y'))
            ->groupBy(DB::raw('Month(whenGaveBirth)'))
            ->pluck('count');

        // $chartHieData = [];
        // foreach ($pergnants as $pergnant) {
        //     $chartHieData[] = [
        //         'name' => strval($pergnant->year),
        //         'y' => $pergnant->count,
        //     ];
        // }

        // $hie['chartHieData'] = $chartHieData;


        $chartData = "";
        foreach ($chronicOutpatients as $list) {
            $chartData .= "['" . $list->diagnosis . "', " . $list->count . "],";
        }
        $arr['chartData'] = rtrim($chartData, ",");

        $chartData2 = "";
        foreach ($birthsByYear as $list) {
            $chartData2 .= "['" . strval($list->year) . "', " . $list->count . "],";
        }
        $arr2['chartData2'] = rtrim($chartData2, ",");

        return view('doctor.charts', $arr,$arr2,compact('pergnants'));
    }

}
