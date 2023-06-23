<?php

use App\Exports\ReportExport;
use App\Http\Controllers\Website;
use App\Models\ChronicOutpatients;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InfectionController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\ChronicOutController;
use App\Http\Controllers\CardContentController;
use App\Http\Controllers\OutpatientsController;
use App\Http\Controllers\AllResidentsController;
use App\Http\Controllers\PergnantWomenController;
use App\Http\Controllers\VaccineController;
use App\Models\InfectionPatients;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('doctor.home');
})->middleware(['auth', 'verified'])->name('doctor.home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//страница для создания нового резидента
Route::get('/add_residents_view', [AllResidentsController::class,'create']);
//загрузка данных в базу
Route::post('/upload_residents', [AllResidentsController::class,'upload']);
//маршрут для просмотра списка всех жителей
Route::get('/allresidents',[AllResidentsController::class,'allResidents']);
//маршрут для удаления записи
Route::get('/deleteResident/{id}',[AllResidentsController::class,'deleteResident']);
// вывод страницы редактирования метод GET
Route::get('/updateResident/{id}',[AllResidentsController::class,'updateResident']);

//Отправка в бд измененных данных
Route::post('/editResident/{id}', [AllResidentsController::class, 'update'])->name('doctor.editResidents');


Route::get('/addOutpatientscard', [CardController::class,'create'])->name('addOutpatientsCard');
Route::get('/allOutpatientscard',[CardController::class,'allOutpatientscard']);
Route::post('/upload_card', [CardController::class,'upload']);

// вывод страницы редактирования метод GET
Route::get('/fillMedicalCard/{id}',[CardController::class,'fillMedicalCard']);

//Отправка в бд измененных данных
Route::post('/editMedicalCard/{id}', [CardController::class, 'update'])->name('doctor.editResidents');

Route::get('/deleteMedicalCard/{id}',[CardController::class,'deleteMedicalCard']);
require __DIR__.'/auth.php';

// Маршрут для добавления записи

Route::get('/add_infection_view', [InfectionController::class,'create'])->name('doctor.addInfection');
//загрузка данных в базу
Route::post('/upload_infection', [InfectionController::class,'upload']);
//маршрут для просмотра списка всех жителей
Route::get('/allInfection', [InfectionController::class, 'allInfection'])->name('doctor.allInfection');

//маршрут для удаления записи
Route::get('/deleteInfection/{id}',[InfectionController::class,'deleteInfection']);
// вывод страницы редактирования метод GET
Route::get('/updateInfection/{id}',[InfectionController::class,'updateInfection']);

//Отправка в бд измененных данных
Route::post('/editInfection/{id}', [InfectionController::class, 'update'])->name('doctor.editResidents');

Route::get('/sendEmail',[SendEmailController::class,'showResidents'])->name('doctor.sendEmail');

//страница для создания нового резидента
Route::get('/add_plain_view', [SendEmailController::class,'create']);
//загрузка данных в базу
Route::post('/upload_plains', [SendEmailController::class,'upload']);
//маршрут для просмотра списка всех жителей
Route::get('/allPlainVaccine',[SendEmailController::class,'allPlains']);
// Route::get('/allPlianVaccine', [SendEmailController::class, 'allPlains'])->name('allPlianVaccine');
//маршрут для удаления записи
Route::get('/deletePlain/{id}',[SendEmailController::class,'deletePlain']);
// вывод страницы редактирования метод GET
Route::get('/updatePlain/{id}',[SendEmailController::class,'updatePlain']);
//Отправка в бд измененных данных
Route::post('/editPlain/{id}', [SendEmailController::class, 'update'])->name('doctor.editResidents');

Route::get('/add_chronic_view', [ChronicOutController::class,'create'])->name('doctor.addChronicPatients');
//загрузка данных в базу
Route::post('/upload_chronic', [ChronicOutController::class,'upload']);
//маршрут для просмотра списка всех жителей
Route::get('/allChronic', [ChronicOutController::class, 'allChronicOutPatients'])->name('doctor.allChronicPatients');

//маршрут для удаления записи
Route::get('/deleteChronic/{id}',[ChronicOutController::class,'deleteChronicOutPatients']);
// вывод страницы редактирования метод GET
Route::get('/updateChronic/{id}',[ChronicOutController::class,'updateChronic']);

//Отправка в бд измененных данных
Route::post('/editChronic/{id}', [ChronicOutController::class, 'update'])->name('doctor.editResidents');

Route::get('/add_pergnant_view', [PergnantWomenController::class,'create'])->name('doctor.pergnantWomen.addPergnants');
//загрузка данных в базу
Route::post('/upload_pergnant', [PergnantWomenController::class,'upload']);
//маршрут для просмотра списка всех жителей
Route::get('/allpergnant', [PergnantWomenController::class, 'allPergnantWomens'])->name('doctor.pergnantWomen.allPergnants');

//маршрут для удаления записи
Route::get('/deletePergnant/{id}',[PergnantWomenController::class,'deletePergnant']);
// вывод страницы редактирования метод GET
Route::get('/updatePergnant/{id}',[PergnantWomenController::class,'updatePergnant']);

// Route::resource('residents',AdminController::class);
//Отправка в бд измененных данных
Route::post('/editPergnant/{id}', [PergnantWomenController::class, 'update'])->name('doctor.editResidents');


Route::post('allmedcards/{id}/store-content', [CardController::class, 'storeContent'])->name('allmedcards.storeContent');

Route::get('/reports', [ReportController::class,'report'])->name('doctor.reports');
Route::get('/charts',[Website::class,'index']);

Route::get('/export', function () {
    $chronicPatients = ChronicOutpatients::select('diagnosis', DB::raw('COUNT(*) as count'))
        ->groupBy('diagnosis')
        ->get();

    $reportData = [
        ['Диагноз', 'Количество пациентов'],
    ];

    foreach ($chronicPatients as $patient) {
        $reportData[] = [$patient->diagnosis, $patient->count];
    }

    return Excel::download(new ReportExport($reportData), 'report.xlsx');
})->middleware(['auth', 'verified'])->name('export.report');
Route::get('/export2', function () {
    $inPatients = InfectionPatients::select('diagnos', DB::raw('COUNT(*) as count'))
        ->groupBy('diagnos')
        ->get();

    $data = [
        ['Диагноз', 'Количество пациентов'],
    ];

    foreach ($inPatients as $patient) {
        $reportData[] = [$patient->diagnos, $patient->count];
    }

    return Excel::download(new ReportExport($reportData), 'report.xlsx');
})->middleware(['auth', 'verified'])->name('export.report2');
Route::get('/download-report', 'ReportController@downloadReport')->name('download-report');

Route::get('addContent/{id}', [CardContentController::class, 'show'])->name('addContent');
// Route::post('addContent/{id}/content', [CardContentController::class, 'storeContent'])->name('addContent.storeContent');
Route::post('addContent/{id}/content', [CardContentController::class, 'store','create'])
     ->name('addContent.store');
Route::post('allmedcards/{id}/content', [CardContentController::class, 'store','create'])->name('allmedcards.store');
