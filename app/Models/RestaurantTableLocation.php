<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantTableLocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
         ];

       public function getFillables(): Array
       {
           return $this->fillable;
       }  
}
