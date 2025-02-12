<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Repositories\BaseRepository;
use App\RepositoryInterfaces\UserRepositoryInterface;
use Illuminate\Support\Collection;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}