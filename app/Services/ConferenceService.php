<?php

namespace App\Services;

use App\Http\DataToObjects\ConferenceDto;
use App\Models\Conference;
use App\Repositories\Contracts\ConferenceRepositoryContract;
use App\Repositories\Eloquents\ConferenceRepositoryEloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use MkamelMasoud\StarterCoreKit\Core\BaseDto;
use MkamelMasoud\StarterCoreKit\Core\BaseService;

/**
 * @extends BaseService<
 *        ConferenceRepositoryContract,
 *        ConferenceDto,
 *        Conference
 *   >
 *
 * @property ConferenceRepositoryEloquent $repository
 */
class ConferenceService extends BaseService
{
    public function __construct(ConferenceRepositoryContract $repository)
    {
        $this->validateRepo($repository);
        parent::__construct($repository);
    }

    protected function getRepoClass(): string
    {
        return ConferenceRepositoryContract::class;
    }

    protected function getDtoClass(): string
    {
        return ConferenceDto::class;
    }

}
