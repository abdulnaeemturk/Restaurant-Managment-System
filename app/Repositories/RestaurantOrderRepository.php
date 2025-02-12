<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\RestaurantOrder;
use App\Repositories\BaseRepository;
use App\RepositoryInterfaces\RestaurantOrderRepositoryInterface;
use Illuminate\Support\Collection;

class RestaurantOrderRepository extends BaseRepository implements RestaurantOrderRepositoryInterface
{
    public function __construct(RestaurantOrder $model)
    {
        parent::__construct($model);
    }
}