<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantFoodDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'food_id',
        'name',
        'description',
       ];

    public function getFillables(): Array
    {
        return $this->fillable;
    }  
}
