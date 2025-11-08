<?php

namespace App\Repositories\Eloquents;

use App\Models\Conference;
use App\Repositories\Contracts\ConferenceRepositoryContract;
use MkamelMasoud\StarterCoreKit\Core\Repositories\BaseEloquentRepository;

/**
 * @extends BaseEloquentRepository<Conference>
 */
class ConferenceRepositoryEloquent extends BaseEloquentRepository implements ConferenceRepositoryContract
{
    /**
     * Return the fully qualified model class name.
     */
    public function entity(): string
    {
        return Conference::class;
    }
}
