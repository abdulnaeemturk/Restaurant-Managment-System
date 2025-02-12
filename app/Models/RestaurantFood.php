<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RestaurantFood extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'category_id',
       ];

        

       public function getFillables(): Array
       {
           return $this->fillable;
       }  

       public function foodDetail(): hasMany
       {
        return $this->hasMany('App\Models\RestaurantFoodDetail', 'food_id', 'id');
       }
       public function category(): BelongsTo
       {
        return $this->belongsTo('App\Models\RestaurantFoodCategory', 'category_id', 'id');
       }

    /**
     * Get the Food's image.
     */
    public function attachable()
    {
      return $this->morphToMany('App\Models\Attachable', 'attachable');
    }

    public function attachment()
    {
      return $this->morphMany('App\Models\Attachable', 'attachable');
    }
}
