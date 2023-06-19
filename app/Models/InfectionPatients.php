<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfectionPatients extends Model
{
    use HasFactory;
    protected $fillable=['user_id','fullname','dateOfRegistration','diagnos'];

    public function resident()
    {
        return $this->belongsTo(Residents::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
