<?php

namespace App\Services;

use App\Http\DataToObjects\TalkDto;
use App\Models\Talk;
use App\Repositories\Contracts\TalkRepositoryContract;
use App\Repositories\Eloquents\TalkRepositoryEloquent;
use MkamelMasoud\StarterCoreKit\Core\BaseService;

/**
 * @extends BaseService<
 *      TalkRepositoryContract,
 *      TalkDto,
 *      Talk
 *  >
 *
 * @property TalkRepositoryEloquent $repository
 */
class TalkService extends BaseService
{
    public function __construct(TalkRepositoryContract $repository)
    {
        $this->validateRepo($repository);
        parent::__construct($repository);
    }

    protected function getRepoClass(): string
    {
        return TalkRepositoryContract::class;
    }

    protected function getDtoClass(): string
    {
        return TalkDto::class;
    }
}
