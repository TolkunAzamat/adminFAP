<?php
namespace App\Http\Controllers;

use App\Models\ContentCard;
use App\Models\OutpatientCard;
use App\Models\Residents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller{
//Метод для вывода представления для ввода данных
public function addview()
   {
    return view('doctor.allOutpatientscard');
   }
 //Метод для записи данных
   public function create()
    {
        $currentUser = Auth::user();
        $userId = $currentUser->id;
        $residents = Residents::where('user_id', $userId) ->orderBy('surname', 'asc')->get();
        $user = Auth::user();
        $user_id = $user->id;
        return view('doctor.addOutpatientsCard', compact('user_id','residents'));
    }
 //Метод для отправки данных на базу
    public function upload(Request $request)
    {
        $outpatientsCard = new OutpatientCard;
        $outpatientsCard->user_id = $request->user_id;
        $outpatientsCard->fullname= $request->fullname;
        $outpatientsCard->dateOfRegistration = $request->dateOfRegistration;
        $outpatientsCard->reasonForRegistration = $request->reasonForRegistration;
        $outpatientsCard->dateOfDeregistration = $request->dateOfDeregistration;
        $outpatientsCard->reasonForDeregistration = $request->reasonForDeregistration;
        $outpatientsCard->numberMC = $request->numberMC;
        $outpatientsCard->save();
        return redirect()->back()->with('message','Запись успешно добавлен');
    }
//Метод для получения и вывода списка всех медкарт
    public function allOutpatientscard( Request $request)
    {
        $user = Auth::user();
        $relatedUsers = OutpatientCard::where('user_id', $user->id)->get();
        return view('doctor.allOutpatientscard', ['relatedUsers' => $relatedUsers]);

    }
    //Метод для перехода на страницу добавления содержания медкарт
    public function fillMedicalCard($id)
    {
        $data = OutpatientCard::find($id);
    return view('doctor.fillMedicalCard',compact('data'));
    }
    //Метод для удаления записи
        public function deleteMedicalCard($id)
        {
            $data=OutpatientCard::find($id);
            $data->delete();
            return redirect()->back();
        }
//Метод для отправки в базу обновленных данных
        public function update(Request $request, $id)
        {
            $card = OutpatientCard::findOrFail($id);
            $card->dateOfRegistration = $request->dateOfRegistration;
            $card->reasonForRegistration = $request->reasonForRegistration;
            $card->dateOfDeregistration = $request->dateOfDeregistration;
            $card->reasonForDeregistration = $request->reasonForDeregistration;
            $card->numberMC = $request->numberMC;
            $card->save();
             return redirect()->back()->with('success', 'Данные успешно обновлены.');
        }
        // public function addContent($id)
        // {
        //     // Получите медкарту по идентификатору $id из базы данных или другого источника данных
        //     $medcard = OutpatientCard::find($id);
        //     if (!$medcard) {
        //         abort(404);
        //     }
        //     $contents = ContentCard::where('id', $medcard->id)->get();
        //     return view('doctor.addContent', ['medcard' => $medcard,'contents' => $contents]);
        // }
        public function showContent($card_id)
        {
            $card = OutpatientCard::find($card_id);
            $contentList = ContentCard::where('card_id', $card_id)->get();
            return view('doctor.addContent', compact('card', 'contentList'));
        }


        public function storeContent(Request $request, $id)
        {
            // Получение медкарты по ID
            $medcard = OutpatientCard::find($id);

            // Создание нового объекта содержания
            $content = new ContentCard();
            $content->card_id = $medcard->id;
            $content->user_id= $request->input('user_id');
            $content->fullname= $request->input('fullname');
            $content->dateOfRegistration= $request->input('dateOfRegistration');
            $content->reasonForRegistration= $request->input('reasonForRegistration');
            $content->dateOfDeregistration= $request->input('dateOfDeregistration');
            $content->reasonForDeregistration= $request->input('reasonForDeregistration');
            $content->numberMC= $request->input('numberMC');

            $content->save();

            // Перенаправление пользователя на страницу добавления содержания
            return redirect()->route('doctor.addContent', $medcard->id);
        }

    }
