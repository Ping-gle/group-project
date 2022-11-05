<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    use HasFactory;

    protected $fillable = ['code','name','address','phone','fblink','description'];
    public $timestamps=false;

    function product() {
        return $this->belongsTo(Products::class);
        }
}

