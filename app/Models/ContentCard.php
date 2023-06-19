<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentCard extends Model
{
    use HasFactory;

    protected $fillable=[
        'dateOftheApplication',
        'card_id',
        'finalDiagnosis',
        'firstTimeDiagnosis',
        'doctor',
        'patient_complaints',
        'appointmet' ];

    public function outpatientCard(){
        return $this->belongsTo(OutpatientCard::class);
    }
}

