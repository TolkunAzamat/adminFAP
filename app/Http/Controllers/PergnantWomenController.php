<?php

namespace App\Http\Controllers;

use App\Models\Residents;
use Illuminate\Http\Request;
use App\Models\PergnantWomen;
use Illuminate\Support\Facades\Auth;

class PergnantWomenController extends Controller
{
    //Метод для вывода представления для ввода данных
public function addview()
   {
    return view('doctor.pergnantWomen.addPergnants');
   }
   //Метод для записи данных
   public function create()
    {
        $currentUser = Auth::user();
        $userId = $currentUser->id;
        $residents = Residents::where('user_id', $userId) ->orderBy('surname', 'asc')->get();
        $user = Auth::user();
        $user_id = $user->id;
        return view('doctor.pergnantWomen.addPergnants', compact('user_id','residents'));
    }
    //Метод для отправки данных на базу
    public function upload(Request $request)
    {
        $residents = new PergnantWomen();
        $residents->user_id = $request->user_id;
        $residents->fullname = $request->fullname;
        $residents->dateOfRegistration = $request->dateOfRegistration;
        $residents->placeOfWork = $request->placeOfWork;
        $residents->week = $request->week;
        $residents->wichKind = $request->wichKind;
        $residents->dateVisiting = $request->dateVisiting;
        $residents->whenGaveBirth = $request->whenGaveBirth;

        $residents->save();
        return redirect()->back()->with('message','Запись успешно добавлен');
    }
//Метод для получения и вывода списка всех больных

        public function allPergnantWomens( Request $request)
        {
    $user = Auth::user();
    $relatedUsers = PergnantWomen::where('user_id', $user->id)->orderBy('fullname', 'asc')->get();
    return view('doctor.pergnantWomen.allPergnants', ['relatedUsers' => $relatedUsers]);
        }


        public function deletePergnant($id)
        {
            $data=PergnantWomen::find($id);
            $data->delete();
            return redirect()->back();
        }

    public function updatePergnant($id)
    {
        $data = PergnantWomen::find($id);
    return view('doctor.pergnantWomen.updatePergnants',compact('data'));
    }


    public function update(Request $request, $id)
    {
        // Валидация данных из формы
        $resident = PergnantWomen::findOrFail($id);
        $resident->fullname = $request->fullname;
        $resident->dateOfRegistration = $request->dateOfRegistration;
        $resident->placeOfWork = $request->placeOfWork;
        $resident->week = $request->week;
        $resident->wichKind = $request->wichKind;
        $resident->dateVisiting = $request->dateVisiting;
        $resident->whenGaveBirth = $request->whenGaveBirth;
        $resident->save();


        return redirect()->back()->with('success', 'Данные успешно обновлены.');
    }

}


