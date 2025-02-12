<?php namespace App\Repositories\Setting;

use Illuminate\Database\Eloquent\Model;
use App\Models\RestaurantTableLocation;
use App\Repositories\BaseRepository;
use App\RepositoryInterfaces\Setting\RestaurantTableLocationRepositoryInterface;
use Illuminate\Support\Collection;

class RestaurantTableLocationRepository extends BaseRepository implements RestaurantTableLocationRepositoryInterface
{
    public function __construct(RestaurantTableLocation $model)
    {
        parent::__construct($model);
    }
}