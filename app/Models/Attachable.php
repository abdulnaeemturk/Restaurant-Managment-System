<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\morphedByMany;

class Attachable extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'attachable_id',
        'attachable_type',
        'name',
        'datatype',       
       ];

       public function products()
       {
           return $this->morphedByMany('App\Models\Products', 'attachable');
       }

}
