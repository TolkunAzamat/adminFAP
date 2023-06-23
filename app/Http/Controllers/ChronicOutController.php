<?php

namespace App\Http\Controllers;

use App\Models\ChronicOutpatients;
use App\Models\Gender;
use App\Models\InfectionPatients;
use App\Models\SocialStatus;
use Illuminate\Http\Request;
use App\Models\Residents;
use Illuminate\Support\Facades\Auth;

class ChronicOutController extends Controller
{
    //Метод для вывода представления для ввода данных
public function addview()
   {
    return view('doctor.addChronicPatients');
   }
   //Метод для записи данных
   public function create()
    {
        $currentUser = Auth::user();
        $userId = $currentUser->id;
        $residents = Residents::where('user_id', $userId) ->orderBy('surname', 'asc')->get();
        $user = Auth::user();
        $user_id = $user->id;
        return view('doctor.addChronicPatients', compact('user_id','residents'));
    }
    //Метод для отправки данных на базу
    public function upload(Request $request)
    {
        $residents = new ChronicOutpatients();
        $residents->user_id = $request->user_id;
        $residents->fullname = $request->fullname;
        $residents->dateOfRegistration = $request->dateOfRegistration;
        $residents->diagnosis = $request->diagnosis;

        $residents->save();
        return redirect()->back()->with('message','Запись успешно добавлен');
    }
//Метод для получения и вывода списка всех больных

        public function allChronicOutPatients( Request $request)
        {
    $user = Auth::user();
    $relatedUsers = ChronicOutpatients::where('user_id', $user->id)->orderBy('fullname', 'asc')->get();
    return view('doctor.allChronicPatients', ['relatedUsers' => $relatedUsers]);
        }


        public function deleteChronicOutPatients($id)
        {
            $data=ChronicOutpatients::find($id);
            $data->delete();
            return redirect()->back();
        }

    public function updateChronic($id)
    {
        $data = ChronicOutpatients::find($id);
    return view('doctor.updateChronicPatients',compact('data'));
    }


    public function update(Request $request, $id)
    {
        // Валидация данных из формы
        $resident = ChronicOutpatients::findOrFail($id);
        $resident->fullname = $request->fullname;
        $resident->dateOfRegistration = $request->dateOfRegistration;
        $resident->diagnosis = $request->diagnosis;
        $resident->save();


        return redirect()->back()->with('success', 'Данные успешно обновлены.');
    }

}
