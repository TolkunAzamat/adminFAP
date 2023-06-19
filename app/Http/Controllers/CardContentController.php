<?php

namespace App\Http\Controllers;

use App\Models\ContentCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardContentController extends Controller
{
      //Метод для вывода представления для ввода данных
   public function addview()
   {
    return view('doctor.addContent'); //возвращает представления
   }
   //Метод для записи данных
//    public function create()
//     {
//         $user = Auth::user();
//         $user_id = $user->id;
//         return view('doctor.addContent', compact('user_id'));
//     }
//     //Метод для отправки данных на базу
//     public function upload(Request $request)
//     {
//         $card = new ContentCard();
//         $card->card_id = $request->card_id;
//         $card->dateOftheApplication = $request->dateOftheApplication;
//         $card->finalDiagnosis = $request->finalDiagnosis;
//         $card->firstTimeDiagnosis = $request->firstTimeDiagnosis;
//         $card->doctor = $request->doctor;
//         $card->patient_complaints = $request->patient_complaints;
//         $card->appointmet = $request->appointmet;
//         $card->save();
//         return redirect()->back()->with('message','Запись успешно добавлен');
//     }

// //Метод для получения и вывода списка всех жителей
//         public function allContent( Request $request)
//         {  $user = Auth::user();
//             $relatedUsers = ContentCard::all();
//             //where('user_id', $user->id)->get();
//            return view('doctor.addContent', ['relatedUsers'=>$relatedUsers]);

//         }


public function store(Request $request, $cardId)
{
    // Валидация входных данных
    $request->validate([
        'content' => 'required',
        // Другие правила валидации по необходимости
    ]);

    // Создание новой записи
    $card = new ContentCard();
            $card->card_id = $request->card_id;
            $card->dateOftheApplication = $request->dateOftheApplication;
            $card->finalDiagnosis = $request->finalDiagnosis;
            $card->firstTimeDiagnosis = $request->firstTimeDiagnosis;
            $card->doctor = $request->doctor;
            $card->patient_complaints = $request->patient_complaints;
            $card->appointmet = $request->appointmet;
            $card->save();
            return redirect()->back()->with('message','Запись успешно добавлен');


    // Перенаправление на страницу с записями
    return redirect()->route('doctor.addContent', ['cardId' => $cardId]);
}

public function index($cardId)
{
    // Получение записей с заданным card_id
    $contents = ContentCard::where('card_id', $cardId)->get();

    // Возвращение представления с данными
    return view('doctor.addContent', compact('contents', 'cardId'));
}

//Метод для удаления записи
        public function deleteResident($id)
        {
            $data=ContentCard::find($id);
            $data->delete();
            return redirect()->back();
        }
//Метод для получения и отображения данных с базы по id выбранной записи
    public function updateResident($id)
    {
        $data = ContentCard::find($id);
    return view('doctor.updateContent',compact('data'));
    }

//Метод для отправки в базу обновленных данных
    public function update(Request $request, $id)
    {
        // Валидация данных из формы
        $card = ContentCard::findOrFail($id);
        $card->dateOftheApplication = $request->dateOftheApplication;
        $card->finalDiagnosis = $request->finalDiagnosis;
        $card->firstTimeDiagnosis = $request->firstTimeDiagnosis;
        $card->doctor = $request->doctor;
        $card->patient_complaints = $request->patient_complaints;
        $card->appointmet = $request->appointmet;
        $card->save();
        return redirect()->back()->with('success', 'Данные успешно обновлены.');
    }
}
