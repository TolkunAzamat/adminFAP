<?php

namespace App\Http\Controllers;
use App\Models\Gender;
use App\Models\InfectionPatients;
use App\Models\SocialStatus;
use Illuminate\Http\Request;
use App\Models\Residents;
use Illuminate\Support\Facades\Auth;

class InfectionController extends Controller
{
    //Метод для вывода представления для ввода данных
public function addview()
   {
    return view('doctor.addInfection');
   }
   //Метод для записи данных
   public function create()
    {
        $currentUser = Auth::user();
        $userId = $currentUser->id;
        $residents = Residents::where('user_id', $userId) ->orderBy('surname', 'asc')->get();
        $user = Auth::user();
        $user_id = $user->id;
        return view('doctor.addInfection', compact('user_id','residents'));
    }
    //Метод для отправки данных на базу
    public function upload(Request $request)
    {
        $residents = new InfectionPatients;
        $residents->user_id = $request->user_id;
        $residents->fullname = $request->fullname;
        $residents->dateOfRegistration = $request->dateOfRegistration;
        $residents->diagnos = $request->diagnos;

        $residents->save();
        return redirect()->back()->with('message','Запись успешно добавлен');
    }
//Метод для получения и вывода списка всех больных

        public function allInfection( Request $request)
        {
    $currentUser = auth()->user();
    $query = InfectionPatients::where('user_id', $currentUser->id)->orderBy('fullname', 'asc')->get();

    return view('doctor.allInfections', ['residents' => $query]);
        }


        public function deleteInfection($id)
        {
            $data=InfectionPatients::find($id);
            $data->delete();
            return redirect()->back();
        }

    public function updateInfection($id)
    {
        $data = InfectionPatients::find($id);
    return view('doctor.updateInfection',compact('data'));
    }


    public function update(Request $request, $id)
    {
        // Валидация данных из формы
        $resident = InfectionPatients::findOrFail($id);
        $resident->fullname = $request->fullname;
        $resident->dateOfRegistration = $request->dateOfRegistration;
        $resident->diagnos = $request->diagnos;
        $resident->save();


        return redirect()->back()->with('success', 'Данные успешно обновлены.');
    }

}
