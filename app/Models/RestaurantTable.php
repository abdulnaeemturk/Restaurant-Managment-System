<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RestaurantTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'location_id',
        'table_number',
        'person_allocate',
        'reservation',
       ];

       public function getFillables(): Array
       {
           return $this->fillable;
       }  
       public function location(): BelongsTo
       {
        return $this->belongsTo('App\Models\RestaurantTableLocation', 'location_id', 'id');
       }
}
