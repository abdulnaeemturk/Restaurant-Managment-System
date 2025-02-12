<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RestaurantLinkTableUser extends Model
{
   use HasFactory;
    protected $fillable = [
        'user_id',
        'table_id',
        'pin',
       
    ];

   public function getFillables(): Array
   {
       return $this->fillable;
   }  

   public function table(): BelongsTo
   {
    return $this->belongsTo('App\Models\RestaurantTable', 'table_id', 'id');
   }
   public function user(): BelongsTo
   {
    return $this->belongsTo('App\Models\User', 'user_id', 'id');
   }
}
