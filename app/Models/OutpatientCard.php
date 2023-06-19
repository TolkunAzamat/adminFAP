<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OutpatientCard extends Model
{
    use HasFactory;

    protected $fillable=['user_id','fullname','numberMC','dateOfRegistration','reasonForRegistration','dateOfDeregistration','reasonForDeregistration'];

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
