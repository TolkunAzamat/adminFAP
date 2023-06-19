<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['fap_id','surname','name','patronymic','document'];

    public function fap()
    {
        return $this->belongsTo(Fap::class);
    }
}
