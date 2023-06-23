<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Residents;
use App\Models\Vaccine;
use Illuminate\Support\Facades\Auth;

class SendEmailController extends Controller
{
    //запрос для фильтрации по возрасту
    public function showResidents(Request $request)
    {
            $selectedAge = $request->input('age');
            $currentUser = auth()->user();
            $query = Residents::where('user_id', $currentUser->id);

            $residents = $query
                ->whereYear('date', '=', Carbon::now()->subMonths($selectedAge)->year)
                ->get();

            return view('doctor.allPlainVaccine', ['residents' => $residents]);
    }

 //Метод для вывода представления для ввода данных
 public function addview()
 {
            return view('doctor.addPlainVaccine'); //возвращает представления
 }
 //Метод для записи данных
 public function create()
  {
            $user = Auth::user();
            $user_id = $user->id;
            return view('doctor.addPlainVaccine', compact('user_id'));
  }
  //Метод для отправки данных на базу
  public function upload(Request $request)
  {
            $vaccine = new Vaccine;
            $vaccine->user_id = $request->user_id;
            $vaccine->datevaccine = $request->datevaccine;
            $vaccine->name = $request->name;
            $vaccine->age = $request->age;
            $vaccine->save();
            return redirect()->back()->with('message','Запись успешно добавлен');
  }

//Метод для получения и вывода списка всех жителей
      public function allPlains( Request $request)
      {
          $currentUser = auth()->user();
          $query = Vaccine::where('user_id', $currentUser->id)->orderBy('datevaccine', 'asc');
          $name = $request->input('name');
          $plain = $query->where('name', 'like', '%' . $name . '%')->get();

          $currentMonth = now()->format('m');
        //   $currentMonth = Carbon::now()->addMonth()->format('m');
        $vaccines = Vaccine::whereMonth('datevaccine', $currentMonth)->get();

        $vaccineData = [];

        foreach ($vaccines as $vaccine) {
            $users = Residents::whereRaw("TIMESTAMPDIFF(YEAR, date, CURDATE()) = ?", [$vaccine->age])->get();

            foreach ($users as $user) {
                $vaccineData[] = [$user->surname,$user->name,$user->patronymic,$user->date, $vaccine->name,$vaccine->age,$vaccine->datevaccine];
            }
        }
          return view('doctor.allPlainVaccine', ['plain' => $plain,'vaccineData' => $vaccineData]);

      }
//Метод для удаления записи
      public function deletePlain($id)
      {
          $data=Vaccine::find($id);
          $data->delete();
          return redirect()->back();
      }
//Метод для получения и отображения данных с базы по id выбранной записи
  public function updatePlain($id)
  {
      $data = vaccine::find($id);
      return view('doctor.updatePlain',compact('data'));
  }

//Метод для отправки в базу обновленных данных
  public function update(Request $request, $id)
  {
      // Валидация данных из формы
      $plain = Vaccine::findOrFail($id);
      $plain->datevaccine = $request->datevaccine;
      $plain->name = $request->name;
      $plain->age = $request->age;
      $plain->save();
      return redirect()->back()->with('success', 'Данные успешно обновлены.');
  }

}



