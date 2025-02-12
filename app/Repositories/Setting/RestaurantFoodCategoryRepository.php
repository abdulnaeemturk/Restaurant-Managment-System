<?php namespace App\Repositories\Setting;

use Illuminate\Database\Eloquent\Model;
use App\Models\RestaurantFoodCategory;
use App\Repositories\BaseRepository;
use App\RepositoryInterfaces\Setting\RestaurantFoodCategoryRepositoryInterface;
use Illuminate\Support\Collection;

class RestaurantFoodCategoryRepository extends BaseRepository implements RestaurantFoodCategoryRepositoryInterface
{
    public function __construct(RestaurantFoodCategory $model)
    {
        parent::__construct($model);
    }
}