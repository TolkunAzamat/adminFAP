<?php
namespace App\Http\Controllers;

use App\Models\ContentCard;
use Illuminate\Http\Request;
use App\Models\MedcardContent;
use App\Models\OutpatientCard;

class CardContentController extends Controller
{
    public function show($id)
    {
        // Получение медкарты по ID
        $medcard = OutpatientCard::findOrFail($id);

        // Получение содержания медкарты
        $content = ContentCard::where('card_id', $medcard->id)->get();

        return view('doctor.addContent', compact('medcard', 'content'));
    }

    public function create($id)
    {
        // Get the selected medical card
        $medcard = ContentCard::findOrFail($id);

        // Get the associated content list
        $contentList = $medcard->content;

        return view('addContent', compact('content'));
    }
    public function store(Request $request, $id)
    {
        // Получение медкарты по ID
        $medcard = OutpatientCard::find($id);

        // Создание нового объекта содержания
        $content = new ContentCard();
        $content->card_id = $medcard->id;
        $content->dateOftheApplication = $request->input('dateOftheApplication');
        $content->finalDiagnosis = $request->input('finalDiagnosis');
        $content->firstTimeDiagnosis = $request->input('firstTimeDiagnosis');
        $content->doctor = $request->input('doctor');
        $content->patient_complaints = $request->input('patient_complaints');
        $content->appointmet = $request->input('appointmet');
        $content->save();
$content = ContentCard::find($id);
        return redirect()->route('addContent', $medcard->id);
    }
}
