<?php

namespace App\Services;

use App\Http\DataToObjects\VenueDto;
use App\Models\Venue;
use App\Repositories\Contracts\VenueRepositoryContract;
use App\Repositories\Eloquents\VenueRepositoryEloquent;
use MkamelMasoud\StarterCoreKit\Core\BaseService;

/**
 * @extends BaseService<
 *      VenueRepositoryContract,
 *      VenueDto,
 *      Venue
 *  >
 *
 * @property VenueRepositoryEloquent $repository
 */
class VenueService extends BaseService
{
    public function __construct(VenueRepositoryContract $repository)
    {
        $this->validateRepo($repository);
        parent::__construct($repository);
    }

    protected function getRepoClass(): string
    {
        return VenueRepositoryContract::class;
    }

    protected function getDtoClass(): string
    {
        return VenueDto::class;
    }
}
