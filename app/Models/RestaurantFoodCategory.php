<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RestaurantFoodCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
       ];

    public function getFillables(): Array
    {
        return $this->fillable;
    }  
    public function foods(): hasMany
    {
     return $this->hasMany('App\Models\RestaurantFood', 'category_id', 'id');
    }
}
