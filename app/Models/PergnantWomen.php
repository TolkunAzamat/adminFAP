<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PergnantWomen extends Model
{
    use HasFactory;
    protected $fillable=['user_id','fullname','dateOfRegistration','placeOfWork','week','wichKind','dateVisiting','whenGaveBirth'];

    public function resident()
    {
        return $this->belongsTo(Residents::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cardContent(){
        return $this->hasMany(OutpatientCard::class);
    }
}
