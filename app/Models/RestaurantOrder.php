<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RestaurantOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer',
        'table_id',
        'plate',
        'status',
        'paid_by',
        'description',
        'reference',
       ];

       public function getFillables(): Array
       {
           return $this->fillable;
       }  

       public function table(): BelongsTo
       {
        return $this->belongsTo('App\Models\RestaurantTable', 'table_id', 'id');
       }
       public function orderDetail(): hasMany
       {
        return $this->hasMany('App\Models\RestaurantOrderDetail', 'order_id', 'id');
       }
}
