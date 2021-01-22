<?php

use Illuminate\Support\Facades\DB;

return [
    'actors' => [
        'base_uri' => env('ACTOR_SERVICE_BASE_URI'),
        'secret'   => DB::select('select token from microservices where id = 1')
    ],

    'movies' => [
        'base_uri' => env('MOVIE_SERVICE_BASE_URI'),
        'secret'   => DB::select('select token from microservices where id = 2')
    ]
];
