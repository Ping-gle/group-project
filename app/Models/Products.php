<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['code','en_name','th_name','regions_id','description'];
    public $timestamps=false;
    
    function regions() {
        return $this->belongsTo(Regions::class);
        }

        function shops() {
            return $this->hasOne(shops::class);
            }
    
}
