<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TemporaryOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'food_id',
        'piece',
        'user_id',
        'status',
         ];

       public function getFillables(): Array
       {
           return $this->fillable;
       }  

       public function food(): BelongsTo
       {
        return $this->belongsTo('App\Models\RestaurantFood', 'food_id', 'id');
       }
}
