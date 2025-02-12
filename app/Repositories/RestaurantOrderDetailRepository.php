<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\RestaurantOrderDetail;
use App\Repositories\BaseRepository;
use App\RepositoryInterfaces\RestaurantOrderDetailRepositoryInterface;
use Illuminate\Support\Collection;

class RestaurantOrderDetailRepository extends BaseRepository implements RestaurantOrderDetailRepositoryInterface
{
    public function __construct(RestaurantOrderDetail $model)
    {
        parent::__construct($model);
    }
}