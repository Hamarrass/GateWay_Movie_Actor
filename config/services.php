<?php

return [
    'actors' => [
        'base_uri' => env('ACTOR_SERVICE_BASE_URI'),
        'secret'   => env('ACTOR_SERVICE_SECRET')
    ],

    'movies' => [
        'base_uri' => env('MOVIE_SERVICE_BASE_URI'),
        'secret'   => env('MOVIE_SERVICE_SECRET')
    ]
];
