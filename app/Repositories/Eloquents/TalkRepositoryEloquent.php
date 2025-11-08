<?php

namespace App\Repositories\Eloquents;

use App\Models\Talk;
use App\Repositories\Contracts\TalkRepositoryContract;
use MkamelMasoud\StarterCoreKit\Core\Repositories\BaseEloquentRepository;

/**
 * @extends BaseEloquentRepository<Talk>
 */
class TalkRepositoryEloquent extends BaseEloquentRepository implements TalkRepositoryContract
{
    /**
     * Return the fully qualified model class name.
     */
    public function entity(): string
    {
        return Talk::class;
    }
}
