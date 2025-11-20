<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MediaRepositoryRepository;
use App\Models\MediaRepository;
use App\Validators\MediaRepositoryValidator;

/**
 * Class MediaRepositoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MediaRepositoryRepositoryEloquent extends BaseRepository implements MediaRepositoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MediaRepository::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
