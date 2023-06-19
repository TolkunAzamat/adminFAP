<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
protected $fillable = ['region'];


    public function area(){
        return $this->hasMany(Area::class);
    }
    public function fap()
    {
        return $this->hasMany(Fap::class);
    }
}
