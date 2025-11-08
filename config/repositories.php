<?php

return [
    /* Your Repos Here 'contract => eloquent' */
    App\Repositories\Contracts\SpeakerRepositoryContract::class     => App\Repositories\Eloquents\SpeakerRepositoryEloquent::class,
    App\Repositories\Contracts\ConferenceRepositoryContract::class => App\Repositories\Eloquents\ConferenceRepositoryEloquent::class,
    App\Repositories\Contracts\TalkRepositoryContract::class  => App\Repositories\Eloquents\TalkRepositoryEloquent::class,
    App\Repositories\Contracts\VenueRepositoryContract::class  => App\Repositories\Eloquents\VenueRepositoryEloquent::class,

];
