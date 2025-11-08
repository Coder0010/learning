<?php

namespace App\Repositories\Eloquents;

use App\Models\Speaker;
use App\Repositories\Contracts\SpeakerRepositoryContract;
use MkamelMasoud\StarterCoreKit\Core\Repositories\BaseEloquentRepository;

/**
 * @extends BaseEloquentRepository<Speaker>
 */
class SpeakerRepositoryEloquent extends BaseEloquentRepository implements SpeakerRepositoryContract
{
    /**
     * Return the fully qualified model class name.
     */
    public function entity(): string
    {
        return Speaker::class;
    }
}
