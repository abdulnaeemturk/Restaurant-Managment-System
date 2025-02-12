<?php namespace App\Repositories\Guest;

use Illuminate\Database\Eloquent\Model;
use App\Models\TemporaryOrder;
use App\Repositories\BaseRepository;
use App\RepositoryInterfaces\Guest\TemporaryOrderRepositoryInterface;
use Illuminate\Support\Collection;

class TemporaryOrderRepository extends BaseRepository implements TemporaryOrderRepositoryInterface
{
    public function __construct(TemporaryOrder $model)
    {
        parent::__construct($model);
    }
}