<?php

namespace App\Repositories\Eloquents;

use App\Models\Venue;
use App\Repositories\Contracts\VenueRepositoryContract;
use MkamelMasoud\StarterCoreKit\Core\Repositories\BaseEloquentRepository;

/**
 * @extends BaseEloquentRepository<Venue>
 */
class VenueRepositoryEloquent extends BaseEloquentRepository implements VenueRepositoryContract
{
    /**
     * Return the fully qualified model class name.
     */
    public function entity(): string
    {
        return Venue::class;
    }
}
