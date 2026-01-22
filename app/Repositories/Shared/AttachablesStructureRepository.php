<?php namespace App\Repositories\Shared;

use Illuminate\Database\Eloquent\Model;
use App\Models\Attachable;
use App\Repositories\BaseRepository;
use App\RepositoryInterfaces\Shared\AttachablesStructureRepositoryInterface;
use Illuminate\Support\Collection;

class AttachablesStructureRepository extends BaseRepository implements AttachablesStructureRepositoryInterface
{
    public function __construct(Attachable $model)
    {
        parent::__construct($model);
    }
}