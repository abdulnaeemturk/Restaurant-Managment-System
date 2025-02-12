<?php namespace App\Repositories\Shared;

use Illuminate\Database\Eloquent\Model;
use App\Models\Attachable;
use App\Repositories\BaseRepository;
use App\RepositoryInterfaces\Shared\AttachableStructureRepositoryInterface;
use Illuminate\Support\Collection;

class AttachableStructureRepository extends BaseRepository implements AttachableStructureRepositoryInterface
{
    public function __construct(Attachable $model)
    {
        parent::__construct($model);
    }
}