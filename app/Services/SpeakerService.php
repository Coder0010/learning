<?php

namespace App\Services;

use App\Http\DataToObjects\SpeakerDto;
use App\Models\Speaker;
use App\Repositories\Contracts\SpeakerRepositoryContract;
use App\Repositories\Eloquents\SpeakerRepositoryEloquent;
use MkamelMasoud\StarterCoreKit\Core\BaseService;

/**
 * @extends BaseService<
 *       SpeakerRepositoryContract,
 *       SpeakerDto,
 *       Speaker
 *   >
 *
 * @property SpeakerRepositoryEloquent $repository
 */
class SpeakerService extends BaseService
{
    public function __construct(SpeakerRepositoryContract $repository)
    {
        $this->validateRepo($repository);
        parent::__construct($repository);
    }

    protected function getRepoClass(): string
    {
        return SpeakerRepositoryContract::class;
    }

    protected function getDtoClass(): string
    {
        return SpeakerDto::class;
    }
}
