<?php

namespace App\Http\Controllers;
//подключение всех классов (моделей)
use App\Models\Gender;
use App\Models\Residents;
use App\Models\SocialStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AllResidentsController extends Controller
{
    //Метод для вывода представления для ввода данных
   public function addview()
   {
    return view('doctor.addResidents'); //возвращает представления
   }
   //Метод для записи данных
   public function create()
    {
        $gender = Gender::pluck('gender', 'id');
        $status=SocialStatus::pluck('statusName','id');
        $user = Auth::user();
        $user_id = $user->id;
        return view('doctor.addResidents', compact('gender','status','user_id'));
    }
    //Метод для отправки данных на базу
    public function upload(Request $request)
    {
        $residents = new residents;
        $residents->user_id = $request->user_id;
        $residents->surname = $request->surname;
        $residents->name = $request->name;
        $residents->email = $request->email;
        $residents->patronymic = $request->patronymic;
        $residents->gender = $request->gender;
        $residents->address = $request->address;
        $residents->phone = $request->phone;
        $residents->status = $request->status;
        $residents->document = $request->document;
        $residents->date = $request->date;
        $residents->save();
        return redirect()->back()->with('message','Запись успешно добавлен');
    }

//Метод для получения и вывода списка всех жителей
        public function allResidents( Request $request)
        {
            // $currentUser = auth()->user();
            // $query = Residents::where('user_id', $currentUser->id)->orderBy('surname', 'asc');
            $user = Auth::user();
            $relatedUsers = Residents::where('user_id', $user->id)->get();
            // $surname = $request->input('surname');
            // $residents = $query->where('surname', 'like', '%' . $surname . '%')->get();
            // $twoMonthsAgo = now()->subMonths(2);
            // $threeMonthsAgo = now()->subMonths(3);
            // $fiveYearsAgo = now()->subYears(5);

            // $residents = $query
            //     ->where('date', '>=', $twoMonthsAgo)
            //     ->orWhere('date', '>=', $threeMonthsAgo)
            //     ->orWhere('date', '>=', $fiveYearsAgo)
            //     ->get();
           // $residents =  Residents::whereRaw("TIMESTAMPDIFF(MONTH, date, CURDATE()) IN (2, 3)")->get();
            return view('doctor.allresidents', ['relatedUsers'=>$relatedUsers]);

        }
//Метод для удаления записи
        public function deleteResident($id)
        {
            $data=Residents::find($id);
            $data->delete();
            return redirect()->back();
        }
//Метод для получения и отображения данных с базы по id выбранной записи
    public function updateResident($id)
    {
        $data = residents::find($id);
        $gender = gender::all();
        $status = SocialStatus::all();
    return view('doctor.updateResident',compact('data','gender','status'));
    }

//Метод для отправки в базу обновленных данных
    public function update(Request $request, $id)
    {
        // Валидация данных из формы
        $resident = Residents::findOrFail($id);
        $resident->surname = $request->surname;
        $resident->name = $request->name;
        $resident->patronymic = $request->patronymic;
        $resident->email = $request->email;
        $resident->gender = $request->gender;
        $resident->status = $request->status;
        $resident->address = $request->address;
        $resident->phone = $request->phone;
        $resident->document = $request->document;
        $resident->date = $request->date;
        $resident->save();
        return redirect()->back()->with('success', 'Данные успешно обновлены.');
    }
}
