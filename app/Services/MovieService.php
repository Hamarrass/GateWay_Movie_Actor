<?php

namespace App\Services;
use App\Traits\ConsumesExternalServices;
use Illuminate\Support\Facades\Config;


class MovieService
{
    use ConsumesExternalServices;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = Config::get('services.movies.base_uri');
        $this->secret  = Config::get('services.movies.secret');

    }

    public function allMovies()
    {
        return $this->performRequest('GET', '/api/movies');
    }

    public function createMovie($data)
    {
        return $this->performRequest('POST', '/api/actor', $data);
    }

    public function readOneMovie($id)
    {
        return $this->performRequest('GET', "/api/actor/{$id}");
    }

    public function updateMovie($data, $id)
    {
        return $this->performRequest('PUT', "/api/actor/{$id}", $data);
    }

    public function deleteMovie($id)
    {
        return $this->performRequest('DELETE', "/api/actor/{$id}");
    }
}
