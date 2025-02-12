<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\RestaurantFood;
use App\Repositories\BaseRepository;
use App\RepositoryInterfaces\RestaurantFoodRepositoryInterface;
use Illuminate\Support\Collection;

class RestaurantFoodRepository extends BaseRepository implements RestaurantFoodRepositoryInterface
{
    public function __construct(RestaurantFood $model)
    {
        parent::__construct($model);
    }
}