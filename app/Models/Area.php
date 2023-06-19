<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = ['region_id','area'];

    public function region(){
        return $this->belongsTo(Region::class);
    }
    public function fap(){
        return $this->hasMany(Fap::class);
    }

}
