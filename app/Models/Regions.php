<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
    use HasFactory;
    protected $fillable = ['code','name','description'];
    public $timestamps=false;

    function products(){
        return $this->hasMany(Products::class);
    }
}
