<?php namespace App\Repositories\Setting;

use Illuminate\Database\Eloquent\Model;
use App\Models\RestaurantLinkTableUser;
use App\Repositories\BaseRepository;
use App\RepositoryInterfaces\Setting\RestaurantLinkTableUserRepositoryInterface;
use Illuminate\Support\Collection;

class RestaurantLinkTableUserRepository extends BaseRepository implements RestaurantLinkTableUserRepositoryInterface
{
    public function __construct(RestaurantLinkTableUser $model)
    {
        parent::__construct($model);
    }
}