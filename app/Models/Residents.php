<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residents extends Model
{
    use HasFactory;

    protected $fillable=['user_id','surname','name','patronymic','email','gender','address','phone','status','document','date'];

    public function outpatient_cards(){
        return $this->hasOne(OutpatientCard::class);
    }

    public function user(){
        return $this->belongsTo(Residents::class);
    }
    public function infection()
    {
        return $this->hasMany(InfectionPatients::class);
    }
}

