<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\RestaurantFoodDetail;
use App\Repositories\BaseRepository;
use App\RepositoryInterfaces\RestaurantFoodDetailRepositoryInterface;
use Illuminate\Support\Collection;

class RestaurantFoodDetailRepository extends BaseRepository implements RestaurantFoodDetailRepositoryInterface
{
    public function __construct(RestaurantFoodDetail $model)
    {
        parent::__construct($model);
    }
}