<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\RestaurantTable;
use App\Repositories\BaseRepository;
use App\RepositoryInterfaces\RestaurantTableRepositoryInterface;
use Illuminate\Support\Collection;

class RestaurantTableRepository extends BaseRepository implements RestaurantTableRepositoryInterface
{
    public function __construct(RestaurantTable $model)
    {
        parent::__construct($model);
    }
}