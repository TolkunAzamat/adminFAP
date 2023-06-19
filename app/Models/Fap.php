<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fap extends Model
{
    use HasFactory;
    protected $fillable = ['region_id','area_id','village','number'];

    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function region(){
        return $this->belongsTo(Region::class);
    }
    public function employees(){
        return $this->hasMany(Employee::class);
    }
    public function users()
    {
       return $this->hasMany(User::class);
    }
}
